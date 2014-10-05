<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
<div id="container_block">
	<div class="container">
			<div class="mg_main_font_block">
				<div class="mg_font_block">
					<?php
						/**
						 * woocommerce_before_main_content hook
						 *
						 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
						 * @hooked woocommerce_breadcrumb - 20
						 */
						do_action( 'woocommerce_before_main_content' );
					?>
				
								

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<!--<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>-->

		<?php endif; ?>

		<?php //do_action( 'woocommerce_archive_description' ); ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				//do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php //woocommerce_product_loop_start(); ?>
			 <div class="mg_main_font_block">
				
				<h1>Fonts</h1>
                 <hr>
				<?php woocommerce_product_subcategories(); ?>

				<?php 
				
				$args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'Fonts' );

				$loop = new WP_Query( $args );
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php wc_get_template_part( 'content', 'productfonts' ); ?>

				<?php endwhile; // end of the loop.
					   wp_reset_query(); 	
				?>

			<?php //woocommerce_product_loop_end(); ?>
			</div>
			
		<a href="#">	<div class="mg_mid_hdn">Can't find what you're looking for? We can make it <span>custom.</span></div></a>
            <div class="clear"></div>
			
			 <div class="mg_product_block"> 
                <h1>Goods</h1>
                <hr>
			
					
					<?php woocommerce_product_loop_start(); ?>
					

						<?php woocommerce_product_subcategories(); ?>

						<?php 
						
						$args = array( 'post_type' => 'product', 'posts_per_page' => 10, 'product_cat' => 'Goods' );

						$loopg = new WP_Query( $args );
						
						while ( $loopg->have_posts() ) : $loopg->the_post(); ?>

							<?php wc_get_template_part( 'content', 'productgood' ); ?>

						<?php endwhile; // end of the loop. 
						wp_reset_query(); 	
						?>

					<?php woocommerce_product_loop_end(); ?>
						</div>

					

					<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action( 'woocommerce_after_shop_loop' );
					?>

				<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php wc_get_template( 'loop/no-products-found.php' ); ?>

				<?php endif; ?>
						
				
					
					<?php
						/**
						 * woocommerce_after_main_content hook
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action( 'woocommerce_after_main_content' );
					?>

					<?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						//do_action( 'woocommerce_sidebar' );
					?>
				</div>
			</div>
				
	</div>
</div>
<?php get_footer( 'shop' ); ?>