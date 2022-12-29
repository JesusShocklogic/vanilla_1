<?php
wp_enqueue_style("footer");
$footer = get_field('general_footer_options', 'option'); ?>
<footer class="footer">
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
<style>
    footer {
        background-color: <?= $footer['background_colour'] ?>;
    }
</style>
<?php
wp_footer();
?>
</body>

</html>