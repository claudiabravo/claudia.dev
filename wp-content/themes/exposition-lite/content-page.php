<?php
/**
 * @package Exposition
 */
?>

<div <?php post_class( 'post' ); ?>>
	<?php the_post_thumbnail( 'exposition-post-page', array( 'class' => 'featuredimage' ) ); ?>

	<div class="postcontent">
		<h2 class="posttitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
	</div>
	<!--End Postcontent -->

	<div class="side">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 130 ); ?>
		<ul class="metainfo">
			<li class="author">By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>" class="authorname"><?php the_author(); ?></a></li>
			<li><?php exposition_posted_on(); ?></li>
			<li>
				<?php if ( !post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'exposition' ), __( '1 Comment', 'exposition' ), __( '% Comments', 'exposition' ) ); ?></span>
				<?php endif; ?>
			</li>
			<li>
				<?php
				$categories = get_the_category();
				if ( !empty( $categories ) ) {
					foreach ( $categories as $index => $category ) {
						echo '<a href="' . home_url() . '/?cat=' . $category->term_id . '">' . $category->name . '</a>' . ( $index !== count( $categories ) - 1 ? ', ' : '' );
					}
				}
				?>
			</li>
		</ul>
	</div>
	<!--End Side -->

</div><!--End Post -->