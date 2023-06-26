<?php

/**
* WPBakery Page Builder Ohio Cliens logo box shortcode
*/

add_shortcode( 'ohio_clients_logo', 'ohio_clients_logo_func' );

function ohio_clients_logo_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'left' ) : 'left';

	// Border radius
	$clients_logo_width = isset( $clients_logo_width ) ? OhioExtraFilter::string( $clients_logo_width, 'string', '130') : '130';
	$link = isset( $link ) ? OhioExtraFilter::boolean( $link ) : true;
	$link_url = OhioExtraParser::VC_link_params( ( isset( $link_url ) ? $link_url : '' ), array( 'caption' => esc_html__( 'Read More', 'ohio-extra' ) ) );
	$title = ( isset( $title ) ) ? OhioExtraFilter::string( $title ) : false;
	$description = isset( $description ) ? rawurldecode( base64_decode( $description ) ) : '';
	$description = OhioExtraFilter::string( $description, 'textarea', '' );
	$description_typo = ( isset( $description_typo ) ) ? OhioExtraFilter::string( $description_typo ) : false;
	$image_logo = ( isset( $image_logo ) ) ? OhioExtraFilter::string( $image_logo ) : false;
	$image_logo_atts = OhioExtraParser::generateImageAttsById( OhioExtraFilter::string( $image_logo ), $title );
	$image_logo = ( !empty( $image_logo ) ) ? OhioExtraFilter::string( wp_get_attachment_url( $image_logo ), 'attr' ) : false;

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

	$content_classes = '';
	switch ( $alignment ) {
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

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $content_classes;

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$logo_description_typo = OhioExtraParser::VC_typo_to_CSS( $description_typo );
	OhioExtraParser::VC_typo_custom_font( $description_typo );

	if ( $logo_description_typo ) {
		$_selector = '#' . $wrapper_id . ' .logo-details{';
		$_block_typo = $logo_description_typo;
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

	if ( $clients_logo_width ) {
		$_style_block .= '#' . $wrapper_id . '.logo img{';
		$_style_block .= 'width:' . $clients_logo_width . 'px';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'clients_logo__view.php' );
	return ob_get_clean();
}
