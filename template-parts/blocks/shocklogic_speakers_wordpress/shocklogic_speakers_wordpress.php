<link rel="stylesheet" id="speakers-wordpress"
	href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_speakers_wordpress/shocklogic_speakers_wordpress.css" ?>"
	type="text/css" media="all">
<?php

$shocklogic_speakers_wordpress_group = get_field('shocklogic_speakers_wordpress_group');
$query_settings = get_field('query_settings')['query_settings'];
$wp_speakers_query = get_query($query_settings);

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$block_id = $block['id'];
$avatar = default_speaker_avatar();

//Speaker's modal
$speakers_modal = get_field('speakers_modal');
$style_of_modal = $speakers_modal['style_of_modal'] ?? "horizontal";

$show_job_title = (isset($speakers_modal['show_job_title']) && $speakers_modal['show_job_title']) ? "block" : "none";
$show_company_name = (isset($speakers_modal['show_company_name']) && $speakers_modal['show_company_name']) ? "block" : "none";

$speaker_name_colour = $speakers_modal['speaker_name_colour'] ?? "#000";
$job_title_colour = $speakers_modal['job_title_colour'] ?? "#000";
$company_name_colour = $speakers_modal['company_name_colour'] ?? "#000"; ?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}

	#$block_id .modal_dialog_content_body_left_name{color: $speaker_name_colour;}
	#$block_id .modal_dialog_content_body_left_jobtitle{display: $show_job_title; color: $job_title_colour;}
	#$block_id .modal_dialog_content_body_left_companyname{display: $show_company_name; color: $company_name_colour;}
	ITEM;
	echo $classes; ?>
</style>

<?php
if (isset($shocklogic_speakers_wordpress_group) && $shocklogic_speakers_wordpress_group != null) { ?>
	<div class="shocklogic_speakers_wordpress <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_speakers_wordpress_wrapper">

			<?php if ($shocklogic_speakers_wordpress_group['title']): ?>
				<div class="shocklogic_speakers_wordpress_wrapper_title">
					<?= $shocklogic_speakers_wordpress_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_speakers_wordpress_wrapper_speakers">
				<?php
				if ($wp_speakers_query->have_posts()) {
					$content = "";
					while ($wp_speakers_query->have_posts()) {
						$wp_speakers_query->the_post();
						$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

						$speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
						if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
							$title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
						} else {
							$title = get_the_title();
						} ?>
						<div class="shocklogic_speakers_wordpress_wrapper_speakers_speaker">
							<a data-bs-toggle="modal" data-bs-target="#<?= "speaker" . get_the_ID() ?>">
								<img src="<?= $image_url ?>" alt="">
							</a>
							<div class="shocklogic_speakers_wordpress_wrapper_speakers_speaker_name">
								<?= $title ?>
							</div>
						</div>
						<?php
					}
					; //while
					wp_reset_query();
				} //if
				else {
					echo "No posts were found";
				}
				?>
			</div>
			<?php
			if ($shocklogic_speakers_wordpress_group['bottom_text']) { ?>
				<div class="shocklogic_speakers_wordpress_wrapper_bottom_text">
					<?= $shocklogic_speakers_wordpress_group['bottom_text'] ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>

	<div class="shocklogic_speakers_wordpress_wrapper_modals" id="<?= $block_id ?>">
		<?php
		$params = ["query" => $wp_speakers_query, "avatar" => $avatar];
		if ($style_of_modal == "vertical"):
			echo get_template_part("template-parts/modals/speakers/modals_speakers", "vertical", $params);
		elseif ($style_of_modal == "horizontal"):
			echo get_template_part("template-parts/modals/speakers/modals_speakers", "horizontal", $params);
		endif;
		?>
	</div>
	<?php
}