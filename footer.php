<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;


?>




		 <!--Start Footer-->
    	<div id="mg_footer_block">
        	<div class="row">
            	<div class="col-xs-12 col-sm-6 col-md-6">
                    <ul class="footer_social_link">
                    	<?php
						$logo = esc_url( get_template_directory_uri() . '/images/logo.png' );



						if (  is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
					?>
						<li>
						<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( get_bloginfo( 'description' ) ); ?>">
							<img src="<?php echo $logo; ?>" alt="<?php esc_attr( get_bloginfo( 'name' ) ); ?>" />
						</a></li>
                        <li><a href="<?php echo  $woo_options['woo_connect_twitter'];  ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/tw.png" alt=""></a></li>

                        <li><a href="<?php echo  $woo_options['woo_connect_facebook'];  ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/fb.png" alt=""></a></li>
                        <li class="mg_mailing_btn"><a href="javascript:void();" id="clickme">Join our mailing list</a></li>
                    </ul>


					<div class="clear"></div>
                    <div id="mg_subscribe">
                      <?php  //echo do_shortcode('[mc4wp_form]'); ?>
					     <?php  echo do_shortcode('[epm_mailchimp]'); ?>

                    </div>


                </div>



                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="reading_experience">Reading experience: <a href="javascript:void(0);" id="day" class="theme_change">day</a> <a href="javascript:void(0);" id="night" class="theme_change">night</a></div>
                </div>
            </div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="mg_copyright">

					 &copy; <?php echo date( 'Y' ); ?> <?php bloginfo(); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?>





					<a href="<?php echo bloginfo('url')."/credits/";?>"  <?php if(is_page('102')){ ?>class="active"<?php } ?>>Credits</a>   <a href="<?php echo bloginfo('url')."/terms/";?>" <?php if(is_page('42')){ ?>class="active"<?php } ?>>Terms &amp; Conditions</a>   <a href="<?php echo bloginfo('url')."/privacy-policy/";?>"  <?php if(is_page('100')){ ?>class="active"<?php } ?>>Privacy Policy</a>   <a href="#">Dutch</a>   <a href="#">English</a></div>
                </div>
			</div>
  </div> <!--End Footer-->
</div> <!-- End Wrapper -->

<?php woo_post_after(); ?>

<?php  $url =  get_bloginfo('stylesheet_directory');?>

<?php wp_footer(); ?>
<?php woo_foot(); ?>
<div class="loader_full"></div>

</body>
</html>
