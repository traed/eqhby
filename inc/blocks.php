<?php

namespace eqhby;

class Blocks {

	public function __construct() {
		add_action('after_setup_theme', array($this, 'add_acf_blocks'));
		add_filter('block_categories', array($this, 'register_block_categories'), 10, 2);
	}

	
	public function register_block_categories($categories, $post) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'custom',
					'title' => 'Custom'
				)
			)
		);
	}


	public function add_acf_blocks() {
		if(function_exists('acf_register_block')) {
			acf_register_block(array(
				'name'				=> 'image-link',
				'title'				=> 'Bildlänk',
				'description'		=> 'En bild med en länk.',
				'render_callback'	=> array($this, 'render_block'),
				'icon' => 'format-image',
				'category' => 'custom'
			));

			acf_register_block(array(
				'name'				=> 'posts',
				'title'				=> 'Inlägg',
				'description'		=> 'Snyggare bloginlägg.',
				'render_callback'	=> array($this, 'render_block'),
				'icon' => 'admin-post',
				'category' => 'custom'
			));
		}
	}


	public function render_block($block) {
		$path = get_theme_file_path('/template-parts/blocks/' . $block['name'] . '.php');

		if(file_exists($path)) {
			include($path);
		}
	}
}

new Blocks();