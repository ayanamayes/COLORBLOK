<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package COLORBLOK
 */

get_header();
$meta_info = get_post_meta( $post->ID, '_meta_info', true) ? get_post_meta( $post->ID, '_meta_info', true) : 0;
$_cb_info_bc_ = get_post_meta( $post->ID, '_cb_info_bc', true) ? get_post_meta( $post->ID, '_cb_info_bc', true) : 0;
?>
    <div id="page-mid" class="site-mid cbp_elm cbp_elm<?php echo $meta_info;?>">
    <div id="primary" class="content-area cbp_elm cbp_elm<?php echo $meta_info;?>">
        <main id="main" class="site-main cbp_elm cbp_elm<?php echo $meta_info;?>">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
        </main><!-- #main -->
    </div><!-- #primary -->
	    <?php
	    get_sidebar();
	    ?>

	    <?php
	    get_footer();
	    ?>
    </div>