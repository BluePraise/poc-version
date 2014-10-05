<?php
/**
 * Checkout shipping information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="woocommerce-shipping-fields">
	<?php if ( WC()->cart->needs_shipping_address() === true ) : ?>

		<?php
			if ( empty( $_POST ) ) {

				$ship_to_different_address = get_option( 'woocommerce_ship_to_billing' ) === 'no' ? 1 : 0;
				$ship_to_different_address = apply_filters( 'woocommerce_ship_to_different_address_checked', $ship_to_different_address );

			} else {

				$ship_to_different_address = $checkout->get_value( 'ship_to_different_address' );

			}
			
		?>

		
		
		<span class="text05">Shipping Address</span>
		
			
		<span class="mg_order_note" id="ship-to-different-address">
	
		<input type="checkbox" value="1" name="check_address" id="check_address" <?php checked( $ship_to_different_address, 0 ); ?>>
	<input id="ship-to-different-address-checkbox" class="input-checkbox hide" type="checkbox" name="ship_to_different_address" value="1" />
		<?php _e( ' Ship to billing address', 'woocommerce' ); ?>
		</span>
		
		

		<div class="shipping_address">

			<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>

			<?php foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) : ?>

				<?php 
				if($key==shipping_country){
				woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
				}				?>

			<?php endforeach; ?>
			
			<div class="mg_left_input">
			<input type="text" value="" placeholder="First name*" id="shipping_first_name" name="shipping_first_name" class="input-text col-xs-12 ">
			</div>
			<div class="mg_rgt_input">
			<input type="text" value="" placeholder="Last name*" id="shipping_last_name" name="shipping_last_name" class="input-text col-xs-12 ">
			</div>
			<div class="mg_mid_input">
			<input type="text" value="" placeholder="Company name (optional)" id="shipping_company" name="shipping_company" class="input-text col-xs-12">
			</div>
			<div class="mg_mid_input">
			<input type="text" value="" placeholder="Address*" id="shipping_address_1" name="shipping_address_1" class="input-text col-xs-12">
			</div>
			<div class="mg_mid_input">
			<input type="text" value="" placeholder="Address (optional)" id="shipping_address_2" name="shipping_address_2" class="input-text col-xs-12">
			</div>
			<div class="mg_mid_input">
			<input type="text" value="" placeholder="Town / City*" id="shipping_city" name="shipping_city" class="input-text col-xs-12">
			</div>
			<div class="mg_mid_input">
			<input type="text" id="shipping_state" name="shipping_state" placeholder="State / County" value="" class="input-text col-xs-12">
			</div>
			<div class="mg_mid_input">
			<input type="text" value="" placeholder="Postcode / Zip*" id="shipping_postcode" name="shipping_postcode" class="input-text col-xs-12">
			</div>
			
			
			

			<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

		</div>

	<?php endif; ?>

	
</div>

	<script>
	
		jQuery(document).ready(function(){
	
	
					/*jQuery('#ship-to-different-address').on('click',function(){
					
					if(jQuery(this).find('#ship-to-different-address-checkbox').is(':checked')){
					jQuery(".shipping_address").removeClass('show');
					jQuery(".shipping_address").addClass('hide');
					}else{

					jQuery(".shipping_address").removeClass('hide');
					jQuery(".shipping_address").addClass('show');
					
					}
					
					})
	
	
					if(jQuery('#ship-to-different-address-checkbox').is(':checked')){

					jQuery(".shipping_address").hide();
					jQuery(".shipping_address").removeClass('show');
					jQuery(".shipping_address").addClass('hide');
					
					}*/
					if(jQuery('#check_address').is(':checked')){

					jQuery(".shipping_address").hide();
					jQuery(".shipping_address").removeClass('show');
					jQuery(".shipping_address").addClass('hide');
					
					}
					
					
					jQuery('#check_address').on('click',function(){
					
					if(jQuery('#check_address').is(':checked')){
					jQuery(".shipping_address").removeClass('show');
					jQuery(".shipping_address").addClass('hide');
					jQuery('#ship-to-different-address-checkbox').attr('checked', false);
					}else{

					jQuery(".shipping_address").removeClass('hide');
					jQuery(".shipping_address").addClass('show');
					jQuery('#ship-to-different-address-checkbox').attr('checked', true);
					
					}
					
					})
	
	
	});
	</script>
	