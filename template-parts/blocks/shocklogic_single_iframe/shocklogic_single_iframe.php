<?php
$shocklogic_single_iframe_group = get_field('shocklogic_single_iframe_group');

$width = $shocklogic_single_iframe_group['width'];

if (isset($shocklogic_single_iframe_group) && $shocklogic_single_iframe_group != null) { ?>
    <div class="shocklogic_single_iframe">
        <div class="shocklogic_single_iframe_wrapper">
            <?php
            if ($shocklogic_single_iframe_group['iframe_source'] == "url") { ?>
                <div class="shocklogic_single_iframe_wrapper_iframe ratio ratio-16x9 <?= $width ?>">
                    <iframe src="<?= $shocklogic_single_iframe_group['url'] ?>" frameborder="0"></iframe>
                </div>
            <?php
            } elseif ($shocklogic_single_iframe_group['iframe_source'] == "iframe") { ?>
                <div class="shocklogic_single_iframe_wrapper_code ratio ratio-16x9 <?= $width ?>">
                    <?= $shocklogic_single_iframe_group['iframe'] ?>
                </div>
            <?php
            } 
            ?>
        </div>
    </div>
<?php
}
