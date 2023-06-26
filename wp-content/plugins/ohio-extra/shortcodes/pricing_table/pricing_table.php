<?php 

/**
* WPBakery Page Builder Ohio Pricing table shortcode
*/

add_shortcode( 'ohio_pricing_table', 'ohio_pricing_table_func' );

function ohio_pricing_table_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$title = isset( $title ) ? OhioExtraFilter::string( $title ) : false;
	$subtitle = isset( $subtitle ) ? OhioExtraFilter::string( $subtitle ) : false;
	$description = isset( $description ) ? OhioExtraFilter::string( $description, 'textarea', '' ) : '';
	$table_alignment = isset( $table_alignment ) ? OhioExtraFilter::string( $table_alignment, 'string', 'left' ) : 'left';
	$price = isset( $price ) ? OhioExtraFilter::string( $price, 'string', '0' ) : '';
	$price_currency = isset( $price_currency ) ? OhioExtraFilter::string( $price_currency ) : false;
	$price_caption = isset( $price_caption ) ? OhioExtraFilter::string( $price_caption ) : false;
	$features_type = isset( $features_type ) ? OhioExtraFilter::string( $features_type, 'string', 'default' ) : 'default';
	$features_value = isset( $features_value ) ? json_decode( urldecode( OhioExtraFilter::string( $features_value ) ) ) : false;
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : true;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$boxed_layout = isset( $boxed_layout ) ? OhioExtraFilter::boolean( $boxed_layout ) : false;

	// Button
	$add_link = isset( $add_link ) ? OhioExtraFilter::boolean( $add_link ) : true;
	$button_link = OhioExtraParser::VC_link_params( ( isset( $button_link ) ) ? $button_link : '', array( 'caption' => __( 'Get Started', 'ohio-extra' ) ) );
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

	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$subtitle_typo = isset( $subtitle_typo ) ? OhioExtraFilter::string( $subtitle_typo ) : false;
	$description_typo = isset( $description_typo ) ? OhioExtraFilter::string( $description_typo ) : false;
	$price_typo = isset( $price_typo ) ? OhioExtraFilter::string( $price_typo ) : false;
	$features_title_typo = isset( $features_title_typo ) ? OhioExtraFilter::string( $features_title_typo ) : false;
	$features_title_disabled_typo = isset( $features_title_disabled_typo ) ? OhioExtraFilter::string( $features_title_disabled_typo ) : false;
	$price_table_bg_color = isset( $price_table_bg_color ) ? OhioExtraFilter::string( $price_table_bg_color ) : false;
	$price_caption_typo = isset( $price_caption_typo ) ? OhioExtraFilter::string( $price_caption_typo ) : false;
	$price_caption_bg_color = isset( $price_caption_bg_color ) ? OhioExtraFilter::string( $price_caption_bg_color ) : false;
	$features_titles_color = isset( $features_titles_color ) ? OhioExtraFilter::string( $features_titles_color ) : false;
	$features_icons_color = isset( $features_icons_color ) ? OhioExtraFilter::string( $features_icons_color ) : false;
	$features_disabled_titles_color = isset( $features_disabled_titles_color ) ? OhioExtraFilter::string( $features_disabled_titles_color ) : false;
	$features_disabled_icons_color = isset( $features_disabled_icons_color ) ? OhioExtraFilter::string( $features_disabled_icons_color ) : false;

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

	$content_classes = '';
	switch ( $table_alignment ) {
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

	if ( $boxed_layout ) {
		$wrapper_classes .= ' -contained card';
	}

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $content_classes;

	/**
	* Features
	*/

	if ( $features_value ) {
		foreach ($features_value as $feature_key => $feature_value) {
			if ( isset( $feature_value->feature_title ) ) {
				$features_value[$feature_key]->feature_title = OhioExtraFilter::string( $feature_value->feature_title );
			} else {
				$features_value[$feature_key]->feature_title = false;
			}
			if ( isset( $feature_value->feature_icon ) ) {
				$features_value[$feature_key]->feature_icon = OhioExtraFilter::string( $feature_value->feature_icon, 'attr' );
			} else {
				$features_value[$feature_key]->feature_icon = false;
			}
		}
	}

	if ( isset( $features_value_type3 ) && $features_value_type3 ) {
		foreach ($features_value_type3 as $feature_key => $feature_value) {
			if ( isset( $feature_value->feature_icon ) ) {
				$features_value_type3[$feature_key]->feature_icon = OhioExtraFilter::string( $feature_value->feature_icon, 'string', 'yes' );
			} else {
				$features_value_type3[$feature_key]->feature_icon = 'yes';
			}
			$GLOBALS['ohio_icon_fonts'][] = 'my-icon-ui-cross';
		}
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$table_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $table_title_typo ) {
		$_selector = '#' . $wrapper_id . ' h5.title:not(.price-number){';
		$_block_typo = $table_title_typo;
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

	$table_subtitle_typo = OhioExtraParser::VC_typo_to_CSS( $subtitle_typo );
	OhioExtraParser::VC_typo_custom_font( $subtitle_typo );

	if ( $table_subtitle_typo ) {
		$_selector = '#' . $wrapper_id . ' .subtitle{';
		$_block_typo = $table_subtitle_typo;
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

	$table_description_typo = OhioExtraParser::VC_typo_to_CSS( $description_typo );
	OhioExtraParser::VC_typo_custom_font( $description_typo );

	if ( $table_description_typo ) {
		$_selector = '#' . $wrapper_id . ' .pricing-table-details{';
		$_block_typo = $table_description_typo;
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

	$table_price_typo = OhioExtraParser::VC_typo_to_CSS( $price_typo );
	OhioExtraParser::VC_typo_custom_font( $price_typo );

	if ( $table_price_typo ) {
		$_selector = '#' . $wrapper_id . ' .price-number{';
		$_block_typo = $table_price_typo;
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

	$table_price_tag_typo = OhioExtraParser::VC_typo_to_CSS( $price_caption_typo );
	OhioExtraParser::VC_typo_custom_font( $price_caption_typo );

	if ( $table_price_tag_typo ) {
		$_selector = '#' . $wrapper_id . ' .tag{';
		$_block_typo = $table_price_tag_typo;
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

	$table_features_typo = OhioExtraParser::VC_typo_to_CSS( $features_title_typo );
	OhioExtraParser::VC_typo_custom_font( $features_title_typo );

	if ( $table_features_typo ) {
		$_selector = '#' . $wrapper_id . ' .pricing-table-features .exist{';
		$_block_typo = $table_features_typo;
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

	$table_missing_features_typo = OhioExtraParser::VC_typo_to_CSS( $features_title_disabled_typo );
	OhioExtraParser::VC_typo_custom_font( $features_title_disabled_typo );

	if ( $table_missing_features_typo ) {
		$_selector = '#' . $wrapper_id . ' .pricing-table-features .missing{';
		$_block_typo = $table_missing_features_typo;
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

	$price_table_bg_color = OhioExtraParser::VC_color_to_CSS( $price_table_bg_color, '{{color}}' );
	if ( $price_table_bg_color ) {
		$_style_block .= '#' . $wrapper_id . '{';
		$_style_block .= 'background-color:' . $price_table_bg_color . ';';
		$_style_block .= '}';
	}

	$price_caption_bg_color = OhioExtraParser::VC_color_to_CSS( $price_caption_bg_color, '{{color}}' );
	if ( $price_caption_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ' .tag{';
		$_style_block .= 'background-color:' . $price_caption_bg_color . ';';
		$_style_block .= '}';
	}

	$features_icons_color = OhioExtraParser::VC_color_to_CSS( $features_icons_color, '{{color}}' );
	if ( $features_icons_color ) {
		$_style_block .= '#' . $wrapper_id . ' .pricing-table-features .exist .icon{';
		$_style_block .= 'color:' . $features_icons_color . ';';
		$_style_block .= '}';
	}

	$features_disabled_icons_color = OhioExtraParser::VC_color_to_CSS( $features_disabled_icons_color, '{{color}}' );
	if ( $features_disabled_icons_color ) {
		$_style_block .= '#' . $wrapper_id . ' .pricing-table-features .missing .icon{';
		$_style_block .= 'color:' . $features_disabled_icons_color . ';';
		$_style_block .= '}';
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

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.pricing-table{';
		$_style_block .= 'border-radius:' . $border_radius . 'px !important;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.pricing-table.-with-shadow{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'pricing_table__view.php' );
	return ob_get_clean();
}