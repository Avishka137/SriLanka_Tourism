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
$featured = get_post_meta( get_the_ID(), 'pblog_featured', true );
$style = '';
if ( has_post_thumbnail() ) {
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src( $image_id,'large', false );
	$style = ' style="background-image: url(' . $image_url[0]. '); "';
}
?>

<?php if ( 'yes' == $featured ) :?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); echo $style; ?>>
		<div class="hero-mask">
			<header class="entry-header">
				<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pblog_categorized_blog() ) : ?>
				<div class="entry-meta">
					<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'pblog' ) ); ?></span>
				</div>
				<?php
					endif;

					if ( is_single() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
					endif;
				?>

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
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); pblog_read_more('button button--green button--filled rounded'); ?>
			</div><!-- .entry-summary -->
		</div>
	</article><!-- #post-## -->

<?php else :?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<div class="entry-meta meta--author">
				<div class="author--avatar alignleft">
					<a class="author--link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), 36 ); ?>
					</a>
				</div>
				<div class="author--info">
					<a class="author--name" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php the_author(); ?>
					</a>
					<span class="meta--date">
						<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?>
					</span>
				</div>
			</div>

			<?php pblog_post_thumbnail(); ?>
			
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

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
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); pblog_read_more(); ?>
		</div><!-- .entry-summary -->

	</article><!-- #post-## -->

<?php endif; ?>
