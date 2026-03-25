<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Pblog
 * @since P Blog 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php do_action( 'pblog_credits' ); ?>
				<span class="footer-copyright">
					<?php printf( __( 'Copyright &copy; %1$s %2$s', 'pblog' ), date( 'Y' ), get_bloginfo( 'name' ) ); ?>
				</span>
				<span class="footer-credit">
					<a href="http://ptheme.com/"><?php printf( __( 'Designed by %s', 'pblog' ), 'PTheme' ); ?></a>
				</span>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>