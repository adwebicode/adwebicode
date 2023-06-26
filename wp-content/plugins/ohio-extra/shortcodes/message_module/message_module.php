<?php 

/**
* WPBakery Page Builder Ohio Message box shortcode
*/

add_shortcode( 'ohio_message_module', 'ohio_message_module_func' );

function ohio_message_module_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'default' ) : 'default';
	$message_position = isset( $message_position ) ? OhioExtraFilter::string( $message_position, 'string', 'center' ) : 'center';
	$size = isset( $size ) ? OhioExtraFilter::string( $size, 'string', 'default' ) : 'default';
	$text = isset( $text ) ? rawurldecode( base64_decode( $text ) ) : '';
	$text = OhioExtraFilter::string( $text, 'string', '' );
	$border_radius = ( isset( $border_radius ) ) ? OhioExtraFilter::string( $border_radius, 'string', '' ) : '';
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$add_icon = isset( $add_icon ) ? OhioExtraFilter::boolean( $add_icon, false ) : false;
	$icon_type = ( isset( $icon_type ) ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = ( isset( $icon_as_icon ) ) ? OhioExtraFilter::string( $icon_as_icon, 'attr', '' ) : '';
	$icon_size = isset( $icon_size ) ? OhioExtraFilter::string( $icon_size, 'string', '24') : '24';
	$icon_as_image = ( isset( $icon_as_image ) ) ? OhioExtraFilter::string( wp_get_attachment_url( OhioExtraFilter::string( $icon_as_image ) ), 'attr' ) : false;
	$full_width = isset( $full_width ) ? OhioExtraFilter::boolean( $full_width, false ) : false;
	$without_close_button = isset( $without_close_button ) ? OhioExtraFilter::boolean( $without_close_button, false ) : false;
	$wrap_text = isset( $wrap_text ) ? OhioExtraFilter::boolean( $wrap_text, true ) : true;
	$text_typo = isset( $text_typo ) ? OhioExtraFilter::string( $text_typo ) : false;
	$use_link = isset( $use_link ) ? OhioExtraFilter::boolean( $use_link ) : false;
	$link = OhioExtraParser::VC_link_params( ( isset( $link ) ? $link : '' ), array( 'caption' => esc_html__( 'Read More', 'ohio-extra' ) ) );
	$link_typo = isset( $link_typo ) ? OhioExtraFilter::string( $link_typo ) : false;
	$bg_color = isset( $bg_color ) ? OhioExtraFilter::string( $bg_color, 'string', false ) : false;

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
	switch ( $layout ) {
		case 'primary':
			$layout_classes .= ' -primary';
			break;
		case 'success':
		$layout_classes .= ' -success';
			break;
		case 'warning':
			$layout_classes .= ' -warning';
			break;
		case 'danger':
			$layout_classes .= ' -danger';
			break;
	}

	$size_classes = '';
	switch ( $size ) {
		case 'small':
			$size_classes .= ' -small';
			break;
		case 'large':
			$size_classes .= ' -large';
			break;
	}

	$align_classes = '';
	switch ( $message_position ) {
		case 'left':
			$align_classes .= ' -left';
			break;
		case 'center':
			$align_classes .= ' -center';
			break;
		case 'right':
			$align_classes .= ' -right';
			break;
	}

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $size_classes;

	if ( $full_width ) {
		$wrapper_classes .= ' -block';
	}
	if ( !$wrap_text ) {
		$wrapper_classes .= ' -nowrap-t';
	}

	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$message_text_typo = OhioExtraParser::VC_typo_to_CSS( $text_typo );
	OhioExtraParser::VC_typo_custom_font( $text_typo );

	if ( $message_text_typo ) {
		$_selector = '#' . $wrapper_id . '.alert{';
		$_block_typo = $message_text_typo;
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

	$message_link_typo = OhioExtraParser::VC_typo_to_CSS( $link_typo );
	OhioExtraParser::VC_typo_custom_font( $link_typo );

	if ( $message_link_typo ) {
		$_selector = '#' . $wrapper_id . '.alert a{';
		$_block_typo = $message_link_typo;
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

	$bg_color = OhioExtraParser::VC_color_to_CSS( $bg_color, '{{color}}' );
	if ( $bg_color ) {
		$_style_block .= '#' . $wrapper_id . '.alert{';
		$_style_block .= 'background-color:' . $bg_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.alert{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-shadow{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( isset( $icon_size ) && $icon_size != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .icon{';
		$_style_block .= 'font-size:' . $icon_size . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'message_module__view.php' );
	return ob_get_clean();
}