<?php

namespace eqhby;

$image = get_field('image_link_image');
$text = get_field('image_link_text');
$type = get_field('image_link_type');
$link = get_field('image_link_' . $type);

?>

<div class="block-wrapper block-image-link">
	<?php if($link): ?><a href="<?php echo $link; ?>"><?php endif; ?>
		<figure class="wp-block-image">
			<?php echo wp_get_attachment_image($image, 'large'); ?>
			<figcaption><?php echo $text; ?></figcaption>
		</figure>
	<?php if($link): ?></a><?php endif; ?>
</div>