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
$text_midle_alignment = (isset($six_column_table_group['text_midle_alignment']) && $six_column_table_group['text_midle_alignment'] == true) ? "align-middle" : "";
$text_font_size = (isset($six_column_table_group['text_font_size']) && $six_column_table_group['text_font_size']) ? $six_column_table_group['text_font_size'] : "inherit";


$stripe_rows = (isset($six_column_table_group['stripe_rows']) && $six_column_table_group['stripe_rows'] == true) ? "table-striped" : "";
$stripe_rows_backgrounds = (isset($six_column_table_group['stripe_rows_backgrounds'])) ? $six_column_table_group['stripe_rows_backgrounds'] : null;
?>
<link rel="stylesheet" id="speakers-wordpress" href="<?= get_template_directory_uri() . "/template-parts/blocks/six_column_table/six_column_table.css" ?>" type="text/css" media="all">
<style>
	<?php
	$classes = <<<ITEM
	#$block_id{
		background-color: $background_colour;
		font-size: $text_font_size;
	}

	#$block_id .table-striped>tbody>tr:nth-of-type(odd)>*{
		background-color: $stripe_rows_backgrounds;
	}
	ITEM;
	echo $classes; ?>
</style>
<div class="six_column_table <?= $spacing ?>" id="<?= $block_id ?>">
	<?php
	if ($table) : ?>
		<div class="table-responsive">
			<table class="table table-hover <?= $text_midle_alignment . " " . $stripe_rows ?>">
				<thead>
					<tr>
						<th scope="col" style="min-width: 25px;"> <?= $table[0]['col_1'] ?></th>
						<th scope="col"><?= $table[0]['col_2'] ?></th>
						<th scope="col"><?= $table[0]['col_3'] ?></th>
						<th scope="col" style="min-width: 300px;"><?= $table[0]['col_4'] ?></th>
						<th scope="col" style="min-width: 240px;"><?= $table[0]['col_5'] ?></th>
						<th scope="col" style="min-width: 260px;"><?= $table[0]['col_6'] ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($table as $key => $column) {
						if ($key == 0) continue; ?>
						<tr>
							<th scope="row"><?= $table[0]['col_1'] ? $column['col_1']." ".$key : ""; ?></th>
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