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
                        <li><a href="<?php echo  $woo_options['woo_connect_twitter'];  ?>" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/06/tw.png" alt=""></a></li>
						
                        <li><a href="<?php echo  $woo_options['woo_connect_facebook'];  ?>" target="_blank"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/2014/06/fb.png" alt=""></a></li>
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
                    <div class="mg_copy_in">					
					 &copy; <?php echo date( 'Y' ); ?> <?php bloginfo(); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?>					
					<?php 
					$items = wp_get_nav_menu_items('footer');
					foreach($items as $menu_items){ ?>
					<a href="<?php echo $menu_items->url; ?>" <?php if(is_page( $menu_items->object_id)){ ?>class="active"<?php } ?>><?php echo $menu_items->title; ?></a> 
					<?php } ?>
                    </div>
                </div>
			</div>	
        </div>
    <!--End Footer-->
    















<?php woo_post_after(); ?>

<?php  $url =  get_bloginfo('stylesheet_directory');?>
<script src="<?php echo $url.'/js/jquery-ui.js'; ?>" type="text/javascript"></script>
<script src="<?php echo $url.'/js/custom.js'; ?>" type="text/javascript"></script>
<script type="text/javascript">
/*user define css*/
			
			
	
	
			var url = "<?php bloginfo('stylesheet_directory'); ?>";
			jQuery(".theme_change").on('click',function(){
		  
		  
			  var css =jQuery(this).attr('id');
			 
			  jQuery('body').removeClass('day');
			  jQuery('body').removeClass('night')
			  jQuery('body').addClass(css);
			  if(css=='day'){
			  jQuery('.mg_submenu_block_head').css('background','#4289BD');
			  }else{
			   jQuery('.mg_submenu_block_head').css('background','#F26D7E');
			  }
			  jQuery('.theme_change').removeClass('active');
			  jQuery(this).addClass('active');
			 
			   jQuery.ajax({
				  url:url+'/savesession.php?css='+css,
				  type:'GET',
				  success:function(html){
				  }
				  })
			  
		  });
	
	
	/*user define css*/
	
</script>
<script type="text/javascript">
/*user define css*/
			
			jQuery(document).ready(function(){
			var url = "<?php bloginfo('stylesheet_directory'); ?>";
			var schkurl ="<?php if(isset($_SESSION['url_ref']) ){echo $_SESSION['url_ref'];} else echo 'none';?>";
		
			
						var checkchild = jQuery('.sub-menu li').is('.'+schkurl);
						if(checkchild==false){
						var currentclickedurl = jQuery('.'+schkurl).attr('class');
						}else{
						var currentclickedurl = jQuery("#main-nav>li.current-menu-item").attr('class');
						}
						
						
							/*cliking parent menu*/
							if(currentclickedurl && checkchild==false){
							
							currentclickedurl= currentclickedurl.replace(' parent','');
							var allclass = currentclickedurl.split(' ');
							jQuery("#main-nav>li").removeClass('current-menu-parent').removeClass(' current_page_parent');
							jQuery('.'+allclass[allclass.length-1]).addClass('current-menu-parent').addClass('current_page_parent');
							var submenun= jQuery('.'+allclass[allclass.length-1]).find("ul.sub-menu").html();
							jQuery(".mg_submenu").html(submenun);
							}else if(schkurl!='none'){
							/*cliking parent submenu*/
										
										jQuery("#main-nav>li").removeClass('current-menu-parent').removeClass('current_page_parent');
										jQuery(".sub-menu>li").removeClass('current-menu-parent').removeClass('current_page_parent');
										jQuery(".mg_submenu>li").removeClass('current-menu-parent').removeClass('current_page_parent');
										jQuery("#main-nav>li").removeClass('current-menu-item').removeClass('current_page_item');
										jQuery(".sub-menu>li").removeClass('current-menu-item').removeClass('current_page_item');
										jQuery(".mg_submenu>li").removeClass('current-menu-item').removeClass('current_page_item');
										
										jQuery('.'+schkurl).addClass('current-menu-item').addClass('current_page_item');
										jQuery('.'+schkurl).parents('li').addClass('current-menu-parent').addClass('current_page_parent');
										
										
										var submenun= jQuery('.'+schkurl).parents('li').find("ul.sub-menu").html();
																jQuery(".mg_submenu").html(submenun);
										
							
							
							
							}else{
							
							/*direct sub menu*/
							
															var currentclickedurl = jQuery("#main-nav>li.current-menu-item").attr('class');
															if(currentclickedurl){
															currentclickedurl= currentclickedurl.replace(' parent','');
															var allclass = currentclickedurl.split(' ');
															jQuery("#main-nav>li").removeClass('current-menu-parent').removeClass(' current_page_parent');
															jQuery('.'+allclass[allclass.length-1]).addClass('current-menu-parent').addClass('current_page_parent');
															var submenun= jQuery('.'+allclass[allclass.length-1]).find("ul.sub-menu").html();
															jQuery(".mg_submenu").html(submenun);
															
															}else{
															
															var submneudirect = jQuery(".mg_submenu").find('li.current-menu-item').attr('class');
															submneudirect= submneudirect.replace(' parent','');
															var allclasssub = submneudirect.split(' ');
															jQuery("#main-nav>li").removeClass('current-menu-parent').removeClass('current_page_parent');
															jQuery('.'+allclasssub[allclasssub.length-1]).parents('li').addClass('current-menu-parent').addClass('current_page_parent');
															var submenun= jQuery('.'+allclasssub[allclasssub.length-1]).find("ul.sub-menu").html();
															jQuery(".mg_submenu").html(submenun);
															}
							
															
							
							}
							
							
							jQuery(".mg_submenu li a, #main-nav li a").click(function(){
							
							jQuery(this).parent('li').removeClass('current-menu-item').removeClass('current_page_item').removeClass('parent').removeClass('current_page_parent').removeClass('current-menu-parent');
							var currentclickedurl = jQuery(this).parent('li').attr('class');
							if(currentclickedurl){
							//currentclickedurl= currentclickedurl.replace(' parent','').replace(' parent',' current-menu-item').replace(' parent',' current_page_item');
							var allclass = currentclickedurl.split(' ');
														jQuery.ajax({
														  url:url+'/savesessionm.php?url='+allclass[allclass.length-1],
														  type:'GET',
														  async:false,
														  success:function(html){
														  }
														  })
							
							}
							
						
							})
				
			
			
			})
	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-543657-7', 'typemafia.com');
  ga('send', 'pageview');

</script>


<?php wp_footer(); ?>
<?php woo_foot(); ?>

</div>
</body>
</html>