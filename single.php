<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Single Post Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a post ('post' post_type).
 * @link http://codex.wordpress.org/Post_Types#Post
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
	
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
	
	$settings = array(
					'thumb_single' => 'false', 
					'single_w' => 787, 
					'single_h' => 300, 
					'thumb_single_align' => 'alignright'
					);
					
	$settings = woo_get_dynamic_values( $settings );
?>
       
  
    
    	<?php woo_main_before(); ?>
    	
		   <div id="container_block">
            <div class="container">
                <div class="mg_blog_block">
                	<div class="row">
            	        <div class="col-xs-12 col-sm-12 col-md-12">
						<div id="all_blog" class="dt_block_post">
		           
        <?php
        	if ( have_posts() ) { $count = 0;
        		while ( have_posts() ) { the_post(); $count++;
        ?>
				<div class="dt_bp_head">
				<header>
					<div class="content-text"><h1><?php the_title(); ?></h1>
				<span class="text07"><?php the_time( 'M' ); ?> <?php the_time( 'd' ); ?>, <?php the_time( 'o' ); ?>. 
				<?php $tags =  wp_get_post_tags($post->ID);
				
						$i = 0;
						$len = count($tags);	
							foreach ($tags as $tag){ $i++; ?>
								<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ).'tag/'.$tag->slug;?>"><?php 
							   if($i==$len){echo $tag->name."<span class='textc'>.</span>";}else {echo $tag->name."<span class='textc'>,</span>";} ?>
                           </a>
							  <?php } ?>	
									
				
				
				</span>
				</div>
				</header>
				</div>
					<div class="dt_post_content">
					<section class="entry fix">
	                	<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
					</section>
					</div>
			 	
                                
           

				<?php woo_subscribe_connect(); ?>

	        <!--<p>
	            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
	        </p>--><!-- #post-entries -->
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'post', 'both' ) ) ) {
            		//comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
			</article><!-- .post -->             
       	<?php } ?>  
        
						</div>
						</div>
                    </div>	
                </div>
            </div>
        </div>
    <!--End Container-->
		<script>
		jQuery(document).ready(function(){
		jQuery(".menu-item-90").addClass('current_page_item');
		})
		</script>

		
<?php get_footer(); ?>