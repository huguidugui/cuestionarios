<section id="appParrilla">
  <div class="container">
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

  <div id="edicion" class="container">
      <?php
        $atributos = array('id' => 'imagen-form');
        echo form_open_multipart('tareas_ajax/crear_item_parrilla', $atributos);
      ?>
      <div class="row">
        <div class="col-md-6">
          <div class="row row-custom">
              <div class="col-md-12">
                  <select  
                      v-model="itemParrilla.id"
                      v-on:change="onChangeParrilla(itemParrilla.id)" 
                      class="form-control">
                    <option value="0" selected=""> Selecciona... </option>
                    <optgroup v-for="(value, key) in parrillas" v-bind:label="key">
                      <option v-for="(valor, llave) in value" v-bind:value="valor.id">{{valor.nombre_parrilla}}</option>
                  </select>
              </div>
          </div>

          <div class="row row-custom">
              <div class="col-md-6">
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
              <div class="col-md-6">
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
          </div>
          <div class="row row-custom">
              <div class="col-md-12">
                  <textarea v-model="itemParrilla.texto" style="width: 100%" rows="8"></textarea>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row row-custom">
            <div class="col-md-12 text-center">
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
  <?php echo form_close();?>

  <div v-if="itemParrilla.id > 0" id="tabla-parrilla" class="container">
    <div class="row">
      <div class="col-md-12 table-responsive">
        <a v-bind:href="'<?php echo base_url();?>recordar/prueba/' + itemParrilla.id" target="_blank">asdasd</a>
        <table class="table table-bordered">
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
                {{ item.fecha_creacion }}<br>
                <i v-bind:class="{'fab fa-facebook':(item.nombre == 'Facebook'), 'fab fa-twitter':(item.nombre == 'Twitter'), 'fab fa-instagram':(item.nombre == 'Instagram')}"></i>
              </td>
              <td>
                {{ item.texto }}
              </td>
              <td>
                  <img 
                    class="img-responsive center-block imagen-de-parrilla" 
                    v-bind:src="'./../assets/images/parrillaimagenes/' + item.imagen"> 
              </td>
              <td class="text-center">
                <button v-on:click.prevent="borrarItemParrilla(item.id)" > 
                  <i class="fa fa-trash"></i>
                </button>
              </td>
              <td class="text-center">
                <button > 
                  <i class="fa fa-edit"></i>
                </button>


              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
