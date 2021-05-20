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

			
					
					<style>


.none {
	display: none !important;
}
					</style>

					<!-- start: page -->
	<!--Validar campos-->			
					
						<div class="row">
						<div class="col-md-12">
							<form id="registro-form"  method="post"  class="form-horizontal">
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
											<label class="col-sm-3 control-label">Cedula  <span class="required">*</span></label>
											<div class="col-sm-9">

											<div class="row">
														<div class="col-sm-3">
															
														<select class="select2_demo_3 form-control  m-b required" name="nacionalidad">                                    
														<option selected="selected" value="">Selecione </option> 
														<option value="V">V</option>
														<option value="E">E</option>
														</select> 

														</div>
														<div class="visible-xs mb-md"></div>
														<div class="col-sm-9">
															<input type="text" class="form-control required" name="cedula" placeholder="Escriba su umero de cedula">
														</div>
													</div>
											
											</div>



										</div>

									
										<div class="form-group">
											<label class="col-sm-3 control-label">Nombres <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="nombres" class="form-control required" placeholder="Escriba sus nombres" required/>
											</div>
										</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Apellidos <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="apellidos" class="form-control required" placeholder="Escriba sus apellidos" required/>
											</div>
										</div>



										<div class="form-group">
												<label class="col-md-3 control-label" for="inputSuccess">Genero <span class="required">*</span></label>
												<div class="col-md-6">
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" name="genero" class="required" value="Femenino"> Femenino
													</label>
													<label class="checkbox-inline">
														<input type="radio" id="inlineCheckbox1" name="genero" class="required" value="Masculino"> Masculino
													</label>
													
												</div>
											</div>


										<div class="form-group">
											<label class="col-sm-3 control-label">Telefono<span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="text" name="telefono" class="form-control required" placeholder="eg.: John Doe" />
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Correo <span class="required">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
													<input type="email" name="email" class="form-control required" placeholder="ej.: email@email.com" />
												</div>
											</div>


											<div class="col-sm-9">

											</div>


										</div>
					

										<div class="form-group">
											<label class="col-sm-3 control-label">Foto <span class="required">*</span></label>
											<div class="col-sm-9">
											
										
										
											<fieldset class="form-group">
											<div class="col-md-12">
													<div class="form-check radio_check checkbox-inline">
														<input class="form-check-input required" type="radio" name="radio_select" id="radiosfoto" value="1" >
														<label class="form-check-label" for="radiosfoto">Seleccionar Foto</label>
													</div>
													<div class="form-check radio_check checkbox-inline">
														<input class="form-check-input required" type="radio" name="radio_select" id="radiotfoto" value="0">
														<label class="form-check-label" for="radiotfoto">Tomar Foto</label>
													</div>
												</div>
											</fieldset>

<br>
										<div class="container_radio">
											<input type="file" class="form-control-file video_container none" name="archivo" id="subirfoto" accept="image/*">
											<video id="video" autoplay="autoplay" class="video_container none"></video>
										</div>
										


										   </div>
										</div>

			

									</div>



									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button type="submit" class="btn btn-primary" >Guardar</button>
												<button type="reset" class="btn btn-default">Cancelar</button>
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




	<!--<script src="<?php echo constant('URL');?>src/js/inserta.js"></script>-->

	<script>
function btnSaveLoad() {
    $("#btn_save").html('Guardando ...');
    $("#btn_save").attr("disabled", true);
}

function btnSave() {
    $("#btn_save").html('Guardar');
    $("#btn_save").attr("disabled", false);
}


/*Validar formulario y procesar por Ajax */

$(document).ready(function(){
    $("#registro-form").validate({
       // event: "blur",rules: {'name': "required",'email': "required email",'message': "required"},
      //  messages: {'name': "Por favor indica tu nombre",'email': "Por favor, indica una direcci&oacute;n de e-mail v&aacute;lida",'message': "Por favor, dime algo!"},
        debug: true,errorElement: "label",
        submitHandler: function(form){
           
	

		var nacionalidad = $('#nacionalidad').val();
		var cedula = $('#cedula').val();
		var nombres = $('#nombres').val();
		var apellidos = $('#apellidos').val();
		var genero = $('#genero').val();
		var telefono = $('#telefono').val();
		var email = $('#email').val();
        var radio = $("input[name='radio_select']:checked").val();

        if (radio == 0) {
            cxt.drawImage(video, 0, 0, 300, 150);
            var data = canvas.toDataURL("image/jpeg");
            var info = data.split(",", 2);
            $.ajax({
                type : "POST",
                url : "<?php echo constant('URL');?>usuario/RegistraUsuariof",
				data : {foto : info[1],nacionalidad:nacionalidad,cedula:cedula,
					 nombres: nombres, apellidos: apellidos,genero:genero,telefono:telefono,
					 email: email, genero: genero},
                dataType : 'json',
                beforeSend: function() {
                    btnSaveLoad();
                },
                success : function(response) {
                    btnSave();
                    if (response.success == true) {
                        swal("MENSAJE", response.messages , "success");
                        $("#frm_foto")[0].reset();
                        $("#radiosfoto").click();
                    } else {
                        swal("MENSAJE", response.messages , "error");
                    }
                }
            });
        } else if (radio == 1) {
			/*save_img */
			//var formData = new FormData(this);
			var formData = new FormData(form);
            $.ajax({
                url: '<?php echo constant('URL');?>usuario/RegistraUsuariof',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    btnSaveLoad();
                },
                success: function(response){
					console.log(radio);
                    btnSave();
                    if (response.success == true) {
                       // swal("MENSAJE", response.messages , "success");
                        $("#registro-form")[0].reset();
                        $("#radiosfoto").click();
                    } else {
                       // swal("MENSAJE", response.messages , "error");
                    }
                }
            });

        }

        return false;
        



           
        }
    });
});





	</script>





    </body>
</html>