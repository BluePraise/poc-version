<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <!--[if IE 7]>
    <link rel="stylesheet" href="css/font-awesome-ie7.css">
  <![endif]-->
<?php
	wp_head();
	woo_head();
?>

	<script type="text/javascript">

	/*user define css*/

			jQuery(document).ready(function(){
			var docHeight = jQuery(document).height();
			jQuery(".loader_full").height(docHeight);
				});

			function changetheme(){

			 var check  = "<?php if(session_id() == ''){ session_start();} echo $_SESSION['user_visit'];?>";
			var url = "<?php bloginfo('stylesheet_directory'); ?>";

			if(check!='') {

			jQuery('body').removeClass('day');
			jQuery('body').removeClass('night')
			jQuery('body').addClass(check);
			jQuery('#'+check).addClass('active');
			jQuery('.loader_full').hide();
			}else{
				  var dt = new Date();
				  var day =dt.getDate();
				  var month = parseInt(dt.getMonth()) + 1 ;
				  var h = dt.getHours() ;
				  var m =dt.getMinutes()
				  var s =dt.getSeconds();
					  jQuery.ajax({
					  url:url+'/ajax.php?day='+day+'&month='+month+'&h='+h+'&m='+m+'&s='+s+'&callback=?',
					  type:'GET',
					  success:function(html){

						jQuery('body').removeClass('day');
						jQuery('body').removeClass('night')
						jQuery('body').addClass(html);
						jQuery('#'+html).addClass('active');
						jQuery('.loader_full').hide();

					  }
					  })

			}
	}


	</script>

 <link href="<?php echo get_template_directory_uri(); ?>/css/custom.css" rel="stylesheet" type="text/css">
</head>

<body <?php body_class(); ?> onload="changetheme()">
<?php woo_top(); ?>
<div class="loader"></div>

<div id="wrapper">
  <!--Start Header-->
  <?php woo_header_before(); ?>
  <header class="main-header mg_header" id="top">

    <div class="logo">
        <?php
          $logo = esc_url( get_template_directory_uri() . '/images/logo.png' );
          if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
          if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
        ?>
        <?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
          <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
            <img src="<?php echo $logo; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
          </a>
        <?php } ?>
		</div> <!-- End of logo -->

    <nav class="top-menu" role="navigation">
			<?php
				  if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
            wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
          } else {
				?>
        <ul id="main-nav" class="nav fr">
          <?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
          <li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
          <?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
        </ul><!-- /#nav -->

          <?php
            }

						if ( class_exists( 'woocommerce' ) ) {
								echo '<ul class="mg_tpmenu">';
								woocommerce_cart_link();
								echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
								//echo get_search_form();
								echo '</ul>';
							}
				     ?>

      <?php woo_nav_after(); ?>

    <div class="search-box">
		     <?php
          $form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url( '/' )) . '" >
                      <input type="" results=5 autosave="'. esc_url(home_url( '/' )) .'" class="col-xs-12 col-sm-12 col-md-12" placeholder="'. esc_attr__('Search', 'woothemes') .'" name="s" id="s" />
                      <button type="submit" id="searchsubmit" class="mg_search_icon"></button>
				            </form>';
				        echo $form;
          ?>
    </div> <!-- End of search-box -->

				<div class="row mg_submenu_block">
						<div class="col-xs-12 col-sm-12 col-md-12">
								<?php

									if( !is_page() ){}else{

									global $post;
									$section_id = empty( $post->ancestors ) ? $post->ID : end( $post->ancestors );

									$locations = get_nav_menu_locations();

									$menu = wp_get_nav_menu_object( $locations[ 'primary' ] );

									$menu_items = wp_get_nav_menu_items( 13, array( 'post_parent' => $section_id ) );

									//print_r($menu_items);
									// If there are menu items, build the menu
									if( !empty( $menu_items ) ) {

										echo '<ul class="mg_submenu">';
										$first = true;
										foreach( $menu_items as $menu_item ) {
											$classes = 'page-item';
											// This adds a class to the first item so I can style it differently
											if( $first )
												$classes .= ' first-menu-item';
											$first = false;
											// This marks the current menu item
											if( get_the_ID() == $menu_item->object_id )
												$classes .= ' current_page_item';
											echo '<li class="' . $classes . '"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
										}
										echo '</ul>';
									}

									}

								?>
    </div>
  </div>
</header>
<!--End Header-->

 <?php woo_content_before(); ?>

