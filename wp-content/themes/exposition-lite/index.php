<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Exposition
 */

get_header(); ?>
<?php if (is_404()): ?>

<header class="page-header">
	<h1 class="page-title">
		<?php _e( 'Oops! That page can&rsquo;t be found.', 'exposition' ); ?>
	</h1>
</header>
<!-- .page-header -->

<div class="page-content">
	<p>
		<?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'exposition' ); ?>
	</p>
	<?php get_search_form(); ?>
	<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
	<?php if ( exposition_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
		<div class="widget widget_categories">
			<h2 class="widget-title">
				<?php _e( 'Most Used Categories', 'exposition' ); ?>
			</h2>
			<ul>
				<?php
				wp_list_categories( array(
					'orderby'    => 'count',
					'order'      => 'DESC',
					'show_count' => 1,
					'title_li'   => '',
					'number'     => 10,
				) );
				?>
			</ul>
		</div>
		<!-- .widget -->
	<?php endif; ?>
	<?php
	/* translators: %1$s: smiley */
	$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'exposition' ), convert_smilies( ':)' ) ) . '</p>';
	the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
	?>
	<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
	<?php endif; ?>
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			<?php
			if ( is_search() ) :
				printf( __( 'Search Results for: %s', 'exposition' ), '<span>' . get_search_query() . '</span>' );

			elseif ( is_404() ) :
				_e( 'Oops! That page can&rsquo;t be found.', 'exposition' );

			elseif ( is_category() ) :
				single_cat_title();

			elseif ( is_tag() ) :
				single_tag_title();

			elseif ( is_author() ) :
				printf( __( 'Author: %s', 'exposition' ), '<span class="vcard">' . get_the_author() . '</span>' );

			elseif ( is_day() ) :
				printf( __( 'Day: %s', 'exposition' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Month: %s', 'exposition' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'exposition' ) ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Year: %s', 'exposition' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'exposition' ) ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
				_e( 'Galleries', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
				_e( 'Statuses', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
				_e( 'Audios', 'exposition' );

			elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
				_e( 'Chats', 'exposition' );

			else :
				_e( 'Archives', 'exposition' );

			endif;
			?>
		</h1>
		<?php
		// Show an optional term description.
		$term_description = term_description();
		if ( !empty( $term_description ) ) :
			printf( '<div class="taxonomy-description">%s</div>', $term_description );
		endif;
		?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
			?>
		<?php endwhile; ?>
		<div class="page_nav">
			<?php exposition_pagination(); ?>
		</div>
	<?php else : ?>
		<?php get_template_part( 'content', 'none' ); ?>
	<?php endif; ?>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
