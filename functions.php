<?php
/**
 * COLORBLOK functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package COLORBLOK
 */

if ( ! function_exists( 'COLORBLOK_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function COLORBLOK_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on COLORBLOK, use a find and replace
		 * to change 'COLORBLOK' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'COLORBLOK', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'COLORBLOK' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'COLORBLOK_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'COLORBLOK_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function COLORBLOK_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'COLORBLOK_content_width', 640 );
}
add_action( 'after_setup_theme', 'COLORBLOK_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function COLORBLOK_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'COLORBLOK' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'COLORBLOK' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'COLORBLOK_widgets_init' );

function COLORBLOK_other_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'COLORBLOK' ),
		'id'            => 'FooterWidge',
		'description'   => esc_html__( 'Add widgets here.', 'COLORBLOK' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'COLORBLOK_other_widgets_init' );

function COLORBLOK_widgets_init_2() {
	$blocks_count = 		get_theme_mod('cb_block_count',1);

	for ($i = 1; $i <= $blocks_count; $i++) {

		register_sidebar(array(
			'name' => esc_html__("CB_Widget_".$i, 'COLORBLOK'),
			'id' => "CB_Widget_".$i,
			'description' => esc_html__('Add widgets here.', 'COLORBLOK'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
	}
}
add_action( 'widgets_init', 'COLORBLOK_widgets_init_2' );


/**
 * Enqueue scripts and styles.
 */
function COLORBLOK_scripts() {
	wp_enqueue_style( 'COLORBLOK-style', get_stylesheet_uri() );

	wp_enqueue_script( 'COLORBLOK-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'COLORBLOK-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'COLORBLOK_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function themebs_enqueue_scripts() {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_scripts');



function cus_enqueue_scripts2() {

	wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array('jquery'),false,true);

	wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'), '1.8.6');
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery', 'jquery-ui'),false,true);

}
add_action( 'wp_enqueue_scripts', 'cus_enqueue_scripts2');




function setup_theme_admin_menus() {
	add_menu_page('Theme settings', 'Example theme', 'manage_options',
		'tut_theme_settings', 'theme_settings_page');

	add_submenu_page('tut_theme_settings',
		'Front Page Elements', 'Front Page', 'manage_options',
		'tut_theme_settings', 'theme_front_page_settings');
}
// add the handler function for the top level menu
function theme_settings_page() {
	echo "Settings page";
}

function theme_style_enqueue_styles() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

	include( 'inc/cb_functions.php');
	add_action( 'wp_head', 'cd_customizer_css');

}
add_action( 'wp_enqueue_scripts', 'theme_style_enqueue_styles');


// Register and load the widget
function wpb_load_widget() {
	register_widget( 'CB_Widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class CB_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(

// Base ID of your widget
			'CB_Widget',

// Widget name will appear in UI
			__('Page or Post Widget', 'CB_Widget_domain'),

// Widget description
			array( 'description' => __( 'Widget for loading adding pages or posts to blocks', 'CB_Widget_domain' ), )
		);



	}

// Creating widget front-end

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
	//	echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];


		$post = get_post( $instance['ppid_id'] );
		?>
        <div id="post-page-<?php echo $instance['ppid_id']; ?>" class="widget-post-page">
				<?php echo '<h2 class="entry-title__"><a href="' . get_post_permalink( $instance['ppid_id'] ) . '" rel="bookmark">'.$post->post_title. '</a>'.'</h2>' ; ?>
                <div class="entry-content">
                    <?php echo "<div class='img-thumb'>".get_the_post_thumbnail( $post, 100 ).'</div>'; ?>
	                <?php echo $post->post_content;?>
                </div>

         </div>

		<?php
	//	echo $args['after_widget'];
	}



// Widget Backend
	public function form( $instance ) {

		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'CB_Widget_domain' );
		}


		if ( isset( $instance[ 'ppid_id' ] ) ) {
			$ppid_id = $instance[ 'ppid_id' ];
		}
		else {
			$ppid_id = __( '', 'CB_Widget_domain' );
		}


		$latest = new WP_Query( array(
			'post_type'   => 'post',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'DESC'
		));

		$pages = new WP_Query( array(
			'post_type'   => 'page',
			'post_status' => 'publish',
			'orderby'     => 'date',
			'order'       => 'DESC'
		));

		?>

        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>


        <label for="<?php echo $this->get_field_id( 'ppid_id' ); ?>"><?php _e( 'Ad dimensions:', $instance['ppid_id'] ); ?></label>

        <select id="<?php echo $this->get_field_id( 'ppid_id' ); ?>" name="<?php echo $this->get_field_name( 'ppid_id' ); ?>"  >
			<?php
			while( $latest->have_posts() ) {
				$latest->the_post();
				?>
                <option <?php selected( $ppid_id, get_the_ID() ); ?> value="<?php echo get_the_ID();?>"><?php echo the_title( '', '', false );?></option>
				<?php
			}
			while( $pages->have_posts() ) {
				$pages->the_post();
				?>
                <option <?php selected( $ppid_id, get_the_ID() ); ?> value="<?php echo get_the_ID();?>"><?php echo the_title( '', '', false );?></option>
				<?php
			}
			?>
        </select>		<?php

		$instance['ppid_id'] = 2;
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['ppid_id'] = ( ! empty( $new_instance['ppid_id'] ) ) ? strip_tags( $new_instance['ppid_id'] ) : '';

	//	$instance['ppid_id'] =get_option($this->get_field_id( 'ppid_id' ) );
		return $instance;
	}
} // Class CB_Widget ends here





/* Define the custom box */

// WP 3.0+
add_action( 'add_meta_boxes', 'post_options_metabox' );

// backwards compatible
add_action( 'admin_init', 'post_options_metabox', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'save_post_options1' );

/**
 *  Adds a box to the main column on the Post edit screen
 *
 */

function post_options_metabox() {
	add_meta_box( 'post_options', __( 'Post Palette Options' ), 'post_options_code', 'post', 'normal', 'high' );
	add_meta_box( 'post_options', __( 'Post Palette Options' ), 'post_options_code', 'page', 'normal', 'high' );

}

/**
 *  Prints the box content
 */
function post_options_code( $post ) {



	$paletteValuesArr = array(

		array
		(
			'bc' => '#000000',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#ffffff'
		),

		array
		(
			'bc' => '#1b262c',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),

		array
		(
			'bc' => '#0f4c81',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),

		array
		(
			'bc' => '#ed6663',
			'fc' => '#0F2A54',
			'lc' => '#0F2A54',
			'lhc' => '#ffffff',
		),

		array
		(
			'bc' => '#ffa372',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),


		array
		(
			'bc' => '#1b262c',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),

		array
		(
			'bc' => '#1b262c',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),

		array
		(
			'bc' => '#0f4c81',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		),

		array
		(
			'bc' => '#ed6663',
			'fc' => '#0F2A54',
			'lc' => '#0F2A54',
			'lhc' => '#ffffff',
		),

		array
		(
			'bc' => '#ffa372',
			'fc' => '#ffffff',
			'lc' => '#ffffff',
			'lhc' => '#0F2A54',
		)



	) ;
	$paletteValues =get_theme_mod('accent_accessible_colors',$paletteValuesArr);


    wp_nonce_field( plugin_basename( __FILE__ ), $post->post_type . '_noncename' );
    $meta_info = get_post_meta( $post->ID, '_meta_info', true) ? get_post_meta( $post->ID, '_meta_info', true) : 0;

	$_cb_info_bc = get_post_meta( $post->ID, '_cb_info_bc', true) ? get_post_meta( $post->ID, '_cb_info_bc', true) : '';
	$_cb_info_fc = get_post_meta( $post->ID, '_cb_info_fc', true) ? get_post_meta( $post->ID, '_cb_info_fc', true) : '';
	$_cb_info_lc = get_post_meta( $post->ID, '_cb_info_lc', true) ? get_post_meta( $post->ID, '_cb_info_lc', true) : '';
	$_cb_info_lhc = get_post_meta( $post->ID, '_cb_info_lhc', true) ? get_post_meta( $post->ID, '_cb_info_lhc', true) : '';

	/**
	 * Post Color Picker
	 */

		// first check that $hook_suffix is appropriate for your admin page
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script( 'my-script-handle', get_template_directory_uri() . '/js/post-options.js', array( 'wp-color-picker' ), true, true );

?>

    <h2><?php _e( 'Color Palette Selection' ); ?></h2>
    <div>
    <input id="_cb_info_bc" name="_cb_info_bc" class="my-color-field" type="text" value="<?php echo $_cb_info_bc;  ?>" data-default-color="#effeff" />
    </div>
    <div>
    <input id="_cb_info_fc" name="_cb_info_fc" class="my-color-field" type="text" value="<?php echo $_cb_info_fc;  ?>" data-default-color="#effeff" />
    </div>
    <div>
        <input id="_cb_info_lc" name="_cb_info_lc" class="my-color-field" type="text" value="<?php echo $_cb_info_lc;  ?>" data-default-color="#effeff" />
    </div>
    <div>
        <input id="_cb_info_lhc"  name="_cb_info_lhc" class="my-color-field" type="text" value="<?php echo $_cb_info_lhc;  ?>" data-default-color="#effeff" />
    </div>
    <fieldset>
        <div class="customize-control-content">
            <div class="radios">
                <div class='platte_select_'>

	                <?php

	                foreach ($paletteValues as $dv => $subdata) :
		                ?>
                    <div class='platte_select <?php echo esc_attr($dv); ?> ' id="radio-<?php echo esc_attr($dv); ?>">
	                    <?php
if($dv ==0){ $subdata['bc'] =$_cb_info_bc; $subdata['lc'] =$_cb_info_lc;$subdata['lhc'] =$_cb_info_lhc;$subdata['fc'] =$_cb_info_fc;}
		                    ?>
                            <label for="<?php echo esc_attr($dv); ?>">Color <?php echo esc_attr($dv); ?> options</label>
                            <div class='radio-<?php echo esc_attr($dv);  ?>  color<?php echo esc_attr($dv);  ?>' style="background-color: <?php echo esc_attr($subdata['bc']); ?>; color: <?php echo esc_attr($subdata['fc']); ?>;">
                                <input id="radio-<?php echo esc_attr($dv); ?>" type="radio" value="<?php echo esc_attr($dv); ?>" name="_meta_info"  data2='<?php echo json_encode($subdata); ?>' <?php checked( 'meta_default', $meta_info ); ?><?php echo ( $meta_info == esc_attr($dv) )?' data="checked" checked="checked"' : '';  ?> />
                               Background: <?php echo esc_attr($subdata['bc']); ?> Font: <?php echo esc_attr($subdata['fc']); ?> <span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lc']); ?>;">Link <?php echo esc_attr($subdata['lc']); ?></span><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lhc']); ?>;"> Hover <?php echo esc_attr($subdata['lhc']); ?>
                            </div>





                    </div>
		                <?php  endforeach; ?>
                </div>

            </div>
        </div>
    </fieldset>
    <div class="clear"></div>
    <hr /><?php
}

/**
 * When the post is saved, saves our custom data
 */


function save_post_options1( $post_id ) {
	// verify if this is an auto save routine.
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( @$_POST[$_POST['post_type'] . '_noncename'], plugin_basename( __FILE__ ) ) )
		return;

	// Check permissions
	if ( !current_user_can( 'edit_post', $post_id ) )
		return;


		if ( !current_user_can( 'edit_post', $post_id ) ) {
			return;
		} else {
			update_post_meta( $post_id, '_meta_info', $_POST['_meta_info'] );
			update_post_meta( $post_id, '_cb_info_bc', $_POST['_cb_info_bc'] );
			update_post_meta( $post_id, '_cb_info_fc', $_POST['_cb_info_fc'] );
			update_post_meta( $post_id, '_cb_info_lc', $_POST['_cb_info_lc'] );
			update_post_meta( $post_id, '_cb_info_lhc', $_POST['_cb_info_lhc'] );


		}


}
