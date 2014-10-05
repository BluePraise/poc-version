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
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if IE 7]>
  <link rel="stylesheet" href="css/font-awesome-ie7.css">
  <![endif]-->
  <link rel="stylesheet" href="http://fonts.typotheque.com/WF-001368-007151.css" type="text/css" />
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> onLoad="changetheme();">
  <?php woo_top(); ?>

<div class="main_site">
 <!--Start Header-->
  <div id="mg_header">

		<!-- bluish bar-->
		<?php if($woocommerce->cart->get_cart_contents_count() && $woocommerce->cart->get_cart_contents_count()!=0 ) { ?>
		<div class="mg_submenu_block_head">
					<div class="row">
						<div class="col-xs-12 col-sm-3 col-md-3 top_nav_blue" >
						<ul>
						<?php $items = wp_get_nav_menu_items('cart');
						foreach($items as $menu_items){ ?>
						<li><a href="<?php echo $menu_items->url; ?>" <?php if(is_page( $menu_items->object_id)){ ?>class="active_top"<?php } ?>><?php echo $menu_items->title; ?></a></li>
						<?php } ?>
						</ul>
						</div>


						<div class="col-xs-12 col-sm-6 col-md-6 " >
						<?php do_action( 'woocommerce_before_single_product' );?>
						</div>


						<div class="col-xs-12 col-sm-3 col-md-3 " >
						<?php //do_action( 'woocommerce_before_single_product' ); ?>
							<?php if ( class_exists( 'woocommerce' ) ) {
									echo '<ul class="mg_tpmenu_rgt">';

									woocommerce_cart_link();
									//echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
									//echo get_search_form();
									echo '<li class="cart_text"><strong>Cart</strong></li>';
									echo '</ul>';
								}

							?>


						</div>
					</div>
				</div>
				<?php } ?>
				<!-- bluish bar-->

    	<div class="mg_header_in">
        	<div class="row">
						<div class="col-xs-12 col-sm-10 col-md-10">
						 <?php
						$logo = esc_url( get_template_directory_uri() . '/images/logo.png' );


						if (  is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
					?>

						<a id="logo" class="mg_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
							<img src="<?php echo $logo; ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" />
						</a>

							<?php wp_nav_menu( array('menu' => 'home' )); ?>

                    <div class="mg_tpnav">

						<?php

							if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
								wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => false, 'menu_id' => 'main-nav', 'menu_class' => 'mg_tpmenu', 'theme_location' => 'primary-menu' ) );
							} else {
							?>
							<ul id="main-nav" class="mg_tpmenu">
								<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
								<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
								<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
							</ul><!-- /#nav -->
							<?php } ?>





                        <!-- Start Navigation fot Phione Device Only -->
                       <!-- <div class="mobile_navigation">
                        <select class="col-xs-12 visible-phone">
                            <option selected="" value="#">Fonts &amp; Goods</option>
                            <option value="#">Custom Design</option>
                            <option value="#">Blog</option>
                            <option value="#">About</option>
                            <option value="#">Contact</option>
                        </select>
                        <!-- End Navigation fot Phione Device Only -->
                        <!--<div class="clear"></div>
                       </div>-->
                    </div></div>

                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="mg_search_box">

				     <?php $form = '<form role="search" method="get" id="searchform" action="' . esc_url(home_url( '/' )) . '" >
                          <input type="" results=5 autosave="'. esc_url(home_url( '/' )) .'" class="col-xs-12 col-sm-12 col-md-12" placeholder="'. esc_attr__('Search', 'woothemes') .'" name="s" id="s" />
                          <button type="submit" id="searchsubmit" class="mg_search_icon"></button>
						  </form>';

						echo $form; ?>


                    </div>
                </div>
            </div>
        </div>
				<div class="clear"></div>



							<div class="mg_submenu_block">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12" class="submenu">
								<ul class="mg_submenu">
								</ul>




							<div class="clear"></div>
						</div>
					</div>
				</div>




    </div>

    <!--End Header-->



		<?php woo_header_before(); ?>
        <?php woo_nav_before(); ?>
        <?php woo_nav_after(); ?>
		<?php woo_content_before(); ?>
