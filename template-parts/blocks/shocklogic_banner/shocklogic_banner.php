<link rel="stylesheet" id="shocklogic_banner" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_banner/shocklogic_banner.css" ?>" type="text/css" media="all">
<?php
$shocklogic_banner_group = get_field('shocklogic_banner_group');
$general_settings = get_field('general_settings');
$block_id = $block['id'];
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour']; ?>

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
if (isset($shocklogic_banner_group) && $shocklogic_banner_group != null) { ?>
    <div class="shocklogic_banner <?= $spacing ?>" id="<?= $block_id ?>">
        <div class="shocklogic_banner_wrapper">
            <?php
            //Content above banner
            if ($shocklogic_banner_group['content_above_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_top">
                    <?= $shocklogic_banner_group['content_above_banner'] ?>
                </div>
            <?php
            } ?>

            <?php
            //Content over banner
            if ($shocklogic_banner_group['content_over_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_over">
                    <?= $shocklogic_banner_group['content_over_banner'] ?>
                </div>
            <?php
            } ?>

            <div class="shocklogic_banner_wrapper_image">
                <img src="<?= ($shocklogic_banner_group['image']['url']) ?>" alt="">
            </div>

            <?php
            //Content over banner
            if ($shocklogic_banner_group['content_below_banner']) { ?>
                <div class="shocklogic_banner_wrapper_content_bottom">
                    <?= $shocklogic_banner_group['content_below_banner'] ?>
                </div>
            <?php
            } ?>
        </div>
    </div>
<?php
}
