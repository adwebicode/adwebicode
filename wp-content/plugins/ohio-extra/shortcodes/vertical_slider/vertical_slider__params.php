<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode params
*/

vc_lean_map( 'ohio_vertical_slider', 'ohio_vertical_slider_sc_map' );

function ohio_vertical_slider_sc_map() {
	return array(
		'name' => __( 'Vertical Slider', 'ohio-extra' ),
		'description' => __( 'Paged split view', 'ohio-extra' ),
		'base' => 'ohio_vertical_slider',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/vertical_slider_icon.svg',
		'holder' => '',
		'js_view' => 'VcOhioVerticalSliderView',
		'show_settings_on_create' => true,
		'content_element' => true,
		'is_container' => true,
		'as_parent' => array(
			'only' => 'ohio_vertical_slider_inner'
		),
		'default_content' => '[ohio_vertical_slider_inner][/ohio_vertical_slider_inner]',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop mode', 'ohio-extra' ),
				'param_name' => 'loop',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay_mode',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay interval timeout', 'ohio-extra' ),
				'param_name' => 'autoplay_timeout',
				'description' => 'Autoplay interval timeout in seconds.',
				'value' => '3000',
				'dependency' => array(
					'element' => 'autoplay_mode',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse drag mode', 'ohio-extra' ),
				'param_name' => 'drag_scrolling',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse wheel scroll', 'ohio-extra' ),
				'param_name' => 'mousewheel_scrolling',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Fullscreen mode', 'ohio-extra' ),
				'param_name' => 'fullscreen_mode',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Slider direction', 'ohio-extra' ),
				'param_name' => 'scroll_type',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => '0',
					__( 'Vertical', 'ohio-extra' ) => '1'
				),
			),
			
			// Pagination.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination', 'ohio-extra' ),
				'param_name' => 'pagination_show',
				'description' => 'Show pagination?',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Pagination type', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Bullets', 'ohio-extra' ) => 'bullets',
					__( 'Numbers', 'ohio-extra' ) => 'numbers'
				),
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Navigation', 'ohio-extra' ),
				'param_name' => 'navigation_show',
				'description' => 'Show navigation buttons?',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			
			// Styles
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'pagination_show',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Navigation color', 'ohio-extra' ),
				'param_name' => 'navigation_color',
				'dependency' => array(
					'element' => 'navigation_show',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Navigation background color', 'ohio-extra' ),
				'param_name' => 'navigation_bg_color',
				'dependency' => array(
					'element' => 'navigation_show',
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
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Ohio_Vertical_Slider extends WPBakeryShortCodesContainer { }
}