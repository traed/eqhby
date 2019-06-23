<?php

namespace eqhby;

$type = get_field('posts_type');
$cols = get_field('posts_columns');

if ($type === 'latest') {
	$num_posts = get_field('posts_num');
	$query = new \WP_Query([
		'posts_per_page' => $num_posts,
		'post_status' => 'publish',
		'post_type' => 'post'
	]);
} else {
	$post_ids = get_field('posts');
	$query = new \WP_Query([
		'post__in' => $post_ids
	]);
}

?>

<div class="block-wrapper block-posts posts">
	<div class="block posts-block col-<?php echo $cols; ?>">
		<?php
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<header class="entry-header">
							<?php
							the_title( '<h3 class="entry-title">', '</h3>' );

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
							<?php echo wp_trim_words(apply_filters('the_excerpt', has_excerpt() ? get_the_excerpt() : get_the_content()), 30, '...'); ?>
						</div><!-- .entry-content -->
					</a>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
</div>