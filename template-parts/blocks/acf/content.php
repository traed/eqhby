<?php

namespace eqhby;

$post_type = get_field('post_type');
$query = [
	'post_type' => $post_type,
	'post_status' => 'publish',
	'numberposts' => 1
];

if($post_type === 'bkl_occasion') {
	$now = Theme::get_date('now')->format('Y-m-d');
	$query = array_merge($query, [
		'meta_query' => [
			'relation' => 'AND',
			[
				'key' => 'date_start',
				'compare' => '>=',
				'value' => $now,
				'type' => 'DATE'
			],
			[
				'key' => 'date_signup',
				'compare' => '<=',
				'value' => $now,
				'type' => 'DATE'
			]
		],
		'orderby' => 'meta_value',
		'order' => 'ASC'
	]);
} else {
	$query['orderby'] = 'date';
	$query['order'] = 'DESC';
}

$posts = get_posts($query);
$post = reset($posts);

echo apply_filters('the_content', $post->post_content);