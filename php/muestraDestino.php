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
    <link rel="icon" type="image/png" href="Imagenes/logo_50px.png">
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Leckerli+One|Lobster|Neucha|Merienda:700|Raleway:600" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <style media="screen">
      nav
      {background-color: #38006b;
      }
      .contenedor {
          width: 107%;
        	height: 448px;
          margin-left: -2%;
          margin-top: -10px;
          padding-right: 10px;
        	background: #fff;
        	overflow: auto;
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
        	height: 448px;
          margin-left: 3%;
          margin-top: -10px;
          padding-right: 10px;
        	background: #fff;
        	overflow: auto;
      }
      .contenedor2::-webkit-scrollbar {
      	width: 7px;
      }
      .contenedor2::-webkit-scrollbar-thumb {
      	background: #1faa00;
      	border-radius: 5px;
      }
      .mensaje
      { text-align: center;
        padding: 25px;
        font-weight:bold;
        color:#3C4858;
      }
      #circulo
      { width:70px;
        border-radius:50%;
        height:45px;
        margin-left:-10px;
      }
      #comentario
      { font-size: 14px;
        margin-left:-10px;
        margin-top:5px;
      }
      .linkm
      { color:#6a1b9a;
      }
      .linkm:hover
      { color:#9c4dcc;
      }
      .linki
      { font-family:Roboto;
        font-size:18px;
        color: black;
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
						<li><a href="login.php" class="homeScroll"><i class="material-icons left">home</i>Casa</a></li>
						<li><a href="login.php" ><i class="material-icons left">place</i>Destinos</a></li>
						<li><a href="#modal1" class="modal-trigger"><i class="material-icons left">person</i>Iniciar sesión</a></li>
						<li><a href="#"><i class="material-icons left">work</i>Acerca de </a></li>
					</ul>
				</div>
			</nav>
			<ul class="sidenav" id="mobile-demo">
			    <li><a href="login.php" class="homeScroll"><i class="material-icons left">home</i>Casa</a></li>
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
    <div style="margin-left:10%; margin-right:10%;">
      <div class="row">
          <div class="col s12 m12 l6" style="margin-left: -10px;">
            <?php
              function quitar_tildes($cadena) {
                $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                $texto = str_replace($no_permitidas, $permitidas ,$cadena);
                return $texto;
              }
              $sql="SELECT nombre, pais, foto, round(avg(calificacion),1) FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino='$destino';";
              $result=mysqli_query($conexion, $sql);
              while($ver =mysqli_fetch_row($result))
              { // Separar el nombre del destino
                $destinoPagina=explode(', ', $ver[0]); // Toma la palabra(s) que esta antes de la coma
                $destinoPagina[1]=quitar_tildes($destinoPagina[1]);// Quita las tildes para poder mandar la palabra(s) por la url
                $destinoPagina[1]=strtolower($destinoPagina[1]);// Convierte el resultado a minusculas
                // Comprueba que tenga imagen
                if (!file_exists($ver[2]))
                 $ver[2]='Imagenes/Destinos/default.png';
                // Estrellitas para la calificacion
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
            <div class="card" style="width:110%;">
              <div class="card-image">
                <img style="width: 100%;height: 50%;"src="<?php echo $ver[2] ?>">
              </div>
              <div class="card-content">
                <h6><strong><?php echo $ver[0] ?></strong></h6>
                <p><?php echo $ver[1] ?></p>
                <div class="col l6">
                      <p><?php echo $calificacion2 ?></p>
                </div>
                <div class="col l6">
                  <div class="row">
                    <a href="https://www.visitmexico.com/es/busqueda?title=<?= $destinoPagina[1] ?>&body=<?= $destinoPagina[1] ?>" target="_blank" class="linkm">
                      <i style="" class="material-icons col l2">link</i>
                      <span class="linki"> Más información</span>
                    </a>
                  </div>
                </div>
                <br>
              </div>
            </div>
            <?php }  ?>
          </div>
          <div class="col m12 s12 l5 offset-l1">
            <div class="row">
              <i style="color:#6a1b9a; margin-left: -10px;" class="material-icons col l2">speaker_notes</i>
              <span><p style="font-family:Roboto; font-size:18px;"> Comentarios</p></span>
            </div>
            <div class="contenedor">
                <?php
                  $sql="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE Destino_idDestino='$destino';";
                  $result=mysqli_query($conexion, $sql);
                  if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                  { echo '<ul class="">';
                    while($ver =mysqli_fetch_row($result))
                    { // Comprueba que tenga imagen
                      if (!file_exists($ver[5]))
                        $ver[5]='Imagenes/Usuarios/default.png';
                      $fecha= date_format(date_create($ver[4]),'d / m / Y');
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
                 <lis class="collection-item avatar">
                   <p style="font-size: 16px;">
                     <strong><?php echo $ver[0]?></strong>
                     <span style="font-size: 11px; padding-left: 50%; color: #7D7E7C;"><?php echo $fecha ?></span>
                   </p>
                   <span class="row">
                     <img src="<?php echo $ver[5] ?>" alt="" class="col l6" id="circulo">
                     <p class="col l6"style="font-size: 12px; color: #393939;"><?php echo $ver[3] ?></p>
                   </span>
                   <span class="row">
                     <span class="col s12 m6 l6" id="comentario"><?php echo $ver[1] ?></span>
                     <span class="col s12 m6 l6" ><?php echo $calificacion2 ?></span>
                   </span>
                   <div class="divider"></div>
                 </lis>
               <?php
                  }
                  echo '</ul>';
                }
                else
                { echo '<div class="col l12">
                        <div class="card">
                          <p class="mensaje">No se encontraron comentarios</p>
                          <i class="material-icons" style="font-size: 40px; margin-left:48%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                        </div>
                      </div>';
                }
               ?>
              </div>
          </div>
        </div>
        <div class="col s12 m12 l12">
          <div class="row">
            <i style="color:#6a1b9a;" class="material-icons col l1">collections</i>
            <span><p style="font-family:Roboto; font-size:18px;">Actividades</p></span>
          </div>
          <div class="row">
            <?php
                $sql="SELECT actividad.nombre, tiene.foto, actividad.descripcion, tiene.localizacion,tiene.idTiene FROM actividad INNER JOIN tiene ON actividad.idActividad = tiene.Actividad_idActividad where tiene.Destino_idDestino = '$destino';";
                $result=mysqli_query($conexion, $sql);
                if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                {   while($ver =mysqli_fetch_row($result))
                  { // Comprueba que tenga imagen
                    if (!file_exists($ver[1]))
                      $ver[1]='Imagenes/Actividades/default-c.png';
              ?>
              <div class="row">
                <div class="col s12 m6 l6">
                  <div class="card" style="height:520px;">
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
                <div class="col s12 m6 l6">
                  <div class="row">
                    <i style="color:#6a1b9a; margin-left: 10px;" class="material-icons col l2">speaker_notes</i>
                    <span><p style="font-family:Roboto; font-size:18px;"> Comentarios</p></span>
                  </div>
                  <div class="contenedor2">
                      <?php
                        $sql2="SELECT titulo,comentario,calificacion,usuario.nombre,fecha,usuario.foto FROM comentarios INNER join usuario on comentarios.usuario_idUsuario=usuario.idUsuario WHERE actividad_idActividad='$ver[4]';";
                        $result2=mysqli_query($conexion, $sql2);
                        if ( $result2->num_rows > 0 ) // Se comprueba el numero de columnas
                        { echo '<ul class="">';
                          while($ver =mysqli_fetch_row($result2))
                          { // Comprueba que tenga imagen
                            if (!file_exists($ver[5]))
                              $ver[5]='Imagenes/Usuarios/default.png';
                            $fecha= date_format(date_create($ver[4]),'d / m / Y');
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
                       <lis class="collection-item avatar">
                         <p style="font-size: 16px;">
                           <strong><?php echo $ver[0]?></strong>
                           <span style="font-size: 11px; padding-left: 50%; color: #7D7E7C;"><?php echo $fecha ?></span>
                         </p>
                         <span class="row">
                           <img src="<?php echo $ver[5] ?>" alt="" class="col l6" id="circulo">
                           <p class="col l6"style="font-size: 12px; color: #393939;"><?php echo $ver[3] ?></p>
                         </span>
                         <span class="row">
                           <span class="col s12 m6 l6" id="comentario"><?php echo $ver[1] ?></span>
                           <span class="col s12 m6 l6" ><?php echo $calificacion2 ?></span>
                         </span>
                         <div class="divider"></div>
                       </lis>
                     <?php
                        }
                        echo '</ul>';
                      }
                      else
                      { echo '<div class="col l12">
                              <div class="card">
                                <p class="mensaje">No se encontraron comentarios</p>
                                <i class="material-icons" style="font-size: 40px; margin-left:48%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                              </div>
                            </div>';
                      }
                     ?>
                    </div>
                </div>
              </div>
              <?php
                  }
                }
                else
                { echo '<div class="col l12">
                          <div class="card">
                            <p class="mensaje">No se encontraron actividades</p>
                            <i class="material-icons" style="font-size: 40px; margin-left:48%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                          </div>
                        </div>';
                }
              ?>
              </div>
          </div>
          <div class="col s12 m12 l12">
            <div class="row">
              <i style="color:#6a1b9a;" class="material-icons col l1">airport_shuttle</i>
              <span><p style="font-family:Roboto; font-size:18px;">Transportes</p></span>
            </div>
            <div class="row">
                  <?php
                    $sql="SELECT transporte.tipo, transporte.foto, corresponde.costo FROM transporte
                          INNER JOIN sedesplazaen ON transporte.idTransporte = sedesplazaen.Transporte_idTransporte
                          inner join corresponde on corresponde.sedesplazaen_idSeDesplazaEn = sedesplazaen.idSeDesplazaEn
                          WHERE sedesplazaen.Destino_idDestino ='$destino';";
                    $result=mysqli_query($conexion, $sql);
                    if ( $result->num_rows > 0 ) // Se comprueba el numero de columnas
                    { while($ver =mysqli_fetch_row($result))
                      { // Comprueba que tenga imagen
                        // $ver[1] = substr($ver[1], 25);
                        if (!file_exists($ver[1]))
                          $ver[1]='../Imagenes/Transportes/default.png';

                  ?>
                  <div class="col l4 m6 s12">
                    <div class="card">
                      <div class="card-image">
                        <img src="<?php echo $ver[1] ?>">
                      </div>
                      <div class="card-content">
                        <p><?php echo $ver[0] ?></p>
                        <p>$<?php echo number_format($ver[2],2); ?></p>
                      </div>
                    </div>
                  </div>
                  <?php
                      }
                    }
                    else
                    { echo '<div class="col l12">
                              <div class="card">
                                <p class="mensaje">No se encontraron transportes</p>
                                <i class="material-icons" style="font-size: 40px; margin-left:48%; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
                              </div>
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
  						    <li><a href="login.php" class="homeScroll">Casa</a></li>
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
