<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eqhby
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title">', '</h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					eqhby_posted_on();
					eqhby_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
