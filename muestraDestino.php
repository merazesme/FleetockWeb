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

      nav
      {

      	background-color: #38006b;

      }

      .contenedor {
        width: 450px;
        	height: 400px;
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
					<a href="#" class="brand-logo"><img src="Imagenes/LogoFleetock.png" style="margin-left:30%;"></a>
					<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a class="homeScroll"><i class="material-icons left">home</i>Casa</a></li>
						<li><a class="destinosScroll"><i class="material-icons left">place</i>Destinos</a></li>
						<li><a href="#modal1" class="modal-trigger"><i class="material-icons left">person</i>Iniciar sesión</a></li>
						<li><a href="#"><i class="material-icons left">work</i>Acerca de </a></li>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
			    <li><a class="homeScroll"><i class="material-icons left">home</i>Casa</a></li>
			    <li><a class="destinosScroll"><i class="material-icons left">place</i>Destinos</a></li>
			    <li><a href="#modal1" class="modal-trigger"><i class="material-icons left">person</i>Iniciar sesión</a></li>
			    <li><a href="#"><i class="material-icons left">work</i>Acerca de </a></li>
			</ul>
		</header>
    <div id="modal1" class="modal">
			<div class="modal-content">
				<ul id="tabs-swipe-demo" class="tabs">
					<li class="tab col s3"><a class="active" href="#test-swipe-1">Iniciar sesión</a></li>
					<li class="tab col s3"><a href="#test-swipe-2">Registrarse</a></li>
				</ul>
				<div id="test-swipe-1" class="col s12">
					<div class="row">
						<form class="col s12" id="formLogin" method="post" name="formularioLogin">
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
									<input id="usuarioLogin" name="usuarioLogin" type="text" class="validate">
									<label for="usuarioLogin">Nombre de usuario</label>
								</div>
								<div class="input-field col s12">
									<i class="material-icons prefix">vpn_key</i>
									<input id="passwordLogin" name="passwordLogin" input id="password" type="password" class="validate">
									<label for="passwordLogin">Contraseña</label>
								</div>
							</div>
              <div class="container">
                <div class="row">
  								<button class="col s12 btn waves-effect waves-light" id="btnLogin" type="submit">Iniciar sesión</button>
  							</div>
              </div>
						</form>
						<span id="resultadoLogin"></span>
					</div>
				</div>
				<div id="test-swipe-2" class="col s12">
          <div class="registro1">
  					<div class="row">
  					    <form class="col s12" id="formRegistro" method="post" name="formulario">
  							<div class="row">
  								<div class="input-field col s6">
  									<input id="nombre" name="nombre" type="text" class="validate">
  									<label for="nombre">Nombre</label>
  								</div>
  								<div class="input-field col s6">
  									<input id="apellidos" name="apellidos" type="text" class="validate">
  									<label for="apellidos">Apellidos</label>
  								</div>
  							</div>
  						    <div class="row">
  						        <div class="input-field col s12">
  						          <input id="email" name="email" type="email" class="validate">
  						          <label for="email">Email</label>
  						        </div>
  						    </div>
  					      	<div class="row">
  						        <div class="input-field col s12">
  						          <input id="tockname" name="tockname" type="text" class="validate">
  						          <label for="tockname">Tockname</label>
  						        </div>
  					      	</div>
  					      	<div class="row">
  						        <div class="input-field col s12">
  						          <input id="password" name="password" type="password" class="validate">
  						          <label for="password">Contraseña</label>
  						        </div>
  					      	</div>
  					      	<div class="row">
  						        <div class="input-field col s12">
  						          <input id="confirmaPassword" name="confirmaPassword" type="password" class="validate">
  						          <label for="confirmaPassword">Confirmar Contraseña</label>
  						        </div>
  					      	</div>
  					      	<div class="row">
  						        <div class="input-field col s12">
  						          <input id="fechaNacimiento" name="fechaNacimiento" type="text" class="datepicker">
  						          <label for="fechaNacimiento">Fecha de nacimiento</label>
  						        </div>
  					      	</div>
  					      	<div class="row">
      								<div class="input-field col s12">
      									<label>Sexo</label>
      								</div>
      								<div class="input-field col s6">
      									<p>
      								      <label>
      								        <input name="grupoSexo" class="radio" value="Hombre" type="radio" />
      								        <span>Maculino</span>
      								      </label>
      								    </p>
      								</div>
      								<div class="input-field col s6">
      								    <p>
      								      <label>
      								        <input name="grupoSexo" class="radio" value="Mujer" type="radio" />
      								        <span>Femenino</span>
      								      </label>
      								    </p>
      									</div>
  					      	</div>
  					    </form>
                <div class="container">
                  <div class="row">
                    <button class="col s12 btn waves-effect waves-light" id="btnRegistrar">Siguiente</button>
                  </div>
                </div>
  						<span id="resultado"></span>
  				  	</div>
            </div>
            <div class="registro2">
            <div class="row">
              <p align="center">Seleccione el tipo de sitio que le gustaría visitar</p>
                  <?php
                    $sql="SELECT * FROM tipositio;";
                    $result=mysqli_query($conexion, $sql);
                    while($ver =mysqli_fetch_row($result))
                    {
                  ?>
                  <div class="col s12 m6 l4">
                    <div class="card">
                      <div class="card-image">
                        <img class="activator" src="<?php echo $ver[3] ?>">
                        <a class="btn-floating halfway-fab waves-effect waves-light greenLight boton" id="<?php echo $ver[0] ?>"><i class="material-icons">add</i></a>
                      </div>
                      <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $ver[1] ?>
                        </span>
                      </div>
                      <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $ver[1] ?><i class="material-icons right">close</i></span>
                        <p><?php echo $ver[2] ?></p>
                      </div>
                    </div>
                  </div>
                  <?php
                    } ?>
                    <div class="container">
                      <div class="row">
                        <button class="col s12 btn waves-effect waves-light" style="background-color:#9c4dcc;" id="btnRegistrar2">¡Listo!</button>
                      </div>
                    </div>
                </div>
            </div>
				</div>
			</div>
		</div>
    <div style="width: 100px; height: 100px; ">
    </div>
    <div class="container">
      <div class="row">
          <div class="col s12 m12 l6">
            <?php
              $sql="SELECT nombre, pais, foto, round(avg(calificacion),1) FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino='$destino';";
              $result=mysqli_query($conexion, $sql);
              while($ver =mysqli_fetch_row($result))
              { // Estrellitas para la calificacion
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
            <div class="card" style="margin: 0px 0px -5px 0px;">
              <div class="card-image">
                <img style="width: 100%;height: 50%;"src="<?php echo $ver[2] ?>">
              </div>
              <div class="card-content">
                <span class="card-title"><?php echo $ver[0] ?></span>
                <p><?php echo $ver[1] ?></p>
                <p><?php echo $calificacion2 ?></p>
              </div>
            </div>
            <?php }  ?>
          </div>
          <div class="col l6">
            <div class="row">
              <i style="color:#6a1b9a;" class="material-icons col l1">speaker_notes</i>
              <span class="col l11">Comentarios</span>
            </div>
            <div class="contenedor">
                <?php
                  $sql="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE Destino_idDestino='$destino';";
                  $result=mysqli_query($conexion, $sql);
                  if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                  {
                    while($ver =mysqli_fetch_row($result))
                    { $fecha= date_format(date_create($ver[4]),'l jS \of F Y ');
                      // Estrellitas de la calificacion de cada usuario que comento
                      $calificacion2='';
                      if ($ver[2]!=NULL)
                        {
                          for ($x=0; $x<5; $x++){
                            if($ver[2]>0){
                              $calificacion2.='<span class="material-icons" style="font-size: 18px;color:black;">star</span>';
                              $ver[2]=$ver[2]-1;
                            }else
                                $calificacion2.='<span class="material-icons" style="font-size: 18px;color:black;">star_border</span>';
                            }
                        }
                      else
                        $calificacion2='<span class="material-icons" style="font-size: 18px;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;color:black;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;color:black;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;color:black;">star_border</span>
                        <span class="material-icons" style="font-size: 18px;color:black;">star_border</span>';
                 ?>
                 <span class="collection-item avatar">
                   <img src="<?php echo $ver[5] ?>" alt="" class="circle">
                   <p style="font-size: 16px;">
                     <strong><?php echo $ver[0]?></strong>
                     <span style="font-size: 11px; padding-left: 40px; color: #7D7E7C;"><?php echo $fecha ?></span>
                   </p>
                   <p style="font-size: 11px; color: #393939;"><?php echo $ver[3] ?></p>
                   <p style="font-size: 14px;"><?php echo $ver[1] ?></p>
                   <p class="secondary-content"><?php echo $calificacion2 ?></p>
                   <span style="color:#C8C8C8;">_____________________________________________________________</span>
                 </span>
               <?php
                  }
                }
                else
                { echo '<div class="card container">
                         <h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron comentarios</h5>
                         <i class="material-icons" style="font-size: 40px; margin-left:40%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                       </div>';
                }
               ?>
              </div>
          </div>
        </div>
        <div class="col s12 m12 l12">
          <div class="row">
            <i style="color:#6a1b9a;" class="material-icons col l1">toc</i>
            <span class="col l11">Actividades</span>
          </div>
          <div class="row">
            <?php
                $sql="SELECT actividad.nombre, tiene.foto, actividad.descripcion, tiene.localizacion FROM actividad INNER JOIN tiene ON actividad.idActividad = tiene.Actividad_idActividad where tiene.Destino_idDestino = '$destino';";
                $result=mysqli_query($conexion, $sql);
                if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                {   while($ver =mysqli_fetch_row($result))
                  {

              ?>
              <div class="col s12 m12 l4">
                <div class="card" style="height:390px; ">
                  <div class="card-image">
                    <img src="<?php echo $ver[1] ?>">
                  </div>
                  <div class="card-content">
                    <p><strong><?php echo $ver[0] ?></strong></p>
                    <p><?php echo $ver[2] ?></p>
                    <p><?php echo $ver[3] ?></p>
                  </div>
                </div>
              </div>
              <?php
                  }
                }
                else
                {
                  echo '<div class="card container">
                          <h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron actividades</h5>
                          <i class="material-icons" style="font-size: 40px; margin-left:40%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                        </div>';
                }
              ?>
              </div>
          </div>
          <div class="col s12 m12 l12">
            <div class="row">
              <i style="color:#6a1b9a;" class="material-icons col l1">local_taxi</i>
              <span class="col l11">Transportes</span>
            </div>
            <div class="row">
                  <?php
                    $sql="SELECT transporte.tipo, transporte.foto FROM `transporte` INNER JOIN sedesplazaen ON transporte.idTransporte = sedesplazaen.Transporte_idTransporte WHERE sedesplazaen.Destino_idDestino = '$destino';";
                    $result=mysqli_query($conexion, $sql);
                    if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                    {
                      while($ver =mysqli_fetch_row($result))
                      {

                  ?>
                  <div class="col l4">
                    <div class="card">
                      <div class="card-image">
                        <img src="<?php echo $ver[1] ?>">
                      </div>
                      <div class="card-content">
                        <p><?php echo $ver[0] ?></p>
                      </div>
                    </div>
                  </div>
                  <?php
                      }
                    }
                    else
                    {
                      echo '<div class="card container">
                              <h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron transportes</h5>
                              <i class="material-icons" style="font-size: 40px; margin-left:40%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                            </div>';
                    }
                    mysqli_close($conexion);
                  ?>
                  </div>
            </div>
      </div>
      <!-- Footer -->
  		<footer class="page-footer">
  			<div class="container">
  				<div class="row">
  					<div class="col l7 s12">
  						<h5 class="black-text">Fleetock</h5>
  						<p class="black-text text-lighten-4">
  							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
  						</p>
  					</div>
  					<div class="col l3 offset-l2 s12">
  						<h5 class="black-text">Links</h5>
  						<ul id="links">
  						    <li><a class="homeScroll">Casa</a></li>
  						    <li><a class="destinosScroll">Destinos</a></li>
  						    <li><a href="#modal1" class="modal-trigger">Iniciar sesión</a></li>
  						    <li><a href="#">Acerca de </a></li>
  						</ul>
  					</div>
  				</div>
  			</div>
  			<div class="footer-copyright">
  				<div class="container" align="center">
  					© 2018 Fleetock
  				</div>
  			</div>
  		</footer>
  <script src="js/jquery.js"></script>
  <script src="js/materialize.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <script type="text/javascript" src="js/registrarUsuario.js"></script>
  <script type="text/javascript" src="js/validarUsuario.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
  $('.materialboxed').materialbox();
});

 $('.collapsible').collapsible();
  </script>
  </body>
</html>
