<?php
    //incluimos el script php de funciones y conexion a la bd
    include('consultasUsuarios.php');

    if($errorConexion == false)
    {
        $login=$_GET['v1'];
        $usuario=$_GET['v2'];
    }
    else{
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
                            <a class="nav-link" href="<?php echo "Perfil.php?v1=$login&v2=$usuario" ?>">
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
                <div class="card container " id="detalle">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Ayuda</h4>
                    </div>

                </div>
                <div style="width: 60%;  display:block; margin: auto; padding-bottom: 50px; padding-top: 30px;">
                    <div class="video-container">
                        <iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
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
