<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COLORBLOK
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Noticia+Text&display=swap" rel="stylesheet">


    <?php


    wp_head();

    if ( !is_front_page() ) {

    ?>  <style id="cb_page" type="text/css">
	<?php
 if (have_posts()) : while (have_posts()) : the_post();

	     ?>
    <?php
	   $meta_info = get_post_meta( $post->ID, '_meta_info', true) ? get_post_meta( $post->ID, '_meta_info', true) : 0;
	    $meta_info = get_post_meta( $post->ID, '_meta_info', true) ? get_post_meta( $post->ID, '_meta_info', true) : 0;

		   if($meta_info == 0){
			   $_cb_info_bc_ = get_post_meta( $post->ID, '_cb_info_bc', true) ? get_post_meta( $post->ID, '_cb_info_bc', true) : 0;
			   $_cb_info_fc_ = get_post_meta( $post->ID, '_cb_info_fc', true) ? get_post_meta( $post->ID, '_cb_info_fc', true) : 0;
			   $_cb_info_lc_ = get_post_meta( $post->ID, '_cb_info_lc', true) ? get_post_meta( $post->ID, '_cb_info_lc', true) : 0;
			   $_cb_info_lhc_ = get_post_meta( $post->ID, '_cb_info_lhc', true) ? get_post_meta( $post->ID, '_cb_info_lhc', true) : 0;


		   } else {
			   $paletteValues =get_option('accent_accessible_colors',$paletteValuesArr);

			   $_cb_info_bc_ =    $paletteValues[$meta_info]['bc'] ;
			   $_cb_info_fc_ =    $paletteValues[$meta_info]['fc'] ;
			   $_cb_info_lc_ =    $paletteValues[$meta_info]['lc'] ;
			   $_cb_info_lhc_ =   $paletteValues[$meta_info]['lhc'] ;

		   }


	   ?>

    .cbp_elm<?php echo $meta_info; ?>{
        background: <?php echo $_cb_info_bc_; ?>;
        color:  <?php echo $_cb_info_fc_; ?>;
    }
    .cbp_elm<?php echo $meta_info; ?> a, .cbp_elm<?php echo $meta_info; ?> caption, .cbp_elm<?php echo $meta_info; ?> h2, .cbp_elm<?php echo $meta_info; ?> h1{
        color:  <?php echo $_cb_info_lc_; ?>;
    }
    .cbp_elm a:hover<?php echo $meta_info; ?>{
        color:  <?php echo $_cb_info_lhc_; ?>;
    }
    <?php
    endwhile;
    endif;
	    ?>
    @media (max-width: 800px) {

        .cb_elm, .cbp_elm {
            min-width: 100%;
        }}

        </style>
    <?php } ?>

</head>

<body class="<?php body_class(); ?>">
<div id="backgroundimg">
   <div id="body-wrap">

<div id="page" class="site">

    <div id="page-top" class="site-top row <?php if ( !is_front_page() && !is_home() ) { echo 'stay-top';}?>">
        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'organic' ); ?></button>
		    <?php
		    wp_nav_menu( array(
			    'theme_location' => 'menu-1',
			    'menu_id'        => 'primary-menu',
		    ) );
		    ?>
        </nav>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'organic' ); ?></a>

	</head id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$cb_description = get_bloginfo( 'description', 'display' );
			if ( $cb_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $cb_description; /* WPCS: xss ok. */ ?></p>
			<?php endif;
			?>
		</div><!-- .site-branding -->


	</header><!-- #masthead -->

          <?php

	if (!is_front_page() && !is_home()) {
		get_template_part('template-parts/breadcrumb');
	}
	the_custom_logo();
	?>
        </div>

    <?php
	if ( is_front_page() && is_home() ) :
	?>
    <div id="page-mid" class="site-mid">
	    <?php
	    $blocks_count = 		get_theme_mod('cb_block_count',1);
	  $c_count = 1;

	        for ($i = 1; $i <= $blocks_count; $i++) {


		        $pal = get_theme_mod('cb_palette_override'.$i);
		        $pal1 = get_theme_mod('cb_palette');



		    if(get_theme_mod('cb_block_toggle'.$i, 'none') == 1 || get_theme_mod('cb_block_toggle'.$i, 'none') == 'none' || get_theme_mod('cb_block_toggle'.$i, 'none') == '1'){


	    ?>


            <div data="<?php echo $pal ?>" id="cb_elm<?php echo $i; ?>" class="fp cb_elm <?php echo ' color'.$pal; ?>">
<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("CB_Widget_".$i)) : ?>
            <?php endif; ?></div><?php





        }	}	?>

	<?php endif; ?>
