<!doctype html>
<html>
<head>
	<title>Login Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="/logreg/bootstrap/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="/logreg/bootstrap/js/jquery.min.js"></script>
	
	<!-- Bootstrap JavaScript -->
	<script src="/logreg/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Page CSS Files -->
	<link rel="stylesheet" href="/logreg/css/login.css">
	
	<!--Font-Awesome CSS File--> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
	<div class="container text-center" id="login">
		@yield('content')
		<div id="footer">
            <br/><br/><br/><br/>
			<p>Developed By <a href="#">Diskominfotik</a></p>
		</div>
	</div>
</body>
</html>