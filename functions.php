<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

// Customize Excerpt
// Replaces the excerpt "more" text by a link
function change_excerpt_more($more) {
  global $post;
	return ' <a class="moretag" href="'. get_permalink($post->ID) . '">Read the full article</a>';
}
add_filter('excerpt_more', 'change_excerpt_more');
