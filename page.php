<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
   <!--Start Container-->
    <div id="container_block">
    	<div class="container">
		
		
											
							
								<?php woo_main_before(); ?>
								
								<section id="main" class="col-left"> 			

								<?php if(is_home() || is_page('home') || is_page('cart') || is_page('checkout') || is_page('My Account')) { ?>
									<?php if ( have_posts() ) { $count = 0;
										while ( have_posts() ) { the_post(); $count++;
										?>
													<article <?php post_class(); ?>>
														
														
														<section class="entry">
															<?php the_content(); ?>

															<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
														</section><!-- /.entry -->

														<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
														
													</article><!-- /.post -->
													
													<?php
														// Determine wether or not to display comments here, based on "Theme Options".
														/*if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
															comments_template();
														}*/

														} // End WHILE Loop
													} else {
												?>
													<article <?php post_class(); ?>>
														<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
													</article><!-- /.post -->
												<?php } // End IF Statement ?>  
								
								<?php } else { ?>
											<?php if ( have_posts() ) { $count = 0;
												while ( have_posts() ) { the_post(); $count++;
												?>
												<article <?php post_class(); ?>>
													
													
													<div class="col-xs-12 col-sm-12 col-md-12">
													<div id="all_blog" class="dt_block_post">
														<div class="dt_bp_head">
														<header>
															<h1><?php the_title(); ?></h1>
														</header>
														</div>
													
														<div class="dt_post_content">	
															<section class="entry">
																<?php the_content(); ?>

																<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
															</section><!-- /.entry -->
														</div>
													<?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>
													</div></div>
												</article><!-- /.post -->
												
												<?php
													// Determine wether or not to display comments here, based on "Theme Options".
													/*if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
														comments_template();
													}*/

													} // End WHILE Loop
												} else {
											?>
												<article <?php post_class(); ?>>
													<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
												</article><!-- /.post -->
											<?php } // End IF Statement ?>  
								
								<?php } ?>
								
								
								
								</section><!-- /#main -->
								
								
							
		
            
        </div>
    </div>
    <!--End Container-->
		
<?php get_footer(); ?>