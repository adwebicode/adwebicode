<?php 

/**
* WPBakery Page Builder Ohio Team member shortcode
*/

add_shortcode( 'ohio_team_member', 'ohio_team_member_func' );

function ohio_team_member_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$block_type_layout = isset( $block_type_layout ) ? OhioExtraFilter::string( $block_type_layout, 'string', 'full' ) : 'full';
	$name = isset( $name ) ? OhioExtraFilter::string( $name, 'string', '' ) : '';
	$name_typo = isset( $name_typo ) ? OhioExtraFilter::string( $name_typo ) : false;
	$position = isset( $position ) ? OhioExtraFilter::string( $position, 'string', '' ) : '';
	$position_typo = isset( $position_typo ) ? OhioExtraFilter::string( $position_typo ) : false;
	$description = isset( $description ) ? OhioExtraFilter::string( $description, 'textarea', '' ) : '';
	$desription_typo = isset( $desription_typo ) ? OhioExtraFilter::string( $desription_typo ) : false;
	$overlay_color = isset( $overlay_color ) ? OhioExtraFilter::string( $overlay_color ) : false;
	$social_color = isset( $social_color ) ? OhioExtraFilter::string( $social_color ) : false;
	$social_hover_color = isset( $social_hover_color ) ? OhioExtraFilter::string( $social_hover_color ) : false;
	$photo = isset( $photo ) ? OhioExtraFilter::string( $photo ) : false;
	$photo_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $photo ), $name );
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'left' ) : 'left';
	$card_effect = isset( $card_effect ) ? OhioExtraFilter::string( $card_effect, 'string', 'none' ) : 'none';
	$equal_height = isset( $equal_height ) ? OhioExtraFilter::boolean( $equal_height ) : true;
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : true;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$use_link = isset( $use_link ) ? OhioExtraFilter::boolean( $use_link ) : true;
	$member_link = OhioExtraParser::VC_link_params( ( isset( $member_link ) ? $member_link : '' ), array( 'caption' => esc_html__( '', 'ohio-extra' ) ) );

	// Social networks
	$artstation_link = isset( $artstation_link ) ?  OhioExtraFilter::string( $artstation_link ) : false;
	$behance_link = isset( $behance_link ) ?  OhioExtraFilter::string( $behance_link ) : false;
	$deviantart_link = isset( $deviantart_link ) ?  OhioExtraFilter::string( $deviantart_link ) : false;
	$digg_link = isset( $digg_link ) ?  OhioExtraFilter::string( $digg_link ) : false;
	$discord_link = isset( $discord_link ) ?  OhioExtraFilter::string( $discord_link ) : false;
	$dribbble_link = isset( $dribbble_link ) ?  OhioExtraFilter::string( $dribbble_link ) : false;
	$facebook_link = isset( $facebook_link ) ?  OhioExtraFilter::string( $facebook_link ) : false;
	$flickr_link = isset( $flickr_link ) ?  OhioExtraFilter::string( $flickr_link ) : false;
	$github_link = isset( $github_link ) ?  OhioExtraFilter::string( $github_link ) : false;
	$houzz_link = isset( $houzz_link ) ?  OhioExtraFilter::string( $houzz_link ) : false;
	$instagram_link = isset( $instagram_link ) ?  OhioExtraFilter::string( $instagram_link ) : false;
	$kaggle_link = isset( $kaggle_link ) ?  OhioExtraFilter::string( $kaggle_link ) : false;
	$linkedin_link = isset( $linkedin_link ) ?  OhioExtraFilter::string( $linkedin_link ) : false;
	$medium_link = isset( $medium_link ) ?  OhioExtraFilter::string( $medium_link ) : false;
	$mixer_link = isset( $mixer_link ) ?  OhioExtraFilter::string( $mixer_link ) : false;
	$pinterest_link = isset( $pinterest_link ) ?  OhioExtraFilter::string( $pinterest_link ) : false;
	$producthunt_link = isset( $producthunt_link ) ?  OhioExtraFilter::string( $producthunt_link ) : false;
	$quora_link = isset( $quora_link ) ?  OhioExtraFilter::string( $quora_link ) : false;
	$reddit_link = isset( $reddit_link ) ?  OhioExtraFilter::string( $reddit_link ) : false;
	$snapchat_link = isset( $snapchat_link ) ?  OhioExtraFilter::string( $snapchat_link ) : false;
	$soundcloud_link = isset( $soundcloud_link ) ?  OhioExtraFilter::string( $soundcloud_link ) : false;
	$spotify_link = isset( $spotify_link ) ?  OhioExtraFilter::string( $spotify_link ) : false;
	$teamspeak_link = isset( $teamspeak_link ) ?  OhioExtraFilter::string( $teamspeak_link ) : false;
	$telegram_link = isset( $telegram_link ) ?  OhioExtraFilter::string( $telegram_link ) : false;
	$tiktok_link = isset( $tiktok_link ) ?  OhioExtraFilter::string( $tiktok_link ) : false;
	$tripadvisor_link = isset( $tripadvisor_link ) ?  OhioExtraFilter::string( $tripadvisor_link ) : false;
	$tumblr_link = isset( $tumblr_link ) ?  OhioExtraFilter::string( $tumblr_link ) : false;
	$twitch_link = isset( $twitch_link ) ?  OhioExtraFilter::string( $twitch_link ) : false;
	$twitter_link = isset( $twitter_link ) ?  OhioExtraFilter::string( $twitter_link ) : false;
	$vimeo_link = isset( $vimeo_link ) ?  OhioExtraFilter::string( $vimeo_link ) : false;
	$vine_link = isset( $vine_link ) ?  OhioExtraFilter::string( $vine_link ) : false;
	$whatsapp_link = isset( $whatsapp_link ) ?  OhioExtraFilter::string( $whatsapp_link ) : false;
	$xing_link = isset( $xing_link ) ?  OhioExtraFilter::string( $xing_link ) : false;
	$youtube_link = isset( $youtube_link ) ?  OhioExtraFilter::string( $youtube_link ) : false;
	$fivehundred_link = isset( $fivehundred_link ) ?  OhioExtraFilter::string( $fivehundred_link ) : false;

	// Design options
    $content_styles = isset( $content_styles ) ? OhioExtraFilter::string( $content_styles ) : false;
    $content_styles_str = strpos($content_styles, "{");
    $content_styles_css = substr($content_styles, $content_styles_str);

	// Appear effect
	$appearance_effect = isset( $appearance_effect ) ? OhioExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_once = isset( $appearance_once ) ? OhioExtraFilter::boolean( $appearance_once ) : true;
	$appearance_duration = isset( $appearance_duration ) ? OhioExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? OhioExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	
	$animation_attrs = '';
	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}
	if ( $appearance_effect != 'none' ) {
		$animation_attrs .= ' data-aos=' . esc_attr( $appearance_effect ) . '';
	}
	if ( !$appearance_once ) {
		$animation_attrs .= ' data-aos-once=true';
	}
	if ( !empty( $appearance_duration ) ) {
		$animation_attrs .= ' data-aos-duration=' . intval( $appearance_duration ) . '';
	}
	if ( !empty( $appearance_delay ) ) {
		$animation_attrs .= ' data-aos-delay=' . intval( $appearance_delay ) . '';
	}

	// Tilt effect
	$tilt_attrs = '';
	if ( !$tilt_effect ) {
		$tilt_attrs .= ' data-tilt=true data-tilt-perspective=6000';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $block_type_layout ) {
		case 'inner':
			$layout_classes .= ' -with-overlay';
			break;
	}

	$hover_effect = '';
	switch ( $card_effect ) {
		case 'scale':
			$hover_effect .= ' -img-scale';
			break;
		case 'overlay':
			$hover_effect .= ' -img-overlay';
			break;
		case 'greyscale':
			$hover_effect .= ' -img-greyscale';
			break;
	}

	$content_classes = '';
	switch ( $alignment ) {
		case 'center':
			$content_classes .= ' -center';
			break;
		case 'right':
			$content_classes .= ' -right';
			break;
	}

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $hover_effect;
	$wrapper_classes .= $content_classes;

	if ( !$equal_height ) {
		$wrapper_classes .= ' -metro';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$member_name_typo = OhioExtraParser::VC_typo_to_CSS( $name_typo );
	OhioExtraParser::VC_typo_custom_font( $name_typo );

	if ( $member_name_typo ) {
		$_selector = '#' . $wrapper_id . ' .title{';
		$_block_typo = $member_name_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

	$member_position_typo = OhioExtraParser::VC_typo_to_CSS( $position_typo );
	OhioExtraParser::VC_typo_custom_font( $position_typo );

	if ( $member_position_typo ) {
		$_selector = '#' . $wrapper_id . ' .author-details{';
		$_block_typo = $member_position_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

	$member_about_typo = OhioExtraParser::VC_typo_to_CSS( $desription_typo );
	OhioExtraParser::VC_typo_custom_font( $desription_typo );
	
	if ( $member_about_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .extra-details > p,';
		$_selector .= '#' . $wrapper_id . ' .overlay-details > p{';
		$_block_typo = $member_about_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

	$overlay_color = OhioExtraParser::VC_color_to_CSS( $overlay_color, '{{color}}' );
	if ( $overlay_color ) {
		if ( $card_effect !=  'overlay' ) {
			$_style_block .= '#' . $wrapper_id . '.banner:not(.-img-overlay) .overlay-details{';
			$_style_block .= 'background:linear-gradient(rgba(0, 0, 0, 0), ' . $overlay_color . ');';
		} else {
			$_style_block .= '#' . $wrapper_id . '.banner.-img-overlay .image-holder::after{';
			$_style_block .= 'background:' . $overlay_color . ';';
		}
		$_style_block .= '}';
	}

	$social_color = OhioExtraParser::VC_color_to_CSS( $social_color, '{{color}}' );
	if ( $social_color ) {
		$_style_block .= '#' . $wrapper_id . ' .social-networks a{';
		$_style_block .= 'color:' . $social_color . ';';
		$_style_block .= '}';
	}

	$social_hover_color = OhioExtraParser::VC_color_to_CSS( $social_hover_color, '{{color}}' );
	if ( $social_hover_color ) {
		$_style_block .= '#' . $wrapper_id . ' .social-networks a:hover{';
		$_style_block .= 'color:' . $social_hover_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.team-member .image-holder{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-shadow .image-holder{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'team_member__view.php' );
	return ob_get_clean();
}