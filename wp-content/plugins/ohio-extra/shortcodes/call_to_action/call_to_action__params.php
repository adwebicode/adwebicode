<?php

/**
* WPBakery Page Builder Ohio Call To Action shortcode params
*/

vc_lean_map( 'ohio_call_to_action', 'ohio_call_to_action_sc_map' );

function ohio_call_to_action_sc_map() {
	return array(
		'name' => __( 'Call To Action', 'ohio-extra' ),
		'description' => __( 'Call to action block', 'ohio-extra' ),
		'base' => 'ohio_call_to_action',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/call_to_action_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'textarea_raw_html',
				'holder' => 'div class="ohio_heading_VC_gap"',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Heading', 'ohio-extra' ),
				'param_name' => 'title',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Heading HTML tag', 'ohio-extra' ),
				'param_name' => 'heading_tag',
				'value' => array(
					__( 'h1', 'ohio-extra' ) => 'h1',
					__( 'h2', 'ohio-extra' ) => 'h2',
					__( 'h3', 'ohio-extra' ) => 'h3',
					__( 'h4', 'ohio-extra' ) => 'h4',
					__( 'h5', 'ohio-extra' ) => 'h5',
					__( 'h6', 'ohio-extra' ) => 'h6'
				),
				'std' => 'h3',
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle', 'ohio-extra' ),
				'param_name' => 'subtitle',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Subtitle layout', 'ohio-extra' ),
				'param_name' => 'subtitle_type_layout',
				'value' => array(
					__( 'Bottom Subtitle', 'ohio-extra' ) => 'bottom_subtitle',
					__( 'Top Subtitle', 'ohio-extra' ) => 'top_subtitle',
					__( 'Without Subtitle', 'ohio-extra' ) => 'without_subtitle'
				),
				'std' => 'h3',
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shape border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '0'
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

			// Button.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add button?', 'ohio-extra' ),
				'param_name' => 'add_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Link', 'ohio-extra' ),
				'param_name' => 'link',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Add icon?', 'ohio-extra' ),
				'param_name' => 'icon_use',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Icon position', 'ohio-extra' ),
				'param_name' => 'icon_position',
				'std' => 'left',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Button', 'ohio-extra' ),
				'heading' => __( 'Icon type', 'ohio-extra' ),
				'param_name' => 'icon_type',
				'value' => array(
					__( 'Font icon', 'ohio-extra' ) => 'font_icon',
					__( 'Custom image', 'ohio-extra' ) => 'user_image'
				),
				'dependency' => array(
					'element' => 'icon_use',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_icon_picker',
				'group' => __( 'Button', 'ohio-extra' ),
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
				'group' => __( 'Button', 'ohio-extra' ),
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

			// Style.
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'bg_color',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Heading typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Subtitle typography', 'ohio-extra' ),
				'param_name' => 'subtitle_typo'
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button', 'ohio-extra' ),
				'param_name' => 'readmore_button',
				'button_full_disabled' => 'true',
				'dependency' => array(
					'element' => 'add_link',
					'value' => array(
						'1'
					)
				),
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
		),
	);
}