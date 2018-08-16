<?php
  session_start();
  if (isset($_SESSION['idUsuario']))
  { //incluimos el script php de funciones y conexion a la bd
    include('consultasUsuarios.php');
    include('conexion.php');
    $conexion=conexion();
    if($errorConexion == false)
    {
        // session_start();
      $datos=$_SESSION['idUsuario'];
      $m=explode(',', $datos);
      $login=$m[0];
      $usuario=$m[1];
      $destino=$m[2];
    }
    else{
    }
  }else
    echo "<script type='text/javascript'>window.location.href = '../login.php';</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="../Imagenes/logo_50px.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Detalles de destino</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
<!--Import materialize.css-->


<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<!-- CSS Files -->
<!-- <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/> -->
<link href="../assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="../assets/demo/demo.css" rel="stylesheet" />

<style media="screen">
    .green{
        background-color: #64dd17;
    }
    .green:hover{
      background-color: #6a1b9a;
    }
    .purple{
      background-color:  #6a1b9a;
    }

    /* The snackbar - position it at the bottom and in the middle of the screen */
  #agrega, #elimina {
      visibility: hidden; /* Hidden by default. Visible on click */
      min-width: 250px; /* Set a default minimum width */
      margin-left: -125px; /* Divide value of min-width by 2 */
      background-color: #333; /* Black background color */
      color: #fff; /* White text color */
      text-align: center; /* Centered text */
      border-radius: 2px; /* Rounded borders */
      padding: 16px; /* Padding */
      position: fixed; /* Sit on top of the screen */
      z-index: 1; /* Add a z-index if needed */
      left: 50%; /* Center the snackbar */
      bottom: 30px; /* 30px from the bottom */
  }

  /* Show the snackbar when clicking on a button (class added with JavaScript) */
  #agrega.show, #elimina.show {
      visibility: visible; /* Show the snackbar */

  /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
  However, delay the fade out process for 2.5 seconds */
      -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
      animation: fadein 0.5s, fadeout 0.5s 2.5s;
  }

  /* Animations to fade the snackbar in and out */
  @-webkit-keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
  }

  @keyframes fadein {
      from {bottom: 0; opacity: 0;}
      to {bottom: 30px; opacity: 1;}
  }

  @-webkit-keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
  }

  @keyframes fadeout {
      from {bottom: 30px; opacity: 1;}
      to {bottom: 0; opacity: 0;}
  }
  .contenedor {
      width: auto;
      height: 400px;
      padding-left: 0px;
      padding-right: 10px;
      margin-top: 20px;
      margin-left: -15px;
      margin-right: 7px;
      background: #fff;
      overflow: auto;
      font-family: 'Open Sans';

}

  .contenedor::-webkit-scrollbar {
    width: 7px;
  }

  .contenedor::-webkit-scrollbar-thumb {
    background: #1faa00;
    border-radius: 5px;
  }
  .contenedor2 {
      width: auto;
      height: 305px;
      padding-left: 0px;
      padding-right: 10px;
      margin-top: 20px;
      margin-left: -15px;
      margin-right: 7px;
      background: #fff;
      overflow: auto;
      font-family: 'Open Sans';

  }

  .contenedor2::-webkit-scrollbar {
    width: 7px;
  }

  .contenedor2::-webkit-scrollbar-thumb {
    background: #1faa00;
    border-radius: 5px;
  }
  #circulo
  { width:45px;
    border-radius:50%;
    height:45px;
    margin-right:15px;
    margin-bottom:8px;
  }
  .linkm span
  { font-family:Roboto;
    font-size:18px;
    margin-top: 35px;
    color:white;
  }
  .linkm:hover span
  { color:#EBCCFF;
  }
  .linki
  { color:white;
  }
  .linki:hover
  { color:#EBCCFF;
  }
</style>
</head>

<body class="profile-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
            <a class=""> <img src="../Imagenes/LogoFleetock.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Perfil.php">
                        <i class="material-icons">card_travel</i> Viajes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregarDestinosWishList.php" onclick="">
                        <i class="material-icons">place</i> Destinos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="muestraWishList.php">
                        <i class="material-icons">favorite</i> Wish List
                        </a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="material-icons">apps</i> Otros
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="https://drive.google.com/file/d/0B7zGJAz3xz9iQno0UHpxSUwtSG8/view?usp=sharing" target="_blank" class="dropdown-item">
                                <i class="material-icons">cloud_download</i> Descargar
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="material-icons">help</i> Ayuda
                            </a>
                            <a href="salir.php" class="dropdown-item">
                                <i class="material-icons">exit_to_app</i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url('../Imagenes/portada.jpg');"></div>
    <div class="main main-raised">
      <!-- The actual snackbar -->
      <div id="agrega">Agregado al Wish List</div>
      <div id="elimina">Eliminado del Wish List</div>
      <?php
        function quitar_tildes($cadena) {
          $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
          $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
          $texto = str_replace($no_permitidas, $permitidas ,$cadena);
          return $texto;
        }
        $sql="SELECT nombre, pais, foto, round(avg(calificacion)) FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino='$destino';";
        $result=mysqli_query($conexion, $sql);
        while($ver =mysqli_fetch_row($result))
        { // Comprueba que tenga imagen
          $imagen=$ver[2];
          if (!file_exists('../'.$ver[2]))
           $imagen='Imagenes/Destinos/default.png';
          // Separar el nombre del destino
          $destinoPagina=explode(', ', $ver[0]); // Toma la palabra(s) que esta antes de la coma
          $destinoPagina[1]=quitar_tildes($destinoPagina[1]);// Quita las tildes para poder mandar la palabra(s) por la url
          $destinoPagina[1]=strtolower($destinoPagina[1]);// Convierte el resultado a minusculas
          // Para saber si ya esta en el Wish List
          $wish='SELECT * FROM deseos WHERE destino_idDestino='.$destino.' AND usuario_idUsuario='.$usuario.';';
          $buscarDestinoWish = $conexion->query($wish);
          if ( $buscarDestinoWish->num_rows > 0 )
          { $clase='purple';
            $icono='favorite';
          }
          else
          { $clase='green';
            $icono='add';
          }
          // Poner estrellitas en la calificacion
          $calificacion2='';
          if ($ver[3]!=NULL)
            {
              for ($x=0; $x<5; $x++){
                if($ver[3]>0){
                  $calificacion2.='<span class="material-icons">star</span>';
                  $ver[3]=$ver[3]-1;
                }else
                    $calificacion2.='<span class="material-icons">star_border</span>';
                }
            }
          else
            $calificacion2='<span class="material-icons">star_border</span>
            <span class="material-icons">star_border</span>
            <span class="material-icons">star_border</span>
            <span class="material-icons">star_border</span>
            <span class="material-icons">star_border</span>';
      ?>
        <div class="card container " id="detalle">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-lg-4">
                  <h4 class="card-title"><?php echo $ver[0]?></h4>
                  <h5 class="card-text"><?php echo $ver[1] ?></h5>
                </div>
                <div class="offset-lg-5 col-lg-3">
                    <?php echo $calificacion2 ?>
                    <div>
                      <a href="https://www.visitmexico.com/es/busqueda?title=<?= $destinoPagina[1] ?>&body=<?= $destinoPagina[1] ?>" target="_blank" class="linkm">
                        <i class="linki material-icons">link</i><span>Más información</span>
                      </a>
                    </div>
                </div>
              </div>
            </div>
        </div>
            <?php }  ?>
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <img style="width: 100%;height: 95%;" src="../<?= $imagen ?>">
              <a style="position:absolute; margin-left:80%; margin-top:-20px;" id="<?php echo $destino ?>" class="btn btn-fab btn-round <?php echo $clase ?>">
                <i class="material-icons" style="color:white;"><?php echo $icono ?></i>
              </a>
            </div>
            <div class="col-lg-6">
              <a style="font-family:Roboto; font-size:18px; margin-top: 35px;">
                <i style="color:#6a1b9a;" class="material-icons">speaker_notes</i> Comentarios
              </a>
                <?php // Comentarios del destino
                  $sql="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE Destino_idDestino='$destino';";
                  $result=mysqli_query($conexion, $sql);
                  if ( $result->num_rows > 0 )
                  { echo '<div class="contenedor">';
                    while($ver =mysqli_fetch_row($result))
                    { // Comprueba que tenga imagen de usuario
                      if (!file_exists('../'.$ver[5]) || $ver[5]==null)
                       $ver[5]='Imagenes/Usuarios/default.png';
                      $fecha= date_format(date_create($ver[4]),'d / m / Y');
                      $calificacion2='';
                      if ($ver[2]!=NULL)
                        {
                          for ($x=0; $x<5; $x++){
                            if($ver[2]>0){
                              $calificacion2.='<span class="material-icons" style="font-size: 18px;">star</span>';
                              $ver[2]=$ver[2]-1;
                            }else
                                $calificacion2.='<span class="material-icons" style="font-size: 18px;">star_border</span>';
                            }
                        }
                      else
                        $calificacion2='<span class="material-icons" style="font-size: 18px;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;">star_border</span>';
                 ?>
                 <div class="container">
                     <div class="d-flex w-100 justify-content-between">
                       <h4 class="mb-1"><strong><?php echo $ver[0]?></strong></h4>
                       <small class="text-muted"><?php echo $fecha ?></small>
                     </div>
                     <img src="../<?php echo $ver[5] ?>" alt="" id="circulo">
                     <span class="mb-1" style="font-size:12px;"><?php echo $ver[3] ?></span>
                     <div class="row">
                       <p class="col-md-8 col-lg-8"><?php echo $ver[1] ?></p>
                       <small class="col-md-4 col-lg-4">
                         <?php echo $calificacion2 ?>
                       </small>
                      </div>
                      <div style="border-top: 1px solid #e0e0e0;"></div>
                  </div>
                <?php
                    }
                    echo '</div>';
                  }
                    else echo '
                              <div class="card">
                                <h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron comentarios</h5>
                                <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                              </div>';
                    ?>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <a style="font-family:Roboto; font-size:18px; margin-top: 35px;">
                <i style="color:#6a1b9a;" class="material-icons">collections</i> Actividades
              </a>
                <?php
                  $sql="SELECT actividad.nombre, tiene.foto, actividad.descripcion, tiene.localizacion,tiene.idTiene FROM actividad INNER JOIN tiene ON actividad.idActividad = tiene.Actividad_idActividad where tiene.Destino_idDestino = '$destino';";
                  $result=mysqli_query($conexion, $sql);
                  if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                  { echo '<div class="row">';
                    while($ver =mysqli_fetch_row($result))

                    {
                        $ver[1]=substr($ver[1], 25);
                    {// Comprueba que tenga imagen de actividad
                      if (!file_exists('../'.$ver[1]) || $ver[1]==null)
                       $ver[1]='Imagenes/Actividades/default.png';
                ?>
                <div class="col-md-6 col-sm-12 col-lg-6">
                  <div class="card" style="width: 100%; height: 350px;">
                    <div class="card-img-top">
                        <img style="width: 100%; height: 200px;" src="../<?php echo $ver[1] ?>">
                    </div>
                    <div class="card-body">
                        <span class="card-title"><?php echo $ver[0] ?></span>
                        <p class="card-text"><?php echo $ver[2] ?></p>
                        <p class="card-text"><?php echo $ver[3] ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                  <div class="row" style="margin-top: 30px;">
                  </div>
                  <a style="font-family:Roboto; font-size:18px; margin-top: 0px;">
                    <i style="color:#6a1b9a;" class="material-icons">speaker_notes</i> Comentarios
                  </a>
                  <?php
                    $sql2="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE actividad_idActividad='$ver[4]';";
                    $result2=mysqli_query($conexion, $sql2);
                    if ( $result2->num_rows > 0 )
                    {
                      echo '<div class="contenedor2">';
                       while($ver =mysqli_fetch_row($result2))
                       { // Comprueba que tenga imagen de usuario
                         if (!file_exists('../'.$ver[5]) || $ver[5]==null)
                          $ver[5]='Imagenes/Usuarios/default.png';
                         $fecha= date_format(date_create($ver[4]),'d / m / Y');
                         $calificacion2='';
                         if ($ver[2]!=NULL)
                           {
                             for ($x=0; $x<5; $x++){
                               if($ver[2]>0){
                                 $calificacion2.='<span class="material-icons" style="font-size: 18px;">star</span>';
                                 $ver[2]=$ver[2]-1;
                               }else
                                   $calificacion2.='<span class="material-icons" style="font-size: 18px;">star_border</span>';
                               }
                           }
                         else
                           $calificacion2='<span class="material-icons" style="font-size: 18px;">star_border</span>
                           <span class="material-icons" style="font-size: 18px;">star_border</span>
                           <span class="material-icons" style="font-size: 18px;">star_border</span>
                           <span class="material-icons" style="font-size: 18px;">star_border</span>
                           <span class="material-icons" style="font-size: 18px;">star_border</span>';
                    ?>
                    <div class="container">
                        <div class="d-flex w-100 justify-content-between">
                          <h4 class="mb-1"><strong><?php echo $ver[0]?></strong></h4>
                          <small class="text-muted"><?php echo $fecha ?></small>
                        </div>
                        <img src="../<?php echo $ver[5] ?>" alt="" id="circulo">
                        <span class="mb-1" style="font-size:12px;"><?php echo $ver[3] ?></span>
                        <div class="row">
                          <p class="col-md-8 col-lg-8"><?php echo $ver[1] ?></p>
                          <small class="col-md-4 col-lg-4">
                            <?php echo $calificacion2 ?>
                          </small>
                         </div>
                         <div style="border-top: 1px solid #e0e0e0;"></div>
                     </div>
                   <?php
                       }
                       echo '</div>';
                     }
                       else echo '
                                 <div class="card">
                                   <h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron comentarios</h5>
                                   <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                                 </div>';
                   ?>
                </div>
                <?php
                    }
                    echo '</div>';
                  }
                  else {
                    echo '<div class="card container"><h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron actividades</h5>
                            <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                          </div>';
                  }
                ?>

            </div>
          </div>
          <div class="container">
            <div class="row">
              <a style="font-family:Roboto; font-size:18px; margin-top: 35px;">
                <i style="color:#6a1b9a;" class="material-icons">airport_shuttle</i> Transportes
              </a>
              <div class="row">
              <?php
                $sql="SELECT transporte.tipo, transporte.foto, corresponde.costo FROM transporte
                      INNER JOIN sedesplazaen ON transporte.idTransporte = sedesplazaen.Transporte_idTransporte
                      inner join corresponde on corresponde.sedesplazaen_idSeDesplazaEn = sedesplazaen.idSeDesplazaEn
                      WHERE sedesplazaen.Destino_idDestino ='$destino';";
                $result=mysqli_query($conexion, $sql);
                if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
<<<<<<< HEAD
                {   $col=0;
                  while($ver =mysqli_fetch_row($result))
                  {
                    if($col==0)
                      echo '<div class="row">';
                    $col=$col+1;
                    $ver[1] = substr($ver[1], 25);
=======
                { while($ver =mysqli_fetch_row($result))
                  { // Comprueba que tenga imagen de transporte
                    if (!file_exists('../'.$ver[1]) || $ver[1]==null)
                      $ver[1]='Imagenes/Transportes/default.png';
>>>>>>> 5617bcba02e846e2d3b26631d99fd69d6bc70c27
              ?>
                <div class="col-md-4 col-sm-12 col-lg-4">
                  <div class="card" style="width: 100%; height: 300px;">
                      <div class="card-img-top">
                          <img style="width: 100%; height: 200px;" src="../<?php echo $ver[1] ?>">
                      </div>
                      <div class="card-body">
                          <span class="card-title"><?php echo $ver[0] ?></span>
                          <p class="card-text">$<?php echo number_format($ver[2],2); ?></p>
                      </div>
                  </div>
                </div>
              <?php
                  }
                }
                else {
                  echo '<div class="card container"><h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron Transportes</h5>
                          <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                        </div>';
                }
              ?>
              </div>
            </div>
          </div>
    </div>
    <footer>
    </footer>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--	Plugin for Sharrre btn -->
    <script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
    <script type="text/javascript">
    var id; // Variable para guardar el id del destino que se quiere agregar o quitar del wish list
    $('.btn-fab').click(function()
    {   var datos="ide="+$(this).attr("id")+"&usuario=<?php echo $usuario ?>"; // Se concatenan los datos que se mandaran
        id=$(this).attr("id"); // Se asigna el id del destino
        var mensaje="";
        if($(this).hasClass('purple')) // Si el destino tiene esta clase(purple) quiere decir que ya esta en el wish list y ahora se desea aliminar de este
        { datos+="&ban=1";
          mensaje="elimina";
        }
        else // Si el destino tiene esta clase(green) quiere decir que se agregara al wish list
        { datos+="&ban=0";
          mensaje="agrega";
        }
        $.ajax({ // Se mandan los datos al modelo
            url: 'modeloWishList.php',
            type: 'POST',
            data: datos,
            success: function(r)
            {   if(r==1)
                { myFunction(mensaje);
                  agregaClase(id,mensaje);
                }
            }
        });
      });
      function agregaClase(id,opc) // Cambia la clase del boton si se agrega/elimina exitosamente de la base de datos
      { if(opc=="agrega")
        { $("#"+id+"").removeClass('green').addClass('purple');
          $("#"+id+"").html('<i class="material-icons" style="color:white;">favorite</i>');
        }
        else
        { $("#"+id+"").removeClass('purple').addClass('green');
          $("#"+id+"").html('<i class="material-icons" style="color:white;">add</i>');
        }
      }
      function myFunction(opc)
      { console.log(opc);
        var x = document.getElementById(opc);
        // Add the "show" class to DIV
        x.className = "show";
        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
      }
    </script>
</body>
</html>
