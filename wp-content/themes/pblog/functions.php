<?php
/**
 * P Blog functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */

/**
 * Set up the content width value based on the theme's design.
 *
 * @see pblog_content_width()
 *
 * @since P Blog 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 620;
}

/**
 * P Blog only works in WordPress 3.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'pblog_setup' ) ) :
/**
 * P Blog setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 * @since P Blog 1.0
 */
function pblog_setup() {

	/*
	 * Make P Blog available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on P Blog, use a find and
	 * replace to change 'pblog' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'pblog', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', pblog_font_url(), 'genericons/genericons.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Add support for Custom Logo, require WordPress 4.5+
	add_theme_support( 'custom-logo', array(
		'height' 		=> 60,
		'width'			=> 100,
		'flex-width' 	=> true 
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 240, true );
	add_image_size( 'main-thumb', 800, 240, true );
	add_image_size( 'pblog-full-width', 9999, 230, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'pblog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'pblog_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	// Add support for woocommerce.
	add_theme_support( 'woocommerce' );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // pblog_setup
add_action( 'after_setup_theme', 'pblog_setup' );

/**
 * Adjust content_width value for image attachment template.
 *
 * @since P Blog 1.0
 */
function pblog_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'pblog_content_width' );

/**
 * Register three P Blog widget areas.
 *
 * @since P Blog 1.0
 */
function pblog_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'pblog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the right.', 'pblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'pblog' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'pblog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pblog_widgets_init' );

/**
 * Register Lato Google font for P Blog.
 *
 * @since P Blog 1.0
 *
 * @return string
 */
function pblog_font_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by PT Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT Sans font: on or off', 'pblog' ) ) {
		$fonts[] = 'PT Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by PT Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'PT Serif font: on or off', 'pblog' ) ) {
		$fonts[] = 'PT Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'pblog' ) ) {
		$fonts[] = 'Lato:300,400,700,900,300italic,400italic,700italic';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'pblog' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since P Blog 1.0
 */
function pblog_scripts() {
	// Add Google font, used in the main stylesheet.
	wp_enqueue_style( 'pblog-fonts', pblog_font_url(), array(), null );

	// Add Genericons font, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );

	// Load our main stylesheet.
	wp_enqueue_style( 'pblog-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'pblog-ie', get_template_directory_uri() . '/css/ie.css', array( 'pblog-style' ), '20131205' );
	wp_style_add_data( 'pblog-ie', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'pblog-html5', get_template_directory_uri() . '/js/html5.min.js', array(), '3.7.0' );
	wp_script_add_data( 'pblog-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'pblog-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	wp_enqueue_script( 'headroom', get_template_directory_uri() . '/js/headroom.min.js', array( 'jquery' ), '0.7.0', true );
	wp_enqueue_script( 'pblog-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150315', true );
}
add_action( 'wp_enqueue_scripts', 'pblog_scripts' );

/**
 * Enqueue Google fonts style to admin screen for custom header display.
 *
 * @since P Blog 1.0
 */
function pblog_admin_fonts() {
	wp_enqueue_style( 'pblog-lato', pblog_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'pblog_admin_fonts' );

if ( ! function_exists( 'pblog_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since P Blog 1.0
 */
function pblog_the_attached_image() {
	$post                = get_post();
	/**
	 * Filter the default P Blog attachment size.
	 *
	 * @since P Blog 1.0
	 *
	 * @param array $dimensions {
	 *     An array of height and width dimensions.
	 *
	 *     @type int $height Height of the image in pixels. Default 810.
	 *     @type int $width  Width of the image in pixels. Default 810.
	 * }
	 */
	$attachment_size     = apply_filters( 'pblog_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( reset( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'pblog_list_authors' ) ) :
/**
 * Print a list of all site contributors who published at least one post.
 *
 * @since P Blog 1.0
 */
function pblog_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		// Move on if user has not published a post (yet).
		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'pblog' ), $post_count ); ?>
				</a>
			</div><!-- .contributor-summary -->
		</div><!-- .contributor-info -->
	</div><!-- .contributor -->

	<?php
	endforeach;
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 *
 * @since P Blog 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function pblog_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( is_single()
		|| ( ! is_active_sidebar( 'sidebar-1' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width no-sidebar';
	} else {
		$classes[] = 'right-sidebar';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	return $classes;
}
add_filter( 'body_class', 'pblog_body_classes' );

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @since P Blog 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function pblog_post_classes( $classes ) {

	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	$featured = get_post_meta( get_the_ID(), 'pblog_featured', true );
	if ( ( 'yes' == $featured ) || ( is_single() ) ) {
		$classes[] = 'widthfull';
	} else {
		$classes[] = 'container width620';
	}

	if ( has_post_thumbnail() && ( get_post_type() == "post" ) ) {
		if ( ( 'yes' == $featured ) || ( is_single() ) ) {
			$classes[] = 'imageBkgr';
		}
	}
	
	return $classes;
}
add_filter( 'post_class', 'pblog_post_classes' );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since P Blog 1.0
 *
 * @global int $paged WordPress archive pagination page count.
 * @global int $page  WordPress paginated post page count.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function pblog_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'pblog' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'pblog_wp_title', 10, 2 );

// Implement Custom Header features.
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Add Customizer functionality.
require get_template_directory() . '/inc/customizer.php';

// Add Featured Content functionality.
require get_template_directory() . '/inc/featured-content.php';

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'pblog_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'pblog_wrapper_end', 10);

function pblog_wrapper_start() {
  echo '<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<article class="hentry container width620">';
}

function pblog_wrapper_end() {
  echo '</div></div></article>';
}