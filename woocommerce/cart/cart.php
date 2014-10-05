<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

global $post, $product;


wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

	









 <div class="mg_checkout_block">
                    <div class="row">
                    	<div class="col-xs-12 col-sm-12 col-md-12">  
                        	<div class="mg_checkout_block_in">
                        		<h1>An offer you can't refuse:</h1>
                                   <div class="mg_deal_block" style="background:#fff; padding:0px;">
								   
											<form action="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" method="post">

											<?php do_action( 'woocommerce_before_cart_table' ); ?>
                                        	<div class="row">
                    	                       <div class="col-xs-12 col-sm-3 col-md-4">
                                               		<div class="mg_deal_block_lft">
                                               			<span class="mg_deal_head"><strong>Product</strong></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-5 col-md-4">
                                               		<div class="mg_deal_block_lft">
                                               			<span class="mg_deal_head"><strong>&nbsp;</strong></span>
                                                    </div>
                                               </div>
                                                <div class="col-xs-12 col-sm-2 col-md-2">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_head"><strong>Kuantity</strong></span>
                                                    </div>
                                               </div>
                                                <div class="col-xs-12 col-sm-2 col-md-2">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_head"><strong>Prices</strong></span>
                                                    </div>
                                               </div>
                                            </div>
                                            <hr>
											
											<?php
											foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
												$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
												$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

												if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
													?>
                                            <div class="row">
                    	                       <div class="col-xs-12 col-sm-3 col-md-4">
                                               		<div class="mg_deal_block_lft">
                                               			<strong class="mg_deal_head2">Product images</strong>
                                                        <span class="mg_cart_img">
														<?php
														$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(array(150,180)), $cart_item, $cart_item_key );

														if ( ! $_product->is_visible() )
															echo $thumbnail;
														else
															echo $thumbnail;
															//printf( '<a href="%s">%s</a>', $_product->get_permalink(), $thumbnail );
														?>
														</span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-5 col-md-4">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name">
														
														<?php
															if ( ! $_product->is_visible() )
																echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
															else
																echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" style="color:#585D60">%s</a>', $_product->get_permalink(), $_product->get_title() ), $cart_item, $cart_item_key );

															// Meta data
															echo WC()->cart->get_item_data( $cart_item );

															// Backorder notification
															if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) )
																echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
														?>
														</span>
                                                    </div>
                                               </div>
                                                <div class="col-xs-12 col-sm-2 col-md-2">
                                               		<div class="mg_deal_block_rgt">
                                                        <strong class="mg_deal_head2">Kuantity</strong>
                                               			<span class="mg_deal_name">
														
														<?php
																
																$terms = get_the_terms( $product_id, 'product_cat' );
																$catids = array();
																foreach ($terms as  $key => $term) {
																$catids[] = $term->term_id;	
																}
														
															
															 if(in_array('14',$catids )) { 
																if ( $_product->is_sold_individually() ) {
																	$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
																}
															 }
															 else{
														
																if ( $_product->is_sold_individually() ) {
																	$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
																} else {
																	$product_quantity = woocommerce_quantity_input( array(
																		'input_name'  => "cart[{$cart_item_key}][qty]",
																		'input_value' => $cart_item['quantity'],
																		'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
																		'min_value'   => 1,
																	), $_product, false );
																}
																
																echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
															}

															
														?>
														<?php
															echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove_pro" style=" " title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key );
														?>
														</span>
                                                    </div>
                                               </div>
                                                <div class="col-xs-12 col-sm-2 col-md-2">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_head2"><strong>Total</strong></span>
                                                        <span class="mg_deal_name">
														<?php
															$price =  apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
															echo strip_tags($price);
														?>
														</span>
                                                    </div>
                                               </div>
                                            </div>
                                            <hr>
											
											<?php
												}
											}

											do_action( 'woocommerce_cart_contents' );
											?>
												
										   
										   
										   
											
											
											
																			
																			
											<?php do_action( 'woocommerce_after_cart_contents' ); ?>
											<?php do_action( 'woocommerce_after_cart_table' ); ?>

										
								 
								 
								 
								 	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

									<?php woocommerce_cart_totals(); ?>

									<?php //woocommerce_shipping_calculator(); ?>
									<div class="row">
												 <div class="col-xs-12 col-sm-7 col-md-6">
                                               		
                                               </div>
                                              
                                               
                                                <div class="col-xs-12 col-sm-5 col-md-6">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_head3">
														<input type="submit" class="detail_btn" style="" name="proceed" value="<?php _e( 'Check Out', 'woocommerce' ); ?>" /> 
														<input type="submit" class="detail_btn" style="margin-right:10px;" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /> 
														
													
															<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>

															<?php wp_nonce_field( 'woocommerce-cart' ); ?>
														</span>
                                                    </div>
                                               </div>
                                            </div>
                                            
											
											
												</form>								
                                 </div>
								 
								 
								 
								 
                            </div>
                        </div>
                    </div> 
					
                </div>


<?php do_action( 'woocommerce_after_cart' ); ?>