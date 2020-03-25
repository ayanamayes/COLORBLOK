<?php
/**
 * COLORBLOCK Theme Customizer
 *
 * @package COLORBLOCK
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * TODO Associate Labels with Inputs #
 *
 */




/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function COLORBLOK_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function COLORBLOK_customize_partial_blogdescription() {
	bloginfo( 'description' );
}



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function COLORBLOK_customize_preview_js() {
	wp_enqueue_script( 'COLORBLOK-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', false );
}
add_action( 'customize_preview_init', 'COLORBLOK_customize_preview_js' );

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

/**
 * Class to create a custom post control
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;



function COLORBLOK_customize_register( $wp_customize ) {

	/**
	 * Sanitization callback for the "accent_accessible_colors" setting.
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 * @param array $value The value we want to sanitize.
	 * @return array       Returns sanitized value. Each item in the array gets sanitized separately.
	 */



	$wp_customize->add_setting(
		'accent_accessible_colors',array(
		   'default' =>array(

			   array
			   (
				   'bc' => '#000000',
				   'fc' => '#ffffff',
				   'lc' => '#ffffff',
				   'lhc' => '#ffffff'
			   ),

			   array
			   (
				   'bc' => '#7c0202',
				   'fc' => '#ffffff',
				   'lc' => '#ffbf00',
				   'lhc' => '#c11717',
			   ),

			   array
			   (
				   'bc' => '#eeee22',
				   'fc' => '#007753',
				   'lc' => '#007753',
				   'lhc' => '#0a0a0a',
			   ),

			   array
			   (
				   'bc' => '#10cc32',
				   'fc' => '#ffffff',
				   'lc' => '#ffffff',
				   'lhc' => '#0F2A54',
			   ),

			   array
			   (
				   'bc' => '#6c25e8',
				   'fc' => '#ffffff',
				   'lc' => '#ffffff',
				   'lhc' => '#0F2A54',
			   ),


			   array
			   (
				   'bc' => '#c91cef',
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
				   'bc' => '#000000',
				   'fc' => '#ffffff',
				   'lc' => '#ffffff',
				   'lhc' => '#333333',
			   ),

			   array
			   (
				   'bc' => '#ffffff',
					'fc' => '#000000',
					'lc' => '#999999',
					'lhc' => '#333333',
				)


		) ,

            'transport'  => 'refresh',

            )
);
	$wp_customize->get_setting( 'accent_accessible_colors' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	$paletteValuesArr = array();


	if( get_theme_mod('accent_accessible_colors')==''){
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
			    'bc' => '#7c0202',
			    'fc' => '#ffffff',
			    'lc' => '#ffbf00',
			    'lhc' => '#c11717',
		    ),

		    array
		    (
			    'bc' => '#eeee22',
			    'fc' => '#007753',
			    'lc' => '#007753',
			    'lhc' => '#0a0a0a',
		    ),

		    array
		    (
			    'bc' => '#10cc32',
			    'fc' => '#ffffff',
			    'lc' => '#ffffff',
			    'lhc' => '#0F2A54',
		    ),

		    array
		    (
			    'bc' => '#6c25e8',
			    'fc' => '#ffffff',
			    'lc' => '#ffffff',
			    'lhc' => '#0F2A54',
		    ),


		    array
		    (
			    'bc' => '#c91cef',
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
			    'bc' => '#000000',
			    'fc' => '#ffffff',
			    'lc' => '#ffffff',
			    'lhc' => '#333333',
		    ),

		    array
		    (
			    'bc' => '#ffffff',
			    'fc' => '#000000',
			    'lc' => '#999999',
			    'lhc' => '#333333',
		    )


	    ) ;

		set_theme_mod('accent_accessible_colors',$paletteValuesArr);
	}


	else{
		$paletteValuesArr = get_theme_mod('accent_accessible_colors');
	}


//Add panels

	$wp_customize->add_panel('cb_panel', array(
		'priority' => 1,
		'theme_supports' => '',
		'title' => 'Block Settings',
		'description' => '',

	));


//ADD CB SECTION
	$wp_customize->add_section( 'cb_block_settings' , array(
		'title'      => 'General Block Settings',
		'priority'   => 2,
		'panel' => 'cb_panel',
	) );

//ADD CB Title font color SETTING
	$wp_customize->add_setting('Title_lc', array(
		'default' => '#ffffff',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Title font color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Title_lc', array(
		'label' => 'Site Title Color',
		'settings' => 'Title_lc',
		'section'    => 'cb_block_settings',

)));
	$wp_customize->get_setting('Title_lc')->transport = 'postMessage';

//ADD CB Title font hover color SETTING
	$wp_customize->add_setting('Title_lhc', array(
		'default' => '#000000',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Title font color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'Title_fc_', array(
		'label' => 'Site Title Hover Color',
		'settings' => 'Title_lhc',
		'section'    => 'cb_block_settings',
)));

	$wp_customize->get_setting('Title_lhc')->transport = 'postMessage';

//ADD CB Header/Footer bg color SETTING
	$wp_customize->add_setting('HFBKG', array(
		'default' => '#000000',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Header/Footer bg color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'HFBKG', array(
		'label' => 'Header and Footer Background Color',
		'settings' => 'HFBKG',
		'section'    => 'cb_block_settings',

	)));
	$wp_customize->get_setting('HFBKG')->transport = 'postMessage';

	//ADD CB Header/Footer link  color SETTING
	$wp_customize->add_setting('HFLC', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Header/Footer font hover color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'HFLC', array(
		'label' => 'Header and Footer Link Color',
		'settings' => 'HFLC',
		'section'    => 'cb_block_settings',

	)));
	$wp_customize->get_setting('HFLC')->transport = 'postMessage';



//ADD CB Header/Footer bg hover color SETTING
	$wp_customize->add_setting('HFBKGHC', array(
		'default' => '#000000',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Header/Footer bg hover color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'HFBKGHC', array(
		'label' => 'Header and Footer Background Hover Color',
		'settings' => 'HFBKGHC',
		'section'    => 'cb_block_settings',

	)));
	$wp_customize->get_setting('HFBKGHC')->transport = 'postMessage';




//ADD CB Header/Footer font hover color SETTING
	$wp_customize->add_setting('HFLHC', array(
		'default' => '#ff0000',
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));

//ADD CB Header/Footer font hover color CONTROL
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'HFLHC', array(
		'label' => 'Header and Footer Font Hover Color',
		'settings' => 'HFLHC',
		'section'    => 'cb_block_settings',

	)));
	$wp_customize->get_setting('HFLHC')->transport = 'postMessage';





//ADD BLOCK COUNT SETTING
	$wp_customize->add_setting( 'cb_block_count' , array(
		'default'     => '1',
		'transport'   => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
		'panel' => 'cb_panel',
	) );

//ADD BLOCK COUNT CONTROL
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cb_block_count', array(
		'label'        => 'Block Count',
		'type' => 'number',
		'description' => __( 'How many blocks would you like on the homepage?' ),
		'panel' => 'cb_panel',
		'section'    => 'cb_block_settings',
		'settings'   => 'cb_block_count',
		'input_attrs' => array(
			'min'   => 1,
			'max'   => 10,),
	) ) );



	for ($p = 1; $p <=sizeof($paletteValuesArr);  $p++){
//ADD CB COLOR SETTING
$c =$paletteValuesArr[$p];
		$cb_set_ = 'cb_block_settings';

			$cb_name1 = 'bc_'.$p;
			$wp_customize->add_setting($cb_name1, array(
				'default' => $c['bc'],
				'transport' => 'refresh',
			));

//ADD CB COLOR CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $cb_name1, array(
				'label' => 'Block Background Color',
				'section' => $cb_set_,
				'settings' => $cb_name1,
				'active_callback' =>'choice_callback',

			)));


			$paletteValuesArr_loaded[$p]['bc'] = $wp_customize->get_setting($cb_name1)->value() ;


			$wp_customize->get_setting($cb_name1)->transport = 'postMessage';

//ADD CB font color SETTING
			$bfc_name1 = 'fc_'.$p;
			$wp_customize->add_setting($bfc_name1, array(
				'default' => $c['fc'],
				'transport' => 'refresh',
			));
			$paletteValuesArr_loaded[$p]['fc'] = $wp_customize->get_setting($bfc_name1)->value() ;

//ADD CB font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bfc_name1, array(
				'label' => 'Font Color',
				'section' => $cb_set_,
				'settings' => $bfc_name1,
				'active_callback' =>'choice_callback'

			)));
			$wp_customize->get_setting($bfc_name1)->transport = 'postMessage';



//ADD CB hover font color SETTING
			$bhlc_name1 = 'lc_'.$p;
			$wp_customize->add_setting($bhlc_name1, array(
				'default' => $c['lc'],
				'transport' => 'refresh',

			));
			$paletteValuesArr_loaded[$p]['lc'] = $wp_customize->get_setting($bhlc_name1)->value() ;

//ADD CB hover font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bhlc_name1, array(
				'label' => 'Header and Link Color',
				'section' => $cb_set_,
				'settings' => $bhlc_name1,
				'active_callback' =>'choice_callback'

			)));
			$wp_customize->get_setting($bhlc_name1)->transport = 'postMessage';


//ADD CB hover font color SETTING
			$bhhfc_name_1 = 'lhc_'.$p;
			$wp_customize->add_setting($bhhfc_name_1, array(
				'default' => $c['lhc'],
				'transport' => 'refresh',
			));
			$paletteValuesArr_loaded[$p]['lhc'] = $wp_customize->get_setting($bhhfc_name_1)->value() ;

//ADD CB hover font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bhhfc_name_1, array(
				'label' => 'Link Hover Color',
				'section' => $cb_set_,
				'settings' => $bhhfc_name_1,
				'active_callback' =>'choice_callback'

			)));
			$wp_customize->get_setting($bhhfc_name_1)->transport = 'postMessage';


		}

	set_theme_mod('accent_accessible_colors',$paletteValuesArr_loaded);

	function choice_callback( $control ) {
		$radio_setting = $control->manager->get_setting('cb_palette')->value();
		$control_id = $control->id;


		if ( $control_id == 'bc_'.$radio_setting) return true;
		if ( $control_id == 'fc_'.$radio_setting ) return true;
		if ( $control_id == 'lc_'.$radio_setting ) return true;
		if ( $control_id == 'lhc_'.$radio_setting ) return true;
		return false;
	}


	//ADD BLOCK palette SETTING
	$wp_customize->add_setting( 'cb_palette' , array(
		'default'     => '1',
		'transport'     => 'refresh',
		'panel' => 'cb_panel',
	) );

	//ADD BLOCK palette CONTROL
	$wp_customize->add_control( new Post_Radio_Custom_Control( $wp_customize, 'cb_palette', array(
		'label'        => 'Select Palette Color Scheme',
        'type' => 'radio',
		'description' =>  'Choose a color scheme' ,
		'panel' => 'cb_panel',
		'section'    => 'cb_block_settings',
		'settings'   => 'cb_palette',
		'radios'   =>   get_theme_mod('accent_accessible_colors'),
	) ) );
	}








	function create_block_panels($wp_customize){
		$blocks_count = 		get_theme_mod('cb_block_count');
		for ($i = 0; $i <= $blocks_count; $i++) {

//ADD CB SECTION
			$wp_customize->add_section( 'cb_block_setting_'.$i , array(
				'title'      => 'Block '.$i.' Settings',
				'priority'   => 4,
				'panel' => 'cb_panel',
			) );

		}
	}

	create_block_panels($wp_customize);

	function create_block_panels_posts($wp_customize){
		$blocks_count = 		get_theme_mod('cb_block_count',1);
		for ($i = 0; $i <= $blocks_count; $i++) {

//ADD CB SECTION
			$wp_customize->add_section( 'cb_block_setting_'.$i , array(
				'title'      => 'Block '.$i.' Settings',
				'priority'   => 4,
				'panel' => 'cb_panel',
			) );


		}
	}

	//block creation function
	function create_block_color_settings($wp_customize){

//ADD CB SETTING AND CONTROL FOR EACH BLOCK
        $ccount = 0;
		function create_block_color_setting($wp_customize,$i, $name,$ccount){
			global $paletteValuesArr;
			global $paletteValuesArr_loaded;

			if($ccount ==5){$ccount=0;}
			$cb_set = 	'cb_block_setting_'.$i;

//ADD CB NAME SETTING
			$cb_b_name = 'cb_block_name'.$i;
			$wp_customize->add_setting($cb_b_name, array(
				'default' => $name.$i,
				'transport' => 'refresh',
			));



//ADD CB min width SETTING
			$cb_width = 'cb_block_width'.$i;
			$wp_customize->add_setting($cb_width, array(
				'default' => '25',
				'transport' => 'refresh',

			));

//ADD CB min width CONTROL
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, $cb_width, array(
				'label' => 'Block minimum width',
				'section' => $cb_set,
				'settings' => $cb_width,
				'type' => 'number',
				'input_attrs' => array(
					'min'   => 1,
					'max'   => 100,),

			)));

//ADD CB toggle SETTING
			$cb_toggle = 'cb_block_toggle'.$i;
			$wp_customize->add_setting($cb_toggle, array(
				'default' => '1',
				'transport' => 'refresh',
			));

//ADD CB toggle CONTROL
			$wp_customize->add_control(new WP_Customize_Control($wp_customize, $cb_toggle, array(
				'label' => 'Display Block',
				'section' => 'cb_block_setting_'.$i,
				'settings' => $cb_toggle,
				'type' => 'checkbox',
			)));
			$ccount;



//ADD CB COLOR SETTING
			$value_= get_theme_mod('cb_palette_override'.$i);


			$cpal = $paletteValuesArr[$value_]	;
			$cb_name = 'block_bc'.$i;
			$wp_customize->add_setting($cb_name, array(
				'default' => $cpal['bc'],
				'transport' => 'postMessage',
			));
/**/
//ADD CB COLOR CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $cb_name, array(
				'label' => 'Block Color',
				'section' => $cb_set,
				'settings' => $cb_name,

			)));
			$wp_customize->get_setting($cb_name)->transport = 'postMessage';


//ADD CB font color SETTING
			$bfc_name = 'block_fc'.$i;
			$wp_customize->add_setting($bfc_name, array(
				'default' => $cpal['fc'],
				'transport' => 'refresh',

			));

//ADD CB font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bfc_name, array(
				'label' => 'Font Color',
				'section' => $cb_set,
				'settings' => $bfc_name,
			)));
			$wp_customize->get_setting($bfc_name)->transport = 'postMessage';

//ADD CB header and link font color SETTING
			$bhfc_name = 'block_lc'.$i;
			$wp_customize->add_setting($bhfc_name, array(
				'default' => $cpal['lc'],
				'transport' => 'refresh',

			));

//ADD CB header and link font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bhfc_name, array(
				'label' => 'Header and Link Font Color',
				'section' => $cb_set,
				'settings' => $bhfc_name,
			)));
			$wp_customize->get_setting($bhfc_name)->transport = 'postMessage';

//ADD CB header hover font color SETTING
			$bhhfc_name = 'block_lhc'.$i;
			$wp_customize->add_setting($bhhfc_name, array(
				'default' => $cpal['lhc'],
				'transport' => 'refresh',

			));

//ADD CB header hover font color CONTROL
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $bhhfc_name, array(
				'label' => 'Link Hover Color',
				'section' => $cb_set,
				'settings' => $bhhfc_name,
			)));
			$wp_customize->get_setting($bhhfc_name)->transport = 'postMessage';


//ADD BLOCK palette override SETTING
			$cb_palette = 'cb_palette_override'.$i;
			$wp_customize->add_setting($cb_palette, array(
				'default' => $ccount,
				'transport' => 'refresh',
				'capability' => 'manage_options',
			));

//ADD BLOCK palette override CONTROL
			$wp_customize->add_control(new color_scheme_radio($wp_customize, $cb_palette, array(
				'label'        => 'Select Palette Color Scheme',

				'section' => $cb_set,
				'settings' => $cb_palette,
				'type' => 'color_scheme_radio',
				'radios'   =>   get_theme_mod('accent_accessible_colors'),
                'id2' => $i

			)));
			$wp_customize->get_setting($cb_palette)->transport = 'postMessage';


		}

// SETUP BLOCKS

		$blocks_count = get_theme_mod('cb_block_count',1);


		$wp_posts = get_posts();

		$posts = array();
		$i = 0;



		for ($i = 1; $i <= $blocks_count; $i++) {
			create_block_color_setting($wp_customize,$i, 'cb_elm',$ccount);
		}


	}





	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'COLORBLOK_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'COLORBLOK_customize_partial_blogdescription',
		) );


		$wp_customize->selective_refresh->add_partial( 'Title_lc', array(
			'selector'        => '.site-title a',
			'render_callback' => 'COLORBLOK_customize_partial_blogname',

		) );

		$wp_customize->selective_refresh->add_partial( 'Title_lhc', array(
			'selector'        => '.site-title a',
			'render_callback' => 'COLORBLOK_customize_partial_blogname',

		) );

}
add_action( 'customize_register', 'COLORBLOK_customize_register' );
create_block_color_settings($wp_customize);





class color_scheme_radio extends WP_Customize_Control
{

	/**
	 * @access public
	 * @var string
	 */
	public $type = 'radio';

	/**
	 * @access public
	 * @var array
	 */
	public $radios;

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager
	 * @param string $id
	 * @param array $args
	 */
	public function __construct( $manager, $id, $args = array() ) {
		$this->radios = $args[ 'radios' ];
		$this->id2 = $args[ 'id2' ];
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 1.0
	 */
	public function enqueue() {
		wp_enqueue_style( 'cb_style', get_template_directory_uri() . '/css/customize-control-radio.css' );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['radios'] = $this->radios;
	}

	public function render_content() {



		?>
	<fieldset>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <div class="customize-control-content">
                <div class="radios">
                    <div class='platte_select_'>

				<?php


		foreach ($this->radios as $dv => $subdata) :
 if($dv==0){

	 $subdata['bc'] =  get_theme_mod('block_bc'.$this->id2, $subdata['bc']);
	 $subdata['fc'] =  get_theme_mod('block_fc'.$this->id2, $subdata['fc']);
	 $subdata['lc'] =  get_theme_mod('block_lc'.$this->id2, $subdata['lc']);
	 $subdata['lhc'] =  get_theme_mod('block_lhc'.$this->id2, $subdata['lhc']);
 }

			?>

            <div class='radio-<?php echo esc_attr($dv);  ?>  color<?php echo esc_attr($dv); ?>' style="background-color: <?php echo esc_attr($subdata['bc']); ?>; color: <?php echo esc_attr($subdata['fc']); ?>; a: <?php echo esc_attr($subdata['lc']); ?>;">

                    <input type="radio" value="<?php echo esc_attr($dv); ?>" name="<?php echo $this->id; ?>" <?php $this->link();  checked($this->value(),esc_attr($dv)); ?> />
               </br> Background: <?php echo esc_attr($subdata['bc']); ?>
                </br> Font: <?php echo esc_attr($subdata['fc']); ?>
                </br><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lc']); ?>;">Link <?php echo esc_attr($subdata['lc']); ?></span>
                </br><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lhc']); ?>;"> Hover <?php echo esc_attr($subdata['lhc']); ?></span>
            </div>



        <?php
					endforeach;
				?>
        </div>
          </div>
            </div>
    </fieldset>
		<?php
	}

}


class Post_Radio_Custom_Control extends WP_Customize_Control
{
	/**
	 * @access public
	 * @var string
	 */
	public $type = 'radio';

	/**
	 * @access public
	 * @var array
	 */
	public $radios;

	/**
	 * Constructor.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::__construct()
	 *
	 * @param WP_Customize_Manager $manager
	 * @param string $id
	 * @param array $args
	 */
	public function __construct( $manager, $id, $args = array() ) {
		$this->radios =$args[ 'radios' ];

		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @since 1.0
	 */
	public function enqueue() {
		wp_enqueue_style( 'cb_style', get_template_directory_uri() . '/css/customize-control-radio.css' );

	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @since 1.0
	 * @uses WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['radios'] = $this->radios;
	}

	public function render_content() {
		/**
		 * Render the control's content.
		 *
		 * @since 1.0
		 */



		$select_ =$this->value();
		$v_ = (int) $select_;

			?>
        <fieldset>
            <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>

                <div class="radios">
                    <div class='platte_select_'>

							<?php
							foreach ($this->radios as $dv => $subdata) :

								?>
                                <div class='platte_select <?php echo esc_attr($dv); ?> ' id="radio-<?php echo esc_attr($dv); ?>">

									<?php

										if($dv>0){
										?>
                                            <label for="<?php echo esc_attr($dv); ?>"><?php echo esc_attr($dv); ?> color options</label>
                                            <div class='radio-<?php echo esc_attr($dv);  ?>  color<?php echo esc_attr($dv);  ?>' style="background-color: <?php echo esc_attr($subdata['bc']); ?>; color: <?php echo esc_attr($subdata['fc']); ?>; a: <?php echo esc_attr($subdata['lc']); ?>;">
                                                <input type="radio" value="<?php echo esc_attr($dv); ?>" name="cb_palette_radios" <?php $this->link(); checked($this->value()); ?> />
                                                Background: <?php echo esc_attr($subdata['bc']); ?> Font: <?php echo esc_attr($subdata['fc']); ?> <span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lc']); ?>;">Link <?php echo esc_attr($subdata['lc']); ?></span><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lhc']); ?>;"> Hover <?php echo esc_attr($subdata['lhc']); ?>
                                            </div>



					<?php } ?>
                    </div>
				<?php	endforeach; ?>
                </div>

            </div>
            </div>
        </fieldset>
			<?php
		}
}

