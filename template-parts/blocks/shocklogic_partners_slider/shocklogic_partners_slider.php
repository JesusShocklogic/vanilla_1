<link rel="stylesheet" id="shocklogic_partners_slider" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_partners_slider/shocklogic_partners_slider.css" ?>" type="text/css" media="all">
<?php
//Initialize Swiper
wp_enqueue_style("swiper-css");
wp_enqueue_script("swiper-js");
wp_enqueue_style("modal-partners");

$shocklogic_partners_slider_group = get_field('shocklogic_partners_slider_group');
$wp_query = get_query(get_field('query_settings')['query_settings']);

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];
$background_colour = $general_settings['background_colour'];
$avatar = default_partners_avatar(); ?>

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
if (isset($shocklogic_partners_slider_group) && $shocklogic_partners_slider_group != null) { ?>
	<div class="shocklogic_partners_slider <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_partners_slider_wrapper">
			<?php if ($shocklogic_partners_slider_group['title']) : ?>
				<div class="shocklogic_partners_slider_wrapper_title">
					<?= $shocklogic_partners_slider_group['title'] ?>
				</div>
			<?php endif; ?>
			<div class="shocklogic_partners_slider_wrapper_partners">
				<?php
				if ($wp_query->have_posts()) { ?>
					<div class="swiper mySwiper">
						<div class="swiper-wrapper">
							<?php
							//For internal links
							if ($shocklogic_partners_slider_group['click_behaviour'] == "internal") {
								while ($wp_query->have_posts()) {
									$wp_query->the_post();
									$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
									<div class="swiper-slide">
										<?php
										if (is_admin()) { ?>
											<div>
												<img src="<?= $image_url ?>" alt="">
											</div>
										<?php
										} else { ?>
											<div class="swiper_slide_partner">
												<a href="<?php the_permalink() ?>">
													<img src="<?= $image_url ?>" alt="">
												</a>
											</div>
										<?php

										}
										?>
									</div>
								<?php
								}; //while
								wp_reset_query();
							}
							//For external links
							elseif ($shocklogic_partners_slider_group['click_behaviour'] == "external") {
								while ($wp_query->have_posts()) {
									$wp_query->the_post();
									$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;
									$data = get_field('data', get_the_ID());
									$link = $data['external_url'] ?? null; ?>
									<div class="swiper-slide">
										<?php
										if (is_admin() || $link == null) { ?>
											<div>
												<img src="<?= $image_url ?>" alt="">
											</div>
										<?php

										} else { ?>
											<a href="<?= $link ?>" target="_blank">
												<img src="<?= $image_url ?>" alt="">
											</a>
										<?php
										}
										?>
									</div>
								<?php
								}; //while
								wp_reset_query();
							}
							//For external links
							elseif ($shocklogic_partners_slider_group['click_behaviour'] == "modal") {
								while ($wp_query->have_posts()) {
									$wp_query->the_post();
									$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
									<div class="swiper-slide">
										<a data-bs-toggle="modal" data-bs-target="#<?= "partner" . get_the_ID() ?>">
											<img src="<?= $image_url ?>" alt="">
										</a>
									</div>
									<?php
								}; //while
								wp_reset_query();
							}
							//For same link on all links
							elseif ($shocklogic_partners_slider_group['click_behaviour'] == "same") {
								$link_array = $shocklogic_partners_slider_group['link'] ?? null;
								if ($link_array) {
									$link_url = esc_url($link_array['url']);
									//$link_title = esc_html($link_array['title']);
									$link_target = $link_array['target'] ? $link_array['target'] : '_self';
									$link_target = esc_attr($link_target);

									while ($wp_query->have_posts()) {
										$wp_query->the_post();
										$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
										<div class="swiper-slide">
											<?php
											if (is_admin() || $link_array == null) { ?>
												<div>
													<img src="<?= $image_url ?>" alt="">
												</div>
											<?php
											} else { ?>
												<a href="<?= $link_url ?>" target="<?= $link_target ?>">
													<img src="<?= $image_url ?>" alt="">
												</a>
											<?php
											}
											?>
										</div>
						<?php
									} //while
									wp_reset_query();
								} //if there is a link
							} //For same link on all links
						} else {
							echo "No posts were found";
						}
						?>
						</div>
					</div>
			</div>
		</div>
		<?php
		if ($shocklogic_partners_slider_group['bottom_text']) { ?>
			<div class="shocklogic_partners_slider_wrapper_bottom_text">
				<?= $shocklogic_partners_slider_group['bottom_text'] ?>
			</div>
		<?php
		}
		?>
	</div>

	<?php
	/*
	* Printing modals
	*/
	if ($shocklogic_partners_slider_group['click_behaviour'] == "modal") { ?>
		<div class="shocklogic_partners_slider_wrapper_modals">
			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

					$title = get_the_title(); ?>

					<!-- Modal -->
					<div class="modal fade" id="<?= "partner" . get_the_ID() ?>" tabindex="-1" aria-labelledby="<?= "partner" . get_the_ID() ?>Label" aria-hidden="true">
						<div class="modal-dialog modal-xl modal_partner_dialog">
							<div class="modal-content modal_partner_dialog_content">
								<div class="modal-header">
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body modal_partner_dialog_content_body">
									<div class="modal_partner_dialog_content_body_left">
										<div class="modal_partner_dialog_content_body_left_image">
											<img src="<?= $image_url ?>" alt="">
										</div>
										<strong><?= $title ?></strong>
									</div>
									<div class="modal_partner_dialog_content_body_right">
										<div class="modal_partner_dialog_content_body_right_content">
											<?php the_content() ?>
										</div>
									</div>
								</div>
								<div class="modal-footer d-none"></div>
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
	} //if click behaviour == modal

}