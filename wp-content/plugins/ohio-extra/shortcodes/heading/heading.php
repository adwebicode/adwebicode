<?php 

/**
* WPBakery Page Builder Ohio Heading shortcode
*/

add_shortcode( 'ohio_heading', 'ohio_heading_func' );

function ohio_heading_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$heading_type = isset( $heading_type ) ? OhioExtraFilter::string( $heading_type, 'string', 'h3' ) : 'h3';
	$module_type_layout = isset( $module_type_layout ) ? OhioExtraFilter::string( $module_type_layout, 'string', 'on_middle' ) : 'on_middle';
	$title = isset( $title ) ? rawurldecode( base64_decode( $title ) ) : '';
	$title = OhioExtraFilter::string( $title, 'string', '' );
	$title_before = isset( $title_before ) ? rawurldecode( base64_decode( $title_before ) ) : '';
	$title_before = OhioExtraFilter::string( $title_before, 'string', '' );
	$title_highlighted = isset( $title_highlighted ) ? rawurldecode( base64_decode( $title_highlighted ) ) : '';
	$title_highlighted = OhioExtraFilter::string( $title_highlighted, 'string', '' );
	$title_after = isset( $title_after ) ? rawurldecode( base64_decode( $title_after ) ) : '';
	$title_after = OhioExtraFilter::string( $title_after, 'string', '' );
	$highlighted_animation = isset( $highlighted_animation ) ? OhioExtraFilter::boolean( $highlighted_animation ) : true;
	$highlighter_height = isset( $highlighter_height ) ? OhioExtraFilter::string( $highlighter_height, 'string', '10') : '10';
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$title_before_typo = isset( $title_before_typo ) ? OhioExtraFilter::string( $title_before_typo ) : false;
	$subtitle_type_layout = isset( $subtitle_type_layout ) ? OhioExtraFilter::string( $subtitle_type_layout, 'string', 'bottom_subtitle' ) : 'bottom_subtitle';
	$title_highlighted_typo = isset( $title_highlighted_typo ) ? OhioExtraFilter::string( $title_highlighted_typo ) : false;
	$subtitle = isset( $subtitle ) ? rawurldecode( base64_decode( $subtitle ) ) : '';
	$subtitle = OhioExtraFilter::string( $subtitle, 'string', '' );
	$subtitle_typo = isset( $subtitle_typo ) ? OhioExtraFilter::string( $subtitle_typo ) : false;
	$subtitle_offset = isset( $subtitle_offset ) ? OhioExtraFilter::string( $subtitle_offset, 'string', '' ) : '';
	$divider_alignment = isset( $divider_alignment ) ? OhioExtraFilter::string( $divider_alignment, 'string', 'without' ) : 'without';
	$divider_color = isset( $divider_color ) ? OhioExtraFilter::string( $divider_color ) : false;
	$highlighter_color = isset( $highlighter_color ) ? OhioExtraFilter::string( $highlighter_color ) : false;

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
	if ( $appearance_effect != 'none' || $title_highlighted ) {
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

	$appear_attrs = '';
	if ( $highlighted_animation ) {
		$appear_attrs .= 'data-aos=animation data-aos-duration=600';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$content_classes = '';
	switch ( $module_type_layout ) {
		case 'on_left':
			$content_classes .= ' -left';
			break;
		case 'on_middle':
			$content_classes .= ' -center';
			break;
		case 'on_right':
			$content_classes .= ' -right';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $content_classes;
	
	/**
	* Assembling styles
	*/

	$_style_block = '';

	$heading_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $heading_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .title{';
		$_block_typo = $heading_title_typo;
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

	$heading_title_before_typo = OhioExtraParser::VC_typo_to_CSS( $title_before_typo );
	OhioExtraParser::VC_typo_custom_font( $title_before_typo );

	if ( $heading_title_before_typo ) {
		$_selector = '#' . $wrapper_id . ' .title .text-before{';
		$_block_typo = $heading_title_before_typo;
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

	$heading_title_highlighted_typo = OhioExtraParser::VC_typo_to_CSS( $title_highlighted_typo );
	OhioExtraParser::VC_typo_custom_font( $title_highlighted_typo );

	if ( $heading_title_highlighted_typo ) {
		$_selector = '#' . $wrapper_id . ' .title .highlighted-text-holder{';
		$_block_typo = $heading_title_highlighted_typo;
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

	$heading_subtitle_typo = OhioExtraParser::VC_typo_to_CSS( $subtitle_typo );
	OhioExtraParser::VC_typo_custom_font( $subtitle_typo );
	
	if ( $heading_subtitle_typo ) {
		$_selector = '#' . $wrapper_id . ' .subtitle{';
		$_block_typo = $heading_subtitle_typo;
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

	$divider_color = OhioExtraParser::VC_color_to_CSS( $divider_color, '{{color}}' );
	if ( $divider_color ) {
		$_style_block .= '#' . $wrapper_id . ' .divider{';
		$_style_block .= 'background-color:' . $divider_color . ';';
		$_style_block .= '}';
	}

	$highlighter_color = OhioExtraParser::VC_color_to_CSS( $highlighter_color, '{{color}}' );
	if ( $highlighter_color ) {
		$_style_block .= '#' . $wrapper_id . ' .title .highlighted-text{';
		$_style_block .= 'background-image: linear-gradient(' . $highlighter_color . ', ' . $highlighter_color . ');';
		$_style_block .= '}';
	}
	
	if ( $subtitle_offset ) {
		$_style_block .= '#' . $wrapper_id . ' .title + .subtitle,';
		$_style_block .= '#' . $wrapper_id . ' .subtitle + .title{';
		$_style_block .= 'margin-top:' . $subtitle_offset . 'px';
		$_style_block .= '}';
	}

	if ( isset( $highlighter_height ) && $highlighter_height != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .highlighted-text:not(:hover){';
		$_style_block .= 'background-size: 0% ' . $highlighter_height . '%;';
		$_style_block .= '}';
		$_style_block .= '#' . $wrapper_id . ' .highlighted-text:not([data-aos=animation]):not(:hover),';
		$_style_block .= '#' . $wrapper_id . ' .highlighted-text.aos-animate:not(:hover){';
		$_style_block .= 'background-size: 100% ' . $highlighter_height . '%;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'heading__view.php' );
	return ob_get_clean();
}