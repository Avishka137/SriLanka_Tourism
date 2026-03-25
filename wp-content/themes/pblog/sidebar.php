<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */
?>
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<div id="secondary">

		<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #primary-sidebar -->
		
	</div><!-- #secondary -->
	
<?php endif; ?>
