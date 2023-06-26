<?php if (function_exists('acf_add_local_field_group')) :

	acf_add_local_field_group([
		"key" => "group_592fd650bf099",
		"title" => __('Portfolio Settings', 'ohio'),
		"private" => true,
		"fields" => [
			[
				"key" => "field_591b002d4818cffmod",
				"label" => __('General', 'ohio'),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_5937e0a52b48ce86od152",
				"label" => "",
				"name" => "",
				"type" => "message",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"message" => '<p class="message">' . '<span class="dashicons dashicons-info-outline"></span>' . __('To find more portfolio page settings navigate to', 'ohio') . '&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">' . __('Global Theme Settings', 'ohio') . '</a></p>',
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fa4344b383615p",
				"label" => __('Portfolio layout', 'ohio'),
				"name" => "portfolio_item_layout_type",
				"type" => "image_option",
				"instructions" => __('Choose layout type for portfolio items', 'ohio'),
				"conditional_logic" => 0,
				"default_value" => "inherit",
				"image_option_value" => [
					[
						"name" => "inherit",
						"description" => __('Use from Theme Settings', 'ohio'),
						"src" => "acf__image_inherited.svg"
					],
					[
						"name" => "grid_1",
						"description" => __('Classic Grid', 'ohio'),
						"src" => "acf__image_portfolio_01.svg"
					],
					[
						"name" => "grid_2",
						"description" => __('Minimal Grid', 'ohio'),
						"src" => "acf__image_portfolio_02.svg"
					],
					[
						"name" => "grid_13",
						"description" => __('Sticky Grid', 'ohio'),
						"src" => "acf__image_portfolio_46.svg"
					],
					[
						"name" => "grid_11",
						"description" => __('Caption Cursor Grid', 'ohio'),
						"src" => "acf__image_portfolio_43.svg"
					],
					[
						"name" => "grid_3",
						"description" => __('Slider: Horizontal', 'ohio'),
						"src" => "acf__image_portfolio_03.svg"
					],
					[
						"name" => "grid_4",
						"description" => __('Slider: Vertical', 'ohio'),
						"src" => "acf__image_portfolio_04.svg"
					],
					[
						"name" => "grid_6",
						"description" => __('Carousel: Horizontal', 'ohio'),
						"src" => "acf__image_portfolio_06.svg"
					],
					[
						"name" => "grid_5",
						"description" => __('Smooth Scroll: Split Screen', 'ohio'),
						"src" => "acf__image_portfolio_05.svg"
					],
					[
						"name" => "grid_7",
						"description" => __('Smooth Scroll: Fullscreen', 'ohio'),
						"src" => "acf__image_portfolio_07.svg"
					],
					[
						"name" => "grid_9",
						"description" => __('Smooth Scroll: Scattered', 'ohio'),
						"src" => "acf__image_portfolio_37.svg"
					],
					[
						"name" => "grid_10",
						"description" => __('Smooth Scroll: Centered', 'ohio'),
						"src" => "acf__image_portfolio_38.svg"
					],
					[
						"name" => "grid_8",
						"description" => __('Interactive: Links', 'ohio'),
						"src" => "acf__image_portfolio_42.svg"
					],
					[
						"name" => "grid_12",
						"description" => __('Interactive: Vertical Links', 'ohio'),
						"src" => "acf__image_portfolio_45.svg"
					]
				]
			],
			[
				"key" => "field_5d5313712d7c3",
				"label" => __('Portfolio categories', 'ohio'),
				"name" => "portfolio_categories",
				"type" => "taxonomy",
				"instructions" => __('Leave empty to show all', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"taxonomy" => "ohio_portfolio_category",
				"field_type" => "multi_select",
				"add_term" => 0,
				"save_terms" => 0,
				"load_terms" => 0,
				"return_format" => "object",
				"multiple" => 1,
				"allow_null" => 0
			],
			[
				"key" => "field_59fa41123412345p",
				"label" => __('Portfolio hover effect', 'ohio'),
				"name" => "portfolio_grid_hover",
				"type" => "select",
				"instructions" => __('Choose hover type for portfolio items', 'ohio'),
				"default_value" => "inherit",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						]
					]
				],
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"none" => __('None', 'ohio'),
					"scale" => __('Image Scaling', 'ohio'),
					"overlay" => __('Image Overlay', 'ohio'),
					"greyscale" => __('Image Greyscale', 'ohio'),
					"transition" => __('Image Transition', 'ohio'),
				],
			],
			[
				"key" => "field_59fb4313b383615p",
				"label" => __('Portfolio grid spacing', 'ohio'),
				"name" => "grid_items_without_padding",
				"type" => "inherited_checkbox",
				"instructions" => __('Remove spacing between grid items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"yes" => __('Yes', 'ohio'),
					"no" => __('No', 'ohio')
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5937a0a253d23s15fas",
				"label" => '<h4>' . __('Number of Projects', 'ohio') . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_59fb4334a433615p",
				"label" => __('Portfolio items per page', 'ohio'),
				"name" => "portfolio_projects_per_page",
				"type" => "number",
				"instructions" => __('Set a number of portfolio items output', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"default_value" => 12,
				"placeholder" => "",
				"prepend" => "",
				"append" => __('projects', 'ohio'),
				"min" => 1,
				"max" => 250,
				"step" => 1
			],
			[
				"key" => "field_59fb4313b343615p",
				"label" => __('Portfolio items per row', 'ohio'),
				"name" => "portfolio_columns_in_row",
				"type" => "ohio_columns",
				"instructions" => __('Set a number of portfolio items per row', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						]
					]
				],
				"default_value" => "i-i-i",
				"use_inherit" => true
			],
			[
				"key" => "field_5937a0a25fd23s15p",
				"label" => '<h4>' . __('Grid Appear Effect', 'ohio') . '</h4>',
				"name" => "",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						]
					]
				],
				"type" => "message"
			],
			[
				"key" => "field_59fb4312b343615p",
				"label" => __('Grid animation', 'ohio'),
				"name" => "page_animation_type",
				"type" => "select",
				"instructions" => __('Choose grid animation type', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						]
					]
				],
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"default" => __('Disable animation', 'ohio'),
					"sync" => __('Sync animation', 'ohio'),
					"async" => __('Async animation', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4332b343615p",
				"label" => __('Grid animation effect', 'ohio'),
				"name" => "page_animation_effect",
				"type" => "select",
				"instructions" => __('Choose portfolio items appear effect', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312b343615p",
							"operator" => "!=",
							"value" => "inherit"
						],
						[
							"field" => "field_59fb4312b343615p",
							"operator" => "!=",
							"value" => "default"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						]
					]
				],
				"choices" => [
					"fade-up" => __('Fade up', 'ohio'),
					"fade-left" => __('Fade left', 'ohio'),
					"fade-right" => __('Fade right', 'ohio'),
					"slide-up" => __('Slide up', 'ohio'),
					"flip-down" => __('Flip down', 'ohio'),
					"flip-up" => __('Flip up', 'ohio'),
					"zoom-in" => __('Zoom in', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_591b002d4818cffmodpcs",
				"label" => __('Cards / Slides', 'ohio'),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_59f2342343s83615p",
				"label" => __('Equal height', 'ohio'),
				"name" => "portfolio_equal_height",
				"type" => "inherited_checkbox",
				"instructions" => __('Convert project images to a square', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"yes" => __('Yes', 'ohio'),
					"no" => __('No', 'ohio')
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8fb80d",
				"label" => __('Contained layout', 'ohio'),
				"name" => "portfolio_items_boxed_style",
				"type" => "inherited_checkbox",
				"instructions" => __('Add side gaps for portfolio cards', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"yes" => __('Yes', 'ohio'),
					"no" => __('No', 'ohio')
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_593923234234235235236weq",
				"label" => __('Reversed layout', 'ohio'),
				"name" => "portfolio_grid_reversed",
				"type" => "inherited_checkbox",
				"instructions" => __('Make all even grid items reversed', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "==",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"yes" => __('Yes', 'ohio'),
					"no" => __('No', 'ohio')
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n52l433",
				"label" => __('Portfolio tilt effect', 'ohio'),
				"name" => "portfolio_tilt_effect",
				"type" => "inherited_checkbox",
				"instructions" => __('Enable tilt hover effect for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8b235456",
				"label" => __('Drop shadow', 'ohio'),
				"name" => "portfolio_drop_shadow",
				"type" => "inherited_checkbox",
				"instructions" => __('Drop shadow for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"yes" => __('Yes', 'ohio'),
					"no" => __('No', 'ohio')
				],
				"default_value" => "inherit",
				"ui" => 1,
				"ui_on_text" => __('Yes', 'ohio'),
				"ui_off_text" => __('No', 'ohio'),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_59fb4w123s9823058",
				"label" => __('Fullscreen mode', 'ohio'),
				"name" => "portfolio_fullscreen_mode",
				"type" => "inherited_checkbox",
				"instructions" => __('Set a fullscreen mode for the portfolio slider', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb433432gnr1f",
				"label" => __('Navigation visibility', 'ohio'),
				"name" => "portfolio_nav_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __('Show navigation buttons on portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb43lh421g23",
				"label" => __('Bullets visibility', 'ohio'),
				"name" => "portfolio_bullets_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __('Show bullets bar on portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fbl4lphpoy244",
				"label" => __('Loop mode', 'ohio'),
				"name" => "portfolio_loop_mode",
				"type" => "inherited_checkbox",
				"instructions" => __('Enable loop mode for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59lbl52lkfkf032",
				"label" => __('Autoplay mode', 'ohio'),
				"name" => "portfolio_autoplay_mode",
				"type" => "inherited_checkbox",
				"instructions" => __('Enable autoplay mode for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5kj23bk5n43345kjb",
				"label" => __('Autoplay interval timeout', 'ohio'),
				"name" => "portfolio_autoplay_interval",
				"type" => "number",
				"instructions" => __('Set up autoplay interval timeout', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value",
				"append" => __('Ms', 'ohio')
			],
			[
				"key" => "field_59fb4n52n3lool433",
				"label" => __('Mouse wheel scroll', 'ohio'),
				"name" => "portfolio_mousewheel_mode",
				"type" => "inherited_checkbox",
				"instructions" => __('Enable mouse wheel scroll for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n52n3lool434",
				"label" => __('Drag scroll', 'ohio'),
				"name" => "portfolio_dragscroll_mode",
				"type" => "inherited_checkbox",
				"instructions" => __('Enable drag scroll for portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n5asfol434",
				"label" => __('Slider direction', 'ohio'),
				"name" => "portfolio_slider_direction",
				"type" => "select",
				"instructions" => __('Set slider animation direction', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"horizontal" => __('Horizontal', 'ohio'),
					"vertical" => __('Vertical', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n5asfol434b",
				"label" => __('Slider direction on mobiles', 'ohio'),
				"name" => "portfolio_slider_direction_mobile",
				"type" => "select",
				"instructions" => __('Set slider animation direction on mobile devices', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"horizontal" => __('Horizontal', 'ohio'),
					"vertical" => __('Vertical', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59a678fgh53d23s15fas",
				"label" => '<h4>' . __('Elements', 'ohio') . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_5436we346g6vdf6",
				"label" => __('Video button', 'ohio'),
				"name" => "portfolio_video_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __('Show video button on portfolio items', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4312b343615asdasdx",
				"label" => __('Video button style', 'ohio'),
				"name" => "portfolio_video_button_style",
				"type" => "select",
				"instructions" => __('Choose video button style', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"default" => __('Default', 'ohio'),
					"outlined" => __('Outlined', 'ohio'),
					"blurred" => __('Blurred', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4312b343615ajhlk",
				"label" => __('Video button size', 'ohio'),
				"name" => "portfolio_video_button_size",
				"type" => "select",
				"instructions" => __('Choose video button size', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"default" => __('Default', 'ohio'),
					"small" => __('Small', 'ohio'),
					"large" => __('Large', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59392398832343d99asdasdw",
				"label" => __('Video button color', 'ohio'),
				"name" => "portfolio_grid_video_btn_bg",
				"type" => "ohio_color",
				"instructions" => __('Choose video button color', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0
			],
			[
				"key" => "field_591b002d4819cffmod",
				"label" => __('Portfolio Page', 'ohio'),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_5937a54r3hs152p",
				"label" => '<h4>' . __('Portfolio Filter Bar', 'ohio') . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_59fb4334b343615p",
				"label" => __('Category filter', 'ohio'),
				"name" => "project_page_filter_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __('Show category filter on portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"show" => __('Show', 'ohio'),
					"hide" => __('Hide', 'ohio')
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592fd651222a5_tcol",
				"label" => __('Category filter typography', 'ohio'),
				"name" => "project_filter_text_typo",
				"type" => "ohio_typo",
				"instructions" => __('Choose category filter typography', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"default_value" => "inherit",
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592fd651222a5_acol",
				"label" => __('Category filter accent typography', 'ohio'),
				"name" => "project_filter_accent_typo",
				"type" => "ohio_typo",
				"instructions" => __('Choose category filter accent typography', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"default_value" => "inherit",
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592fd6512267d",
				"label" => __('Category filter position', 'ohio'),
				"name" => "project_filter_align",
				"type" => "select",
				"instructions" => __('Choose category filter position for portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"left" => __('Left', 'ohio'),
					"center" => __('Center', 'ohio'),
					"right" => __('Right', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_5ewf4dx8b11fg36q5",
				"label" => __('Show empty categories in filter'),
				"name" => "project_filter_show_empty_categories",
				"type" => "true_false",
				"instructions" => __('Choose if categories that have no associated projects on the current page are displayed', 'ohio'),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd65121624",
							"operator" => "==",
							"value" => "standard"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_5937a54r3hs231p",
				"label" => '<h4>' . __('Portfolio Page Pagination', 'ohio') . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592fd65121624",
				"label" => __('Pagination', 'ohio'),
				"name" => "pagination_type",
				"type" => "select",
				"instructions" => __('Choose pagination layout for portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"standard" => __('Standard', 'ohio'),
					"lazy_scroll" => __('Lazy load', 'ohio'),
					"lazy_button" => __('Load more', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd5f56ba32s",
				"label" => __('Pagination type', 'ohio'),
				"name" => "pagination_style",
				"type" => "select",
				"instructions" => __('Choose pagination type for portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"default" => __('Default', 'ohio'),
					"outlined" => __('Outlined', 'ohio'),
					"flat" => __('Text', 'ohio')
				],
				"default_value" => [
					"standard"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd523442331s",
				"label" => __('Pagination size', 'ohio'),
				"name" => "pagination_size",
				"type" => "select",
				"instructions" => __('Choose pagination size for portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"default" => __('Default', 'ohio'),
					"small" => __('Small', 'ohio'),
					"large" => __('Large', 'ohio')
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_59fb4334bgd33615",
				"label" => __('Pagination position', 'ohio'),
				"name" => "pagination_position",
				"type" => "select",
				"instructions" => __('Choose pagination position for portfolio page', 'ohio'),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __('Use from Theme Settings', 'ohio'),
					"left" => __('Left', 'ohio'),
					"center" => __('Center', 'ohio'),
					"right" => __('Right', 'ohio')
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			]
		],
		"location" => [
			[
				[
					"param" => "page_template",
					"operator" => "==",
					"value" => "page_templates/page_for-projects.php"
				]
			]
		],
		"menu_order" => 0,
		"position" => "normal",
		"style" => "default",
		"label_placement" => "left",
		"instruction_placement" => "label",
		"hide_on_screen" => "",
		"active" => 1,
		"description" => ""
	]);

endif;
