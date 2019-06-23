<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eqhby
 */

?>

	</main><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div><a href="<?php echo home_url('ledare'); ?>" rel="nofollow">Logga in</a></div>
			<p>&copy; Equmenia Hässelby</p>
			<div><img src="<?php echo Theme::get_url('/assets/img/equmenia.png'); ?>" alt="Equmenia"></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
