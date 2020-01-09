<div class="container-fluid">
	<div class="container">
		<div style="margin-top: 50px;" class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-4 col-md-offset-4 col-md-3 col-lg-offset-4 col-lg-4">
				<?php 
					$atributos = array('id' => 'login-form');
					echo form_open('login/login', $atributos); ?>
					<div class="form-group">
					    <label for="username">Usuario:</label>
					    <input type="text" value="<?php echo set_value('username');?>" class="form-control" id="username" name="username" placeholder="Usuario">
					    <?php echo form_error('username');?>
					</div>
					<div class="form-group">
					    <label for="password">Password:</label>
					    <input type="password" value="<?php echo set_value('password');?>" class="form-control" id="password" name="password" placeholder="Password">
					    <?php echo form_error('password');?>
					</div>
					<div class="form-group">
						<button id="registrar" class="btn btn-success col-xs-12 col-sm-12 col-lg-12">Entrar</button>
					</div>
					<div class="form-group">
						<?php echo $this->session->flashdata('msg'); ?>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
