<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	@include('layout.css')
</head>
<body>
	@include('layout.header')

	<div class="rev-slider">
		@yield('content')
	</div>

	@include('layout.footer')
	@include('layout.js')
</body>
</html>
