<?php
/**
 * Created by Ayana Mayes.
 */
?>  <?php
echo '<ol class="breadcrumb">';
echo '<li><a href="';
echo get_option('home');
echo '">';
if ($custom_home_icon)
	echo $custom_home_icon;
else
	bloginfo('name');
echo "</a></li>";?>  <?php
if (is_archive()) {
$arcname =	_wp_specialchars(strip_tags( get_the_archive_title()), ENT_QUOTES );
	echo '<li class="active"><span>' .$arcname. '</span></li>';
}
else if (has_category()) {
	echo '<li class="active"><a href="' . esc_url(get_permalink(get_page(get_the_category($post->ID)))) . '">';
	the_category(', ');
	echo '</a></li>';

}


if (is_category() || is_single() || $is_custom_post) {$category = get_category( get_query_var( 'cat' ) );
	$cat_id = $category->cat_ID;
	if (is_archive()){}
	else if (is_category())
		echo '<li class="active"><a href="' . esc_url(get_permalink(get_page(get_the_category($post->ID)))) . '">' . get_the_category($post->ID)[$cat_id]->name . '</a></li>';
	if ($is_custom_post) {
		echo '<li class="active"><a href="' . get_option('home')  . get_post_type_object(get_post_type($post))->name . '">' . get_post_type_object(get_post_type($post))->label . '</a></li>';
		if ($post->post_parent) {
			$home = get_page(get_option('page_on_front'));
			for ($i = count($post->ancestors) - 1; $i >= 0; $i--) {
				if (($home->ID) != ($post->ancestors[$i])) {
					echo '<li><a href="';
					echo get_permalink($post->ancestors[$i]);
					echo '">';
					echo get_the_title($post->ancestors[$i]);
					echo "</a></li>";
				}
			}
		}
	}
	if (is_single())
		echo '<li class="active">' . get_the_title($post->ID) . '</li>';
} elseif (is_page() && $post->post_parent) {
	$home = get_page(get_option('page_on_front'));
	for ($i = count($post->ancestors) - 1; $i >= 0; $i--) {
		if (($home->ID) != ($post->ancestors[$i])) {
			echo '<li><a href="';
			echo get_permalink($post->ancestors[$i]);
			echo '">';
			echo get_the_title($post->ancestors[$i]);
			echo "</a></li>";
		}
	}
	echo '<li class="active">' . get_the_title($post->ID) . '</li>';
}


elseif (is_page()) {
	echo '<li class="active">' . get_the_title($post->ID) . '</li>';
} elseif (is_404()) {
	echo '<li class="active">404</li>';
}
echo '</ol>';


?>
