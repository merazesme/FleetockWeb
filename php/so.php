<?php

    $conexion=new mysqli('localhost', 'root', '', 'fleetock-bd');

    $consulta = "select * from usuario";

    $resultado = $conexion->query($consulta);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title></title>
     </head>
     <body>
         <?php
             while ($row = $resultado->fetch_assoc()) {
                 echo
                 '
                     <p>Nombre: '.$row['nombre'].'</p>
                     <p>Apellidos: '.$row['apellidos'].'</p>
                 ';
             }
        ?>
     </body>
 </html>
