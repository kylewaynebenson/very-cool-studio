<?php
/**
 * verycoolstudio functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package verycoolstudio
 */

/** page specific stylesheets **/
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles_or_scripts' );

function enqueue_custom_styles_or_scripts() {

    // If it's not the front page, stop executing code, ie. return
	if ( is_page(192) ) {
		wp_enqueue_style( 'webfonts-maritime-champion', get_stylesheet_directory_uri() . '/css/webfonts-maritime-champion.css' );
	} elseif ( is_page(130) ) {
		wp_enqueue_style( 'webfonts-ready-script', get_stylesheet_directory_uri() . '/css/webfonts-ready-script.css' );
	} elseif ( is_page(37) ) {
		wp_enqueue_style( 'webfonts-cardinal-grotesque', get_stylesheet_directory_uri() . '/css/webfonts-cardinal-grotesque.css' );
	} elseif ( is_page(71) ) {
		wp_enqueue_style( 'webfonts-kansas-casual', get_stylesheet_directory_uri() . '/css/webfonts-kansas-casual.css' );
	} elseif ( is_page(41) ) {
		wp_enqueue_style( 'webfonts-cornbread', get_stylesheet_directory_uri() . '/css/webfonts-cornbread.css' );
	}

}

if ( ! function_exists( 'verycool_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function verycool_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on verycoolstudio, use a find and replace
	 * to change 'verycool' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'verycool', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'verycool' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'verycool_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'verycool_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verycool_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verycool_content_width', 640 );
}
add_action( 'after_setup_theme', 'verycool_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verycool_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'verycool' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'verycool_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function verycool_scripts() {
	wp_enqueue_style( 'verycool-style', get_stylesheet_uri() );

	wp_enqueue_script( 'verycool-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'verycool-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'verycool_scripts' );

/**
	* Auto Assign templates
	*/
add_action('after_setup_theme', 'create_pages'); 
function create_pages(){
    $awesome_page_id = get_option("awesome_page_id");
    if (!$awesome_page_id) {
        //create a new page and automatically assign the page template
        $post1 = array(
            'post_title' => "Awesome Page!",
            'post_content' => "",
            'post_status' => "publish",
            'post_type' => 'page',
        );
        $postID = wp_insert_post($post1, $error);
        update_post_meta($postID, "_wp_page_template", "awesome-page.php");
        update_option("awesome_page_id", $postID);
    }
}
/**
 * Add classes to category links
**/
add_filter('wp_list_categories', 'add_slug_class_wp_list_categories');
function add_slug_class_wp_list_categories($list) {

$cats = get_categories('hide_empty=0');
	foreach($cats as $cat) {
	$find = 'cat-item-' . $cat->term_id . '"';
	$replace = 'cat-item-' . $cat->slug . ' cat-item-' . $cat->term_id . '"';
	$list = str_replace( $find, $replace, $list );
	$find = 'cat-item-' . $cat->term_id . ' ';
	$replace = 'cat-item-' . $cat->slug . ' cat-item-' . $cat->term_id . ' ';
	$list = str_replace( $find, $replace, $list );
	}

return $list;
}
/**
 * Disable woocommerce styles
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Excerpt allow shortcodes
 */
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'the_excerpt', 'shortcode_unautop');
/**
 * Price Shortcode
 */
function so_30165014_price_shortcode_callback( $atts ) {
    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts, 'bartag' );

    $html = '';

    if( intval( $atts['id'] ) > 0 && function_exists( 'wc_get_product' ) ){
         $_product = wc_get_product( $atts['id'] );
         $_product_trimmed = rtrim($_product->get_price(), ".00");
         $html = '<h1 class="huge-h1 price">' . $_product_trimmed . $html = '</h1>';
    }
    return $html;
}
add_shortcode( 'woocommerce_price', 'so_30165014_price_shortcode_callback' );


/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'your-theme-slug');
		$start_shopping = __('Start shopping', 'your-theme-slug');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="right"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="icon icon-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		}
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}
/**
 * Load fonts based on page
 */
function theme_styles()
{
  wp_register_style( 'webfonts',
    get_template_directory_uri() . '/css/webfonts.css', array(), '20130227', 'all' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
/**
 * Remove colon
 */
function mam_filter_the_meta_key( $list_item, $meta_key='', $meta_value='' ) {
   $new_list_item = str_replace( ':</span>', '</span>', $list_item );
   return $new_list_item;
}
add_filter( 'the_meta_key', 'mam_filter_the_meta_key' );

/**
* Remove p tag around images
**/
function filter_ptags_on_images($content)
{
    return preg_replace('/<p>(\s*)(<img .* \/>)(\s*)<\/p>/iU', '\2', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

add_filter( 'the_meta_key' , 'disallowed_custom_fields', 10, 3);

/**
* Remove total sales field
**/
function disallowed_custom_fields($string, $key, $value){

    $disallowed_keys = array(
        'total_sales'
    );
    if(!in_array(strtolower($key), $disallowed_keys)){
        return $string;
    }
}
