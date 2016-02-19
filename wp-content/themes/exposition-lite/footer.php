<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package exposition
 */
?>

		</div><!--End Content -->


		<div id="footer">
			<div id="footerwidgets">

				<?php /* Widgetised Area */
				if (!function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'Footer' )) ?>

			</div>
			<!-- End Footer Widgets-->

			<div id="credits" class="footertext">
				<?php
				$footer_logo = get_theme_mod( 'themefurnace_footer_logo' );
				if ( $footer_logo !== '' && $footer_logo !== false ) : ?>
					<p><img class="footerlogo"
							src='<?php echo esc_url( get_theme_mod( 'themefurnace_footer_logo', get_template_directory_uri() . '/img/footer-logo.png' ) ); ?>'
							alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></p>
				<?php else : ?>
				<?php endif; ?>
				<p class="copy"><?php echo get_theme_mod( 'themefurnacefooter_footer_text' ); ?><br/>
					<?php _e( '&copy; Copyright', 'themefurnace' ) ?> <?php the_time( 'Y' ) ?> <?php bloginfo( 'name' ); ?>
					- <?php printf( __( 'Theme: %1$s by %2$s.', 'themefurnace' ), 'Exposition', '<a href="http://themefurnace.com" rel="designer">ThemeFurnace</a>' ); ?></a>
				</p>

			</div>
		</div><!-- End Footer -->
	</div><!--End Container -->
    <?php wp_footer(); ?>
</body>
</html>