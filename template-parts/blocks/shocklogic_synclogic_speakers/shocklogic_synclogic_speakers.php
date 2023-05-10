<?php
if (defined('Synclogic')) {

	?>
	<link rel="stylesheet" id="shocklogic_synclogic_speakers"
		href="<?= get_template_directory_uri() ?>/template-parts/blocks/shocklogic_synclogic_speakers/shocklogic_synclogic_speakers.css"
		type="text/css" media="all">
	<?php
	wp_enqueue_style("modal-speakers");

	$shocklogic_synclogic_speakers_group = get_field('shocklogic_synclogic_speakers_group');

	$general_settings = get_field('general_settings');
	$spacing = $general_settings['spacing'];
	$background_colour = $general_settings['background_colour'];

	$block_id = $block['id'];
	$avatar = default_speaker_avatar();


	$speakers = null;
	if ($shocklogic_synclogic_speakers_group['content_select'] == "all") {
		$speakers = synclogic_get_all_speakers();
	}
	if ($shocklogic_synclogic_speakers_group['content_select'] == "categories") {
		$categories = "";
		$categories = array_map(function ($category) {
			return $category['category'];
		}, $shocklogic_synclogic_speakers_group['categories']);

		$categories = implode(",", $categories);
		$speakers = synclogic_get_all_speakers_by_categories($categories);
	}

	//Speaker's modal
	$speakers_modal = get_field('speakers_modal');
	$style_of_modal = $speakers_modal['style_of_modal'] ?? "horizontal";
	?>

	<style>
		<?php
		$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}
	ITEM;

		echo $classes;

		?>
	</style>
	<?php
	if (isset($shocklogic_synclogic_speakers_group) && $shocklogic_synclogic_speakers_group != null) { ?>
		<div class="shocklogic_synclogic_speakers <?= $spacing ?>" id="<?= $block_id ?>">
			<div class="shocklogic_synclogic_speakers_wrapper">
				<?php if ($shocklogic_synclogic_speakers_group['title']): ?>
					<div class="shocklogic_synclogic_speakers_wrapper_title">
						<?= $shocklogic_synclogic_speakers_group['title'] ?>
					</div>
				<?php endif; ?>

				<div class="shocklogic_synclogic_speakers_wrapper_speakers">
					<?php
					if ($speakers):
						$content = "";
						foreach ($speakers as $key => $speaker) {
							$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;
							$title = $speaker->speaker_name . " " . $speaker->speaker_family_name; ?>
							<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker">
								<a data-bs-toggle="modal" data-bs-target="#speaker-<?= $speaker->speaker_id ?>">
									<img src="<?= $image_url ?>" alt="">
								</a>
								<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker_name">
									<?= $title ?>
								</div>
							</div>
							<?php
						} //foreach
					else:
						echo "No posts were found";
					endif;
					?>
				</div>
				<?php if ($shocklogic_synclogic_speakers_group['bottom_text']): ?>
					<div class="shocklogic_synclogic_speakers_wrapper_bottom_text">
						<?= $shocklogic_synclogic_speakers_group['bottom_text'] ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="shocklogic_synclogic_speakers_wrapper_modals" id="<?= $block_id ?>">
			<?php
			$params = ["speakers" => $speakers, "avatar" => $avatar, "speakers_modal" => $speakers_modal, "block_id" => $block_id];
			if ($style_of_modal == "vertical"):
				echo get_template_part("template-parts/modals/speakers/modals_speakers", "synclogic-vertical", $params);
			elseif ($style_of_modal == "horizontal"):
				echo get_template_part("template-parts/modals/speakers/modals_speakers", "synclogic-horizontal", $params);
			endif;
			?>
		</div>
		<?php
	} // if shocklogic_synclogic_speakers_group is set
} else {
	echo "This block requires Shocklogic Synclogic plugin to be installed. Contact shocklogic.com for more information";
}
; //if class Synclogic exist
