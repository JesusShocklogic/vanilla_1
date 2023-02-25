<link rel="stylesheet" id="shocklogic_speakers_slider_wordpress" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_speakers_slider_wordpress/shocklogic_speakers_slider_wordpress.css" ?>" type="text/css" media="all">
<?php
//Initialize Swiper
wp_enqueue_style("swiper-css");
wp_enqueue_script("swiper-js");
wp_enqueue_style("modal-css");

$shocklogic_speakers_slider_wordpress_group = get_field('shocklogic_speakers_slider_wordpress_group');
$wp_query = get_query(get_field('query_settings')['query_settings']);

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];
$background = $general_settings['background_colour'];
$avatar = default_speaker_avatar();

//Speaker's modal
$speakers_modal = get_field('speakers_modal');

$show_job_title = $speakers_modal['show_job_title'] ? "block" : "none";
$show_company_name = $speakers_modal['show_company_name'] ? "block" : "none";

$speaker_name_colour = $speakers_modal['speaker_name_colour'] ?? "#000";
$job_title_colour = $speakers_modal['job_title_colour'] ?? "#000";
$company_name_colour = $speakers_modal['company_name_colour'] ?? "#000"; ?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background;
	}

	#$block_id .modal_dialog_content_body_left_name{color: $speaker_name_colour;}
	#$block_id .modal_dialog_content_body_left_jobtitle{display: $show_job_title; color: $job_title_colour;}
	#$block_id .modal_dialog_content_body_left_companyname{display: $show_job_title; color: $company_name_colour;}
	
	ITEM;

	echo $classes;

	?>
</style>
<?php
if (isset($shocklogic_speakers_slider_wordpress_group) && $shocklogic_speakers_slider_wordpress_group != null) { ?>
	<div class="shocklogic_speakers_slider_wordpress <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_speakers_slider_wordpress_wrapper">
			<?php if ($shocklogic_speakers_slider_wordpress_group['title']) : ?>
				<div class="shocklogic_speakers_slider_wordpress_wrapper_title">
					<?= $shocklogic_speakers_slider_wordpress_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_speakers_slider_wordpress_wrapper_speakers">
				<div class="swiper mySwiper">
					<div class="swiper-wrapper">
						<?php
						if ($wp_query->have_posts()) {
							$content = "";
							while ($wp_query->have_posts()) {
								$wp_query->the_post();
								$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

								$speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
								if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
									$title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
								} else {
									$title = get_the_title();
								} ?>
								<div class="swiper-slide">
									<a data-bs-toggle="modal" data-bs-target="#<?= "speaker" . get_the_ID() ?>">
										<img src="<?= $image_url ?>" alt="">
									</a>
									<div class="shocklogic_speakers_slider_wordpress_wrapper_speakers_name">
										<?= $title ?>
									</div>
								</div>

						<?php
							}; //while
							wp_reset_query();
						} //if
						else {
							echo "No posts were found";
						} ?>
					</div>
					<div class="swiper-button-next d-none"></div>
					<div class="swiper-button-prev d-none"></div>
				</div>
			</div>

			<div class="shocklogic_speakers_slider_wordpress_wrapper_bottom_text">
				<?php echo $shocklogic_speakers_slider_wordpress_group['bottom_text']; ?>
			</div>

		</div>
	</div>

	<div class="shocklogic_speakers_slider_wordpress_wrapper_modals" id="<?= $block_id ?>">
		<?php
		if ($wp_query->have_posts()) {
			while ($wp_query->have_posts()) {
				$wp_query->the_post();
				$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;
				$speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
				if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
					$title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
				} else {
					$title = get_the_title();
				} ?>

				<!-- Modal -->
				<div class="modal fade" id="<?= "speaker" . get_the_ID() ?>" tabindex="-1" aria-labelledby="<?= "speaker" . get_the_ID() ?>Label" aria-hidden="true">
					<div class="modal-dialog modal-xl modal_dialog">
						<div class="modal-content modal_dialog_content">
							<div class="modal-header">
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body modal_dialog_content_body">
								<div class="modal_dialog_content_body_left">
									<div class="modal_dialog_content_body_left_image">
										<img src="<?= $image_url ?>" alt="">
									</div>
									<strong class="modal_dialog_content_body_left_name"><?= $title ?></strong>
									<div class="modal_dialog_content_body_left_jobtitle"><?= ($speaker_wordpress_group['job_title'] ?? '') ?></div>
									<div class="modal_dialog_content_body_left_companyname"><?= ($speaker_wordpress_group['company_organizarion'] ?? '') ?></div>
								</div>
								<div class="modal_dialog_content_body_right">
									<div class="modal_dialog_content_body_right_content">
										<?php the_content() ?>
									</div>
								</div>
							</div>
							<div class="modal-footer"></div>
						</div>
					</div>
				</div>

		<?php
			}; //while
			wp_reset_query();
		} //if
		?>
	</div>
<?php
}
