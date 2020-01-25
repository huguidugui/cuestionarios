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
								if($this->session->userdata('ci_session')) { ?>
		            				<li>
										<a href="<?php echo base_url()?>login/logout">
											Salir
										</a>
									</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</section>
		<!-- END MENU -->