<?php
/**
 * Created by PhpStorm.
 * User: Falconner
 * Date: 3/8/2020
 * Time: 12:53 PM
 *
 *  CCCCCCCCCCCC
 */


function cd_customizer_css()
{
	$blocks_count = get_theme_mod('cb_block_count',1);
	$paletteValuesArr = get_theme_mod('accent_accessible_colors');


	?>
	<style type="text/css" id="CB_STYLES">
		<?php

	 ?>

        #site-navigation a, #page-bot a, ul.sub-menu, #site-navigation, .breadcrumb .active{
            color: <?php echo get_theme_mod('HFLC'); ?>;
            background-color: <?php echo get_theme_mod('HFBKG'); ?>;
        }



        #site-navigation a:hover, #page-bot a:hover{
            color: <?php echo get_theme_mod('HFLHC'); ?>;
            background-color: <?php echo get_theme_mod('HFBKGHC'); ?>;
        }


        .site-title a, p.site-description{
             color: <?php echo get_theme_mod('Title_lc'); ?>;
         }
        .site-title a:hover{
            color: <?php echo get_theme_mod('Title_lhc'); ?>;
        }
			  <?php


			  for ($i = 1; $i <= $blocks_count; $i++) {
				  $col= get_theme_mod('cb_palette_override'.$i);


					$color_sel =   $paletteValuesArr[$col];

	  if($col == 0){ //if custom is on, set to custom theme selections
		?>
        #cb_elm<?php echo $i;  ?>{
            background: <?php echo get_theme_mod('block_bc'.$i); ?>;
            color: <?php echo get_theme_mod('block_fc'.$i); ?>;
        }

        #cb_elm<?php echo $i; ?> h2{
            color: <?php echo get_theme_mod('block_lc'.$i); ?>;
        }
        #cb_elm<?php echo $i; ?> a{
            color: <?php echo get_theme_mod('block_lc'.$i); ?>;
        }

        #cb_elm<?php echo $i; ?> a:hover{
            color: <?php echo get_theme_mod('block_lhc'.$i); ?>;
        }

        #cb_elm<?php echo $i; ?> caption{
            color: <?php echo get_theme_mod('block_lc'.$i); ?>;
        }

        <?php
 }
 if($col > 0  ){

	if(get_theme_mod('cb_block_toggle'.$i,1) == 0  ){
 echo '#cb_elm'.$i.' {display: none;}';
		   }   ?>

			 #cb_elm<?php echo $i; ?>{
				background: <?php echo $color_sel['bc']; ?>;
                 color: <?php echo $color_sel['fc']; ?>;
			}

        #cb_elm<?php echo $i; ?> h2{
            color: <?php echo $color_sel['lc']; ?>;
        }
        #cb_elm<?php echo $i; ?> a{
            color: <?php echo $color_sel['lc']; ?>;
        }

        #cb_elm<?php echo $i; ?> a:hover{
            color: <?php echo $color_sel['lhc']; ?>;
        }

       #cb_elm<?php echo $i; ?> caption{
            color: <?php echo $color_sel['lc']; ?>;
        }


		<?php
	}
		?>
        #cb_elm<?php echo $i; ?> {
            min-width: <?php if(get_theme_mod('cb_block_width'.$i, '25')=='auto'||get_theme_mod('cb_block_width'.$i, '25')=='25'){
                echo '25%';} else {
                echo get_theme_mod('cb_block_width'.$i).'%';} ?>;
        }

        <?php

		}

?>


	</style>
		<?php
	}



?>

