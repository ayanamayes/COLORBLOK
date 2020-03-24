<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COLORBLOK
 */

?>

<div id="page-bot" class="site-bot">
    <div id="footer-wig"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget") ) : ?>
	    <?php endif;?>
    </div>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'COLORBLOK' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'COLORBLOK' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'COLORBLOK' ), 'COLORBLOK', '<a href="http://ayanamayes.com/">ayanamayes.com</a>' );
				?>
		</div><!-- .site-info -->
		<?php wp_footer(); ?>

	</footer>
</div>
    </body>
    </html>
