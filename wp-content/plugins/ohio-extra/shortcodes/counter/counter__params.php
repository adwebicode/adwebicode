<?php

/**
* WPBakery Page Builder Ohio Counter shortcode params
*/

vc_lean_map( 'ohio_counter', 'ohio_counter_sc_map' );

function ohio_counter_sc_map() {
	return array(
		'name' => __( 'Counter', 'ohio-extra' ),
		'description' => __( 'Facts and numbers counter block', 'ohio-extra' ),
		'base' => 'ohio_counter',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/counter_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Counter layout', 'ohio-extra' ),
				'param_name' => 'layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_034.svg',
						'key' => 'number',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_033.svg',
						'key' => 'number_with_icon',
						'title' => __( 'With icon', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Counter position', 'ohio-extra' ),
				'param_name' => 'counter_position',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_035.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_036.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_037.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Number', 'ohio-extra' ),
				'param_name' => 'count_number',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Text before', 'ohio-extra' ),
				'param_name' => 'count_text_before',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Text after', 'ohio-extra' ),
				'param_name' => 'count_text_after',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Title', 'ohio-extra' ),
				'param_name' => 'title',
				'value' => '',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Add "+" symbol', 'ohio-extra' ),
				'param_name' => 'plus_symbol',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),


			// Icon.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon variations', 'ohio-extra' ),
				'param_name' => 'icon_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_017.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_018.svg',
						'key' => 'border',
						'title' => __( 'Outlined', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_020.svg',
						'key' => 'fill',
						'title' => __( 'Contained', 'ohio-extra' ),
					),
				),
				'dependency' => array(
					'element' => 'layout',
					'value' => 'number_with_icon'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon position', 'ohio-extra' ),
				'param_name' => 'icon_position',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Right', 'ohio-extra' ) => 'right',
					__( 'Top', 'ohio-extra' ) => 'top'
				),
				'dependency' => array(
					'element' => 'layout',
					'value' => 'number_with_icon'
				),
				'std' => 'left',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Font icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom image', 'ohio-extra' ) => 'user_image'
				),
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'number_with_icon',
						'icon'
					)
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon', 'ohio-extra' ),
				'param_name' => 'icon_as_icon',
				'settings' => array(),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				)
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon image', 'ohio-extra' ),
				'param_name' => 'icon_as_image',
				'description' => __( 'Choose icon image.', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'user_image'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Icon size', 'ohio-extra' ),
				'param_name' => 'icon_size',
				'dependency' => array(
					'element' => 'icon_type',
					'value' => array(
						'font_icon'
					)
				),
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0'
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Number typography', 'ohio-extra' ),
				'param_name' => 'count_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Plus symbol typography', 'ohio-extra' ),
				'param_name' => 'plus_typo',
				'dependency' => array(
					'element' => 'plus_symbol',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon background color', 'ohio-extra' ),
				'param_name' => 'icon_bg_color',
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => 'fill'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon border color', 'ohio-extra' ),
				'param_name' => 'icon_border_color',
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => 'border'
				)
			),

			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'Custom CSS class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}