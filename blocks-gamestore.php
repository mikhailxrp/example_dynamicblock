<?php
/**
 * Plugin Name:       Blocks Gamestore
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dynamicblock
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
};

// функция для динамического вывода постов в блоке на фронтенде
function dynamicblock_render_callback($attributes) {
	$args = array(
		'posts_per_page' => $attributes['postsPerPage'],
		'post_status' => 'publish',
	);
	$latest_post = get_posts($args);

	$html = "<div ".get_block_wrapper_attributes()." >";
	if(!empty($latest_post)) {
		foreach($latest_post as $post) {
		  $html .="<div>";
			if($attributes['showImage'] && has_post_thumbnail($post)) {
				$html .= "<a href='".esc_url(get_permalink($post))."'>";
			  $html .= wp_kses_post(get_the_post_thumbnail($post, 'large'));
				$html .= "</a>";
			}
			$html .="<time datetime='".esc_attr(get_the_date('c', $post))."' >".esc_html(get_the_date('', $post))."</time>";
		  $html .="<h2><a href='".esc_url(get_permalink($post))."'>".esc_html(get_the_title($post))."</a></h2>";
			$html .="<p>".esc_html(get_the_excerpt($post))."</p>";
		  $html .="</div>";
		}
	}
	$html .="</div>";
	return $html;
}


function wdn_dynamicblock_block_init() {
	register_block_type( __DIR__ . '/build/dynamicblock', array("render_callback" => "dynamicblock_render_callback") );
}
add_action( 'init', 'wdn_dynamicblock_block_init' );
