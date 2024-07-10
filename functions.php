<?php

// Theme setup
function theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'THEMENAME'),
    ));
}
add_action('after_setup_theme', 'theme_setup');

// Enqueue styles and scripts
function theme_scripts() {
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');

// Disable Emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// Disable Gutenberg Block Library CSS
function theme_remove_wp_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles'); 
}
add_action('wp_enqueue_scripts', 'theme_remove_wp_block_library_css', 100);

// Disable Classic Theme Styles
function theme_remove_classic_theme_styles() {
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'theme_remove_classic_theme_styles', 100);

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove WordPress version meta tag
remove_action('wp_head', 'wp_generator');


// Load custom templates from the 'pages' folder
function theme_page_templates($template) {
	global $post;

	if ($post) {
		 $template_name = get_post_meta($post->ID, '_wp_page_template', true);

		 if ($template_name && $template_name !== 'default') {
			  $template_path = get_template_directory() . '/pages/' . $template_name;

			  if (file_exists($template_path)) {
					return $template_path;
			  }
		 }
	}

	return $template;
}
add_filter('template_include', 'theme_page_templates');


// Helper function for directories
function images($path = '') {
	return get_template_directory_uri() . '/media/images/' . ltrim($path, '/');
}

