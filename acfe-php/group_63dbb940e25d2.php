<?php 

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_63dbb940e25d2',
	'title' => 'Query settings',
	'fields' => array(
		array(
			'key' => 'field_63dbb940ebbc4',
			'label' => 'Query settings',
			'name' => 'query_settings',
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
					'key' => 'field_63dbbd68384af',
					'label' => 'Query settings',
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
					'key' => 'field_63dbb94106b5d',
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
					'key' => 'field_63dbb9410a519',
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
					'key' => 'field_63dbb9410e10b',
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
					'key' => 'field_63dbc1f314ace',
					'label' => 'Post order by',
					'name' => 'orderby',
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
						'date' => 'Date',
						'name' => 'Name',
					),
					'default_value' => 'date',
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
					'key' => 'field_63dbc22484123',
					'label' => 'Post order',
					'name' => 'order',
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
						'DESC' => 'Descendant',
						'ASC' => 'Ascendant',
					),
					'default_value' => 'DESC',
					'return_format' => 'value',
					'multiple' => 0,
					'allow_null' => 0,
					'ui' => 0,
					'ajax' => 0,
					'placeholder' => '',
					'allow_custom' => 0,
					'search_placeholder' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/shocklogic-blog',
			),
		),
	),
	'menu_order' => -2,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'left',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
	'acfe_display_title' => 'Query settings',
	'acfe_autosync' => array(
		0 => 'php',
		1 => 'json',
	),
	'acfe_form' => 0,
	'acfe_meta' => '',
	'acfe_note' => '',
	'modified' => 1676856809,
));

endif;