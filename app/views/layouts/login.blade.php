<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{('/assets/css/login.css')}}">
    <link rel="shortcut icon" href="{{('/assets/img/favicon.ico')}}" type="image/x-icon">
 
</head>
<body>
<div id="fullBg">
<div class="container">
 

@show
 
@yield('content')
</div>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{('/assets/js/jquery-2.0.2.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{('/assets/js/bootstrap.min.js')}}"></script>
</body>
</html>