<?php 

/**
* WPBakery Page Builder Ohio Pricing List shortcode
*/

add_shortcode( 'ohio_pricing_list', 'ohio_pricing_list_func' );

function ohio_pricing_list_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$name = isset( $name ) ? OhioExtraFilter::string( $name, 'string', '') : '';
	$indigriends = isset( $indigriends ) ? OhioExtraFilter::string( $indigriends, 'string', '') : '';
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$details_typo = isset( $details_typo ) ? OhioExtraFilter::string( $details_typo ) : false;
	$sale_price = isset( $sale_price ) ? OhioExtraFilter::string( $sale_price, 'string', '') : '';
	$sale_price_typo = isset( $sale_price_typo ) ? OhioExtraFilter::string( $sale_price_typo ) : false;
	$regular_price = isset( $regular_price ) ? OhioExtraFilter::string( $regular_price, 'string', '') : '';
	$regular_price_typo = isset( $regular_price_typo ) ? OhioExtraFilter::string( $regular_price_typo ) : false;
	$mark = isset( $new ) ? OhioExtraFilter::boolean( $new ) : false;
	$mark_typo = isset( $mark_typo ) ? OhioExtraFilter::string( $mark_typo ) : false;
	$mark_background_color = isset( $mark_background_color ) ? OhioExtraFilter::string( $mark_background_color, 'string', false ) : false;

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

	if ( !empty( $sale_price ) ) {
		$wrapper_classes .= ' -with-discount';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$pricing_list_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $pricing_list_title_typo ) {
		$_selector = '#' . $wrapper_id . '.pricing-list .heading{';
		$_block_typo = $pricing_list_title_typo;
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

	$pricing_list_details_typo = OhioExtraParser::VC_typo_to_CSS( $details_typo );
	OhioExtraParser::VC_typo_custom_font( $details_typo );

	if ( $pricing_list_details_typo ) {
		$_selector = '#' . $wrapper_id . '.pricing-list .pricing-list-details{';
		$_block_typo = $pricing_list_details_typo;
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

	$pricing_list_price_typo = OhioExtraParser::VC_typo_to_CSS( $regular_price_typo );
	OhioExtraParser::VC_typo_custom_font( $regular_price_typo );

	if ( $pricing_list_price_typo ) {
		$_selector = '#' . $wrapper_id . '.pricing-list-price .regular-price{';
		$_block_typo = $pricing_list_price_typo;
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

	$pricing_list_sale_price_typo = OhioExtraParser::VC_typo_to_CSS( $sale_price_typo );
	OhioExtraParser::VC_typo_custom_font( $sale_price_typo );

	if ( $pricing_list_sale_price_typo ) {
		$_selector = '#' . $wrapper_id . '.pricing-list-price .title{';
		$_block_typo = $pricing_list_sale_price_typo;
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

	$pricing_list_badge_typo = OhioExtraParser::VC_typo_to_CSS( $mark_typo );
	OhioExtraParser::VC_typo_custom_font( $mark_typo );

	if ( $pricing_list_badge_typo ) {
		$_selector = '#' . $wrapper_id . ' .badge{';
		$_block_typo = $pricing_list_badge_typo;
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
	
	$mark_background_color = OhioExtraParser::VC_color_to_CSS( $mark_background_color, '{{color}}' );
	if ( $mark_background_color ) {
		$_style_block .= '#' . $wrapper_id . ' .badge{';
		$_style_block .= 'background-color:' . $mark_background_color . ';';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'pricing_list__view.php' );
	return ob_get_clean();
}