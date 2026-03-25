<?php
/**
 * Custom template tags for P Blog
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */

if ( ! function_exists( 'pblog_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since P Blog 1.0
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function pblog_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'pblog' ),
		'next_text' => __( 'Next &rarr;', 'pblog' ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'pblog' ); ?></h1>
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'pblog_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since P Blog 1.0
 */
function pblog_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation width620" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'pblog' ); ?></h1>
		<div class="nav-links">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'pblog' ) );
			else :
				previous_post_link( '<div class="nav-previous">%link</div>', __( '<span class="meta-nav">Previous Post</span>%title', 'pblog' ) );
				next_post_link( '<div class="nav-next">%link</div>', __( '<span class="meta-nav">Next Post</span>%title', 'pblog' ) );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'pblog_post_nav_background' ) ) :
/**
 * Add featured image as background image to post navigation elements.
 *
 * @see wp_add_inline_style()
 */
function pblog_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:hover .meta-nav, .post-navigation .nav-previous a:hover .post-title { opacity: 0.6; }
			.post-navigation .nav-previous a { color: #fff; background-color: rgba(0, 0, 0, 0.3); border: 0; }
			.post-navigation .nav-previous a:hover { background-color: rgba(0, 0, 0, 0.6); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:hover .meta-nav, .post-navigation .nav-next a:hover .post-title { opacity: 0.6; }
			.post-navigation .nav-next a { color: #fff; background-color: rgba(0, 0, 0, 0.3); border: 0; }
			.post-navigation .nav-next a:hover { background-color: rgba(0, 0, 0, 0.6); }
		';
	}

	wp_add_inline_style( 'pblog-style', $css );
}
add_action( 'wp_enqueue_scripts', 'pblog_post_nav_background' );
endif;

if ( ! function_exists( 'pblog_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since P Blog 1.0
 */
function pblog_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'pblog' ) . '</span>';
	}

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Find out if blog has more than one category.
 *
 * @since P Blog 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function pblog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pblog_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pblog_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so pblog_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so pblog_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in pblog_categorized_blog.
 *
 * @since P Blog 1.0
 */
function pblog_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'pblog_category_count' );
}
add_action( 'edit_category', 'pblog_category_transient_flusher' );
add_action( 'save_post',     'pblog_category_transient_flusher' );

if ( ! function_exists( 'pblog_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since P Blog 1.0
 * @since P Blog 1.4 Was made 'pluggable', or overridable.
 */
function pblog_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
	<?php
		if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'page-templates/full-width.php' ) ) ) {
			the_post_thumbnail( 'pblog-full-width' );
		} else {
			the_post_thumbnail();
		}
	?>
	</div>

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
	<?php
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
	?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'pblog_read_more' ) && ! is_admin() ) :
/**
 * Custom read more 
 *
 * @since P Blog 1.3
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function pblog_read_more( $classes = '' ) {
	$link = sprintf( '<div class="meta--more ' . $classes . '"><a href="%1$s" class="more-link link--green">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %s: Name of current post */
			sprintf( __( 'Continue reading %s', 'pblog' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	echo $link;
}
endif;

if ( ! function_exists( 'pmag_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * Require WordPress 4.5+
 * @since P Blog 1.3
 */
function pmag_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) { ?>
		<div class="site-logo">
			<?php the_custom_logo(); ?>
		</div>
	<?php }
}
endif;