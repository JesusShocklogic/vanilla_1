<link rel="stylesheet" id="shocklogic_synclogic_speakers" href="<?= get_template_directory_uri() ?>/template-parts/blocks/shocklogic_synclogic_speakers/shocklogic_synclogic_speakers.css" type="text/css" media="all">
<?php
wp_enqueue_style("modal-css");

$shocklogic_synclogic_speakers_group = get_field('shocklogic_synclogic_speakers_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$block_id = $block['id'];
$avatar = default_speaker_avatar();

$captions = $shocklogic_synclogic_speakers_group['captions_group'];

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

$show_job_title = $speakers_modal['show_job_title'] ? "block" : "none";
$show_company_name = $speakers_modal['show_company_name'] ? "block" : "none";

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
	#$block_id .modal_dialog_content_body_left_companyname{display: $show_job_title; color: $company_name_colour;}
	
	ITEM;

	echo $classes;

	?>
</style>
<?php
if (isset($shocklogic_synclogic_speakers_group) && $shocklogic_synclogic_speakers_group != null) { ?>
	<div class="shocklogic_synclogic_speakers <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_synclogic_speakers_wrapper">
			<?php if ($shocklogic_synclogic_speakers_group['title']) : ?>
				<div class="shocklogic_synclogic_speakers_wrapper_title">
					<?= $shocklogic_synclogic_speakers_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_synclogic_speakers_wrapper_speakers">
				<?php
				if ($speakers) :
					$content = "";
					foreach ($speakers as $key => $speaker) {
						$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;
						$title = $speaker->speaker_name . " " . $speaker->speaker_family_name; ?>
						<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker">
							<a data-bs-toggle="modal" data-bs-target="#speaker-<?= $speaker->speaker_id ?>">
								<img src="<?= $image_url ?>" alt="">
							</a>
							<div class="shocklogic_synclogic_speakers_wrapper_speakers_speaker_name"><?= $title ?></div>
						</div>
				<?php
					} //foreach
				else :
					echo "No posts were found";
				endif;
				?>
			</div>
			<?php if ($shocklogic_synclogic_speakers_group['bottom_text']) : ?>
				<div class="shocklogic_synclogic_speakers_wrapper_bottom_text">
					<?= $shocklogic_synclogic_speakers_group['bottom_text'] ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="shocklogic_synclogic_speakers_wrapper_modals" id="<?= $block_id ?>">
		<?php
		if ($speakers) {
			$content = "";
			foreach ($speakers as $key => $speaker) {
				$image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;

				$title = $speaker->speaker_name . " " . $speaker->speaker_family_name;
		?>

				<!-- Modal -->
				<div class="modal fade" id="speaker-<?= $speaker->speaker_id ?>" tabindex="-1" aria-labelledby="speaker-<?= $speaker->speaker_id ?>Label" aria-hidden="true">
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
									<div class="modal_dialog_content_body_left_jobtitle"><?= ($speaker->job_title ?? '') ?></div>
									<div class="modal_dialog_content_body_left_companyname"><?= ($speaker->company ?? '') ?></div>
								</div>
								<div class="modal_dialog_content_body_right">
									<div class="modal_dialog_content_body_right_content">
										<?= $speaker->biography ?>
									</div>
								</div>
							</div>

							<?php
							$sessions = get_sessions_by_speaker_id($speaker->speaker_id);
							if ($sessions) : ?>
								<div class="modal-footer modal_dialog_content_footer">
									<?php
									foreach ($sessions as $key => $session) {
										$session_title = $session->session_title ?? null;
										$session_day_name = $session->session_day_name ?? null;
										$start_time = $session->start_time ?? null;
										$end_time = $sessions->end_time ?? null;

										$rol = "| ";
										if ($session->IsSpeaker) :
											$rol .= $captions['speaker'];
										elseif ($session->IsChair) :
											$rol .= $captions['chair'];
										elseif ($session->IsCoChair) :
											$rol .= $captions['co_chair'];
										endif;

										$presentations = get_presentations_by_speaker_and_author($speaker->speaker_id, $speaker->speaker_email, $session->session_id);
									?>
										<div class="modal_dialog_content_footer_session">
											<?php if ($session_title) : ?>
												<div>
													<div class="modal_dialog_content_footer_session_title"><?= $session->session_title; ?></div>
													<div class="modal_dialog_content_footer_session_rol"><?= $rol; ?></div>
												</div>
											<?php endif; ?>

											<div>
												<?php if ($session_day_name) : ?>
													<div class="modal_dialog_content_footer_session_day_name"><?= $session->session_day_name; ?></div>
												<?php endif; ?>
												<?php if ($start_time) : ?>
													<div class="modal_dialog_content_footer_session_time">
														<?php if ($session->start_time) : echo " | " . $session->start_time;
															if ($end_time) : echo " - " . $end_time;
															endif;
														endif; ?>
													</div>
												<?php endif; ?>
											</div>

											<?php if ($shocklogic_synclogic_speakers_group['link_to_programme'] == "link_to_programme") :
												$programme_page_link = isset($shocklogic_synclogic_speakers_group['programme_page_link']) ? $shocklogic_synclogic_speakers_group['programme_page_link'] : null;
												if ($programme_page_link) :
													$getTab = getDayProgrammeTab($session->session_day); ?>
													<div>
														<a href="<?= $programme_page_link . "?DayTab=" . $getTab . "&SessionId=" . $session->session_id ?>">
															<?= $shocklogic_synclogic_speakers_group['programme_link_caption'] ?>
														</a>
													</div>
											<?php endif;
											endif; ?>

											<?php if ($presentations) : ?>
												<div class="modal_dialog_content_footer_session_presentations">
													<?php
													if ($captions['presentations_title']) : ?>
														<div class="modal_dialog_content_footer_session_presentations_title"><?= $captions['presentations_title'] ?></div>
													<?php endif; ?>
													<ul class="modal_dialog_content_footer_session_presentations_presentation">
														<?php foreach ($presentations as $key => $presentation) { ?>
															<li class="modal_dialog_content_footer_session_presentations_presentation_title"><?= $presentation->presentation_title ?></li>
														<?php } //foreach 
														?>
													</ul>
												</div>
											<?php endif; ?>
										</div>
									<?php } ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

		<?php
			}; //foreach
		} //if
		?>
	</div>
<?php
}
