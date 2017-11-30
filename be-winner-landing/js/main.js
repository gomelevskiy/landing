$(document).ready(function () {

    if (isIpad)
    {
        $('footer').appendTo('.content');
        $('.content').on('touchmove', function(event)
        {
            event.stopPropagation();
        });

        $('html').addClass('ipad');

        $('body')
            .on('touchmove', function(event){ event.preventDefault(); })
            .css("visibility", "visible");


        
    }

    /*layout {*/
    $(".nav-toggle").click(function () {
        $("header nav ul").slideToggle("fast", function () {
            $(this).toggleClass('active').attr("style", "");

        })
        return false;
    });

    winSizeLayout();
    winScrollLayout();

    $(window).resize(function () {
        winSizeLayout();
    });
    $(window).scroll(function () {
        winScrollLayout();
    });



    $(".up").click(function () {
        $('html,body').animate({ scrollTop: 0 }, 500);
        return false;
    })


    function winSizeLayout() {
        var wW = $(window).width();
        var mobSize = 640;
        var page = $("html");
        var header = $("header");
        var $container = $('.isotope');
        if (wW > mobSize) {
            if (!page.is(".desktop")) {
                page.addClass("desktop");
            }
        } else {
            if (page.is(".desktop")) {
                page.removeClass("desktop");
            }
        }
    }
    function winScrollLayout() {
        var header = $("header");
        var page = $("html");
        header.css("left", "-" + $(window).scrollLeft() + "px");
        if ($("header .subnav").length) {

            $("header").addClass("subnav-active");
        }

        if (page.is(".desktop")) {
            if ($(window).scrollTop() > 70 && header.is(".subnav-active")) {
                if (!header.is(".nav-hidden")) {
                    header.addClass("nav-hidden");
                }

            } else {
                if (header.is(".nav-hidden")) {
                    header.removeClass("nav-hidden")
                }
            }
        }

        //header.css("top",$(window).scrollTop()+"px");

    }
    /*} layout */

    /*isotope {*/
    if ($(".isotope").length) {

        var $container = $('.isotope');
        var column = $container.attr("data-column")
        $container.isotope({
            // options
            itemSelector: 'article',
            /*masonryHorizontal: {
            rowHeight: 320
            }*/
            masonry: {
                columnWidth: column
            }
        });

        
        // выбор пункта меню вакансии -----------

        $('.vacancy-filter a').click(function () {
            $('.vacancy-filter li').toggleClass('show');
        })

        //----------------//

        // выбор пункта меню проекты -----------

        $('.projects-list-filter a').click(function () {
            $('.projects-list-filter li').toggleClass('show');
        })

        //----------------//


        $('.vacancy-filter a').click(function () {
            var selector = $(this).attr('data-filter');
            $('.vacancy-filter li').removeClass("active");
            $(this).parent().addClass("active")
            $container.isotope({ filter: selector });
            return false;
        });
        $('.projects-list-filter a').click(function () {
            var selector = $(this).attr('data-filter');
            $('.projects-list-filter li').removeClass("active");
            $(this).parent().addClass("active")
            $container.isotope({ filter: selector });
            return false;
        });
    }
    /*} isotope */

    /* page-main {*/
    if ($(".page-directions").length) {
	    if ($(".b-direction").length) {
	        winSizeDirection();

	        $(window).resize(function () {
	            winSizeDirection();
	        });
	        $(window).scroll(function () {
	            winScrollDirection();
	        })
	    }
	}	
    function winScrollDirection() {
        var page = $("html");
        var section = $(".b-direction");
        var scrollTopVar = $(window).scrollTop();
        section.each(function () {
            var $this = $(this);
            $this.heightV = $(this).height();
            $this.offsetV = $this.offset().top - $this.heightV * 0.35;



            //    		console.log($this.offsetV, $this.heightV*0.75,scrollTopVar  )
            if ($this.offsetV < scrollTopVar && $this.heightV * 0.75 + $this.offsetV > scrollTopVar) {
                $(this).find(".animate-picture").addClass("active");
            } else {
                $(this).find(".animate-picture").removeClass("active");
            }
        })

    }
    function winSizeDirection() {	
        var section = $(".b-direction")
        var sectionContainer = section.find(".container");
        var offset = 70;
        if ($(".page-directions").length) {

        }
        var minH = 700;
        var page = $("html");


        var wH = $(window).height() - offset; //

        if (page.is(".desktop")) {
            if (wH > minH) {
                section.css({
                    "height": wH + "px"
                })
            } else {
                section.css({
                    "height": minH + "px"
                })
            }

            sectionContainer.each(function () {
                var cH = $(this).height() //realContentHeight
                var gH = (wH - cH) / 2;  //gridHeight
                if (gH > -30) {
                    $(this).css({
                        "padding-top": gH + "px"
                    })
                } else {
                    $(this).css({
                        "padding-top": "1px"
                    })
                }

                if (cH > wH) {
                    $(this).css({
                        "padding-top": "50px"
                    })
                    section.css({
                        "height": (cH + 50) * 1 + "px"
                    })
                }
            })
        } else {
            section.css({
                "height": "auto"
            })
            sectionContainer.css({
                "padding-top": offset + "px",
                "padding-bottom": offset + "px"
            })
        }

    }
    /* } page-main */
    /*advertising form {*/
    $(".advertising a").click(function () {
        $(".advert-form").slideToggle('slow', function() {
	        if ($(".advert-form:visible")) {
	        	$('html,body').animate({ scrollTop: $(".advert-form").offset().top-30 }, 500);
	        }
        });
        return false;
    })
    /*} advertising form */
    /*input[type='file'] {*/


    // также используется в form.js
    // после валидации приходит новый html для формы, поэтому customizeFileInputs вызывается там еще раз
    ;(window.customizeFileInputs = function()
    {
        
        if ($("input[type='file']").length) {
            $("input[type='file']").each(function () {
                var $this = $(this);
                $this.wrap("<div class='input-file-wrapper'></div>");
                $this.wrapper = $this.parents(".input-file-wrapper");
                if ($this.attr("data-lang") == 'en') $load_name = ' Upload'; 
                else $load_name = 'Загрузить';
                
                $this.wrapper.append("<div class='load'>"+$load_name+"...</div>")
                $this.wrapper.append("<div class='pseudo-text'></div>")

            });
            $("input[type='file']").change(function () {
                $("input[type='file']").each(function () {
                    var name = this.value;
                    reWin = /.*\\(.*)/;
                    var fileTitle = name.replace(reWin, "$1");
                    reUnix = /.*\/(.*)/;
                    fileTitle = fileTitle.replace(reUnix, "$1");
                    $('.pseudo-text').html(fileTitle);
                    $(this).parents('.form-row').removeClass('error');
                });
            });
        }
    })();


    /*{ input[type='file'] */
    /*carousel {*/
    if ($(".carousel-wrapper").length) {
        $(".carousel-wrapper").each(function () {
            var ip = $(this),
				slide = ip.find("li"),
				pager = ip.find(".carousel-pager i"),
				slideLength = ip.find("li").length;
            arr = ip.find(".arr");
            activity = 0,
				inAnim = "-" + slide.width() + "px",
				outAnim = slide.width() + "px";
            slide.removeClass("active");
            pager.removeClass("active");
            slide.eq(0).addClass("active");
            pager.eq(0).addClass("active");
            /*arr.click(function(){
            if(activity==0){
            activity=1;
            inAnim = "930px";
            outAnim = "-930px";
            if(!$(this).is(".r")){
            inAnim = "-930px";
            outAnim = "930px";
            nextSlide = ip.find("li.active").index()-1;
            } else {
            nextSlide = ip.find("li.active").index()+1;
            }
					
            if (nextSlide > slideLength-1) {nextSlide = 0}
            if (nextSlide < 0) {nextSlide = slideLength-1}

            pager.removeClass("active");
            pager.eq(nextSlide).addClass("active")
            ip.find("li.active").animate({"left":outAnim},600,function(){
            $(this).removeClass("active");
            });
            ip.find("li").eq(nextSlide).css({"left":inAnim}).show().animate({"left":"0"},600,function(){
            $(this).addClass("active");
            activity=0;
            });
            }
            return false;
            });*/
            pager.click(function () {
                if (activity == 0) {
                    if (!$(this).is(".active")) {
                        activity = 1;
                        inAnim = "-" + slide.width() + "px",
						outAnim = slide.width() + "px";


                        if (ip.find(".carousel-pager i.active").index() < $(this).index()) {
                            inAnim = slide.width() + "px",
							outAnim = "-" + slide.width() + "px";

                        }

                        pager.removeClass("active");
                        $(this).addClass("active");
                        ip.find("li.active").animate({ "left": outAnim }, 600, function () {
                            $(this).removeClass("active").hide();
                        });
                        ip.find("li").eq($(this).index()).css({ "left": inAnim }).css("display", "block").animate({ "left": "0" }, 600, function () {
                            $(this).addClass("active");
                            activity = 0;
                        });
                    }
                }
                return false;
            });
        });
    }

    /*} carousel */

    // выбор пункта меню о компании -----------

		$subnavs = $('.subnav-wrapper li');
		
        $subnavs.children('a').click(function(event)
        {
        	var $li = $(this).parent();
        	
        	if ($li.hasClass('show')) {
        		// Клик по пункту открытого меню
        	} 
        	else if ($li.hasClass('active'))
        	{
        		// Открываем меню
        		$subnavs.toggleClass('show');
        		event.preventDefault();
        	}
        });

    //----------------//
    
    if ($('.page-projects-detail').length)
    {
    	// Подгоняем высоту; нужен запас времени
    	setTimeout(function()
    	{
		    var $car = $('.carousel-wrapper');
		    var $li = $car.find('li');
		    var $img = $li.find('img');
		    
		    $li.css("visibility", "hidden").show(); // Иначе высота не считается
		    
		    var maxHeight = Math.max.apply(null, $img.map(function ()
			{
				console.log("H" + $(this).height());
			    return $(this).height();
			}).get());
			
			$li.removeAttr("style");
			
		    var h = maxHeight + 50;
		    $car.height(h);
		    $car.find('li').height(h);
		}, 1000);
	    
	    
	    // Свайпаем карусель
	    var $buttons = $('.carousel-pager').children('i');
	    var maxIndex = $buttons.length - 1;
	    
	    $('.carousel')
	    	.hammer()
	    	.on("swipeleft", function()
		    {
		    	var currentIndex = $buttons.parent().find('.active').index();
		    	//var newIndex = (currentIndex == maxIndex ? 0 : currentIndex+1);
		    	if (currentIndex < maxIndex) $buttons.eq(currentIndex+1).trigger('click');
		    	
		    })
		    .on("swiperight", function()
		    {
		    	var currentIndex = $buttons.parent().find('.active').index();
		    	//var newIndex = (currentIndex == 0 ? maxIndex : currentIndex-1);
		    	if (currentIndex > 0) $buttons.eq(currentIndex-1).trigger('click');
		    })
	    
	}
	
	
	$(document).on('click', '.page-show-more.press', function() {
		
		pagen = parseInt($(this).attr('data-page'))+1;
		
		box = $('.page-show-more').parent();
		$('.page-show-more').remove();
		  
		$.get("/ru/company/press/ajax.php?PAGEN_1="+pagen, function( data ) {
			box.append(data);
		});
		
	})
	
	$(document).on('click', '.page-show-more.news', function() {
		
		pagen = parseInt($(this).attr('data-page'))+1;
		
		box = $('.page-show-more').parent();
		$('.page-show-more').remove();
		  
		$.get("/ru/company/news/ajax.php?PAGEN_1="+pagen, function( data ) {
			box.append(data);
		});
		
	})
    
    
});


	