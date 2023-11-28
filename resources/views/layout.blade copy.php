<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="images/favicon.ico" />
	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
	/>
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
			tailwind.config = {
					theme: {
							extend: {
									colors: {
											laravel: "#ef3b2d",
									},
							},
					},
			};
	</script>
	<style>
		html, body {
			height: 100%;
			width: 100%;
			padding: 0;
			margin: 0;
		}	
		body {
			display: flex;
			flex-direction: column;
			background-color: aliceblue;
			font-family: 'Nunito', sans-serif;
			font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5
		}	
		header {
				height: 75px;
		}
		main {
				flex: auto;
				background-color: #ccc;
		}
		footer {
				height: 25px;
		}
	</style>
	<title>Citymody</title>
</head>
<body>
	<header class="main-header">
		<nav class="main-nav">
			{{-- VIEW TOP NAVIGAION --}}
			@include('partials._navigation') 
		</nav>
	</header>
	<main class="main-content">
		{{-- VIEW MAIN CONTENT --}}
		@yield('content') 
	</main>
	<footer class="main-footer" id="footer">
		{{-- VIEW FOOTER NAVIGAION --}}
		@include('partials._footer-navigation') 
	</footer>
</body>
</html>