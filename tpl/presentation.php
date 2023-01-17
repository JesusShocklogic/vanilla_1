<?php
/*
* Template Name: Presentation DEPRECATED
*/

get_header();
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();


        $presentationId = -1;
        $sessionId = -1;
        if ($_GET) {
            if (isset($_GET['presentation_id'])) {
                $presentationId = $_GET['presentation_id'];
            }
        }

        if ($presentationId !== -1) {
            $presentation = get_presentations_by_id($presentationId);
            $sessionId = $presentation[0]->session_id;
        }

        if ($sessionId !== -1) {
            $session = get_session_by_id($presentation[0]->session_id);
        }

?>
        <style>
            .grey-background:nth-child(even) {
                background: lightgray;
            }

            .programme {
                padding-bottom: 2rem;
            }
        </style>

        <div class="container">

            <h3 class="text-center py-4"><?= $presentation[0]->presentation_title ?></h3>

            <?php

            if (!empty($presentation)) {

                $speakers = get_all_speakers_by_session($session[0]);

                if (!empty($speakers)) { ?>
                    <h4 class="title-chair mb-2"><b>Moderador(a)</b></h4>

                    <?php
                    foreach ($speakers as $key => $speaker) {
                    ?>

                        <div class="row p-3">
                            <div class="col-4 text-right">
                                <img class="img-chair" style="border-radius: 50%; width: 12rem;" src="<?= $speaker->image_profile ?>">
                            </div>

                            <div class="col-6">
                                <h5 class="name-chair font-weight-bold"><?= $speaker->speaker_name ?> <?= $speaker->speaker_family_name ?></h5>

                                <div class="content-chair">
                                    <?= $speaker->biography ?>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>

                <?php
                $allSpeakersContent = $presentation[0]->all_speakers;
                $allSpeakersContent = json_decode($allSpeakersContent);
                if (!empty($allSpeakersContent)) {
                ?>

                    <h4 class="title-speaker mb-2"><b>Ponentes</b></h4>

                    <?php
                    foreach ($allSpeakersContent as $key2 => $SpeakerContent) {
                    ?>
                        <div class="row p-3 mt-4">
                            <div class="col-4 text-right">
                                <img class="img-speaker" style="border-radius: 50%; width: 12rem;" src="<?= $SpeakerContent->Image01 ?>">
                            </div>

                            <div class="col-6">
                                <h5 class="name-speaker font-weight-bold"><?= $SpeakerContent->Full_Name ?></h5>

                                <div class="content-speaker">
                                    <?= $SpeakerContent->Biography ?>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

                <?php if (!empty($presentation[0]->presentation_body)) { ?>

                    <h4 class="title-speaker">Resumen</h4>
                    <div class="row p-3 text-justify mt-4">
                        <div class="col-12">
                            <?= $presentation[0]->presentation_body ?>
                        </div>
                    </div>

                <?php } ?>

            <?php
            }
            ?>

            <br>
            <div class="row p-3 d-flex my-4">
                <a href="/COMUNICACIONYSALUD/agenda?DayTab=<?= $_GET['DayTab'] ?>" class="m-auto">Volver al programa</a>
            </div>

        </div>


<?php
    }
    wp_reset_postdata();
} else {
    echo "No content was found";
}
?>
<?php
get_footer();
?>