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

namespace eqhby;

?>

	</main><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>&copy; Equmenia Hässelby</p>
			<a href="https://equmenia.se" target="_blank"><img src="<?php echo Theme::get_url('/assets/img/equmenia.png'); ?>" alt="Equmenia"></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
