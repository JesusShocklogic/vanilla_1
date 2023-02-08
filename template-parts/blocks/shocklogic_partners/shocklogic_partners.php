<link rel="stylesheet" id="shocklogic_partners" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_partners/shocklogic_partners.css" ?>" type="text/css" media="all">
<?php
wp_enqueue_style("modal-partners");

$shocklogic_partners_group = get_field('shocklogic_partners_group');
$wp_query = get_query(get_field('query_settings')['query_settings']);

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];
$background_colour = $general_settings['background_colour'];
$avatar = default_partners_avatar();

$minimal_column_size = $shocklogic_partners_group['minimal_column_size'] ?? "18rem"; ?>

<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}
	#$block_id .shocklogic_partners_wrapper_partners_partner {
		width: min(100%, $minimal_column_size) !important;
	}
	ITEM;
	echo $classes;
	?>
</style>

<?php

if (isset($shocklogic_partners_group) && $shocklogic_partners_group != null) { ?>
	<div class="shocklogic_partners <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_partners_wrapper">
			<?php if ($shocklogic_partners_group['title']) : ?>
				<div class="shocklogic_partners_wrapper_title">
					<?= $shocklogic_partners_group['title'] ?>
				</div>
			<?php endif; ?>

			<!-- Nuevo -->
			<div class="shocklogic_partners_wrapper_partners">
				<?php
				if ($wp_query->have_posts()) {
					//For internal links
					if ($shocklogic_partners_group['click_behaviour'] == "internal") {
						while ($wp_query->have_posts()) {
							$wp_query->the_post();
							$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
							<div class="shocklogic_partners_wrapper_partners_partner">
								<?php
								if (is_admin()) { ?>
									<div>
										<img src="<?= $image_url ?>" alt="">
									</div>
								<?php
								} else { ?>
									<a href="<?php the_permalink() ?>">
										<img src="<?= $image_url ?>" alt="">
									</a>
								<?php
								}
								?>
							</div>
						<?php
						}; //while
						wp_reset_query();
					} //internal

					//For external links
					elseif ($shocklogic_partners_group['click_behaviour'] == "external") {
						while ($wp_query->have_posts()) {
							$wp_query->the_post();
							$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;
							$data = get_field('data', get_the_ID());
							$link = $data['external_url'] ?? null; ?>
							<div class="shocklogic_partners_wrapper_partners_partner">
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
					} //For external links

					//For modals / Popups
					elseif ($shocklogic_partners_group['click_behaviour'] == "modal") {
						while ($wp_query->have_posts()) {
							$wp_query->the_post();
							$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
							<div class="shocklogic_partners_wrapper_partners_partner">
								<a data-bs-toggle="modal" data-bs-target="#<?= "partner" . get_the_ID() ?>">
									<img src="<?= $image_url ?>" alt="">
								</a>
							</div>
							<?php
						}; //while
						wp_reset_query();
					} // for modals / Popups

					//For same link on all links
					elseif ($shocklogic_partners_group['click_behaviour'] == "same") {
						$link_array = $shocklogic_partners_group['link'] ?? null;
						if ($link_array) {
							$link_url = esc_url($link_array['url']);
							//$link_title = esc_html($link_array['title']);
							$link_target = $link_array['target'] ? $link_array['target'] : '_self';
							$link_target = esc_attr($link_target);

							while ($wp_query->have_posts()) {
								$wp_query->the_post();
								$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar; ?>
								<div class="shocklogic_partners_wrapper_partners_partner">
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
						} // if there is a link
					} // Same link for all logos
				} //if there is posts
				else {
					echo "No posts were found";
				}
				?>
			</div>

			<?php
			if ($shocklogic_partners_group['bottom_text']) { ?>
				<div class="shocklogic_partners_wrapper_bottom_text">
					<?= $shocklogic_partners_group['bottom_text'] ?>
				</div>
			<?php
			}
			?>
		</div>
	</div>

	<?php
	/*
	* Printing modals
	*/
	if ($shocklogic_partners_group['click_behaviour'] == "modal") { ?>
		<div class="shocklogic_partners_wrapper_modals">
			<?php
			if ($wp_query->have_posts()) {
				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

					$title = get_the_title(); ?>

					<!-- Modal -->
					<div class="modal fade" id="<?= "partner" . get_the_ID() ?>" tabindex="-1" aria-labelledby="<?= "partner" . get_the_ID() ?>Label" aria-hidden="true">
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
										<strong><?= $title ?></strong>
									</div>
									<div class="modal_dialog_content_body_right">
										<div class="modal_dialog_content_body_right_content">
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
