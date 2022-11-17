<?php

$shocklogic_banner_group = get_field('shocklogic_banner_group');

if (isset($shocklogic_banner_group) && $shocklogic_banner_group != null) { ?>
    <div class="shocklogic_banner">
        <div class="shocklogic_banner_wrapper">
            <img src="<?= $shocklogic_banner_group['image']['url'] ?>" alt="">
        </div>
    </div>
<?php
}
