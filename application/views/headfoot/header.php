<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

	<head>
        <title><?= $titulo?></title>
        <meta charset="utf-8">
		<meta name="description" content="Aplicativo de cuestionarios de opción múltiple. Aplicación Web hecha con Codeigniter 3.1.x.">
		<meta name="keywords" content="cuestionarios, cuestionarios de opcion multiple">
		<meta name="author" content="Hugui Dugui">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        

        <link rel="icon" href="<?php echo base_url();?>assets/images/hugui.ico" type="image/icon">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap-progressbar-3.3.4.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/theme-color/purple-theme.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/cuestionario.css?ver=1.0">
		
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	</head>

	<body>
	
		<!-- SCROLL TOP BUTTON -->
		<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
		<!-- END SCROLL TOP BUTTON -->

		<!-- BEGIN MENU -->
		<section id="menu-area">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- IMG BASED LOGO  -->
		 				<a class="navbar-brand img-responsive" href="<?php echo base_url()?>">
							<img src="<?php echo base_url();?>assets/images/huguidugui_logo.png" alt="huguidugui" width="167" height="45">
						</a> 
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
							<li class="active">
								<a href="<?php echo base_url()?>">
									Inicio
								</a>
							</li>
							<?php
            					if($this->session->userdata('ci_session')) {
            				?>
	            				<li>
									<a href="<?php echo base_url()?>login/logout">
										Salir
									</a>
								</li>
							<?php } ?>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>
		</section>
		<!-- END MENU -->


