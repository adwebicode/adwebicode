<?php

/**
* WPBakery Page Builder Ohio Recent Posts shortcode params
*/

vc_lean_map( 'ohio_recent_posts', 'ohio_recent_posts_sc_map' );

function ohio_recent_posts_sc_map() {
	return array(
		'name' => __( 'Blog Posts', 'ohio-extra' ),
		'description' => __( 'Block with blog posts', 'ohio-extra' ),
		'base' => 'ohio_recent_posts',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/recent_posts_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog layout', 'ohio-extra' ),
				'param_name' => 'card_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_01.svg',
						'key' => 'blog_grid_1',
						'title' => __( 'Classic Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_02.svg',
						'key' => 'blog_grid_2',
						'title' => __( 'Minimal Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_39.svg',
						'key' => 'blog_grid_3',
						'title' => __( 'Split Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_40.svg',
						'key' => 'blog_grid_4',
						'title' => __( 'Inner Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_41.svg',
						'key' => 'blog_grid_5',
						'title' => __( 'Compact Grid', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_44.svg',
						'key' => 'blog_grid_6',
						'title' => __( 'Simple Grid', 'ohio-extra' )
					)
				)
			),
			array(
				'type' => 'ohio_post_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Blog categories', 'ohio-extra' ),
				'description' => __( 'Leave empty to choose all categories.', 'ohio-extra' ),
				'param_name' => 'post_category',
				'value' => ''
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Thumbnail size', 'ohio-extra' ),
				'param_name' => 'blog_images_size',
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
				'value' => '5'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal height', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'description' => __( 'Convert blog images to a square.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
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
				'heading' => __( 'Contained layout', 'ohio-extra' ),
				'param_name' => 'card_boxed',
				'description' => __( 'Add side gaps for blog cards.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Excerpt visibility', 'ohio-extra' ),
				'param_name' => 'short_description',
				'value' => array(
					__( 'Show', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( '"Read more" visibility', 'ohio-extra' ),
				'param_name' => 'show_read_more',
				'value' => array(
					__( 'Show', 'ohio-extra' ) => '0'
				)
			),

			// Grid.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Masonry grid', 'ohio-extra' ),
				'param_name' => 'masonry_grid',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid items in the block', 'ohio-extra' ),
				'param_name' => 'posts_in_block',
				'description' => __( 'Set a number of grid items output.', 'ohio-extra' ),
				'value' => '12'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Grid gap', 'ohio-extra' ),
				'param_name' => 'card_gap',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '1.25rem',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
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
				)
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
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'row_items_title',
				'value' => __( 'Blog items per row', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'columns_in_row',
				'std' => '2-2-1',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
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
				'param_name' => 'heading_typo',
			),

			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Excerpt typography', 'ohio-extra' ),
				'param_name' => 'excerpt_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Categories typography', 'ohio-extra' ),
				'param_name' => 'category_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Published date typography', 'ohio-extra' ),
				'param_name' => 'date_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Reading time typography', 'ohio-extra' ),
				'param_name' => 'reading_time_typo',
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
				'heading' => __( 'Read More typography', 'ohio-extra' ),
				'param_name' => 'read_more_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Contained background color', 'ohio-extra' ),
				'param_name' => 'card_background_color',
				'dependency' => array(
					'element' => 'card_boxed',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'card_effect',
					'value' => 'overlay',
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