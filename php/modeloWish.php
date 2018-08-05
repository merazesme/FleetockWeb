<?php
function muestraWishList($buscar,$opcion,$usuario){
  $conexion=mysqli_connect('localhost','root','','fleetock-bd');
  $conexion->set_charset("utf8");

  $card="";
    //$opcion=$_POST['opcion'];
  $query="SELECT nombre, foto, idDestino, pais from destino inner join deseos on deseos.destino_idDestino=destino.idDestino WHERE deseos.usuario_idUsuario='.$usuario.';";
  if( $buscar != '' && $opcion == 1 )
  {
    $q=$conexion->real_escape_string($buscar);
    $query="SELECT nombre, foto, idDestino, pais from destino inner join deseos on deseos.destino_idDestino=destino.idDestino WHERE deseos.usuario_idUsuario='.$usuario.' and nombre LIKE '%".$q."%';";
  }
  $buscarDestino = $conexion->query($query);
  if ( $buscarDestino->num_rows > 0 )
  {   $col=0;
      while($fila = $buscarDestino->fetch_assoc())
      { //Para saber la calificacion de cada destino
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
                <a style="position:absolute; margin-left:80%; margin-top:-20px;" id="'.$fila['idDestino'].'" class="btn btn-fab btn-round purple">
                <i class="material-icons" style="color:white;">attach_file</i>
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
    <div class="card container"><h5 class="info-title" style="text-align: center; padding: 25px;">No se encontro destino en WishList</h5>
      <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
    </div>
    <br>';
  }
  echo $card;
}
 ?>
