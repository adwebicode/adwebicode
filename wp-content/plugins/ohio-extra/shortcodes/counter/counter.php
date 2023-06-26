<?php 

/**
* WPBakery Page Builder Ohio Counter shortcode
*/

add_shortcode( 'ohio_counter', 'ohio_counter_func' );

function ohio_counter_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'percent') : 'percent';
	$counter_position = isset( $counter_position ) ? OhioExtraFilter::string( $counter_position, 'string', 'center' ) : 'center';
	$count_number = isset( $count_number ) ? OhioExtraFilter::string( str_replace( ' ', '', $count_number ), 'string', '0') : '0';
	$title = isset( $title ) ? OhioExtraFilter::string( $title, 'string', false) : false;
	$count_text_after = isset( $count_text_after ) ? OhioExtraFilter::string( $count_text_after, 'string', false) : false;
	$count_text_before = isset( $count_text_before ) ? OhioExtraFilter::string( $count_text_before, 'string', false) : false;
	$plus_symbol = isset( $plus_symbol ) ? OhioExtraFilter::boolean( $plus_symbol ) : false;
	$icon_position = isset( $icon_position ) ? OhioExtraFilter::string( $icon_position, 'string', 'left') : 'left';
	$icon_type = isset( $icon_type ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_size = isset( $icon_size ) ? OhioExtraFilter::string( $icon_size, 'string', '') : '';
	$icon_as_image = isset( $icon_as_image ) ? OhioExtraFilter::string( $icon_as_image ) : false;
	$icon_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $icon_as_image ), $title );
	$icon_layout = isset( $icon_layout ) ? OhioExtraFilter::string( $icon_layout, 'string', '' ) : '';
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color ) : false;
	$icon_bg_color = isset( $icon_bg_color ) ? OhioExtraFilter::string( $icon_bg_color ) : false;
	$icon_border_color = isset( $icon_border_color ) ? OhioExtraFilter::string( $icon_border_color ) : false;
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$count_typo = isset( $count_typo ) ? OhioExtraFilter::string( $count_typo ) : false;
	$plus_typo = isset( $plus_typo ) ? OhioExtraFilter::string( $plus_typo ) : false;

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
	switch ( $icon_position ) {
		case 'left':
			$layout_classes .= ' -left-icon';
			break;
		case 'right':
			$layout_classes .= ' -right-icon';
			break;
		case 'top':
			$layout_classes .= ' -top-icon';
			break;
	}

	$content_classes = '';
	switch ( $counter_position ) {
		case 'left':
			$content_classes .= ' -left';
			break;
		case 'center':
			$content_classes .= ' -center';
			break;
		case 'right':
			$content_classes .= ' -right';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;

	// Icon variants
	$icon_classes = '';
	switch ( $icon_layout ) {
		case 'border':
			$icon_classes = ' -outlined';
			break;
		case 'fill':
			$icon_classes = ' -contained';
			break;
	}

	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$counter_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $counter_title_typo ) {
		$_selector = '#' . $wrapper_id . ' p{';
		$_block_typo = $counter_title_typo;
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

	$counter_number_typo = OhioExtraParser::VC_typo_to_CSS( $count_typo );
	OhioExtraParser::VC_typo_custom_font( $count_typo );

	if ( $counter_number_typo ) {
		$_selector = '#' . $wrapper_id . ' .counter-number > .holder{';
		$_block_typo = $counter_number_typo;
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

	$counter_plus_typo = OhioExtraParser::VC_typo_to_CSS( $plus_typo );
	OhioExtraParser::VC_typo_custom_font( $plus_typo );

	if ( $counter_plus_typo ) {
		$_selector = '#' . $wrapper_id . ' .counter-number.-with-increaser .holder::after{';
		$_block_typo = $counter_plus_typo;
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

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	// Icon variants
	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-group{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	$icon_bg_color = OhioExtraParser::VC_color_to_CSS( $icon_bg_color, '{{color}}' );
	if ( $icon_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ' .-contained{';
		$_style_block .= 'background-color:' . $icon_bg_color . ';';
		$_style_block .= '}';
	}

	$icon_border_color = OhioExtraParser::VC_color_to_CSS( $icon_border_color, '{{color}}' );
	if ( $icon_border_color ) {
		$_style_block .= '#' . $wrapper_id . ' .-outlined{';
		$_style_block .= 'border-color:' . $icon_border_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $icon_size ) && $icon_size != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-group .icon{';
		$_style_block .= 'font-size:' . $icon_size . 'px;';
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'counter__view.php' );
	return ob_get_clean();
}