<?php
    //incluimos el script php de funciones y conexion a la bd
    $buscar="";
    $filtro="";
    if(isset($_GET['buscar']))
        $buscar=$_GET['buscar'];
    $opcion=$_GET['opcion'];
    $usuario=$_GET['usuario'];
    if(isset($_GET['filtro']))
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
var id;
$('.btn-fab').click(function(){
    if($(this).hasClass('purple'))
		{ id=$(this).attr("id");
			var datos="ide="+$(this).attr("id")+"&usuario=<?php echo $usuario ?>&ban=1";
			$.ajax({
					url: 'modeloWishList.php',
					type: 'POST',
					data: datos,
					success: function(r)
					{     if(r==1)
                { myFunction("elimina");
                  elimina(id);
                }
					}
			});
		}
		else
		{ id=$(this).attr("id");
			var datos="ide="+$(this).attr("id")+"&usuario=<?php echo $usuario ?>&ban=0";
			$.ajax({
					url: 'modeloWishList.php',
					type: 'POST',
					data: datos,
					success: function(r)
					{   if(r==1)
              { myFunction("agrega");
                agrega(id);
              }
					}
			});
		}
	});
  function agrega(id)
  { $("#"+id+"").removeClass('green').addClass('purple');
    $("#"+id+"").html('<i class="material-icons" style="color:white;">favorite</i>');
  }
  function elimina(id)
  { $("#"+id+"").removeClass('purple').addClass('green');
    $("#"+id+"").html('<i class="material-icons" style="color:white;">add</i>');
  }
  function myFunction(opc)
  {// Get the snackbar DIV
    var x = document.getElementById(opc);
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
