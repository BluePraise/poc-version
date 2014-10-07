<?php

add_theme_support( 'woocommerce' );
ob_start();

//Override some of the WooThemes framework
function mystile_custom_before_quick_nav() { woo_do_atomic( 'mystile_custom_before_quick_nav' ); }
function mystile_custom_move_breadcrumbs() {
	remove_action('woo_main_before','woo_display_breadcrumbs',10);
	add_action('mystile_custom_before_quick_nav','woo_display_breadcrumbs',10);
}
//function newFunction() { echo "use me instead"; }
add_action('after_setup_theme','mystile_custom_move_breadcrumbs');

//If user logged in then display VIP otherwise dont.
function mystile_custom_hide_VIP_products( $q ) {

	 if (!is_user_logged_in()) {
		if ( ! $q->is_main_query() ) return;
		if ( ! $q->is_post_type_archive() ) return;
		if ( ! is_admin() ) {
			$q->set( 'tax_query', array(array(
				'taxonomy' => 'product_cat',
				'field' => 'slug',
				'terms' => array( 'VIP' ), // Don't display products in the knives category on the shop page
				'operator' => 'NOT IN'
			)));
		}
		remove_action( 'pre_get_posts', 'mystile_custom_hide_VIP_products' );
	}
}
add_action( 'pre_get_posts', 'mystile_custom_hide_VIP_products' );

function mystile_custom_featured_VIP() {
	global $woo_options;
	if (class_exists('woocommerce') && $woo_options[ 'woo_homepage_featured_products' ] == "true" ) {
		echo '<h3>'.__('Featured Products', 'woothemes').'</h3>';
		$featuredproductsperpage = $woo_options['woo_homepage_featured_products_perpage'];
		echo do_shortcode('[featured_products per_page="'.$featuredproductsperpage.'"]');
	} // End query to see if products should be displayed
}

add_action( 'restrict_manage_posts', 'woocommerce_brand_filter_list' );
function woocommerce_brand_filter_list() {
    $screen = get_current_screen();
    global $wp_query;
    if ( $screen->post_type == 'product' ) {
        wp_dropdown_categories( array(
            'show_option_all' => 'Show All Brands',
            'taxonomy' => 'product_brand',
            'name' => 'product_brand',
            'orderby' => 'name',
            'selected' => ( isset( $wp_query->query['product_brand'] ) ? $wp_query->query['product_brand'] : '' ),
            'hierarchical' => false,
            'depth' => 3,
            'show_count' => true,
            'hide_empty' => false,
        ) );
    }
}
function woocommerce_perform_brand_filtering( $query ) {
    $qv = &$query->query_vars;
    if ( ( $qv['product_brand'] ) && is_numeric( $qv['product_brand'] ) ) {
        $term = get_term_by( 'id', $qv['product_brand'], 'product_brand' );
        $qv['product_brand'] = $term->slug;
    }
}
add_filter( 'parse_query','woocommerce_perform_brand_filtering' );


add_filter( 'woocommerce_get_terms_page_id', 'woocommerce_terms_page_id');
function woocommerce_terms_page_id() {
    return 42;  /* insert your page-id here */
}
// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['Licence_owner'] = array(
      'label'     => __("Who's this font stuff for?", 'woocommerce'),
      'placeholder'   => _x('Licence Owner (optional)', 'placeholder', 'woocommerce'),
      'required'  => false,
      'class'     => array('form-row-wide'),
      'clear'     => true
     );

     return $fields;
}

function wptuts_scripts_basic() {
$url =  get_bloginfo('stylesheet_directory');
// Register the script like this for a theme:

  wp_register_script( 'jqueryui',  $url.'/js/jquery-ui.js' );
  wp_enqueue_script( 'jqueryui' );

  wp_register_script( 'custom-script',  $url.'/js/custom.js' );
  wp_enqueue_script( 'custom-script' );

  wp_register_script( 'tool-script',  $url.'/js/tooltip.js' );
  wp_enqueue_script( 'tool-script' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );

add_filter('show_admin_bar', '__return_false');

/*custom post for portfolio*/

function post_type_portfolio() {
  register_post_type(
      'portfolio', array(
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => false,
        //'menu_icon' => get_stylesheet_directory_uri() . '/images/rev.png',
        'labels'=>array(
                    'name' => _x('Portfolio', 'post type general name'),
                    'singular_name' => _x('Portfolio', 'post type singular name'),
                    'add_new' => _x('Add New', 'Portfolio post'),
                    'add_new_item' => __('Add New Portfolio post, Suggest Image size : 680*300'),
                    'edit_item' => __('Edit Portfolio post'),
                    'new_item' => __('New portfolio post'),
                    'view_item' => __('View portfolio post'),
                    'search_items' => __('Search portfolio post'),
                    'not_found' =>  __('No Portfolio found'),
                    'not_found_in_trash' => __('No Portfolio found in Trash'),
                    'parent_item_colon' => ''
        ),
        'show_ui' => true,
				'menu_position'=>5,
        'supports' => array(
                      'title',
                      'thumbnail','editor','excerpt'
                        )
                      )
        );
}
add_action('init', 'post_type_portfolio');
/**/

/****************************************************************************
* Functions added by Magalie Linda
* */

function typemafia_custom_scripts_styles() {

  // Inject bootstrap css
  //
  wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css');
  wp_enqueue_style( 'bootstrap' );

  // Inject typemafia css
  //
  wp_register_style( 'typemafia-styles', get_stylesheet_directory_uri() . '/css/styles.css');
  wp_enqueue_style( 'typemafia-styles' );

  // Inject custom js in footer
  wp_register_script( 'customjs', get_stylesheet_directory_uri() . '/js/custom.js.js', '' , true);
  wp_enqueue_script( 'customjs' );

  // Inject jquery UI in footer
  wp_register_script( 'jqueryui', get_stylesheet_directory_uri() . '/js/jquery-ui.js', '' , true);
  wp_enqueue_script( 'jqueryui' );

}

add_action( 'wp_enqueue_scripts', 'typemafia_custom_scripts_styles' );


?>
