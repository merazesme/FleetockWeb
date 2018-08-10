<?php
    //incluimos el script php de funciones y conexion a la bd
    $buscar=$_GET['buscar'];
    $opcion=$_GET['opcion'];
    $usuario=$_GET['usuario'];
    $filtro=$_GET['filtro'];
    include('modeloDestino.php');

?>
<!DOCTYPE html>
<br>
<!-- The actual snackbar -->
<div id="agrega">Agregado al Wish List</div>
<div id="elimina">Eliminado del Wish List</div>
<?php
    muestraDestinos($buscar,$opcion,$usuario,$filtro);
 ?>
<script type="text/javascript">
var id; // Variable para guardar el id del destino que se quiere agregar o quitar del wish list
$('.btn-fab').click(function()
{
    var datos="ide="+$(this).attr("id")+"&usuario=<?php echo $usuario ?>"; // Se concatenan los datos que se mandaran
    id=$(this).attr("id"); // Se asigna el id del destino
    var mensaje="";
    if($(this).hasClass('purple')) // Si el destino tiene esta clase(purple) quiere decir que ya esta en el wish list y ahora se desea aliminar de este
		{ datos+="&ban=1";
      mensaje="elimina";
		}
		else // Si el destino tiene esta clase(green) quiere decir que se agregara al wish list
		{ datos+="&ban=0";
			mensaje="agrega";
		}
    $.ajax({ // Se mandan los datos al modelo
        url: 'modeloWishList.php',
        type: 'POST',
        data: datos,
        success: function(r)
        {   if(r==1)
            { myFunction(mensaje);
              agregaClase(id,mensaje);
            }
        }
    });
	});
  function agregaClase(id,opc) // Cambia la clase del boton si se agrega/elimina exitosamente de la base de datos
  { if(opc=="agrega")
    { $("#"+id+"").removeClass('green').addClass('purple');
      $("#"+id+"").html('<i class="material-icons" style="color:white;">favorite</i>');
    }
    else
    { $("#"+id+"").removeClass('purple').addClass('green');
      $("#"+id+"").html('<i class="material-icons" style="color:white;">add</i>');
    }
  }
  function myFunction(opc)
  { var x = document.getElementById(opc);
    // Add the "show" class to DIV
    x.className = "show";
    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }
  $('.detalles').click(function()
  { var idDestino="id="+$(this).attr("id")+'&band=destino';
    $.ajax({ // Se mandan los datos al modelo
        url: 'viajes.php',
        type: 'POST',
        data: idDestino,
        success: function(r)
        {
          window.location.href = 'detallesDestino.php';
        }
    });
  });
</script>
