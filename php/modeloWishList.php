<?php
// Agrega y elimina destinos del Wish List
include('conexion.php');
$conexion=conexion();
//$usuario=$_POST('usuario');
$usuario=$_POST['usuario'];
$destino=$_POST['ide'];
$bandera=$_POST['ban'];
if ($bandera == 0)
  $sql="insert into deseos(usuario_idUsuario,destino_idDestino) values ('$usuario', '$destino');";
else if ($bandera == 1)
  $sql="DELETE FROM deseos WHERE deseos.usuario_idUsuario = '$usuario' AND deseos.destino_idDestino = '$destino';";
if (mysqli_query($conexion, $sql))
  echo 1;
else
  echo 0;
?>
