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
         <section class="content-header">
            <h1>
               Totales Generales 
               <small>de parrillas</small>
            </h1>
         </section>
         <!-- Main content -->
         <section class="content-custom-dashboard">
            <div class="row">
               <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-aqua">
                     <div class="inner">
                        <h3>
                          <?php 
                            echo $totalesTerminadas[0]->totales + $totalesTrabajando[0]->totales;
                          ?>
                        </h3>
                        <p>Total parrillas</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                  </div>
               </div>
               <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-green">
                     <div class="inner">
                        <h3>
                          <?php echo $totalesTerminadas[0]->totales; ?>
                        </h3>
                        <p>Terminadas</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                  </div>
               </div>
               <div class="col-lg-4 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                     <div class="inner">
                        <h3>
                            <?php echo $totalesTrabajando[0]->totales; ?>
                        </h3>
                        <p>Trabajando</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                  </div>
               </div>
            </div>
         </section>


        <?php foreach($totalesPorProyecto as $total){ ?>
            <section class="content-header">
              <h1>
                 <?php echo $total['proyecto'];?> 
                 <small>Totales</small>
              </h1>
            </section> 
            <section class="content-custom-dashboard">
              <div class="row">
                 <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-aqua">
                       <div class="inner">
                          <h3>
                            <?php 
                              echo $total['terminadas'] + $total['pendientes'];
                            ?>
                          </h3>
                          <p>Total parrillas</p>
                       </div>
                       <div class="icon">
                          <i class="ion ion-bag"></i>
                       </div>
                       <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                 </div>
                 <div class="col-lg-4 col-xs-6">
                    <div class="small-box bg-green">
                       <div class="inner">
                          <h3>
                            <?php echo $total['terminadas']; ?>
                          </h3>
                          <p>Terminadas</p>
                       </div>
                       <div class="icon">
                          <i class="ion ion-stats-bars"></i>
                       </div>
                       <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                 </div>
                 <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                       <div class="inner">
                          <h3>
                              <?php echo $total['pendientes']; ?>
                          </h3>
                          <p>Trabajando</p>
                       </div>
                       <div class="icon">
                          <i class="ion ion-person-add"></i>
                       </div>
                       <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
                    </div>
                 </div>
              </div>
           </section>
        <? } ?>

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
                      Por favor click aqui para ir a la ventana de login
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