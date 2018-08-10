<?php

$u=$_POST['u'];
$l=$_POST['l'];
$a=$_POST['a'];
$d=$_POST['d'];
$cadena=$l.','.$u.','.$a.','.$d;
session_start();
$_SESSION['idUsuario']=$cadena;
//header('Location: detalleViaje.php');
echo 1;
?>
