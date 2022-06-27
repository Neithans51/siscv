<!doctype html>

<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
       
        <title>Login | Sistema para el Control de Visitas Safonapp</title>
		<link rel="shortcut icon" href="<?php echo constant('URL');?>src/img/favicon.ico" type="image/x-icon">
		<!-- Web Fonts  -->
        <link href="<?php echo constant('URL');?>src/fonts/css.css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
	<style>
	.log{
		border-radius: 0px 45px 45px 3px;
		width: 60%;
		height: 2%;
	}
	</style>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="<?php echo constant('URL');?>src/img/logoo.png" class="log"  alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Iniciar Sesión</h2>
					</div>
					<div class="panel-body">
					<h2 class="error-explanation text-center">Control de Visitas Safonapp <i class="fa-solid fa-star" style="color:red;text-shadow: 2px 2px 2px white;"></i></h2>
					<?php echo $this->mensaje;?>
						<form action="<?php echo constant('URL');?>main/iniciar" method="post" id="form">
							<div class="form-group mb-lg">
								<label><b>Usuario</b></label>
								<input name="usuario" type="text" class="form-control input-lg required" maxlength="45" placeholder="Escriba su Usuario o Correo electrónico" value="<?php echo $this->login->usuario; ?>"/>
							</div>

							<div class="form-group mb-lg">
								<label><b>Contraseña</b></label>
								<input name="contrasena" type="password" class="form-control input-lg required" maxlength="255" placeholder="Escriba su Contraseña" value="<?php echo $this->login->contrasena; ?>"/>
							</div>


							<div class="form-group mb-lg">
							<br>
							<img src="<?php echo constant ('URL');?>src/captcha/captcha.php" alt="Captcha Image" maxlength="6" size="6" style="width: 203px; height: 57px;">
							<br>	<br>
							<input autocomplete="off" style="text-align:center;" type="text" name="captcha" maxlength="15" placeholder="Ingrese el Captcha" class="form-control required">
							</div>




				



							<div class="row">
								<!--<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>-->
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs button-init"><b>Iniciar</b></button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span></span>
							</span>
							<br><br>
	
						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md" ><b style="color:#fff">&copy;<script>document.write(new Date().getFullYear());</script> Safonapp - Servicio Fondo Nacional del Poder Popular</b></p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
			<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-validation/jquery.validate.js"></script>
	
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/javascripts/estrella.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>

	
		<script type="text/javascript">
		$(document).ready(function() {
		$("#form").validate();
		});
		</script>


	</body>
</html>