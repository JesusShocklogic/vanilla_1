<link rel="stylesheet" id="bootstrap_list_group"
	href="<?= get_template_directory_uri() . "/template-parts/blocks/bootstrap_list_group/bootstrap_list_group.css" ?>"
	type="text/css" media="all">
<?php
$bootstrap_list_group_group = get_field('bootstrap_list_group_group');
$repeater = isset($bootstrap_list_group_group['repeater']) ? $bootstrap_list_group_group['repeater'] : null;
$titless_font_colour = isset($bootstrap_list_group_group['titless_font_colour']) ? $bootstrap_list_group_group['titless_font_colour'] : "black";
$titless_background_colour = isset($bootstrap_list_group_group['titless_background_colour']) ? $bootstrap_list_group_group['titless_background_colour'] : "white";

$titless_font_colour_active = isset($bootstrap_list_group_group['titless_font_colour_active']) ? $bootstrap_list_group_group['titless_font_colour_active'] : "white";
$titless_background_colour_active = isset($bootstrap_list_group_group['titless_background_colour_active']) ? $bootstrap_list_group_group['titless_background_colour_active'] : "#6f2cf4";


$general_settings = get_field('general_settings');
$block_id = $block['id'];
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour']; ?>

<style>
	<?php
	$classes = <<<ITEM
		#$block_id{
			background-color: $background_colour;
		}
		#$block_id .bootstrap_list_group_wrapper_list_group_item{
			background-color: $titless_background_colour;
			color: $titless_font_colour;
			border-box:none;
		}
		#$block_id .bootstrap_list_group_wrapper_list_group_item.active{
			background-color: $titless_background_colour_active;
			color: $titless_font_colour_active;
		}
ITEM;
	echo $classes;
	?>
</style>

<?php
if (isset($bootstrap_list_group_group)):
	if ($repeater): ?>
		<div class="bootstrap_list_group <?= $spacing ?>" id="<?= $block_id ?>">
			<div class="bootstrap_list_group_wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-4">
							<div class="list-group bootstrap_list_group_wrapper_list_group" id="list-tab" role="tablist">
								<?php foreach ($repeater as $key => $item) { ?>
									<a class="bootstrap_list_group_wrapper_list_group_item list-group-item list-group-item-action <?= ($key == 0) ? "active" : ""; ?>"
										id="list-<?= $key ?>-list" data-bs-toggle="list" href="#list-<?= $key ?>" role="tab"
										aria-controls="list-<?= $key ?>"><?= $item['title'] ?></a>
								<?php } ?>
							</div>
						</div>
						<div class="col-8">
							<div class="bootstrap_list_group_wrapper_tab_content tab-content" id="nav-tabContent">
								<?php foreach ($repeater as $key => $item) { ?>
									<div class="bootstrap_list_group_wrapper_tab_content_pane tab-pane fade <?= ($key == 0) ? "active show" : ""; ?>"
										id="list-<?= $key ?>" role="tabpanel" aria-labelledby="list-<?= $key ?>-list"><?= $item['content'] ?></div>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<?php
	else:
		echo "No items added";
	endif;
else:
	echo "Fields not defined";
endif; ?>