<?php 

/**
* WPBakery Page Builder Ohio Google Maps shortcode
*/

add_shortcode( 'ohio_google_maps', 'ohio_google_maps_func' );

function ohio_google_maps_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'google-maps' );

	$default_map_marker = plugin_dir_url( __FILE__ ) . 'images/google-maps-marker.png';

	// Default values, parsing and filtering
	$marker_locations = isset( $marker_locations ) ? OhioExtraFilter::string( $marker_locations, 'string', '') : '';
	$map_height = isset( $map_height ) ? OhioExtraFilter::string( $map_height, 'string', '') : '';
	$map_zoom_enable = isset( $map_zoom_enable ) ? OhioExtraFilter::boolean( $map_zoom_enable ) : false;
	$map_street_enable = isset( $map_street_enable ) ? OhioExtraFilter::boolean( $map_street_enable ) : false;
	$map_type_enable = isset( $map_type_enable ) ? OhioExtraFilter::boolean( $map_type_enable ) : false;
	$map_fullscreen_enable = isset( $map_fullscreen_enable ) ? OhioExtraFilter::boolean( $map_fullscreen_enable ) : false;
	$map_zoom = isset( $map_zoom ) ? OhioExtraFilter::string( $map_zoom, 'string', '14') : '14';
	$map_style = isset( $map_style ) ? OhioExtraFilter::string( $map_style, 'string', 'default') : 'default';

	if ( isset( $map_marker ) ) {
		$map_marker = OhioExtraFilter::string( $map_marker, 'string', $default_map_marker );
		$map_marker = wp_get_attachment_image_src( $map_marker );
		$map_marker = $map_marker[0];
	} else {
		$map_marker = $default_map_marker;
	}

	$ohio_api_key = OhioOptions::get_global( 'google_maps_api_key', '' );

	$GLOBALS['ohio_use_map'] = true;

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

	// Map data
	if ( $map_zoom ) {
		$animation_attrs .= ' data-google-map-zoom=' . esc_attr( $map_zoom ) . '';
	}
	if ( $map_marker ) {
		$animation_attrs .= ' data-google-map-marker=' . esc_attr( $map_marker ) . '';
	}
	if ( $map_style ) {
		$animation_attrs .= ' data-google-map-style=' . esc_attr( $map_style ) . '';
	}
	if ( $map_zoom_enable ) {
		$animation_attrs .= ' data-google-map-zoom-enable=true';
	}
	if ( $map_street_enable ) {
		$animation_attrs .= ' data-google-map-steet-enable=true';
	}
	if ( $map_type_enable ) {
		$animation_attrs .= ' data-google-map-type-enable=true';
	}
	if ( $map_fullscreen_enable ) {
		$animation_attrs .= ' data-google-map-fullscreen-enable=true';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );
	$map_uniqid = uniqid();

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	/**
	* Assembling styles
	*/

	$_style_block = '';

	if ( $map_height ) {
		$_style_block .= '#' . $wrapper_id . '{';
		$_style_block .= 'height:' . $map_height . ';';
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'google_maps__view.php' );
	return ob_get_clean();
}