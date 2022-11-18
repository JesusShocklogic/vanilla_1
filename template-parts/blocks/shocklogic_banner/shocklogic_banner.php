<?php

$shocklogic_banner_group = get_field('shocklogic_banner_group');
$spacing = $shocklogic_banner_group['banner_spacing'];
if (isset($shocklogic_banner_group) && $shocklogic_banner_group != null) { ?>
    <div class="shocklogic_banner <?= $spacing ?>">
        <div class="shocklogic_banner_wrapper">
            <?php
            if ($shocklogic_banner_group['banner_select'] == "image") { ?>
                <div class="shocklogic_banner_wrapper_image">
                    <img src="<?= ($shocklogic_banner_group['image_2']['url']) ?>" alt="">
                </div>
            <?php
            } elseif ($shocklogic_banner_group['banner_select'] == "video") {
                echo "video";
            }
            ?>
        </div>
    </div>
<?php
}
