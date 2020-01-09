 <div class="content-wrapper">
   <?php
      if($this->session->userdata('ci_session')) {
        $session_data = $this->session->userdata('ci_session');
        $id = $session_data['id'];
        $nick = $session_data['username'];
        $nombreCompleto = $session_data['nombre_completo'];
        $perfil = $session_data['perfil'];
        $correo = $session_data['correo'];
    ?>

    <!-- Para mandar el id a Vue -->
    <script>window.usuarioId = <?php echo $id;?>;</script>

        <section class="content-header">
          <h1>
            Parrillas 
            <small>Administrar parrillas</small>
          </h1>
        </section>

        <!-- ============================= -->       
        <!-- SECCION CREAR PARRILLAS START -->
        <section id="app-parrilla" class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Crear parrilla</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <!-- <app-crear-parrillas></app-crear-parrillas> -->
                      <app-marvel></app-marvel>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Crear items a parrilla</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <!-- <app-crear-items :cosa="cosaP"></app-crear-items> -->
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </section>
        <!-- SECCION CREAR PARRILLAS END -->
        <!-- ============================ -->

   <?php } else { ?>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Usuario no logeado</h3>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 text-center ">
                      Lo siento, no estás logeado en el sistema.
                      <br>
                      Por favor click al botón para ir a la ventana de login
                      <br><br>
                      <a class="btn btn-warning" href="<?php echo base_url()?>login">
                        Ir a Login
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
   <?php } ?>
</div> <!-- Fin content-wrapper -->