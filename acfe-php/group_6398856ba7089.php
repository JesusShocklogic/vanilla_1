<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_6398856ba7089',
	'title' => 'General - Menu options',
	'fields' => array(
		array(
			'key' => 'field_6398856cf1a17',
			'label' => 'General Menu Group',
			'name' => 'general_menu_group',
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
			'acfe_group_modal' => 0,
			'acfe_group_modal_close' => 0,
			'acfe_group_modal_button' => '',
			'acfe_group_modal_size' => 'large',
			'sub_fields' => array(
				array(
					'key' => 'field_63a73a82f1ec4',
					'label' => 'General',
					'name' => '',
					'aria-label' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_6398e574d285d',
					'label' => 'Menu\'s position',
					'name' => 'menus_position',
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
						'normal' => 'Normal',
						'fixed-top' => 'Fixed top',
					),
					'default_value' => 'normal',
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
					'key' => 'field_63a73a9cf1ec5',
					'label' => 'Logo',
					'name' => '',
					'aria-label' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_6398859ff1a18',
					'label' => 'Logo',
					'name' => 'logo',
					'aria-label' => '',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
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
				array(
					'key' => 'field_63a73d6219400',
					'label' => 'Logo mobile width',
					'name' => 'logo_mobile_width',
					'aria-label' => '',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 100,
					'min' => 0,
					'max' => 100,
					'placeholder' => '',
					'step' => 1,
					'prepend' => '',
					'append' => '%',
				),
				array(
					'key' => 'field_63a73e8419401',
					'label' => 'Logo tablet width',
					'name' => 'logo_tablet_width',
					'aria-label' => '',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 100,
					'min' => 0,
					'max' => 100,
					'placeholder' => '',
					'step' => 1,
					'prepend' => '',
					'append' => '%',
				),
				array(
					'key' => 'field_63a73e9319402',
					'label' => 'Logo desktop width',
					'name' => 'logo_desktop_width',
					'aria-label' => '',
					'type' => 'number',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 100,
					'min' => 0,
					'max' => 100,
					'placeholder' => '',
					'step' => 1,
					'prepend' => '',
					'append' => '%',
				),
				array(
					'key' => 'field_63a73ab0f1ec6',
					'label' => 'Colours',
					'name' => '',
					'aria-label' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_63988e80665e9',
					'label' => 'Background colour',
					'name' => 'background_colour',
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
					'default_value' => '#FFF',
					'enable_opacity' => 0,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_639890e5e8583',
					'label' => 'Menu items text colour',
					'name' => 'menu_items_text_colour',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => 'This affects the menu items text except the active element',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'rgba(0,0,0,0.55)',
					'enable_opacity' => 1,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_63989361dfa78',
					'label' => 'Menu items text colour (hover)',
					'name' => 'menu_items_text_colour_hover',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => 'This affects the menu items text except the active element',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'rgba(0,0,0,0.7)',
					'enable_opacity' => 1,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_63989252e5d3e',
					'label' => 'Active menu item',
					'name' => 'active_menu_item',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => 'This only affect the active menu items',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'rgba(0,0,0,0.9)',
					'enable_opacity' => 1,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_63a73ac6f1ec8',
					'label' => 'Button',
					'name' => '',
					'aria-label' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'top',
					'endpoint' => 0,
				),
				array(
					'key' => 'field_6398b6616b483',
					'label' => 'Enable button',
					'name' => 'enable_button',
					'aria-label' => '',
					'type' => 'true_false',
					'instructions' => 'This will enable a button at the end of the menu',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'message' => '',
					'default_value' => 0,
					'ui_on_text' => '',
					'ui_off_text' => '',
					'ui' => 1,
				),
				array(
					'key' => 'field_6398b6826b484',
					'label' => 'Button group',
					'name' => 'button_group',
					'aria-label' => '',
					'type' => 'group',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_6398b6616b483',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'layout' => 'block',
					'acfe_seamless_style' => 0,
					'acfe_group_modal' => 0,
					'sub_fields' => array(
						array(
							'key' => 'field_6398b68c6b485',
							'label' => 'Link',
							'name' => 'link',
							'aria-label' => '',
							'type' => 'link',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'return_format' => 'array',
						),
						array(
							'key' => 'field_6398e209bec7f',
							'label' => 'Button background colour',
							'name' => 'button_background_colour',
							'aria-label' => '',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '#0d6efd',
							'enable_opacity' => 0,
							'return_format' => 'string',
						),
						array(
							'key' => 'field_6398e3e7ea002',
							'label' => 'Button background colour (hover)',
							'name' => 'button_background_colour_hover',
							'aria-label' => '',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '#0d6efd',
							'enable_opacity' => 0,
							'return_format' => 'string',
						),
						array(
							'key' => 'field_6398e271bec80',
							'label' => 'Button text colour',
							'name' => 'button_text_colour',
							'aria-label' => '',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '#FFF',
							'enable_opacity' => 0,
							'return_format' => 'string',
						),
						array(
							'key' => 'field_6398e3f6ea003',
							'label' => 'Button text colour (hover)',
							'name' => 'button_text_colour_hover',
							'aria-label' => '',
							'type' => 'color_picker',
							'instructions' => '',
							'required' => 1,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '#FFF',
							'enable_opacity' => 0,
							'return_format' => 'string',
						),
						array(
							'key' => 'field_63a75bfccf2e3',
							'label' => 'Button minimal width',
							'name' => 'button_minimal_width',
							'aria-label' => '',
							'type' => 'number',
							'instructions' => 'This option will only affect the button in the menu',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'min' => 0,
							'max' => '',
							'placeholder' => '',
							'step' => 1,
							'prepend' => '',
							'append' => 'pixels',
						),
					),
					'acfe_group_modal_close' => 0,
					'acfe_group_modal_button' => '',
					'acfe_group_modal_size' => 'large',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-menu',
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
		'theme-settings' => 'Theme settings',
	),
	'modified' => 1676854332,
));

endif;