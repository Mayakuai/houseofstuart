<?php
/**
 * Mythril functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mythril
 * @subpackage Mythril
 * @since 1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function mythril_setup() {

	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'mythril' );

	/*
	 * Title tag support
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/*
	 * Custom image sizes
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'banner', 2000, 1200, true );
	add_image_size( 'large', 1200, 800, true );
	add_image_size( 'medium', 800, 600, true );
	add_image_size( 'small', 400, 300, true );
	add_image_size( 'square', 250, 250, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main'    	=> __( 'Main Menu', 'mythril' ),
		'secondary' => __( 'Secondary Menu', 'mythril' ),
		'social' 	=> __( 'Social Links Menu', 'mythril' ),
	) );

}
add_action( 'after_setup_theme', 'mythril_setup' );

/**
 * Custom Editor Styles
 */
add_editor_style(
	array(
		'assets/css/editor.css', // Site specific styles
		//esc_url_raw('https://use.typekit.net/###.css') // Add additional webfonts to the editor
	)
);


/**
 * Enqueue scripts and styles.
 */
function mythril_scripts() {

	// Load our main styles
	wp_enqueue_style( 'mythril-style', get_stylesheet_uri() );
    wp_enqueue_style( 'mythril-bootstrap-full-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), '4.3.1' ); // Optional Full Bootstrap
    // wp_enqueue_style( 'mythril-bootstrap-grid-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap-grid.min.css', array(), '4.3.1' ); // Bootstrap grid only

		wp_enqueue_style( 'flex-rtl-style', get_template_directory_uri() . '/assets/css/flexslider-rtl-min.css', array(), time() );
	wp_enqueue_style( 'mythril-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), time() );
	wp_enqueue_style( 'theme-fonts-a', 'https://use.typekit.net/tww0twn.css', array(), 'v1.1' );

	// Add print CSS.
	wp_enqueue_style( 'mythril-print-style', get_template_directory_uri() . '/print.css', null, '1.0', 'print' );

	// Scripts
	wp_enqueue_script( 'mythril-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0', true );
	wp_enqueue_script( 'mythril-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.bundle.min.js', array(), '4.3.1', true );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );


	wp_enqueue_script( 'jquery-pop', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '3.1.0', true );
wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . 'https://code.jquery.com/jquery-migrate-1.2.1.min.js', array(), '1.2.1', true );

	wp_enqueue_script( 'magpop', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js' , array(), '1.1.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js' , array(), '2.7.2', true );
	wp_enqueue_script( 'slickslider', get_template_directory_uri() . '/assets/js/slick/slick.min.js' , array(), '1.8.0', true );
		// Global Javascript
		wp_enqueue_script( 'mythril-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'mythril_scripts' );


/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function mythril_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'mythril_front_page_template' );


/**
 * Custom single page templates
 */
function get_custom_cat_template($single_template) {
	global $post;

	if ( in_category( 'something' )) {
		$single_template = dirname( __FILE__ ) . '/single-something.php';
	}
	return $single_template;
}
add_filter( "single_template", "get_custom_cat_template" ) ;

/**
 * Render SVG inline
 */
function getSVG($svg){
	$upload_dir = wp_upload_dir()['path'];
	return file_get_contents($upload_dir.'/'.$svg);
}


/**
 * Customize the 'Format' select dropdown
 */
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
    // Define the style_formats array
    $style_formats = array(
        // Each array child is a format with it's own settings
        array(
            'title' => 'Button',
            'selector' => 'a',
            'classes' => 'button'
        )
    );
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


/**
 * Backward Compatibility
 */

 // Shim for new wp_body_open() function
 // https://make.wordpress.org/themes/2019/03/29/addition-of-new-wp_body_open-hook/
 if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
			do_action( 'wp_body_open' );
	}
}

// disable GTB for posts
add_filter('use_block_editor_for_post', '__return_false', 10);

// disable GTB  for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function my_layout_title($title, $field, $layout, $i) {
    if($value = get_sub_field('layout_title')) {
        return $value;
    } else {
        foreach($layout['sub_fields'] as $sub) {
            if($sub['name'] == 'layout_title') {
                $key = $sub['key'];
                if(array_key_exists($i, $field['value']) && $value = $field['value'][$i][$key])
                    return $value;
            }
        }
    }
    return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4);
