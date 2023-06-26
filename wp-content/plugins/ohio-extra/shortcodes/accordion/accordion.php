<?php 

/**
* WPBakery Page Builder Ohio Accordion shortcode
*/

add_shortcode( 'ohio_accordion', 'ohio_accordion_func' );

function ohio_accordion_func( $atts, $content = null ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$accordion_tabs_type = isset( $accordion_tabs_type ) ? OhioExtraFilter::string( $accordion_tabs_type, 'string', 'default' ) : 'default';
	$tab_bg_color = isset( $tab_bg_color ) ? OhioExtraFilter::string( $tab_bg_color ) : false;
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color ) : false;
	$tab_border_color = isset( $tab_border_color ) ? OhioExtraFilter::string( $tab_border_color ) : false;
	$accordion_tabs_title_typo = isset( $accordion_tabs_title_typo ) ? OhioExtraFilter::string( $accordion_tabs_title_typo ) : false;
	$accordion_tabs_content_typo = isset( $accordion_tabs_content_typo ) ? OhioExtraFilter::string( $accordion_tabs_content_typo ) : false;
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';

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
	switch ( $accordion_tabs_type ) {
		case 'default':
			$layout_classes .= '';
			break;
		case 'outlined':
			$layout_classes .= '-outlined';
			break;
		case 'outline':
			$layout_classes .= '-text';
			break;
	}

	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$tab_title_typo = OhioExtraParser::VC_typo_to_CSS( $accordion_tabs_title_typo );
	OhioExtraParser::VC_typo_custom_font( $accordion_tabs_title_typo );

	if ( $tab_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .accordion-header{';
		$_block_typo = $tab_title_typo;
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

	$tab_content_typo = OhioExtraParser::VC_typo_to_CSS( $accordion_tabs_content_typo );
	OhioExtraParser::VC_typo_custom_font( $accordion_tabs_content_typo );

	if ( $tab_content_typo ) {
		$_selector = '#' . $wrapper_id . ' .accordion-body{';
		$_block_typo = $tab_content_typo;
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
	
	$tab_bg_color = OhioExtraParser::VC_color_to_CSS( $tab_bg_color, '{{color}}' );
	if ( $tab_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ':not(.-outlined):not(.-text) .accordion-item .accordion-button{';
		$_style_block .= 'background-color:' . $tab_bg_color . ';';
		$_style_block .= '}';
	}
	
	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-button{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	$tab_border_color = OhioExtraParser::VC_color_to_CSS( $tab_border_color, '{{color}}' );
	if ( $tab_border_color ) {
		$_style_block .= '#' . $wrapper_id . '.accordion.-outlined .accordion-item .accordion-button{';
		$_style_block .= 'border-color:' . $tab_border_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.accordion:not(.-outlined):not(.-text) .accordion-item .accordion-button{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}
	
	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'accordion__view.php' );
	return ob_get_clean();
}