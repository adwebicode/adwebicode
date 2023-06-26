<?php 

/**
* WPBakery Page Builder Ohio Call To Action shortcode
*/

add_shortcode( 'ohio_call_to_action', 'ohio_call_to_action_func' );

function ohio_call_to_action_func( $atts ) {
	if ( is_array( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$title = rawurldecode( base64_decode( isset( $title ) ? $title : '' ) );
	$title = isset( $title ) ? OhioExtraFilter::string( $title, 'string', '') : '';
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo, 'string', '') : '';
	$subtitle = rawurldecode( base64_decode( isset( $subtitle ) ? $subtitle : '' ) );
	$subtitle = isset( $subtitle ) ? OhioExtraFilter::string( $subtitle, 'string', '') : '';
	$subtitle_typo = isset( $subtitle_typo ) ? OhioExtraFilter::string( $subtitle_typo, 'string', '') : '';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$heading_tag = isset( $heading_tag ) ? OhioExtraFilter::string( $heading_tag, 'string', 'h3' ) : 'h3';
	$subtitle_type_layout = isset( $subtitle_type_layout ) ? OhioExtraFilter::string( $subtitle_type_layout, 'string', 'bottom_subtitle' ) : 'bottom_subtitle';
	$bg_color = isset( $bg_color ) ? OhioExtraFilter::string( $bg_color, 'string', false ) : false;

	// Button
	$add_link = isset( $add_link ) ? OhioExtraFilter::boolean( $add_link ) : true;
	$link = OhioExtraParser::VC_link_params( ( isset( $link ) ) ? $link : '', array( 'caption' => __( 'Get Started', 'ohio-extra' ) ) );
	$readmore_button = isset( $readmore_button ) ? OhioExtraFilter::string( $readmore_button, 'string', false ) : false;
	$readmore_button = preg_replace( '/\&amp\;/', '&', $readmore_button );
	parse_str( $readmore_button, $button_settings );

	// Icon
	$icon_use = isset( $icon_use ) ? OhioExtraFilter::boolean( $icon_use ) : false;
	$icon_position = isset( $icon_position ) ? OhioExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'string', 'ion ion-md-arrow-forward' ) : 'ion ion-md-arrow-forward';
	$icon_as_image = isset( $icon_as_image ) ? OhioExtraFilter::string( $icon_as_image, 'string', '' ) : '';
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

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
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$cta_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $cta_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .heading .title{';
		$_block_typo = $cta_title_typo;
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

	$cta_subtitle_typo = OhioExtraParser::VC_typo_to_CSS( $subtitle_typo );
	OhioExtraParser::VC_typo_custom_font( $subtitle_typo );

	if ( $cta_subtitle_typo ) {
		$_selector = '#' . $wrapper_id . ' .heading .subtitle{';
		$_block_typo = $cta_subtitle_typo;
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

	$cta_background_color = OhioExtraParser::VC_color_to_CSS( $bg_color, '{{color}}' );
	if ( $cta_background_color ) {
		$_style_block .= '#' . $wrapper_id . '.call-to-action{';
		$_style_block .= 'background-color:' . $cta_background_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.call-to-action{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.call-to-action.-with-shadow{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	// Button

	$button_css = OhioExtraParser::VC_button_to_css( $button_settings );
	
	if ( $button_css['css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button{';
		$_style_block .= $button_css['css'];
		$_style_block .= '}';
	}

	if ( $button_css['hover-css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button:hover{';
		$_style_block .= $button_css['hover-css'];
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'call_to_action__view.php' );
	return ob_get_clean();
}