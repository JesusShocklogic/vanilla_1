<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63a375db05123',
	'title' => 'Shocklogic vertical item list',
	'fields' => array(
		array(
			'key' => 'field_63a375db1a7c2',
			'label' => 'Shocklogic vertical item list group',
			'name' => 'shocklogic_vertical_item_list_group',
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
					'key' => 'field_63c054a8dcc97',
					'label' => 'Content',
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
					'key' => 'field_63a51f3183221',
					'label' => 'Options',
					'name' => 'options',
					'aria-label' => '',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'acfe_repeater_stylised_button' => 1,
					'layout' => 'block',
					'pagination' => 0,
					'min' => 0,
					'max' => 0,
					'collapsed' => '',
					'button_label' => 'Add option',
					'rows_per_page' => 20,
					'sub_fields' => array(
						array(
							'key' => 'field_63a5200583223',
							'label' => 'icon',
							'name' => 'icon',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 1,
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
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63a51fed83222',
							'label' => 'Title',
							'name' => 'title',
							'aria-label' => '',
							'type' => 'text',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '70',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'maxlength' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63a5baf3a04ac',
							'label' => 'Option select',
							'name' => 'option_select',
							'aria-label' => '',
							'type' => 'select',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'iframe' => 'Iframe',
								'image' => 'Image',
								'video' => 'Video file (not recommended)',
								'link' => 'Link (clickable item)',
							),
							'default_value' => 'iframe',
							'return_format' => 'value',
							'multiple' => 0,
							'allow_null' => 0,
							'ui' => 0,
							'ajax' => 0,
							'placeholder' => '',
							'allow_custom' => 0,
							'search_placeholder' => '',
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63a5bb42a04ad',
							'label' => 'iframe',
							'name' => 'iframe',
							'aria-label' => '',
							'type' => 'textarea',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_63a5baf3a04ac',
										'operator' => '==',
										'value' => 'iframe',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'acfe_textarea_code' => 0,
							'maxlength' => '',
							'rows' => '',
							'placeholder' => '',
							'new_lines' => '',
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63a5bfb45b240',
							'label' => 'image',
							'name' => 'image',
							'aria-label' => '',
							'type' => 'image',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_63a5baf3a04ac',
										'operator' => '==',
										'value' => 'image',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
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
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63a72c71ffea8',
							'label' => 'video',
							'name' => 'video',
							'aria-label' => '',
							'type' => 'file',
							'instructions' => 'IMPORTANT: having a video file directly from the server may cause slower loading time on your site. We strongly suggest that you use an iframe for the reproduction of videos.',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_63a5baf3a04ac',
										'operator' => '==',
										'value' => 'video',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'uploader' => '',
							'return_format' => 'url',
							'min_size' => '',
							'max_size' => '',
							'mime_types' => '.mp4,.ogg,.webm',
							'library' => 'all',
							'parent_repeater' => 'field_63a51f3183221',
						),
						array(
							'key' => 'field_63c051ee47aa1',
							'label' => 'Link',
							'name' => 'link',
							'aria-label' => '',
							'type' => 'link',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => array(
								array(
									array(
										'field' => 'field_63a5baf3a04ac',
										'operator' => '==',
										'value' => 'link',
									),
								),
							),
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
							'parent_repeater' => 'field_63a51f3183221',
						),
					),
				),
				array(
					'key' => 'field_63c05521dcc98',
					'label' => 'Background',
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
					'key' => 'field_63c0552ddcc99',
					'label' => 'General background select',
					'name' => 'general_background_select',
					'aria-label' => '',
					'type' => 'select',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'iframe' => 'Iframe',
						'image' => 'Image',
					),
					'default_value' => false,
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
					'key' => 'field_63c05565c78cd',
					'label' => 'General background iframe',
					'name' => 'general_background_iframe',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_63c0552ddcc99',
								'operator' => '==',
								'value' => 'iframe',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'acfe_textarea_code' => 0,
					'maxlength' => '',
					'rows' => '',
					'placeholder' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_63c0557cc78ce',
					'label' => 'General background image',
					'name' => 'general_background_image',
					'aria-label' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_63c0552ddcc99',
								'operator' => '==',
								'value' => 'image',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
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
				'value' => 'acf/shocklogic-vertical-item-list',
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
	'acfe_display_title' => '',
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
	'modified' => 1675881354,
));

endif;