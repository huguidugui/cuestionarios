
<section id="our-team">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-area">
          <h2 class="title">
            Cuestionario: <?php echo $nombreCuestionario;?>
          </h2>
          <span class="line"></span>
          <p>Lee con atención cada pregunta y elige una respuesta.</p>
        </div>
      </div>
    </div> <!-- /row -->

    <div class="row">
      <div class="col-md-12">
        <form style="padding: 0 15px;" role="form" action="<?php echo base_url();?>preguntas/evaluar" method="post" id="listarPreguntas">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="text">*Nombre:</label>
                <input 
                  id="candidato" 
                  class="form-control" 
                  type="text" 
                  name="candidato" 
                  placeholder="Pon tu nombre" />
                <input 
                  type="hidden" 
                  name="nombreCuestionario" 
                  value="<?php echo $nombreCuestionario;?>" />
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="text">*E-mail para enviar tus resultados:</label>
                <input 
                  id="emailCandidato" 
                  class="form-control" 
                  type="email" 
                  name="emailCandidato" 
                  placeholder="Pon tu correo" />
              </div>
            </div>
          </div> <!-- /row -->
                <?php
                  foreach ($allPreguntas as $key => $value) { ?>

                      <div  class="row cadaPregunta">
                          <div class="pregunta-sola col-lg-12 mirow_<?php echo $value->id;?>">
                              <?php echo ($key + 1) . '. ' . $value->pregunta; ?>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-lg-12 text-left alinear">
                            <label class="radio-inline">
                                <input type="radio" value="1" name="optradio_<?php echo $value->id?>"> <?php echo stripslashes(addslashes(htmlspecialchars($value->resp_1)));?>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-lg-12 text-left alinear">
                            <label class="radio-inline">
                              <input 
                                type="radio" 
                                value="2" 
                                name="optradio_<?php echo $value->id?>" />
                                  <?php echo stripslashes(addslashes(htmlspecialchars($value->resp_2))); ?>
                            </label>
                          </div>
                          <div class="col-xs-12 col-sm-12 col-lg-12 text-left alinear">
                            <label class="radio-inline">
                              <input 
                                type="radio" 
                                value="3" 
                                name="optradio_<?php echo $value->id?>" />
                                  <?php echo stripslashes(addslashes(htmlspecialchars($value->resp_3))); ?>
                            </label>
                          </div>
                      </div>
                <?php } ?>
                  <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 text-center error">
                      <!-- Aquí va el error obtenido con jQuery -->
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <input 
                      class="btn btn-success col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6" 
                      type="submit" 
                      value="Enviar">
                  </div>
              </form>
      </div>
    </div>
  </div>
</section>


