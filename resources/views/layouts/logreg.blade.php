<!DOCTYPE html>
<html lang="en">
<head>
	<title>WikBook | {{ $title }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href={{ asset('css/cutil.css') }}>
	<link rel="stylesheet" type="text/css" href={{ asset('css/cmain.css') }}>
</head>
<body>


    @yield('container')



<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script src={{ asset('js/cmain.js') }}></script>

</body>
</html>
