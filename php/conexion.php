<?php

	function conexion ()
	{
		$servidor="localhost";
		$usuario="root";
		$password="";
		$bd="fleetock-bd"; 
		$conexion=mysqli_connect($servidor, $usuario, $password, $bd);
		return $conexion;
	}
	/*if(conexion()){
		echo "conetado";
	}
	else {
		echo "no conectado";
	}*/
?>
