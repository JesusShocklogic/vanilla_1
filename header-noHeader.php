<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php is_front_page() ? the_title() : wp_title(''); ?></title>

	<?php
	wp_head();

	$general_theme_settings = get_field('general_theme_settings_group', 'option');
	$general_menu_group = get_field("general_menu_group", 'option');
	$general_social_icons = get_field('general_social_icons', 'option');

	if (isset($general_theme_settings['fav_icon'])) {
		// Fav icons
		echo get_template_part("template-parts/head/fav", "icon", $general_theme_settings['fav_icon']);
	} // Fav icons
	?>
</head>

<body>

	<?php
	//Social icon widget
	if ($general_social_icons) {
		echo get_template_part("template-parts/social-icons/social-icons", "widget", get_field('general_social_icons_group', 'option'));
	}
	?>
	<style>
		a {
			color: <?= $general_theme_settings['general_links_colour'] ?? "auto" ?>;
			text-decoration: none;
		}

		a:hover {
			color: <?= $general_theme_settings['general_links_colour_hover'] ?? "auto" ?>;
		}
	</style>