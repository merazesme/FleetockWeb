<?php
function muestraDestinos($buscar,$opcion,$usuario,$filtro){
  include('conexion.php');
  $conexion=conexion();

  $card="";
  switch ($opcion)
  {   case 1:// Muestra todos los destinos
      $query="SELECT nombre, foto, idDestino, pais from destino order by nombre;";
      if( $buscar != '' ) // Si tecleo algo que buscar
      { $q=$conexion->real_escape_string($buscar);
        $query="SELECT nombre, destino.foto, idDestino, pais FROM destino
                inner join sedivideen on sedivideen.Destino_idDestino=destino.idDestino
                inner join tipositio on sedivideen.TipoSitio_idTipoSitio=tipositio.idTipoSitio
                WHERE nombre LIKE '%".$q."%' OR tipo LIKE '%".$q."%';";
      }
      break;
      case 2: // Tendencias
        $query="SELECT nombre, foto, idDestino, pais from destino INNER JOIN pertenece on idDestino = Destino_idDestino GROUP BY nombre HAVING COUNT(*) > 1";
      break;
      case 3: // Sugerencias
        $query='SELECT destino.idDestino, destino.nombre, destino.foto, pais FROM destino
                INNER JOIN sedivideen ON sedivideen.Destino_idDestino = idDestino
                INNER JOIN tipositio ON tipositio.idTipoSitio = sedivideen.TipoSitio_idTipoSitio
                INNER JOIN prefiere ON tipositio.idTipoSitio = prefiere.TipoSitio_idTipoSitio
                INNER JOIN usuario ON prefiere.Usuario_idUsuario = '.$usuario.' WHERE usuario.idUsuario = '.$usuario.' order by nombre;';
      break;
      case 4: // Filtro personalizado
        $query='SELECT nombre, foto, idDestino, pais FROM destino
                INNER join sedivideen on sedivideen.Destino_idDestino=idDestino and sedivideen.TipoSitio_idTipoSitio='.$filtro.' order by nombre';
        if ($buscar !='') // Si tecleo algo que buscar
        { $q=$conexion->real_escape_string($buscar);
          $query="SELECT nombre, foto, idDestino, pais FROM destino
                  INNER join sedivideen on sedivideen.Destino_idDestino=idDestino and sedivideen.TipoSitio_idTipoSitio= ".$filtro." WHERE nombre LIKE '%".$q."%';";
        }
      break;
      case 5: // Lista de destinos que tiene el usuario en su wish list
        $query="SELECT nombre, foto, idDestino, pais from destino
                inner join deseos on deseos.destino_idDestino=destino.idDestino WHERE deseos.usuario_idUsuario='.$usuario.' order by nombre;";
        if( $buscar != '' )
        {
          $q=$conexion->real_escape_string($buscar);
          $query="SELECT nombre, destino.foto, idDestino, pais from destino
                  inner join deseos on deseos.destino_idDestino=destino.idDestino
                  inner join sedivideen on sedivideen.Destino_idDestino=destino.idDestino
                  INNER JOIN tipositio on tipositio.idTipoSitio=sedivideen.TipoSitio_idTipoSitio
                  WHERE deseos.usuario_idUsuario=4 and destino.nombre LIKE '%".$q."%' or tipositio.tipo LIKE '%".$q."%';";
        }
      break;
      case 6: // Filtro personalizado en el wish list
        $query="SELECT nombre, destino.foto, idDestino, pais from destino
                inner join deseos on deseos.destino_idDestino=destino.idDestino
                inner join sedivideen on sedivideen.Destino_idDestino=deseos.Destino_idDestino
                WHERE sedivideen.TipoSitio_idTipoSitio='.$filtro.' and deseos.usuario_idUsuario='.$usuario.' order by nombre;";
        if ($buscar !='') // Si tecleo algo que buscar
        { $q=$conexion->real_escape_string($buscar);
          $query="SELECT nombre, destino.foto, idDestino, pais from destino
                  inner join deseos on deseos.destino_idDestino=destino.idDestino
                  inner join sedivideen on sedivideen.Destino_idDestino=deseos.Destino_idDestino
                  WHERE deseos.usuario_idUsuario=".$usuario." and sedivideen.TipoSitio_idTipoSitio=".$filtro." and destino.nombre LIKE '%".$q."%';";
        }
      break;
  }
  $buscarDestino = $conexion->query($query); // Se manda la consulta
  if ( $buscarDestino->num_rows > 0 ) // Se comprueba el numero de columnas
  {   $col=0; // Variable para crear las row de bootstrap
      while($fila = $buscarDestino->fetch_assoc()) // Se obtienen los datos de cada fila
      { // Comprueba que tenga imagen
        if (!file_exists('../'.$fila['foto']))
         $fila['foto']='Imagenes/Destinos/default.png';
        // Para saber si ya esta en el Wish List
        $wish='SELECT * FROM deseos WHERE destino_idDestino='.$fila['idDestino'].' AND usuario_idUsuario='.$usuario.';';
        $buscarDestinoWish = $conexion->query($wish);
        if ( $buscarDestinoWish->num_rows > 0 )
        { $clase='purple';
          $icono='favorite';
        }
        else
        { $clase='green';
          $icono='add';
        }
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
                $calificacion2.='<span class="material-icons">star</span>';
                $calificacion=$calificacion-1;
              }else
                  $calificacion2.='<span class="material-icons">star_border</span>';
              }
          }
        else
          $calificacion2='<span class="material-icons">star_border</span>
          <span class="material-icons">star_border</span>
          <span class="material-icons">star_border</span>
          <span class="material-icons">star_border</span>
          <span class="material-icons">star_border</span>';

        // Se crea el contenido
        if($col==0)
            $card.='<div class="row">';
        $col=$col+1;
        $fila['foto'] = substr($fila['foto'], 25);
        $card.='<div class="col-md-4 col-sm-12">
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
                      '.$calificacion2.'
                      <br>
                      <a class="detalles" id="'.$fila['idDestino'].'" href="#">Detalles</a>
                    </div>
                  </div>
                </div>';
                // echo "$fila['pais']";
        if($col==3) // Si ya existen 3 cards en la row de bostrap se cierra esta etiqueta y se iguala la variable col para crear una nueva row con la siguiente card
        { $card.='</div>';
          $col=0;
        }
      }
  }
  else // Si no encontro filas de lo que se solicita en la consulta se muestra este mensaje
  { $card='<div class="card container"><h5 class="info-title" style="text-align: center; padding: 25px;">No se encontraron destinos</h5>
              <i class="material-icons" style="font-size: 40px; text-align: center; margin-top:-25px; margin-bottom: 25px;">sentiment_dissatisfied</i>
            </div>
            <br>';
  }
  echo $card; // Se manda/imprime lo que genero la consulta
}
?>
