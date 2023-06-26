<?php 

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode
*/

add_shortcode( 'ohio_accordion_inner', 'ohio_accordion_inner_func' );

function ohio_accordion_inner_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$heading = isset( $heading ) ? OhioExtraFilter::string( $heading, 'string', '' ) : '';
	$is_active = isset( $is_active ) ? OhioExtraFilter::boolean( $is_active ) : false;
	$heading_typo = isset( $heading_typo ) ? OhioExtraFilter::string( $heading_typo ) : false;
	$content_typo = isset( $content_typo ) ? OhioExtraFilter::string( $content_typo ) : false;

	// Design options
    $content_styles = isset( $content_styles ) ? OhioExtraFilter::string( $content_styles ) : false;
    $content_styles_str = strpos($content_styles, "{");
    $content_styles_css = substr($content_styles, $content_styles_str);

	// Icon
	$with_icon = isset( $with_icon ) ? OhioExtraFilter::boolean( $with_icon ) : false;
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'attr' ) : false;
	if ( $with_icon && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	// Wrapper ID
	$wrapper_id = $tab_id;

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( $is_active ) {
		$wrapper_classes .= " active";
	}

	/**
	* Handling
	*/

	$content_html = wpautop( $content_html );

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$tab_title_typo = OhioExtraParser::VC_typo_to_CSS( $heading_typo );
	OhioExtraParser::VC_typo_custom_font( $heading_typo );

	if ( $tab_title_typo ) {
		$_selector = '[id=\'' . $wrapper_id . '\'] .accordion-header{';
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

	$tab_content_typo = OhioExtraParser::VC_typo_to_CSS( $content_typo );
	OhioExtraParser::VC_typo_custom_font( $content_typo );

	if ( $tab_content_typo ) {
		$_selector = '[id=\'' . $wrapper_id . '\'] .accordion-body{';
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

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'accordion_inner__view.php' );
	return ob_get_clean();
}