<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<?php //post_class( $classes ); ?>
 <div class="mg_font_block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">

	<?php do_action( 'woocommerce_before_shop_loop_item' ); 
	
	$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
	
	
	?>

	<a href="<?php echo get_permalink().'?preview=font'; ?>">
	
	
	
	<span class="mg_font_style"><img src="<?php echo $image_link; ?>"><?php //do_action( 'woocommerce_before_shop_loop_item_title' ); ?></span>
    <span class="mg_font_name"><?php the_title(); ?></span>
	<span class="mg_font_dec"><?php echo strip_tags(get_the_content());?><span class="mg_font_price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span></span>

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<h3><?php //the_title(); ?></h3>

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			//do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

	</a>

	<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
	
	 </div>
                    </div>
                </div>



