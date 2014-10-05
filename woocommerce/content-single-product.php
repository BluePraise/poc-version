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
?>
<style>
.mg_price_pro ins {
text-decoration:none;
}

.mg_price_pro del{
display:none;
} 
</style>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		//do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
		//	do_action( 'woocommerce_single_product_summary' );
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
		

	</div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		//do_action( 'woocommerce_after_single_product_summary' );
	?>






 <div class="row">
            	<div class="col-xs-12 col-sm-6 col-md-6">
                	<div class="mg_shop_product">
                    	<?php the_post_thumbnail();?>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                	<div class="mg_shop_product">
                    	<h1><?php the_title();?></h1>
                        <span class="text06"><?php echo strip_tags(get_the_content());?></span>
						
						<?php if(!in_array('14',$catids )) { ?>
                        <span class="text05">Details</span>
                        <ul class="mg_dimation_list">
                        	<li>Afmeting: 	<?php echo get_post_meta( get_the_ID(), 'Afmeting', true );?></li>
                            <li>Sloop:	<?php echo get_post_meta( get_the_ID(), 'Sloop', true );?></li>
                            <li>Material:	<?php echo get_post_meta( get_the_ID(), 'Material', true );?></li>
                            <li>Kleur:	<?php echo get_post_meta( get_the_ID(), 'Kleur', true );?></li>
                            <li>Model:	<?php echo get_post_meta( get_the_ID(), 'Model', true );?></li>
                            <div class="clear"></div>
                        </ul>
						<?php if(!empty($size)){ ?>
                        <span class="text05">Select yours</span>
						<?php } 
								}
								?>
                        <div class="mg_size_block">
						
						<?php if(!in_array('14',$catids )) { ?>
						<?php if(!empty($color) && !empty($size)){ ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                	<div class="mg_size_block_in">
                                    	<span>Size</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                	<div class="mg_size_block_in">
                                        <select name="size" class="col-xs-12">
											<?php
											foreach ( $size as $sizes ) {
											echo '<option  value="'.$sizes->name.'">'.$sizes->name.'</option>'; 
											}
											?>
                                            
                             
                                        </select>
                                    </div>
                                </div>
                            </div>
							<?php } ?>
							<?php } ?>
							
							<?php if(!in_array('14',$catids )) { ?>
							<?php if(!empty($color)){ ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                	<div class="mg_size_block_in">
                                    	<span>Colour</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8">
                                	<div class="mg_size_block_in">
                                        <select name="color" class="col-xs-12">
                                            <?php
											foreach ( $color as $colors ) {
											echo '<option  value="'.$colors->name.'">'.$colors->name.'</option>'; 
											}
											?>
                                        </select>
                                        <div class="clear"></div>
                                       
                                    </div>
                                </div>
                            </div>
							<?php }
								}
							if ( $product->is_in_stock()) {?>
                             <span class="mg_instock">In stock.</span>
							 <?php } else { ?>
							 <span class="mg_instock_out">Sold out.</span>
							 <?php } ?>
                            <div class="mg_price_block">
                            	<div class="row">
                                	<div class="col-xs-12 col-sm-12 col-md-12">
                                    
										
										<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
											
											<?php if ( $product->is_in_stock() ) : ?>
											<span class="mg_price_pro"><?php echo $product->get_price_html(); ?></span>
											<?php else: ?>
											<span class="mg_price_pro mg_price_pro_out"><?php echo $product->get_price_html(); ?></span>
											<?php endif; ?>
											<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
											<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
											<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

										</div>
										
										
                                        <div class="mg_btn_block">
										
										<?php if ( $product->is_in_stock() ) : ?>

											<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

											<form class="cart" method="post" enctype='multipart/form-data'>
												<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

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

												<button type="submit" class="detail_btn"><?php echo $product->single_add_to_cart_text(); ?></button>

												<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
											</form>

											<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
											</div>
											<div class="clear"></div>
                                        <span class="mg_instock">Pay secure with your credit card</span>
										<?php else: ?>
										<button title="" id="" disabled="disabled" class="btn mg_sold_out" style="color:#fff!important;">Unavailable</button>
										</div>
										<div class="clear"></div>
                                        <span class="mg_instock" style="color:#8B8C90">Too late my friend. Please contact us for possible restock.</span>
										<?php endif; ?>
										
                                    </div>	
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
			
            <div class="mg_large_pro_block">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                       <?php the_post_thumbnail('full');?>
                    </div>	
                </div>
            </div> 

			
			
<?php //do_action( 'woocommerce_after_single_product' ); ?>		

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->	