<?php
wp_enqueue_style("footer");
$footer = get_field('general_footer_options', 'option');
$number_of_columns = sizeof($footer['columns']); ?>
<style>
    footer {
        background-color: <?= $footer['background_colour'] ?>;
    }

    .footer_wrapper {
        grid-template-columns: 1fr;
    }

    @media (min-width: 576px) {}

    @media (min-width: 768px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {
        .footer_wrapper {
            grid-template-columns: repeat(<?= $number_of_columns ?>, 1fr);
        }

    }

    @media (min-width: 1400px) {}
</style>

<footer class="footer <?= $footer['spacing'] ?>">
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
wp_footer();
?>
</body>

</html>