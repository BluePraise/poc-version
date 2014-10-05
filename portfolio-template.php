 <?php
/*
Template Name: portfolio-template
*/


get_header(); ?>


	 <!--Start Container-->
    <div id="container_block">
    	<div class="container">
           
            <div class="mg_product_block"> 
                <h1>Projects</h1>
               
			

				
				
			
				
				
			
            	
                		<?php 
								$args     = array( 'post_type' => 'portfolio', 'order'=>'DESC','posts_per_page' => -1);			 
								$portfolio = new WP_Query($args); 			 
							    
								if($portfolio->have_posts()) : 
								while ( $portfolio->have_posts() ) : $portfolio->the_post();
										
								?>
								
										<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										 <div class="col-xs-12 col-sm-4 col-md-4">  
											<div class="mg_product_block_in">
												<span class="mg_product_img"><?php if ( has_post_thumbnail() ) {
															the_post_thumbnail('full');
														} ?></span>
												<span class="product_name"><?php the_title();?><span class="product_price"><?php echo strip_tags(get_the_excerpt());?></span></span>
											</div>
										</div>
								        </a>
									
								
								
												
								<?php endwhile; ?>					
								<?php  endif; ?>
                    
                 
             
				
				
            </div>
            <div class="clear"></div>
           <a href="#"> <div class="mg_mid_hdn">We relish a new challenge, so how can we <span>help</span> you?</div></a>
			
<span style="margin-top:40px; display:block;">Type Mafia also worked for: G2K Designers, Google, Penduka, Galerie Tolg'Art, BuroReng and others.</span>
            
        </div>
    </div>
    <!--End Container-->

	
<?php get_footer(); ?>