(function($){
	
	$.fn.ultraScroll = function( sliderOptions ){
		var defaultOptions = {
			easing: 'easeInOutCubic',
			duration:500,
			pager:true,
			slideObject: "section",
			slideObjectContent: ".container",
			slideMovable: ".slide-movable",
			activeClass:"slide-active",
			headerOffset: 50,
			footerOffset:0
		};
		var options = $.extend({}, defaultOptions, sliderOptions);

		var init = function(obj){
			
			var $this = {};
			$this.slider = $(obj) //слайдер
			$this.slider.movable = $this.slider.find(options.slideMovable); //подвижная часть слайдера
			$this.slider.slide = $this.slider.find(options.slideObject); //слайд
			//$this.slider.slide.container = $this.slider.slide.find(options.slideObjectContent);
			$this.winWidth = $(window).width();  //ширина экрана
			$this.winHeight = $(window).height(); //высота экрана
			$this.animateActive = 0
			

			$this.slider.slide.eq(0).addClass(options.activeClass); //добавляем первому слайду класс эктив
/* resize {*/

			//sliderContainerResize($this);  //генерируем размеры контейнера (не нужно?) // "всё равно?!"
			sliderSlideResize($this); //генерируем размеры контент
			$this.totalHeight = totalHeight($this);
			$this.slider.movable.css({"height":$this.totalHeight+"px"})


		/*resize event {*/

			$(window).resize(function() {
				$this.winWidth = $(window).width(); // при ресайзе обновляем размеры окна
				$this.winHeight = $(window).height(); // при ресайзе обновляем размеры окна
	       		//sliderContainerResize($this); //ресайзим контейнер
	       		sliderSlideResize($this); //ресайзим слайды
	       		$this.totalHeight = totalHeight($this); //пересчитываем высоту движимой части
				$this.slider.movable.css({"height":$this.totalHeight+"px"}) //подставляем высоту движимой части
	   		});

	   	/*} resize event*/
/*} resize */
/* scroll { */

			
				sliderScroll($this);
			


/* } scroll  */

		};

		/*рассчитываем полную высоту страницы*/
		var totalHeight = function($this){

			var totalHeightVar = 0
			$this.slider.slide.each(function(){
				totalHeightVar += $(this).height();
			});
			return totalHeightVar;
		};

		var sliderScroll = function($this) {

			var isHandlerBlocked = false;
			var unblockTimer = null;
			var isMac = (navigator.appVersion.indexOf("Mac") != -1);
			var isEventAlreadyFired = false;
			var whereSlidesEnd = - $('.b-direction-summary').position().top;
			var time = null;


			$(window).mousewheel(function(event, delta, deltaX, deltaY){
				//event.preventDefault();

			if (isMac)
			{
				if (isHandlerBlocked) { console.log("mousewheel event blocked"); return; }

				if ($('.slide-movable').position().top > whereSlidesEnd) time = 600;
				else time = 100;

				isHandlerBlocked = true;
				clearTimeout(unblockTimer);
				unblockTimer = setTimeout(function()
				{
					isHandlerBlocked = false;
				}, time);

				if (isEventAlreadyFired)
				{
					isEventAlreadyFired = false;
					console.log("duplicate mousewheel event blocked");
					return;
				}
				else isEventAlreadyFired = true;
			}

				if ($this.animateActive == 0 ) {
					$this.animateActive = 1;

if (deltaY < 0) deltaY = -1;
if (deltaY > 0) deltaY = 1;

					var movableOffsetTop = $this.slider.movable.position().top + (deltaY*100)
					var slideActive = $this.slider.find(options.slideObject+"."+options.activeClass);
					var slideNext, slidePrev;
					var move;


					if (slideActive.index()+1 < $this.slider.slide.length){
						slideNext = $this.slider.slide.eq(slideActive.index()+1);
					} else {
						slideNext = slideActive;
					}

					if (slideActive.index()-1 >= 0) {
						/*console.log(slideActive.index()-1)*/
						slidePrev  = $this.slider.slide.eq(slideActive.index()-1);
					}
					else {
						slidePrev = slideActive ;
					}

					/*console.log(
						"предыдущий слайд - ", slidePrev.index(), slidePrev.position().top +"\n" +
						"текущий слайд - ", slideActive.index(), slideActive.position().top  +"\n" +
						"следующий слайд - ", slideNext.index(), slideNext.position().top +"\n" +
						"movableOffsetTop - ", movableOffsetTop - $this.winHeight
					)*/

					var slideActiveOffset = 0-slideActive.position().top-slideActive.height();
					

					/*границы скролла {*/
					if (movableOffsetTop > 0) { 
						movableOffsetTop = 0
					}
					else if ( movableOffsetTop < -$this.totalHeight + $this.winHeight ){
						movableOffsetTop = 0-$this.totalHeight + $this.winHeight;
					}
					/*} границы скролла */




					if (delta < 0 && movableOffsetTop-$this.winHeight < -slideNext.position().top ) {

						if (slideNext.is(":last-child")) {
						//	console.log (slideNext.index(),  $this.slider.slide.length)
							move = -$this.totalHeight+$this.winHeight-90 + "px";  //70 - magic fix pix
						} else {
							move = -slideNext.position().top+"px"
						}
						$this.slider.movable.addClass("as").stop().animate(
							{
								"top": move
							}, {
								queue: false,
								duration : options.duration,
								easing : options.easing,
								complete: function(){
									$this.slider.movable.removeClass("as")
									slideActive.removeClass(options.activeClass);
									slideNext.addClass(options.activeClass);
									$this.animateActive = 0;
								}
							}
		
						)

						
					}
					else if (delta > 0 && movableOffsetTop > -slidePrev.position().top - slidePrev.height()  ) {
						if (slidePrev.is(":first-child")) {
						//	console.log (slideNext.index(),  $this.slider.slide.length)
							move = 0
						} else {
							move = -slidePrev.position().top-slidePrev.height()+$this.winHeight-20+"px"
						}
						$this.slider.movable.addClass("as").stop().animate(
							{
								"top": move
							}, {
								queue: false,
								duration : options.duration,
								easing : options.easing,
								complete: function(){
									$this.slider.movable.removeClass("as")
									slideActive.removeClass(options.activeClass);
									slidePrev.addClass(options.activeClass);
									$this.animateActive = 0;
								}
							}
		
						)
					}
					else {
						$this.animateActive = 0;
						$this.slider.movable.css({"top": movableOffsetTop+"px"});
					}
					/*хак с анимацией {*/
						if (delta < 0 && slideNext.is(".b-direction") && $this.slider.movable.is(".as")) {
							slideActive.removeClass("animActive");
							slideNext.addClass("animActive");
							$(".animate-picture").addClass("show").removeClass("slide"+slideActive.index()).addClass("slide"+slideNext.index());

						} else if ( delta > 0 && slidePrev.is(".b-direction") && $this.slider.movable.is(".as")) {
							slideActive.removeClass("animActive");
							slidePrev.addClass("animActive");
							$(".animate-picture").addClass("show").removeClass("slide"+slideActive.index()).addClass("slide"+slidePrev.index());
						} else {
							$this.slider.slide.removeClass("animActive");
							$(".animate-picture").removeClass("show").removeClass("slide"+slideActive.index());

						}
					/*} хак с анимацией */
				} 
			});
		};

		var sliderSlideResize = function($this){
			$this.slider.slide.each(function(){

				var slideContent = $(this).find(options.slideObjectContent);
				var slideContentHeight = slideContent.height();
				var slideContentOffset = (($this.winHeight +options.headerOffset -options.footerOffset - slideContentHeight)/2)

				if ($(this).is(".no-resize")){
					$(this).css({
						"width":$this.winWidth+"px",
						"height":$(this).height() + "px"
					})
				} else {
					if (slideContentHeight > $this.winHeight){
						$(this).css({
							"width":$this.winWidth+"px",
							"height":slideContentHeight + 70 + "px"
						})
						slideContent.css({
							"padding-top":70+"px"
						})
					} else {
						$(this).css({
							"width":$this.winWidth+"px",
							"height":$this.winHeight-0+"px"
						})
						slideContent.css({
							"padding-top":slideContentOffset+"px"
						})
					}
				}
				
			})
			

		};

		if (this.length > 0){
			this.each(function(){
				init(this);
			});
		}
		return this;
	}
})(jQuery);


$(document).ready(function(){
	
	if ($(window).width() > 640)
	{
		$(".slide-wrapper").ultraScroll();
	}
	else
	{
		
		if ($('.page-directions').length > 0) {
			// На странице направлений иконку не удаляем
		} else {
			$('.animate-picture').remove();
			$('.is-text-fading').removeClass('is-text-fading');
			//$('.b-direction').height($(window).height());
		}
	}
	
})




