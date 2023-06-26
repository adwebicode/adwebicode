<?php 

/**
* WPBakery Page Builder Ohio Testimonial shortcode
*/

add_shortcode( 'ohio_testimonial', 'ohio_testimonial_func' );

function ohio_testimonial_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$block_type_layout = ( isset( $block_type_layout ) ) ? OhioExtraFilter::string( $block_type_layout, 'string', 'default' ) : 'default';
	$block_alignment = isset( $block_alignment ) ? OhioExtraFilter::string( $block_alignment, 'string', 'left' ) : 'left';
	$avatar_size = isset( $avatar_size ) ? OhioExtraFilter::string( $avatar_size, 'string', 'default' ) : 'default';
	$quote = isset( $quote ) ? OhioExtraFilter::string( $quote, 'textarea', '' ) : '';
	$headline = isset( $headline ) ? OhioExtraFilter::string( $headline, 'textarea', '' ) : '';
	$author = isset( $author ) ? OhioExtraFilter::string( $author, 'string', '' ) : '';
	$position = isset( $position ) ? OhioExtraFilter::string( $position, 'string', '' ) : '';
	$photo = isset( $photo ) ? OhioExtraFilter::string( wp_get_attachment_url( OhioExtraFilter::string( $photo ) ), 'attr' ) : false;
	$quote_typo = isset( $quote_typo ) ? OhioExtraFilter::string( $quote_typo ) : false;
	$headline_typo = isset( $headline_typo ) ? OhioExtraFilter::string( $headline_typo ) : false;
	$author_typo = isset( $author_typo ) ? OhioExtraFilter::string( $author_typo ) : false;
	$position_typo = isset( $position_typo ) ? OhioExtraFilter::string( $position_typo ) : false;

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
	switch ( $block_alignment ) {
		case 'left':
			$content_classes .= ' -left -left-flex';
			break;
		case 'center':
			$content_classes .= ' -center -center-flex';
			break;
		case 'right':
			$content_classes .= ' -right -right-flex';
			break;
	}

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $content_classes;

	if ( $block_type_layout == 'photo_middle' ) {
		$wrapper_classes .= ' -middle-avatar';
	}

	// Avatar sizes
	$size_classes = '';
	switch ( $avatar_size ) {
		case 'small':
			$size_classes .= ' -small';
			break;
		case 'large':
			$size_classes .= ' -large';
			break;
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$quote_headline_typo = OhioExtraParser::VC_typo_to_CSS( $headline_typo );
	OhioExtraParser::VC_typo_custom_font( $headline_typo );

	if ( $quote_headline_typo ) {
		$_selector = '#' . $wrapper_id . ' .testimonial-headline{';
		$_block_typo = $quote_headline_typo;
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

	$quote_text_typo = OhioExtraParser::VC_typo_to_CSS( $quote_typo );
	OhioExtraParser::VC_typo_custom_font( $quote_typo );

	if ( $quote_text_typo ) {
		$_selector = '#' . $wrapper_id . '.testimonial > p{';
		$_block_typo = $quote_text_typo;
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

	$quote_author_typo = OhioExtraParser::VC_typo_to_CSS( $author_typo );
	OhioExtraParser::VC_typo_custom_font( $author_typo );

	if ( $quote_author_typo ) {
		$_selector = '#' . $wrapper_id . ' .author .title{';
		$_block_typo = $quote_author_typo;
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

	$quote_details_typo = OhioExtraParser::VC_typo_to_CSS( $position_typo );
	OhioExtraParser::VC_typo_custom_font( $position_typo );

	if ( $quote_details_typo ) {
		$_selector = '#' . $wrapper_id . ' .author-details{';
		$_block_typo = $quote_details_typo;
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
	include( plugin_dir_path( __FILE__ ) . 'testimonial__view.php' );
	return ob_get_clean();
}