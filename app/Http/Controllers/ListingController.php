<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
	// Show all listings
    public function index() {
			return view('listings.index',[
				'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
			]);
		}

		// Show single listing
		public function show(Listing $listing) {
			return view('listings.show', [
				'listing' => $listing
			]);
		}
		
		// Create listing form
		public function create() {
			return view('listings.create');
		}

		//Store listing data
		public function store(Request $request) {
			//dd($request->file('logo'));
			$form_fields = $request->validate([
				'title' => 'required',
				'company' => [
					'required', 
					Rule::unique('listings', 'company')
				],
				'location' => 'required',
				'website' => 'required', 
				'email' =>  [
					'required', 
					'email',
					Rule::unique('listings', 'email')
				],
				'tags' => 'required',
				'description' => 'required',
			]);

			if($request->hasFile('logo')) {
				$form_fields['logo'] = $request->file('logo')->store('logos', 'public');
			}
			
			Listing::create($form_fields);
			
			return redirect('/')->with('message', 'Listing created successfully');
			
			//dd($request->all());
		}

		//Edit data 
		public function edit(Listing $listing) {
			return view('listings.edit', ['listing' => $listing]);			
		}

		//Update Data
		public function update(Request $request, Listing $listing) {
			$form_fields = $request->validate([
				'title' => 'required',
				'company' => ['required'],
				'location' => 'required',
				'website' => 'required', 
				'email' =>  [
					'required', 
					'email',
				],
				'tags' => 'required',
				'description' => 'required',
			]);

			if($request->hasFile('logo')) {
				$form_fields['logo'] = $request->file('logo')->store('logos', 'public');
			}
			
			$listing->update($form_fields);
			
			return redirect('/listings/'.$listing->id)->with('message', 'Listing updated successfully');
		}

		// Delete Listing
		public function destroy(Request $request, Listing $listing) {
			$listing->delete();
			return redirect('/')->with('message', 'Listing ' . $listing->title . ' deleted successfully');
		}

		//Manage Listing
		public function manage(Listing $listing) {
			return view('listings.manage');
		}
}