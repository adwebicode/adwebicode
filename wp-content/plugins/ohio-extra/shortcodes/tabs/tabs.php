<?php 

/**
* WPBakery Page Builder Ohio Tabs shortcode
*/

add_shortcode( 'ohio_tabs', 'ohio_tabs_func' );

function ohio_tabs_func( $atts, $content = null ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$tabs_type = isset( $tabs_type ) ? OhioExtraFilter::string( $tabs_type, 'string', 'default' ) : 'default';
	$tabs_layout = isset( $tabs_layout ) ? OhioExtraFilter::string( $tabs_layout, 'string', 'ontop' ) : 'ontop';
	$tabs_alignment = isset( $tabs_alignment ) ? OhioExtraFilter::string( $tabs_alignment, 'string', 'left' ) : 'left';
	$tab_color = isset( $tab_color ) ? OhioExtraFilter::string( $tab_color ) : false;
	$tab_active_color = isset( $tab_active_color ) ? OhioExtraFilter::string( $tab_active_color ) : false;
	$tabs_line_color = isset( $tabs_line_color ) ? OhioExtraFilter::string( $tabs_line_color ) : false;
	$tabs_title_typo = isset( $tabs_title_typo ) ? OhioExtraFilter::string( $tabs_title_typo ) : false;
	$tabs_active_title_typo = isset( $tabs_active_title_typo ) ? OhioExtraFilter::string( $tabs_active_title_typo ) : false;
	$tabs_content_typo = isset( $tabs_content_typo ) ? OhioExtraFilter::string( $tabs_content_typo ) : false;
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

	// Tabs data
	$tab_box_object = (object) array();
	$tab_box_json = json_encode( $tab_box_object );
	if ( $tab_box_json ) {
		$animation_attrs .= ' data-options=' . esc_attr( $tab_box_json ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$type_classes = '';
	switch ( $tabs_type ) {
		case 'filled':
			$type_classes .= ' -contained';
			break;
		case 'button':
			$type_classes .= ' -with-button';
			break;
	}

	$layout_classes = '';
	switch ( $tabs_layout ) {
		case 'onleft':
			$layout_classes .= ' -vertical';
			break;
	}

	$content_classes = '';
	switch ( $tabs_alignment ) {
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
	$wrapper_classes .= $type_classes;
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$tab_title_typo = OhioExtraParser::VC_typo_to_CSS( $tabs_title_typo );
	OhioExtraParser::VC_typo_custom_font( $tabs_title_typo );

	if ( $tab_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .tabs-nav{';
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

	$tab_active_title_typo = OhioExtraParser::VC_typo_to_CSS( $tabs_active_title_typo );
	OhioExtraParser::VC_typo_custom_font( $tabs_active_title_typo );

	if ( $tab_active_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .tabs-nav .active{';
		$_block_typo = $tab_active_title_typo;
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

	$tab_content_typo = OhioExtraParser::VC_typo_to_CSS( $tabs_content_typo );
	OhioExtraParser::VC_typo_custom_font( $tabs_content_typo );
	
	if ( $tab_content_typo ) {
		$_selector = '#' . $wrapper_id . ' .tabs-content{';
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

	$tab_color = OhioExtraParser::VC_color_to_CSS( $tab_color, '{{color}}' );
	if ( $tab_color ) {
		$_style_block .= '#' . $wrapper_id . '.-with-button .tabs-nav,';
		$_style_block .= '#' . $wrapper_id . '.-contained .tabs-nav{';
		$_style_block .= 'background-color:' . $tab_color . ';';
		$_style_block .= '}';
	}

	$tab_active_color = OhioExtraParser::VC_color_to_CSS( $tab_active_color, '{{color}}' );
	if ( $tab_active_color ) {
		$_style_block .= '#' . $wrapper_id . '.-contained .tabs-nav-link.active{';
		$_style_block .= 'background-color:' . $tab_active_color . ';';
		$_style_block .= '}';
	}

	$tabs_line_color = OhioExtraParser::VC_color_to_CSS( $tabs_line_color, '{{color}}' );
	if ( $tabs_line_color ) {
		$_style_block .= '#' . $wrapper_id . ' .tabs-nav-line{';
		$_style_block .= 'background-color:' . $tabs_line_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-button .tabs-nav,';
		$_style_block .= '#' . $wrapper_id . '.-with-button .tabs-nav-line{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'tabs__view.php' );
	return ob_get_clean();
}