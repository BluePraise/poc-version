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
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 3 );

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
<li <?php //post_class( $classes ); ?>>
<div class="col-xs-12 col-sm-4 col-md-4">
                    	<div class="mg_product_block_in">
                        	
                          
                      


	<?php do_action( 'woocommerce_before_shop_loop_item' ); 
	
	$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
	$terms = get_the_terms( $product->ID, 'product_cat' );
			$catids = array();
			foreach ($terms as  $key => $term) {
			$catids[] = $key;	
			}
	
	
	?>

	<?php if(in_array('14',$catids )) { ?>
	<a href="<?php echo get_permalink().'?preview=font'; ?>">
	<?php } else { ?>
	<a href="<?php the_permalink(); ?>">
	<?php } ?>
	
	
	<span class="mg_product_img"><?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?></span>
	  <span class="product_name"><?php the_title(); ?> <span class="product_price"><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></span></span>
 

		<?php
			/**
			 * woocommerce_before_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			//do_action( 'woocommerce_before_shop_loop_item_title' );
		?>

		<h2><?php //the_title(); ?></h2>

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

</li>

