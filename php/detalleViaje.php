<?php
    //incluimos el script php de funciones y conexion a la bd
    include('consultasUsuarios.php');

    if($errorConexion == false)
    {
        $idViaje=$_GET['v'];
        $datos = detalleViaje($mysqli, $idViaje);
        $estilo = jalarEstiloViaje($mysqli, $datos[5]);
        $destino = jalarDestino($mysqli, $datos[6]);
        $actividades = actividadesViaje($mysqli, $idViaje);
        $datos[5]=$estilo[1];
        $datos[6]=$destino[1];
        $login=$_GET['v1'];
        $usuario=$_GET['v2'];
        $consultaFoto = consultarFoto($mysqli, $usuario, $login);
        $viajes = mostrarViajes($mysqli, $usuario);
    }
    else{
    }
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


      <header>
          <nav>
               <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
           </nav>

             <ul id="slide-out" class="sidenav">

               <li>
                   <div class="user-view">
                     <div class="background">
                       <img src="" id="fotoPortada">
                     </div>
                     <a href="#user"><img class="circle" src="<?php echo $ruta ?>" id="fotoPerfil"></a>
                     <a href="#name"><span class="black-text name" id="Nombre"> <?php echo "$consultaFoto[1] $consultaFoto[2]" ?> </span></a>
                     <a href="#email"><span class="black-text email" id="userName"><?php echo "@$consultaFoto[3]" ?></span></a>
                   </div>
               </li>

               <li><a href="<?php echo "Perfil.php?v1=$login&v2=$usuario" ?>" id="viajes" class="waves-effect" ><i class="material-icons">landscape</i>Viajes</a></li>
               <li><a id="lista" class="waves-effect" ><i class="material-icons">format_list_bulleted</i>Wish list</a></li>
               <li><div class="divider"></div></li>
               <li><a href="https://drive.google.com/file/d/0B7zGJAz3xz9iQno0UHpxSUwtSG8/view?usp=sharing" target="_blank" id="descarga" class="waves-effect" ><i class="material-icons">cloud_download</i>Descargar Fleetock</a></li>
               <li><a id="ayuda" class="waves-effect" ><i class="material-icons">help</i>Ayuda</a></li>

             </ul>
      </header>
    </head>


    <body>
        <?php

            for($i=1; $i<=6; $i++)
            {
                echo "viaje: $datos[$i]";
                echo '<br>';
            }

            $tamanio = sizeof($actividades);

            $t=0;
            for ($i=1; $i <=$tamanio ; $i++) {
                if($t==0)
                {
                    echo '
                    <div class="row">
                    ';
                }
                   echo '
                       <div class="col s12 m3">
                           <div class="card">
                               <div class="card-image">
                                   <img src="../'.$actividades[$i][2].'">
                               </div>
                               <div class="card-content">
                                   <span class="card-title">'.$actividades[$i][1].'</span>
                                   <p>'.$actividades[$i][3].'</p>
                               </div>
                         </div>
                       </div>
                     '
                   ;
                   $t++;
               if($t==3)
               {
                   echo '
                     </div>
                   ';
                   $t=0;
               }
           }
         ?>
      <!--JavaScript at end of body for optimized loading-->
      <script src="../jquery/jquery.js"></script>
      <script src="../js/materialize.js"></script>
      <script type="text/javascript" src="../js/login.js"></script>
    </body>
  </html>
