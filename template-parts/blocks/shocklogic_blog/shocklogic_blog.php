<?php
$shocklogic_blog_group = get_field('shocklogic_blog_group');
$wp_query = get_query(get_field('query_settings'));

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];

$block_id = $block['id'];

$background_colour = $general_settings['background_colour'];
$placeholder = default_placeholder_image();
?>

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

if (isset($shocklogic_blog_group) && $shocklogic_blog_group != null) { ?>
	<div class="shocklogic_blog <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_blog_wrapper">
			<?php if ($shocklogic_blog_group['title']) : ?>
				<div class="shocklogic_blog_wrapper_title">
					<?= $shocklogic_blog_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_blog_wrapper_blog">
				<?php
				if ($wp_query->have_posts()) {
					$content = "";
					while ($wp_query->have_posts()) {
						$wp_query->the_post();
						$permalink = get_the_permalink();
						$title = get_the_title();
						$image_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : $placeholder; ?>
						<div class="shocklogic_blog_wrapper_blog_single">
							<?php
							if (!is_admin()) : ?>
								<a href="<?= $permalink ?>">
									<div class="shocklogic_blog_wrapper_blog_single_image">
										<img src="<?= $image_url ?>" alt="">
									</div>
									<div class="shocklogic_blog_wrapper_blog_single_title title">
										<h3><?php the_title() ?></h3>
									</div>
								</a>
							<?php else : ?>
								<div class="shocklogic_blog_wrapper_blog_single_image">
									<img src="<?= $image_url ?>" alt="">
								</div>
								<div class="shocklogic_blog_wrapper_blog_single_title title">
									<h3><?php the_title() ?></h3>
								</div>
							<?php endif; ?>
						</div>
				<?php
					}; //while
					wp_reset_query();
				} //if
				else {
					echo "No posts were found";
				}
				?>
			</div>

			<?php if ($shocklogic_blog_group['bottom_text']) : ?>
				<div class="shocklogic_blog_wrapper_bottom_text">
					<?= $shocklogic_blog_group['bottom_text'] ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php
}
