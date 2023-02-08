<link rel="stylesheet" id="shocklogic_testimonials" href="http://localhost/vanila_1/wp-content/themes/vanilla_1/template-parts/blocks/shocklogic_testimonials/shocklogic_testimonials.css" type="text/css" media="all">
<?php
$shocklogic_testimonials_group = get_field('shocklogic_testimonials_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$testimonials = $shocklogic_testimonials_group['testimonials'];
$block_id = $block['id']; ?>

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
if (isset($shocklogic_testimonials_group) && $shocklogic_testimonials_group != null) { ?>
	<div class="shocklogic_testimonials <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_testimonials_wrapper">
			<?php if ($shocklogic_testimonials_group['title']) : ?>
				<div class="shocklogic_testimonials_wrapper_title">
					<?= $shocklogic_testimonials_group['title'] ?>
				</div>
			<?php endif; ?>
			<div class="shocklogic_testimonials_wrapper_testimonials">
				<?php
				if ($testimonials) :
					foreach ($testimonials as $key => $testimonial) { ?>
						<div class="shocklogic_testimonials_wrapper_testimonials_testimonial">
							<?= $testimonial['testimonial'] ?>
						</div>
				<?php
					} //foreach
				endif;
				?>
			</div>
		</div>
	</div>
<?php
}
