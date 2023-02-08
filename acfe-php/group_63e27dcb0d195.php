<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63e27dcb0d195',
	'title' => 'Shocklogic buttons',
	'fields' => array(
		array(
			'key' => 'field_63e27dcbed46d',
			'label' => 'Shocklogic buttons group',
			'name' => 'shocklogic_buttons_group',
			'aria-label' => '',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'acfe_seamless_style' => 1,
			'sub_fields' => array(
				array(
					'key' => 'field_63e27deded46e',
					'label' => 'Buttons',
					'name' => '',
					'aria-label' => '',
					'type' => 'accordion',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
				array(
					'key' => 'field_63e27e0ded470',
					'label' => 'Buttons',
					'name' => 'buttons',
					'aria-label' => '',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_repeater_stylised_button' => 1,
					'layout' => 'table',
					'pagination' => 0,
					'min' => 0,
					'max' => 0,
					'collapsed' => '',
					'button_label' => 'Add button',
					'rows_per_page' => 20,
					'sub_fields' => array(
						array(
							'key' => 'field_63e3f155d0010',
							'label' => 'image',
							'name' => 'image',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => 'The image will be square and left align to the button',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '30',
								'class' => '',
								'id' => '',
							),
							'uploader' => '',
							'acfe_thumbnail' => 0,
							'return_format' => 'array',
							'min_width' => '',
							'min_height' => '',
							'min_size' => '',
							'max_width' => '',
							'max_height' => '',
							'max_size' => '',
							'mime_types' => '',
							'preview_size' => 'medium',
							'library' => 'all',
							'parent_repeater' => 'field_63e27e0ded470',
						),
						array(
							'key' => 'field_63e27e50ed471',
							'label' => 'Link',
							'name' => 'link',
							'aria-label' => '',
							'type' => 'link',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '70',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'parent_repeater' => 'field_63e27e0ded470',
						),
					),
				),
				array(
					'key' => 'field_63e27e00ed46f',
					'label' => 'Buttons settings',
					'name' => '',
					'aria-label' => '',
					'type' => 'accordion',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'open' => 0,
					'multi_expand' => 0,
					'endpoint' => 0,
				),
				array(
					'key' => 'field_63e28441d379d',
					'label' => 'button style',
					'name' => 'button_style',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'solid' => 'Solid',
						'bordered' => 'Bordered',
					),
					'default_value' => 'solid',
					'return_format' => 'value',
					'multiple' => 0,
					'allow_null' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'allow_custom' => 0,
					'search_placeholder' => '',
				),
				array(
					'key' => 'field_63e284c2d379e',
					'label' => 'Main colour',
					'name' => 'main_colour',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#0d6efd',
					'enable_opacity' => 0,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_63e284d5d379f',
					'label' => 'Secondary colour',
					'name' => 'secondary_colour',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#FFFFFF',
					'enable_opacity' => 0,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_63e298104460a',
					'label' => 'Button width',
					'name' => 'button_width',
					'aria-label' => '',
					'type' => 'text',
					'instructions' => 'Add the minimal size all items will take on screen.
You can place any available size.
Eg.
250px
20rem
20em',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'auto',
					'maxlength' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
				),
			),
			'acfe_group_modal' => 0,
			'acfe_group_modal_close' => 0,
			'acfe_group_modal_button' => '',
			'acfe_group_modal_size' => 'large',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/shocklogic-buttons',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => 'Shocklogic buttons',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'acfe_categories' => array(
		'shocklogic' => 'Shocklogic',
	),
	'modified' => 1675883133,
));

endif;