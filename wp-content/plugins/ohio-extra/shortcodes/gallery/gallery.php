<?php 

/**
* WPBakery Page Builder Ohio Gallery shortcode
*/

add_shortcode( 'ohio_gallery', 'ohio_gallery_func' );

function ohio_gallery_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	$masonry_grid = isset( $masonry_grid ) ? OhioExtraFilter::boolean( $masonry_grid ) : true;
	if ( $masonry_grid ) {
		OhioHelper::add_required_script( 'masonry' );
	}

	// Shortcode for faster pagination
	$sc64 = OhioExtraParser::shortcodeInBase64( 'ohio_gallery' , $atts );

	// Default values, parsing and filtering
	$gallery = isset( $content_images ) ? OhioExtraFilter::string( $content_images, 'string', '' ) : '';
	$gallery_grid = isset( $gallery_grid ) ? OhioExtraFilter::string( $gallery_grid , 'string', 'default' ) : 'default';
	$hide_overlay = isset( $hide_overlay ) ? OhioExtraFilter::boolean( $hide_overlay ) : false;
	$show_title = isset( $show_title ) ? OhioExtraFilter::boolean( $show_title ) : true;
	$gap = isset( $gap ) ? OhioExtraFilter::string( $gap, 'string', '20' ) : '20';
	$gap = intval( str_replace( 'px', '', $gap ) ); // Old values compatibility
	$columns = isset( $columns ) ? OhioExtraFilter::string( $columns, 'attr', '2-2-1' ) : '2-2-1';
	$use_pagination = isset( $use_pagination ) ? OhioExtraFilter::boolean( $use_pagination ) : false;
	$pagination_type = isset( $pagination_type ) ? OhioExtraFilter::string( $pagination_type, 'attr', 'simple' ) : 'simple';
	$pagination_items_per_page = isset( $pagination_items_per_page ) ? OhioExtraFilter::string( $pagination_items_per_page, 'string', '6' ) : '6';
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$overlay_color = isset( $overlay_color ) ? OhioExtraFilter::string( $overlay_color ) : false;
	$gallery_title_typo = isset( $gallery_title_typo ) ? OhioExtraFilter::string( $gallery_title_typo ) : false;
	$gallery_caption_typo = isset( $gallery_caption_typo ) ? OhioExtraFilter::string( $gallery_caption_typo ) : false;
	$gallery_bg_color = isset( $gallery_bg_color ) ? OhioExtraFilter::string( $gallery_bg_color ) : false;
	$icon_color = isset( $icon_color ) ? OhioExtraFilter::string( $icon_color ) : false;
	$gallery_buttons_color = isset( $gallery_buttons_color ) ? OhioExtraFilter::string( $gallery_buttons_color ) : false;
	$pagination_color = isset( $pagination_color ) ? OhioExtraFilter::string( $pagination_color ) : false;
	$pagination_active_color = isset( $pagination_active_color ) ? OhioExtraFilter::string( $pagination_active_color ) : false;
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$card_effect = isset( $card_effect ) ? OhioExtraFilter::string( $card_effect, 'string', 'none' ) : 'none';
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'left' ) : 'left';
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : true;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$metro_style = isset( $metro_style ) ? OhioExtraFilter::boolean( $metro_style ) : true;

	// Pagination
	$pagination_style = isset( $pagination_style ) ? OhioExtraFilter::string( $pagination_style, 'string', '' ) : '';
	$pagination_size = isset( $pagination_size ) ? OhioExtraFilter::string( $pagination_size, 'string', '' ) : '';
	$pagination_position = isset( $pagination_position ) ? OhioExtraFilter::string( $pagination_position, 'string', '' ) : '';
	
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

	// Gallery data
	$wrapper_gallery_id = uniqid( 'ohio-custom-' );

	if ( $wrapper_gallery_id ) {
		$animation_attrs .= ' data-gallery=' . esc_attr( $wrapper_gallery_id ) . '';
	}

	// Tilt effect
	$tilt_attrs = '';
	if ( !$tilt_effect ) {
		$tilt_attrs .= ' data-tilt=true data-tilt-perspective=6000';
	}

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

	$layout_classes = '';
	switch ( $gallery_grid ) {
		case 'minimal':
			$layout_classes .= ' -with-overlay';
			break;
	}

	$hover_effect = '';
	switch ( $card_effect ) {
		case 'scale':
			$hover_effect .= ' -img-scale';
			break;
		case 'overlay':
			$hover_effect .= ' -img-overlay';
			break;
		case 'greyscale':
			$hover_effect .= ' -img-greyscale';
			break;
	}

	$grid_classes = '';

	$grid_classes .= $layout_classes;
	$grid_classes .= $hover_effect;

	// Drop shadow
	if ( $drop_shadow ) {
		$grid_classes .= ' -with-shadow';
	}

	if ( !$metro_style ) {
		$grid_classes .= ' -metro';
	}

	$gallery = explode( ',', $gallery );
	$_gallery = array();
	foreach ($gallery as $media_id) {
		$_image = wp_prepare_attachment_for_js( $media_id );
		$_gallery[] = array(
			'url' => $_image['url'],
			'full' => $_image['url'],
			'title' => $_image['title'],
			'caption' => $_image['caption'],
			'alt' => get_post_meta( $media_id, '_wp_attachment_image_alt', true)
		);
	}

	$gallery = $_gallery;

	$column_class = OhioExtraParser::VC_columns_to_CSS( $columns );

	$gallery_object = (object) array();
	$gallery_json = json_encode( $gallery_object );


	/**
	* Pagination settings
	*/

	$additional_classes = [];
	if ( in_array( $pagination_style, [ 'outlined', 'flat' ], true ) ) {
		$additional_classes[] = '-' . $pagination_style;
	}
	if ( in_array( $pagination_size, [ 'large', 'small' ], true ) ) {
		$additional_classes[] = '-' . $pagination_size;
	}
	if ( in_array( $pagination_position, [ 'center', 'right' ], true ) ) {
		$additional_classes[] = '-' . $pagination_position . '-flex';
	}

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$gallery_grid_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $gallery_grid_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .gallery-item .title{';
		$_block_typo = $gallery_grid_title_typo;
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

	$overlay_title_typo = OhioExtraParser::VC_typo_to_CSS( $gallery_title_typo );
	OhioExtraParser::VC_typo_custom_font( $gallery_title_typo );

	if ( $overlay_title_typo ) {
		$_selector = '#' . $wrapper_gallery_id . '.clb-gallery-lightbox .title{';
		$_block_typo = $overlay_title_typo;
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

	$overlay_caption_typo = OhioExtraParser::VC_typo_to_CSS( $gallery_caption_typo );
	if ( $overlay_caption_typo ) {
		$_selector = '#' . $wrapper_gallery_id . '.clb-gallery-lightbox .caption{';
		$_block_typo = $overlay_caption_typo;
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

	$overlay_color = OhioExtraParser::VC_color_to_CSS( $overlay_color, '{{color}}' );
	if ( $overlay_color ) {

		if ( $gallery_grid == 'minimal' ) {
			$_style_block .= '#' . $wrapper_id . ' .gallery-item.-with-overlay .overlay-details{';
			$_style_block .= 'background:linear-gradient(rgba(0, 0, 0, 0), ' . $overlay_color . ');';
			$_style_block .= '}';
		}

		$_style_block .= '#' . $wrapper_id . ' .gallery-item.-img-overlay .image-holder::after{';
		$_style_block .= 'background:' . $overlay_color . ';';
		$_style_block .= '}';
	}

	$gallery_bg_color = OhioExtraParser::VC_color_to_CSS( $gallery_bg_color, '{{color}}' );
	if ( $gallery_bg_color ) {
		$_style_block .= '#' . $wrapper_gallery_id . '.clb-gallery-lightbox{';
		$_style_block .= 'background-color:' . $gallery_bg_color . ';';
		$_style_block .= '}';
	}

	$icon_color = OhioExtraParser::VC_color_to_CSS( $icon_color, '{{color}}' );
	if ( $icon_color ) {
		$_style_block .= '#' . $wrapper_gallery_id . '.clb-gallery-lightbox .icon-button .icon{';
		$_style_block .= 'color:' . $icon_color . ';';
		$_style_block .= '}';
	}

	$gallery_buttons_color = OhioExtraParser::VC_color_to_CSS( $gallery_buttons_color, '{{color}}' );
	if ( $gallery_buttons_color ) {
		$_style_block .= '#' . $wrapper_gallery_id . '.clb-gallery-lightbox .icon-button{';
		$_style_block .= 'background-color:' . $gallery_buttons_color . ';';
		$_style_block .= '}';
	}

	if ( $gap ) {
		$_style_block .= '#' . $wrapper_id . ' .gallery-item{';
		$_style_block .= 'padding:' . $gap . 'px;';
		$_style_block .= '}';

		$_style_block .= '#' . $wrapper_id . '.clb-gallery{';
		$_style_block .= 'margin-top:-' . $gap . 'px;';
		$_style_block .= 'margin-bottom:-' . $gap . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .card:not(.-contained) .image-holder{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . '.-with-shadow .image-holder{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	// Pagination
	$pagination_color = OhioExtraParser::VC_color_to_CSS( $pagination_color, '{{color}}' );
	if ( $pagination_color ) {

		if ( $pagination_style == 'default' ) {
			$_style_block .= '#' . $wrapper_id . ' .lazy-load .button,';
			$_style_block .= '#' . $wrapper_id . ' .pagination .page-link:not(.-flat){';
			$_style_block .= 'background-color:' . $pagination_color . ';';
		} else {
			$_style_block .= '#' . $wrapper_id . ' .lazy-load .button,';
			$_style_block .= '#' . $wrapper_id . ' .pagination .page-link{';
			$_style_block .= 'color:' . $pagination_color . ';';
		}
		$_style_block .= '}';
	}

	$pagination_active_color = OhioExtraParser::VC_color_to_CSS( $pagination_active_color, '{{color}}' );
	if ( $pagination_active_color ) {

		if ( $pagination_style == 'default' ) {
			$_style_block .= '#' . $wrapper_id . ' .lazy-load .button:hover,';
			$_style_block .= '#' . $wrapper_id . ' .pagination .page-link:not(.-flat):hover{';
			$_style_block .= 'background-color:' . $pagination_active_color . ';';
		} else {
			$_style_block .= '#' . $wrapper_id . ' .lazy-load .button:hover,';
			$_style_block .= '#' . $wrapper_id . ' .pagination .page-link:hover{';
			$_style_block .= 'color:' . $pagination_active_color . ';';
		}
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'gallery__view.php' );
	return ob_get_clean();
}