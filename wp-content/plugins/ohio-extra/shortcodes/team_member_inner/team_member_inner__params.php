<?php

/**
* WPBakery Page Builder Ohio Team Members Group Inner shortcode params
*/

vc_lean_map( 'ohio_team_member_inner', 'ohio_team_member_inner_sc_map' );

function ohio_team_member_inner_sc_map() {
	return array(
		'name' => __( 'Team Member', 'ohio-extra' ),
		'description' => __( 'Team member module', 'ohio-extra' ),
		'base' => 'ohio_team_member_inner',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/team_member_icon.svg',
		'content_element' => true,
		'as_child' => array(
			'only' => 'ohio_team_member_group'
		),
		'js_view' => 'VcOhioTeamMemberInnerView',
		'custom_markup' => '{{title}}<div class="vc_ohio_team_member_inner-container">
				<div class="_contain">
					<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/view_user_gap.png\');"></div>
					<div class="right">
						<div class="name">%%name%%</div>
						<div class="position"></div>
						<div class="lines"><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div></div>
					</div>
				</div>
			</div>',
		'params' => array(

			// General.
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
				'description' => __( 'E.g. Product Manager.', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Member about', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Brief description of team member\'s skills and achievements.', 'ohio-extra' ),
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
		)
	);
}