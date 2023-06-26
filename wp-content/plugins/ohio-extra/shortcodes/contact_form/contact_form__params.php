<?php

/**
* WPBakery Page Builder Ohio Contact Form shortcode params
*/

vc_lean_map( 'ohio_contact_form', 'ohio_contact_form_sc_map' );

function ohio_contact_form_sc_map() {
	$ohio_extra_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$ohio_extra_contact_forms = array();
	if ( $ohio_extra_cf7 ) {
		foreach ( $ohio_extra_cf7 as $cform ) {
			$ohio_extra_contact_forms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$ohio_extra_contact_forms[ __( 'No contact forms found', 'ohio-extra' ) ] = 0;
	}

	return array(
		'name' => __( 'Contact Form 7', 'ohio-extra' ),
		'description' => __( 'Contact and subscribe forms', 'ohio-extra' ),
		'base' => 'ohio_contact_form',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/contact_form_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'text',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( '', 'ohio-extra' ),
				'param_name' => 'photo_count',
				'description' => __( 'Ensure that you have installed and activated the <a target="_blank" href="/wp-admin/plugins.php">Contact Form 7</a> from the recommended plugins.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Form layout', 'ohio-extra' ),
				'param_name' => 'form_style',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_031.svg',
						'key' => 'flat',
						'title' => __( 'Flat', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_030.svg',
						'key' => 'outline',
						'title' => __( 'Outline', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Form alignment', 'ohio-extra' ),
				'param_name' => 'form_position',
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
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Contact Form 7', 'ohio-extra' ),
				'param_name' => 'form_id',
				'value' => $ohio_extra_contact_forms,
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Form grid gap', 'ohio-extra' ),
				'param_name' => 'fields_offset',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '20'
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text placeholder typography', 'ohio-extra' ),
				'param_name' => 'input_placeholder_typo'
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text typography', 'ohio-extra' ),
				'param_name' => 'input_text_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text fields background', 'ohio-extra' ),
				'param_name' => 'fields_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'flat',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text fields background (active state)', 'ohio-extra' ),
				'param_name' => 'fields_active_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'flat',
					)
				)
			),

			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text fields border color', 'ohio-extra' ),
				'param_name' => 'fields_border_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'outline'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Text fields border color (active state)', 'ohio-extra' ),
				'param_name' => 'fields_focus_border_color',
				'dependency' => array(
					'element' => 'form_style',
					'value' => array(
						'outline'
					)
				)
			),
			array(
				'type' => 'ohio_button',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Button', 'ohio-extra' ),
				'param_name' => 'button',
				'button_full_disabled' => 'true'
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