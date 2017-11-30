//console.log("index.js loaded.");

$(function()
{
	var $window = $(window);
	var $body = $('body');

	if ($window.width() >= 768)
	{
		/*
			Подгоняем слайды под высоту окна,
			а также считаем их координаты.
		*/

		var $screens = $('.js-fullscreen');
		var screenHeight = null; //px
		var screenPositions = [];
		var screensEnd = null; //px


		function resizeScreens()
		{
			if ($window.height() > $window.width()) return;
			
			var i = 0;
			screenHeight = $window.height();
			
			$screens.each(function(index, element)
			{
				var $this = $(element);
				$this
					.height(screenHeight + "px")
					.css("line-height", screenHeight + "px");
				var screenTop = Math.floor($this.position().top);
				var screenBottom = Math.floor(screenTop + screenHeight);

				screenPositions[i++] = { top:screenTop, bottom:screenBottom };
			});

			screensEnd = screenPositions[i-1].bottom;

			//console.log(screensEnd);
		}


		resizeScreens();


		/*$window.onTimeout("resize", function()
		{
			//console.log("resized");
			resizeScreens();
		},
		50);*/
		
		
		$window.on("resize", function()
		{
			//console.log("resized");
			resizeScreens();
		});






		if ($body.hasClass('js-mousewheel-enabled') && !Modernizr.touch)
		{
			var $htmlbody = $('html, body');
			var SCROLL_STEP = 100; //px
			/*var distance = null; //px
			var newScrollTop = null; //px
			var lastScrollTop = null; //px*/

			var prevScreenIndex = null;
			var currentScreenIndex = null;

			var isWheelBlockedByAnim = false;
			var wheelBlockTimeout = null;
			var SCREEN_SWITCH_TIME = 300; //ms
			var WHEEL_BLOCK_TIME = SCREEN_SWITCH_TIME * 1.2; //ms

			var lastTimestamp = new Date();
			var SUPPRESS_INTERVAL = 65; //ms
			var isLastScreenReleased = false;
			var firstTimestamp = null;
			var DEBLOCK_INTERVAL = 1500;

			var welcomeBackTimeout = null;
			var WELCOME_BACK_THRESHOLD = 200; //px
			var WELCOME_BACK_TIME = 100; //ms

			var $animPicture = $('.animate-picture');
			var $pictures = $animPicture.children();
			var isManual = false;
			
			var $phone = $('.phone').find('.i1');




			/*
				Начальная настройка
			*/
			$body.addClass('js-assemble');

			setTimeout(function(){$htmlbody.scrollTop(0);}, 100);

			//var event = $.Event("mousewheel", { deltaY: 1, deltaFactor: 1 });
			//setTimeout(function(){$(document).trigger(event);}, 50);

			$screens.eq(0).addClass('current');




			/*
				Плавно докрутить скролл до заданной позиции
			*/

			function animateScroll(value)
			{
				$htmlbody.animate({scrollTop: value}, SCREEN_SWITCH_TIME);

				isWheelBlockedByAnim = true;

				wheelBlockTimeout = setTimeout(function()
				{
					isWheelBlockedByAnim = false;
				},
				WHEEL_BLOCK_TIME * 1.2); // блокируем колесо чуть подольше, чем идет анимация
			}





			/*
				Когда скроллим наверх из зоны без слайдов, может получиться так,
				что кусок слайда уже будет виден, но не перелистнётся. Фиксим это недоразумение.
			*/

			function welcomeBackFix(event)
			{
				if ($window.scrollTop() < screensEnd + screenHeight)
				{
					//console.log("Near to screens...");
					
					welcomeBackTimeout = setTimeout(function()
					{
						//console.log($window.scrollTop() + ' > ' + screensEnd);

						if ($window.scrollTop() - WELCOME_BACK_THRESHOLD < screensEnd)
						{
							//console.log("Switching to last screen.");
							$body.addClass('js-assemble');
							$(document).trigger(event);
						}
					}, WELCOME_BACK_TIME);
				}
			}






			$(document).on("mousewheel", function(event)
			{





				/*
					Не обрабатываем скролл вне слайдов,
					но отслеживаем возвращение скролла обратно на слайды.
				*/

				clearTimeout(welcomeBackTimeout);
				if ($window.scrollTop() > screensEnd)
				{
					//console.log("outside of screens, " + $window.scrollTop() + ' > ' + screensEnd);
					welcomeBackFix(event);
					return;
				}






				/*
					Глушение инерционного скролла.
					Считаем интервал между событиями. У инерционного они идут очень часто. Отсекаем их.
				*/

				var newTimestamp = new Date();
				//console.log("delta: " + event.deltaY + ", factor: " + event.deltaFactor + ", interval: " + (newTimestamp - lastTimestamp));

				if (newTimestamp - lastTimestamp < SUPPRESS_INTERVAL &&
					($window.scrollTop() < screensEnd   ||   isLastScreenReleased))
				{
					event.preventDefault();
					lastTimestamp = newTimestamp;


					if (!firstTimestamp)
					{
						firstTimestamp = new Date();
					}
					else
					{
						if (newTimestamp - firstTimestamp > DEBLOCK_INTERVAL)
						{
							firstTimestamp = null;
							console.log("wheel deblocked.");
						}
						else return;
					}
					//return;
				}
				else
				{
					isLastScreenReleased = false;
					//console.log("Accepted interval: " + (newTimestamp - lastTimestamp));
				}

				lastTimestamp = newTimestamp;






				/* давим дефолтное действие */
				event.preventDefault();




				/* давим скролл на время анимации */
				if (isWheelBlockedByAnim) return;




				/* Простое перемещение скролла (без анимации) */

				//console.log("event: " + event.deltaY + ", factor: " + event.deltaFactor);
				var distance = SCROLL_STEP * (event.deltaY < 0 ? 1 : -1);
				//console.log("scrolled " + distance + "px");
				var newScrollTop = $window.scrollTop() + distance;
				$window.scrollTop(newScrollTop);




				/* Вычисление номера слайда  */

				var nextScreenIndex = null;

				for (i=0; i < screenPositions.length; i++)
				{
					if (distance > 0)
					{
						//console.log('scrolled down');

						if (newScrollTop + screenHeight >= screenPositions[i].top &&
						    newScrollTop + screenHeight < screenPositions[i].bottom)
						{
							nextScreenIndex = i;
						}
					}

					if (distance < 0)
					{
						//console.log('scrolled up');

						if (newScrollTop <= screenPositions[i].bottom)
						{
							nextScreenIndex = i;
							break;
						}
					}
				}








				/* Смена слайда  */

				if (nextScreenIndex != currentScreenIndex)
				{
					//console.log("Switching to " + nextScreenIndex);

					prevScreenIndex = currentScreenIndex;
					currentScreenIndex = nextScreenIndex;



					if (nextScreenIndex == null)
					{
						if (distance > 0) // значит скроллим вниз
						{
							newScrollTop = screensEnd;
							isLastScreenReleased = true;
							setTimeout(function()
							{
								isLastScreenReleased = false;
							}, 1000)
						}
						else
						{
							//console.log("leaving screens");
							return;
						}
					}
					else
					{
						newScrollTop = screenPositions[nextScreenIndex].top;
					}




					/* Докрутка */
					animateScroll(newScrollTop);





					/* Пересборка картинок */
					assemblePicture(nextScreenIndex);



				}


			});






			/*
				Анимация сборки картинки
			*/
			var assemblePicture = function(index)
			{
				$pictures.removeClass('current');
				$screens.removeClass('current');
				
				//console.log("Assembling picture " + index);

				if (index !== null)
				{
					$pictures.eq(index).addClass('current');
					$screens.eq(index).addClass('current');
					$animPicture.addClass('with-bg');
				}
				else
				{
					$animPicture.removeClass('with-bg');
				}




				/* Костыли */
				if (!Modernizr.csstransitions)
				{

					// полный улёт!
					var order = 1;
					$pictures.not('.current').find('img').not($phone).each(function(index, element)
					{
						var $this = $(element);
						$this.stop().removeAttr("style");
					});
					
					if (!prevScreenIndex) $phone.stop().animate({"bottom" : 800}, 500);


					// полный прилёт!
					var order = 1;
					$pictures.eq(index).children('img').not($phone).each(function(index, element)
					{
						var $this = $(element);
						setTimeout(function()
						{
							$this.stop().animate({"margin-top" : 0, "margin-left" : 0}, 300);
						}, 100*(order++));
					});
					
					if (index == 0) $phone.stop().animate({"bottom" : 2}, 500);


				}



			}




			/*
				Скролл при помощи скролл-бара
			*/
			$window.on("scroll", function(event)
			{
				//console.log(isWheelBlockedByAnim ? "wheel blocked by animation" : "wheel normal");
				
				$body.toggleClass('js-assemble', isWheelBlockedByAnim);
			});






		}
	}
	
	
	
	
	
	
	
	 $(".nav-toggle").click(function () {
        $("header nav ul").slideToggle("fast", function () {
            $(this).toggleClass('active').attr("style", "");

        })
        return false;
    });
	
	
	
	
	
	if (!Modernizr.borderradius)
	{
		$('.directions').find('.ico').corner("100px");
		$('.news-promo-text').corner("20px");
		$('.news-link').corner("10px");
	}
	
	
	
});