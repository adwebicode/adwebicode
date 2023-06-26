<?php

/**
* WPBakery Page Builder Ohio Gallery shortcode params
*/

vc_lean_map( 'ohio_gallery', 'ohio_gallery_sc_map' );

function ohio_gallery_sc_map() {
	return array(
		'name' => __( 'Gallery', 'ohio-extra' ),
		'description' => __( 'Simple lightbox gallery module', 'ohio-extra' ),
		'base' => 'ohio_gallery',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/gallery_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Gallery layout', 'ohio-extra' ),
				'param_name' => 'gallery_grid',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_114.svg',
						'key' => 'default',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_113.svg',
						'key' => 'minimal',
						'title' => __( 'Minimal', 'ohio-extra' ),
					)
				)
			),
			array(
				'type' => 'attach_images',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Images', 'ohio-extra' ),
				'param_name' => 'content_images',
				'description' => __( 'Set an image title and caption values in the WordPress <a target="_blank" href="./upload.php">Library menu</a>.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Content alignment', 'ohio-extra' ),
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
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Image border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal height', 'ohio-extra' ),
				'description' => __( 'Convert banner images to a square.', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'value' => array(
					'Yes' => '0'
				),
			),
			array(
				'type' => 'checkbox',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Enable tilt effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					'Yes' => '0'
				),
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
				'heading' => __( 'Hover effect', 'ohio-extra' ),
				'param_name' => 'card_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Image Scaling', 'ohio-extra' ) => 'scale',
					__( 'Image Overlay', 'ohio-extra' ) => 'overlay',
					__( 'Image Greyscale', 'ohio-extra' ) => 'greyscale',
				),
				'std' => 'none',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show image details?', 'ohio-extra' ),
				'param_name' => 'show_title',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),

			// Grid
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Masonry grid', 'ohio-extra' ),
				'param_name' => 'masonry_grid',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid gap', 'ohio-extra' ),
				'param_name' => 'gap',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '20'
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Columns', 'ohio-extra' ),
				'param_name' => 'columns',
				'std' => '2-2-1'
			),

			// Pagination
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Use pagination', 'ohio-extra' ),
				'param_name' => 'use_pagination',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Grid items per page', 'ohio-extra' ),
				'param_name' => 'pagination_items_per_page',
				'description' => __( 'Set a number of grid items output per page.', 'ohio-extra' ),
				'value' => '6',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination layout', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Standard', 'ohio-extra' ) => 'standard',
					__( 'Lazy Load', 'ohio-extra' ) => 'lazy_scroll',
					__( 'Load More', 'ohio-extra' ) => 'lazy_button',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination type', 'ohio-extra' ),
				'param_name' => 'pagination_style',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Outlined', 'ohio-extra' ) => 'outlined',
					__( 'Text', 'ohio-extra' ) => 'flat',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination size', 'ohio-extra' ),
				'param_name' => 'pagination_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination position', 'ohio-extra' ),
				'param_name' => 'pagination_position',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
				'dependency' => array(
					'element' => 'show_title',
					'value' => '1'
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
			),
			array(
                'type' => 'ohio_divider',
                'group' => __( 'Styles', 'ohio-extra' ),
                'param_name' => 'lightbox_settings_title',
                'value' => __( 'Lightbox', 'ohio-extra' ),
            ),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title typography', 'ohio-extra' ),
				'param_name' => 'gallery_title_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Details typography', 'ohio-extra' ),
				'param_name' => 'gallery_caption_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'gallery_bg_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon buttons color', 'ohio-extra' ),
				'param_name' => 'icon_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon buttons background', 'ohio-extra' ),
				'param_name' => 'gallery_buttons_color',
			),
			array(
                'type' => 'ohio_divider',
                'group' => __( 'Styles', 'ohio-extra' ),
                'param_name' => 'pagination_settings_title',
                'value' => __( 'Pagination', 'ohio-extra' ),
                'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
            ),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination color (hover state)', 'ohio-extra' ),
				'param_name' => 'pagination_active_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
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