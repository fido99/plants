<!DOCTYPE html>
<html>
<head>
	<title>admin panel</title>
	<link rel="stylesheet" href="/css/admin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="http://js.nicedit.com/nicEdit-latest.js"></script>
	<meta name="viewport" content="initial-scale=1, maximum-scale=1">
</head>
<body>
 @yield("contnet")
 <script src="/js/app.js"></script>
</body>
</html>