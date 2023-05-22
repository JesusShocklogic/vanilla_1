<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php is_front_page() ? the_title() : wp_title(''); ?>
	</title>

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
			color:
				<?= $general_theme_settings['general_links_colour'] ?? "auto" ?>
			;
			text-decoration: none;
		}

		a:hover {
			color:
				<?= $general_theme_settings['general_links_colour_hover'] ?? "auto" ?>
			;
		}

		header .navbar {
			background-color:
				<?= $general_menu_group['background_colour'] ?>
			;
			box-shadow: 0px 5px 6px #00000029;
		}

		header .navbar .container-fluid {
			gap: 10px;
		}

		header .navbar .menu-item {
			width: max-content;
		}

		header .navbar .menu-item .nav-link {
			color:
				<?= $general_menu_group['menu_items_text_colour'] ?>
			;
		}

		header .navbar .menu-item .nav-link:hover {
			color:
				<?= $general_menu_group['menu_items_text_colour_hover'] ?>
			;
		}

		header .navbar .menu-item .nav-link.active {
			color:
				<?= $general_menu_group['active_menu_item'] ?>
			;
		}

		/* Sizes for the menu logo */
		header .navbar-collapse {
			max-width: 100%;
		}

		header a.navbar-brand {
			display: block;
		}

		header a.navbar-brand {
			width:
				<?= $general_menu_group['logo_mobile_width'] ?? "200px"; ?>
			;
		}

		/* tablet */
		@media (min-width: 769px) {
			header a.navbar-brand {
				width:
					<?= $general_menu_group['logo_tablet_width'] ?? "200px"; ?>
				;
			}
		}

		/* Desktop */
		@media (min-width: 1200px) {
			header a.navbar-brand {
				width:
					<?= $general_menu_group['logo_desktop_width'] ?? "180px"; ?>
				;
			}
		}
	</style>

	<header>
		<nav class="navbar navbar-expand-xl <?= $general_menu_group['menus_position'] ?>">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

					<a class="navbar-brand" href="<?= get_home_url() ?>">
						<img src="<?= $general_menu_group['logo']['url'] ?>" alt="">
					</a>
					<?php
					//Printing the menu
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_id' => 'main-menu',
							'container' => false,
							'menu_class' => 'navbar-nav ms-auto mb-2 mb-md-0',
							'fallback_cb' => '__return_false',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 2,
							'walker' => new bootstrap_5_wp_nav_menu_walker()
						)
					);
					?>
					<?php
					//Printing the right menu button
					if ($general_menu_group['enable_button']) {
						echo get_template_part("template-parts/menu/menu", "button", $general_menu_group['button_group']);
					}
					?>
				</div>
			</div>
		</nav>
	</header>

	<?php
	if ($general_menu_group['menus_position'] == "fixed-top") {
		echo get_template_part("template-parts/menu/fixed-menu", "spacing");
	}
	?>