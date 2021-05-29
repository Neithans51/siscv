<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Usuario | Sistema para el Control de Visitas UBV</title>
		<link rel="shortcut icon" href="<?php echo constant('URL');?>src/img/favicon.ico" type="image/x-icon">

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
		<!-- Select2-->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/select2/select2.css" />

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
								<li>
								<a href="<?php echo constant('URL');?>usuario">
								<span>Usuarios</span>
								</a>
								</li>
								<li><span>Detalle</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

			
					
			
            

<!-- start: page -->

<div class="row">
						<div class="col-md-4 col-lg-3">

							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="assets/images/!logged-user.jpg" class="rounded img-responsive" alt="John Doe">
										<div class="thumb-info-title">

										<?php  list($pnombre, $snombre) = explode(" ", $this->usuario->nombres);
											   list($papellido, $sapellido) = explode(" ", $this->usuario->apellidos); ?>

											<span class="thumb-info-inner"><?php echo $pnombre." ".$papellido; ?></span>
											<span class="thumb-info-type"><?php echo $this->usuario->usaurio_perfil; ?></span>
										</div>
									</div>

									<div class="widget-toggle-expand mb-md">
										
								
										<div class="widget-content-expanded">
											<ul class="simple-todo-list">
												<li class="completed"><?php echo $this->usuario->telefono; ?></li>
												<li class="completed"><?php echo $this->usuario->correo; ?></li>
												<li class="completed"><?php echo $this->usuario->persona_tipo; ?></li>
												<li class="completed"><?php echo $this->usuario->departamento; ?></li>
											
											</ul>
										</div>
									</div>

									<hr class="dotted short">

									<h6 class="text-muted">Perfil</h6>
									<p class="""><?php echo $this->usuario->usuario; ?></p>
									<p class="""><?php echo $this->usuario->usaurio_perfil; ?></p>
									
									<p>
									<?php 
										if($this->usuario->estatus=='1'){
											echo '<span class="label label-success">&nbsp;&nbsp;Activo&nbsp;&nbsp;&nbsp;</span>';
										}else{
											echo '<span class="label label-danger">&nbsp;Inactivo&nbsp;</span>';
										}
									?>
									</p>
							

									<hr class="dotted short">


								</div>
							</section>


						
						</div>
						<div class="col-md-8 col-lg-6">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#overview" data-toggle="tab">Perfil</a>
									</li>
									<li>
										<a href="#edit" data-toggle="tab">Editar</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<h4 class="mb-md">Perfil</h4>

									
										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												<div class="tm-title">
													<h3 class="h5 text-uppercase"><?php echo date("Y/m/d", strtotime($this->usuario->fecha_registro)); ?></h3>
												</div>
												<ol class="tm-items">
													<li>
														<div class="tm-box">


															<p class="text-muted mb-none">Nombre</p>
															<p>
															<?php echo $this->usuario->nombres." ".$this->usuario->apellidos; ?>
															</p>

															<p class="text-muted mb-none">Cedula</p>
															<p>
															<?php echo $this->usuario->cedula; ?>
															</p>

															<p class="text-muted mb-none">Nacionalidad</p>
															<p>
															<?php if($this->usuario->nacionalidad=="V"){ 
																echo "Venezolano";
																}else{
															    echo "Extranjero";
																}
															?>
															</p>


															<p class="text-muted mb-none">Genero</p>
															<p>
															<?php if($this->usuario->genero=="F"){ 
																echo "Femenino";
																}else{
															    echo "Masculino";
																}
															?>
															</p>



														</div>
													</li>
													
													<li>
														<div class="tm-box">
															<p class="text-muted mb-none"></p>
															<p>
																Foto
															</p>
															<div class="thumbnail-gallery">
																<a class="img-thumbnail lightbox" href="<?php echo constant ('URL') .$this->usuario->documento; ?>" data-plugin-options='{ "type":"image" }'>
																	<img class="img-responsive" width="215" src="<?php echo constant ('URL') .$this->usuario->documento; ?>">
																	<span class="zoom">
																		<i class="fa fa-search"></i>
																	</span>
																</a>
															</div>
														</div>
													</li>
												</ol>
											</div>
										</div>
									</div>
									<div id="edit" class="tab-pane">

										<form class="form-horizontal" method="get">
											<h4 class="mb-xlg">Personal Information</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">First Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileFirstName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileLastName">Last Name</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileLastName">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">Address</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileAddress">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">Company</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileCompany">
													</div>
												</div>
											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">About Yourself</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileBio">Biographical Info</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="3" id="profileBio"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label mt-xs pt-none">Public</label>
													<div class="col-md-8">
														<div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
															<input type="checkbox" checked="" id="profilePublic">
															<label for="profilePublic"></label>
														</div>
													</div>
												</div>
											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">Change Password</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPassword">New Password</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileNewPassword">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileNewPasswordRepeat">Repeat New Password</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="profileNewPasswordRepeat">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						


						
					</div>
					<!-- end: page -->			
                </section>     

				<?php require 'views/footer.php'; ?>           
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
	
		<!--Input mask-->
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-maskedinput/jquery.maskedinput.js"></script>
		<!--Select2-->
		<script src="<?php echo constant('URL');?>src/assets/vendor/select2/select2.js"></script>
		
		<!-- Validar el ingreso de letra o numeros en input -->
		<script src="<?php echo constant('URL');?>src/js/	val_letras.js"></script>

		

		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>


	   <!-- Examples Modal para mensajes -->
	   <script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	


    </body>
</html>