<?php 

/**
* WPBakery Page Builder Ohio Paralax shortcode
*/

add_shortcode( 'ohio_parallax', 'ohio_parallax_func' );

function ohio_parallax_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$image = isset( $image ) ? OhioExtraFilter::string( wp_get_attachment_url( OhioExtraFilter::string( $image ) ), 'attr' ) : false;
	$size = isset( $size ) ? OhioExtraFilter::string( $size, 'string', '' ) : '';
	$parallax = isset( $parallax ) ? OhioExtraFilter::string( $parallax, 'string', 'vertical' ) : 'vertical';
	$parallax_speed = isset( $parallax_speed ) ? OhioExtraFilter::string( $parallax_speed, 'attr', '1.0' )  : '1.0';
	$use_overlay = isset( $use_overlay ) ? OhioExtraFilter::boolean( $use_overlay ) : false;
	$overlay_color = isset( $overlay_color ) ? OhioExtraFilter::string( $overlay_color ) : false;

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

	// Parallax data
	if ( $parallax ) {
		$animation_attrs .= ' data-parallax-bg=' . esc_attr( $parallax ) . '';
	}
	if ( $parallax_speed ) {
		$animation_attrs .= ' data-parallax-speed=' . esc_attr( $parallax_speed ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$parallax_css = '';
	$parallax_css .= ( $image ) ? 'background-image:url(\'' . esc_url( $image ) . '\');' : '';
	$parallax_css .= ( $size ) ? 'background-size:' . esc_attr( $size ) . ';' : '';

	if ( $parallax_css ) {
		$_style_block .= '#' . $wrapper_id . ' .parallax-bg{';
		$_style_block .= $parallax_css;
		$_style_block .= '}';
	}

	if ( $use_overlay && $overlay_color ) {
		if ( $overlay_color ) {
			$_style_block .= '#' . $wrapper_id . ':after{';
			$_style_block .= 'background-color:' . $overlay_color . ';';
			$_style_block .= '}';
		}
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'parallax__view.php' );
	return ob_get_clean();
}