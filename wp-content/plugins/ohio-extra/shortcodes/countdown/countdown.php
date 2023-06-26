<?php 

/**
* WPBakery Page Builder Ohio Countdown shortcode
*/

add_shortcode( 'ohio_countdown', 'ohio_countdown_func' );

function ohio_countdown_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'countdown' );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'default') : 'default';
	$countdown_position = isset( $countdown_position ) ? OhioExtraFilter::string( $countdown_position, 'string', 'center' ) : 'center';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$countdown_date = isset( $countdown_date ) ? OhioExtraFilter::string( $countdown_date, 'string', '2019/1/1 0:0:0') : '2019/1/1 0:0:0';
	$numbers_typo = isset( $numbers_typo ) ? OhioExtraFilter::string( $numbers_typo ) : false;
	$titles_typo = isset( $titles_typo ) ? OhioExtraFilter::string( $titles_typo ) : false;
	$use_divider = isset( $use_divider ) ? OhioExtraFilter::boolean( $use_divider ) : true;
	$box_color = isset( $box_color ) ? OhioExtraFilter::string( $box_color, 'string', false ) : false;

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

	// Countdown data
	if ( $countdown_date ) {
		$animation_attrs .= ' data-countdown=true';
		$animation_attrs .= ' data-date=' . esc_attr($countdown_date) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $layout ) {
		case 'boxed':
			$layout_classes .= ' -contained';
			break;
		case 'text':
			$layout_classes .= ' -text';
			break;
	}

	$content_classes = '';
	switch ( $countdown_position ) {
		case 'left':
			$content_classes .= ' -left-flex';
			break;
		case 'center':
			$content_classes .= ' -center-flex';
			break;
		case 'right':
			$content_classes .= ' -right-flex';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;

	if ( $use_divider == true ) {
		$wrapper_classes .= ' -with-divider';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$countdown_number_typo = OhioExtraParser::VC_typo_to_CSS( $numbers_typo );
	OhioExtraParser::VC_typo_custom_font( $numbers_typo );

	if ( $countdown_number_typo ) {
		$_selector = '#' . $wrapper_id . ' .number{';
		$_block_typo = $countdown_number_typo;
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

	$countdown_label_typo = OhioExtraParser::VC_typo_to_CSS( $titles_typo );
	OhioExtraParser::VC_typo_custom_font( $titles_typo );

	if ( $countdown_label_typo ) {
		$_selector = '#' . $wrapper_id . ' .number-label{';
		$_block_typo = $countdown_label_typo;
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

	$box_color = OhioExtraParser::VC_color_to_CSS( $box_color, '{{color}}' );
	if ( $box_color ) {
		$_style_block .= '#' . $wrapper_id . '.-contained .countdown-item .number{';
		$_style_block .= 'background-color:' . $box_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-contained .countdown-item .number{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'countdown__view.php' );
	return ob_get_clean();
}