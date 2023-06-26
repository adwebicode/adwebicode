<?php 

/**
* WPBakery Page Builder Ohio Compare shortcode
*/

add_shortcode( 'ohio_compare', 'ohio_compare_func' );

function ohio_compare_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'compare' );

	// Default values, parsing and filtering
	$first_image = isset( $first_image ) ? OhioExtraFilter::string( $first_image ) : false;
	$first_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $first_image ), __( 'Before', 'ohio-extra' ) );
	$second_image = isset( $second_image ) ? OhioExtraFilter::string( $second_image ) : false;
	$second_image_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $second_image ), __( 'After', 'ohio-extra' ) );
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$use_label = isset( $use_label ) ? OhioExtraFilter::boolean( $use_label ) : false;
	$label_before = isset( $before_label_text ) ? OhioExtraFilter::string( $before_label_text, 'string', 'Before' ) : 'Before';
	$label_after = isset( $after_label_text ) ? OhioExtraFilter::string( $after_label_text, 'string', 'After' ) : 'After';
	$label_typo = isset( $label_typo ) ? OhioExtraFilter::string( $label_typo ) : false;
	$label_color = isset( $label_color ) ? OhioExtraFilter::string( $label_color, 'string', false ) : false;
	$handler_color = isset( $handler_color ) ? OhioExtraFilter::string( $handler_color, 'string', false ) : false;
	$position = isset( $position ) ? round(intval($position) / 100, 2) : '0.5';
	$orientation = isset( $orientation_type ) ? OhioExtraFilter::string( $orientation_type, 'string', 'horizontal' ) : 'horizontal';

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

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$label_typo = OhioExtraParser::VC_typo_to_CSS( $label_typo );
	OhioExtraParser::VC_typo_custom_font( $label_typo );

	if ( $label_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .compare-overlay .compare-before-label::before,';
		$_selector .= '#' . $wrapper_id . ' .compare-overlay .compare-after-label::before{';
		$_block_typo = $label_typo;
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
	
	$label_color = OhioExtraParser::VC_color_to_CSS( $label_color, '{{color}}' );
	if ( $label_color ) {
		$_style_block .= '#' . $wrapper_id . ' .compare-overlay .compare-before-label::before,';
		$_style_block .= '#' . $wrapper_id . ' .compare-overlay .compare-after-label::before{';
		$_style_block .= 'background:' . $label_color . ';';
		$_style_block .= '}';
	}

	$handler_color = OhioExtraParser::VC_color_to_CSS( $handler_color, '{{color}}' );
	if ( $handler_color ) {
		$_style_block .= '#' . $wrapper_id . ' .compare-handle::before,';
		$_style_block .= '#' . $wrapper_id . ' .compare-handle::after{';
		$_style_block .= 'background:' . $handler_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .compare{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-shadow .compare{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'compare__view.php' );
	return ob_get_clean();
}

