/**
 * Created by Михаил on 20.11.14.
 */
$(document).ready(function(){
    //Слайдшоу сказали убрать
    // $('.bxslider').bxSlider({
    //     auto: true,
    //     pager :false
    // });

    var sadow_height=$('.bx-wrapper').height();
    $('.vual').css('height',sadow_height);


    /*Меню для мобильных устройств*/
    $('#menu').slicknav();
    /*--------------------------*/

    /*Плавный скрол к ссылки в меню*/
    $("#menu").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });

    $(".click_block").on("click", function () {
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
    /*---------------------------*/

/*табы*/
    $('.tab').click(function(){
       var i= $(this).attr('id');
        i='.'+i;
        $('.tab_content').css('display','none')
        $('.tab').css('background-color','#fff');
        $(this).css('background-color','#77be32');

        $(i).css('display','block');
    });

/*----------------------*/

    $('#btn').click(function(event){

        event.preventDefault();
        var msg = $('#order_call_form').serialize();
        $.ajax({
            url: '/js/sendmail.php',
            type: "POST",
            data: msg,
            success: function(msg) {
                $('#order_call_form').trigger( 'reset' );

                $("#backgroundPopup").css({
                    display:"block"
                });
                $("#modalWindow").css({
                    display:"block"
                });
            }
        });

    });
    $('#backgroundPopup').click(function(){
        $("#backgroundPopup").css({
            display:"none"
        });
        $("#modalWindow").css({
            display:"none"
        });
    });

    $('.close_cast').click(function(){
        $("#backgroundPopup").css({
            display:"none"
        });
        $("#modalWindow").css({
            display:"none"
        });
    });

    /*_______________________*/
    var flag1=true;
    var flag2=true;

    $(window).on('scroll resize', function(){
        var scrolled = window.pageYOffset;

        var off = $(".servis").offset();
        var barr = off.top;


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
        /*___________________________________*/
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
                            if(that.hasClass('b3')){
                                that.html(i+'%');
                            }
                            else{
                                that.html(i);
                            }

                        }
                        else {
                            clearInterval(int);
                            flag1=false;
                        }
                        i++;
                    },step);
            })
        }
        /*________________________________________________________*/

        var срv = $(".paralax_space").offset();
        var barrcpv = срv.top;
        if ( scrolled > barrcpv-400&&flag2==true) {
            $('.circle').each(function (){
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
                            flag2=false;
                        }
                        i++;
                    },step);

            })
        }



    })


});


$(window).resize(function() {
    var sadow_height=$('.bx-wrapper').height();
    $('.vual').css('height',sadow_height)
});