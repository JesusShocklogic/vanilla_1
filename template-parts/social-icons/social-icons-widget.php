<link rel="stylesheet" id="social-icon-widget-css"
    href="<?= get_template_directory_uri() ?>/template-parts/social-icons/social-icons-widget.css" type="text/css"
    media="all">
<?php
$distance_from_the_screen_edge = (isset($args['distance_from_the_screen_edge']) && $args['distance_from_the_screen_edge'] != "") ? $args['distance_from_the_screen_edge'] : "0"; ?>
<style>
    .shocklogic_social_media_bar {
        top:
            <?= $args['distance_from_the_screens_top'] ?? "30%"; ?>
        ;
        background-color:
            <?= $args['background_colour'] ?? "rgba(32,32,32,0.5)"; ?>
        ;
        <?= $args['bar_position'] . ": " . $distance_from_the_screen_edge . ";"; ?>
    }
</style>
<div class="shocklogic_social_media_bar">
    <div class="shocklogic_social_media_bar_container">
        <?php
        if ($args['icons']) {
            foreach ($args['icons'] as $key => $icon) { ?>
                <div class="shocklogic_social_media_bar_container_image">
                    <a href="<?= $icon['link'] ?>" target="_blank">
                        <img src="<?= $icon['icon']['url'] ?>" alt="">
                    </a>
                </div>
                <?php
            } //foreach
        } //if
        ?>
    </div>
</div>