<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>assets/images/HD.png" />
        <p id="profile-name" class="profile-name-card">Sistema de Cuestionarios</p>
        <?php 
			$atributos = array('id' => 'login-form', 'class' => 'form-signin');
			echo form_open('login/login', $atributos); ?>
	            <div class="form-group">
	            	<input type="text" value="<?php echo set_value('username');?>" class="form-control" id="username" name="username" placeholder="Usuario" required autofocus>
	            	<?php echo form_error('username');?>
	            </div>
	            <div class="form-group">
	            	<input type="password" value="<?php echo set_value('password');?>" class="form-control" id="password" name="password" placeholder="Password" required>
	            	<?php echo form_error('password');?>
	            </div>
	            
	            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign in</button>

	            <div class="form-group">
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
        <?php echo form_close(); ?> <!-- /form -->
    </div> <!-- /card-container -->
</div> <!-- /container -->