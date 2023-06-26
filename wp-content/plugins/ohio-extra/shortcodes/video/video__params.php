<?php

/**
* WPBakery Page Builder Ohio Video shortcode params
*/

vc_lean_map( 'ohio_video', 'ohio_video_sc_map' );

function ohio_video_sc_map() {
	return array(
		'name' => __( 'Video', 'ohio-extra' ),
		'description' => __( 'Popup video module', 'ohio-extra' ),
		'base' => 'ohio_video',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/video_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video layout', 'ohio-extra' ),
				'param_name' => 'layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_076.svg',
						'key' => 'boxed_shape',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_075.svg',
						'key' => 'with_preview',
						'title' => __( 'With preview', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button layout', 'ohio-extra' ),
				'param_name' => 'button_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_073.svg',
						'key' => 'filled',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_074.svg',
						'key' => 'outline',
						'title' => __( 'Outlined', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_074.svg',
						'key' => 'blurred',
						'title' => __( 'Blurred', 'ohio-extra' ),
					),
				),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button position', 'ohio-extra' ),
				'param_name' => 'alignment',
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
				'std' => 'center',
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Preview image', 'ohio-extra' ),
				'param_name' => 'preview_image',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'with_preview'
					)
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'with_preview'
					)
				)
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Enable tilt effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					'Yes' => '0'
				),
				'dependency' => array(
					'element' => 'layout',
					'value' => array(
						'with_preview'
					)
				)
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
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button size', 'ohio-extra' ),
				'param_name' => 'button_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large'
				),
			),
			array(
				'type' => 'textarea_raw_html',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video title', 'ohio-extra' ),
				'param_name' => 'title',
				'value' => ''
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video type', 'ohio-extra' ),
				'param_name' => 'video_type',
				'value' => array(
					__( 'YouTube', 'ohio-extra' ) => 'youtube',
					__( 'Vimeo', 'ohio-extra' ) => 'vimeo',
					__( 'Custom (self-hosted)', 'ohio-extra' ) => 'custom'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video URL', 'ohio-extra' ),
				'param_name' => 'link',
				'value' => '',
				'description' => __( '<strong>YouTube:</strong> https://www.youtube.com/embed/t67_zAg5vvI <br><strong>Vimeo:</strong> https://player.vimeo.com/video/356065748', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video start (s)', 'ohio-extra' ),
				'description' => __( 'Used to automatically begin playback at a specific point in time (e.g. 25s)', 'ohio-extra' ),
				'param_name' => 'start_option',
				'value' => '',
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'youtube',
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay_option',
				'description' => __( 'Autoplay works with muted mode only and may be blocked in some environments, such as IOS, Chrome 66+, and Safari 11+. In these cases, we’ll revert to standard playback requiring viewers to initiate playback.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'youtube',
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Muted mode', 'ohio-extra' ),
				'description' => __( 'Set video to mute on load.', 'ohio-extra' ),
				'param_name' => 'muted_option',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'youtube',
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show related videos from the same channel', 'ohio-extra' ),
				'description' => __( 'Related videos will come from the same channel.', 'ohio-extra' ),
				'param_name' => 'limit_related_videos_option',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'youtube',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show controls', 'ohio-extra' ),
				'param_name' => 'controls_option',
				'description' => __( 'When disabling this parameter, the play/pause button will be hidden. To start playback for your viewers, you\'ll need to either enable autoplay mode.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'youtube',
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show title', 'ohio-extra' ),
				'param_name' => 'title_option',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show author', 'ohio-extra' ),
				'param_name' => 'byline_option',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'video_type',
					'value' => array(
						'vimeo'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Button animation', 'ohio-extra' ),
				'param_name' => 'button_anim',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),

			// Style.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button color', 'ohio-extra' ),
				'param_name' => 'button_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button color (hover state)', 'ohio-extra' ),
				'param_name' => 'button_hover_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon color (hover state)', 'ohio-extra' ),
				'param_name' => 'icon_hover_color'
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