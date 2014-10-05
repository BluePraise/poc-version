<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="woocommerce-billing-fields">
	<?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

		 <span class="text05"><?php _e( 'Billing Address', 'woocommerce' ); ?></span>

	<?php else : ?>

		 <span class="text05"><?php _e( 'Billing Address', 'woocommerce' ); ?></span>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<?php 
	
	
	foreach ( $checkout->checkout_fields['billing'] as $key => $field ) : ?>

		<?php 
		
		if($key==billing_country){
		woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		} ?>

	<?php endforeach; ?>
	
	<div class="mg_left_input">
	<input type="text" value="" placeholder="First name*" id="billing_first_name" name="billing_first_name" class="input-text col-xs-12 ">
	</div>
	<div class="mg_rgt_input">
	<input type="text" value="" placeholder="Last name*" id="billing_last_name" name="billing_last_name" class="input-text col-xs-12 ">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Company name (optional)" id="billing_company" name="billing_company" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Address*" id="billing_address_1" name="billing_address_1" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Address (optional)" id="billing_address_2" name="billing_address_2" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Town / City*" id="billing_city" name="billing_city" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" id="billing_state" name="billing_state" placeholder="State / County" value="" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Postcode / Zip*" id="billing_postcode" name="billing_postcode" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="gerben@typemafia.com*" id="billing_email" name="billing_email" class="input-text col-xs-12">
	</div>
	<div class="mg_mid_input">
	<input type="text" value="" placeholder="Phone*" id="billing_phone" name="billing_phone" class="input-text col-xs-12">
	</div>

	<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>

	<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

		<?php if ( $checkout->enable_guest_checkout ) : ?>

			<p class="form-row form-row-wide create-account">
				<span class="text05"><input style="height:.61em;"class="input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true) ?> type="checkbox" name="createaccount" value="1" /> <?php _e( 'Create an account?', 'woocommerce' ); ?></span>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( ! empty( $checkout->checkout_fields['account'] ) ) : ?>

			<div class="create-account">

				<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

				<?php foreach ( $checkout->checkout_fields['account'] as $key => $field ) : ?>

					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

				<?php endforeach; ?>

				<div class="clear"></div>

			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

	<?php endif; ?>
</div>