<?php

/**
* WPBakery Page Builder Ohio Recent Projects shortcode params
*/

vc_lean_map( 'ohio_recent_projects', 'ohio_recent_projects_sc_map' );

function ohio_recent_projects_sc_map() {
	return array(
		'name' => __( 'Portfolio Projects', 'ohio-extra' ),
		'description' => __( 'Block with portfolio projects', 'ohio-extra' ),
		'base' => 'ohio_recent_projects',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/recent_projects_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio layout', 'ohio-extra' ),
				'param_name' => 'card_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . '/images/acf__image_portfolio_01.svg',
						'key' => 'grid_1',
						'title' => __( 'Classic Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_02.svg',
						'key' => 'grid_2',
						'title' => __( 'Minimal Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_46.svg',
						'key' => 'grid_13',
						'title' => __( 'Sticky Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_43.svg',
						'key' => 'grid_11',
						'title' => __( 'Caption Cursor Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_03.svg',
						'key' => 'grid_3',
						'title' => __( 'Slider: Horizontal', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_04.svg',
						'key' => 'grid_4',
						'title' => __( 'Slider: Vertical', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_06.svg',
						'key' => 'grid_6',
						'title' => __( 'Carousel: Horizontal', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_05.svg',
						'key' => 'grid_5',
						'title' => __( 'Smooth Scroll: Split Screen', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_07.svg',
						'key' => 'grid_7',
						'title' => __( 'Smooth Scroll: Fullscreen', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_37.svg',
						'key' => 'grid_9',
						'title' => __( 'Smooth Scroll: Scattered', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_38.svg',
						'key' => 'grid_10',
						'title' => __( 'Smooth Scroll: Centered', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_42.svg',
						'key' => 'grid_8',
						'title' => __( 'Interactive: Links', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_45.svg',
						'key' => 'grid_12',
						'title' => __( 'Interactive: Vertical Links', 'ohio-extra' )
					)
				)
			),
			array(
				'type' => 'ohio_portfolio_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio categories', 'ohio-extra' ),
				'param_name' => 'projects_category',
				'description' => __( 'Leave empty to choose all categories.', 'ohio-extra' ),
				'value' => ''
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Portfolio thumbnail size', 'ohio-extra' ),
				'param_name' => 'portfolio_images_size',
				'value' => array(
					__( 'Inherit from Theme Settings', 'ohio-extra' ) => 'inherit',
					__( 'Thumbnail', 'ohio-extra' ) => 'thumbnail',
					__( 'Small', 'ohio-extra' ) => 'medium',
					__( 'Medium', 'ohio-extra' ) => 'medium_large',
					__( 'Large', 'ohio-extra' ) => 'large',
					__( 'Original', 'ohio-extra' ) => 'ohio_full',
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Thumbnail border radius', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal height', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'description' => __( 'Convert blog images to a square.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Enable tilt effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop shadow?', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
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
					__( 'Image Transition', 'ohio-extra' ) => 'transition',
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Contained layout', 'ohio-extra' ),
				'param_name' => 'card_boxed_layout',
				'description' => __( 'Add side gaps for portfolio cards.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Reversed layout', 'ohio-extra' ),
				'param_name' => 'card_reversed_layout',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_13',
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Slider direction', 'ohio-extra' ),
				'param_name' => 'slider_direction',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Slider direction on mobile', 'ohio-extra' ),
				'param_name' => 'slider_direction_mobile',
				'value' => array(
					__( 'Horizontal', 'ohio-extra' ) => 'horizontal',
					__( 'Vertical', 'ohio-extra' ) => 'vertical',
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Fullscreen mode', 'ohio-extra' ),
				'param_name' => 'fullscreen_mode',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_9',
						'grid_10',
						'grid_12',
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Navigation visibility', 'ohio-extra' ),
				'param_name' => 'navigation_visibility',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Bullets visibility', 'ohio-extra' ),
				'param_name' => 'bullets_visibility',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Loop mode', 'ohio-extra' ),
				'param_name' => 'loop_mode',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Mouse wheel scroll', 'ohio-extra' ),
				'param_name' => 'mousewheel_scroll',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay mode', 'ohio-extra' ),
				'param_name' => 'autoplay_mode',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),

			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Autoplay interval timeout (ms)', 'ohio-extra' ),
				'param_name' => 'autoplay_interval',
				'value' => '3000',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					),
					'element' => 'autoplay_mode',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button visibility', 'ohio-extra' ),
				'param_name' => 'show_video_button',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button style', 'ohio-extra' ),
				'param_name' => 'video_button_style',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Outlined', 'ohio-extra' ) => 'outlined',
					__( 'Blurred', 'ohio-extra' ) => 'blurred',

				),
				'dependency' => array(
					'element' => 'show_video_button',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Video button size', 'ohio-extra' ),
				'param_name' => 'video_button_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large',

				),
				'dependency' => array(
					'element' => 'show_video_button',
					'value' => array(
						'1'
					)
				)
			),

			// Grid
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid items in the block', 'ohio-extra' ),
				'param_name' => 'projects_in_block',
				'description' => __( 'Set a number of grid items output.', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid gap', 'ohio-extra' ),
				'param_name' => 'grid_items_gap',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '1.25rem',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'row_items_title',
				'value' => __( 'Portfolio items per row', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_6',
						'grid_11',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'columns_in_row',
				'std' => '2-2-1',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_6',
						'grid_11',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'appear_effect_title',
				'value' => __( 'Grid appear effect', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),

			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid animation', 'ohio-extra' ),
				'param_name' => 'animation_type',
				'value' => array(
					__( 'Disable animation', 'ohio-extra' ) => 'default',
					__( 'Sync animation', 'ohio-extra' ) => 'sync',
					__( 'Async animation', 'ohio-extra' ) => 'async'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid animation effect', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'animation_type',
					'value' => array(
						'sync',
						'async'
					)
				),
				'param_name' => 'animation_effect',
				'value' => array(
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom out', 'ohio-extra' ) => 'zoom-out'
				)
			),

			// Filter.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Filter', 'ohio-extra' ),
				'heading' => __( 'Filter visibility', 'ohio-extra' ),
				'param_name' => 'show_projects_filter',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Filter', 'ohio-extra' ),
				'heading' => __( 'Filter position', 'ohio-extra' ),
				'param_name' => 'filter_align',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'std' => 'center',
				'dependency' => array(
					'element' => 'show_projects_filter',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __('Filter', 'ohio-extra'),
				'heading' => 'Show empty categories in filter',
				'param_name' => 'show_empty_categories',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'pagination_type',
					'value' => array(
						'standard'
					)
				)
			),

			// Pagination.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Use pagination', 'ohio-extra' ),
				'param_name' => 'use_pagination',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_8',
						'grid_11',
						'grid_12',
						'grid_13',
					)
				),
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

			// Lightbox.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Lightbox', 'ohio-extra' ),
				'heading' => __( 'Lightbox visibility', 'ohio-extra' ),
				'description' => 'To find more portfolio lightbox options navigate to global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">Theme Settings</a>',
				'param_name' => 'lightbox_visibility',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title typography', 'ohio-extra' ),
				'param_name' => 'title_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Category typography', 'ohio-extra' ),
				'param_name' => 'category_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Date typography', 'ohio-extra' ),
				'param_name' => 'date_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_9',
						'grid_10',
						'grid_12',
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Excerpt typography', 'ohio-extra' ),
				'param_name' => 'short_description_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_9',
						'grid_10',
						'grid_12',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Project link typography', 'ohio-extra' ),
				'param_name' => 'link_typo',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_8',
						'grid_9',
						'grid_10',
						'grid_12',
						'grid_13',
					)
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Background color', 'ohio-extra' ),
				'param_name' => 'background_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_7',
						'grid_9',
						'grid_10',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_10',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Video button color', 'ohio-extra' ),
				'param_name' => 'video_btn_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Lightbox icon color', 'ohio-extra' ),
				'param_name' => 'lightbox_button_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_1',
						'grid_2',
						'grid_11',
						'grid_13',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Navigation color', 'ohio-extra' ),
				'param_name' => 'nav_btn_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination color', 'ohio-extra' ),
				'param_name' => 'pagination_btn_color',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'grid_3',
						'grid_4',
						'grid_5',
						'grid_6',
						'grid_7',
						'grid_9',
						'grid_10'
					)
				)
			),
			array(
                'type' => 'ohio_divider',
                'group' => __( 'Styles', 'ohio-extra' ),
                'param_name' => 'filter_settings_title',
                'value' => __( 'Filter', 'ohio-extra' ),
                'dependency' => array(
					'element' => 'show_projects_filter',
					'value' => '1',
				)
            ),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Filter typography', 'ohio-extra' ),
				'param_name' => 'filter_typo',
				'dependency' => array(
					'element' => 'show_projects_filter',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Filter active color', 'ohio-extra' ),
				'param_name' => 'filter_active_color',
				'dependency' => array(
					'element' => 'show_projects_filter',
					'value' => '1',
				)
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