

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery3-4-1.min.js"></script><!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap4/bootstrap.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/fastclick.js"></script>
    <script src="<?php echo base_url();?>assets/js/adminlte.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/swal.min.js"></script>
	<!-- <script src="<?php echo base_url();?>assets/js/dashboard.js"></script> -->
	<script src="<?php echo base_url();?>assets/js/demo.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/wow.js"></script>
    <?php
        $method = $this->router->fetch_method();
        $controller = $this->router->fetch_class();
        if($controller == 'parrillas' && $method == 'crearParrillas') {  ?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue-resource.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/app.js?ver=1.0"></script>
    <?php } ?>


    <?php
        $method = $this->router->fetch_method();
        $controller = $this->router->fetch_class();
        if($controller == 'parrillas' && $method == 'crearParrillasComponentes') {  ?>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue-resource.min.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/componentes/app-crear-parrillas.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/componentes/app-crear-items.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/componentes/app-marvel.js"></script>
            <script type="text/javascript" src="<?php echo base_url();?>assets/js/componentes/app.js"></script>
    <?php } ?>

    <?php
      if(strpos(current_url(), 'implementacion')) { ?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/vue-resource.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/app-implementacion.js"></script>
    <?php } ?>
    </body>
</html>
