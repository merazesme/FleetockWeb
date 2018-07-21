<?php
    //definir constantes de conexion para la base de datos
    define("server", "localhost");
    define("user", "root");
    define("pass", "");
    define("mainDataBase", "fleetock-bd");

    //variable que indica el estatus de la conexion
    $errorConexion = false;


    function jalarTockname($linkDB, $tockname)
    {
        $salida = "";
        $consulta = $linkDB -> query("SELECT count(usuario) from login where usuario = '$tockname'");
        $i=0;
        if($consulta -> num_rows != 0)
        {
            while($cantTockname = $consulta -> fetch_assoc())
            {
                $salida = array(
                   1  => $cantTockname['usuario']
               );
           }
       }

        return $salida;
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
