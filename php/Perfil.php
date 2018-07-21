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
                     <a href="#user"><img class="circle" src="../<?php echo $ruta ?>" id="fotoPerfil"></a>
                     <a href="#name"><span class="black-text name" id="Nombre"> <?php echo "$consultaFoto[1] $consultaFoto[2]" ?> </span></a>
                     <a href="#email"><span class="black-text email" id="userName"><?php echo "@$consultaFoto[3]" ?></span></a>
                   </div>
               </li>

               <li><a id="viajes" class="waves-effect" ><i class="material-icons">landscape</i>Viajes</a></li>
               <li><a id="lista" class="waves-effect" ><i class="material-icons">format_list_bulleted</i>Wish list</a></li>
               <li><div class="divider"></div></li>
               <li><a href="https://drive.google.com/file/d/0B7zGJAz3xz9iQno0UHpxSUwtSG8/view?usp=sharing" target="_blank" id="descarga" class="waves-effect" ><i class="material-icons">cloud_download</i>Descargar Fleetock</a></li>
               <li><a id="ayuda" class="waves-effect" ><i class="material-icons">help</i>Ayuda</a></li>

             </ul>
      </header>
    </head>

    <body>

           <?php
           $i=0;
               if($viajes -> num_rows != 0)
               {
                   while($carta = $viajes -> fetch_assoc())
                   {
                       $array = array(
                          1  => $carta['idViaje'],
                          2 => $carta['nombre'],
                          3 => $carta['estadoDelViaje'],
                          4 => $carta['foto'],
                          5 => $carta['lugar']
                      );
                      $ruta = substr($array[4], 25);
                      if($i==0)
                      {
                          echo '
                          <div class="row">
                          ';
                      }
                         echo '
                             <div class="col s12 m3">
                                 <div class="card">
                                     <div class="card-image">
                                         <img src="../'.$ruta.'">
                                         <a href="detalleViaje.php?v='.$array[1].'&v1='.$login.'&v2='.$usuario.'" class="btn-floating halfway-fab waves-effect waves-light purple darken-2 "><i class="material-icons">local_play</i></a>
                                     </div>
                                     <div class="card-content">
                                         <span class="card-title">'.$array[2].'</span>
                                         <p>'.$array[5].'</p>
                                         <p>'.$array[3].'</p>
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
        ?>
      <!--JavaScript at end of body for optimized loading-->
      <script src="../jquery/jquery.js"></script>
      <script src="../js/materialize.js"></script>
      <script type="text/javascript" src="../js/login.js"></script>
    </body>
  </html>
