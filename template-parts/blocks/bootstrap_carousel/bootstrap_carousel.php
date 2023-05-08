<link rel="stylesheet" id="bootstrap_carousel"
	href="<?= get_template_directory_uri() . "/template-parts/blocks/bootstrap_carousel/bootstrap_carousel.css" ?>"
	type="text/css" media="all">

<?php
$bootstrap_carousel_group = get_field('bootstrap_carousel_group');
$slides = isset($bootstrap_carousel_group['slides']) ? $bootstrap_carousel_group['slides'] : null;
$general_settings = get_field('general_settings');
$block_id = $block['id'];
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$showhide_arrows = (isset($bootstrap_carousel_group['showhide_arrows'])) ? (($bootstrap_carousel_group['showhide_arrows'] == "show") ? true : false) : true;
$showhide_bullet_dots = (isset($bootstrap_carousel_group['showhide_bullet_dots'])) ? (($bootstrap_carousel_group['showhide_bullet_dots'] == "show") ? true : false) : true;

if (isset($bootstrap_carousel_group['aspect_ratio'])):
	if ($bootstrap_carousel_group['aspect_ratio'] == "full_screen"):
		$aspect_ratio = "height: 100dvh";
	elseif ($bootstrap_carousel_group['aspect_ratio'] == "16x9"):
		$aspect_ratio = "aspect-ratio: 16 / 9";
	elseif ($bootstrap_carousel_group['aspect_ratio'] == "auto"):
		$aspect_ratio = "aspect-ratio: auto";
	elseif ($bootstrap_carousel_group['aspect_ratio'] == "custom"):
		$custom_height = $bootstrap_carousel_group['custom_height'] ?? "300px";
		$aspect_ratio = "height:" . $custom_height;
	endif;
else:
	$aspect_ratio = "aspect-ratio: auto";
endif;

$object_fit = (isset($bootstrap_carousel_group['object_fit']) && $bootstrap_carousel_group['object_fit']) ? $bootstrap_carousel_group['object_fit'] : "contain";
if (isset($bootstrap_carousel_group['fade_effect'])):
	$fade_effect = ($bootstrap_carousel_group['fade_effect'] == false) ? "" : "carousel-fade";
endif;

$slides_time_interval = (isset($bootstrap_carousel_group['slides_time_interval'])) ? $bootstrap_carousel_group['slides_time_interval'] : 3000;
?>
<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}
	#$block_id .carousel-item{
		width: 100%;
		$aspect_ratio;
	}
	#$block_id .bootstrap_carousel_group_carousel_inner_item img{
		object-fit: $object_fit;
	}
ITEM;
	echo $classes;
	?>
</style>

<?php
if (isset($bootstrap_carousel_group) && $bootstrap_carousel_group != null) {
	if ($slides): ?>
		<div class="bootstrap_carousel <?= $spacing ?>" id="<?= $block_id ?>" data-bs-ride="carousel">
			<div id="carousel_<?= $block_id ?>" class="carousel slide <?= $fade_effect ?> bootstrap_carousel_group_carousel">

				<?php if ($showhide_bullet_dots): ?>
					<div class="carousel-indicators">
						<button type="button" data-bs-target="#carousel_<?= $block_id ?>" data-bs-slide-to="0" class="active"
							aria-current="true" aria-label="Slide 1"></button>
						<button type="button" data-bs-target="#carousel_<?= $block_id ?>" data-bs-slide-to="1"
							aria-label="Slide 2"></button>
						<button type="button" data-bs-target="#carousel_<?= $block_id ?>" data-bs-slide-to="2"
							aria-label="Slide 3"></button>
					</div>
				<?php endif; ?>
				<div class="carousel-inner bootstrap_carousel_group_carousel_inner">
					<?php
					foreach ($slides as $key => $slide): ?>
						<div data-bs-interval="<?= $slides_time_interval ?>"
							class="carousel-item bootstrap_carousel_group_carousel_inner_item <?= ($key == 0) ? "active" : ""; ?>">
							<img src="<?= $slide['slide']['url'] ?>" class="d-block" alt="<?= $slide['slide']['alt'] ?>">
						</div>
						<?php
					endforeach;
					?>
				</div>
				<?php if ($showhide_arrows): ?>
					<button class="carousel-control-prev" type="button" data-bs-target="#carousel_<?= $block_id ?>"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carousel_<?= $block_id ?>"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				<?php endif; ?>
			</div>
		</div>
		<?php
	else:
		echo "No slides detected";
	endif;
} else {
	echo "No settings where found";
}