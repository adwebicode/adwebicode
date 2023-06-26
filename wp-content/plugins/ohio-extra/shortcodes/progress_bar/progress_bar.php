<?php 

/**
* WPBakery Page Builder Ohio Progress Bar shortcode
*/

add_shortcode( 'ohio_progress_bar', 'ohio_progress_bar_func' );

function ohio_progress_bar_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'default') : 'default';
	$percent_in_tooltip = ( isset( $percent_in_tooltip ) ) ? OhioExtraFilter::boolean( $percent_in_tooltip ) : false;
	$name = ( isset( $name ) ) ? OhioExtraFilter::string( $name, 'string', '' ) : '';
	$percent = ( isset( $percent ) ) ? OhioExtraFilter::string( $percent, 'string', '85' ) : '85';
	$thickness = ( isset( $thickness ) ) ? OhioExtraFilter::string( $thickness, 'string', 'default' ) : 'default';
	$border_radius = ( isset( $border_radius ) ) ? OhioExtraFilter::string( $border_radius, 'string', '' ) : '';
	$name_typo = ( isset( $name_typo ) ) ? OhioExtraFilter::string( $name_typo ) : false;
	$percent_typo = ( isset( $percent_typo ) ) ? OhioExtraFilter::string( $percent_typo ) : false;
	$bar_bg_color = isset( $bar_bg_color ) ? OhioExtraFilter::string( $bar_bg_color, 'string', false ) : false;
	$bar_line_color = isset( $bar_line_color ) ? OhioExtraFilter::string( $bar_line_color, 'string', false ) : false;
	$tooltip_color = isset( $tooltip_color ) ? OhioExtraFilter::string( $tooltip_color, 'string', false ) : false;

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

	// Progress bar data
	$percent = intval($percent);
	if ( $percent < 0 || $percent > 100 ) {
		$percent = 100;
	}
	if ( $percent ) {
		$animation_attrs .= ' data-ohio-progress-bar=' . esc_attr( $percent ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( $percent_in_tooltip ) {
		$wrapper_classes .= ' -tooltip';
	}

	// Wrapper classes
	$inner_classes = '';

	$layout_classes = '';
	switch ( $layout ) {
		case 'inner':
			$layout_classes = ' -contained';
			break;
	}

	$size_classes = '';
	switch ( $thickness ) {
		case 'thin':
			$size_classes .= ' -thin';
			break;
		case 'thick':
			$size_classes .= ' -bold';
			break;
	}

	$inner_classes .= $layout_classes;
	$inner_classes .= $size_classes;

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$progress_label_typo = OhioExtraParser::VC_typo_to_CSS( $name_typo );
	OhioExtraParser::VC_typo_custom_font( $name_typo );

	if ( $progress_label_typo ) {
		$_selector = '#' . $wrapper_id . ' .label{';
		$_block_typo = $progress_label_typo;
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

	$progress_percent_typo = OhioExtraParser::VC_typo_to_CSS( $percent_typo );
	OhioExtraParser::VC_typo_custom_font( $percent_typo );

	if ( $progress_percent_typo ) {
		$_selector = '#' . $wrapper_id . ' .progress-percent{';
		$_block_typo = $progress_percent_typo;
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

	$bar_bg_color = OhioExtraParser::VC_color_to_CSS( $bar_bg_color, '{{color}}' );
	if ( $bar_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ' .progress-holder{';
		$_style_block .= 'background-color:' . $bar_bg_color . ';';
		$_style_block .= '}';
	}

	$bar_line_color = OhioExtraParser::VC_color_to_CSS( $bar_line_color, '{{color}}' );
	if ( $bar_line_color ) {
		$_style_block .= '#' . $wrapper_id . ' .progress-bar{';
		$_style_block .= 'background:' . $bar_line_color . ';';
		$_style_block .= '}';
	}

	$tooltip_color = OhioExtraParser::VC_color_to_CSS( $tooltip_color, '{{color}}' );
	if ( $tooltip_color ) {
		$_style_block .= '#' . $wrapper_id . ' .tooltip,';
		$_style_block .= '#' . $wrapper_id . ' .tooltip::before{';
		$_style_block .= 'background-color:' . $tooltip_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .progress-holder,';
		$_style_block .= '#' . $wrapper_id . ' .progress-holder > .progress-bar{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'progress_bar__view.php' );
	return ob_get_clean();
}