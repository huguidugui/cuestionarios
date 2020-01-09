 <div id="appParrilla" class="content-wrapper">
   <?php
      if($this->session->userdata('ci_session')) {
        $session_data = $this->session->userdata('ci_session');
        $id = $session_data['id'];
        $nick = $session_data['username'];
        $nombreCompleto = $session_data['nombre_completo'];
        $perfil = $session_data['perfil'];
        $correo = $session_data['correo'];
    ?>

    <script>window.usuarioId = <?php echo $id;?>;</script>

        <section class="content-header">
          <h1>
            Parrillas 
            <small>Administrar parrillas</small>
          </h1>
        </section>

        <!-- ============================= -->       
        <!-- SECCION CREAR PARRILLAS START -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">Crear parrilla</h3>
                  </div>
                  <div class="box-body">
                    <div class="row">
                        <form>
                          <div class="col-md-3">
                            <label>Proyecto</label>
                            <select v-model="parrilla.proyecto" class="form-control">
                              <option value="0" selected=""> Selecciona proyecto... </option>
                              <option 
                                v-for="proyecto in proyectos" 
                                v-bind:value="proyecto.id"> 
                                {{ proyecto.nombre }} 
                              </option>
                            </select>
                          </div>
                          <div class="col-md-3">
                            <label>Fecha inicio</label>
                            <input 
                              class="form-control" 
                              type="date"
                              id="fecha_inicio"
                              v-model = "parrilla.fechaInicio">
                          </div>
                          <div class="col-md-3">
                            <label>Fecha fin</label>
                            <input 
                              class="form-control" 
                              type="date"
                              id="fecha_fin"
                              v-model = "parrilla.fechaFin">
                          </div>
                          <div class="col-md-3">
                            <label style="visibility: hidden;">Proyecto</label>
                            <button 
                              class="btn btn-info col-md-12"
                              v-bind:disabled="!botonDisabledCrearParrilla"
                              v-on:click.prevent="crearParrilla()">
                                Crear parrilla
                            </button>
                          </div> 
                          <div class="col-md-12"
                              v-bind:class="[mensajeParrillaCreada.mensaje, mensajeParrillaCreada.specificClass, mensajeParrillaCreada.generalClass]"  
                              v-if="confirmacionParrillaCreada">Parrilla creada :)
                          </div>
                        </form>
                    </div>
                  </div>
              </div>
            </div>

            <!-- **** CREAR ITEMS A PARRILLA START **** -->
            <div class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Crear items a parrilla</h3>
                </div>
                <div class="box-body">
                  <?php
                    $atributos = array('id' => 'imagen-form');
                    echo form_open_multipart('tareas_ajax/crear_item_parrilla', $atributos);
                  ?>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="col-md-12 row-custom">
                              <select  
                                  v-model="itemParrilla.id"
                                  v-on:change="onChangeParrilla(itemParrilla.id)" 
                                  class="form-control">
                                <option value="0" selected=""> Selecciona... </option>
                                <optgroup v-for="(value, key) in parrillas" v-bind:label="key">
                                  <option v-for="(valor, llave) in value" v-bind:value="valor.id">{{valor.nombre_parrilla}}</option>
                              </select>
                          </div>
                          <div class="col-md-6 row-custom">
                              <select
                                  v-model="itemParrilla.redSocial" 
                                  class="form-control">
                                <option value="0" selected=""> Red Social... </option>
                                <option 
                                  v-for="red in redes" 
                                  v-bind:value="red.id"> 
                                  {{ red.nombre }} 
                                </option>
                              </select>
                          </div>
                          <div class="col-md-6 row-custom">
                              <select
                                  v-model="itemParrilla.dia" 
                                  class="form-control">
                                <option value="0" selected=""> Día... </option>
                                <option 
                                  v-for="(dia, key ) in dias" 
                                  v-bind:value="key"> 
                                  {{ dia }} 
                                </option>
                              </select>
                          </div>
                          <div class="col-md-12 row-custom">
                              <textarea v-model="itemParrilla.texto" style="width: 100%" rows="8"></textarea>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="col-md-12 text-center row-custom">
                              <div class="form-group">
                                <input 
                                    v-on:change="onChangeImage"
                                    type="file" 
                                    class="form-control-file" 
                                    id="userfile" 
                                    name="userfile"
                                    autoComplete="off"
                                    accept="image/*">
                              </div>
                              <div class="col-md-12 imagen-preview" v-if="itemParrilla.imagen.length > 0">
                                <img style="width: 200px"  v-bind:src="itemParrilla.imagen">
                              </div>
                          </div>

                        </div>
                    </div>
                  <?php echo form_close();?>
                  <div class="col-md-12"
                    v-bind:class="[mensajeItemParrillaCreada.mensaje, mensajeItemParrillaCreada.specificClass, mensajeItemParrillaCreada.generalClass]"  
                    v-if="confirmacionItemParrillaCreada">Se ha creado el item en la parrilla :)
                  </div>
                  <div class="col-md-offset-3 col-md-6 text-center">
                      <button 
                        class="btn btn-success col-md-12"
                        type="submit" 
                        name="upload" 
                        v-bind:disabled="!botonDisabledCrearItemParrilla"
                        v-on:click.prevent="crearItemParrilla()">
                        Agregar a parrilla
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- **** CREAR ITEMS A PARRILLA END **** -->
            <div v-if="itemParrilla.id > 0" class="col-md-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <a 
                    v-bind:href="'<?php echo base_url();?>recordar/prueba/' + itemParrilla.id"
                    target="_blank"
                    class="btn btn-app"
                    title="Generar PDF de la parrilla"
                    v-show="ocultarSinElementos"
                  >
                    <i class="fa fa-file-pdf-o"></i> 
                    PDF
                  </a>
                  <a 
                    class="btn btn-app"
                    :title="accionTerminada.textoTitle"
                    v-on:click.prevent="darPorTerminada(itemParrilla.id, accionTerminada.textoAccion)"
                    v-show="ocultarSinElementos"
                  >
                    <i class="fa fa-cube"></i> 
                    {{ terminada[0].terminada }} 
                  </a>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 table-responsive">
                      <table v-show="ocultarSinElementos" class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Texto</th>
                            <th class="text-center">Imagen</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="item in tablaItemsParrilla" v-bind:class="{'facebook-class':(item.nombre == 'Facebook'), 'twitter-class':(item.nombre == 'Twitter'), 'instagram-class':(item.nombre == 'Instagram'), 'animated zoomOutLeft':(item.id == removeRow) }">
                            <td class="text-center td-imagen">
                              {{ item.fecha_creacion }}
                              <br>
                              <i v-bind:class="{'fa fa-facebook':(item.nombre == 'Facebook'), 'fa fa-twitter':(item.nombre == 'Twitter'), 'fa fa-instagram':(item.nombre == 'Instagram')}"></i>
                            </td>
                            <td>{{ item.texto }}</td>
                            <td>
                                <img 
                                  class="img-responsive center-block imagen-de-parrilla" 
                                  v-bind:src="'./../assets/images/parrillaimagenes/' + item.imagen"
                                > 
                            </td>
                            <td class="text-center">
                              <button v-on:click.prevent="borrarItemParrilla(item.id)" > 
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
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