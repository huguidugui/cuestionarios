 <div id="appImplementacion" class="content-wrapper">

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
               Implementar 
               <small>parrillas</small>
            </h1>
         </section>

         <!-- ============================= -->       
        <!-- SECCION CREAR PARRILLAS START -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Elegir parrilla</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-4">
                        <label>Parrillero</label>
                        <select 
                            v-model="dependientes.parrillero" 
                            v-on:change="onChangeParrillero(dependientes.parrillero)" 
                            class="form-control">
                          <option value="0" selected=""> Selecciona parrillero... </option>
                          <option 
                            v-for="parrillero in parrilleros" 
                            v-bind:value="parrillero.id"> 
                            {{ parrillero.username }} 
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label>Proyectos</label>
                        <select
                          v-model="dependientes.proyecto" 
                          v-on:change="onChangeProyectos(dependientes.parrillero, dependientes.proyecto)"
                          :disabled="dependienteParrillero" 
                          class="form-control">
                          <option value="0" selected=""> Selecciona proyecto... </option>
                          <option 
                            v-for="proyecto in proyectosParrillero" 
                            v-bind:value="proyecto.id"> 
                            {{ proyecto.nombre }} 
                          </option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label>Parrillas</label>
                        <select 
                          v-model="dependientes.parrillas"
                          v-on:change="onChangeParrillas(dependientes.parrillas)"
                          :disabled="dependienteProyectos" 
                          class="form-control">
                          <option value="0" selected=""> Selecciona parrilla... </option>
                          <option 
                            v-for="parrilla in parrillas" 
                            v-bind:value="parrilla.id"> 
                            {{ parrilla.nombre_parrilla }} 
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

            <!-- **** CREAR ITEMS A PARRILLA START **** -->
            <div class="col-md-12">
              <div v-if="dependientes.parrillas > 0" class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title"></h3>
                </div>
                <div v-if="banderaRegresaPendiente" class="box-header with-border">
                  <a 
                    class="btn btn-app"
                    :title="accionImplementada.textoTitle"
                    v-on:click.prevent="darPorImplementada(dependientes.parrillas, accionImplementada.textoAccion)">
                    <i class="fa fa-cube"></i> 
                    {{ implementadaTexto }}
                  </a>

                  <a 
                    class="btn btn-app pull-right"
                    title="Borrar esta parrilla"
                    v-if="accionImplementada.textoAccion == 'No'"
                    v-on:click.prevent="darPorBorrada(dependientes.parrillas)">
                    <i class="fa fa-cube"></i> 
                    Borrar
                  </a>
                </div>
                <div v-if="banderaRegresaPendiente" class="box-body">
                  <div class="col-md-12 table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th width="15%" class="text-center">Fecha</th>
                            <th width="50%" class="text-center">Texto</th>
                            <th width="35%" class="text-center">Imagen</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item in itemsParrilla" v-bind:class="{'facebook-class':(item.nombre == 'Facebook'), 'twitter-class':(item.nombre == 'Twitter'), 'instagram-class':(item.nombre == 'Instagram'), 'animated zoomOutLeft':(item.id == removeRow) }">
                            <td width="15%" class="text-center td-imagen">
                              {{ item.fecha_creacion }}
                              <br>
                              <i v-bind:class="{'fa fa-facebook':(item.nombre == 'Facebook'), 'fa fa-twitter':(item.nombre == 'Twitter'), 'fa fa-instagram':(item.nombre == 'Instagram')}"></i>
                            </td>
                            <td width="50%">{{ item.texto }}</td>
                            <td width="35%">
                              <a 
                                target="_blank" 
                                :href="'<?php echo base_url()?>assets/images/parrillaimagenes/'+ item.imagen">
                                <img 
                                  class="img-responsive center-block imagen-de-parrilla" 
                                  v-bind:src="'<?php echo base_url()?>assets/images/parrillaimagenes/' + item.imagen"
                                > 
                              </a>
                            </td>
                            <!-- <td class="text-center">
                              <button v-on:click.prevent="borrarItemParrilla(item.id)" > 
                                <i class="fa fa-trash"></i>
                              </button>
                            </td> -->
                            <!-- <td class="text-center">
                              <button > 
                                <i class="fas fa-pen"></i>
                              </button>
                            </td> -->
                          </tr>
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
            <!-- **** CREAR ITEMS A PARRILLA END **** -->
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