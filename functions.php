<?php

// Add RSS links to <head> section
automatic_feed_links();
add_post_type_support( 'page', 'excerpt' );
function lanex_enqueue_scripts() {
	$template_url = get_template_directory_uri();
	wp_enqueue_script( 'mod-js', $template_url . '/js/modernizr.custom.02.03.15.js', array( ), null, true );
	wp_enqueue_script( 'bootstrap-js', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'owl-js', $template_url . '/js/owl.carousel.js', array(), null, true );

	wp_enqueue_style( 'bootstrap-css', $template_url . '/css/bootstrap.css' );
	wp_enqueue_style( 'owl-css', $template_url . '/css/owl.carousel.css' );
	wp_enqueue_style( 'owltheme-css', $template_url . '/css/owl.theme.css' );
	wp_enqueue_style( 'owltrans-css', $template_url . '/css/owl.transitions.css' );
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css');
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'lanex_enqueue_scripts' );

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

add_theme_support( 'post-thumbnails' );
add_image_size( 'home-slide', 1920, 420, array('center','center') );
add_image_size( 'funnel-thumb', 359, 190, array('center','center') );

// Declare widgets
if (function_exists('register_sidebar')) {
	// used in default sidebar
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
}

if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'main_nav' => 'Main Navigation Menu'
            )
        );
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'woocommerce' );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Pinnacle' ),
	'who-we-are' => __('Footer Who We Are', 'Pinnacle'),
	'ftr-services' => __('Footer Services', 'Pinnacle'),
	'ftr-portfolio' => __('Footer Portfolio', 'Pinnacle'),
	'ftr-contact' => __('Footer Contact', 'Pinnacle'),
	'ftr-planroom' => __('Footer Plan Room', 'Pinnacle'),
    'sidebar-left' => __( 'Sidebar Menu', 'Pinnacle' )
) );

function create_widget($name, $id, $description) {

	register_sidebar(array(
		'name' => __( $name ),
		'id' => $id,
		'description' => __($description ),
		'before_widget' => '<ul class="list-unstyled">',
		'after_widget' => '</ul>',
		'before_title' => '<lh>',
		'after_title' => '</lh>'
	));
}



// add categories for attachments
function add_categories_for_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'add_categories_for_attachments' );
// add tags for attachments
function add_tags_for_attachments() {
	register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'add_tags_for_attachments' );

function p($var){
	echo '<pre>'; var_dump($var); echo '</pre>';
}
require_once('includes/contact-info.php');

?>
