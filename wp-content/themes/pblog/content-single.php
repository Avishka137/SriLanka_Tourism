<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */
$style = '';
$class = '';
if ( has_post_thumbnail() ) {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src( $image_id,'large', false );
	$style = ' style="background-image: url(' . $image_url[0]. '); "';
	$class = 'imageBkgr';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header <?php echo $class; ?> hero" <?php echo $style; ?>>
		<div class="hero-mask">
			<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pblog_categorized_blog() ) : ?>
				<div class="entry-meta">
					<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'pblog' ) ); ?></span>
				</div>
			<?php endif; ?>

			<?php the_title( '<h1 class="entry-title width620">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php
					if ( 'post' == get_post_type() )
						pblog_posted_on();

					if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
				?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pblog' ), __( '1 Comment', 'pblog' ), __( '% Comments', 'pblog' ) ); ?></span>
				<?php
					endif;

					edit_post_link( __( 'Edit', 'pblog' ), '<span class="edit-link">', '</span>' );
				?>
			</div><!-- .entry-meta -->

			<?php the_tags( '<div class="entry-meta"><span class="tag-links">', '', '</span></div>' ); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'pblog' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'pblog' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
