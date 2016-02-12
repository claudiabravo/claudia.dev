<?php 
   // section banner
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_0_hide',0));
   $content_model   = absint(alchem_option('section_0_model',0));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_0_id','section-1')));
   $section_title   = wp_kses(alchem_option('section_0_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_0_sub_title'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_0_button_text'));
   $button_link     = esc_attr(alchem_option('section_0_button_link'));
   $button_target   = esc_attr(alchem_option('section_0_button_target'),'_blank');
   $content_align   = esc_attr(alchem_option('section_0_content_align'),'right');
   $section_content = wp_kses(alchem_option('section_0_content'), $allowedposttags);
 ?>
 <?php if( $section_hide != '1' ):?>
<section class="section magee-section alchem-home-section-0" id="<?php echo $section_id;?>">
  <div class="section-content container">
   <?php if( $content_model == 0 ):?>
    <h1 style="text-align:<?php echo $content_align;?>;color: #fff;font-size: 5em"><?php echo $section_title;?></h1>
    <p style="text-align:<?php echo $content_align;?>;color: #fff"><?php echo do_shortcode($sub_title);?></p>
    
    <?php if( $button_text != '' ){?>
    <div style="text-align:<?php echo $content_align;?>">
      <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class="magee-btn-normal btn-md btn-line btn-light" id=""><?php echo $button_text;?></a>
      </div>
      <?php }?>
      
      <?php else:?>
      <?php echo do_shortcode($section_content);?>
      <?php endif;?>
      
  </div>
</section>
 <?php endif;?>