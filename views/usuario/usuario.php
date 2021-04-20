<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Usuario | Sistema para el Control de Visitas UBV</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="<?php echo constant('URL');?>src/fonts/css.css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/morris/morris.css" />

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
		<section class="body">

        <?php require 'views/header.php'; ?>

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Usuarios</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Usuarios</span></li>
								<li><span>Registrar Usuario</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
				
					
						<div class="row">
						<div class="col-md-12">
							<form id="frm_foto"  action="forms-validation.html" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>

										<h2 class="panel-title">Registro de Usuario</h2>
										<p class="panel-subtitle">
											Formulario basico para el registro de usuarios.
										</p>
									</header>
									<div class="panel-body">

									<div class="form-group">
											<label class="col-sm-3 control-label">Nacionalidad/Cedula<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
											</div>
										</div>

									
										<div class="form-group">
											<label class="col-sm-3 control-label">Nombres<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Apellidos<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Genero<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Telefono<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Correo <span class="required">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" required/>
												</div>
											</div>


											<div class="col-sm-9">

											</div>


										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Usuario</label>
											<div class="col-sm-9">
												<input type="url" name="github" class="form-control" placeholder="eg.: https://github.com/johndoe" />
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Contrasea <span class="required">*</span></label>
											<div class="col-sm-9">
												<textarea name="skills" rows="5" class="form-control" placeholder="Describe your skills" required></textarea>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Estatus <span class="required">*</span></label>
											<div class="col-sm-9">
												<textarea name="skills" rows="5" class="form-control" placeholder="Describe your skills" required></textarea>
											</div>
										</div>




										<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Inline checkboxes</label>
												<div class="col-md-6">
													<label class="checkbox-inline">
														<input type="checkbox" id="inlineCheckbox1" value="option1"> 1
													</label>
													<label class="checkbox-inline">
														<input type="checkbox" id="inlineCheckbox2" value="option2"> 2
													</label>
													<label class="checkbox-inline">
														<input type="checkbox" id="inlineCheckbox3" value="option3"> 3
													</label>
												</div>
											</div>




										<div class="form-group">
											<label class="col-sm-3 control-label">Skills <span class="required">*</span></label>
											<div class="col-sm-9">
											
										
										
							<fieldset class="form-group">
							<div class="col-md-12">
									<div class="form-check radio_check">
										<input class="form-check-input" type="radio" name="radio_select" id="radiosfoto" value="1" checked>
										<label class="form-check-label" for="radiosfoto">Seleccionar Foto</label>
									</div>
									<div class="form-check radio_check">
										<input class="form-check-input" type="radio" name="radio_select" id="radiotfoto" value="0">
										<label class="form-check-label" for="radiotfoto">Tomar Foto</label>
									</div>
								</div>
							</fieldset>


							<div class="container_radio">
								<input type="file" class="form-control-file video_container" name="archivo" id="subirfoto" accept="image/*">
								<video id="video" autoplay="autoplay" class="video_container none"></video>
							</div>
					
											
											




										   </div>
										</div>

			

									</div>



									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-u">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>

										<canvas id="canvas" class="none"></canvas>

										
									</footer>
								</section>
							</form>


							
						</div>
					
						
					</div>









					
					<!-- end: page -->
                </section>
                

                
			</div>

        
            



            
        </section>
        
    

		<!-- Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery/jquery.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/magnific-popup/magnific-popup.js"></script>

		
		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-appear/jquery.appear.js"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-validation/jquery.validate.js"></script>
		
		<script src="<?php echo constant('URL');?>src/assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
			


		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>
		<!-- Examples -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/dashboard/examples.dashboard.js"></script>
    
		
		
		<!-- Specific Page Vendor -->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-validation/jquery.validate.js"></script>
		

		<!-- Examples -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/forms/examples.validation.js"></script>



	<!-- Tomar foto -->


	<script src="<?php echo constant('URL');?>src/js/camara.js"></script>
	<script src="<?php echo constant('URL');?>src/js/inserta.js"></script>





    </body>
</html>