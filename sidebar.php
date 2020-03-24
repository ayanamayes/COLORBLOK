<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package COLORBLOK
 */
$meta_info = get_post_meta( $post->ID, '_meta_info', true) ? get_post_meta( $post->ID, '_meta_info', true) : 1;

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area cbp_elm<?php echo $meta_info;?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
