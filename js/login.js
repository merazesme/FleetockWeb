$(document).ready(function(){
	$('.sidenav').sidenav();

	$(window).scroll(function(){
	if($(window).scrollTop()>700)
	{
		$('nav').addClass('color');
	}else
	{
		$('nav').removeClass('color');
	}
	});

	$('.modal').modal();

	$('.tabs').tabs();

	$('select').formSelect();

	$('.datepicker').datepicker();

	$('.parallax').parallax();

	$('.carousel.carousel-slider').carousel({
		fullWidth: true
		});
});
