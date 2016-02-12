<?php 
  // section news 
  
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_8_hide',0));
   $content_model   = absint(alchem_option('section_8_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_8_id','section-9')));
   $section_title   = wp_kses(alchem_option('section_8_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_8_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_8_columns',3));
   $col             = $columns>0?12/$columns:4;
   $posts_num       = absint(alchem_option('section_8_posts_num',3));
   $date_format     = alchem_option('date_format','M d, Y');
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="section magee-section parallax-scrolling alchem-home-section-8" id="<?php echo $section_id;?>">
  <div class="section-content container">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 style="text-align: center"><?php echo $section_title;?></h2>
    <div class="divider divider-border center" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
    <div style="">
     <?php
	 $news_item   = '';
	 $news_str    = '';
	 $j           = 0;
	 query_posts( 'ignore_sticky_posts=1&posts_per_page='.$posts_num );

// The Loop
while ( have_posts() ) : the_post();  
   
     $featured_image = '';
	if( has_post_thumbnail()  ){
		$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), "alchem-portfolio-thumb" );
		$featured_image = '<div class="feature-img-box"><div class="img-box figcaption-middle text-center from-top fade-in">
                                                                <a href="'.get_permalink().'">
                                                                    <img src="'.$image_attributes[0].'" alt="" class="feature-img">
                                                                    <div class="img-overlay dark">
                                                                        <div class="img-overlay-container">
                                                                            <div class="img-overlay-content">
                                                                                <i class="fa fa-link"></i>
                                                                            </div>
                                                                        </div>                                                        
                                                                    </div>
                                                                </a>
                                                            </div> </div>';
		}
	
	
	$news_item .= '<div class="col-md-'.$col.'">
                                                <div class="entry-box-wrap">
                                                    <article class="entry-box">
                                                        
                                                           '.$featured_image.'                                             
                                                       
                                                        <div class="entry-main">
                                                            <div class="entry-header">
                                                                <a href="'.get_permalink().'"><h1 class="entry-title">'.get_the_title().'</h1></a>
                                                                <ul class="entry-meta">
                                                                    <li class="entry-date"><i class="fa fa-calendar"></i><a href="'.get_month_link(get_the_time('Y'), get_the_time('m')).'">'.get_the_date( $date_format ).'</a></li>
                                                                    <li class="entry-comments pull-right">'.alchem_get_comments_popup_link('', __( '<i class="fa fa-comment"></i> 1 ', 'alchem'), __( '<i class="fa fa-comment"></i> % ', 'alchem'), 'read-comments', '').'</li>
                                                                </ul>
                                                            </div>
                                                            <div class="entry-summary">
                                                                '.alchem_get_summary().'
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>';
											
											
 
       $m = $j+1;
	  if( $m % $columns == 0 ){
	        $news_str .= '<div class="row">'.$news_item.'</div>';
	        $news_item   = '';
	   }
 $j++;
endwhile;

if( $news_item != '' ){
		    $news_str .= '<div class="row">'.$news_item.'</div>';
	      
		   }
// Reset Query
 wp_reset_query();
 echo $news_str;	 

	  ?>      
    </div>
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
</section>
<?php endif;?>