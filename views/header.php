	<!-- start: header -->
    <header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="<?php echo constant('URL');?>src/img/logo.png" height="50" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
				<!--	<form action="pages-search-results.html" class="search nav-form">
						<div class="input-group input-search">
							<input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
			
					<span class="separator"></span>-->
			
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo constant('URL');?>src/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="<?php echo constant('URL');?>src/assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name">John Doe Junior</span>
								<span class="role">administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="pages-signin.html"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Inicio</span>
										</a>
									</li>
								<!--	<li>
										<a href="mailbox-folder.html">
											<span class="pull-right label label-primary">182</span>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Mailbox</span>
										</a>
									</li>-->
									<li class="nav-parent">
										<a>
											<i class="fa fa-cog" aria-hidden="true"></i>
											<span>Administración</span>
										</a>
										<ul class="nav nav-children">
										  <li>
												<a href="pages-signin.html">
													 Pases
												</a>
											</li>
											<li>
												<a href="pages-signup.html">
													 Departamentos
												</a>
											</li>
										
											
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>Usuario</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="<?php echo constant('URL');?>usuario/RegistroUsuario">
													 Nuevo usuario
												</a>
											</li>
											<li>
												<a href="forms-advanced.html">
													 Usuarios
												</a>
											</li>
											
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Visitante</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="forms-basic.html">
													 Verificar visitante
												</a>
											</li>
											<!--<li>
												<a href="forms-advanced.html">
													 Nuevo visitante
												</a>
											</li>-->
											<li>
												<a href="forms-advanced.html">
													 Visitantes
												</a>
											</li>
											
										</ul>
									</li>
									
								</ul>
							</nav>
				
							<hr class="separator" />
				
							
				
							<hr class="separator" />
				
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->