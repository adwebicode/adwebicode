<?php 

/**
* WPBakery Page Builder Ohio Dynamic text shortcode
*/

add_shortcode( 'ohio_dynamic_text', 'ohio_dynamic_text_func' );

function ohio_dynamic_text_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'typed' );

	$pre_title = isset( $pre_title ) ? OhioExtraFilter::string( $pre_title ) : '';
	$post_title = isset( $post_title ) ? OhioExtraFilter::string( $post_title ) : '';
	$dynamic_title = isset( $dynamic_title ) ? json_decode( urldecode( $dynamic_title ) ) : array();
	$_dynamic_title = array();
	foreach ( $dynamic_title as $title ) {
		$_dynamic_title[] = $title->dynamic_part;
	}
	$dynamic_title = $_dynamic_title;
	$loop = ( isset( $loop ) ) ? OhioExtraFilter::boolean( $loop ) : true;
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'attr', 'left' ) : 'left';
	$type_speed = isset( $type_speed ) ? OhioExtraFilter::string( $type_speed, 'attr', 'slow' ) : 'slow';
	$static_typo = isset( $static_typo ) ? OhioExtraFilter::string( $static_typo ) : false;
	$dynamic_typo = isset( $dynamic_typo ) ? OhioExtraFilter::string( $dynamic_typo ) : false;

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
	$animation_attrs .= ' data-dynamic-text=true';

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';

	$content_classes = '';
	switch ( $alignment ) {
		case 'center':
			$content_classes .= ' -center';
			break;
		case 'right':
			$content_classes .= ' -right';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $content_classes;

	switch ( $type_speed ) {
		case 'slow':
			$type_speed = array(
				'type' => 140,
				'delay' => 5000,
				'back' => 35
			);
			break;
		case 'normal':
			$type_speed = array(
				'type' => 70,
				'delay' => 2500,
				'back' => 25
			);
			break;
		case 'fast':
			$type_speed = array(
				'type' => 40,
				'delay' => 2400,
				'back' => 20
			);
			break;
		case 'very_fast':
		default:
			$type_speed = array(
				'type' => 20,
				'delay' => 1600,
				'back' => 15
			);
			break;
	}

	$options = (object) array();
	$options->strings = $dynamic_title;
	$options->typeSpeed = $type_speed['type'];
	$options->backDelay = $type_speed['delay'];
	$options->backSpeed = $type_speed['back'];
	$options->loop = $loop;
	$options_json = json_encode( $options );

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$static_title_typo = OhioExtraParser::VC_typo_to_CSS( $static_typo );
	OhioExtraParser::VC_typo_custom_font( $static_typo );

	if ( $static_title_typo ) {
		$_selector = '#' . $wrapper_id . '.dynamic-text{';
		$_block_typo = $static_title_typo;
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

	$dynamic_title_typo = OhioExtraParser::VC_typo_to_CSS( $dynamic_typo );
	OhioExtraParser::VC_typo_custom_font( $dynamic_typo );

	if ( $dynamic_title_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . '.dynamic-text .dynamic,';
		$_selector .= '#' . $wrapper_id . '.dynamic-text .typed-cursor{';
		$_block_typo = $dynamic_title_typo;
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

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'dynamic_text__view.php' );
	return ob_get_clean();
}