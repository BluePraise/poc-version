<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

			
			global $post, $product;
			
			$color = get_the_terms( $product->id, 'pa_color');
			$size = get_the_terms( $product->id, 'pa_size');
			
			$availability = $product->get_availability();
			
			$terms = get_the_terms( $product->ID, 'product_cat' );
			$catids = array();
			foreach ($terms as  $key => $term) {
			$catids[] = $key;	
			}
			

?>
		
		
		
		
		
		    <!--Start Container-->
 
	<?php echo do_shortcode('[fontpreview]'); ?>
	
	
		 	
		
		
    	<div class="container">
            <div class="mg_tab_block">
            	<div class="mg_btn_block">
				<a href="<?php the_permalink(); ?>" class="btn btn-primary" >Buy a License</a>
						
							<!--<?php //if ( $product->is_in_stock() ) : ?>

											<?php //do_action( 'woocommerce_before_add_to_cart_form' ); ?>

											<form class="cart" method="post" enctype='multipart/form-data'>
												<?php //do_action( 'woocommerce_before_add_to_cart_button' ); ?>

												<?php
												/*	if(!in_array('14',$catids )) { 
															if ( ! $product->is_sold_individually() )
																woocommerce_quantity_input( array(
																	'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
																	'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
																) );
														}*/
												?>

												<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->id ); ?>" />
												<span class="mg_price_pro"><?php echo $product->get_price_html(); ?></span>
												<button type="submit" class="detail_btn preview_btn"><?php echo $product->single_add_to_cart_text(); ?></button>

												<?php //do_action( 'woocommerce_after_add_to_cart_button' ); ?>
											</form>

											<?php //do_action( 'woocommerce_after_add_to_cart_form' ); ?>
										<?php //else: ?>
										<button title="" id="" disabled="disabled" class="btn mg_sold_out">Add to Cart</button>
										<?php //endif; ?>-->
				
				</div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <ul class="tab_button">
                            <li class="cc_active"><a href="#tab1">Overview</a></li>
                            <li><a href="#tab2">In Use</a></li>
                            <li><a href="#tab3">Licensing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mg_open_tab">
                    <div id="tab1" class="open_tab1">
                    	 <?php $post59 =  get_post(59);
					echo ($post59->post_content);
					?>
                    </div>
                    <div id="tab2" class="open_tab1">
					
					<?php $post52 =  get_post(52);
					echo ($post52->post_content);
					?>
                    </div>
                    <div id="tab3" class="open_tab1">
                    	<?php $post44 =  get_post(44);
					echo ($post44->post_content);
					?>
									
					</div>
								</div>
							</div> 
						</div>
					
					<!--End Container-->
		
		
		
		
		
		
		
		
		
		
		


	
            
			
			
<?php //do_action( 'woocommerce_after_single_product' ); ?>		

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

<!-- #product-<?php the_ID(); ?> -->	

