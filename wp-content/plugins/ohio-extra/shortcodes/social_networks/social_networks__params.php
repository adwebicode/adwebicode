<?php

/**
* WPBakery Page Builder Ohio Social Networks shortcode params
*/

vc_lean_map( 'ohio_social_networks', 'ohio_social_networks_sc_map' );

function ohio_social_networks_sc_map() {
	return array(
		'name' => __( 'Social Networks', 'ohio-extra' ),
		'description' => __( 'Social sharing buttons block', 'ohio-extra' ),
		'base' => 'ohio_social_networks',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/social_networks_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Social networks layout', 'ohio-extra' ),
				'param_name' => 'icon_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_054.svg',
						'key' => 'flat',
						'title' => __( 'Default', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_052.svg',
						'key' => 'outline',
						'title' => __( 'Outlined', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_053.svg',
						'key' => 'fill',
						'title' => __( 'Contained', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_056.svg',
						'key' => 'text',
						'title' => __( 'Text', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_055.svg',
						'key' => 'inline',
						'title' => __( 'Text with Icons', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_057.svg',
						'key' => 'boxed',
						'title' => __( 'Boxed', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Content alignment', 'ohio-extra' ),
				'param_name' => 'block_alignment',
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
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => array(
						'outline',
						'fill',
						'flat',
						'inline',
						'text'
					),
				),
				'default' => 'center',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Icons size', 'ohio-extra' ),
				'param_name' => 'icons_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large'
				),
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'type_links',
				'value' => array(
					__( 'Subscribe links', 'ohio-extra' ) => 'custom',
					__( 'Share links', 'ohio-extra' ) => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use brand colors?', 'ohio-extra' ),
				'param_name' => 'default_colors',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use brand colors (hover state)?', 'ohio-extra' ),
				'param_name' => 'hover_default_colors',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'default_colors',
					'value' => '0',
				),
			),

			// Links.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-facebook"></i> ' . __( 'Facebook share', 'ohio-extra' ),
				'param_name' => 'facebook',
				'value' => array(
					__( 'Enable', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-twitter"></i> ' . __( 'Twitter share', 'ohio-extra' ),
				'param_name' => 'twitter',
				'value' => array(
					__( 'Enable', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-linkedin"></i> ' . __( 'LinkedIn share', 'ohio-extra' ),
				'param_name' => 'linkedin',
				'value' => array(
					__( 'Enable', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-pinterest"></i> ' . __( 'Pinterest share', 'ohio-extra' ),
				'param_name' => 'pinterest',
				'value' => array(
					__( 'Enable', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-artstation"></i> ' . __( 'ArtStation', 'ohio-extra' ),
				'param_name' => 'artstation_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-behance"></i> ' . __( 'Behance', 'ohio-extra' ),
				'param_name' => 'behance_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-deviantart"></i> ' . __( 'DeviantArt', 'ohio-extra' ),
				'param_name' => 'deviantart_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-digg"></i> ' . __( 'Digg', 'ohio-extra' ),
				'param_name' => 'digg_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-discord"></i> ' . __( 'Discord', 'ohio-extra' ),
				'param_name' => 'discord_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-dribbble"></i> ' . __( 'Dribbble', 'ohio-extra' ),
				'param_name' => 'dribbble_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-facebook-f"></i> ' . __( 'Facebook', 'ohio-extra' ),
				'param_name' => 'facebook_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-flickr"></i> ' . __( 'Flickr', 'ohio-extra' ),
				'param_name' => 'flickr_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-github"></i> ' . __( 'GitHub', 'ohio-extra' ),
				'param_name' => 'github_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-houzz"></i> ' . __( 'Houzz', 'ohio-extra' ),
				'param_name' => 'houzz_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-instagram"></i> ' . __( 'Instagram', 'ohio-extra' ),
				'param_name' => 'instagram_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-kaggle"></i> ' . __( 'Kaggle', 'ohio-extra' ),
				'param_name' => 'kaggle_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-linkedin"></i> ' . __( 'LinkedIn', 'ohio-extra' ),
				'param_name' => 'linkedin_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-medium-m"></i> ' . __( 'Medium', 'ohio-extra' ),
				'param_name' => 'medium_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-mixer"></i> ' . __( 'Mixer', 'ohio-extra' ),
				'param_name' => 'mixer_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-pinterest"></i> ' . __( 'Pinterest', 'ohio-extra' ),
				'param_name' => 'pinterest_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-product-hunt"></i> ' . __( 'Product Hunt', 'ohio-extra' ),
				'param_name' => 'producthunt_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-quora"></i> ' . __( 'Quora', 'ohio-extra' ),
				'param_name' => 'quora_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-reddit"></i> ' . __( 'Reddit', 'ohio-extra' ),
				'param_name' => 'reddit_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-snapchat"></i> ' . __( 'Snapchat', 'ohio-extra' ),
				'param_name' => 'snapchat_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-soundcloud"></i> ' . __( 'SoundCloud', 'ohio-extra' ),
				'param_name' => 'soundcloud_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-spotify"></i> ' . __( 'Spotify', 'ohio-extra' ),
				'param_name' => 'spotify_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-teamspeak"></i> ' . __( 'TeamSpeak', 'ohio-extra' ),
				'param_name' => 'teamspeak_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-telegram-plane"></i> ' . __( 'Telegram', 'ohio-extra' ),
				'param_name' => 'telegram_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tiktok"></i> ' . __( 'TikTok', 'ohio-extra' ),
				'param_name' => 'tiktok_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tripadvisor"></i> ' . __( 'Tripadvisor', 'ohio-extra' ),
				'param_name' => 'tripadvisor_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tumblr"></i> ' . __( 'Tumblr', 'ohio-extra' ),
				'param_name' => 'tumblr_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-twitch"></i> ' . __( 'Twitch', 'ohio-extra' ),
				'param_name' => 'twitch_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-twitter"></i> ' . __( 'Twitter', 'ohio-extra' ),
				'param_name' => 'twitter_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-vimeo"></i> ' . __( 'Vimeo', 'ohio-extra' ),
				'param_name' => 'vimeo_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-vine"></i> ' . __( 'Vine', 'ohio-extra' ),
				'param_name' => 'vine_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-whatsapp"></i> ' . __( 'Whatsapp', 'ohio-extra' ),
				'param_name' => 'whatsapp_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-xing"></i> ' . __( 'Xing', 'ohio-extra' ),
				'param_name' => 'xing_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-youtube"></i> ' . __( 'YouTube', 'ohio-extra' ),
				'param_name' => 'youtube_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-500px"></i> ' . __( '500px', 'ohio-extra' ),
				'param_name' => 'fivehundred_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
		
			// Styles.
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Shape color', 'ohio-extra' ),
				'param_name' => 'color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => array(
						'0',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Shape color (hover state)', 'ohio-extra' ),
				'param_name' => 'hover_color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => array(
						'0',
					),
					'element' => 'hover_default_colors',
					'value' => array(
						'0'
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => array(
						'0',
					)
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Icon color (hover state)', 'ohio-extra' ),
				'param_name' => 'icon_hover_color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => array(
						'0',
					),
					'element' => 'hover_default_colors',
					'value' => array(
						'0'
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