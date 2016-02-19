<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package exposition
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php exposition_load_theme_fonts(); ?>
	<?php wp_head(); ?>
	<?php exposition_load_theme_colors(); ?>
</head>

<body <?php body_class(); ?>>
<div class="container">
	<div id="header">
		<?php
		$logo = get_theme_mod( 'themefurnace_logo' );
		if ( $logo !== '' && $logo !== false ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
			   title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" class="logo-link"><img
					class="logo"
					src='<?php echo esc_url( get_theme_mod( 'themefurnace_logo', get_template_directory_uri() . '/img/logo.png' ) ); ?>'
					alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'/></a>
		<?php else : ?>
			<div class="logo-text-container">
				<h2 id="logo_text"><a href='<?php echo esc_url( home_url( '/' ) ); ?>'
									  title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'
									  rel='home'><?php bloginfo( 'name' ); ?></a></h2>

				<p><span class="tagline"><?php bloginfo( 'description' ); ?></span></p>
			</div>
		<?php endif; ?>

		<div id="menu" style="display: none;">
			<a href="#" class="close-button">X</a>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</div>
		<!-- End menu -->
		<a href="#menu" class="menu-trigger"><img src="<?php echo get_template_directory_uri() . '/img/menu.png'; ?>"
												  class="menu"/></a>

	</div>
	<!--End Header -->
	<div id="content">

