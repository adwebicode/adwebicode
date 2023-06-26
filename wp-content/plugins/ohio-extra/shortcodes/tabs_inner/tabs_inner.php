<?php 

/**
* WPBakery Page Builder Ohio Tabs Inner shortcode
*/

add_shortcode( 'ohio_tabs_inner', 'ohio_tabs_inner_func' );

function ohio_tabs_inner_func( $atts, $content_html = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$title = isset( $title ) ? OhioExtraFilter::string( $title, 'string', '' ) : '';

	// Icon
	$with_icon = isset( $with_icon ) ? OhioExtraFilter::boolean( $with_icon ) : false;
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'attr' ) : false;
	if ( $with_icon && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}
	
	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'tabs_inner__view.php' );
	return ob_get_clean();
}