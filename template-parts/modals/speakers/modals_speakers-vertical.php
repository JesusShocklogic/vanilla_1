<?php
wp_enqueue_style("modal-speakers-vertical");
$wp_modals_query = $args['query'];
$avatar = $args["avatar"];

if ($wp_modals_query->have_posts()) {
    while ($wp_modals_query->have_posts()) {
        $wp_modals_query->the_post();
        $image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $avatar;

        $speaker_wordpress_group = get_field('speaker_wordpress_group', get_the_ID());
        if (((isset($speaker_wordpress_group['name']) && $speaker_wordpress_group['name'] != "") || (isset($speaker_wordpress_group['last_name']) && $speaker_wordpress_group['last_name'] != ""))) {
            $title = ($speaker_wordpress_group['name'] ?? '') . " " . ($speaker_wordpress_group['last_name'] ?? '');
        } else {
            $title = get_the_title();
        } ?>

        <!-- Modal -->
        <div class="modal fade" id="<?= "speaker" . get_the_ID() ?>" tabindex="-1"
            aria-labelledby="<?= "speaker" . get_the_ID() ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-xl modal_dialog">
                <div class="modal-content modal_dialog_content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body modal_dialog_content_body ">
                        <div class="modal_dialog_content_body_left">
                            <div class="modal_dialog_content_body_left_image ">
                                <img src="<?= $image_url ?>" alt="" loading="lazy">
                            </div>
                            <strong class="modal_dialog_content_body_left_name">
                                <?= $title ?>
                            </strong>
                            <div class="modal_dialog_content_body_left_jobtitle">
                                <?= ($speaker_wordpress_group['job_title'] ?? '') ?>
                            </div>
                            <div class="modal_dialog_content_body_left_companyname">
                                <?= ($speaker_wordpress_group['company_organizarion'] ?? '') ?>
                            </div>
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
    }
    ; //while
    wp_reset_query();
} //if