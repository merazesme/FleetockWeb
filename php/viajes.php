<?php
  session_start();
  if ($_POST['band']=='viaje')
  { $a=$_POST['a'];
    $d=$_POST['d'];
    $cadena= $_SESSION['idUsuario'].','.$a.','.$d;
  }
  else if($_POST['band']=='destino')
  {
    $cadena= $_SESSION['idUsuario'].','.$_POST['id'];
  }
  $_SESSION['idUsuario']=$cadena;
  echo $_SESSION['idUsuario'];
?>
