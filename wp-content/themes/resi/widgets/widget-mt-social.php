<?php



class resi_social extends WP_Widget {
	
// constructor

    function resi_social() {

		$widget_ops = array('classname' => 'resi_social_widget', 'description' => esc_html__( 'Drag this widget to the Social Widget Area.', 'resi') );

        parent::__construct(false, $name = esc_html__('MT - Social Icons', 'resi'), $widget_ops); 

		$this->alt_option_name = 'resi_social_widget';

		

		add_action( 'save_post', array($this, 'flush_widget_cache') ); 

		add_action( 'deleted_post', array($this, 'flush_widget_cache') );

		add_action( 'switch_theme', array($this, 'flush_widget_cache') );	 	

    }

	

	// widget form creation

	function form($instance) {



	// Check values

		$social_fb_link 	= isset( $instance['social_fb_link'] ) ? esc_url( $instance['social_fb_link'] ) : '';
		
		$social_twitter_link 	= isset( $instance['social_twitter_link'] ) ? esc_url( $instance['social_twitter_link'] ) : '';
		
		$social_linked_link 	= isset( $instance['social_linked_link'] ) ? esc_url( $instance['social_linked_link'] ) : '';
		
		$social_google_link 	= isset( $instance['social_google_link'] ) ? esc_url( $instance['social_google_link'] ) : '';
		
		$social_instagram_link 	= isset( $instance['social_instagram_link'] ) ? esc_url( $instance['social_instagram_link'] ) : '';
		
		$social_vine_link 	= isset( $instance['social_vine_link'] ) ? esc_url( $instance['social_vine_link'] ) : '';
		
		$social_flickr_link 	= isset( $instance['social_flickr_link'] ) ? esc_url( $instance['social_flickr_link'] ) : '';
		
		$social_pinterest_link 	= isset( $instance['social_pinterest_link'] ) ? esc_url( $instance['social_pinterest_link'] ) : '';
		
		$social_youtube_link 	= isset( $instance['social_youtube_link'] ) ? esc_url( $instance['social_youtube_link'] ) : '';
		
		$social_vimeo_link 	= isset( $instance['social_vimeo_link'] ) ? esc_url( $instance['social_vimeo_link'] ) : '';
		
		$social_tumblr_link 	= isset( $instance['social_tumblr_link'] ) ? esc_url( $instance['social_tumblr_link'] ) : '';
		
		$social_stumble_link 	= isset( $instance['social_stumble_link'] ) ? esc_url( $instance['social_stumble_link'] ) : '';
		
		$social_dribbble_link 	= isset( $instance['social_dribbble_link'] ) ? esc_url( $instance['social_dribbble_link'] ) : '';
		
		$social_yelp_link 	= isset( $instance['social_yelp_link'] ) ? esc_url( $instance['social_yelp_link'] ) : '';
		
		$social_vk_link 	= isset( $instance['social_vk_link'] ) ? esc_url( $instance['social_vk_link'] ) : '';
		
		$social_xing_link 	= isset( $instance['social_xing_link'] ) ? esc_url( $instance['social_xing_link'] ) : '';
		
		$social_deviant_link 	= isset( $instance['social_deviant_link'] ) ? esc_url( $instance['social_deviant_link'] ) : '';
		
		$social_500_link 	= isset( $instance['social_500_link'] ) ? esc_url( $instance['social_500_link'] ) : '';
		
		$social_behance_link 	= isset( $instance['social_behance_link'] ) ? esc_url( $instance['social_behance_link'] ) : '';
		
		$social_lastfm_link 	= isset( $instance['social_lastfm_link'] ) ? esc_url( $instance['social_lastfm_link'] ) : '';
		
		$social_soundcloud_link 	= isset( $instance['social_soundcloud_link'] ) ? esc_url( $instance['social_soundcloud_link'] ) : '';
		
		$social_reddit_link 	= isset( $instance['social_reddit_link'] ) ? esc_url( $instance['social_reddit_link'] ) : '';
		
		$social_github_link 	= isset( $instance['social_github_link'] ) ? esc_url( $instance['social_github_link'] ) : '';
		
		$social_codepen_link 	= isset( $instance['social_codepen_link'] ) ? esc_url( $instance['social_codepen_link'] ) : '';
		
		$social_skype_link 	= isset( $instance['social_skype_link'] ) ? esc_url( $instance['social_skype_link'] ) : '';
		
		$social_spotify_link  = isset( $instance['social_spotify_link'] ) ? esc_url( $instance['social_spotify_link'] ) : '';
		
		$social_email_link  = isset( $instance['social_email_link'] ) ? esc_html( $instance['social_email_link'] ) : '';
		
		$social_telephone_link  = isset( $instance['social_telephone_link'] ) ? esc_attr( $instance['social_telephone_link'] ) : '';
		
		$social_rss_link 	= isset( $instance['social_rss_link'] ) ? esc_url( $instance['social_rss_link'] ) : '';
		
		$social_url_path	= isset( $instance['social_url_path'] ) ? (bool) $instance['social_url_path'] : false;


	?>
    
	
    <!-- checkbox --> 
    
    <p>
    
    <input class="checkbox" type="checkbox" <?php checked( $social_url_path ); ?> id="<?php echo sanitize_text_field( $this->get_field_id( 'social_url_path' )); ?>" name="<?php echo sanitize_text_field( $this->get_field_name( 'social_url_path' )); ?>" />

	<label for="<?php echo sanitize_text_field( $this->get_field_id( 'social_url_path' )); ?>"><?php esc_html_e( 'Check this box to open links in a new window.', 'resi' ); ?></label>
    
    </p>

	<!-- facebook -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_fb_link')); ?>"><?php esc_html_e('Facebook URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_fb_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_fb_link')); ?>" type="text" value="<?php echo esc_url( $social_fb_link ); ?>" />

	</p>

	<!-- twitter -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_twitter_link')); ?>"><?php esc_html_e('Twitter URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_twitter_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_twitter_link')); ?>" type="text" value="<?php echo esc_url( $social_twitter_link ); ?>" />

	</p>
    
    <!-- linkedin -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_linked_link')); ?>"><?php esc_html_e('LinkedIn URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_linked_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_linked_link')); ?>" type="text" value="<?php echo esc_url( $social_linked_link ); ?>" />

	</p>

	 <!-- google -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_google_link')); ?>"><?php esc_html_e('Google URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_google_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_google_link')); ?>" type="text" value="<?php echo esc_url( $social_google_link ); ?>" />

	</p>
    
    <!-- instagram -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_instagram_link')); ?>"><?php esc_html_e('Instagram URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_instagram_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_instagram_link')); ?>" type="text" value="<?php echo esc_url( $social_instagram_link ); ?>" />

	</p>
    
    <!-- vine -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_vine_link')); ?>"><?php esc_html_e('Vine URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_vine_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_vine_link')); ?>" type="text" value="<?php echo esc_url( $social_vine_link ); ?>" />

	</p>
    
    <!-- flickr -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_flickr_link')); ?>"><?php esc_html_e('Flickr URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_flickr_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_flickr_link')); ?>" type="text" value="<?php echo esc_url( $social_flickr_link ); ?>" />

	</p>
	
    <!-- pinterest -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_pinterest_link')); ?>"><?php esc_html_e('Pinterest URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_pinterest_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_pinterest_link')); ?>" type="text" value="<?php echo esc_url( $social_pinterest_link ); ?>" />

	</p>
	
    <!-- youtube -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_youtube_link')); ?>"><?php esc_html_e('Youtube URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_youtube_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_youtube_link')); ?>" type="text" value="<?php echo esc_url( $social_youtube_link ); ?>" />

	</p>
    
    <!-- vimeo -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_vimeo_link')); ?>"><?php esc_html_e('Vimeo URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_vimeo_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_vimeo_link')); ?>" type="text" value="<?php echo esc_url( $social_vimeo_link ); ?>" />

	</p>
    
    <!-- tumblr -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_tumblr_link')); ?>"><?php esc_html_e('Tumblr URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_tumblr_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_tumblr_link')); ?>" type="text" value="<?php echo esc_url( $social_tumblr_link ); ?>" />

	</p>
    
    <!-- stumbleupon -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_stumble_link')); ?>"><?php esc_html_e('StumbleUpon URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_stumble_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_stumble_link')); ?>" type="text" value="<?php echo esc_url( $social_stumble_link ); ?>" />

	</p>
    
    <!-- dribbble -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_dribbble_link')); ?>"><?php esc_html_e('Dribbble URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_dribbble_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_dribbble_link')); ?>" type="text" value="<?php echo esc_url( $social_dribbble_link ); ?>" />

	</p> 
    
    <!-- yelp -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_yelp_link')); ?>"><?php esc_html_e('Yelp URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_yelp_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_yelp_link')); ?>" type="text" value="<?php echo esc_url( $social_yelp_link ); ?>" />

	</p>
    
     <!-- vk -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_vk_link')); ?>"><?php esc_html_e('VK URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_vk_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_vk_link')); ?>" type="text" value="<?php echo esc_url( $social_vk_link ); ?>" /> 

	</p>
    
    <!-- xing -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_xing_link')); ?>"><?php esc_html_e('Xing URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_xing_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_xing_link')); ?>" type="text" value="<?php echo esc_url( $social_xing_link ); ?>" /> 

	</p>
    
    <!-- deviant -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_deviant_link')); ?>"><?php esc_html_e('DeviantArt URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_deviant_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_deviant_link')); ?>" type="text" value="<?php echo esc_url( $social_deviant_link ); ?>" /> 

	</p>
    
    <!-- 500px -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_500_link')); ?>"><?php esc_html_e('500px URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_500_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_500_link')); ?>" type="text" value="<?php echo esc_url( $social_500_link ); ?>" /> 

	</p>
    
    <!-- behance -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_behance_link')); ?>"><?php esc_html_e('Behance URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_behance_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_behance_link')); ?>" type="text" value="<?php echo esc_url( $social_behance_link ); ?>" /> 

	</p>
    
    <!-- lastfm -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_lastfm_link')); ?>"><?php esc_html_e('lastFM URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_lastfm_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_lastfm_link')); ?>" type="text" value="<?php echo esc_url( $social_lastfm_link ); ?>" /> 

	</p>
    
    <!-- soundcloud -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_soundcloud_link')); ?>"><?php esc_html_e('SoundCloud URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_soundcloud_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_soundcloud_link')); ?>" type="text" value="<?php echo esc_url( $social_soundcloud_link ); ?>" /> 

	</p>
    
    <!-- reddit --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_reddit_link')); ?>"><?php esc_html_e('Reddit URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_reddit_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_reddit_link')); ?>" type="text" value="<?php echo esc_url( $social_reddit_link ); ?>" /> 

	</p>
    
    <!-- github --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_github_link')); ?>"><?php esc_html_e('Github URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_github_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_github_link')); ?>" type="text" value="<?php echo esc_url( $social_github_link ); ?>" /> 

	</p>
    
    <!-- codepen --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_codepen_link')); ?>"><?php esc_html_e('CodePen URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_codepen_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_codepen_link')); ?>" type="text" value="<?php echo esc_url( $social_codepen_link ); ?>" /> 

	</p> 
    
    <!-- skype --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_skype_link')); ?>"><?php esc_html_e('Skype URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_skype_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_skype_link')); ?>" type="text" value="<?php echo esc_url( $social_skype_link ); ?>" /> 

	</p>
    
    <!-- spotify --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_spotify_link')); ?>"><?php esc_html_e('Spotify URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_spotify_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_spotify_link')); ?>" type="text" value="<?php echo esc_url( $social_spotify_link ); ?>" /> 

	</p>
    
    <!-- email --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_email_link')); ?>"><?php esc_html_e('Email Address:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_email_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_email_link')); ?>" type="text" value="<?php echo esc_html( $social_email_link ); ?>" /> 

	</p>
    
    <!-- email --> 
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_telephone_link')); ?>"><?php esc_html_e('Phone Number:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_telephone_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_telephone_link')); ?>" type="text" value="<?php echo esc_attr( $social_telephone_link ); ?>" /> 

	</p> 
    
    <!-- rss -->
    
    <p>

	<label for="<?php echo sanitize_text_field( $this->get_field_id('social_rss_link')); ?>"><?php esc_html_e('RSS URL:', 'resi'); ?></label>

	<input class="widefat" id="<?php echo sanitize_text_field( $this->get_field_id('social_rss_link')); ?>" name="<?php echo sanitize_text_field( $this->get_field_name('social_rss_link')); ?>" type="text" value="<?php echo esc_url( $social_rss_link ); ?>" /> 

	</p>  
	

	<?php

	} 



	// update widget 

	function update($new_instance, $old_instance) { 

		$instance = $old_instance;
		
		$instance['social_fb_link'] 	= 	esc_url_raw($new_instance['social_fb_link']);
		
		$instance['social_twitter_link'] 	= 	esc_url_raw($new_instance['social_twitter_link']);
		
		$instance['social_linked_link'] 	= 	esc_url_raw($new_instance['social_linked_link']);
		
		$instance['social_google_link'] 	= 	esc_url_raw($new_instance['social_google_link']);
		
		$instance['social_instagram_link'] 		= 	esc_url_raw($new_instance['social_instagram_link']);
		
		$instance['social_vine_link'] 		= 	esc_url_raw($new_instance['social_vine_link']); 
		
		$instance['social_flickr_link'] 	= 	esc_url_raw($new_instance['social_flickr_link']);
		
		$instance['social_pinterest_link'] 		= 	esc_url_raw($new_instance['social_pinterest_link']);
		
		$instance['social_youtube_link'] 	= 	esc_url_raw($new_instance['social_youtube_link']);
		
		$instance['social_vimeo_link'] 		= 	esc_url_raw($new_instance['social_vimeo_link']);
		
		$instance['social_tumblr_link'] 	= 	esc_url_raw($new_instance['social_tumblr_link']);
		
		$instance['social_stumble_link'] 	= 	esc_url_raw($new_instance['social_stumble_link']);
		
		$instance['social_dribbble_link'] 	= 	esc_url_raw($new_instance['social_dribbble_link']);
		
		$instance['social_yelp_link'] 	= 	esc_url_raw($new_instance['social_yelp_link']);
		
		$instance['social_vk_link'] 	= 	esc_url_raw($new_instance['social_vk_link']);
		
		$instance['social_xing_link'] 	= 	esc_url_raw($new_instance['social_xing_link']);
		
		$instance['social_deviant_link'] 	= 	esc_url_raw($new_instance['social_deviant_link']);
		
		$instance['social_500_link'] 	= 	esc_url_raw($new_instance['social_500_link']);
		
		$instance['social_behance_link'] 	= 	esc_url_raw($new_instance['social_behance_link']);
		
		$instance['social_lastfm_link'] 	= 	esc_url_raw($new_instance['social_lastfm_link']);
		
		$instance['social_soundcloud_link']  = 	esc_url_raw($new_instance['social_soundcloud_link']);
		
		$instance['social_reddit_link']  = 	esc_url_raw($new_instance['social_reddit_link']);
		
		$instance['social_github_link']  = 	esc_url_raw($new_instance['social_github_link']);
		
		$instance['social_codepen_link']  = 	esc_url_raw($new_instance['social_codepen_link']); 
		
		$instance['social_skype_link']  = 	esc_url_raw($new_instance['social_skype_link']); 
		
		$instance['social_spotify_link']  = 	esc_url_raw($new_instance['social_spotify_link']); 
		
		$instance['social_email_link']  = 	esc_html($new_instance['social_email_link']);
		
		$instance['social_telephone_link']  = 	esc_attr($new_instance['social_telephone_link']);  
		
		$instance['social_rss_link'] 	= 	esc_url_raw($new_instance['social_rss_link']);
		
		$instance['social_url_path'] 	= isset( $new_instance['social_url_path'] ) ? (bool) $new_instance['social_url_path'] : false;

		$this->flush_widget_cache();



		$alloptions = wp_cache_get( 'alloptions', 'options' );

		if ( isset($alloptions['resi_social']) )

			delete_option('resi_social');		  

		  

		return $instance;

	}

	

	function flush_widget_cache() {

		wp_cache_delete('resi_social', 'widget');

	}

	

	// display widget

	function widget($args, $instance) {

		$cache = array();

		if ( ! $this->is_preview() ) {

			$cache = wp_cache_get( 'resi_social', 'widget' );

		}



		if ( ! is_array( $cache ) ) {

			$cache = array();

		}



		if ( ! isset( $args['widget_id'] ) ) {

			$args['widget_id'] = $this->id;

		}



		if ( isset( $cache[ $args['widget_id'] ] ) ) {

			echo wp_kses_post( $cache[ $args['widget_id'] ] );  

			return;

		}



		ob_start();

		extract($args);

		
		
		$social_fb_link 	= isset( $instance['social_fb_link'] ) ? esc_url( $instance['social_fb_link'] ) : '';
		
		$social_twitter_link 	= isset( $instance['social_twitter_link'] ) ? esc_url( $instance['social_twitter_link'] ) : '';
		
		$social_linked_link 	= isset( $instance['social_linked_link'] ) ? esc_url( $instance['social_linked_link'] ) : '';
		
		$social_google_link 	= isset( $instance['social_google_link'] ) ? esc_url( $instance['social_google_link'] ) : '';
		
		$social_instagram_link 	= isset( $instance['social_instagram_link'] ) ? esc_url( $instance['social_instagram_link'] ) : '';
		
		$social_vine_link 	= isset( $instance['social_vine_link'] ) ? esc_url( $instance['social_vine_link'] ) : '';
		
		$social_flickr_link 	= isset( $instance['social_flickr_link'] ) ? esc_url( $instance['social_flickr_link'] ) : '';
		
		$social_pinterest_link 	= isset( $instance['social_pinterest_link'] ) ? esc_url( $instance['social_pinterest_link'] ) : '';
		
		$social_youtube_link 	= isset( $instance['social_youtube_link'] ) ? esc_url( $instance['social_youtube_link'] ) : '';
		
		$social_vimeo_link 	= isset( $instance['social_vimeo_link'] ) ? esc_url( $instance['social_vimeo_link'] ) : '';
		
		$social_tumblr_link 	= isset( $instance['social_tumblr_link'] ) ? esc_url( $instance['social_tumblr_link'] ) : '';
		
		$social_stumble_link 	= isset( $instance['social_stumble_link'] ) ? esc_url( $instance['social_stumble_link'] ) : '';
		
		$social_dribbble_link 	= isset( $instance['social_dribbble_link'] ) ? esc_url( $instance['social_dribbble_link'] ) : '';
		
		$social_yelp_link 	= isset( $instance['social_yelp_link'] ) ? esc_url( $instance['social_yelp_link'] ) : '';
		
		$social_vk_link 	= isset( $instance['social_vk_link'] ) ? esc_url( $instance['social_vk_link'] ) : '';
		
		$social_xing_link 	= isset( $instance['social_xing_link'] ) ? esc_url( $instance['social_xing_link'] ) : '';
		
		$social_deviant_link 	= isset( $instance['social_deviant_link'] ) ? esc_url( $instance['social_deviant_link'] ) : '';
		
		$social_500_link 	= isset( $instance['social_500_link'] ) ? esc_url( $instance['social_500_link'] ) : '';
		
		$social_behance_link 	= isset( $instance['social_behance_link'] ) ? esc_url( $instance['social_behance_link'] ) : '';
		
		$social_lastfm_link 	= isset( $instance['social_lastfm_link'] ) ? esc_url( $instance['social_lastfm_link'] ) : '';
		
		$social_soundcloud_link  = isset( $instance['social_soundcloud_link'] ) ? esc_url( $instance['social_soundcloud_link'] ) : '';
		
		$social_reddit_link 	= isset( $instance['social_reddit_link'] ) ? esc_url( $instance['social_reddit_link'] ) : '';
		
		$social_github_link 	= isset( $instance['social_github_link'] ) ? esc_url( $instance['social_github_link'] ) : '';
		
		$social_codepen_link 	= isset( $instance['social_codepen_link'] ) ? esc_url( $instance['social_codepen_link'] ) : '';
		
		$social_skype_link 	= isset( $instance['social_skype_link'] ) ? esc_url( $instance['social_skype_link'] ) : '';
		
		$social_spotify_link  = isset( $instance['social_spotify_link'] ) ? esc_url( $instance['social_spotify_link'] ) : '';
		
		$social_email_link  = isset( $instance['social_email_link'] ) ? esc_html( $instance['social_email_link'] ) : '';
		
		$social_telephone_link  = isset( $instance['social_telephone_link'] ) ? esc_attr( $instance['social_telephone_link'] ) : ''; 
		
		$social_rss_link 	= isset( $instance['social_rss_link'] ) ? esc_url( $instance['social_rss_link'] ) : '';
		
		$social_url_path	= isset( $instance['social_url_path'] ) ? (bool) $instance['social_url_path'] : false;
		

?>
			
    	<ul class='social-media-icons'>
             
        	<?php if ($social_fb_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_fb_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-facebook"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_twitter_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_twitter_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-twitter"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_linked_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_linked_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-linkedin"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_google_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_google_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-google-plus"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_instagram_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_instagram_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-instagram"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_vine_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_vine_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-vine"></i> 
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_flickr_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_flickr_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-flickr"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_pinterest_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_pinterest_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-pinterest"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_youtube_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_youtube_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-youtube"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_vimeo_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_vimeo_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-vimeo-square"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_tumblr_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_tumblr_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-tumblr"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_stumble_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_stumble_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-stumbleupon"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_dribbble_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_dribbble_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-dribbble"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_yelp_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_yelp_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-yelp"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_vk_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_vk_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-vk"></i>
                </a>
                </li>
			<?php endif; ?> 
            <?php if ($social_xing_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_xing_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-xing"></i> 
                </a>
                </li>
			<?php endif; ?> 
            <?php if ($social_deviant_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_deviant_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-deviantart"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_500_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_500_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-500px"></i>
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_behance_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_behance_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-behance"></i> 
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_lastfm_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_lastfm_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-lastfm"></i>  
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_soundcloud_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_soundcloud_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-soundcloud"></i>  
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_reddit_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_reddit_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-reddit"></i>   
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_github_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_github_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-github"></i>  
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_codepen_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_codepen_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-codepen"></i>   
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_skype_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_skype_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-skype"></i>   
                </a>
                </li>
			<?php endif; ?>
            <?php if ($social_spotify_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_spotify_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-spotify"></i>     
                </a>
                </li>
			<?php endif; ?> 
            <?php if ($social_email_link !='') : ?>
            	<li>
                <a href="mailto:<?php echo esc_html( $social_email_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-envelope"></i>  
                </a>
                </li>
			<?php endif; ?> 
            <?php if ($social_telephone_link !='') : ?>
            	<li>
                <a href="tel:<?php echo esc_attr( $social_telephone_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
                <i class="fa fa-phone"></i> 
                </a>
                </li>
			<?php endif; ?> 
            <?php if ($social_rss_link !='') : ?>
            	<li>
                <a href="<?php echo esc_url( $social_rss_link ); ?>" <?php if( $social_url_path ) : ?>target="_blank"<?php endif; ?>>
               <i class="fa fa-rss"></i>
                </a>
                </li>
			<?php endif; ?> 
            
    	</ul> 
              

	<?php



		if ( ! $this->is_preview() ) {

			$cache[ $args['widget_id'] ] = ob_get_flush();

			wp_cache_set( 'resi_social', $cache, 'widget' ); 

		} else {

			ob_end_flush();

		}

	}

	

}