<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * The default template for displaying content
 */

	global $woo_options;
 
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */

 	$settings = array(
					'thumb_w' => 787, 
					'thumb_h' => 300, 
					'thumb_align' => 'aligncenter'
					);
					
	$settings = woo_get_dynamic_values( $settings );
 
?>


							
							 

	
		
			<header>
				<h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<span class="text07"><?php the_time( 'M' ); ?> <?php the_time( 'd' ); ?>, <?php the_time( 'o' ); ?>. 
				<?php $tags =  wp_get_post_tags($post->ID);
						$i = 0;
						$len = count($tags);	
							foreach ($tags as $tag){ $i++; ?>
								<a href="javasript:void(0)"><?php 
							   if($i==$len){echo $tag->name."<span class='textc'>.</span>";}else {echo $tag->name."<span class='textc'>,</span>";} ?>
                           </a>
							  <?php } ?>	
									
				
				
				</span>
			
			</header>
	
			<section class="entry">
			<?php if ( isset( $woo_options['woo_post_content'] ) && $woo_options['woo_post_content'] == 'content' ) { the_content( __( 'Continue Reading &rarr;', 'woothemes' ) ); } else { the_excerpt(); } ?>
			</section>
			 <hr>	
	 
		