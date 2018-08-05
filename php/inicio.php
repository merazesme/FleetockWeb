<?php

  $conexion=mysqli_connect('localhost','root','','fleetock-bd');
  $conexion->set_charset("utf8");

  $card="";
    $opcion=$_POST['opcion'];
  if($opcion == 0)
    {$query="SELECT nombre, foto, idDestino, pais from destino;";}
  else if($opcion == 1)
    {$query="SELECT nombre, foto, idDestino, pais from destino INNER JOIN pertenece on idDestino = Destino_idDestino GROUP BY nombre HAVING COUNT(*) > 1 OR destino.idDestino=5";}

  if(isset($_POST['buscar']) & $_POST['buscar'] != "")
  {
    $q=$conexion->real_escape_string($_POST['buscar']);
    $query="SELECT nombre, foto, idDestino, pais from destino WHERE nombre LIKE '%".$q."%';";
  }

  $buscarDestino = $conexion->query($query);
  if ( $buscarDestino->num_rows > 0 )
  {
      while($fila = $buscarDestino->fetch_assoc())
      {
        $card.=
        '<div class="col s12 m4 l4">
          <div class="card">
              <div class="card-image">
                <img class="activator" src="../'.$fila['foto'].'">
                <a class="btn-floating halfway-fab waves-effect waves-light greenLight" id="'.$fila['idDestino'].'"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">'.$fila['nombre'].'<i class="material-icons right">more_vert</i></span>
                <p><a style="color:#1faa00; " href="muestraDestino.php?id='.$fila['idDestino'].'" target="_blank">Detalles</a></p>
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">'.$fila['nombre'].'<i class="material-icons right">close</i></span>
                <p>Pais: '.$fila['pais'].'</p>
                <p>Calificacion: pendiente*</p>
                <p>ID '.$fila['idDestino'].'</p>
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
