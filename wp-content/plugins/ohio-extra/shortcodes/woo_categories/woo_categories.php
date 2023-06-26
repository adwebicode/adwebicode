<?php 

/**
* WPBakery Page Builder Ohio WooCoomerce categories module shortcode
*/

add_shortcode( 'ohio_woo_categories', 'ohio_woo_categories_func' );

function ohio_woo_categories_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Default values, parsing and filtering
	$layout = isset( $layout ) ? OhioExtraFilter::string( $layout, 'string', 'default' ) : 'default';
	$alignment = isset( $alignment ) ? OhioExtraFilter::string( $alignment, 'string', 'left' ) : 'left';
	$card_effect = isset( $card_effect ) ? OhioExtraFilter::string( $card_effect, 'string', 'none' ) : 'none';
	$subtitle_position = isset( $subtitle_position ) ? OhioExtraFilter::string( $subtitle_position, 'string', 'bottom' ) : 'bottom';
	$woo_categories = isset( $woo_categories ) ? OhioExtraFilter::string( $woo_categories, 'string', '' ) : '';
	$layout_columns = isset( $layout_columns ) ? OhioExtraFilter::string( $layout_columns, 'string', '1' ) : '1';
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo ) : false;
	$description_typo = isset( $description_typo ) ? OhioExtraFilter::string( $description_typo ) : false;
	$background_color = isset( $background_color ) ? OhioExtraFilter::string( $background_color ) : false;
	$row_reverse = isset( $row_reverse ) ? OhioExtraFilter::boolean( $row_reverse ) : false;
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : true;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$equal_height = isset( $equal_height ) ? OhioExtraFilter::boolean( $equal_height ) : true;
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';

	// Button
	$add_link = isset( $add_link ) ? OhioExtraFilter::boolean( $add_link ) : true;
	$button_link = OhioExtraParser::VC_link_params( ( isset( $button_link ) ) ? $button_link : '', array( 'caption' => __( 'Start Shopping', 'ohio-extra' ) ) );
	$button = isset( $button ) ? OhioExtraFilter::string( $button, 'string', false ) : false;
	$button = preg_replace( '/\&amp\;/', '&', $button );
	parse_str( $button, $button_settings );

	// Icon
	$icon_use = isset( $icon_use ) ? OhioExtraFilter::boolean( $icon_use ) : false;
	$icon_position = isset( $icon_position ) ? OhioExtraFilter::string( $icon_position, 'string', 'left' ) : 'left';
	$icon_type = isset( $icon_type ) ? OhioExtraFilter::string( $icon_type, 'string', 'font_icon' ) : 'font_icon';
	$icon_as_icon = isset( $icon_as_icon ) ? OhioExtraFilter::string( $icon_as_icon, 'string', 'ion ion-md-arrow-forward' ) : 'ion ion-md-arrow-forward';
	$icon_as_image = isset( $icon_as_image ) ? OhioExtraFilter::string( $icon_as_image, 'string', '' ) : '';
	if ( $icon_type == 'font_icon' && $icon_as_icon ) {
		$GLOBALS['ohio_icon_fonts'][] = $icon_as_icon;
	}

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

	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';
	$wrapper_classes .= $hover_effect;
	$wrapper_classes .= $content_classes;

	if ( !$equal_height ) {
		$wrapper_classes .= ' -metro';
	}

	$layout_classes = '';
	switch ( $layout ) {
		case 'default':
			$layout_classes .= ' -offset';
			break;
	}

	$drop_shadow_classes = '';
    if ( $drop_shadow ) {
        $drop_shadow_classes .= ' -contained';
        $drop_shadow_classes .= ' -with-shadow';
    }

	$layout_columns_class = '12';
	switch ($layout_columns) {
		case '1': $layout_columns_class = '12'; break;
		case '2': $layout_columns_class = '6'; break;
		case '3': $layout_columns_class = '4'; break;
		case '4': $layout_columns_class = '3'; break;
	}

	$_woo_categories = [];
	if ( !empty( $woo_categories ) ) {
		foreach ( explode(',', $woo_categories) as $category_id ) {
			if ( is_numeric( $category_id ) ) {
				$term = get_term_by( 'id', $category_id, 'product_cat' );
			} else {
				$term = get_term_by( 'slug', $category_id, 'product_cat' );
			}

			$cat = (object) [
				'title' => '',
				'description' => '',
				'url' => '',
				'image' => ''
			];
			if ( $term ) {
				$cat->title = isset($term->name) ? $term->name : '';
				$cat->description = isset($term->description) ? $term->description : '';
				$cat->url = get_term_link( $term->term_id, 'product_cat' );
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				if ( $thumbnail_id ) {
					$cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					if ( is_array( $cat->image ) ) {
						$cat->image = $cat->image[0];
					}
				} else {
					$cat->image = wc_placeholder_img_src();
				}
				if ( $cat->image ) {
					$cat->image = str_replace( ' ', '%20', $cat->image );
				}
			}
			$_woo_categories[] = $cat;
		}
	} else {
		$terms = get_terms( [
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
		] );

		if ( $terms ) {
			foreach ($terms as $term) {

				$cat = (object) array( 'title' => '', 'description' => '', 'url' => '', 'image' => '');
				$cat->title = isset($term->name) ? $term->name : '';
				$cat->description = isset($term->description) ? $term->description : '';
				$cat->url = get_term_link( $term->term_id, 'product_cat' );
				$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
				if ( $thumbnail_id ) {
					$cat->image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					if ( is_array( $cat->image ) ) {
						$cat->image = $cat->image[0];
					}
				} else {
					$cat->image = wc_placeholder_img_src();
				}
				if ( $cat->image ) { $cat->image = str_replace( ' ', '%20', $cat->image ); }
				$_woo_categories[] = $cat;
			}
		}
	}
	$woo_categories = $_woo_categories;

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$banner_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $banner_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .title{';
		$_block_typo = $banner_title_typo;
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

	$banner_subtitle_typo = OhioExtraParser::VC_typo_to_CSS( $description_typo );
	OhioExtraParser::VC_typo_custom_font( $description_typo );

	if ( $banner_subtitle_typo ) {
		$_selector = '#' . $wrapper_id . ' .subtitle{';
		$_block_typo = $banner_subtitle_typo;
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

	if ( $background_color ) {
		$_style_block .= '#' . $wrapper_id . ' .wc-category:not(.-offset) .wc-category-content{';
		$_style_block .= 'background-color:' . $background_color . ';';
		$_style_block .= '}';
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .wc-category:not(.-offset) .card,';
		$_style_block .= '#' . $wrapper_id . ' .wc-category.-offset .image-holder{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .wc-category:not(.-offset) .card.-with-shadow,';
		$_style_block .= '#' . $wrapper_id . ' .wc-category.-offset .card.-with-shadow .image-holder{';
		$_style_block .= 'box-shadow: 0px 5px 15px 0px rgba(0, 0, 0,' . $drop_shadow_intensity . '%);';
		$_style_block .= '}';
	}

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	// Button

	$button_css = OhioExtraParser::VC_button_to_css( $button_settings );
	
	if ( $button_css['css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button{';
		$_style_block .= $button_css['css'];
		$_style_block .= '}';
	}

	if ( $button_css['hover-css'] ) {
		$_style_block .= '#' . $wrapper_id . ' .button:hover{';
		$_style_block .= $button_css['hover-css'];
		$_style_block .= '}';
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'woo_categories__view.php' );
	return ob_get_clean();
}