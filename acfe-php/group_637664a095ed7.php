<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_637664a095ed7',
	'title' => 'Shocklogic speakers slider wordpress',
	'fields' => array(
		array(
			'key' => 'field_637664a0a44bb',
			'label' => 'Shocklogic speakers slider wordpress group',
			'name' => 'shocklogic_speakers_slider_wordpress_group',
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
					'key' => 'field_637664a0ac1c9',
					'label' => 'Title tab',
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
					'key' => 'field_637664a0afc2a',
					'label' => 'title',
					'name' => 'title',
					'aria-label' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_637664a0b36d5',
					'label' => 'Content tab',
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
					'key' => 'field_637664a0b715c',
					'label' => 'post types',
					'name' => 'post_types',
					'aria-label' => '',
					'type' => 'acfe_post_types',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => '',
					'field_type' => 'checkbox',
					'default_value' => array(
					),
					'return_format' => 'name',
					'layout' => 'horizontal',
					'toggle' => 0,
					'allow_custom' => 0,
					'multiple' => 0,
					'allow_null' => 0,
					'choices' => array(
					),
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'search_placeholder' => '',
					'other_choice' => 0,
				),
				array(
					'key' => 'field_637664a0bad1a',
					'label' => 'post categories',
					'name' => 'post_categories',
					'aria-label' => '',
					'type' => 'acfe_taxonomy_terms',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'taxonomy' => array(
						0 => 'category',
					),
					'allow_terms' => '',
					'allow_level' => '',
					'field_type' => 'checkbox',
					'default_value' => array(
					),
					'return_format' => 'id',
					'layout' => 'vertical',
					'toggle' => 0,
					'save_terms' => 0,
					'load_terms' => 0,
					'choices' => array(
					),
					'ui' => 0,
					'multiple' => 0,
					'allow_null' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'search_placeholder' => '',
					'allow_custom' => 0,
					'other_choice' => 0,
				),
				array(
					'key' => 'field_637664a0be68d',
					'label' => 'Posts per page',
					'name' => 'posts_per_page',
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
					'default_value' => 3,
					'min' => '',
					'max' => '',
					'placeholder' => '',
					'step' => '',
					'prepend' => '',
					'append' => '',
				),
				array(
					'key' => 'field_637664a0c212c',
					'label' => 'Settings tab',
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
					'key' => 'field_637664a0c5abf',
					'label' => 'Background colour',
					'name' => 'background_colour',
					'aria-label' => '',
					'type' => 'color_picker',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '#fff',
					'enable_opacity' => 0,
					'return_format' => 'string',
				),
				array(
					'key' => 'field_637664a0c96a0',
					'label' => 'Bottom tab',
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
					'key' => 'field_637664a0cd13a',
					'label' => 'Bottom text',
					'name' => 'bottom_text',
					'aria-label' => '',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
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
				'value' => 'acf/shocklogic-speakers-slider-wordpress',
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
	'modified' => 1670330098,
));

endif;