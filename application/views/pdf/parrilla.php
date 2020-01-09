<html>
  <head>
    <link rel="stylesheet" type="text/css" href="./assets/css/parrilla.css">
  </head>

  <body>
    <header>
        <table>
          <tr id="fila">
            <td id="header_logo">
                <img id="logo" src="./assets/images/logo_central_zone.png">
            </td>
            <td id="header_texto">
                <div><?php echo $itemsParrilla[0]->nombre_parrilla;?></div>
            </td>
          </tr>
        </table>
    </header>

    <table border="1" id="table_info">
       <thead>
           <tr>
               <th>Fecha</th>
               <th>Texto</th>
               <th>Imagen</th>
           </tr>
       </thead>
       <tbody>
          <?php foreach ($itemsParrilla as $item) { ?>

            <?php 
                  switch($item->nombre){ 
                    case 'Facebook': ?>
                      <tr>
                        <td id="td-fecha" style="background: #3b5998">
                          <?php echo $item->fecha_creacion;?>
                          <br><br>
                          <img style="width: 25px" src="./assets/images/logos_redes/facebook.png">
                        </td>
                        <td id="td-texto"><?php echo $item->texto;?></td>
                        <td id="td-imagen">
                          <img id="itemImagen" src="./assets/images/parrillaimagenes/<?php echo $item->imagen;?>">
                        </td>
                      </tr>
                  <?php break; 
                    case 'Twitter':?>
                      <tr>
                        <td id="td-fecha" style="background: #5EA9DD">
                          <?php echo $item->fecha_creacion;?>
                          <br><br>
                          <img style="width: 25px" src="./assets/images/logos_redes/twitter.png">
                        </td>
                        <td id="td-texto"><?php echo $item->texto;?></td>
                        <td id="td-imagen">
                          <img id="itemImagen" src="./assets/images/parrillaimagenes/<?php echo $item->imagen;?>">
                        </td>
                      </tr>
                  <?php break;
                    case 'Instagram':  ?>
                      <tr>
                        <td id="td-fecha" style="background: #7f6000">
                          <?php echo $item->fecha_creacion;?>
                          <br><br>
                          <img style="width: 25px" src="./assets/images/logos_redes/instagram.png">
                        </td>
                        <td id="td-texto"><?php echo $item->texto;?></td>
                        <td id="td-imagen">
                          <img id="itemImagen" src="./assets/images/parrillaimagenes/<?php echo $item->imagen;?>">
                        </td>
                      </tr>
                  <?php break;?>

            <?php } //end switch?>
            
          <?php  } //end foreach?>
       </tbody>
    </table>
  </body>
</html>
