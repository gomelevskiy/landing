// Show navigation
$(function() {
    // Fixed navigation
    $(window).scroll(function () {
        if ($(this).scrollTop() > 900) {
            $('.navigation').addClass('on_fixed');
            $('.header_topline').addClass('mobile-fixed');
        } else {
            $('.navigation').removeClass('on_fixed');
            $('.header_topline').removeClass('mobile-fixed');
        }
    });
});


$(function () {
    $('#navigation-mobile li a').click(function () {
        $("html:not(:animated),body:not(:animated)")
            .animate({
                scrollTop: $($(this).attr("href")).offset().top - 80
            }, 1000);
        return false;
    });
});

$(function () {
    $('#navigation-mobile li a').click(function () {

        // if ($('body').width() < 992) {
        //     $('.menu_close').trigger("click");
        // }
        $('.menu-mobile-btn').trigger("click");
        $("html:not(:animated),body:not(:animated)")
            .animate({
                scrollTop: $($(this).attr("href")).offset().top - 80
            }, 1000);
        return false;
    });
});

// Slide to navigation
$(document).ready(function(){

    $('.show-modal').click(function() {
        $('.modal').modal();
    });

    $('.menu-mobile-btn').click(function() {
       $('.header_topline').toggleClass('mobile-open');
    });

    var textAround = $('.active-span').find('span').text();
    $('.around-block-mobile_text').text(textAround);

    $('.around-block-container-text').click(function() {
        $('.around-block-container-text').removeClass('active-span');
        $(this).addClass('active-span');
       textAround = $(this).find('span').text();
       $('.around-block-mobile_text').text(textAround);
    });


    var section_items=$('.section'),
        navigation_items=$('.scroll a');

    updateNavigation();
    $(window).on('scroll', function(){
        updateNavigation();
    });

    navigation_items.on('click',function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });

    $('.scroll_down').on('click',function(event){
        event.preventDefault();
        smoothScroll($(this.hash));
    });

    function updateNavigation() {
        section_items.each(function(){
            $this = $(this);
            var activeSection = $('#navigation a[href="#'+$this.attr('id')+'"]').data('number');
            if ( ( $this.offset().top - $(window).height()/2 < $(window).scrollTop() ) && ( $this.offset().top + $this.height() - $(window).height()/2 > $(window).scrollTop() ) ) {
                navigation_items.eq(activeSection).addClass('is-selected');
            }else {
                navigation_items.eq(activeSection).removeClass('is-selected');
            }
        });
    }

    function smoothScroll(target){
        $('body,html').animate(
            {'scrollTop':target.offset().top}
            ,600);
    }

});