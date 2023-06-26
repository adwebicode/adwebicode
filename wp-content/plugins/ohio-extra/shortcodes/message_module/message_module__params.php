<?php

/**
* WPBakery Page Builder Ohio Message module shortcode params
*/

vc_lean_map( 'ohio_message_module', 'ohio_message_module_sc_map' );

function ohio_message_module_sc_map() {
	return array(
		'name' => __( 'Message', 'ohio-extra' ),
		'description' => __( 'Messages and notifications module', 'ohio-extra' ),
		'base' => 'ohio_message_module',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/message_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Message position', 'ohio-extra' ),
				'param_name' => 'message_position',
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
					),
				),
				'std' => 'center',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Message type', 'ohio-extra' ),
				'param_name' => 'layout',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Warning', 'ohio-extra' ) => 'warning',
					__( 'Primary', 'ohio-extra' ) => 'primary',
					__( 'Success', 'ohio-extra' ) => 'success',
					__( 'Danger', 'ohio-extra' ) => 'danger'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Message size', 'ohio-extra' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large'
				),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Message text', 'ohio-extra' ),
				'param_name' => 'text',
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop shadow?', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shadow intensity', 'ohio-extra' ),
				'param_name' => 'drop_shadow_intensity',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use % units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '10',
				'dependency' => array(
					'element' => 'drop_shadow',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Full width layout', 'ohio-extra' ),
				'param_name' => 'full_width',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show close button?', 'ohio-extra' ),
				'param_name' => 'without_close_button',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Wrap text?', 'ohio-extra' ),
				'param_name' => 'wrap_text',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),


			// Icon.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Icon', 'ohio-extra' ),
				'heading' => __( 'Add icon?', 'ohio-extra' ),
				'param_name' => 'add_icon',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
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
					'element' => 'add_icon',
					'value' => array(
						'1'
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
				'value' => '24'
			),

			// Link.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Use link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'link',
				'dependency' => array(
					'element' => 'use_link',
					'value' => '1'
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'param_name' => 'text_typo',
				'heading' => __( 'Text typography', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'param_name' => 'link_typo',
				'heading' => __( 'Link typography', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'use_link',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'bg_color',
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