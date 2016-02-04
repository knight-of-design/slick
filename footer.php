<?php
/**
 * The template for displaying the footer.
 *
 * @package Fluffy
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

	        <div id="footer-widgets">
	            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
	                <aside id="widget-foot" class="widget-foot">
	                    <?php dynamic_sidebar( 'footer' ); ?>
	                </aside>
	            <?php endif; ?>
	        </div><!-- end #footer-widgets -->

			<div class="site-info">
				<div id="menu">
					<?php wp_nav_menu( array( 'theme_location' => 'slick-footer-menu' ) ); ?>
				</div>
				<div class="right-side">
					<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>. All Rights Reserved.</p>
	        <p class="credits"><?php printf( __( 'Theme: %1$s by %2$s.', 'slick' ), 'Slick', 'James Knight' ); ?></p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
