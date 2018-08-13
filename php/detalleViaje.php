
<?php
  session_start();
  if (isset($_SESSION['idUsuario']))
  { //incluimos el script php de funciones y conexion a la bd
    include('consultasUsuarios.php');
    $datos=$_SESSION['idUsuario'];
    if($errorConexion == false)
    {
        $m=explode(',', $datos);
        $idViaje=$m[2];
        //echo $idViaje;
        $datos = detalleViaje($mysqli, $idViaje);
        $estilo = jalarEstiloViaje($mysqli, $datos[5]);
        $datos[5]=$estilo[1];
        $login=$m[1];
        $usuario=$m[0];
        $idDestinos=$m[3];
        //echo $idDestinos;
        $consultaFoto = consultarFoto($mysqli, $usuario, $login);
        $viajes = mostrarViajes($mysqli, $usuario);
        $fecha1= date_format(date_create($datos[2]),'d / m / Y');
        $fecha2= date_format(date_create($datos[3]),'d / m / Y');
    }
    else{
    }
    $ruta = substr($consultaFoto[4], 25);
  }else
    echo "<script type='text/javascript'>window.location.href = '../login.php';</script>";
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../Imagenes/logo_50px.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Viaje</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--Import materialize.css-->


        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="../assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />

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
                            <a class="nav-link" href="agregarDestinosWishList.php">
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
                                <a href="<?php echo "ayudaLogin.php?v1=$login&v2=$usuario" ?>" class="dropdown-item">
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
            <div class="card container " id="detalle">
                <div class="card-header card-header-primary">
                  <div class="row">
                      <div class="col-md-6 col-sm-8">
                          <h4 class="card-title"><?php echo $datos[1] ?></h4>
                      </div>
                      <div class="col-md-6 col-sm-4">
                          <h5 class="card-text" style="text-align:right;"><?php echo $fecha1." - ".$fecha2 ?></h5>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-sm-8">
                          <h4 class="card-subtitle"><?php echo $datos[5] ?></h4>
                      </div>
                      <div class="col-md-6 col-sm-4">
                          <h5 class="card-subtitle" style="text-align:right;"><?php echo $datos[4] ?></h5>
                      </div>
                  </div>
                </div>
            <!-- DETALLE DE VIAJE DEL USUARIO -->
                <?php

                  $t=0;
                  $b=0;
                  for ($y=0; $y < strlen($idDestinos) ; $y++) {
                      $idD=substr($idDestinos, $y, 1);
                      $actividadesxDestino = consultaActividadesXDestino($mysqli, $idViaje, $idD);
                      $tamanio = sizeof($actividadesxDestino);
                      if ($actividadesxDestino[1][4] != "") {
                          echo '

                            <a style="font-family:Roboto; font-size:18px; margin-top: 35px;">
                            <i style="color:#6a1b9a;" class="material-icons">pin_drop</i>
                            '.$actividadesxDestino[1][4].'</a>

                          ';
                      }

                      for ($i=1; $i <=$tamanio ; $i++) {
                          $b=1;
                          $ruta = substr($actividadesxDestino[$i][3], 25);
                          if ($actividadesxDestino[$i][5] == null) {
                              $fecha = "Pendiente";
                          }else {
                              $fecha= date_format(date_create($actividadesxDestino[$i][5]),'d / m / Y ');
                          }
                          if ($ruta==null) {
                              $ruta="Imagenes/Actividades/default.png";
                          }

                          if($t==0)
                          {
                              echo '
                              <div class="row">
                              ';
                          }
                             echo '
                                 <div class="col-md-4 col-sm-12">
                                     <div class="card" style="width: 100%; height: 320px;">
                                         <div class="card-img-top">
                                             <img style="width: 100%; height: 200px;" src="../'.$ruta.'">
                                         </div>
                                         <div class="card-body">
                                             <span class="card-title">'.$actividadesxDestino[$i][1].'</span>
                                             <p class="card-text">'.$actividadesxDestino[$i][2].'</p>
                                              <p class="card-text">'.$fecha.'</p>
                                         </div>
                                   </div>
                                 </div>
                               '
                             ;
                             $t++;
                         if($t==3 || $i==$tamanio)
                         {
                             echo '
                               </div>
                             ';
                             $t=0;
                         }
                     }
                     echo ' <div class="dropdown-divider"></div>';
                  }
                  if ($b==0) {
                      echo '<h5 class="info-title" style="text-align: center; padding: 25px;">No hay actividades registradas en este viaje</h5>
                      <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>';
                  }
                ?>

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

    </body>

</html>
