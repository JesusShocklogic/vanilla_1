<link rel="stylesheet" id="shocklogic_buttons" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_buttons/shocklogic_buttons.css" ?>" type="text/css" media="all">
<?php
$shocklogic_buttons_group = get_field('shocklogic_buttons_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];
$background_colour = $general_settings['background_colour'];

$width = $shocklogic_buttons_group['button_width'] ?? "auto";
if ($shocklogic_buttons_group['button_width'] != "auto") {
	$width = "min(100%, $width)";
}

$button_style = $shocklogic_buttons_group['button_style'];
if ($shocklogic_buttons_group['button_style'] == "solid") :
	$background_color = $shocklogic_buttons_group['main_colour'];
	$color = $shocklogic_buttons_group['secondary_colour'];
	$border = "1px solid " . $background_color;
	$background_color_hover = $shocklogic_buttons_group['secondary_colour'];
	$color_hover = $shocklogic_buttons_group['main_colour'];
	$border_hover = $border;

elseif ($shocklogic_buttons_group['button_style'] == "bordered") :
	$background_color = $shocklogic_buttons_group['secondary_colour'];
	$color = $shocklogic_buttons_group['main_colour'];
	$border = "1px solid " . $shocklogic_buttons_group['main_colour'];
	$background_color_hover = $shocklogic_buttons_group['main_colour'];
	$color_hover = $shocklogic_buttons_group['secondary_colour'];
	$border_hover = "1px solid " . $shocklogic_buttons_group['secondary_colour'];
endif;
?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}
	#$block_id .shocklogic_buttons_wrapper_buttons_button{
		width: $width;
	}
	#$block_id .shocklogic_buttons_wrapper_buttons_button a {
		background-color: $background_color;
		color: $color;
		border: $border;
	}
	#$block_id .shocklogic_buttons_wrapper_buttons_button a:hover {
		background-color: $background_color_hover;
		color: $color_hover;
		border: $border_hover;
	}
	ITEM;

	echo $classes;

	?>
</style>

<?php

if ($shocklogic_buttons_group) : ?>

	<div class="shocklogic_buttons <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_buttons_wrapper">
			<?php
			$buttons = $shocklogic_buttons_group['buttons'];
			if ($buttons) : ?>
				<div class="shocklogic_buttons_wrapper_buttons">
					<?php
					foreach ($buttons as $key => $button) {
						$link = $button['link'];
						if ($link) :
							$image_url = $button['image']['url'] ?? null;
							$link_url = esc_url($link['url']);
							$link_title = esc_html($link['title']);
							$link_target = $link['target'] ? $link['target'] : '_self';
							$link_target = esc_attr($link_target); ?>
							<div class="shocklogic_buttons_wrapper_buttons_button">
								<a href="<?= $link_url ?>" target="<?= $link_target ?>" class="btn">
									<?php if ($image_url) : ?>
										<img src="<?= $image_url ?>" alt="" srcset="">
									<?php endif; ?>
									<?= $link_title ?>
								</a>
							</div>
					<?php
						endif;
					} //foreach
					?>
				</div>
			<?php endif; ?>
		</div>
	</div>


<?php
endif;
