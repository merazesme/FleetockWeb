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
        $consulta = $linkDB -> query("SELECT idViaje, viaje.nombre, estadoDelViaje from viaje
                                      INNER JOIN usuario on viaje.Usuario_idUsuario=usuario.idUsuario
                                      && usuario.idUsuario = '$idUsuario'
                                      INNER JOIN login on login.Usuario_idUsuario = '$idUsuario'");


        return $consulta;
    }

    function contarDestinosViaje($linkDB, $idViaje)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT COUNT(idViaje) as destinos from viaje
                                      INNER JOIN pertenece on pertenece.Viaje_idViaje = viaje.idViaje
                                      INNER JOIN destino on destino.idDestino = pertenece.Destino_idDestino
                                      WHERE viaje.idViaje= '$idViaje'");

        return $consulta;
    }

    function consultarDestinosViaje($linkDB, $idViaje)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT destino.idDestino, destino.foto, destino.nombre as lugar from viaje
                                      INNER JOIN pertenece on pertenece.Viaje_idViaje = viaje.idViaje
                                      INNER JOIN destino on destino.idDestino = pertenece.Destino_idDestino
                                      WHERE viaje.idViaje= '$idViaje'");

        return $consulta;
    }


    function detalleViaje($linkDB, $idViaje)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT nombre, fecha_inicio, fecha_fin, estadoDelViaje, EstiloViaje_idEstiloViaje from viaje INNER JOIN pertenece on pertenece.Viaje_idViaje = viaje.idViaje where viaje.idViaje = '$idViaje'");

        if($consulta -> num_rows != 0)
        {
            while($detalleViaje = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $detalleViaje['nombre'],
                   2 => $detalleViaje['fecha_inicio'],
                   3 => $detalleViaje['fecha_fin'],
                   4 => $detalleViaje['estadoDelViaje'],
                   5 => $detalleViaje['EstiloViaje_idEstiloViaje']
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



    function consultaActividadesXDestino($linkDB, $idViaje, $idDestino)
    {
        $i=1;
        $salida = "";
        $arrayCompleto=null;
        $consulta = $linkDB -> query("SELECT actividad.nombre, tiene.localizacion, tiene.foto, destino.nombre as destino, contiene.fechaActividad from pertenece
                                        INNER join viaje on viaje.idViaje = pertenece.Viaje_idViaje
                                        INNER JOIN destino on destino.idDestino = pertenece.Destino_idDestino
                                        INNER JOIN contiene on contiene.Viaje_idViaje = viaje.idViaje and contiene.destino_idDestino = destino.idDestino
                                        INNER JOIN actividad on actividad.idActividad = contiene.Actividad_idActividad
                                        INNER JOIN tiene on tiene.Actividad_idActividad = actividad.idActividad and tiene.Destino_idDestino = destino.idDestino
                                        WHERE contiene.Viaje_idViaje = '$idViaje' and contiene.Destino_idDestino= '$idDestino'");
        if($consulta -> num_rows != 0)
        {
            while($actividades = $consulta -> fetch_assoc())
            {
                if ($i==1) {
                    $arrayCompleto = array(
                        1 => array(
                            1 => $actividades['nombre'],
                            2 => $actividades['localizacion'],
                            3 => $actividades['foto'],
                            4 => $actividades['destino'],
                            5 => $actividades['fechaActividad']

                        )
                      );
                }
                else {
                    $arrayNuevo = array(
                        1 => $actividades['nombre'],
                        2 => $actividades['localizacion'],
                        3 => $actividades['foto'],
                        4 => $actividades['destino'],
                        5 => $actividades['fechaActividad']
                  );
                  array_push($arrayCompleto, $arrayNuevo);
                }

               $i++;
           }
       }
        return $arrayCompleto;
    }

    function consultaDeseos($linkDB, $idUsuario)
    {
        $i=1;
        $salida = "";
        $arrayCompleto=null;
        $consulta = $linkDB -> query("SELECT destino.nombre, destino.pais, destino.foto from destino
                                        INNER JOIN deseos on deseos.destino_idDestino = destino.idDestino
                                        INNER JOIN usuario on usuario.idUsuario = deseos.usuario_idUsuario
                                        where deseos.usuario_idUsuario = $idUsuario;");
        if($consulta -> num_rows != 0)
        {
            while($actividades = $consulta -> fetch_assoc())
            {
                if ($i==1) {
                    $arrayCompleto = array(
                        1 => array(
                            1 => $actividades['nombre'],
                            2 => $actividades['pais'],
                            3 => $actividades['foto']
                        )
                      );
                }
                else {
                    $arrayNuevo = array(
                        1 => $actividades['nombre'],
                        2 => $actividades['pais'],
                        3 => $actividades['foto']
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
