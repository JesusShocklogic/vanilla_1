<?php
/*
* Template name: Sessions Page
* Description: Programme sort by start time. Sessions have the same start time and the same end time.
*/
get_header();


if (have_posts()) {
    while (have_posts()) {
        the_post();

        $dataBackground = get_field('background_array');
        $EnableBackgroundPanel = get_field('enable_background_panel_color');
        $BackgroundPanelColor = get_field('background_panel_color');

        function getSessionsByDay($days)
        {
            $args = array(
                'post_type' => 'session',
                //'orderby' => 'title',
                'order' => 'ASC',
                'post_status'      => 'publish',
                'offset'            => 0,
                'custom-fields' => 1,
                'posts_per_page'   => -1
            );

            $sessions = get_posts($args);
            $array = [];
            $u = 0;

            foreach ($sessions as $key => $session) {
                $date = get_post_meta($session->ID, 'date', true);

                if ($days == $date) {
                    array_push($array, $session);
                }
            }

            foreach ($array as $key => $arr) {
                $date = get_post_meta($arr->ID, 'date', true);

                $startTime = get_post_meta($arr->ID, 'start_time', true);
                $endTime = get_post_meta($arr->ID, 'end_time', true);
                $sessionTitle = get_post_meta($arr->ID, 'session_title', true);

                $arr->start_time = $startTime;
                $arr->end_time = $endTime;
                $arr->session_title = $sessionTitle;
            }

            usort($array, function ($a, $b) {
                if ($a->start_time == $b->start_time) {
                    return $a->order - $b->order;
                }

                return strtotime($a->start_time) - strtotime($b->start_time);
            });

            return $array;
        }

        function getAllDaysForSession()
        {

            $args = array(
                'post_type' => 'session',
                //'orderby' => 'title',
                'order' => 'ASC',
                'post_status'      => 'publish',
                'offset'            => 0,
                'custom-fields' => 1,
                'posts_per_page'   => -1
            );

            $days = get_posts($args);
            $array = [];

            foreach ($days as $key => $day) {
                $exists = 0;
                $date = get_post_meta($day->ID, 'date', true);

                for ($i = 0; $i < count($array); $i++) {
                    if ($array[$i] == $date) {
                        $exists = 1;
                    }
                }

                if ($exists !== 1) {
                    array_push($array, $date);
                }
            }
            sort($array);
            return $array;
        }
?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
        <style>
            <?php if ($dataBackground['background_option'] == "image") { ?>body {
                background-image: url(<?= $dataBackground['background_image']['url'] ?>);
                background-repeat: no-repeat;
                background-size: <?= $dataBackground['background_size'] ?>;
                background-attachment: <?= $dataBackground['background_attachment'] ?>;
                background-blend-mode: <?= $dataBackground['blend_mode'] ?>;
                background-position: top;
            }

            <?php } else { ?>body {
                background-color: <?= $dataBackground['background_color'] ?>;
            }

            <?php } ?>.list-group {
                font-weight: bold;
            }

            .session {
                border-bottom: 2px solid #ededed;
                padding-top: 1rem;
                padding-bottom: 2rem;
            }

            /*New changes of CGCOO*/

            <?php if ($EnableBackgroundPanel == 1) { ?>.background-programme {
                border-radius: 1rem 1rem 1rem 0rem;
                background: <?= $BackgroundPanelColor ?>;
            }

            <?php } else { ?>.background-programme {
                border-radius: 1rem 1rem 1rem 0rem;
                background: #ffffffbf;
            }

            <?php } ?>.background-session {
                background: white;
                border-radius: 1rem 1rem 1rem 0rem;
                border: solid 0.5px #efefef;
                -webkit-box-shadow: 3px 6px 5px 0px rgba(0, 0, 0, 0.32);
                -moz-box-shadow: 3px 6px 5px 0px rgba(0, 0, 0, 0.32);
                box-shadow: 3px 6px 5px 0px rgba(0, 0, 0, 0.32);
            }

            /*New changes of CGCOO*/

            /*.session .session-title {
                min-height: 90px;
            }*/

            .modal-body-author .ratio-1x1 {
                width: 50%;
                margin: 0 auto;
            }

            .modal-content-author {
                box-shadow: 0px 4px 8px #00000029;
                border-radius: 10px;
            }

            .modal-header-author {
                padding: 0;
                padding-right: 20px;
                padding-top: 15px;
                border: none;
            }

            .ratio-1x1 img,
            .ratio-1x1 svg {
                object-fit: cover;
            }

            .author .author-name,
            .author-modal-information .author-name {
                font-size: 22px;
            }

            .author .author-information,
            .modal-body-author .author-information {
                font-size: 14px;
            }

            .author-modal-information {
                border-left: solid 4px <?= $data['main_color'] ?>;
                padding-left: 15px;
            }

            .the-title {
                font-size: 1.5rem;
                background: white;
                color: #073767;
                border: 1px solid;
                border-radius: 1rem 1rem 1rem 0rem;
                -webkit-box-shadow: -8px 7px 0px -2px rgba(83, 188, 193, 1);
                -moz-box-shadow: -8px 7px 0px -2px rgba(83, 188, 193, 1);
                box-shadow: -8px 7px 0px -2px rgba(83, 188, 193, 1);
            }

            .standard_padding {
                padding: 1rem 1rem 1rem 5rem !important;
            }

            /*
            /* Bootstrap Media Query
            */

            /* X-Small devices (portrait phones, less than 576px)
                    No media query for `xs` since this is the default in Bootstrap */

            /* Small devices (landscape phones, 576px and up) */
            @media (min-width: 576px) {}

            /* Medium devices (tablets, 768px and up) */
            @media (min-width: 768px) {}

            /* Large devices (desktops, 992px and up) */
            @media (min-width: 992px) {
                .modal-body-author .ratio-1x1 {
                    width: 40%;
                }
            }

            /* X-Large devices (large desktops, 1200px and up) */
            @media (min-width: 1200px) {
                .modal-body-author {
                    padding-left: 3rem;
                    padding-right: 3rem;
                    padding-bottom: 1.5rem;
                }
            }

            /* XX-Large devices (larger desktops, 1400px and up) */
            @media (min-width: 1400px) {}
        </style>

        <div class="text-center my-4">
            <h1 class="has-text-align-left has-text-color wp-block-heading ms-5" style="color:#005281;font-style:normal;font-weight:700"><?php the_title(); ?></h1>
        </div>

        <div class="py-2">
            <div class="container-fluid">

                <div class="row p-3 mb-3 mx-3 background-programme">
                    <?php
                    $days = getAllDaysForSession();

                    for ($i = 0; $i < count($days); $i++) {
                        $dateString = date_ES_es($days[$i]);

                    ?>
                        <div class="col-12 col-md-6 col-xl p-3">
                            <h5 class="text-center"><b><?= $dateString ?></b></h5>

                            <?php

                            $sessions = getSessionsByDay($days[$i]);

                            foreach ($sessions as $key => $session) {
                                $startTime = $session->start_time;
                                $endTime = $session->end_time;
                            ?>
                                <div class="col m-3 text-start py-3 px-3 pb-4 background-session" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#session-view-modal-<?= $session->ID ?>">
                                    <h6 class=""><?= $session->post_title ?></h6>

                                    <h6 class="my-2"><b><?= $session->session_title ?></b></h6>

                                    <h6><?= substr($startTime, 0, 5) ?> - <?= substr($endTime, 0, 5) ?></h6>
                                </div>

                                <div class="modal fade" id="session-view-modal-<?= $session->ID ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="session-view-modal-Label" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content" style="border-radius: 1rem">
                                            <div class="modal-header justify-content-end modal-header-author">
                                                <button type="button" class="modal-header-close modal-header-close-author rounded-circle border-0" data-bs-dismiss="modal" aria-label="Close">
                                                    <span><i class="fa fa-times fa-2x" aria-hidden="true"></i></span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="p-3">
                                                    <!-- <p><?= $dateString ?></p> -->
                                                    <h5 style="color: #53BCC1"><?= $session->post_title ?> - <?= $session->session_title ?></h5>
                                                </div>
                                                <div id="modal-description-session" class="p-3">
                                                    <?= $session->post_content ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>
                    <?php } ?>
                </div>

                <?php if (!empty(get_the_content())) { ?>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
<?php
    }
    wp_reset_postdata();
} else {
    echo "No content was found";
}
get_footer();  ?>