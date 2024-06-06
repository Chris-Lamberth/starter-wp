<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<?php get_template_part('components/favicon'); ?>
	<?php wp_head(); ?>
</head>