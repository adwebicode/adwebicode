<?php 

/**
* WPBakery Page Builder Ohio Icon box shortcode
*/

add_shortcode( 'ohio_icon_box', 'ohio_icon_box_func' );

function ohio_icon_box_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$box_type_layout = ( isset( $box_type_layout ) ) ? OhioExtraFilter::string( $box_type_layout, 'string', 'top_icon' ) : 'top_icon';
	$content_full = isset( $content_full ) ? OhioExtraFilter::string( $content_full, 'string', 'none') : 'none';
	$box_alignment = ( isset( $box_alignment ) ) ? OhioExtraFilter::string( $box_alignment, 'string', 'center' ) : 'center';
	$title = ( isset( $title ) ) ? OhioExtraFilter::string( $title, 'string', '' ) : '';
	$title_typo = ( isset( $title_typo ) ) ? OhioExtraFilter::string( $title_typo ) : false;
	$description = isset( $description ) ? OhioExtraFilter::string( $description, 'textarea', '' ) : '';
	$description_typo = ( isset( $description_typo ) ) ? OhioExtraFilter::string( $description_typo ) : false;

	// Button
	$use_link = ( isset( $use_link ) ) ? OhioExtraFilter::boolean( $use_link ) : false;
	$link_url = OhioExtraParser::VC_link_params( isset( $link_url ) ? $link_url : '', array( 'caption' => __( 'Read More', 'ohio-extra' ) ) );
	$readmore_button = isset( $readmore_button ) ? OhioExtraFilter::string( $readmore_button, 'string', false ) : false;
	$readmore_button = preg_replace( '/\&amp\;/', '&', $readmore_button );
	parse_str( $readmore_button, $button_settings );

	// Icon
	$icon_type_layout = ( isset( $icon_type_layout ) ) ? OhioExtraFilter::string( $icon_type_layout, 'string', 'default' ) : 'default';
	$icon_type = ( isset( $icon_type ) ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = ( isset( $icon_as_icon ) ) ? OhioExtraFilter::string( $icon_as_icon, 'attr', '' ) : '';
	$icon_size = isset( $icon_size ) ? OhioExtraFilter::string( $icon_size, 'string', '') : '';
	$icon_as_image = ( isset( $icon_as_image ) ) ? OhioExtraFilter::string( $icon_as_image ) : false;
	$icon_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $icon_as_image ), $title );
	$icon_color = ( isset( $icon_color ) ) ? OhioExtraFilter::string( $icon_color ) : false;
	$border_color = ( isset( $border_color ) ) ? OhioExtraFilter::string( $border_color ) : false;
	$fill_color = ( isset( $fill_color ) ) ? OhioExtraFilter::string( $fill_color ) : false;
	// $image = ( isset( $image ) ) ? OhioExtraFilter::string( wp_get_attachment_url( OhioExtraFilter::string( $image ) ), 'attr' ) : false;

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
	if ( $content_full != 'full' ) {
		switch ( $box_type_layout ) {
			case 'left_icon':
				$layout_classes .= ' -left-icon';
				break;
		}
	}

	$layout_type_classes = '';
	switch ( $content_full ) {
		case 'full':
			$layout_type_classes .= ' -floating-icon';
			break;
	}

	$content_classes = '';
	switch ( $box_alignment ) {
		case 'left':
			$content_classes .= ' -left -left-flex';
			break;
		case 'center':
			$content_classes .= ' -center -center-flex';
			break;
		case 'right':
			$content_classes .= ' -right -right-flex';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $layout_type_classes;
	$wrapper_classes .= $content_classes;

	// Icon variants
	$icon_classes = '';
	switch ( $icon_type_layout ) {
		case 'border':
			$icon_classes = ' -outlined';
			break;
		case 'only_fill':
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

	$icon_box_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $icon_box_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .icon-box-heading{';
		$_block_typo = $icon_box_title_typo;
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

	$icon_box_details_typo = OhioExtraParser::VC_typo_to_CSS( $description_typo );
	OhioExtraParser::VC_typo_custom_font( $description_typo );

	if ( $icon_box_details_typo ) {
		$_selector = '#' . $wrapper_id . ' .icon-box-content p{';
		$_block_typo = $icon_box_details_typo;
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

	$fill_color = OhioExtraParser::VC_color_to_CSS( $fill_color, '{{color}}' );
	if ( $fill_color ) {
		$_style_block .= '#' . $wrapper_id . ' .-contained{';
		$_style_block .= 'background-color:' . $fill_color . ';';
		$_style_block .= '}';
	}

	$border_color = OhioExtraParser::VC_color_to_CSS( $border_color, '{{color}}' );
	if ( $border_color ) {
		$_style_block .= '#' . $wrapper_id . ' .-outlined{';
		$_style_block .= 'border-color:' . $border_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $icon_size ) && $icon_size != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .icon-group .icon{';
		$_style_block .= 'font-size:' . $icon_size . 'px;';
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'icon_box__view.php' );
	return ob_get_clean();
}