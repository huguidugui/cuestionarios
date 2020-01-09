<aside class="main-sidebar">
   <?php
      if($this->session->userdata('ci_session')) {
        $session_data = $this->session->userdata('ci_session');
        $id = $session_data['id'];
        $nick = $session_data['username'];
        $nombreCompleto = $session_data['nombre_completo'];
        $perfil = $session_data['perfil'];
        $foto = $session_data['foto'];
        $correo = $session_data['correo'];
   ?>
      <section class="sidebar">
         <div class="user-panel">
            <div class="pull-left image">
               <img src="<?php echo base_url();?>assets/images/fotoPerfil/<?php echo $foto;?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
               <p><?php echo $nombreCompleto;?></p>
               <a href="<?php echo base_url();?>parrillas">
                  <i class="fa fa-circle text-success"></i> 
                  En línea
               </a>
            </div>
         </div>
         <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menú principal</li>
            <li class="<?php if(current_url() == base_url().'implementacion') {echo 'active';}?>">
               <a href="<?php echo base_url();?>implementacion">
                  <i class="fa fa-dashboard"></i> 
                  <span>Dashboard</span>
               </a>
            </li>
            <!-- <li class="<?php if(current_url() == base_url().'parrillas/crearParrillas') {echo 'active';}?>">
               <a href="<?php echo base_url();?>parrillas/crearParrillas">
                  <i class="fa fa-id-card-o"></i> 
                  <span>Parrillas</span>
               </a>
            </li> -->
         </ul>
      </section>
   <?php } ?>
</aside>