<?php

    $conexion=mysqli_connect('localhost','root','','fleetock-bd');
    $conexion->set_charset("utf8");
    $bandera=$_POST['ban'];
    if($bandera==0)
    {
      //datos de la tabla usuarios
      $nombre=$_POST['nombre'];
      $apellidos=$_POST['apellidos'];
      $fechaNac=$_POST['fechaNacimiento'];
      $email=$_POST['email'];
      $sexo=$_POST['grupoSexo'];
      $idUsuario=73;

      //datos de la tabla login
      $tockname=$_POST['tockname'];
      $contrasenia=$_POST['password'];
      $idLogin=36;

      $edad=0;

      $anioNac = substr($fechaNac, 0, 4);
      $anioAct = date("Y");

      $mesNac = substr($fechaNac, 5, 2);
      $mesAct = date("n");

      $diaNac = substr($fechaNac, 8, 2);
      $diaAct = date("j");

      $edad = $anioAct - $anioNac;
      if ($mesNac >= $mesAct && $diaNac >= $diaAct) {
          $edad=-1;
      }
          $consulta ="SELECT count(usuario) as cantidad from login where usuario = '$tockname'";
          $resultados = mysqli_query($conexion, $consulta);

          while($temp = mysqli_fetch_array($resultados))
          {
              $cantidadTockname = $temp['cantidad'];
          }

          if($cantidadTockname>0)
          {
              echo -1;
          }
          else {
              $sentenciaUsuarios="INSERT into usuario (idUsuario, nombre, apellidos, fechaNac, edad, sexo, email)
                      values ('', '$nombre', '$apellidos', '$fechaNac', '$edad', '$sexo', '$email')";

              $ultimoID="SELECT MAX(idUsuario) as id from usuario";
              $resultadoID = mysqli_query($conexion, $ultimoID);

              while($temp2 = mysqli_fetch_array($resultadoID))
              {
                  $idU = $temp2['id'];
              }
              $idU=$idU+1;

              $sentenciaLogin="INSERT into login(idLogin, usuario, contraseña, tipo, Usuario_idUsuario)
              values ('', '$tockname', '$contrasenia', 'Usuario' ,'$idU')";

              if (mysqli_query($conexion, $sentenciaUsuarios) && mysqli_query($conexion, $sentenciaLogin))
              {
                  echo $idU;
              }
              else {
                  echo -2;
              }
          }
    }
    else if($bandera == 1)
    { // Agrega las preferencias de los tipos de sitios
      $usuario=$_POST['usuario'];
      $tipo=$_POST['ide'];
      $sql="INSERT into prefiere(Usuario_idUsuario,TipoSitio_idTipoSitio) values ('$usuario', '$tipo');";
      if (mysqli_query($conexion, $sql)) {
        echo 1;
      }
    }
    else if($bandera == 2)
    { // Elimina las preferencias de los tipod de sitios
      $usuario=$_POST['usuario'];
      $tipo=$_POST['ide'];
      $sql="DELETE FROM prefiere WHERE prefiere.Usuario_idUsuario = $usuario AND prefiere.TipoSitio_idTipoSitio = $tipo;";
      if (mysqli_query($conexion, $sql)) {
        echo 1;
      }
    }
    else if($bandera == 3)
    {
      $usuario=$_POST['usuario'];
      $ultimoID="SELECT idLogin FROM login WHERE Usuario_idUsuario=$usuario";
      $resultadoID = mysqli_query($conexion, $ultimoID);

      while($temp2 = mysqli_fetch_array($resultadoID))
      {
          $idU = $temp2['idLogin'];
      }
      echo $idU;
    }
 ?>
