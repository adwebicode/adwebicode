<?php

vc_lean_map( 'ohio_testimonial', 'ohio_testimonial_sc_map' );

function ohio_testimonial_sc_map() {
	return array(
		'name' => __( 'Testimonial', 'ohio-extra' ),
		'description' => __( 'Testimonial module', 'ohio-extra' ),
		'base' => 'ohio_testimonial',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/testimonial_icon.svg',
		'js_view' => 'VcOhioTestimonialView',
		'custom_markup' => '{{title}}<div class="vc_ohio_testimonial-container">
				<div class="lines"><div class="line"></div><div class="line"></div><div class="line"></div></div>
				<div class="photo"></div>
				<div class="name">%%author%%</div>
				<div class="position"></div>
			</div>',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Testimonial layout', 'ohio-extra' ),
				'param_name' => 'block_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_071.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_065.svg',
						'key' => 'photo_top',
						'title' => __( 'Image Top', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_068.svg',
						'key' => 'photo_middle',
						'title' => __( 'Image Middle', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Testimonial alignment', 'ohio-extra' ),
				'param_name' => 'block_alignment',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_070.svg',
						'key' => 'left',
						'title' => __( 'Left', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_071.svg',
						'key' => 'center',
						'title' => __( 'Center', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_072.svg',
						'key' => 'right',
						'title' => __( 'Right', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Avatar image', 'ohio-extra' ),
				'param_name' => 'photo',
				'description' => __( 'Choose author photo.', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'block_type_layout',
					'value' => array(
						'photo_top',
						'photo_middle'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Avatar image size', 'ohio-extra' ),
				'param_name' => 'avatar_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large'
				),
				'dependency' => array(
					'element' => 'block_type_layout',
					'value' => array(
						'photo_top',
						'photo_middle'
					)
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Headline', 'ohio-extra' ),
				'param_name' => 'headline'
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Testimonial text', 'ohio-extra' ),
				'param_name' => 'quote'
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Author name', 'ohio-extra' ),
				'param_name' => 'author',
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Author position', 'ohio-extra' ),
				'param_name' => 'position',
				'description' => __( 'E.g. <strong>Product manager</strong>.', 'ohio-extra' )
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Headline typography', 'ohio-extra' ),
				'param_name' => 'headline_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Testimonial typography', 'ohio-extra' ),
				'param_name' => 'quote_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Author typography', 'ohio-extra' ),
				'param_name' => 'author_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Position typography', 'ohio-extra' ),
				'param_name' => 'position_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Author image border color', 'ohio-extra' ),
				'param_name' => 'image_border_color',
				'dependency' => array(
					'element' => 'block_type_layout',
					'value' => array(
						'photo_top',
						'photo_middle',
					)
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