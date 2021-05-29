<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Pases | Sistema para el Control de Visitas UBV</title>
		<link rel="shortcut icon" href="<?php echo constant('URL');?>src/img/favicon.ico" type="image/x-icon">

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
	
		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

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
						<h2>Pases</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="<?php echo constant('URL');?>home">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li>
								<a href="<?php echo constant('URL');?>admin">
								<span>Pases</span>
								</a><li>
								<a href="<?php echo constant('URL');?>admin/Pase">
								<span>Lista de Pases</span>
								</a></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open=""><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

			
					<!-- start: page -->
										
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<!--<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>-->
									<a title="Agregar Pase" href="<?php echo constant ('URL') . "admin/Pase";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-pencil"></i> Agregar</button></a>
								</div>
						
								<h2 class="panel-title">Lista de Pases</h2>
								<p class="panel-subtitle">
											Pases registrados en el sistema
								</p>
							</header>
							<div class="panel-body">
							<?php echo $this->mensaje; ?>
								<table class="table table-bordered table-striped mb-none" id="datatable-default">
									<thead>
										<tr>
											<th>Nro. pase</th>
											<th>Codigo de Pase</th>
											<th>Estatus</th>
                                            <th>Fecha de Registro</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php include_once 'models/cvubv.php';
									$cont=1;
															foreach($this->pases as $row){
															$user=new Cvubv();
															$user=$row;?> 
										<tr class="gradeX">

											<td><?php echo $cont; ?></td>
											<td><?php echo $user->descripcion; ?></td>
											<td>
											<?php 
											if($user->estatus=='1'){
												echo '<span class="label label-success">Disponible</span>';
											}else{
												echo '<span class="label label-warning">&nbsp;Asignado&nbsp;</span>';
											}
											?>
											</td>
											 <td><?php echo date("Y/m/d", strtotime($user->fecha_registro)); ?></td>
											 <td>
											 <a href="<?php echo constant ('URL') . "admin/VerPase/".$user->id_pase."/1";?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary"><i class="fa fa-edit"></i> Editar</button></a>
											 <!-- <a href="<?php echo constant ('URL') . "usuario/VerPase/".$user->id_usuario;?>"><button type="button" class="mb-xs mt-xs mr-xs btn btn-info"><i class="fa fa-eye"></i> &nbsp;Ver &nbsp;</button></a>-->

											 </td>
										
										</tr>

										<?php $cont+=1; }?> 
										
									</tbody>
								</table>
								
							</div>
						</section>	
					
						
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
		<script src="<?php echo constant('URL');?>src/assets/vendor/select2/select2.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.default.js"></script>
	<!--	<script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.row.with.details.js"></script>
		<script src="<?php echo constant('URL');?>src/assets/javascripts/tables/examples.datatables.tabletools.js"></script>-->

   <!-- Examples Modal para mensajes -->
	 <script src="<?php echo constant('URL');?>src/assets/javascripts/ui-elements/examples.modals.js"></script>
	



	

    </body>
</html>