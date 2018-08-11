<?php
  include('php/conexion.php');
  $conexion=conexion();
  session_start();
  $datos=$_SESSION['idUsuario'];
  if (isset($_SESSION['idUsuario'])) // Si ya tiene iniciada sesion y se va al login que lo mande a perfil
    header ('Location: php/Perfil.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" type="image/png" href="Imagenes/logo_50px.png">
		<title>Fleetock</title>
	    <link rel="stylesheet" href="css/materialize.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Leckerli+One|Lobster|Neucha|Merienda:700|Raleway:600" rel="stylesheet">
	    <link rel="stylesheet" href="css/login.css">
      <script src="js/jquery.js"></script>
  	  <script src="js/materialize.js"></script>
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
      <div id="slider">
        <div class="slidershow">
          <ul class="sliderhead" id="hello">
            <li>
              <img src="img/slider1.jpg">
              <section class="caption">
                <span id="Titulo">El arte de viajar</span>
                <span id="Frase">“Un viaje de mil millas ha de comenzar con un simple paso” – Lao Tzu</span>
              </section>
            </li>
            <li>
              <img src="img/slider2.jpg">
              <section class="caption">
                <span id="Titulo">El arte de viajar</span>
                <span id="Frase">“Un viaje de mil millas ha de comenzar con un simple paso” – Lao Tzu</span>
              </section>
            </li>
            <li>
              <img src="img/slider3.jpg">
              <section class="caption">
                <span id="Titulo">El arte de viajar</span>
                <span id="Frase">“Un viaje de mil millas ha de comenzar con un simple paso” – Lao Tzu</span>
              </section>
            </li>
            <li>
              <img src="img/slider4.jpg">
              <section class="caption">
                <span id="Titulo">El arte de viajar</span>
                <span id="Frase">“Un viaje de mil millas ha de comenzar con un simple paso” – Lao Tzu</span>
              </section>
            </li>
          </ul>
        </div>
        <div class="leftArrow">
          <span><i class="material-icons">navigate_before</i></span>
        </div>
        <div class="rightArrow">
          <span> <i class="material-icons">navigate_next</i></span>
        </div>
        <script type="text/javascript">
          $('.sliderhead li').hide();
          $('.sliderhead li:first').show();
        </script>
      </div>
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
		<div class="container" align="center" style="margin-top: 100px; margin-bottom: 100px;">
			<h4 class="Frase">Una frase bien perrona</h4>
			<img src="Imagenes/logo.png" style="width: 130px; height: 130px;">
			<br>
			<h4 style="font-family: 'Neucha', cursive; font-size: 25px;">"Ve el mundo. Es más fantástico que cualquier sueño". -Ray Bradbury</h4>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		</div>
		<br>
		<br>
	 	<div class="parallax-container">
	      <div class="parallax"><img src="img/mexico.jpg"></div>
	    </div>
	    <div class="section white">
	      	<div class="row container" align="center">
	        	<h4 class="header">El viaje de tus sueños te esta espereando</h4>
            <div class="video-container">
        <iframe width="853" height="480" src="//www.youtube.com/embed/7cQON1PsuPg?rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
	      	</div>
	    </div>
	    <div class="parallax-container">
	      <div class="parallax"><img src="img/sanmiguel.png"></div>
	    </div>
	    <!-- Cuadros de imagenes con los destinos -->
	    <div style="margin-top: 100px;"></div>
	    <div class="center container" style="margin-bottom: 100px;">
	    	<h3 class="Frase">Los mejores sitios</h3>
	    	<p style="font-family: Arial">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    </div>
			  <div style="margin-bottom: 100px;"></div>
        <div class="container">
          <div class="row">
            <div class="input-field offset-l4 offset-m4 col s12 m6 l6">
              <i class="material-icons prefix">search</i>
              <input id="buscador" type="text">
            </div>
            <div class="input-field col offset-s3 s9 m2 l2">
              <a class="waves-effect waves-light btn" id="btnTendencia">Tendencias</a>
            </div>

          </div>
        </div>
        <div class="" style="margin: 0px 5% 0px 5%;">
          <div style="margin: 0px 0px 80px 0px; ">
            <div class="contenedor">
                <div class="row" id="destinos">
                </div>
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
		<script type="text/javascript" src="js/login.js"></script>
		<script type="text/javascript" src="js/registrarUsuario.js"></script>
		<script type="text/javascript" src="js/validarUsuario.js"></script>
	</body>
</html>
