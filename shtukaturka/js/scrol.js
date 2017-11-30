/**
 * Created by Михаил on 27.11.14.
 */
$(document).ready(function(){

    var flag1=true;// флаги для тогоч тоыб анимаия сработала только один раз


    $(window).on('scroll resize', function(){
        var scrolled = window.pageYOffset; // длинна проскроленного сверху вниз

        var off = $(".servis").offset();
        var barr = off.top;  // высота от верха дива до верха страницы

/*_______________АНИМАЦИЯ СЪЕЗДА В ЦЕНТР_____________________*/
        var i=1700;
        if ( scrolled > barr-893) {
            $('.rbl').each(function (){
                if($(this).hasClass('left')){
                    i=i+100;
                    $(this).animate({
                        left: 0
                    },i)
                }
                if($(this).hasClass('right')){
                    i=i+100;
                    $(this).animate({
                        right: 0
                    },i)
                }
            });

        }
        /*_________СЧЕТЧИК_________________*/
        var ср = $(".paralax_stone").offset();
        var barrcp = ср.top;
        var time = 4;

        if ( scrolled > barrcp-350 && flag1==true) {
            $('.bb').each(function (){
                var i = 1,
                    num = $(this).data('num'),
                    step = 1000 * time / num,
                    that = $(this),
                    int = setInterval(function(){
                        if (i <= num) {
                            that.html(i);
                        }
                        else {
                            clearInterval(int);
                            flag1=false;
                        }
                        i++;
                    },step);
            })
        }
    })


})