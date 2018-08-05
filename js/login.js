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

	$('.tabs').tabs();
	});

	var imgItems = $('.sliderhead li').length;
	var imgPos = 1;
	$('.sliderhead li').hide();
	$('.sliderhead li:first').show();
	$('.right1 span').click(nextSlider);
	$('.left1 span').click(prevSlider);
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
