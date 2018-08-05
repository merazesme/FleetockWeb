<?php

	function conexion ()
	{
		$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="fleetock-bd";
		$conexion=mysqli_connect($servidor, $usuario, $password, $bd);
		$conexion->set_charset("utf8");
		return $conexion;
	}
	/*if(conexion()){
		echo "conetado";
	}
	else {
		echo "no conectado";
	}*/
?>
