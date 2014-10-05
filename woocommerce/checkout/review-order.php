<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
	
	<div id="order_review">

									<span class="text05">The Deal</span>
									<div class="mg_deal_block">
                                        	<div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                               			<span class="mg_deal_head"><strong>Product</strong></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_head"><strong>Total</strong></span>
                                                    </div>
                                               </div>
                                            </div> 
                                            
                                            <hr>
                                            
                    	                   
                                          
											
											
											
									<?php
									do_action( 'woocommerce_review_order_before_cart_contents' );

									foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									?>
									<div class="row">
									<div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
									 <strong class="mg_deal_head2">Product</strong>
									 <span class="mg_deal_name"><?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ); ?>
									<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
									<?php echo WC()->cart->get_item_data( $cart_item ); ?></span>
													</div>
                                    </div>
									<div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
													<strong class="mg_deal_head2">Total</strong>
									<span class="mg_deal_name"><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></span>
													</div>
                                    </div>
									</div>
									 <hr>
									<?php
										}
									}

									do_action( 'woocommerce_review_order_after_cart_contents' );
									?>
											
											
											
										
                                            
											
											
											
											<div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php _e( 'Cart Subtotal', 'woocommerce' ); ?></span>
                                                    </div>
                                               </div>
												  <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php wc_cart_totals_subtotal_html(); ?></span>
                                                    </div>
                                               </div>
                                            </div>
											<hr/>
											

											<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
												  <div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
                                                    </div>
                                               </div>
                                            </div>
                                            
                                            <hr>
											<?php endforeach; ?>

											

											<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
												  <div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php echo esc_html( $fee->name ); ?></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php wc_cart_totals_fee_html( $fee ); ?></span>
                                                    </div>
                                               </div>
                                            </div>
                                            
                                            <hr>
											<?php endforeach; ?>

											<?php if ( WC()->cart->tax_display_cart === 'excl' ) : ?>
												<?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
													<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
														  <div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php echo esc_html( $tax->label ); ?></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                                                    </div>
                                               </div>
                                            </div>
                                            
                                            <hr>
													<?php endforeach; ?>
												<?php else : ?>
													  <div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></span>
                                                    </div>
                                               </div>
                                            </div>
                                            
                                            <hr>
												<?php endif; ?>
											<?php endif; ?>

											<?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
												  <div class="row">
													<div class="col-xs-12 col-sm-8 col-md-8">
														<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4">
														<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
														</div>
													</div>
												  </div>
                                            
                                            <hr>
											<?php endforeach; ?>

											<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
											
											<div class="row">
                    	                       <div class="col-xs-12 col-sm-8 col-md-8">
                                               		<div class="mg_deal_block_lft">
                                                        <span class="mg_deal_name order_total"><?php _e( 'Order Total', 'woocommerce' ); ?></span>
                                                    </div>
                                               </div>
                                               <div class="col-xs-12 col-sm-4 col-md-4">
                                               		<div class="mg_deal_block_rgt">
                                               			<span class="mg_deal_name order_total"><?php wc_cart_totals_order_total_html(); ?></span>
                                                    </div>
                                               </div>
                                            </div>

											

										<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
										<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

												<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

												<?php wc_cart_totals_shipping_html(); ?>

												<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

											<?php endif; ?>
											
											
											
											
											
                                        </div>




























	 <span class="text05">Payment method</span>
                                       
	
	<?php do_action( 'woocommerce_review_order_before_payment' ); ?>

	<div id="payment">
		<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="payment_methods methods">
			<?php
				$available_gateways = WC()->payment_gateways->get_available_payment_gateways();
				if ( ! empty( $available_gateways ) ) {

					// Chosen Method
					if ( isset( WC()->session->chosen_payment_method ) && isset( $available_gateways[ WC()->session->chosen_payment_method ] ) ) {
						$available_gateways[ WC()->session->chosen_payment_method ]->set_current();
					} elseif ( isset( $available_gateways[ get_option( 'woocommerce_default_gateway' ) ] ) ) {
						$available_gateways[ get_option( 'woocommerce_default_gateway' ) ]->set_current();
					} else {
						current( $available_gateways )->set_current();
					}

					foreach ( $available_gateways as $gateway ) {
				 			/*if($gateway->chosen==1){
							$color="#F4F4F4";
							}else {
							 $color="";
							}	*/						
						?>
						<li class="payment_method_<?php echo $gateway->id; ?>"   style="background:<?php //echo $color ; ?>;">
							<input id="payment_method_<?php echo $gateway->id; ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
							<label for="payment_method_<?php echo $gateway->id; ?>"><span class="mg_deal_head"></strong><?php echo $gateway->get_title(); ?></strong><span> <?php echo $gateway->get_icon(); ?></label>
							<?php
								if ( $gateway->has_fields() || $gateway->get_description() ) :
									echo '<div class="payment_box payment_method_' . $gateway->id . '" ' . ( $gateway->chosen ? '' : 'style="display:none;"' ) . '>';
									$gateway->payment_fields();
									echo '</div>';
								endif;
							?>
						</li>
						<?php
					}
				} else {

					if ( ! WC()->customer->get_country() )
						$no_gateways_message = __( 'Please fill in your details above to see available payment methods.', 'woocommerce' );
					else
						$no_gateways_message = __( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' );

					echo '<p>' . apply_filters( 'woocommerce_no_available_payment_methods_message', $no_gateways_message ) . '</p>';

				}
			?>
		</ul>
		<?php endif; ?>

		<div class="form-row place-order">

			<noscript><?php _e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?><br/><input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php _e( 'Update totals', 'woocommerce' ); ?>" /></noscript>

			<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>

			<?php do_action( 'woocommerce_review_order_before_submit' ); ?>
			
			
			
			
										<?php if ( wc_get_page_id( 'terms' ) > 0 && apply_filters( 'woocommerce_checkout_show_terms', true ) ) { 
				$terms_is_checked = apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) );
				?>
                                          <div class="mg_deal_box">
                                          <span class="text05">I swear</span>
										
                                          <span class="mg_order_note"> <input type="checkbox" class="input-checkbox" name="terms"  <?php checked( $terms_is_checked, true ); ?> id="terms" />
                                           Yes, I have taken note of the <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'terms' ) ) );?>">Term &amp; Conditions</a> and the applicable <a href="http://witsserver.in/projects/mystile/licence/">License Agreement</a>.
											I have read, understand and accept them both.</span>
                                    
                                         </div>
			
			<?php } ?>

			<?php
			$order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );

			echo apply_filters( 'woocommerce_order_button_html', '<input type="submit" class="place_btn" name="woocommerce_checkout_place_order" style=" margin-top:20px;" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" />' );
			?>

			

			<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		</div>

		<div class="clear"></div>

	</div>
	
	<script>
	jQuery(document).ready(function(){
		jQuery('.payment_methods li').on('click',function(){
				if(jQuery(this).find('.input-radio').is(':checked')){
				jQuery('.payment_methods li').css('background','');
				jQuery(this).css('background','#F4F4F4');
				}
		});
	});	
	</script>

	<?php do_action( 'woocommerce_review_order_after_payment' ); ?>

</div>
