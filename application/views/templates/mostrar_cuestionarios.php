<section id="our-team">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="title-area">
               <h2 class="title">Cuestionarios</h2>
               <span class="line"></span>
               <p>Da click en el cuestionario que te indicó tu reclutador para contestarlo</p>
            </div>
         </div>
         <div class="col-md-12">
            <div class="our-team-content">
               <div class="row">
                  <?php foreach($cuestionarios as $cuestionario) { ?>
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="single-team-member">
                        <div class="team-member-name">
                           <p><?php echo $cuestionario->tema;?></p>
                        </div>
                        <div class="team-member-link">
                           <a href="<?php echo base_url();?>cuestionarios/ver_preguntas/<?php echo $cuestionario->id;?>/<?php echo $cuestionario->tema;?>">
                           <button class="btn btn-info col-xs-12 col-lg-12 ">
                           Hacer cuestionario
                           </button>
                           </a>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>