<?php 

/**
* WPBakery Page Builder Ohio Vertical Slider Page shortcode
*/

add_shortcode( 'ohio_vertical_slider_inner', 'ohio_vertical_slider_inner_func' );

function ohio_vertical_slider_inner_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$side_paddings = isset( $side_paddings ) ? OhioExtraFilter::string( $side_paddings, 'attr', false ) : false;
	$pagination_color = isset( $pagination_color ) ? OhioExtraFilter::string( $pagination_color, 'string', '') : '';
	$header_nav_color = isset( $header_nav_color ) ? OhioExtraFilter::string( $header_nav_color, 'string', '') : '';
	$header_logo_type = isset( $header_logo_type ) ? OhioExtraFilter::string( $header_logo_type, 'string', '') : '';
	$social_networks_color = isset( $social_networks_color ) ? OhioExtraFilter::string( $social_networks_color, 'string', '') : '';
	$search_color = isset( $search_color ) ? OhioExtraFilter::string( $search_color, 'string', '') : '';
	$scroll_to_top_color = isset( $scroll_to_top_color ) ? OhioExtraFilter::string( $scroll_to_top_color, 'string', '') : '';
	$bg_color = isset( $bg_color ) ? OhioExtraFilter::string( $bg_color, 'string', '') : '';
	$bg_image = isset( $bg_image ) ? OhioExtraFilter::string( $bg_image, 'string', '') : '';
	$bg_size = isset( $bg_size ) ? OhioExtraFilter::string( $bg_size, 'string', 'cover') : 'cover';

	// Customization
	$slider_attrs = '';
	if ( $social_networks_color ) {
		$slider_attrs .= ' data-social-networks-color=' . esc_attr( $social_networks_color ) . '';
	}
	if ( $pagination_color ) {
		$slider_attrs .= ' data-pagination-color=' . esc_attr( $pagination_color ) . '';
	}
	if ( $header_nav_color ) {
		$slider_attrs .= ' data-header-nav-color=' . esc_attr( $header_nav_color ) . '';
	}
	if ( $search_color ) {
		$slider_attrs .= ' data-search-color=' . esc_attr( $search_color ) . '';
	}
	if ( $scroll_to_top_color ) {
		$slider_attrs .= ' data-scroll-to-top-color=' . esc_attr( $scroll_to_top_color ) . '';
	}
	if ( ( $header_logo_type != 'none' ) ) {
		$slider_attrs .= ' data-header-logo-type=' . esc_attr( $header_logo_type ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	$bg_css = '';
	if ( $bg_color ) {
		$bg_css .= 'background-color:' . $bg_color . ';';
	}
	
	if ( $bg_image ) {
		$bg_image = wp_get_attachment_image_src( $bg_image, 'full' );
		if ( is_array( $bg_image ) ) {
			$bg_image = $bg_image[0];
		}
		$bg_css .= 'background-image:url(\'' . $bg_image . '\');';
		switch ( $bg_size ) {
			case 'contain':
				$bg_css .= 'background-size:contain;';
				break;
			case 'no-repeat':
				$bg_css .= 'background-repeat:no-repeat;';
				break;
			case 'repeat':
				$bg_css .= 'background-repeat:repeat;';
				break;
			case 'cover':
			default:
				$bg_css .= 'background-size:cover;';
				break;
		}
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	if ( $side_paddings ) {
		$_style_block .= '@media screen and (min-width: 1180px){';
		$_style_block .= '#' . $wrapper_id . '{';
		$_style_block .= 'padding-left:' . $side_paddings . ';';
		$_style_block .= 'padding-right:' . $side_paddings . ';';
		$_style_block .= '}}';
	}

	if ( $bg_css ) {
		$_style_block .= '#' . $wrapper_id . '{';
		$_style_block .= $bg_css;
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'vertical_slider_inner__view.php' );
	return ob_get_clean();
}