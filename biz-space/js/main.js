(function ($) {
 
/* ---------------------------------------------
 Nivo slider
---------------------------------------------*/
	$('#ensign-nivoslider').nivoSlider({
		effect: 'random',
		slices: 3,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 5000,
		startSlide: 0,
		directionNav: true,
		controlNavThumbs: false,
		pauseOnHover: false
	 });

 
})(jQuery);

/* ---------------------------------------------
 Scrolling Page
 ---------------------------------------------*/
var top_show = 150; // В каком положении полосы прокрутки начинать показ кнопки "Наверх"
var delay = 1000; // Задержка прокрутки
$(document).ready(function() {

	$(window).scroll(function () { // При прокрутке попадаем в эту функцию
		/* В зависимости от положения полосы прокрукти и значения top_show, скрываем или открываем кнопку "Наверх" */
		if ($(this).scrollTop() > top_show) $('#top').fadeIn();
		else $('#top').fadeOut();
	});
	$('#top').click(function () { // При клике по кнопке "Наверх" попадаем в эту функцию
		/* Плавная прокрутка наверх */
		$('body, html').animate({
			scrollTop: 0
		}, delay);
	});

	$("#zoom_mw").elevateZoom({
		zoomType: "lens",
		lensShape: "round",
		lensSize : 200
	});

});

/* ---------------------------------------------
 Menu scroll
 ---------------------------------------------*/
$(window).scroll(function() {
	var block_btn = $(".navbar");
	var offset = block_btn.offset();
	if(offset.top <= 200){
		$(".navbar").removeClass('fixed');
	}
	else {
		$(".navbar").addClass('fixed');
	}
});
