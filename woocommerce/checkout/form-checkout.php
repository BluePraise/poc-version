<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

//wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">
				<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
                <div class="mg_checkout_block">
                    <div class="row">
					
					
				
					
                    	<div class="col-xs-12 col-sm-6 col-md-6">  
                        	<div class="mg_checkout_block_in">
                        		<h1>Almost yours.</h1>
                               
                              
                                		<?php do_action( 'woocommerce_checkout_billing' ); ?>
										
										<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

										<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) : ?>

											<?php if ( ! WC()->cart->needs_shipping() || WC()->cart->ship_to_billing_address_only() ) : ?>

												<h2><?php _e( 'Additional Information', 'woocommerce' ); ?></h2>

											<?php endif; ?>

											<?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) : ?>

												<?php //woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

											<?php endforeach; ?>
										<p id="order_comments_field" class="form-row notes woocommerce-validated">
										<label class="" for="order_comments">Order Notes</label>
										<input type="text" id="order_comments" class="input-text col-xs-12 " placeholder="Notes about your order, e.g. special notes for delivery." name="order_comments">
										</p>	
										<span class="mg_order_note">
										<strong>Order note (optional):</strong>
										Please ship after Christmas cause I'm away from home. Thanks! Speak soon, best wishes, Gerben
										</span>

										<?php endif; ?>
										<span class="text05">Apply for 0% VAT</span>
											<div class="mg_mid_input">
											<span class="mg_order_note">If you are in the EU and have a valid EU VAT registration number, please enter it below.</span>
											</div>
											<div class="mg_mid_input">
											<input class="col-xs-12 input-text" type="text" placeholder="e.g NL316158745842652 (optional)" id="vat_number" name="vat_number">
											
											</div>
											<div class="clear"></div>

										<?php //do_action( 'woocommerce_after_order_notes', $checkout ); ?>
																		
                                        <span class="text05">Who's this font stuff for?</span>
                                        <span class="mg_order_note">Please enter the name of the person or company that the font will be officially be licensed to.</span>
                                        <div class="mg_mid_input">
 
											<input type="text" value="" placeholder="Licence Owner (optional)" id="Licence_owner" name="Licence_owner" class="input-text col-xs-12">
                                        </div>
                                        
                                        <div class="clear"></div>
										
										<?php do_action( 'woocommerce_checkout_order_review' ); ?>
                                        
                                        
                                       
                                         
                               
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-6">  
                        	<div class="mg_checkout_block_in">
                        		<h1>Or somebody's else?</h1>
								   <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                            </div>
                        </div>
						
                    </div> 
                </div>
				
	<?php endif; ?>			
	

</form>

<?php //do_action( 'woocommerce_after_checkout_form', $checkout ); ?>				