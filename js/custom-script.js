/**
 * File custom-script.js.
 *

 */
( function( $ ) {


    /*
    Spiffy Animations
*/
    $(document).ready(function() {
    $( ".excerpt_" ).mouseover(function() {
            $( this ).addClass("expanded").stop().animate({height: '100%'}, "slow");

        });
        $( ".excerpt_" ).mouseout(function() {
           $( this ).removeClass("expanded").stop().animate({height: '10%'}, "slow");

        });

        $lastwidth = 0;
        $('.top').removeClass('top')

        $.each($('.cb_elm'),function (i,eml) {

            if ($(eml).width()+$lastwidth < $('#page').width()) {
                $(eml).addClass('top');
                $lastwidth += $(eml).width();

            }
            $('.top').css({
                "padding-top": $('#page-top').height()+80
            });

        })
    });
    
} )( jQuery );