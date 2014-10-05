 <?php
/*
Template Name: blog-template
*/


get_header(); ?>




	 <!--Start Container-->
        <div id="container_block">
            <div class="container">
                <div class="mg_blog_block">
                	<div class="row">
            	        <div class="col-xs-12 col-sm-12 col-md-12">
						
						<?php 
								$args     = array( 'post_type' => 'post', 'order'=>'DESC','posts_per_page' => -1);			 
								$blog = new WP_Query($args); 			 
							    $count=0;
								$j=2;
								if($blog->have_posts()) : 
								while ( $blog->have_posts() ) : $blog->the_post();
								$count++;		
								?>
										 <div id="blogcont<?php echo $count; ?>" class="blogpost <?php if($count>$j)echo "hide";?>" >
										<div class="content-text"> <h1><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
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
										</div>				
											<?php the_content();?>
											 <hr>	
											</div>
										 
									
								
								
												
								<?php endwhile; ?>					
								<?php  endif; ?>
					

						<div class="mg_send_block" id="moreblog" style="cursor:pointer">Tab to load more posts...</div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    <!--End Container-->
	<script>
				jQuery(document).ready(function(){
				
				jQuery("#moreblog").on('click',function(){
				var total = jQuery(".blogpost").length;
				var count=0;
				var countstart=0;
				var countend=0;
				jQuery(".blogpost").each(function(){
				
				if(jQuery(this).is(':visible')){
				count = count+1;
				}
				
				
				});
				countstart = count;
				countend = count+5;
				
				var j;
				for (j=0; j <= countend; j++){
				jQuery("#blogcont"+j).removeClass('hide');
				if(j==total){
				jQuery("#moreblog").text('NO MORE POST...');
				}
				
				}
			
				
				
				
				
				})
				
				
				})
				</script>
			
            	
                		
                    
                 <style>
				 .hide{
				 display:none;
				 }
				 </style>

	
<?php get_footer(); ?>