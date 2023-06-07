<link rel="stylesheet" id="shocklogic_synclogic_exhibitors"
	href="<?= get_template_directory_uri() ?>/template-parts/blocks/shocklogic_synclogic_exhibitors/shocklogic_synclogic_exhibitors.css"
	type="text/css" media="all">
<?php
wp_enqueue_style("modal-partners");
$shocklogic_synclogic_exhibitors_group = get_field('shocklogic_synclogic_exhibitors_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$block_id = $block['id'];
$avatar = default_speaker_avatar();


$speakers = null;
$speakers = get_exhibitors_sl();
var_dump($speakers);


//Speaker's modal
$synclogic_speakers_modal = get_field('synclogic_speakers_modal');
$style_of_modal = $synclogic_speakers_modal['style_of_modal'] ?? "horizontal";
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
if (isset($shocklogic_synclogic_exhibitors_group) && $shocklogic_synclogic_exhibitors_group != null) { ?>
	<div class="shocklogic_synclogic_exhibitors <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_synclogic_exhibitors_wrapper">
			<?php if ($shocklogic_synclogic_exhibitors_group['title']): ?>
				<div class="shocklogic_synclogic_exhibitors_wrapper_title">
					<?= $shocklogic_synclogic_exhibitors_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_synclogic_exhibitors_wrapper_speakers">
				<?php
				if ($speakers):
					$content = "";
					foreach ($speakers as $key => $speaker) {
						$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;
						$title = $speaker->speaker_name . " " . $speaker->speaker_family_name; ?>
						<div class="shocklogic_synclogic_exhibitors_wrapper_speakers_speaker">
							<a data-bs-toggle="modal" data-bs-target="#speaker-<?= $speaker->speaker_id ?>">
								<img src="<?= $image_url ?>" alt="">
							</a>
							<div class="shocklogic_synclogic_exhibitors_wrapper_speakers_speaker_name">
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
			<?php if ($shocklogic_synclogic_exhibitors_group['bottom_text']): ?>
				<div class="shocklogic_synclogic_exhibitors_wrapper_bottom_text">
					<?= $shocklogic_synclogic_exhibitors_group['bottom_text'] ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
} // if shocklogic_synclogic_exhibitors_group is set

; //if class Synclogic exist
