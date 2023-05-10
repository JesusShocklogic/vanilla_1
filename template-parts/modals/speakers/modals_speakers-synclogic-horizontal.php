<?php
wp_enqueue_style("modal-speakers-synclogic-horizontal");
$block_id = $args['block_id'];
$speakers = $args['speakers'];
$avatar = $args["avatar"];
$speakers_modal = $args['speakers_modal'];
$captions = $speakers_modal['captions_group'];

$show_job_title = $speakers_modal['show_job_title'] ? "block" : "none";
$show_company_name = $speakers_modal['show_company_name'] ? "block" : "none";

$speaker_name_colour = $speakers_modal['speaker_name_colour'] ?? "#000";
$job_title_colour = $speakers_modal['job_title_colour'] ?? "#000";
$company_name_colour = $speakers_modal['company_name_colour'] ?? "#000"; ?>
<style>
    <?php
    $classes = <<<ITEM
        #$block_id .modal_dialog_content_body_left_name{color: $speaker_name_colour;}
        #$block_id .modal_dialog_content_body_left_jobtitle{display: $show_job_title; color: $job_title_colour;}
        #$block_id .modal_dialog_content_body_left_companyname{display: $show_company_name; color: $company_name_colour;}
        ITEM;
    echo $classes;
    ?>
</style>
<?php
if ($speakers) {
    $content = "";
    foreach ($speakers as $key => $speaker) {
        $image_url = $speaker->image_profile ? $speaker->image_profile : $avatar;

        $title = $speaker->speaker_name . " " . $speaker->speaker_family_name;
        ?>

        <!-- Modal -->
        <div class="modal fade" id="speaker-<?= $speaker->speaker_id ?>" tabindex="-1"
            aria-labelledby="speaker-<?= $speaker->speaker_id ?>-Label" aria-hidden="true">
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
                            <strong class="modal_dialog_content_body_left_name">
                                <?= $title ?>
                            </strong>
                            <div class="modal_dialog_content_body_left_jobtitle">
                                <?= ($speaker->job_title ?? '') ?>
                            </div>
                            <div class="modal_dialog_content_body_left_companyname">
                                <?= ($speaker->company ?? '') ?>
                            </div>
                        </div>
                        <div class="modal_dialog_content_body_right">
                            <div class="modal_dialog_content_body_right_content">
                                <?= $speaker->biography ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sessions = get_sessions_by_speaker_id($speaker->speaker_id);
                    if ($sessions): ?>
                        <div class="modal-footer modal_dialog_content_footer">
                            <?php
                            foreach ($sessions as $key => $session) {
                                $session_title = $session->session_title ?? null;
                                $session_day_name = $session->session_day_name ?? null;
                                $start_time = $session->start_time ?? null;
                                $end_time = $sessions->end_time ?? null;

                                $rol = "| ";
                                if ($session->IsChair):
                                    $rol .= $captions['chair'];
                                elseif ($session->IsCoChair):
                                    $rol .= $captions['co_chair'];
                                elseif ($session->IsSpeaker):
                                    $rol .= $captions['speaker'];
                                endif;

                                $presentations = get_presentations_by_speaker_and_author($speaker->speaker_id, $speaker->speaker_email, $session->session_id);
                                ?>
                                <div class="modal_dialog_content_footer_session">
                                    <?php if ($session_title): ?>
                                        <div>
                                            <div class="modal_dialog_content_footer_session_title">
                                                <?= $session->session_title; ?>
                                            </div>
                                            <div class="modal_dialog_content_footer_session_rol">
                                                <?= $rol; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div>
                                        <?php if ($session_day_name): ?>
                                            <div class="modal_dialog_content_footer_session_day_name">
                                                <?= $session->session_day_name; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($start_time): ?>
                                            <div class="modal_dialog_content_footer_session_time">
                                                <?php if ($session->start_time):
                                                    echo " | " . $session->start_time;
                                                    if ($end_time):
                                                        echo " - " . $end_time;
                                                    endif;
                                                endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($speakers_modal['link_to_programme'] == "link_to_programme"):
                                        $programme_page_link = isset($speakers_modal['programme_page_link']) ? $speakers_modal['programme_page_link'] : null;
                                        if ($programme_page_link):
                                            $getTab = getDayProgrammeTab($session->session_day); ?>
                                            <div>
                                                <a
                                                    href="<?= $programme_page_link . "?DayTab=" . $getTab . "&SessionId=" . $session->session_id ?>">
                                                    <?= $speakers_modal['programme_link_caption'] ?>
                                                </a>
                                            </div>
                                        <?php endif;
                                    endif; ?>
                                    <?php if (count($presentations) > 0): ?>
                                        <div class="modal_dialog_content_footer_session_presentations">
                                            <?php
                                            if ($captions['presentations_title']): ?>
                                                <div class="modal_dialog_content_footer_session_presentations_title">
                                                    <?= $captions['presentations_title'] ?>
                                                </div>
                                            <?php endif; ?>
                                            <ul class="modal_dialog_content_footer_session_presentations_presentation">
                                                <?php foreach ($presentations as $key => $presentation) {
                                                    if ($presentation->presentation_title != ""): ?>
                                                        <li class="modal_dialog_content_footer_session_presentations_presentation_title">
                                                            <?= $presentation->presentation_title ?>
                                                        </li>
                                                    <?php endif; ?>
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
    }
    ; //foreach
} //if