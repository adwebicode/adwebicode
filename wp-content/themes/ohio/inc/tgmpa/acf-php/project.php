<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_59391f245236d",
        "title" => __('Project Details', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59391f24594ff",
                "label" => __('Excerpt', 'ohio'),
                "name" => "project_description",
                "type" => "wysiwyg",
                "instructions" => __('Write a short description for this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "maxlength" => "",
                "rows" => "",
                "new_lines" => "wpautop"
            ],
            [
                "key" => "field_59391f24598db",
                "label" => __('Media gallery', 'ohio'),
                "name" => "project_content",
                "type" => "gallery",
                "instructions" => __('Add media files for this project', 'ohio') . '<em>&nbsp;' . __('(JPG, PNG, GIF formats are supported)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "min" => "",
                "max" => "",
                "insert" => "append",
                "library" => "all",
                "min_width" => "",
                "min_height" => "",
                "min_size" => "",
                "max_width" => "",
                "max_height" => "",
                "max_size" => "",
                "mime_types" => "png, jpg, jpeg, gif, webp, svg"
            ],
            [
                "key" => "field_59391f24598db5182g",
                "label" => __('Featured image', 'ohio'),
                "name" => "project_add_featured_on_page",
                "type" => "inherited_checkbox",
                "instructions" => __('Show featured image on the project page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherited"
            ],
            [
                "key" => "field_59391f24598db5182j",
                "label" => __('Featured image in lightbox', 'ohio'),
                "name" => "project_add_featured_to_gallery",
                "type" => "inherited_checkbox",
                "instructions" => __('Show featured image in the lightbox?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherited"
            ],
            [
                "key" => "field_59391f242354h235",
                "label" => __('Featured video type', 'ohio'),
                "name" => "project_video_type",
                "type" => "select",
                "instructions" => __('Choose a video type for this project', 'ohio') . '<em>&nbsp;' . __('(YouTube, Vimeo and self-hosted)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "youtube" => __('YouTube', 'ohio'),
                    "vimeo" => __('Vimeo', 'ohio'),
                    "custom" => __('Custom (self-hosted)', 'ohio')
                ],
                "default_value" => [
                    "project"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59391f245a1tra6",
                "label" => __('Featured video URL', 'ohio'),
                "name" => "project_video",
                "type" => "text",
                "instructions" => __('Paste a video URL for this project', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "Video URL",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245sasfas",
                "label" => __('Featured video cover', 'ohio'),
                "name" => "project_video_cover",
                "type" => "true_false",
                "instructions" => __('Show feature video as a project cover?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245sf98",
                "label" => __('Fit featured video', 'ohio'),
                "name" => "project_video_cover_fit",
                "type" => "true_false",
                "instructions" => __('Fit a featured video player to the screen', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391f245sasfas",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8se9gsg",
                "label" => __('Featured video start (s)', 'ohio'),
                "name" => "project_video_playback",
                "type" => "text",
                "instructions" => __('Used to automatically begin playback at a specific point in time (e.g. 25s)', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391f242354h235",
                            "operator" => "!=",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245seg8s2",
                "label" => __('Featured video autoplay mode', 'ohio'),
                "name" => "project_video_autoplay",
                "type" => "true_false",
                "instructions" => __('Autoplay works with muted mode only and may be blocked in some environments, such as IOS, Chrome 66+, and Safari 11+. In these cases, we’ll revert to standard playback requiring viewers to initiate playback.', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8s3",
                "label" => __('Featured video muted mode', 'ohio'),
                "name" => "project_video_muted",
                "type" => "true_false",
                "instructions" => __('Set video to mute on load.', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8s4",
                "label" => __('Featured video controls', 'ohio'),
                "name" => "project_video_controls",
                "type" => "true_false",
                "instructions" => __('When disabling this parameter, the play/pause button will be hidden. To start playback for your viewers, you\'ll need to either enable autoplay mode.', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8t5",
                "label" => __('Show related videos from the same channel', 'ohio'),
                "name" => "project_video_limit_related_videos_option",
                "type" => "true_false",
                "instructions" => __('Related videos will come from the same channel.', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391f242354h235",
                            "operator" => "==",
                            "value" => "youtube"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8s5",
                "label" => __('Featured video title', 'ohio'),
                "name" => "project_video_title_visibility",
                "type" => "true_false",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391f242354h235",
                            "operator" => "==",
                            "value" => "vimeo"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f245seg8s6",
                "label" => __('Featured video author', 'ohio'),
                "name" => "project_video_author_visibility",
                "type" => "true_false",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391f242354h235",
                            "operator" => "==",
                            "value" => "vimeo"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_5939kh892cbnaw44",
                "label" => __( 'Featured video in lightbox', 'ohio'),
                "name" => "project_lightbox_show_featured_video",
                "type" => "true_false",
                "instructions" => __( 'Show featured video in project lightbox as the first slide', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_59391f2459ccd",
                "label" => __('Date', 'ohio'),
                "name" => "project_date",
                "type" => "date_picker",
                "instructions" => __('Choose the project date', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "display_format" => "F j, Y",
                "return_format" => "F j, Y",
                "first_day" => 1
            ],
            [
                "key" => "field_59391f245a0b6",
                "label" => __('Task', 'ohio'),
                "name" => "project_task",
                "type" => "text",
                "instructions" => __('Specify what a challenge you had to overcome working on this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a4b5",
                "label" => __('Strategy', 'ohio'),
                "name" => "project_strategy",
                "type" => "text",
                "instructions" => __('Project strategy', 'ohio') . '<em>&nbsp;' . __('(e.g. Brand Strategy, UX Strategy)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a4b51",
                "label" => __('Design', 'ohio'),
                "name" => "project_design",
                "type" => "text",
                "instructions" => __('Project design', 'ohio') . '<em>&nbsp;' . __('(e.g. UI/UX Design, Art Direction)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245a893",
                "label" => __('Client', 'ohio'),
                "name" => "project_client",
                "type" => "text",
                "instructions" => __('Project client', 'ohio') . '<em>&nbsp;' . __('(e.g. Envato Market)', 'ohio') . '&nbsp;</em>' . __('or leave blank', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59391f245b478",
                "label" => __('Custom fields', 'ohio'),
                "name" => "project_custom_fields",
                "type" => "repeater",
                "instructions" => __('Custom fields', 'ohio') . '<em>&nbsp;' . __('(e.g. Tools, Technologies)', 'ohio') . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "collapsed" => "",
                "min" => 0,
                "max" => 6,
                "layout" => "table",
                "button_label" => __('+ Add Field', 'ohio'),
                "sub_fields" => [
                    [
                        "key" => "field_59391f246d98c",
                        "label" => __('Title', 'ohio'),
                        "name" => "project_custom_field_title",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_59391f246dd81",
                        "label" => __('Value', 'ohio'),
                        "name" => "project_custom_field_value",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ]
                ]
            ],
            [
                "key" => "field_59391f245b078",
                "label" => __('Project link', 'ohio'),
                "name" => "project_open_type",
                "type" => "select",
                "instructions" => __('Choose a showcase page for this project', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "project" => __('Open a standard project page', 'ohio'),
                    "external_target" => __('Open a project external link', 'ohio'),
                    "external_blank" => __('Open a project external link in a new tab', 'ohio')
                ],
                "default_value" => [
                    "project"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59391f245ac8a",
                "label" => __('Project external link', 'ohio'),
                "name" => "project_link",
                "type" => "url",
                "instructions" => __('Add a link to the custom project page or live project website', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "ohio_portfolio"
                ]
            ]
        ],
        "menu_order" => 0,
        "position" => "acf_after_title",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ]);

endif;
