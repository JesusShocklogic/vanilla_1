<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */
$general_settings = get_field('general_settings');
$spacing = $general_settings['spacing'];
$background_colour = $general_settings['background_colour'];

$block_id = $block['id'];
$six_column_table_group = get_field('six_column_table_group');
$table = $six_column_table_group['table'];
?>
<link rel="stylesheet" id="speakers-wordpress" href="<?= get_template_directory_uri() . "/template-parts/blocks/six_column_table/six_column_table.css" ?>" type="text/css" media="all">
<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
	}
	ITEM;
	echo $classes; ?>
</style>
<div class="six_column_table <?= $spacing ?>" id="<?= $block_id ?>">
	<?php
	if ($table) : ?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th scope="col" style="min-width: 50px;"> <?= $table[0]['col_1'] ?></th>
						<th scope="col" style="min-width: 100px;"><?= $table[0]['col_2'] ?></th>
						<th scope="col" style="min-width: 100px;"><?= $table[0]['col_3'] ?></th>
						<th scope="col" style="min-width: 300px;"><?= $table[0]['col_4'] ?></th>
						<th scope="col" style="min-width: 200px;"><?= $table[0]['col_5'] ?></th>
						<th scope="col" style="min-width: 200px;"><?= $table[0]['col_6'] ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($table as $key => $column) {
						if ($key == 0) continue; ?>
						<tr>
							<th scope="row"><?= $column['col_1'] ?><?= $key ?></th>
							<td><?= $column['col_2'] ?></td>
							<td><?= $column['col_3'] ?></td>
							<td><?= $column['col_4'] ?></td>
							<td><?= $column['col_5'] ?></td>
							<td><?= $column['col_6'] ?></td>
						</tr>
					<?php
					} //foreach 
					?>
				</tbody>
			</table>
		</div>
	<?php
	else :
		echo "No table found";
	endif; ?>
</div>