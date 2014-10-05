<?php
/**
 * Edit account form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php wc_print_notices(); ?>

<form action="" method="post">

	<p class="form-row form-row-first">
	
		<input type="text" class="input-text col-xs-6" name="account_first_name" placeholder="<?php _e( 'First name', 'woocommerce' ); ?>*" id="account_first_name" value="<?php esc_attr_e( $user->first_name ); ?>" />
	</p>
	<p class="form-row form-row-last">
		
		<input type="text" class="input-text col-xs-6" name="account_last_name" placeholder="<?php _e( 'Last name', 'woocommerce' ); ?>*" id="account_last_name" value="<?php esc_attr_e( $user->last_name ); ?>" />
	</p>
	<p class="form-row form-row-wide">
		
		<input type="email" class="input-text col-xs-6" name="account_email" placeholder="<?php _e( 'Email address', 'woocommerce' ); ?>*" id="account_email" value="<?php esc_attr_e( $user->user_email ); ?>" />
	</p>
	<p class="form-row form-row-first">
		
		<input type="password" class="input-text col-xs-6" name="password_1"  placeholder="<?php _e( 'Password (leave blank to leave unchanged)', 'woocommerce' ); ?>" id="password_1" />
	</p>
	<p class="form-row form-row-last">
	
		<input type="password" class="input-text col-xs-6" name="password_2" id="password_2"  placeholder="<?php _e( 'Confirm new password', 'woocommerce' ); ?>"  />
	</p>
	<div class="clear"></div>

	<p><input type="submit" class="button" name="save_account_details" value="<?php _e( 'Save changes', 'woocommerce' ); ?>" /></p>

	<?php wp_nonce_field( 'save_account_details' ); ?>
	<input type="hidden" name="action" value="save_account_details" />
</form>