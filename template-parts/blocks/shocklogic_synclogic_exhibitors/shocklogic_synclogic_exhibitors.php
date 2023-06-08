<link rel="stylesheet" id="shocklogic_synclogic_exhibitors"
	href="<?= get_template_directory_uri() ?>/template-parts/blocks/shocklogic_synclogic_exhibitors/shocklogic_synclogic_exhibitors.css"
	type="text/css" media="all">
<?php
wp_enqueue_style("modal-partners");
$shocklogic_synclogic_exhibitors_group = get_field('shocklogic_synclogic_exhibitors_group');

$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$block_id = $block['id'];
$avatar = default_partners_avatar();


//$exhibitors_array = null;
$exhibitors_array = get_exhibitors_sl();
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
if (isset($shocklogic_synclogic_exhibitors_group) && $shocklogic_synclogic_exhibitors_group != null) { ?>
	<div class="shocklogic_synclogic_exhibitors <?= $spacing ?>" id="<?= $block_id ?>">
		<div class="shocklogic_synclogic_exhibitors_wrapper">
			<?php if ($shocklogic_synclogic_exhibitors_group['title']): ?>
				<div class="shocklogic_synclogic_exhibitors_wrapper_title">
					<?= $shocklogic_synclogic_exhibitors_group['title'] ?>
				</div>
			<?php endif; ?>

			<div class="shocklogic_synclogic_exhibitors_wrapper_exhibitorss">
				<?php
				if ($exhibitors_array):
					foreach ($exhibitors_array as $key => $item) {
						$Person_Id = $item->Person_Id ?? null;

						if ($Person_Id):
							$image_url = get_freefield_by_type_and_personId("Company_Logo", $Person_Id)[0]->Value ?? $avatar;
							?>
							<div class="shocklogic_synclogic_exhibitors_wrapper_exhibitorss_exhibitors">
								<a data-bs-toggle="modal" data-bs-target="#exhibitors-<?= $Person_Id ?>">
									<img src="<?= $image_url ?>" alt="">
								</a>
							</div>
							<?php
						endif;
					} //foreach
				else:
					echo "No posts were found";
				endif;
				?>
			</div>
		</div>
	</div>
	<?php
} // if shocklogic_synclogic_exhibitors_group is set

; //if class Synclogic exist
