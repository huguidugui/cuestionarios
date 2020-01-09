<header class="main-header">
   <!-- Logo -->
   <a href="<?php echo base_url();?>parrillas" class="logo">
      <span class="logo-mini"><b>H</b>MG</span>
      <span class="logo-lg"><b>Parrilla</b>Hugui</span>
   </a>
   <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
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
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url();?>assets/images/fotoPerfil/<?php echo $foto;?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $nick;?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                           <img src="<?php echo base_url();?>assets/images/fotoPerfil/<?php echo $foto;?>" class="img-circle" alt="User Image">
                           <p style="text-transform: capitalize;">
                              <?php echo $nombreCompleto . '<br><strong>' . $perfil . '</strong>';?>
                           </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <!--  <div class="pull-left">
                              <a href="#" class="btn btn-default btn-flat">Profile</a>
                           </div> -->
                           <div class="pull-right">
                              <a 
                                 href="<?php echo base_url('login/logout')?>" 
                                 class="btn btn-default btn-flat">
                                 Salir
                              </a>
                           </div>
                        </li>
                     </ul>
                  </li>                  
               </ul>
         <?php } ?>
      </div>
   </nav>
</header>