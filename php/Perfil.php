<?php
//incluimos el script php de funciones y conexion a la bd
    include('consultasUsuarios.php');
    if($errorConexion == false)
    {
        $login=$_GET['v1'];
        $usuario=$_GET['v2'];
        $consultaFoto = consultarFoto($mysqli, $usuario, $login);
        $viajes = mostrarViajes($mysqli, $usuario);
    }
    $ruta = substr($consultaFoto[4], 25);
    if ($ruta == "") {
        $ruta = "Imagenes/Usuarios/default.png";
    }
?>

<!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../Imagenes/logo_50px.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    Perfil
    </title>
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
                            <a class="nav-link" href="#" style="hover: #38006b !important;" onclick="">
                                <i class="material-icons">card_travel</i> Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "agregarDestinosWishList.php?v1=$login&v2=$usuario" ?>" onclick="">
                                <i class="material-icons">place</i> Destinos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo "muestraWishList.php?v1=$login&v2=$usuario" ?>" onclick="">
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
                                <a href="../login.php" class="dropdown-item">
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
                <div class="profile-content">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-6 ml-auto mr-auto">
                            <div class="profile">
                                <div class="avatar">
                                    <img src="../<?php echo $ruta ?>" style="height:150px !important; width:150px !important;" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="title"><?php echo "$consultaFoto[1] $consultaFoto[2]" ?></h3>
                                    <p style="margin-top:-15px;"><?php echo "@$consultaFoto[3]" ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VIAJES DEL USUARIO -->
                    <?php
                    $i=0;
                    if($viajes -> num_rows != 0)
                    {
                        //guardo los viajes que tiene el usuario
                        while($carta = $viajes -> fetch_assoc())
                        {
                            $array = array(
                                1  => $carta['idViaje'],
                                2 => $carta['nombre'],
                                3 => $carta['estadoDelViaje']
                            );

                            //cuento cuantos destinos tiene cada viaje
                            $cantidadDestinos = contarDestinosViaje($mysqli, $array[1]);
                            if($cantidadDestinos -> num_rows != 0)
                            {
                                while($num = $cantidadDestinos -> fetch_assoc())
                                {
                                    $noDestinos = array(
                                    1  => $num['destinos']
                                    );
                                }
                            }

                            //consulto la foto y el nombre del destino del viaje
                            $destino = consultarDestinosViaje($mysqli, $array[1]);
                            $y=0;
                            $destinoFinal="";
                            $destinos="";
                            if($destino -> num_rows != 0)
                            {
                                while($r = $destino -> fetch_assoc())
                                {
                                    $y++;
                                    //si el viaje tiene más de un destino
                                    if($noDestinos[1] > 1)
                                    {
                                    $aDestinos = array(
                                        $y => array(
                                            1 => $r['idDestino'],
                                            2  => $r['foto'],
                                            3  => $r['lugar']
                                            )
                                        );
                                    if($y>1)
                                    {
                                        $destinoFinal= $destinoFinal . " | " . $aDestinos[$y][3];
                                    }
                                    else
                                        $destinoFinal= $destinoFinal . $aDestinos[$y][3];

                                    $destinos = $destinos . $aDestinos[$y][1];

                                    }else
                                    { //si solo tiene un destino
                                        $aDestinos = array(
                                            1 => $r['idDestino'],
                                            2  => $r['foto'],
                                            3  => $r['lugar']
                                        );
                                        $destinoFinal=$aDestinos[3];
                                    }
                                }
                            }

                            //si el viaje tiene más de un destino
                            if($noDestinos[1] > 1)
                            {
                                //me imprime una foto de destino en general
                                $ruta = 'Imagenes/Destinos/multiple5.png';
                            }
                            else {
                                //si no, me imprime la foto del destino
                                $ruta = substr($aDestinos[2], 25);
                            }
                            if($i==0)
                            {
                                echo '
                                <div class="row">
                                ';
                            }
                            echo '
                                <div class="col-md-4 col-sm-12">
                                <div class="card" style="width: 100%; height: 360px;">
                                <div class="card-img-top">
                                <img style="width: 100%; height: 200px;" src="../'.$ruta.'">
                                <a href="detalleViaje.php?v='.$array[1].'&v1='.$login.'&v2='.$usuario.'&d='.$destinos.'" style="position:absolute; margin-left:80%; margin-top:-20px;" class="btn btn-fab btn-round">
                                <i class="material-icons">local_play</i>
                                </a>
                                </div>
                                <div class="card-body">
                                <span class="card-title center-align">'.$array[2].'</span>
                                <p class=" card-text center-align">'.$destinoFinal.'</p>
                                <p class="card-text center-align">'.$array[3].'</p>
                                </div>
                                </div>
                                </div>
                                '
                            ;
                            $i=$i+1;
                            if($i==3)
                            {
                                echo '
                                </div>
                                ';
                                $i=0;
                            }

                        }
                    }
                    else {
                        echo '
                        <h5 class="info-title" style="text-align: center;">¡Crea un viaje desde nuestra aplicación!</h5>
                        <a href="https://drive.google.com/file/d/0B7zGJAz3xz9iQno0UHpxSUwtSG8/view?usp=sharing" id="descargaViajes" target="_blank" class="" style="padding-bottom: 25px;">
                        <i class="material-icons">cloud_download</i> Descargar App
                        </a>
                        ';
                    }
                    ?>

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

    </body>

</html>
