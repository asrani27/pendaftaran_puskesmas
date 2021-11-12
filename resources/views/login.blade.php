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
	<link rel="stylesheet" href="/logreg/css/font-awesome/css/font-awesome.min.css">
</head>

<body>
	<div class="container text-center" id="login">
		<div class="row">
			
			<div class="col-md-6 col-md-offset-3">
		
				<div class="panel panel-default">
				
					<div class="panel-body nopadding">
						
						<div class="row">
						
							<div class="col-lg-12">
								
								<form id="login_form">		
									<div class="login_logo">Login</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>	
												<input type="email" class="form-control input input-lg" placeholder="Your Email"  required>
											</div>
										</div>
										
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>	
												<input type="password" class="form-control input input-lg" placeholder="Your Password"  required>
											</div>
										</div>
																				
										<div class="butn">
											<button class="btn btn-primary btn-block btn-lg">Masuk</button>
										</div>
												
			
                                        <div class="social-buttons">
                                            <div class="row">
                                                <h4><b> Masuk Menggunakan</b></h4>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="#" class="btn btn-default btn-lg btn_gmail">
                                                        <i class="fa fa-google"></i> Gmail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

										<div class="butn">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="/" class="btn btn-primary btn-block btn-sm">Kembali Ke Beranda</a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="/lupa-password" class="btn btn-danger btn-block btn-sm">Lupa Password?</a>
                                                </div>
                                            </div>
										</div>

										<div class="forgot">
										</div>
										
										<div class="newhere">
											<strong><p>Belum Punya Akun ? <a href="#">Daftar Disini</a></p></strong>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div id="footer">
			<p>Copyright &copy; 2016 All Rights are Reserved. Developed By <a href="http://bootstraplayouts.com/">Diskomint Layouts</a></p>
		</div>
	</div>

</body>
</html>