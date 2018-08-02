$(document).ready(function(){
  	$('.sidenav').sidenav();

    $('#lista').click(function(){
        muestraDestinos("",0);
    });
    $("#buscador").keyup(function(){
      var buscar = $("#buscador").val();
      muestraDestinos(buscar,0); // Busca lo que se introduce
    });



function muestraDestinos(valor,opc){
  $.ajax({
    url: "inicio.php",
    type:"POST",
    data:{buscar:valor,
					opcion: opc},
    success:function(respuesta){
      var html='<div class="container">';
        html+='<div class="row">';
          html+='<div class="input-field offset-l4 offset-m4 col s12 m6 l6">';
            html+='<i class="material-icons prefix">search</i>';
            html+='<input id="buscador" type="text">';
          html+='</div>';
          html+='<div class="input-field col offset-s3 s9 m2 l2">';
            html+='<a class="waves-effect waves-light btn" id="btnTendencia">Tendencias</a>';
          html+='</div>';
        html+='</div>';
      html+='</div>"';
      html+='<div class="row container">';
      html+=respuesta;
      html+='</div>';
      $('.cuerpo').html(html);
    }
  });
}
$('.greenLight').click(function(){
alert('hola mundo');
});
});
