<?php
function muestraDestinos($buscar,$opcion){
  $conexion=mysqli_connect('localhost','root','','fleetock-bd');
  $conexion->set_charset("utf8");

  $card="";
    //$opcion=$_POST['opcion'];
  $query="SELECT nombre, foto, idDestino, pais from destino;";
  if($opcion == 2 )
  {$query="SELECT nombre, foto, idDestino, pais from destino INNER JOIN pertenece on idDestino = Destino_idDestino GROUP BY nombre HAVING COUNT(*) > 1 OR destino.idDestino=5;";}

  if( $buscar != '' && $opcion == 1 )
  {
    $q=$conexion->real_escape_string($buscar);
    $query="SELECT nombre, foto, idDestino, pais from destino WHERE nombre LIKE '%".$q."%';";
  }

  $buscarDestino = $conexion->query($query);
  if ( $buscarDestino->num_rows > 0 )
  {   $col=0;
      while($fila = $buscarDestino->fetch_assoc())
      { // Para saber si ya esta en el Wish List
        $query2='SELECT * FROM deseos WHERE destino_idDestino='.$fila['idDestino'].';';
        $buscarDestino2 = $conexion->query($query2);
        if ( $buscarDestino2->num_rows > 0 )
          {$clase='purple';
            $icono='attach_file';
          }
        else
          {$clase='green';
            $icono='add';
          }
        //Para saber la calificacion de cada destino
        $qcal="SELECT round(avg(calificacion),1) as cal FROM destino inner join comentarios on comentarios.destino_idDestino= destino.idDestino WHERE idDestino=".$fila['idDestino'].";";
        $resultcal=$conexion->query($qcal);
        $fila2 = $resultcal->fetch_assoc();
        if ($fila2['cal']!=NULL)
          $calificacion=$fila2['cal'];
        else
          $calificacion='Sin calificación';

        if($col==0)
            $card.='<div class="row">';
        $col=$col+1;
        $card.=
        '<div class="col-md-4 col-sm-12">
            <div class="card" style="width: 100%; height: 360px;">
              <div class="card-img-top">
                <img style="width: 100%; height: 200px;" src="../'.$fila['foto'].'">
                <a style="position:absolute; margin-left:80%; margin-top:-20px;" id="'.$fila['idDestino'].'" class="btn btn-fab btn-round '.$clase.'">
                <i class="material-icons" style="color:white;">'.$icono.'</i>
                </a>
              </div>
              <div class="card-body">
                <span class="card-title center-align">'.$fila['nombre'].'</span>
                <p class=" card-text center-align">'.$fila['pais'].'</p>
                <p class="card-text center-align">Calificacion: '.$calificacion.'</p>
                <a href="#">Detalles</a>
              </div>
            </div>
          </div>
        ';
        if($col==3)
        {
          $card.='</div>';
          $col=0;
        }
      }
  }
  else
  {
    $card='
    <div class="card container"><h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron destinos</h5>
    <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
    </div>
    <br>';
  }
  echo $card;
}
 ?>
