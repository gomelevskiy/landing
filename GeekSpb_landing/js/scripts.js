//GOMELEVSKIJ ALEKSEJ *************  GOMELEVSKIJ.RU
jQuery(document).ready(function () {
    'use strict';

    var slider;

    $(".owl-portfolio").owlCarousel({
        items : 4,
        itemsDesktop : [1000, 2],
        itemsDesktopSmall : [768, 1],
        itemsTablet: [568, 1],
        lazyLoad: true,
        autoPlay: true,
        pagination : true,
        stopOnHover: true,
        navigation : false
    });

    $('a.scrollto').click(function (event) {
        $('html, body').scrollTo(this.hash, this.hash, {gap: {y: 2}, animation:  {easing: 'easeInOutCubic', duration: 800}});
        event.preventDefault();
    });

    slider = $("div#WorksTabs").sliderTabs({
        autoplay: 10000,
        panelArrows: true,
        position: 'top',
        tabArrows: false,
        defaultTab: 1
    });
});