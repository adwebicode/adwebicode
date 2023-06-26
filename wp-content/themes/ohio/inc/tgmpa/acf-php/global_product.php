<?php if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group([
        "key" => "group_593be7a6c2017prd",
        "title" => __('Product Settings', 'ohio'),
        "private" => true,
        "fields" => [
            [
                "key" => "field_583be7a6d2429",
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
                "key" => "field_47272c6ed00aeasf",
                "label" => __('Product layout', 'ohio'),
                "name" => "global_ecommerce_product_type",
                "type" => "image_option",
                "instructions" => __('Choose layout type for single product pages', 'ohio'),
                "conditional_logic" => 0,
                "default_value" => "type1",
                "image_option_value" => [
                    [
                        "name" => "type1",
                        "description" => __('Sticky Gallery', 'ohio'),
                        "src" => "acf__image_27.svg"
                    ],
                    [
                        "name" => "type2",
                        "description" => __('Sticky Gallery - Reflected', 'ohio'),
                        "src" => "acf__image_26.svg"
                    ],
                    [
                        "name" => "type3",
                        "description" => __('Split Screen', 'ohio'),
                        "src" => "acf__image_29.svg"
                    ],
                    [
                        "name" => "type4",
                        "description" => __('Split Screen - Reflected', 'ohio'),
                        "src" => "acf__image_28.svg"
                    ],
                    [
                        "name" => "type5",
                        "description" => __('Classic Gallery', 'ohio'),
                        "src" => "acf__image_49.svg"
                    ],
                    [
                        "name" => "type6",
                        "description" => __('Classic Gallery - Reflected', 'ohio'),
                        "src" => "acf__image_50.svg"
                    ],
                    [
                        "name" => "type7",
                        "description" => __('Grid Gallery', 'ohio'),
                        "src" => "acf__image_47.svg"
                    ],
                    [
                        "name" => "type8",
                        "description" => __('Grid Gallery - Reflected', 'ohio'),
                        "src" => "acf__image_48.svg"
                    ]
                ]
            ],
            [
                "key" => "field_593benajslodkihoih",
                "label" => __('Gallery zoom effect', 'ohio'),
                "name" => "global_woocommerce_product_zoom",
                "type" => "true_false",
                "instructions" => __('Enable product gallery images zoom effect', 'ohio'),
                "required" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be7a6fas124d437b",
                "label" => __('Category slug', 'ohio'),
                "name" => "global_woocommerce_page_show_category_breadcrumbs",
                "type" => "true_false",
                "instructions" => __('Show product categories in breadcrumbs?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "1",
                "layout" => "horizontal",
                "return_format" => "value",
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be7a6d18qlgt",
                "label" => __('Lightbox preview', 'ohio'),
                "name" => "global_woocommerce_product_lightbox_preview",
                "type" => "true_false",
                "instructions" => __('Enable lightbox preview for product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d18qlgt",
                "label" => __('Sticky product', 'ohio'),
                "name" => "global_woocommerce_product_sticky",
                "type" => "true_false",
                "instructions" => __('Enable sticky product for product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_592fd62342342a3124",
                "label" => __('Next/Prev navigation', 'ohio'),
                "name" => "global_woocommerce_product_navigation",
                "type" => "true_false",
                "instructions" => __('Show product navigation with next and previouse products', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],



            [
                "key" => "field_593be8a6d18930",
                "label" => __('Sale badge', 'ohio'),
                "name" => "global_woocommerce_product_sale_badge",
                "type" => "true_false",
                "instructions" => __('Show sale badge on product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d18932",
                "label" => __('Stock badge', 'ohio'),
                "name" => "global_woocommerce_product_stock_badge",
                "type" => "true_false",
                "instructions" => __('Show stock badge on product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],



            [
                "key" => "field_593be8a6d1893b",
                "label" => __('SKU', 'ohio'),
                "name" => "global_woocommerce_product_sku",
                "type" => "true_false",
                "instructions" => __('Show SKU on product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d1893c",
                "label" => __('Category', 'ohio'),
                "name" => "global_woocommerce_product_category",
                "type" => "true_false",
                "instructions" => __('Show category on product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d1893d",
                "label" => __('Tag', 'ohio'),
                "name" => "global_woocommerce_product_tags",
                "type" => "true_false",
                "instructions" => __('Show tags on product page?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d18932354",
                "label" => __('AJAX add to cart', 'ohio'),
                "name" => "global_woocommerce_product_ajax_cart",
                "type" => "true_false",
                "instructions" => __('Enable add to cart without page refreshing?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __('Yes', 'ohio'),
                "ui_off_text" => __('No', 'ohio')
            ],
            [
                "key" => "field_593be8a6d1893s",
                "label" => '<h4>' . __('Typography', 'ohio') . '</h4>',
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_593f4haf12422c",
                "label" => __('Product title', 'ohio'),
                "name" => "global_page_woocommerce_single_product_title_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for simple product titles', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592f4aff12422a",
                "label" => __('Product price', 'ohio'),
                "name" => "global_page_woocommerce_single_product_price_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for simple product price', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593f4hff12422b",
                "label" => __('Product meta', 'ohio'),
                "name" => "global_page_woocommerce_single_product_meta_typo",
                "type" => "ohio_typo",
                "instructions" => __('Set up typography for product meta', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],

            [
                "key" => "field_583be7a6d2429tpg",
                "label" => __('Related Products', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59fb4ad44a336199",
                "label" => __('Related products', 'ohio'),
                "name" => "global_woocommerce_product_related",
                "type" => "true_false",
                "instructions" => __('Show a related products section?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59fb4ad44a1dtd336199",
                "label" => __('Number of related products', 'ohio'),
                "name" => "global_woocommerce_product_related_amount",
                "type" => "text",
                "instructions" => __('Set a number of related products output', 'ohio'),
                "required" => 0,
                "default_value" => "3",
                "new_lines" => "",
                "esc_html" => 0,
                "append" => __('products', 'ohio'),
				"conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4ad44a336199",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_593beba6d4b64",
                "label" => __('Other', 'ohio'),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_593743w37383615",
                "label" => __('Sharing', 'ohio'),
                "name" => "global_woocommerce_sharing_visibility",
                "type" => "true_false",
                "instructions" => __('Enable sharing feature for product pages?', 'ohio'),
                "required" => 0,
                "conditional_logic" => 0,
                "new_lines" => "",
                "esc_html" => 0,
                "ui" => true
            ],
            [
                "key" => "field_593743e37383615",
                "label" => __('Sharing networks', 'ohio'),
                "name" => "global_woocommerce_sharing_networks",
                "type" => "select",
                "instructions" => __('Choose sharing networks', 'ohio'),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593743w37383615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "facebook" => __('Facebook', 'ohio'),
                    "twitter" => __('Twitter', 'ohio'),
                    "pinterest" => __('Pinterest', 'ohio'),
                    "linkedin" => __('LinkedIn', 'ohio')
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 1,
                "ui" => 1,
                "ajax" => 1,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_593743w37383616",
                "label" => __('Open sharing links in a new tab', 'ohio'),
                "name" => "global_woocommerce_sharing_networks_target_blank",
                "type" => "true_false",
                "instructions" => __('Open product sharing links in a new tab?', 'ohio'),
                "default_value" => 1,
                "ui" => 1,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593743w37383615",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
        ],
        
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-product"
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
