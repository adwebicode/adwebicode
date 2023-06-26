<?php

vc_lean_map( 'ohio_compare', 'ohio_compare_sc_map' );

function ohio_compare_sc_map() {
	return array(
		'name' => __( 'Compare', 'ohio-extra' ),
		'description' => __( 'Compare module', 'ohio-extra' ),
		'base' => 'ohio_compare',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/compare_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image before', 'ohio-extra' ),
				'param_name' => 'first_image',
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image after', 'ohio-extra' ),
				'param_name' => 'second_image',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Orientation', 'ohio-extra' ),
				'param_name' => 'orientation_type',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
				),
				'std' => 'horizontal',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show overlay labels?', 'ohio-extra' ),
				'description' => __( '', 'ohio-extra' ),
				'param_name' => 'use_label',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image before label', 'ohio-extra' ),
				'param_name' => 'before_label_text',
				'value' => __( 'Before', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'use_label',
					'value' => '1'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image after label', 'ohio-extra' ),
				'param_name' => 'after_label_text',
				'value' => __( 'After', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'use_label',
					'value' => '1'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Divider position', 'ohio-extra' ),
				'param_name' => 'position',
				'description' => __( 'Initial position of the divider in %', 'ohio-extra' ),
				'value' => "50%"
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image border radius', 'ohio-extra' ),
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

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Label typography', 'ohio-extra' ),
				'param_name' => 'label_typo'
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Label background color', 'ohio-extra' ),
				'param_name' => 'label_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Handle line color', 'ohio-extra' ),
				'param_name' => 'handler_color',
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