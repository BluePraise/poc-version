
<?php
/**
 * Template Name: login template
 *
 * This template is a full-width version of the page.php template file. It removes the sidebar area.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
  <div id="container_block">
    	<div class="container">     


<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>
		
		<div class="mg_login_block">
		  <div class="mg_login_block_in">
		<h1><?php _e( 'Login', 'woocommerce' ); ?></h1>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			
				<input type="text" class="col-xs-12" name="username" placeholder="<?php _e( 'Username or email address', 'woocommerce' ); ?>*" id="username" />
			
			
				
				<input class="col-xs-12" type="password" name="password" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>*" id="password" />
			

			<?php do_action( 'woocommerce_login_form' ); ?>

			
			
			
			
			<div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
							<input name="rememberme" type="checkbox" id="rememberme" style="float:left;" value="forever" /> 
							<span style="display: block; margin-top: 5px;" class="lebel_text"> <?php _e( 'Remember me', 'woocommerce' ); ?></span>
                               
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="mg_login_btn">
								<?php wp_nonce_field( 'woocommerce-login' ); ?>
							<input type="submit" class="btn btn-primary loginbtn" name="login" value="Go!" /> 
                                 
                                </div>
                            </div>
            </div>
           <div class="clear"></div>
			</div>
			 <div class="mg_lost_pass">
               <a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost your password?', 'woocommerce' ); ?></a>
              </div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>
		</div>
<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2">

		<h1><?php _e( 'Register', 'woocommerce' ); ?></h1>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
	
				<p class="form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="input-text" name="password" id="reg_password" value="<?php if ( ! empty( $_POST['password'] ) ) echo esc_attr( $_POST['password'] ); ?>" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="left:-999em; position:absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'register' ); ?>
				<input type="submit" class="button" name="register" value="<?php _e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
		
		
</div>
</div>		
<?php get_footer(); ?>