<?php 

/**
* WPBakery Page Builder Ohio Accordion Inner shortcode
*/

add_shortcode( 'ohio_horizontal_accordion_inner', 'ohio_horizontal_accordion_inner_func' );

function ohio_horizontal_accordion_inner_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Handling
	$content_html = wpautop( $content_html );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'horizontal_accordion_inner__view.php' );
	return ob_get_clean();
}