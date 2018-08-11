$(document).ready(function(){
	$('.sidenav').sidenav();
	// Cambia el color del nav
	$(window).scroll(function(){
		if($(window).scrollTop()>680)
		{
			$('nav').addClass('color');
		}else
		{
			$('nav').removeClass('color');
		}
	});
	if($(window).scrollTop()>680)
	{
		$('nav').addClass('color');
	}else
	{
		$('nav').removeClass('color');
	}

	$('.modal').modal();

	$('.tabs').tabs();

	$('select').formSelect();

	$('.datepicker').datepicker();

	$('.parallax').parallax();

	$('.carousel.carousel-slider').carousel({
		fullWidth: true
		});


	$("#buscador").keyup(function(){
    var buscar = $("#buscador").val();
    muestraDestinos(buscar,0); // Busca lo que se introduce
	});
		muestraDestinos("",0);

		$('#btnTendencia').click(function(){
				muestraDestinos("",1);// Tendencias
		});
		$('.destinosScroll').click(function(){
				$(window).scrollTop(2820);
		});
		$('.homeScroll').click(function(){
				$(window).scrollTop(0);
		});
	});

	var imgItems = $('.sliderhead li').length;
	var imgPos = 1;
	$('.rightArrow span').click(nextSlider);
	$('.leftArrow span').click(prevSlider);
	/*setInterval(function()
	{
		nextSlider();
	}, 4000);*/
	function nextSlider()
	{
		if( imgPos >= imgItems)
			imgPos = 1;
		else imgPos++;
		$('.sliderhead li').hide();
		$('.sliderhead li:nth-child('+imgPos+')').show();
		//fadeTo("slow", 0.8)
	}
	function prevSlider()
	{
		if( imgPos <= 1)
			imgPos = imgItems;
		else
			imgPos--;
		$('.sliderhead li').hide();
		$('.sliderhead li:nth-child('+imgPos+')').show();
	}
/* 			buscador			*/
function muestraDestinos(valor,opc){
  $.ajax({
    url: "php/buscadorDestino.php",
    type:"POST",
    data:{buscar:valor,
					opcion: opc},
    success:function(respuesta){
      html=respuesta;
      $('#destinos').html(html);
    }
  });
}
