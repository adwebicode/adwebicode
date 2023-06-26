<?php

/**
* WPBakery Page Builder Ohio Google Maps shortcode params
*/

vc_lean_map( 'ohio_google_maps', 'ohio_google_maps_sc_map' );

function ohio_google_maps_sc_map() {
	return array(
		'name' => __( 'Google Maps', 'ohio-extra' ),
		'description' => __( 'Google Maps block', 'ohio-extra' ),
		'base' => 'ohio_google_maps',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/google_maps_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map layout', 'ohio-extra' ),
				'param_name' => 'map_style',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_inherit.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/light_dream.png',
						'key' => 'light_dream',
						'title' => __( 'Light Dream', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/shades_of_grey.png',
						'key' => 'shades_of_grey',
						'title' => __( 'Dark', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/paper.png',
						'key' => 'paper',
						'title' => __( 'Paper', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/light_monochrome.png',
						'key' => 'light_monochrome',
						'title' => __( 'Monochrome', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/lunar_landscape.png',
						'key' => 'lunar_landscape',
						'title' => __( 'Lunar', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/routexl.png',
						'key' => 'routexl',
						'title' => __( 'Routexl', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/flat_pale.png',
						'key' => 'flat_pale',
						'title' => __( 'Flat Pale', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/maps/flat_design.png',
						'key' => 'flat_design',
						'title' => __( 'Flat Design', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Location coordinates', 'ohio-extra' ),
				'param_name' => 'marker_locations',
				'description' => __( 'Use several locations by placing coordinates in separate rows (e.g. 41.425383, 2.1740062)&nbsp;<a target="_blank" href="https://support.google.com/maps/answer/18539">Google Maps help&nbsp;<i class="far fa-question-circle"></i></a>', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map height', 'ohio-extra' ),
				'param_name' => 'map_height',
				'description' => __( 'Set a height or leave empty to make a map responsive.&nbsp;<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Map zoom', 'ohio-extra' ),
				'param_name' => 'map_zoom',
				'description' => __( 'Map zoom level (min - 1, max - 20, default - 14)', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show zoom control', 'ohio-extra' ),
				'param_name' => 'map_zoom_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show street view control', 'ohio-extra' ),
				'param_name' => 'map_street_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show map type control', 'ohio-extra' ),
				'param_name' => 'map_type_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show fullscreen control', 'ohio-extra' ),
				'param_name' => 'map_fullscreen_enable',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),

			// Styles.
			array(
				'type' => 'attach_image',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Custom marker', 'ohio-extra' ),
				'param_name' => 'map_marker',
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