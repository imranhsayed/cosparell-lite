<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cosparell
 */
?>

	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-wrap">
		<!-- //code for displaying footer widgets -->
			<?php if( is_active_sidebar('Footer Widgets' )): ?>
				
				<div id="custom-footer" class="clear">
					<?php dynamic_sidebar('Footer Widgets' ); ?>
				</div><!-- END #custom-footer -->

			<?php endif; ?>
		</div><!-- END .footer-wrap -->
	
		<div class="site-info clear">
			<div class="footer-wrap">
				<ul>
					<li>
					<a href="http://wordpress.org/"><?php printf( __( 'Proudly powered by %s', 'cosparell' ), 'WordPress' ); ?></a>
					</li>
					<li>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'Cosparell' ), 'Cosparell', '<a href="http://supernovathemes.com" rel="designer">Ghafir Sayed</a>' ); ?>
					</li>
				</ul>
				<!-- ICONS -->
				<ul class="footer-icons">
					<li class="footer-facebook"><a href="<?php echo cosparell_social_links('Facebook');  ?>"><span></span></a></li>
					<li class="footer-twitter"><a href="<?php echo cosparell_social_links('Twitter');  ?>"><span></span></a></li>
					<li class="footer-rss"><a href="<?php echo cosparell_social_links('RSS');  ?>"><span></span></a></li>
					<li class="footer-youtube"><a href="<?php echo cosparell_social_links('Youtube');  ?>"><span></span></a></li>
				</ul>
			</div> <!-- END .footer-wrap -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
<div class="footer-scroll"><span></span></div> 

<?php wp_footer(); ?>
</body>
</html>
