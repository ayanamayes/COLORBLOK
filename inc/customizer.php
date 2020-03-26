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
		   'default' =>get_paletteValuesArr() ,
            'transport'  => 'refresh',

            )
);
	$wp_customize->get_setting( 'accent_accessible_colors' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';



	$paletteValuesArr_default = get_paletteValuesArr();
	$paletteValuesArr_new = array();


		$paletteValuesArr_ = get_theme_mod('accent_accessible_colors');

	    for ($i=0; $i < sizeof($paletteValuesArr_default); $i++){
		    $paletteValuesArr_new[$i] = array();

		    if($paletteValuesArr_[$i]['bc'] == ''){  $paletteValuesArr_new[$i]['bc'] = $paletteValuesArr_default[$i]['bc'];}
		    else{$paletteValuesArr_new[$i]['bc'] = $paletteValuesArr_[$i]['bc'];}

		    if($paletteValuesArr_[$i]['fc'] == ''){  $paletteValuesArr_new[$i]['fc'] = $paletteValuesArr_default[$i]['fc'];}
		    else{$paletteValuesArr_new[$i]['fc'] = $paletteValuesArr_[$i]['fc'];}

		    if($paletteValuesArr_[$i]['lc'] == ''){  $paletteValuesArr_new[$i]['lc'] = $paletteValuesArr_default[$i]['lc'];}
		    else{$paletteValuesArr_new[$i]['lc'] = $paletteValuesArr_[$i]['lc'];}

		    if($paletteValuesArr_[$i]['lhc'] == ''){  $paletteValuesArr_new[$i]['lhc'] = $paletteValuesArr_default[$i]['lhc'];}
		    else{$paletteValuesArr_new[$i]['lhc'] = $paletteValuesArr_[$i]['lhc'];}


	}  $paletteValuesArr =  $paletteValuesArr_new;
		set_theme_mod('accent_accessible_colors',$paletteValuesArr_new);



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




	addSettingsAndControls($wp_customize, 'Title_lc', 'Site Title Color', '#ffffff', true, false,false) ;
	addSettingsAndControls($wp_customize, 'Title_lhc', 'Site Title Hover Color', '#000000', true, false,false) ;
	addSettingsAndControls($wp_customize, 'HFBKG', 'Header and Footer Background Color', '#ffffff', true, false,false) ;
	addSettingsAndControls($wp_customize, 'HFLC', 'Header and Link Color', '#ff0000', true, false,false) ;
	addSettingsAndControls($wp_customize, 'HFBKGHC', 'Header and Footer Background Hover Color', '#000000', true, false,false) ;
	addSettingsAndControls($wp_customize, 'HFLHC', 'Header and Footer Font Hover Color', '#ff0000', true, false,false) ;
	addSettingsAndControls($wp_customize, 'HFLHC', 'Header and Footer Font Hover Color', '#ff0000', true, false,false) ;


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


	$paletteValuesArr_loaded = $paletteValuesArr;
	for ($p = 1; $p <sizeof($paletteValuesArr);  $p++){
//ADD CB COLOR SETTING
$c =$paletteValuesArr[$p];

		addSettingsAndControls($wp_customize, 'bc_'.$p, 'Header and Footer Font Hover Color', $c['bc'], true, 'choice_callback', false ) ;
		        $paletteValuesArr_loaded[$p]['bc'] = $wp_customize->get_setting('bc_'.$p)->value() ;

		addSettingsAndControls($wp_customize, 'fc_'.$p, 'Font Color', $c['fc'], true, 'choice_callback', false ) ;
				$paletteValuesArr_loaded[$p]['fc'] = $wp_customize->get_setting('fc_'.$p)->value() ;

		addSettingsAndControls($wp_customize, 'lc_'.$p, 'Header and Link Color', $c['lc'], true, 'choice_callback', false ) ;
		        $paletteValuesArr_loaded[$p]['lc'] = $wp_customize->get_setting('lc_'.$p)->value() ;

		addSettingsAndControls($wp_customize, 'lhc_'.$p, 'Link Hover Color', $c['lhc'], true, 'choice_callback', false ) ;
		        $paletteValuesArr_loaded[$p]['lhc'] = $wp_customize->get_setting('lhc_'.$p)->value() ;




		}

	$paletteValuesArr =$paletteValuesArr_loaded;
	set_theme_mod('accent_accessible_colors',$paletteValuesArr);

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
	$wp_customize->add_control( new color_scheme_radio( $wp_customize, 'cb_palette', array(
		'label'        => 'Select Palette Color Scheme',
        'type' => 'radio',
		'description' =>  'Choose a color scheme' ,
		'panel' => 'cb_panel',
		'section'    => 'cb_block_settings',
		'settings'   => 'cb_palette',
		'radios'   =>   $paletteValuesArr,
		'usezero' => false,
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

			$paletteValuesArr_ = get_theme_mod('accent_accessible_colors');

			if($ccount ==5){$ccount=0;}


			$cb_set = 	'cb_block_setting_'.$i;




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

			$cb_set = 	'cb_block_setting_'.$i;
			$cpal = $paletteValuesArr_[$value_]	;
			addSettingsAndControls($wp_customize, 'block_bc'.$i, 'Block Color', $cpal['bc'], true, false, $cb_set) ;
			addSettingsAndControls($wp_customize, 'block_fc'.$i, 'Font Color', $cpal['fc'], true, false, $cb_set) ;
			addSettingsAndControls($wp_customize, 'block_lc'.$i, 'Header and Link Color', $cpal['lc'], true, false, $cb_set) ;
			addSettingsAndControls($wp_customize, 'block_lhc'.$i, 'Link Hover Color', $cpal['lhc'], true, false, $cb_set) ;

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
				'type' => 'radio',
				'radios'   =>   $paletteValuesArr_,
                'id2' => $i,
				'usezero' => true,

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
		$this->usezero = $args[ 'usezero' ];
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

 if($dv == 0 && $this->id2 != '')
 {

     $subdata['bc'] =  get_theme_mod('block_bc'.$this->id2, $subdata['bc']);
	 $subdata['fc'] =  get_theme_mod('block_fc'.$this->id2, $subdata['fc']);
	 $subdata['lc'] =  get_theme_mod('block_lc'.$this->id2, $subdata['lc']);
	 $subdata['lhc'] =  get_theme_mod('block_lhc'.$this->id2, $subdata['lhc']);
 }


     if($this->usezero == false && $dv == 0) {} else
 {


			?>

            <div class='radio-<?php echo esc_attr($dv);  ?>  color<?php echo esc_attr($dv); ?>' style="background-color: <?php echo esc_attr($subdata['bc']); ?>; color: <?php echo esc_attr($subdata['fc']); ?>; a: <?php echo esc_attr($subdata['lc']); ?>;">
                <label for="<?php echo esc_attr($dv); ?>"><?php echo esc_attr($dv); ?> color options</label>

                    <input type="radio" value="<?php echo esc_attr($dv); ?>" name="<?php echo $this->id; ?>" <?php $this->link();  checked($this->value(),esc_attr($dv)); ?> />
               </br> Background: <?php echo esc_attr($subdata['bc']); ?>
                </br> Font: <?php echo esc_attr($subdata['fc']); ?>
                </br><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lc']); ?>;">Link <?php echo esc_attr($subdata['lc']); ?></span>
                </br><span  class="edit_pal <?php echo esc_attr($dv); ?>" style=" color: <?php echo esc_attr($subdata['lhc']); ?>;"> Hover <?php echo esc_attr($subdata['lhc']); ?></span>
            </div>



        <?php }
					endforeach;
				?>
        </div>
          </div>
            </div>
    </fieldset>
		<?php
	}

}



function addSettingsAndControls($wp_customize, $name, $label, $default, $transport, $callback, $section){
	if(!$section){$section = 'cb_block_settings';}
	//ADD  SETTING
	$wp_customize->add_setting($name, array(
		'default' => $default,
		'transport' => 'refresh',
		'panel' => 'cb_panel',

	));
	//ADD  CONTROL

	if($callback != false){
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $name, array(
			'label' => $label,
			'settings' => $name,
			'section'    => $section,
			'active_callback' =>'choice_callback',

		)));
	}
	else {
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $name, array(
			'label' => $label,
			'settings' => $name,
			'section'    => $section,

		)));

	}


	if($transport){
		$wp_customize->get_setting($name)->transport = 'postMessage';}
}
