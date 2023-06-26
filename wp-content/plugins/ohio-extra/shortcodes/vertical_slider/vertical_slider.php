<?php 

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode
*/

add_shortcode( 'ohio_vertical_slider', 'ohio_vertical_slider_func' );

function ohio_vertical_slider_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$mousewheel_scrolling = isset( $mousewheel_scrolling ) ? OhioExtraFilter::boolean( $mousewheel_scrolling, true ) : true;
	$drag_scrolling = isset( $drag_scrolling ) ? OhioExtraFilter::boolean( $drag_scrolling, true ) : true;
	$loop = isset( $loop ) ? OhioExtraFilter::boolean( $loop, true ) : true;
	$navigation_show = isset( $navigation_show ) ? OhioExtraFilter::boolean( $navigation_show, true ) : true;
	$navigation_color = isset( $navigation_color ) ? OhioExtraFilter::string( $navigation_color, 'string', false ) : false;
	$navigation_bg_color = isset( $navigation_bg_color ) ? OhioExtraFilter::string( $navigation_bg_color, 'string', false ) : false;
	$pagination_color = isset( $pagination_color ) ? OhioExtraFilter::string( $pagination_color, 'string', false ) : false;
	$pagination_type = isset( $pagination_type ) ? OhioExtraFilter::string( $pagination_type, 'string', 'bullets' ) : 'bullets';
	$pagination_show = isset( $pagination_show ) ? OhioExtraFilter::boolean( $pagination_show, true ) : true;
	$fullscreen_mode = isset( $fullscreen_mode ) ? OhioExtraFilter::boolean( $fullscreen_mode, true ) : true;
	$autoplay_mode = isset( $autoplay_mode ) ? OhioExtraFilter::boolean( $autoplay_mode, true ) : true;
	$autoplay_timeout = isset( $autoplay_timeout ) ? OhioExtraFilter::string( $autoplay_timeout, 'string', '5000' ) : '';
	$scroll_type = isset( $scroll_type ) ? OhioExtraFilter::boolean( $scroll_type, false ) : false;
	$animation_duration = isset( $animation_duration ) ? OhioExtraFilter::string( $animation_duration, 'string', 'default' ) : 'default';
	$appearance_once = isset( $appearance_once ) ? OhioExtraFilter::boolean( $appearance_once ) : true;

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );

	// Wrapper classes
	$wrapper_classes = '';
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	if ( $fullscreen_mode ) {
		$wrapper_classes .= ' -full-vh';
	}

	// Slider data
	$onepage_object = (object) array();
	$onepage_object->loop = (bool) $loop;
	$onepage_object->navBtn = (bool) $navigation_show;
	$onepage_object->mousewheel = $mousewheel_scrolling;
	$onepage_object->drag = $drag_scrolling;
	$onepage_object->scrollToSlider = $mousewheel_scrolling;
	$onepage_object->autoplay = (bool) $autoplay_mode;
	$onepage_object->autoplayTimeout = $autoplay_timeout;
	$onepage_object->verticalScroll = $scroll_type;

	if ($pagination_show) {
		if ($pagination_type == 'bullets') {
			$onepage_object->dots = true;
		} elseif ($pagination_type == 'numbers') {
			$onepage_object->pagination = true;
		}
	}
	$onepage_json = json_encode( $onepage_object );

	/**
	* Assembling styles
	*/

	$_style_block = '';

	if ( $pagination_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-pagination{';
		$_style_block .= 'color:' . $pagination_color . ';';
		$_style_block .= '}';
	}

	if ( $navigation_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-nav-btn{';
		$_style_block .= 'color:' . $navigation_color . ';';
		$_style_block .= '}';
	}

	if ( $navigation_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-nav-btn .icon-button{';
		$_style_block .= 'background-color:' . $navigation_bg_color . ';';
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'vertical_slider__view.php' );
	return ob_get_clean();
}