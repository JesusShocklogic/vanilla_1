<?php
wp_enqueue_style("modal-speakers-virtualogic-vertical");
$block_id = $args['block_id'];
$speakers = $args['speakers'];
$avatar = $args["avatar"];
$synclogic_speakers_modal = $args['synclogic_speakers_modal'];
$captions = $synclogic_speakers_modal['captions_group'];

$show_job_title = $synclogic_speakers_modal['show_job_title'] ? "block" : "none";
$show_company_name = $synclogic_speakers_modal['show_company_name'] ? "block" : "none";

$speaker_name_colour = $synclogic_speakers_modal['speaker_name_colour'] ?? "#000";
$job_title_colour = $synclogic_speakers_modal['job_title_colour'] ?? "#000";
$company_name_colour = $synclogic_speakers_modal['company_name_colour'] ?? "#000";

$general_theme_settings = get_field('general_theme_settings_group', 'option');
$general_link_colours = $general_theme_settings['general_links_colour'] ?? "auto"; ?>
<style>
    <?php
    $classes = <<<ITEM
        #$block_id .modal_dialog_content_body_left_name{color: $speaker_name_colour;}
        #$block_id .modal_dialog_content_body_left_jobtitle{display: $show_job_title; color: $job_title_colour;}
        #$block_id .modal_dialog_content_body_left_companyname{display: $show_company_name; color: $company_name_colour;}
        .btn-close {background-color: $general_link_colours !important; color: color-contrast($general_link_colours vs #fff, #000);}
        .modal_dialog_content_body_left_name{border-left: solid 4px $general_link_colours; }
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
            <div class="modal-dialog modal-lg modal_dialog">
                <div class="modal-content modal_dialog_content">
                    <div class="modal-header modal_dialog_content_header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span style="line-height: 0;display: block;margin: 0;padding: 0;color: white;">X</span>
                        </button>
                    </div>
                    <div class="modal-body modal_dialog_content_body">
                        <div class="modal_dialog_content_body_left">
                            <div class="modal_dialog_content_body_left_image">
                                <img src="<?= $image_url ?>" alt="" loading="lazy">
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

                                $rol = "";
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
                                            <h4 class="modal_dialog_content_footer_session_title">
                                                <?= $session->session_title; ?>
                                            </h4>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($session_day_name): ?>
                                        <h5>
                                            <div class="modal_dialog_content_footer_session_day_name">
                                                <?= $session->session_day_name; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($start_time): ?>
                                            <div class="modal_dialog_content_footer_session_time">
                                                <?php if ($session->start_time):
                                                    echo " | " . $session->start_time;
                                                    if ($end_time):
                                                        echo " / " . $end_time;
                                                    endif;
                                                endif; ?>
                                            </div>
                                        </h5>
                                    <?php endif; ?>

                                    <?php if ($rol): ?>
                                        <div>
                                            <h5 class="modal_dialog_content_footer_session_rol">
                                                <?= $rol; ?>
                                            </h5>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($synclogic_speakers_modal['link_to_programme'] == "link_to_programme"):
                                        $programme_page_link = isset($synclogic_speakers_modal['programme_page_link']) ? $synclogic_speakers_modal['programme_page_link'] : null;
                                        if ($programme_page_link):
                                            $getTab = getDayProgrammeTab($session->session_day); ?>
                                            <h3>
                                                <a
                                                    href="<?= $programme_page_link . "?DayTab=" . $getTab . "&SessionId=" . $session->session_id ?>">
                                                    <?= $synclogic_speakers_modal['programme_link_caption'] ?>
                                                </a>
                                            </h3>
                                        <?php endif;
                                    endif; ?>
                                    <?php if (count($presentations) > 0): ?>
                                        <div class="modal_dialog_content_footer_session_presentations">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <?= $captions['presentations_title'] ?>
                                                        </th>
                                                        <th scope="col">Start Time</th>
                                                        <th scope="col">Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($presentations as $key => $presentation) {
                                                        //var_dump($presentations->all_speakers);
                                                        $rolFacultyPresentation = "";
                                                        $id = $speaker->speaker_id;
                                                        $email = $speaker->speaker_email;
                                                        if (
                                                            (!empty($presentation->all_speakers) && $presentation->all_speakers !== "[]")
                                                            && (!empty($presentation->all_authors) && $presentation->all_authors !== "[]")
                                                        ) {
                                                            if (strpos($presentation->all_speakers, "$id") !== false) {
                                                                $rolFacultyPresentation = "Speaker";
                                                            } elseif (strpos($presentation->all_authors, "$email") !== false) {
                                                                $rolFacultyPresentation = "Author";
                                                            }
                                                        } else if (
                                                            (!empty($presentation->all_speakers) && $presentation->all_speakers !== "[]")
                                                            && (!empty($presentation->all_authors) && $presentation->all_authors == "[]")
                                                        ) {
                                                            if (strpos($presentation->all_speakers, "$id") !== false) {
                                                                $rolFacultyPresentation = "Speaker";
                                                            }
                                                        } else if (
                                                            (!empty($presentation->all_speakers) && $presentation->all_speakers !== "[]")
                                                            && (!empty($presentation->all_authors) && $presentation->all_authors == "[]")
                                                        ) {
                                                            if (strpos($presentations->all_authors, "$email") !== false) {
                                                                $rolFacultyPresentation = "Author";
                                                            }
                                                        } ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?= $presentation->presentation_title ?>
                                                            </th>
                                                            <td>
                                                                <?= $presentation->start_time ?>
                                                            </td>
                                                            <td>
                                                                <?= $rolFacultyPresentation ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } ?>
                                                </tbody>
                                            </table>
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