<?php

  include('php/conexion.php');
  $conexion=conexion();
  $destino = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Fleetock</title>
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One|Lobster|Neucha|Merienda:700|Raleway:600" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <style media="screen">
    img{
      width: 100px;
    }
      nav
      {
      	box-shadow: none;
      	position: fixed;
      	background-color: #6a1b9a;
      	padding: 0px 20px;
      	z-index: 1;
      }
      nav li a
      {
      	font-family: 'Dosis',sans-serif;
      	font-size: 15px;
      	font-weight: bold;
      	text-transform: uppercase;
      }
      nav img
      {
      	margin-top: 5px;
      }
      .contenedor {
        width: 450px;
        	height: 500px;
          padding-left: 10px;
          padding-right: 10px;
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
    </style>
</head>
  <body>
    <header>
      <nav>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo"><img style="width: 100%; height: 100%; margin-top: 2px;" src="img/fabi.png"></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li>
					        <div class="input-field">
					          <input id="search" type="search" required>
					          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
					          <i class="material-icons">close</i>
					        </div>
						</li>
						<li><a href="#">Casa</a></li>
						<li><a href="muestraDestino.php">Destinos</a></li>
						<li><a href="#modal1" class="modal-trigger">Iniciar sesión</a></li>
						<li><a href="#">Acerca de </a></li>
					</ul>
				</div>
			</nav>
    </header>
    <div style="width: 100px; height: 100px; ">
    </div>
    <div class="container">
      <div class="row">
          <div class="col s12 m12 l12">
            <?php
              $sql="SELECT nombre, pais, foto, round(avg(calificacion),1) FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino='$destino';";
              $result=mysqli_query($conexion, $sql);
              while($ver =mysqli_fetch_row($result))
              {
            ?>
            <div class="card" style="margin: 0px 0px -5px 0px;">
              <div class="card-image">
                <img style="width: 100%;height: 50%;"src="<?php echo $ver[2] ?>">
                <span class="card-title"><?php echo $ver[0] ?></span>
              </div>
              <div class="card-content">
                <p>Pais: <?php echo $ver[1] ?></p>
                <p>Calificacion: <?php echo $ver[3] ?></p>
                <!-- el falta clima -->

              </div>
            </div>
            <?php }  ?>
            <ul class="collapsible">
              <li class="active">
                <div class="collapsible-header"><i class="material-icons">speaker_notes</i>Comentarios</div>
                <div class="collapsible-body">
                  <ul class="collection">
                  <?php
                    $sql="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE Destino_idDestino='$destino';";
                    $result=mysqli_query($conexion, $sql);
                    while($ver =mysqli_fetch_row($result))
                    { $fecha= date_format(date_create($ver[4]),'l jS \of F Y ');
                   ?>
                   <li class="collection-item avatar">
                     <img src="<?php echo $ver[5] ?>" alt="" class="circle">
                     <p style="font-size: 16px;">
                       <strong><?php echo $ver[0]?></strong>
                       <span style="font-size: 11px; padding-left: 40px; color: #7D7E7C;"><?php echo $fecha ?></span>
                     </p>
                     <p style="font-size: 11px; color: #393939;"><?php echo $ver[3] ?></p>
                     <p style="font-size: 14px;"><?php echo $ver[1] ?></p>
                     <p class="secondary-content"><?php echo $ver[2] ?></p>
                    </li>
                  <?php } ?>
                </ul>
                </div>
              </li>
            </ul>
          </div>
          <div class="col s12 m12 l6">
            <ul class="collapsible">
             <li>
               <div class="collapsible-header"><i class="material-icons">toc</i>Actividades</div>
             </li>
           </ul>

            <div class="contenedor">
              <?php
                $sql="SELECT actividad.nombre, tiene.foto, actividad.descripcion, tiene.localizacion FROM actividad INNER JOIN tiene ON actividad.idActividad = tiene.Actividad_idActividad where tiene.Destino_idDestino = '$destino';";
                $result=mysqli_query($conexion, $sql);
                while($ver =mysqli_fetch_row($result))
                {
              ?>
              <div class="card medium">
                <div class="card-image">
                  <img src="<?php echo $ver[1] ?>">
                  <span class="card-title"><?php echo $ver[0] ?></span>
                </div>
                <div class="card-content">
                  <p><?php echo $ver[2] ?></p>
                  <p>Localizacion: <?php echo $ver[3] ?></p>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
          </div>
          <div class="col s12 m12 l6">
            <ul class="collapsible">
             <li>
               <div class="collapsible-header"><i class="material-icons">local_taxi</i>Transportes</div>
             </li>
           </ul>
              <div class="contenedor">
                  <?php
                    $sql="SELECT transporte.tipo, transporte.foto FROM `transporte` INNER JOIN sedesplazaen ON transporte.idTransporte = sedesplazaen.Transporte_idTransporte WHERE sedesplazaen.Destino_idDestino = '$destino';";
                    $result=mysqli_query($conexion, $sql);
                    while($ver =mysqli_fetch_row($result))
                    {
                  ?>
                    <div class="card medium">
                      <div class="card-image">
                        <img src="<?php echo $ver[1] ?>">

                      </div>
                      <div class="card-content">
                        <p><?php echo $ver[0] ?></p>

                      </div>
                    </div>
                  <?php
                    }
                    mysqli_close($conexion);
                  ?>
                </div>
            </div>
        </div>
      </div>
<script src="js/jquery.js"></script>
<script src="js/materialize.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
  $('.materialboxed').materialbox();
});

 $('.collapsible').collapsible();
  </script>
  </body>
</html>
