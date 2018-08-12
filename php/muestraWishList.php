
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
                            <a class="nav-link" href="#" onclick="">
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
                        <h4 class="card-title">Mi Wish List</h4>
                    </div>
                </div>
                <div class="container">
                      <div class="form-row align-items-right">
                         <div class="offset-lg-4 col-lg-8">
                           <div class="input-group">
                             <div class="input-group-prepend">
                               <div class="input-group-text"><i class="material-icons">search</i></div>
                             </div>
                             <input type="text" class="form-control" id="buscador" placeholder="">
                           </div>
                         </div>
                      </div>

                    <div class="cargar">

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
        $('.cargar').load("WishList.php?usuario=<?php echo $usuario ?>");
        $("#buscador").keyup(function(){
            var buscar = $("#buscador").val().replace(' ', '%20');
            var data="buscar="+buscar+"&opcion=1&usuario=<?php echo $usuario ?>";
            $.ajax({
              url: "Destinos.php",
              type:"POST",
              data:data,
              success:function(r){
                //console.log(r);
                $('.cargar').load('WishList.php?'+data);
              }
            });
        });
        </script>
    </body>

</html>
