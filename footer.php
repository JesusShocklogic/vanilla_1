<?php
wp_enqueue_style("footer");
$footer = get_field('general_footer_options', 'option');

$number_of_columns = (isset($footer['columns']) && $footer['columns']) ? sizeof($footer['columns']) : 0;

$container = $footer['paddings'];

$padding_mobile = $footer['padding_mobile'];
$padding_tablet = $footer['padding_tablet'];
$padding_desktop = $footer['padding_desktop']; ?>
<style>
    footer {
        background-color:
            <?= $footer['background_colour'] ?>
        ;
    }

    .footer {
        padding:
            <?= $padding_mobile['top'] . $padding_mobile['unit'] . " " . $padding_mobile['right'] . $padding_mobile['unit'] . " " . $padding_mobile['bottom'] . $padding_mobile['unit'] . " " . $padding_mobile['left'] . $padding_mobile['unit'] ?>
        ;
    }

    .footer_wrapper {
        grid-template-columns: 1fr;
    }

    @media (min-width: 480px) {
        .footer {
            padding:
                <?= $padding_tablet['top'] . $padding_tablet['unit'] . " " . $padding_tablet['right'] . $padding_tablet['unit'] . " " . $padding_tablet['bottom'] . $padding_tablet['unit'] . " " . $padding_tablet['left'] . $padding_tablet['unit'] ?>
            ;
        }
    }

    @media (min-width: 768px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {
        .footer {
            padding:
                <?= $padding_desktop['top'] . $padding_desktop['unit'] . " " . $padding_desktop['right'] . $padding_desktop['unit'] . " " . $padding_desktop['bottom'] . $padding_desktop['unit'] . " " . $padding_desktop['left'] . $padding_desktop['unit'] ?>
            ;
        }

        .footer_wrapper {
            grid-template-columns: repeat(
                    <?= $number_of_columns ?>
                    , 1fr);
        }

    }

    @media (min-width: 1400px) {}
</style>

<?php
if ($number_of_columns > 0): ?>
    <footer class="footer <?= $container ?>">
        <div class="footer_wrapper">
            <?php
            if ($footer['columns']) {
                foreach ($footer['columns'] as $key => $column) { ?>
                    <div class="footer_wrapper_column">
                        <?= $column['column'] ?>
                    </div>
                    <?php
                } //foreach
            } //if
            ?>
        </div>
    </footer>
    <?php
endif;
wp_footer();
?>
</body>

</html>