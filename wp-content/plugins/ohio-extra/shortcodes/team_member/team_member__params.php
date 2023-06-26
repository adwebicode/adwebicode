<?php

/**
* WPBakery Page Builder Ohio Team Member shortcode params
*/

vc_lean_map( 'ohio_team_member', 'ohio_team_member_sc_map' );

function ohio_team_member_sc_map() {
	return array(
			'name' => __( 'Team Member', 'ohio-extra' ),
			'description' => __( 'Team member block', 'ohio-extra' ),
			'base' => 'ohio_team_member',
			'category' => __( 'Ohio', 'ohio-extra' ),
			'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/team_member_icon.svg',
			'js_view' => 'VcOhioTeamMemberView',
			'custom_markup' => '{{title}}<div class="vc_ohio_team_member-container">
					<div class="_contain">
						<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/sc_gap_user.svg\');"></div>
						<div class="name">%%name%%</div>
						<div class="position"></div>
					</div>
					<div class="lines"><div class="line"></div><div class="line"></div></div>
				</div>',
			'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Team member layout', 'ohio-extra' ),
				'param_name' => 'block_type_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_062.svg',
						'key' => 'full',
						'title' => __( 'Card', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_063.svg',
						'key' => 'inner',
						'title' => __( 'Inner', 'ohio-extra' ),
					)
				)
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
				),
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
				'param_name' => 'equal_height',
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
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Member photo', 'ohio-extra' ),
				'param_name' => 'photo',
			),
			array(
				'type' => 'textfield',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Member name', 'ohio-extra' ),
				'param_name' => 'name',
				'default' => 'John Doe'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Member position', 'ohio-extra' ),
				'param_name' => 'position',
				'default' => 'Product Manager'
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Member about', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Brief description of team member\'s skills and achievements.', 'ohio-extra' ),
			),

			// Link.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Use link?', 'ohio-extra' ),
				'param_name' => 'use_link',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'vc_link',
				'group' => __( 'Link', 'ohio-extra' ),
				'heading' => __( 'Link URL', 'ohio-extra' ),
				'param_name' => 'member_link',
				'dependency' => array(
					'element' => 'use_link',
					'value' => array(
						'1'
					)
				),
			),

			// Social networks.
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-artstation"></i> ' . __( 'ArtStation', 'ohio-extra' ),
				'param_name' => 'artstation_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-behance"></i> ' . __( 'Behance', 'ohio-extra' ),
				'param_name' => 'behance_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-deviantart"></i> ' . __( 'DeviantArt', 'ohio-extra' ),
				'param_name' => 'deviantart_link'
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-digg"></i> ' . __( 'Digg', 'ohio-extra' ),
				'param_name' => 'digg_link'
			),
            array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-discord"></i> ' . __( 'Discord', 'ohio-extra' ),
				'param_name' => 'discord_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-dribbble"></i> ' . __( 'Dribbble', 'ohio-extra' ),
				'param_name' => 'dribbble_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-facebook-f"></i> ' . __( 'Facebook', 'ohio-extra' ),
				'param_name' => 'facebook_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-flickr"></i> ' . __( 'Flickr', 'ohio-extra' ),
				'param_name' => 'flickr_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-github"></i> ' . __( 'GitHub', 'ohio-extra' ),
				'param_name' => 'github_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-houzz"></i> ' . __( 'Houzz', 'ohio-extra' ),
				'param_name' => 'houzz_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-instagram"></i> ' . __( 'Instagram', 'ohio-extra' ),
				'param_name' => 'instagram_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-kaggle"></i> ' . __( 'Kaggle', 'ohio-extra' ),
				'param_name' => 'kaggle_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-linkedin"></i> ' . __( 'LinkedIn', 'ohio-extra' ),
				'param_name' => 'linkedin_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-medium-m"></i> ' . __( 'Medium', 'ohio-extra' ),
				'param_name' => 'medium_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-mixer"></i> ' . __( 'Mixer', 'ohio-extra' ),
				'param_name' => 'mixer_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-pinterest"></i> ' . __( 'Pinterest', 'ohio-extra' ),
				'param_name' => 'pinterest_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-product-hunt"></i> ' . __( 'Product Hunt', 'ohio-extra' ),
				'param_name' => 'producthunt_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-quora"></i> ' . __( 'Quora', 'ohio-extra' ),
				'param_name' => 'quora_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-reddit"></i> ' . __( 'Reddit', 'ohio-extra' ),
				'param_name' => 'reddit_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-snapchat"></i> ' . __( 'Snapchat', 'ohio-extra' ),
				'param_name' => 'snapchat_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-soundcloud"></i> ' . __( 'SoundCloud', 'ohio-extra' ),
				'param_name' => 'soundcloud_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-spotify"></i> ' . __( 'Spotify', 'ohio-extra' ),
				'param_name' => 'spotify_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-teamspeak"></i> ' . __( 'TeamSpeak', 'ohio-extra' ),
				'param_name' => 'teamspeak_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-telegram-plane"></i> ' . __( 'Telegram', 'ohio-extra' ),
				'param_name' => 'telegram_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tiktok"></i> ' . __( 'TikTok', 'ohio-extra' ),
				'param_name' => 'tiktok_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tripadvisor"></i> ' . __( 'Tripadvisor', 'ohio-extra' ),
				'param_name' => 'tripadvisor_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-tumblr"></i> ' . __( 'Tumblr', 'ohio-extra' ),
				'param_name' => 'tumblr_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-twitch"></i> ' . __( 'Twitch', 'ohio-extra' ),
				'param_name' => 'twitch_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-twitter"></i> ' . __( 'Twitter', 'ohio-extra' ),
				'param_name' => 'twitter_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-vimeo"></i> ' . __( 'Vimeo', 'ohio-extra' ),
				'param_name' => 'vimeo_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-vine"></i> ' . __( 'Vine', 'ohio-extra' ),
				'param_name' => 'vine_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-whatsapp"></i> ' . __( 'Whatsapp', 'ohio-extra' ),
				'param_name' => 'whatsapp_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-xing"></i> ' . __( 'Xing', 'ohio-extra' ),
				'param_name' => 'xing_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-youtube"></i> ' . __( 'YouTube', 'ohio-extra' ),
				'param_name' => 'youtube_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social Links', 'ohio-extra' ),
				'heading' => '<i class="fab fa-500px"></i> ' . __( '500px', 'ohio-extra' ),
				'param_name' => 'fivehundred_link'
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Member name typography', 'ohio-extra' ),
				'param_name' => 'name_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Member position typography', 'ohio-extra' ),
				'param_name' => 'position_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Member about typography', 'ohio-extra' ),
				'param_name' => 'desription_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Social links color', 'ohio-extra' ),
				'param_name' => 'social_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Social links color (hover state)', 'ohio-extra' ),
				'param_name' => 'social_hover_color',
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