<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div class="row ">
		<?php do_action( 'woocommerce_before_cart_totals' ); ?>
			<div class="col-xs-12 col-sm-7 col-md-7"></div>
			 <div class="col-xs-12 col-sm-5 col-md-5">
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
						<div class="mg_deal_block_lft">
							<span class="mg_deal_name"><strong><?php _e( 'Subtotal', 'woocommerce' ); ?></strong></span>
																							
						</div>
					  </div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="mg_deal_block_rgt  force-right">
							<span class="mg_deal_name"><?php wc_cart_totals_subtotal_html(); ?></span>
						</div>
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
						<div class="mg_deal_block_lft">
						<?php if ( WC()->cart->coupons_enabled() ) { ?>
															

						<label for="coupon_code"><?php _e( 'Discount', 'woocommerce' ); ?>:</label> 
						<input type="text" name="coupon_code" style="border-top:none;" class="input-text" id="coupon_code" value="" placeholder="<?php _e( 'Enter code', 'woocommerce' ); ?>" /> 
						<input type="submit" class="btn btn-primary" style="display:none;" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

																

						<?php do_action('woocommerce_cart_coupon'); ?>
						<?php  } ?>
						
							
																							
						</div>
					  </div>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="mg_deal_block_rgt  force-right">
							
						</div>
					</div>
				</div>
				
				
				
				
			    <div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="mg_deal_block_lft">
																							
								<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
																								
								<span class="mg_deal_name"><strong>Discount <?php wc_cart_totals_coupon_label( $coupon ); ?></strong></span>
																										
																									
								<?php endforeach; ?>
							</div>
					 </div>
					<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="mg_deal_block_rgt  force-right">
							<?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
																								
							<span class="mg_deal_name"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
																										
																									
							<?php endforeach; ?>
																							
							</div>
					</div>
				</div>
																					
																					
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

		   <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

			<?php endif; ?>
																					
																					
																					
			<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
																					
				<div class="row">
					<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="mg_deal_block_lft">
								<span class="mg_deal_name"><strong><?php echo esc_html( $fee->name ); ?></strong></span>
							</div>
					 </div>
					<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="mg_deal_block_rgt  force-right">
								<span class="mg_deal_name"><?php wc_cart_totals_fee_html( $fee ); ?></span>
							</div>
					 </div>
			</div>
			
		 <?php endforeach; ?>

		<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
		<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
		<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
																							
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8">
					<div class="mg_deal_block_lft">
						<span class="mg_deal_name"><strong><?php echo esc_html( $tax->label ); ?></strong></span>
				    </div>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<div class="mg_deal_block_rgt  force-right">
						<span class="mg_deal_name"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
					</div>
				</div>
			</div>
			 
			<?php endforeach; ?>
			<?php else : ?>
																						
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-8">
					<div class="mg_deal_block_lft">
						<span class="mg_deal_name"><strong><?php echo esc_html( WC()->countries->tax_or_vat() ); ?><a  class="show_tooltip" title="Apply for 0% VAT at Checkout." href="javascript:void(0);">?</a></strong></span>
					</div>
				 </div>
				 <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="mg_deal_block_rgt  force-right">
					    <span class="mg_deal_name"><?php echo wc_cart_totals_taxes_total_html(); ?></span>
					</div>
				 </div>
			</div>
																				
			<?php endif; ?>
			<?php endif; ?>												
																																					
		   <?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
																						
			<div class="row">
		      <div class="col-xs-12 col-sm-8 col-md-8">
				<div class="mg_deal_block_lft">
					<span class="mg_deal_name"><strong><?php wc_cart_totals_coupon_label( $coupon ); ?></strong></span>
				</div>
			   </div>
			  <div class="col-xs-12 col-sm-4 col-md-4">
					<div class="mg_deal_block_rgt  force-right">
						<span class="mg_deal_name"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
					</div>
			  </div>
			</div>
			
		   <?php endforeach; ?>

			<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

			<hr>																		
			<div class="row">
			 <div class="col-xs-12 col-sm-8 col-md-8">
				<div class="mg_deal_block_lft">
					<span class="mg_deal_name order_total"><strong><?php _e( 'Order total', 'woocommerce' ); ?></strong></span>
				</div>
			</div>
			 <div class="col-xs-12 col-sm-4 col-md-4">
				<div class="mg_deal_block_rgt  force-right">
				   <span class="mg_deal_name order_total"><?php wc_cart_totals_order_total_html(); ?></span>
				</div>
			 </div>
			</div>
			
		   <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
																				
																				
																				
																				
			<?php if ( WC()->cart->get_cart_tax() ) : ?>
			<p><small><?php

			$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
			? sprintf( ' ' . __( ' (taxes estimated for %s)', 'woocommerce' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'woocommerce' ) )
			: '';

		    printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

		   ?></small></p>
		   <?php endif; ?>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>

																				
	</div>
</div>







																					
																			
																			