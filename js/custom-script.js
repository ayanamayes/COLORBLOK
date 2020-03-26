/**
 * File custom-script.js.
 *

 */
( function( $ ) {

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
        });

    
} )( jQuery );