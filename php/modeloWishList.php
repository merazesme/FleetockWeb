<?php
// Agrega y elimina destinos del Wish List
include('conexion.php');
$conexion=conexion();
//$usuario=$_POST('usuario');
$usuario=$_POST['usuario'];
$estilo=$_POST['ide'];
$bandera=$_POST['ban'];
if ($bandera == 0)
  $sql="insert into deseos(usuario_idUsuario,destino_idDestino) values ('$usuario', '$estilo');";
else if ($bandera == 1)
  $sql="DELETE FROM `deseos` WHERE `deseos`.`usuario_idUsuario` = '$usuario' AND `deseos`.`destino_idDestino` = '$estilo';";
if (mysqli_query($conexion, $sql)) {
  echo 1;
}

?>
