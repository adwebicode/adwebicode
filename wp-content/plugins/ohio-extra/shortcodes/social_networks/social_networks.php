<?php 

/**
* WPBakery Page Builder Ohio Social Networks shortcode
*/

add_shortcode( 'ohio_social_networks', 'ohio_social_networks_func' );

function ohio_social_networks_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$icon_layout = isset( $icon_layout ) ? OhioExtraFilter::string( $icon_layout, 'string', 'flat') : 'flat';
	$block_alignment = isset( $block_alignment ) ? OhioExtraFilter::string( $block_alignment, 'string', 'center') : 'center';
	$icons_size = isset( $icons_size ) ? OhioExtraFilter::string( $icons_size, 'string', 'default') : 'default';
	$type_links = isset( $type_links ) ? OhioExtraFilter::string( $type_links, 'string', 'custom' ) : 'custom';
	$outline_hover = isset( $outline_hover ) ? OhioExtraFilter::boolean( $outline_hover ) : false;
	$default_colors = isset( $default_colors ) ? OhioExtraFilter::boolean( $default_colors ) : false;
	$hover_default_colors = isset( $hover_default_colors ) ? OhioExtraFilter::boolean( $hover_default_colors ) : false;
	$color = isset( $color ) ? OhioExtraFilter::string( $color, 'string', false ) : false;
	$hover_color = isset( $hover_color ) ? OhioExtraFilter::string( $hover_color, 'string', false ) : false;
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color, 'string', false ) : false;
	$icon_hover_color = isset( $icon_hover_color ) ? OhioExtraFilter::string( $icon_hover_color, 'string', false ) : false;
	
	// Sharing networks
	$facebook = isset( $facebook ) ? OhioExtraFilter::boolean( $facebook ) : true;
	$twitter = isset( $twitter ) ? OhioExtraFilter::boolean( $twitter ) : true;
	$pinterest = isset( $pinterest ) ? OhioExtraFilter::boolean( $pinterest ) : true;
	$linkedin = isset( $linkedin ) ? OhioExtraFilter::boolean( $linkedin ) : true;

	// Social networks
	$artstation_link_custom = isset( $artstation_link_custom ) ?  OhioExtraFilter::string( $artstation_link_custom ) : false;
	$behance_link_custom = isset( $behance_link_custom ) ?  OhioExtraFilter::string( $behance_link_custom ) : false;
	$deviantart_link_custom = isset( $deviantart_link_custom ) ?  OhioExtraFilter::string( $deviantart_link_custom ) : false;
	$digg_link_custom = isset( $digg_link_custom ) ?  OhioExtraFilter::string( $digg_link_custom ) : false;
	$discord_link_custom = isset( $discord_link_custom ) ?  OhioExtraFilter::string( $discord_link_custom ) : false;
	$dribbble_link_custom = isset( $dribbble_link_custom ) ?  OhioExtraFilter::string( $dribbble_link_custom ) : false;
	$facebook_link_custom = isset( $facebook_link_custom ) ?  OhioExtraFilter::string( $facebook_link_custom ) : false;
	$flickr_link_custom = isset( $flickr_link_custom ) ?  OhioExtraFilter::string( $flickr_link_custom ) : false;
	$github_link_custom = isset( $github_link_custom ) ?  OhioExtraFilter::string( $github_link_custom ) : false;
	$houzz_link_custom = isset( $houzz_link_custom ) ?  OhioExtraFilter::string( $houzz_link_custom ) : false;
	$instagram_link_custom = isset( $instagram_link_custom ) ?  OhioExtraFilter::string( $instagram_link_custom ) : false;
	$kaggle_link_custom = isset( $kaggle_link_custom ) ?  OhioExtraFilter::string( $kaggle_link_custom ) : false;
	$linkedin_link_custom = isset( $linkedin_link_custom ) ?  OhioExtraFilter::string( $linkedin_link_custom ) : false;
	$medium_link_custom = isset( $medium_link_custom ) ?  OhioExtraFilter::string( $medium_link_custom ) : false;
	$mixer_link_custom = isset( $mixer_link_custom ) ?  OhioExtraFilter::string( $mixer_link_custom ) : false;
	$pinterest_link_custom = isset( $pinterest_link_custom ) ?  OhioExtraFilter::string( $pinterest_link_custom ) : false;
	$producthunt_link_custom = isset( $producthunt_link_custom ) ?  OhioExtraFilter::string( $producthunt_link_custom ) : false;
	$quora_link_custom = isset( $quora_link_custom ) ?  OhioExtraFilter::string( $quora_link_custom ) : false;
	$reddit_link_custom = isset( $reddit_link_custom ) ?  OhioExtraFilter::string( $reddit_link_custom ) : false;
	$snapchat_link_custom = isset( $snapchat_link_custom ) ?  OhioExtraFilter::string( $snapchat_link_custom ) : false;
	$soundcloud_link_custom = isset( $soundcloud_link_custom ) ?  OhioExtraFilter::string( $soundcloud_link_custom ) : false;
	$spotify_link_custom = isset( $spotify_link_custom ) ?  OhioExtraFilter::string( $spotify_link_custom ) : false;
	$teamspeak_link_custom = isset( $teamspeak_link_custom ) ?  OhioExtraFilter::string( $teamspeak_link_custom ) : false;
	$telegram_link_custom = isset( $telegram_link_custom ) ?  OhioExtraFilter::string( $telegram_link_custom ) : false;
	$tiktok_link_custom = isset( $tiktok_link_custom ) ?  OhioExtraFilter::string( $tiktok_link_custom ) : false;
	$tripadvisor_link_custom = isset( $tripadvisor_link_custom ) ?  OhioExtraFilter::string( $tripadvisor_link_custom ) : false;
	$tumblr_link_custom = isset( $tumblr_link_custom ) ?  OhioExtraFilter::string( $tumblr_link_custom ) : false;
	$twitch_link_custom = isset( $twitch_link_custom ) ?  OhioExtraFilter::string( $twitch_link_custom ) : false;
	$twitter_link_custom = isset( $twitter_link_custom ) ?  OhioExtraFilter::string( $twitter_link_custom ) : false;
	$vimeo_link_custom = isset( $vimeo_link_custom ) ?  OhioExtraFilter::string( $vimeo_link_custom ) : false;
	$vine_link_custom = isset( $vine_link_custom ) ?  OhioExtraFilter::string( $vine_link_custom ) : false;
	$whatsapp_link_custom = isset( $whatsapp_link_custom ) ?  OhioExtraFilter::string( $whatsapp_link_custom ) : false;
	$xing_link_custom = isset( $xing_link_custom ) ?  OhioExtraFilter::string( $xing_link_custom ) : false;
	$youtube_link_custom = isset( $youtube_link_custom ) ?  OhioExtraFilter::string( $youtube_link_custom ) : false;
	$fivehundred_link_custom = isset( $fivehundred_link_custom ) ?  OhioExtraFilter::string( $fivehundred_link_custom ) : false;

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

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $icon_layout ) {
		case 'outline':
			$layout_classes .= ' -outlined';
			break;
		case 'fill':
			$layout_classes .= ' -contained';
			break;
		case 'inline':
		case 'text':
			$layout_classes .= ' -text';
			break;
		case 'boxed':
			$layout_classes .= ' -text -boxed';
			break;
	}

	$content_classes = '';
	switch ( $block_alignment ) {
		case 'left':
			$content_classes .= ' -left';
			break;
		case 'center':
		default:
			$content_classes .= ' -center';
			break;
		case 'right':
			$content_classes .= ' -right';
			break;
	}

	$size_classes = '';
	switch ( $icons_size ) {
		case 'small':
			$size_classes .= ' -small';
			break;
		case 'large':
			$size_classes .= ' -large';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;
	$wrapper_classes .= $size_classes;

	if ( $default_colors ) {
		$wrapper_classes .= ' -default-colors';
	}

	if ( $hover_default_colors ) {
		$wrapper_classes .= ' -hover-default-colors';
	}

	$show_text = false;
	if ( $icon_layout == 'boxed' || $icon_layout == 'inline' || $icon_layout == 'text' ) {
		$show_text = true;
	}

	$show_icon = true;
	if ( $icon_layout == 'text' ) {
		$show_icon = false;
	}

	// Sharing links
	if ( $type_links == 'share' ) {
		$facebook_link_custom = ( $facebook ) ? 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() : '';
		$twitter_link_custom = ( $twitter ) ? 'https://twitter.com/intent/tweet?text=' . get_permalink() : '';
		$pinterest_link_custom = ( $pinterest ) ? 'http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&description=' . urlencode( 'title' ) : '';
		$linkedin_link_custom = ( $linkedin ) ? 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . urlencode( 'title' ) . '&source=' . urlencode( get_bloginfo( 'name' ) ) : '';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	if ( $color ) {
		if ( $icon_layout ==  'outline' ) {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-outlined .network{';
			$_style_block .= 'border-color:' . $color . ';';

		} elseif ( $icon_layout ==  'text' || $icon_layout ==  'inline' || $icon_layout ==  'boxed' ) {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-text .network{';
			$_style_block .= 'color:' . $color . ';';
		} else {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-contained:not(.-default-colors) .network{';
			$_style_block .= 'background-color:' . $color . ';';
		}
		$_style_block .= '}';
	}

	if ( $hover_color ) {
		if ( $icon_layout ==  'outline' ) {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-outlined .network:hover{';
			$_style_block .= 'border-color:' . $hover_color . ';';

		} elseif ( $icon_layout ==  'text' || $icon_layout ==  'inline' || $icon_layout ==  'boxed' ) {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-text .network:hover{';
			$_style_block .= 'color:' . $hover_color . ';';
		} else {
			$_style_block .= '#' . $wrapper_id . '.social-networks.-contained:not(.-default-colors) .network:hover{';
			$_style_block .= 'background-color:' . $hover_color . ';';
		}
		$_style_block .= '}';
	}

	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_id . ' .network i{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	$icon_hover_color = OhioExtraParser::VC_color_to_CSS( $icon_hover_color, '{{color}}' );
	if ( $icon_hover_color ) {
		$_style_block .= '#' . $wrapper_id . ' .network:hover i{';
		$_style_block .= 'color:' . $icon_hover_color . ';';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'social_networks__view.php' );
	return ob_get_clean();
}