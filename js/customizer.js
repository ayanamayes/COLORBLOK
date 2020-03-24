/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.

TODO: implement dynamic customizer control css updates
 */


( function( $) {

    if(typeof(wp) !== 'undefined' )
{
    if (typeof(wp.customize) === 'function' ){


	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
            $siteTitleLink.text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
            $siteDesc.text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );





    $(document).ready(function() {

        // Site title and description.

        var $siteTitle = $( '.site-title' );
        var $siteTitleLink = $( '.site-title a' );
        var $siteDesc = $( '.site-description' );
        var $siteNav = $( '#site-navigation' );
        var $siteNavLink = $( '#site-navigation a' );
        var $pageBottom = $( '#page-bot' );
        var $ulSubMenu = $( 'ul.sub-menu' );
        var $pageBottomLink = $( '#page-bot a' );
        var $cv = wp.customize( 'Title_lc').get('value');
        var $cv1 = wp.customize( 'HFBKG').get('value');
        var $cv2 = wp.customize( 'HFLHC').get('value');

        wp.customize( 'Title_lc', function( value ) {
            value.bind( function( to ) {
                $siteTitleLink.css( {'color' : to} );
                $siteDesc.css( {'color' : to} );
                $cv = wp.customize( 'Title_lc').get('value');
            } );
        } );

        wp.customize( 'Title_lhc', function( value ) {
            $cv = wp.customize( 'Title_lc').get('value');
            value.bind( function( to ) {
                $siteTitleLink.hover(
                    function( ) { $( this ).css( {'background-color' : to}) },
                    function( ) { $( this ).css( {'background-color' : $cv1}) })

            } );
        } );

        wp.customize( 'HFBKG', function( value ) {
            value.bind( function( to ) {
                $siteNav.css( {'background-color' : to} );
                $siteNavLink.css( {'background-color' : to} );
                $pageBottom.css( {'background-color' : to} );
                $ulSubMenu.css( {'background-color' : to} );
                $cv1 = wp.customize( 'HFBKG').get('value');

            } );
        } );

        wp.customize( 'HFLC', function( value ) {
            value.bind( function( to ) {
                $siteNavLink.css( {'color' : to} );
                $pageBottomLink.css( {'color' : to} );
                $cv2 = wp.customize( 'HFLC').get('value');
            } );
        } );

        wp.customize( 'HFLHC', function( value ) {
            value.bind( function( to ) {
                $siteNavLink.hover(
                    function( ) { $( this ).css( {'color' : to}) },
                    function( ) { $( this ).css( {'color' : $cv2}) })

            } );
        } )

        wp.customize( 'HFBKGHC', function( value ) {
            value.bind( function( to ) {
                $siteNavLink.hover(
                    function( ) { $( this ).css( {'background-color' : to}) },
                    function( ) { $( this ).css( {'background-color' : $cv1}) })

            } );
        } )












        $pal_array =  wp.customize( 'accent_accessible_colors').get('value');


$.each($pal_array, function(i,v){
    // color drop down cb_palette_override


    wp.customize( 'cb_palette_override'+i, function( value ) {

        var $blockElement =  $('#cb_elm' + i);


        value.bind( function( newval ) {
            $blockElement.attr('data',newval)

            /* If the override palette selection is a pre-configured choice set options */
            if(newval > 0 || newval > '0') {
                $blockElement.css({'background-color' : $pal_array[newval]['bc']});
                $blockElement.css({'color' : $pal_array[newval]['fc']});
                $blockElement.find('h2').css({'color' : $pal_array[newval]['lc']});

                $blockElement.find('a').css({'color' : $pal_array[newval]['lc']});

                $blockElement.find('caption').css({'color' : $pal_array[newval]['lc']});

            }

            /* If the override palette selection is 0(custom) bind color selectors */
            if(newval == 0 || newval == '0'){
                $blockElement.css({'background-color': wp.customize( 'block_bc'+i).get('value')});
                $blockElement.css({'color': wp.customize( 'block_fc'+i).get('value')});
                $blockElement.find('h2').css({'color': wp.customize( 'block_lc'+i).get('value')});
                $blockElement.find('a').css({'color': wp.customize( 'block_lc'+i).get('value')});
                $blockElement.find('caption').css({'color': wp.customize( 'block_lc'+i).get('value')});

                // Block background color
                wp.customize( 'block_bc'+i, function( value ) {
                    $blockElement.css({'background-color' : value } );
                } );

                // Block font color
                wp.customize( 'block_fc'+i, function( value ) {
                    $blockElement.css( {'color' : value} );
                } );

                // Block title and link color
                wp.customize( 'block_lc'+i, function( value ) {
                    $blockElement.find('h2').css({ 'color': value });
                    $blockElement.find('a').css({ 'color': value });
                    $blockElement.find('caption').css({'color': value});

                })

                // Block link hover color
                wp.customize( 'block_lhc'+i, function( value ) {
                    value.bind( function( newval ) {
                        $blockElement.find('a:hover').css({ 'color' : newval });
                    })

                })
            }

        } );
    } );

})


        $lastwidth = 0;




        $.each($pal_array,function ($p,eml) {
            var $colorP  = $('.color' + $p);
            $.each(eml,function ($c,eml_) {

            wp.customize( 'bc_'+$p, function( value ) {
                value.bind( function( newval ){
                    $colorP.css({'background-color' : newval});

                })
            })

            wp.customize( 'fc_'+$p, function( value ) {
                value.bind( function( newval ){
                    $('.color' + $p).css({'color' : newval});
                })
            })

            wp.customize( 'lc_'+$p, function( value ) {
                    value.bind( function( newval ){
                        $colorP.find('h2').css({'color' : newval});

                        $colorP.find('a').css({'color' : newval});

                        $colorP.find('caption').css({'color' : newval});
                    })
                })

            })
        })



        $.each($('.cb_elm'),function (i,eml) {
            createBindingsforOWB(i);
            if (eml.offsetWidth+$lastwidth < screen.availWidth) {
                $(eml).addClass('top');
                

                // Block  toggle
                wp.customize( 'cb_block_toggle'+i, function( value ) {



                        value.bind(function (newval) {
                            if (newval == 0 || newval == '0') {
                                $blockElement.css({'display': 'none'});
                            }
                            else {
                                $blockElement.css({'display': 'inline-flex'});
                                $lastwidth += eml.offsetWidth;
                            }
                        });


                } );

                // Block width
                wp.customize( 'cb_block_width'+i, function( value ) {
                    value.bind( function( newval ) {
                        $blockElement.css( {'min-width' : newval+'%'} );
                    } );
                } );






            }  else { return;}
        })



    })



    function createBindingsforOWB(i){
        // Block background color
        var $cbELM = $( '#cb_elm'+i );


        wp.customize( 'block_bc'+i, function( value ) {
            value.bind( function( newval ) {
                if($cbELM.attr('data')==0){
                $cbELM.css( {'background-color' : newval} );}
            } );
        } );

        // Block font color
        wp.customize( 'block_fc'+i, function( value ) {
            value.bind( function( newval ) {
                if($cbELM.attr('data')==0) {
                    $cbELM.css({'color': newval});
                }
            } );
        } );

        // Block title and link color
        wp.customize( 'block_lc'+i, function( value ) {

            value.bind( function( newval ) {
                if($cbELM.attr('data')==0) {
                    $cbELM.find('h2').css({'color': newval});
                }
            })

            value.bind( function( newval ) {
                if($cbELM.attr('data')==0) {
                    $cbELM.find('a').css({'color': newval});
                }
            })

            value.bind(function (newval) {
                if($cbELM.attr('data')==0) {
                    $cbELM.find('caption').css({'color': newval});
                }
            })

        })

        // Block link hover color
        wp.customize( 'block_lhc'+i, function( value ) {

            value.bind( function( newval ) {
                if($cbELM.attr('data')==0) {
                    $cbELM.find('a:hover').css({'color': newval});
                }
            })

        })
    }
}}
    else    { }



} )(  jQuery);
