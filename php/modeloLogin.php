<?php
    $conexion=mysqli_connect('localhost','root','','fleetock-bd');
    $conexion->set_charset("utf8");
    $usuario=$_POST['usuarioLogin'];
    $password=$_POST['passwordLogin'];

    $consulta ="SELECT idLogin, Usuario_idUsuario from login where usuario = '$usuario' && contraseña = '$password'";

    $resultados = mysqli_query($conexion, $consulta);

    while($temp = mysqli_fetch_array($resultados))
    {
        $datosUsuario = array(
            1 => $temp['idLogin'],
            2 => $temp['Usuario_idUsuario']
         );

    }

    $buscarUsuario ="SELECT idLogin, Usuario_idUsuario from login where usuario = '$usuario'";

    $resultadosUsuario = mysqli_query($conexion, $buscarUsuario);

    while($temp2 = mysqli_fetch_array($resultadosUsuario))
    {
        $datosUsuario2 = array(
            1 => $temp2['idLogin'],
            2 => $temp2['Usuario_idUsuario']
         );

    }

    //si existe el usuario
    if (!empty($datosUsuario2[1]) && !empty($datosUsuario2[2]))
    {
        //si la contra esta mal
        if(empty($datosUsuario[1]) && empty($datosUsuario[2]))
        {
            echo 1;
        }else { //si los datos que ingresaron existen en la bd
            $datos="$datosUsuario[1],$datosUsuario[2]";
            echo $datos;
        }
    }else{ //si no existe el usuario
        echo 2;
    }
 ?>
