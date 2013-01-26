<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'innov8tive' );
define( 'CHILD_THEME_URL', 'http://marketplace.studiopress.com/themes/innov8tive' );

$content_width = apply_filters( 'content_width', 470, 400, 910 );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'generate_viewport_meta_tag' );
function generate_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Provides markup for the #mobilenav section */
register_nav_menu('mobilenav' , __('mobile Navigation Menu', 'innov8tive'));
add_action('genesis_before_header', 'innov8tive_do_mobilenav');
function innov8tive_do_mobilenav() { ?>
	<div id="mobilenav">
	<div class="wrap">
	<?php if ( function_exists('wp_nav_menu') ) { 
	$mobilenav = wp_nav_menu(array(
	'theme_location' => 'mobilenav',
	'container' => '',
	'menu_class' => 'mobilenav superfish',
	'echo' => 0,
	'fallback_cb' => false
	));
	echo $mobilenav;
	} ?>
	</div><!-- end .wrap -->
	</div><!-- end #mobilenav -->
<?php }

/** Add new image sizes */
add_image_size( 'home-bottom', 150, 225, true );
add_image_size( 'home-middle', 265, 150, true );
add_image_size( 'home-mini', 80, 80, true );
add_image_size( 'home-supermini', 65, 45, true );
add_image_size( 'primary-sidebar', 330, 150, true );

/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 'innov8tive-yellow' => 'Yellow & Orange', 'innov8tive-turquoise' => 'Turquoise & Red' ) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add support for custom background */
add_custom_background();

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 120, 'header_callback' => 'innov8tive_admin_style' ) );
 
/** Register a custom callback to style the custom header */
function innov8tive_admin_style() {
 
            $headimg = sprintf( '#header { background: url(%s) no-repeat center; min-height: %spx; }', get_header_image(), HEADER_IMAGE_HEIGHT );
 
            printf( '<style type="text/css">%1$s</style>', $headimg);
}

/** Add support for 4-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 4 );

/** Reposition the primary navigation */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

/** Customize search button text */
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text($text) {
	return esc_attr('search this site');
}



/** Customize the post meta function */
add_filter( 'genesis_post_meta', 'innov8tive_post_meta_filter' );
function innov8tive_post_meta_filter( $post_meta ) {
    
	return '[post_categories before="Filed Under: "] &#x00b7; [post_tags before="Tagged: "]';
}

/** Remove the archive thumbnail from the blog page */
add_action( 'genesis_before_content', 'innov8tive_conditional_actions' );
function innov8tive_conditional_actions() {
    if( is_page_template( 'page_blog.php' ) && 'full' == genesis_get_option( 'content_archive' ) )
        remove_action( 'genesis_post_content', 'genesis_do_post_image' );
}

/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'home-top',
	'name'			=> __( 'Home Top', 'innov8tive' ),
	'description'	=> __( 'This is the home top section.', 'innov8tive' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-left',
	'name'			=> __( 'Home Left', 'innov8tive' ),
	'description'	=> __( 'This is the home left section.', 'innov8tive' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-right',
	'name'			=> __( 'Home Right', 'innov8tive' ),
	'description'	=> __( 'This is the home right section.', 'innov8tive' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom',
	'name'			=> __( 'Home Bottom', 'innov8tive' ),
	'description'	=> __( 'This is the home bottom section.', 'innov8tive' ),
) );
