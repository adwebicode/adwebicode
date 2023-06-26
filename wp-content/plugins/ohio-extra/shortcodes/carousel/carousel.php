<?php 

/**
* WPBakery Page Builder Ohio Carousel shortcode
*/

add_shortcode( 'ohio_carousel', 'ohio_carousel_func' );

function ohio_carousel_func( $atts, $content = '' ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$loop = isset( $loop ) ? OhioExtraFilter::boolean( $loop ) : true;
	$preloader = isset( $preloader ) ? OhioExtraFilter::boolean( $preloader ) : true;
	$autoheight = isset( $autoheight ) ? OhioExtraFilter::boolean( $autoheight ) : true;
	$drag_scroll = isset( $drag_scroll ) ? OhioExtraFilter::boolean( $drag_scroll ) : true;
	$offset_items = isset( $offset_items ) ? OhioExtraFilter::boolean( $offset_items ) : false;
	$offset_size = isset( $offset_size ) ? OhioExtraFilter::string( $offset_size, 'string', '0px' ) : '0px';
	$item_desktop = isset( $item_desktop ) ? OhioExtraFilter::string( $item_desktop, 'string', '3' ) : '3';
	$item_tablet = isset( $item_tablet ) ? OhioExtraFilter::string( $item_tablet, 'string', '2' ) : '2';
	$item_mobile = isset( $item_mobile ) ? OhioExtraFilter::string( $item_mobile, 'string', '1' ) : '1';
	$gap_items = isset( $gap_items ) ? OhioExtraFilter::string( $gap_items) : true;
	$gap_size = isset( $gap_size ) ? OhioExtraFilter::string( $gap_size, 'string', '40' ) : '40';
	$pagination_show = isset( $pagination_show ) ? OhioExtraFilter::boolean( $pagination_show ) : true;
	$pagination_type = isset( $pagination_type ) ? OhioExtraFilter::string( $pagination_type, 'string', 'pagination' ) : 'pagination';
	$navigation_buttons = isset( $navigation_buttons ) ? OhioExtraFilter::boolean( $navigation_buttons ) : true;
	$position_nav_buttons = isset( $position_nav_buttons ) ? OhioExtraFilter::string( $position_nav_buttons, 'attr', 'default' )  : 'default';
	$autoplay = isset( $autoplay ) ? OhioExtraFilter::boolean( $autoplay ) : false;
	$autoplay_time = isset( $autoplay_time ) ? OhioExtraFilter::string( $autoplay_time, 'string', '5' ) : '5';
	$stop_on_hover = isset( $stop_on_hover ) ? OhioExtraFilter::boolean( $stop_on_hover ) : true;
	$nav_bg_color = isset( $nav_bg_color ) ? OhioExtraFilter::string( $nav_bg_color ) : false;
	$nav_color = isset( $nav_color ) ? OhioExtraFilter::string( $nav_color ) : false;
	$dots_color = isset( $dots_color ) ? OhioExtraFilter::string( $dots_color ) : false;
	$pagination_color = isset( $pagination_color ) ? OhioExtraFilter::string( $pagination_color ) : false;

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

	if ( $autoheight ) {
		$wrapper_classes .= ' autoheight';
	}
	
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Slider
	$slider_object = (object) array();
	$slider_object->loop = (bool) $loop;
	$slider_object->navBtn = (bool) $navigation_buttons;
	$slider_object->autoplay = (bool) $autoplay;
	$slider_object->autoplayHoverPause = (bool) $stop_on_hover;
	$slider_object->autoHeight = (bool) $autoheight;

	if ( $pagination_show ) {
		
		if ( $pagination_type == 'dots' ) {
			$slider_object->dots = true;
			
		} else if ( $pagination_type == 'pagination' ) {
			$slider_object->slidesCount = true;
			$wrapper_classes .= ' with-pagination';
		} else {
			$slider_object->pagination = true;
			$slider_object->dots = true;
			$wrapper_classes .= ' with-pagination';
		}
	}
	if ( $drag_scroll ) {
		$slider_object->drag = $drag_scroll;
	}
	if ( $gap_items ) {
		$slider_object->gap = $gap_size;
	}
	if ( $navigation_buttons ) {
		$slider_object->navContainerClass = 'slider-nav';
	}
	if ( $item_desktop ) {
		$slider_object->itemsDesktop = $item_desktop;
	}
	if ( $item_tablet ) {
		$slider_object->itemsTablet = $item_tablet;
	}
	if ( $item_mobile ) {
		$slider_object->itemsMobile = $item_mobile;
	}

	$slider_margin_css = '';
	$slider_left_css = '';
	$slider_overflow_css = '';

	if ( $offset_items ){
		$slider_margin_css .= 'margin: 0 -' . $offset_size . ';';
		$slider_overflow_css .= 'overflow: visible;';
		$slider_left_css .= 'left: ' . $offset_size  . ';';
	}

	if ( $autoplay_time ) {
		$slider_object->autoplayTimeout = $autoplay_time;
	}

	$slider_json = json_encode( $slider_object );

	if ( $offset_items ) {
		$wrapper_classes .= ' -slider-offset';
	}
	if ( $navigation_buttons == 'false' ) {
		$wrapper_classes .= ' full';
	}
	if ( !$navigation_buttons ) {
		$wrapper_classes .= ' without-nav';
	}
	if ( $navigation_buttons ) {
		if ( $position_nav_buttons == 'offset' ) {
			$wrapper_classes .= ' -nav-offset';
		} else if ( $position_nav_buttons == 'inset' ) {
			$wrapper_classes .= ' -nav-inset';
		}
	}
	if ( $preloader ) {
		$wrapper_classes .= ' with-preloader';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$dots_color = OhioExtraParser::VC_color_to_CSS( $dots_color, '{{color}}' );
	if ( $dots_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-dot{';
		$_style_block .= 'color:' . $dots_color . ';';
		$_style_block .= '}';
	}

	$pagination_color = OhioExtraParser::VC_color_to_CSS( $pagination_color, '{{color}}' );
	if ( $pagination_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-count{';
		$_style_block .= 'color:' . $pagination_color . ';';
		$_style_block .= '}';
	}

	$nav_color = OhioExtraParser::VC_color_to_CSS( $nav_color, '{{color}}' );
	if ( $nav_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-nav-btn{';
		$_style_block .= 'color:' . $nav_color . ';';
		$_style_block .= '}';
	}

	$nav_bg_color = OhioExtraParser::VC_color_to_CSS( $nav_bg_color, '{{color}}' );
	if ( $nav_bg_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-nav-btn .icon-button{';
		$_style_block .= 'background-color:' . $nav_bg_color . ';';
		$_style_block .= '}';
	}

	if ($offset_items) {
		$_style_block .= '#' . $wrapper_id . ' > .clb-slider-outer-stage{';
		$_style_block .= $slider_margin_css;
		$_style_block .= '}';

		$_style_block .= '#' . $wrapper_id . ' > .clb-slider-outer-stage > .clb-slider-stage{';
		$_style_block .= $slider_left_css;
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'carousel__view.php' );
	return ob_get_clean();
}