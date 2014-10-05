<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

$page_title = ( $load_address === 'billing' ) ? __( 'Billing Address', 'woocommerce' ) : __( 'Shipping Address', 'woocommerce' );

get_currentuserinfo();
?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

	<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>

	<form method="post">

		<h3><?php echo apply_filters( 'woocommerce_my_account_edit_address_title', $page_title ); ?></h3>

		<?php foreach ( $address as $key => $field ) : ?>

			<?php //woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); 
			
			if($key==billing_country || $key==shipping_country  ){
	woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] ); 
		}

		?>
		<?php endforeach; ?>
		
		<?php 
		
		
		if($page_title=="Billing Address") {?>
		
		<div class="mg_left_input col-xs-12">
	<input type="text" value="" placeholder="First name*" id="billing_first_name" name="billing_first_name" class="input-text col-xs-6 ">
	</div>
	<br/>
	<div class="mg_rgt_input col-xs-12">
	<input type="text" value="" placeholder="Last name*" id="billing_last_name" name="billing_last_name" class="input-text col-xs-6 ">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Company name (optional)" id="billing_company" name="billing_company" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Address*" id="billing_address_1" name="billing_address_1" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Address (optional)" id="billing_address_2" name="billing_address_2" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Town / City*" id="billing_city" name="billing_city" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" id="billing_state" name="billing_state" placeholder="State / County" value="" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Postcode / Zip*" id="billing_postcode" name="billing_postcode" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="gerben@typemafia.com*" id="billing_email" name="billing_email" class="input-text col-xs-6">
	</div>
	<div class="mg_mid_input col-xs-12">
	<input type="text" value="" placeholder="Phone*" id="billing_phone" name="billing_phone" class="input-text col-xs-6">
	</div>
	<?php } else { ?>
	<div class="mg_left_input col-xs-12">
			<input type="text" value="" placeholder="First name*" id="shipping_first_name" name="shipping_first_name" class="input-text col-xs-6 ">
			</div>
			<div class="mg_rgt_input col-xs-12">
			<input type="text" value="" placeholder="Last name*" id="shipping_last_name" name="shipping_last_name" class="input-text col-xs-6 ">
			</div>
			<div class="mg_mid_input col-xs-12">
			<input type="text" value="" placeholder="Company name (optional)" id="shipping_company" name="shipping_company" class="input-text col-xs-6">
			</div>
			<div class="mg_mid_input col-xs-12">
			<input type="text" value="" placeholder="Address*" id="shipping_address_1" name="shipping_address_1" class="input-text col-xs-6">
			</div>
			<div class="mg_mid_input col-xs-12">
			<input type="text" value="" placeholder="Address (optional)" id="shipping_address_2" name="shipping_address_2" class="input-text col-xs-6">
			</div>
			<div class="mg_mid_input col-xs-12">
			<input type="text" value="" placeholder="Town / City*" id="shipping_city" name="shipping_city" class="input-text col-xs-6">
			</div>
			<div class="mg_mid_input col-xs-12">
			<input type="text" id="shipping_state" name="shipping_state" placeholder="State / County" value="" class="input-text col-xs-6">
			</div> 
			<div class="mg_mid_input col-xs-12">
			<input type="text" value="" placeholder="Postcode / Zip*" id="shipping_postcode" name="shipping_postcode" class="input-text col-xs-6">
			</div>
	<?php } ?>
		
		
		

		<p>
			<input type="submit" class="button" name="save_address" value="<?php _e( 'Save Address', 'woocommerce' ); ?>" />
			<?php wp_nonce_field( 'woocommerce-edit_address' ); ?>
			<input type="hidden" name="action" value="edit_address" />
		</p>

	</form>

<?php endif; ?>