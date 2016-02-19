<?php
/**
Template Name: Home Page - Cover
 *
 * @package resi
 */

get_header('cover'); ?>

	
    <section id="gallery-container" class="fullwidth-gallery">

        
        <?php // set loop details
		
		if ( get_theme_mod( 'active_random' ) ) : $resi_random_order = 'rand'; endif;   
        
        $resi_photo_order = resi_sanitize_photo_order( get_theme_mod( 'resi_post_order_method', 'DESC' ) );	
	
		$args = array( 
			'post_type' => 'post',
			'order' => $resi_photo_order, 
			'orderby' => $resi_random_order,
			'posts_per_page' => 20, 
			'tax_query' => 				
				array(
					array(
      				'taxonomy' => 'post_format',
      				'field' => 'slug',
      				'terms' => 'post-format-image', 
    	))); 
	
		// the query
		$resi_the_query = new WP_Query( $args ); 
	
			if ( $resi_the_query->have_posts() ) :
	
				while ( $resi_the_query->have_posts() ) : $resi_the_query->the_post(); ?>
		
        				<?php if ( has_post_format( 'image' )) { ?>
                        
                        	<figure class="gallery-image">
                        
                        
								<?php if ( 'option1' == resi_sanitize_index_content( get_theme_mod( 'resi_image_link', 'option1' ) ) ) : // check for lightbox ?>
                                
									<a 
                                    href="<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ?>" 
                                    class="gallery-link"
                                    >
                                    
                                <?php else : ?>
                                
                                	<a href="<?php the_permalink(); ?>"> 
                                     
                                <?php endif; ?> 
                                
                                
            						<?php if ( 'option2' == resi_sanitize_index_content( get_theme_mod( 'resi_filter_options' ) ) ) : // check for filter ?>  
									
                       					<?php the_post_thumbnail( 'full', array( 'class' => 'grayscale' )); ?>
                                        
                                    <?php else : ?> 
                                    
                                    	<?php the_post_thumbnail( 'full' ); ?> 
										
									<?php endif; ?> 
                                    
                                     
                                <?php if ( 'option1' == resi_sanitize_index_content( get_theme_mod( 'resi_image_link', 'option1' ) ) ) : ?>
                                
									</a>
                                    
                                <?php else : ?>
                                
                                	</a> 
                                    
                                <?php endif; ?>  
                            
                            
                            </figure>
                        
                        <?php } ?> 
  
					<?php endwhile; 
	
				endif; 

			// Reset Post Data
			wp_reset_postdata(); ?> 
        
    	
	</section>
    
    
    <div class="home-page-button"> 
    	<div class="grid grid-pad">
    		<div class="col-1-1">
        
        		<?php if ( get_theme_mod( 'resi_view_all_text' ) ) : ?>
    				
                    <a href="<?php echo esc_url( get_page_link( get_theme_mod( 'resi_gallery_button_url' ))) ?>"> 
                		<button class="gallery-archive-button">
							<?php echo esc_html( get_theme_mod( 'resi_view_all_text' )); ?>
                        </button> 
                	</a>
                    
            	<?php endif; ?> 
        
        	</div><!-- col-1-1 -->
        </div><!-- grid -->
    </div><!-- home button -->
    

	<?php if ( get_theme_mod( 'active_hw_1' ) == '' ) : ?>
		<?php if ( is_active_sidebar('home-widget-area-one') ) : ?> 
            
            <div class="home-widget home-widget-one">
                <div class="grid grid-pad">
                    <div class="col-1-1">
                	
						<?php dynamic_sidebar('home-widget-area-one'); ?>
                	
                   	</div> 
                </div><!-- grid -->
            </div><!-- .home-widget -->
                
		<?php endif; ?>
    <?php endif; ?> 
    


<?php get_footer(); ?>
