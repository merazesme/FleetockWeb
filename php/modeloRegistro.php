<?php

    $conexion=mysqli_connect('localhost','root','','fleetock-bd');
    $conexion->set_charset("utf8");
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

    $aniosDiferencia = $anioAct - $anioNac;
    if ($mesAct < $mesNac) {
        $edad=$aniosDiferencia-1;
    }else{
        if ($mesAct == $mesNac) {
            if ($diaAct < $diaNac) {
                $edad=$aniosDiferencia-1;
            }else {
                $edad=$aniosDiferencia;
            }
            $edad=$aniosDiferencia;
        }

    }
        $consulta ="SELECT count(usuario) as cantidad from login where usuario = '$tockname'";
        $resultados = mysqli_query($conexion, $consulta);

        while($temp = mysqli_fetch_array($resultados))
        {
            $cantidadTockname = $temp['cantidad'];
        }

        if($cantidadTockname>0)
        {
            echo 2;
        }
        else {
            $sentenciaUsuarios="INSERT into usuario (idUsuario, nombre, apellidos, fechaNac, edad, sexo, email)
                    values ('$idUsuario', '$nombre', '$apellidos', '$fechaNac', '$edad', '$sexo', '$email')";

            $ultimoID="SELECT MAX(idUsuario) as id from usuario";
            $resultadoID = mysqli_query($conexion, $ultimoID);

            while($temp2 = mysqli_fetch_array($resultadoID))
            {
                $idU = $temp2['id'];
            }
            $idU=$idU+1;

            $sentenciaLogin="INSERT into login(idLogin, usuario, contraseña, estatus, tipo, Usuario_idUsuario)
            values ('$idLogin', '$tockname', '$contrasenia', 'Activo', 'Usuario' ,'$idU')";

            if (mysqli_query($conexion, $sentenciaUsuarios) && mysqli_query($conexion, $sentenciaLogin)) {
                echo 1;
            }
        }

 ?>
