<?php
wp_enqueue_style("footer");
$footer = get_field('footer_group', 'option'); ?>
<footer class="footer">
    <div class="footer_wrapper">
        <div class="footer_wrapper_left"><?= $footer['left_column'] ?? '' ?></div>
        <div class="footer_wrapper_center"><img src="<?= $footer['logo']['url'] ?? '' ?>" alt=""></div>
        <div class="footer_wrapper_right"><?= $footer['right_column'] ?? '' ?></div>
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