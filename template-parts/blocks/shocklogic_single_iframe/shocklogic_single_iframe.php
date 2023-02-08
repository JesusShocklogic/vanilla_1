<link rel="stylesheet" id="shocklogic_single_iframe" href="<?= get_template_directory_uri() . "/template-parts/blocks/shocklogic_single_iframe/shocklogic_single_iframe.css" ?>" type="text/css" media="all">
<?php
$shocklogic_single_iframe_group = get_field('shocklogic_single_iframe_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];
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

if (isset($shocklogic_single_iframe_group) && $shocklogic_single_iframe_group != null) { ?>

    <div class="shocklogic_single_iframe <?= $spacing ?>" id="<?= $block_id ?>">
        <div class="shocklogic_single_iframe_wrapper">
            <?php
            // Text above the iframe
            if ($shocklogic_single_iframe_group['text_above_iframe']) { ?>
                <div class="shocklogic_single_iframe_wrapper_text_above">
                    <?= $shocklogic_single_iframe_group['text_above_iframe']; ?>
                </div>
            <?php
            }
            ?>

            <?php if ($shocklogic_single_iframe_group['iframe']) : ?>
                <div class="shocklogic_single_iframe_wrapper_iframe <?= $shocklogic_single_iframe_group['iframe_width'] ?>">
                    <?= $shocklogic_single_iframe_group['iframe'] ?>
                </div>
            <?php endif; ?>

            <?php
            //Text below the iframe
            if ($shocklogic_single_iframe_group['text_below_iframe']) { ?>
                <div class="shocklogic_single_iframe_wrapper_text_below">
                    <?= $shocklogic_single_iframe_group['text_below_iframe']; ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

<?php
}
