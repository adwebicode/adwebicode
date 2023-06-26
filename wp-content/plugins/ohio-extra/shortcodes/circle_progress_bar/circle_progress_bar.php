<?php 

/**
* Visual Composer Ohio Circle Progress Bar shortcode
*/

add_shortcode( 'ohio_pie_chart', 'ohio_pie_chart_func' );

function ohio_pie_chart_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'chart-box' );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'default' ) : 'default';
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'left' ) : 'left';
	$thickness = isset( $thickness ) ? OhioExtraFilter::string( $thickness, 'string', 'default' ) : 'default';
	$percent = isset( $percent ) ? OhioExtraFilter::string( $percent, 'string', '100') : '100';
	$title = isset( $title ) ? OhioExtraFilter::string( $title, 'string', false) : false;
	$with_icon = isset( $with_icon ) ? OhioExtraFilter::boolean( $with_icon ) : false;
	$icon_position = isset( $icon_position ) ? OhioExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'string', '' ) : '';
	$icon_size = isset( $icon_size ) ? OhioExtraFilter::string( $icon_size, 'string', '') : '';
	$icon_as_image = isset( $icon_as_image ) ? OhioExtraFilter::string( $icon_as_image, 'string', '' ) : '';
	$icon_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $icon_as_image ) , $title );
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$percent_typo = isset( $percent_typo ) ? OhioExtraFilter::string( $percent_typo ) : false;
	$chart_color = isset( $chart_color ) ? OhioExtraFilter::string( $chart_color, 'string', false ) : false;
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color, 'string', false ) : false;

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

	// Chart data
	if ( $percent ) {
		$animation_attrs .= ' data-circle-progress=true';
		$animation_attrs .= ' data-percent-value=' . esc_attr( $percent ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$layout_classes = '';
	switch ( $layout ) {
		case 'default':
			$layout_classes .= '';
			break;
		case 'floating':
			$layout_classes .= ' -floating';
			break;
	}

	$content_classes = '';
	switch ( $alignment ) {
		case 'left':
			$layout_classes .= ' -left';
			break;
		case 'center':
			$layout_classes .= ' -center';
			break;
		case 'right':
			$layout_classes .= ' -right';
			break;
	}

	$thickness_classes = '';
	switch ( $thickness ) {
		case 'default':
			$layout_classes .= '';
			break;
		case 'thin':
			$layout_classes .= ' -thin';
			break;
		case 'thick':
			$layout_classes .= ' -bold';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $layout_classes;
	$wrapper_classes .= $content_classes;
	$wrapper_classes .= $thickness_classes;
	
	// Icon
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}
	
	/**
	* Assembling styles
	*/

	$_style_block = '';

	$chart_label_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $chart_label_typo ) {
		$_selector = '#' . $wrapper_id . ' .title{';
		$_block_typo = $chart_label_typo;
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

	$chart_percent_typo = OhioExtraParser::VC_typo_to_CSS( $percent_typo );
	OhioExtraParser::VC_typo_custom_font( $percent_typo );

	if ( $chart_percent_typo ) {
		$_selector = '#' . $wrapper_id . ' .circle .range{';
		$_block_typo = $chart_percent_typo;
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

	$chart_color = OhioExtraParser::VC_color_to_CSS( $chart_color, '{{color}}' );
	if ( $chart_color ) {
		$_style_block .= '#' . $wrapper_id . ' .circle .progress-value{';
		$_style_block .= 'stroke:' . $chart_color . ';';
		$_style_block .= '}';
	}

	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_id . ' .circle i{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $icon_size ) && $icon_size != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .circle i{';
		$_style_block .= 'font-size:' . $icon_size . 'px;';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'circle_progress_bar__view.php' );
	return ob_get_clean();
}