<?php
    //definir constantes de conexion para la base de datos
    define("server", "localhost");
    define("user", "root");
    define("pass", "");
    define("mainDataBase", "fleetock-bd");

    //variable que indica el estatus de la conexion
    $errorConexion = false;

    function consultarFoto($linkDB, $idUsuario, $idLogin)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT nombre, apellidos, foto, usuario from usuario, login where idUsuario = '$idUsuario' && idLogin = '$idLogin'");
        if($consulta -> num_rows != 0)
        {
            while($foto = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $foto['nombre'],
                   2 => $foto['apellidos'],
                   3 => $foto['usuario'],
                   4 => $foto['foto']
               );
            }
        }
        else
        {
            //si no hay resultados de la bd
        }
        return $salida;
    }

    function mostrarViajes($linkDB, $idUsuario)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT idViaje, viaje.nombre, estadoDelViaje, destino.foto, destino.nombre as lugar, Viaje_idViaje from viaje, login, usuario, pertenece, destino where usuario.idUsuario = '$idUsuario' && login.Usuario_idUsuario = '$idUsuario' && viaje.Usuario_idUsuario=usuario.idUsuario && viaje.idViaje=pertenece.Viaje_idViaje && pertenece.Destino_idDestino=destino.idDestino");


        return $consulta;
    }


    function detalleViaje($linkDB, $idViaje)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT nombre, fecha_inicio, fecha_fin, estadoDelViaje, EstiloViaje_idEstiloViaje, pertenece.Destino_idDestino from viaje INNER JOIN pertenece on pertenece.Viaje_idViaje = viaje.idViaje where viaje.idViaje = '$idViaje'");

        if($consulta -> num_rows != 0)
        {
            while($detalleViaje = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $detalleViaje['nombre'],
                   2 => $detalleViaje['fecha_inicio'],
                   3 => $detalleViaje['fecha_fin'],
                   4 => $detalleViaje['estadoDelViaje'],
                   5 => $detalleViaje['EstiloViaje_idEstiloViaje'],
                   6 => $detalleViaje['Destino_idDestino']
               );
           }
       }

        return $salida;
    }

    function jalarEstiloViaje($linkDB, $idEstiloViaje)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT tipo from estiloviaje where idEstiloViaje = $idEstiloViaje");
        $i=0;
        if($consulta -> num_rows != 0)
        {
            while($estilo = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $estilo['tipo']
               );
           }
       }

        return $salida;
    }



    function jalarDestino($linkDB, $idDestino)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT nombre from destino where idDestino = $idDestino");

        if($consulta -> num_rows != 0)
        {
            while($destino = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $destino['nombre']
               );
           }
       }

        return $salida;
    }

    function actividadesViaje($linkDB, $idViaje)
    {
        $i=1;
        $salida = "";
        $arrayCompleto=null;
        $consulta = $linkDB -> query("SELECT actividad.nombre, tiene.foto, contiene.fechaActividad FROM `actividad` INNER JOIN contiene on contiene.Actividad_idActividad = actividad.idActividad INNER JOIN tiene ON tiene.Actividad_idActividad = actividad.idActividad WHERE contiene.Viaje_idViaje = $idViaje");

        if($consulta -> num_rows != 0)
        {
            while($actividades = $consulta -> fetch_assoc())
            {
                if ($i==1) {
                    $arrayCompleto = array(
                        1 => array(
                            1 => $actividades['nombre'],
                            2 => $actividades['foto'],
                            3 => $actividades['fechaActividad']
                        )
                      );
                }
                else {
                    $arrayNuevo = array(
                          1 => $actividades['nombre'],
                          2 => $actividades['foto'],
                          3 => $actividades['fechaActividad']
                  );
                  array_push($arrayCompleto, $arrayNuevo);
                }

               $i++;
           }
       }

        return $arrayCompleto;
    }

    //verificar constantes para la conexion al servidor
    if(defined('server') && defined('user') && defined('pass') && defined('mainDataBase'))
    {
        //conexion a la bd
        $mysqli = new mysqli(server, user, pass, mainDataBase);

        //verificar si hay error al conectar
        if(mysqli_connect_error())
        {
            $errorConexion = true;
        }

        //evitar problemas con acentos
        $mysqli -> query("SET NAMES 'utf8'");

    }

 ?>
