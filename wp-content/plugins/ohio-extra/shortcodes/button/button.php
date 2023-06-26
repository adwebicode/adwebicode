 <?php 

/**
* WPBakery Page Builder Ohio Button shortcode
*/

add_shortcode( 'ohio_button', 'ohio_button_func' );

function ohio_button_func( $atts ) {
	if ( is_array( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'fill') : 'fill';
	$shape_size = isset( $shape_size ) ? OhioExtraFilter::string( $shape_size, 'string', '' ) : '';
	$shape_position = isset( $shape_position ) ? OhioExtraFilter::string( $shape_position, 'string', 'center' ) : 'center';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$title = isset( $title ) ? OhioExtraFilter::string( $title, 'string', '' ) : '';
	$full_width = isset( $full_width ) ? OhioExtraFilter::boolean( $full_width ) : false;
	$button_use_brand_color = isset( $button_use_brand_color ) ? OhioExtraFilter::boolean( $button_use_brand_color ) : false;

	// Button icons
	$link = OhioExtraParser::VC_link_params( ( isset( $link ) ) ? $link : '', array( 'caption' => __( '', 'ohio-extra' ) ) );
	$icon_use = isset( $icon_use ) ? OhioExtraFilter::boolean( $icon_use ) : false; 
	$icon_position = isset( $icon_position ) ? OhioExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_as_image = isset( $icon_as_image ) ? OhioExtraFilter::string( $icon_as_image, 'string', '' ) : '';

	$icon_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $icon_as_image ), __( 'Icon', 'ohio-extra' ) );
	$color = isset( $color ) ? OhioExtraFilter::string( $color, 'string', false ) : false;
	$hover_color = isset( $hover_color ) ? OhioExtraFilter::string( $hover_color, 'string', false ) : false;
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$title_typo_hover = isset( $title_typo_hover ) ? OhioExtraFilter::string( $title_typo_hover ) : false;

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
		case 'outline':
			$layout_classes .= ' -outlined';
			break;
		case 'flat':
			$layout_classes .= ' -flat';
			break;
		case 'link':
			$layout_classes .= ' -text';
			break;
	}

	$size_classes = '';
	switch ( $shape_size ) {
		case 'small':
			$size_classes .= ' -small';
			break;
		case 'large':
			$size_classes .= ' -large';
			break;
	}

	$align_classes = '';
	switch ( $shape_position ) {
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

	if ( $full_width ) {
		$wrapper_classes .= ' -block';
	}

	if ( $button_use_brand_color ) {
		$wrapper_classes .= ' -primary';
	}

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $size_classes;

	// Icon type
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	} else if ( $icon_as_image ) {
		$icon_src = wp_get_attachment_image_url( $icon_as_image, 'full' );
	}

	/**
	* Assembling styles
	*/
			
	$_style_block = '';

	$button_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $button_title_typo ) {
		$_selector = '#' . $wrapper_id . '.button{';
		$_block_typo = $button_title_typo;
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

	$button_hover_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo_hover );
	OhioExtraParser::VC_typo_custom_font( $title_typo_hover );

	if ( $button_hover_title_typo ) {
		$_selector = '#' . $wrapper_id . '.button:hover{';
		$_block_typo = $button_hover_title_typo;
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

	$button_color = OhioExtraParser::VC_color_to_CSS( $color, '{{color}}' );
	if ( $button_color ) {
		$_style_block .= '#' . $wrapper_id . '.button:not(.-outlined):not(.-flat):not(.-text){';
		$_style_block .= 'background-color:' . $button_color . ';';
		$_style_block .= '}';
	}

	$button_hover_color = OhioExtraParser::VC_color_to_CSS( $hover_color, '{{color}}' );
	if ( $button_hover_color ) {
		$_style_block .= '#' . $wrapper_id . '.button:not(.-outlined):not(.-flat):not(.-text):hover{';
		$_style_block .= 'background-color:' . $button_hover_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.button{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.button.-with-shadow:not(.-flat),';
		$_style_block .= '#' . $wrapper_id . '.button.-with-shadow.-flat:hover{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'button__view.php' );
	return ob_get_clean();
}