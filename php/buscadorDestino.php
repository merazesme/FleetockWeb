<?php

  $conexion=mysqli_connect('localhost','root','','fleetock-bd');
  $conexion->set_charset("utf8");

  $card="";
  $opcion=$_POST['opcion'];
  if($opcion == 0)
  {$query="SELECT nombre, foto, idDestino, pais from destino order by nombre;";}
  else if($opcion == 1)
    {$query="SELECT nombre, foto, idDestino, pais from destino INNER JOIN pertenece on idDestino = Destino_idDestino GROUP BY nombre HAVING COUNT(*) > 1;";}

  if(isset($_POST['buscar']) & $_POST['buscar'] != "")
  {
    $q=$conexion->real_escape_string($_POST['buscar']);
    $query="SELECT nombre, foto, idDestino, pais from destino WHERE nombre LIKE '%".$q."%';";
  }

  $buscarDestino = $conexion->query($query);
  if ( $buscarDestino->num_rows > 0 )
  {
      while($fila = $buscarDestino->fetch_assoc())
      { // Comprueba que tenga imagen
          $fila['foto'] = substr($fila['foto'], 25);
        if (!file_exists('../'.$fila['foto'].''))
          $fila['foto']='Imagenes/Destinos/default.png';
        // Para saber la calificacion de cada destino
        $qcal="SELECT round(avg(calificacion)) as cal FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino=".$fila['idDestino'].";";
        $resultcal=$conexion->query($qcal);
        $fila2 = $resultcal->fetch_assoc();
        $calificacion=$fila2['cal'];
        $calificacion2='';
        if ($fila2['cal']!=NULL)
          {
            for ($x=0; $x<5; $x++){
              if($calificacion>0){
                $calificacion2.='<span class="material-icons" style="size:10px;">star</span>';
                $calificacion=$calificacion-1;
              }else
                  $calificacion2.='<span class="material-icons" style="size:10px;">star_border</span>';
              }
          }
        else
          $calificacion2='<span class="material-icons" style="size:10px;">star_border</span>
          <span class="material-icons" style="size:10px;">star_border</span>
          <span class="material-icons" style="size:10px;">star_border</span>
          <span class="material-icons" style="size:10px;">star_border</span>
          <span class="material-icons" style="size:10px;">star_border</span>';

        $card.=
        '<div class="col s12 m6 l4">
        <div class="card" style="height:400px;">
          <div class="card-image">
            <img src="'.$fila['foto'].'">
          </div>
          <div class="card-content">
            <p style="color: #3C4858; text-decoration: none;font-weight: 700; font-size: 14px; margin-top:-12px;" >'.$fila['nombre'].'</p>
            <p style="font-size: 14.4px; margin-bottom:10px; margin-top:3px;">'.$fila['pais'].'</p>
            '.$calificacion2.'
            <p><a href="muestraDestino.php?id='.$fila['idDestino'].'"  style="color:#9c27b0;">Detalles</a></p>
          </div>
        </div>
        </div>
        ';
      }
      $card.='</table>';
  }
  else
  {
    $card='
    <div>
        <h6 class="center-align">No se encontraron destinos <i class="material-icons">sentiment_dissatisfied</i></h6>
    </div>';
  }
  echo $card;
 ?>
