<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'seeded' );
define( 'CHILD_THEME_URL', 'http://seededatthetable.com' );

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
add_image_size( 'home-bottom', 187, 124, true );
add_image_size( 'home-middle', 265, 150, true );
add_image_size( 'home-mini', 80, 80, true );
add_image_size( 'home-supermini', 65, 45, true );
add_image_size( 'primary-sidebar', 330, 100, true );


/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 'innov8tive-yellow' => 'Yellow & Orange', 'innov8tive-turquoise' => 'Turquoise & Red' ) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add support for custom background */
add_custom_background();

/** Reposition the primary navigation */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 120, 'header_callback' => 'innov8tive_admin_style' ) );
 
/** Register a custom callback to style the custom header */
function innov8tive_admin_style() {
 
            $headimg = sprintf( '#header { background: url(%s) no-repeat center; min-height: %spx; }', get_header_image(), HEADER_IMAGE_HEIGHT );
 
            printf( '<style type="text/css">%1$s</style>', $headimg);
}

/** Add support for 4-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 4 );


/** Customize search button text */
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text($text) {
	return esc_attr('search this site');
}


/** Customize the post info function */
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if ( !is_page() ) {
    $post_info = '[post_date]<div id="authorship">by [post_author_posts_link] [post_comments zero="Comment" one="1 Comment" more="%"]</div> [post_edit]';
    return $post_info;
}}

add_filter( 'genesis_post_comments_shortcode', 'child_post_comments_shortcode' );
/**
 * Amend the post comments shortcode to add extra markup for styling.
 *
 * @author Gary Jones
 * @link   http://code.garyjones.co.uk/style-comment-number/
 *
 * @param string $output HTML markup, likely with shortcodes.
 *
 * @return string HTML markup.
 */
function child_post_comments_shortcode( $output ){
 
    return preg_replace('/#comments"\>(\d+) Comments/', '#comments"><span class="number">${1}</span> <span class="commentword">Comment</span>', $output);
 
}


add_filter( 'genesis_post_date_shortcode', 'child_post_date_shortcode', 10, 2 );
/**
 * Customize Post Date format and add extra markup for CSS targeting.
 *
 * @author Gary Jones
 * @link   http://code.garyjones.co.uk/style-post-info/
 *
 * @param string $output Current HTML markup.
 * @param array  $atts   Attributes.
 *
 * @return string HTML markup.
 */
function child_post_date_shortcode( $output, $atts ) {
 
	return sprintf(
		'<span class="date time published" title="%4$s">%1$s <p class="month">%3$s</p><p class="day">%2$s</p></span>',
		$atts['label'],
			get_the_time( 'j' ),
			get_the_time( 'M' ),
			get_the_time( 'Y-m-d\TH:i:sO' )
	);
 
}


/** Customize the post meta function */
add_filter( 'genesis_post_meta', 'innov8tive_post_meta_filter' );
function innov8tive_post_meta_filter( $post_meta ) {
    
	return '[post_categories before="Posted In: "] [post_tags before="Tagged: "]';
}


/** Remove the archive thumbnail from the blog page */
add_action( 'genesis_before_content', 'innov8tive_conditional_actions' );
function innov8tive_conditional_actions() {
    if( is_page_template( 'page_blog.php' ) && 'full' == genesis_get_option( 'content_archive' ) )
        remove_action( 'genesis_post_content', 'genesis_do_post_image' );
}

genesis_register_sidebar( array(
	'id'			=> 'skyscraper-left',
	'name'			=> __( 'skyscraper left', 'seeded' ),
	'description'	=> __( 'Widget Area for Left Skyscraper.', 'seeded' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'skyscraper-right',
	'name'			=> __( 'skyscraper right', 'seeded' ),
	'description'	=> __( 'Widget Area for Right Skyscraper.', 'seeded' ),
) );

genesis_register_sidebar( array(
	'id'			=> 'under-skyscraper',
	'name'			=> __( 'under skyscraper', 'seeded' ),
	'description'	=> __( 'Widget Area for Under the Skyscraper Ads.', 'seeded' ),
) );


/** Register widget areas */
		register_sidebar(array(
			'name' 			=> 'Top Banner Ad',
			'id'			=> 'top-banner-ad',
			'description'	=> __( 'Widget Area for Banner up top.'),
			'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="widget-title">',
			'after_title'	=> '</h3>',
	));
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



function change_default_comment_text($args) {
    $args['title_reply'] = 'Leave a Comment';
    return $args;
}
add_filter( 'genesis_comment_form_args', 'change_default_comment_text' );


add_shortcode('wpbsearch', 'get_search_form'); 

function custom_post_navigation()
{
?>
    <div class="prev_next clearfix">
        <div class="nav_left">
            <span class="prev"><?php previous_post_link('%link', '%title'); ?></span> 
         </div class="nav_right">
        <div>
            <span class="next"><?php next_post_link('%link', '%title'); ?></span>
        </div>
    </div>
<?php
}

add_action('genesis_after_post_content', 'custom_post_navigation');

class CategoryThumbnail_Walker extends Walker_Category {

    // A new element has been stumbled upon and has ended
    function end_el( &$output, $category, $depth, $args ) {
        // Output the standard link ending
        parent::end_el( &$output, $category, $depth, $args );

        // Get one post
        $posts = get_posts( array(
            // ...from this category
            'category' => $category->cat_ID,
            'numberposts' => 10
        ) );

        // we'll record the seen images here
        if ( !isset($this->images_seen) ) $this->images_seen = array();

        foreach ( $posts as $post ) {
            // Get its thumbnail and append it to the output
            $featured = get_the_post_thumbnail( $post->ID, 'primary-sidebar', null );
            // have we already seen this image?
            if ( in_array($featured, $this->images_seen) ) continue;
            else {
                $this->images_seen []= $featured;
                $output .= $featured;
                break;
            }
        }
    }
}

