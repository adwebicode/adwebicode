<?php 

/**
* WPBakery Page Builder Ohio Recent Posts shortcode
*/

add_shortcode( 'ohio_recent_posts', 'ohio_recent_posts_func' );

function ohio_recent_posts_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	$masonry_grid = isset( $masonry_grid ) ? OhioExtraFilter::boolean( $masonry_grid ) : false;
	if ( $masonry_grid ) {
		OhioHelper::add_required_script( 'masonry' );
	}

	// Shortcode for faster pagination
	$sc64 = OhioExtraParser::shortcodeInBase64( 'ohio_recent_posts' , $atts );

	// Default values, parsing and filtering
	$post_category = isset( $post_category ) ? OhioExtraFilter::string( $post_category, 'string', 'all' ) : 'all';
	$card_layout = isset( $card_layout ) ? OhioExtraFilter::string( $card_layout, 'string', 'classic' ) : 'classic';
	$card_effect = isset( $card_effect ) ? OhioExtraFilter::string( $card_effect, 'string', 'none' ) : 'none';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$metro_style = isset( $metro_style ) ? OhioExtraFilter::boolean( $metro_style ) : true;
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : false;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$blog_images_size = isset( $blog_images_size ) ? OhioExtraFilter::string( $blog_images_size, 'string', 'medium' ) : 'medium';

	if ( !$blog_images_size || $blog_images_size == 'inherit' ) {
		$blog_images_size = OhioOptions::get_global( 'blog_images_size' );
	}

	$asymmetric_parallax = isset( $asymmetric_parallax ) ? OhioExtraFilter::boolean( $asymmetric_parallax ) : true;
	$asymmetric_parallax_speed = isset( $asymmetric_parallax_speed ) ? OhioExtraFilter::string( $asymmetric_parallax_speed, 'int', 20 ) :20;
	$columns_in_row = isset( $columns_in_row ) ? OhioExtraFilter::string( $columns_in_row, 'string', '2-2-1' ) : '2-2-1';
	$posts_in_block = isset( $posts_in_block ) ? OhioExtraFilter::string( $posts_in_block, 'string', 12 ) : 12;
	$card_boxed = isset( $card_boxed ) ? OhioExtraFilter::boolean( $card_boxed ) : false;
	$short_description = isset( $short_description ) ? OhioExtraFilter::boolean( $short_description ) : false;
	$show_read_more = isset( $show_read_more ) ? OhioExtraFilter::boolean( $show_read_more ) : false;
	$card_gap = isset( $card_gap ) ? OhioExtraFilter::string( $card_gap, 'string', '20px' ) : '20px';
	$heading_typo = isset( $heading_typo ) ? OhioExtraFilter::string( $heading_typo, 'string', '' ) : '';
	$author_typo = isset( $author_typo ) ? OhioExtraFilter::string( $author_typo, 'string', '' ) : '';
	$date_typo = isset( $date_typo ) ? OhioExtraFilter::string( $date_typo, 'string', '' ) : '';
	$category_typo = isset( $category_typo ) ? OhioExtraFilter::string( $category_typo, 'string', '' ) : '';
	$excerpt_typo = isset( $excerpt_typo ) ? OhioExtraFilter::string( $excerpt_typo, 'string', '' ) : '';
	$read_more_typo = isset( $read_more_typo ) ? OhioExtraFilter::string( $read_more_typo, 'string', '' ) : '';
	$reading_time_typo = isset( $reading_time_typo ) ? OhioExtraFilter::string( $reading_time_typo, 'string', '' ) : '';
	$card_background_color = isset( $card_background_color ) ? OhioExtraFilter::string( $card_background_color, 'string', false ) : false;
	$overlay_color = isset( $overlay_color ) ? OhioExtraFilter::string( $overlay_color, 'string', false ) : false;
	$animation_type = isset( $animation_type ) ? OhioExtraFilter::string( $animation_type, 'string', 'default' ) : 'default';
	$animation_effect = isset( $animation_effect ) ? OhioExtraFilter::string( $animation_effect, 'string', 'fade-up' ) : 'fade-up';

	// Pagination
	$use_pagination = isset( $use_pagination ) ? OhioExtraFilter::boolean( $use_pagination ) : false;
	$pagination_items_per_page = isset( $pagination_items_per_page ) ? OhioExtraFilter::string( $pagination_items_per_page, 'string', '6' ) : '6';
	$pagination_type = isset( $pagination_type ) ? OhioExtraFilter::string( $pagination_type, 'attr', 'standard' ) : 'standard';
	$pagination_style = isset( $pagination_style ) ? OhioExtraFilter::string( $pagination_style, 'string', '' ) : '';
	$pagination_size = isset( $pagination_size ) ? OhioExtraFilter::string( $pagination_size, 'string', '' ) : '';
	$pagination_position = isset( $pagination_position ) ? OhioExtraFilter::string( $pagination_position, 'string', 'left' ) : 'left';
	$pagination_color = isset( $pagination_color ) ? OhioExtraFilter::string( $pagination_color ) : false;
	$pagination_active_color = isset( $pagination_active_color ) ? OhioExtraFilter::string( $pagination_active_color ) : false;

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
	if ( $appearance_effect != 'none' || $animation_type !='default' ) {
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
	$wrapper_classes .= isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '';

	// Drop shadow
	if ( $drop_shadow ) {
		$wrapper_classes .= ' -with-shadow';
	}

	if ( $masonry_grid ) {
		$wrapper_classes .= ' ohio-masonry';
	}

	$column_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row );
	$column_double_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row, true );

	$column_asymmetric_grid = $columns_in_row;

	$columns_in_row = explode( '-', $columns_in_row );
	if ( is_array( $columns_in_row ) ) {
		$columns_in_row = intval( $columns_in_row[0] );
	}

	// Categories
	if ( $post_category != 'all' ) {
		$_post_category = $post_category;
		$post_category = array();
		foreach ( explode( ',', $_post_category) as $category) {
			$category = trim( $category );
			if ( is_numeric( $category ) ) {
				$category = intval( $category );
			}
			$post_category[] = $category;
		}

		if ( empty( $post_category ) ) $post_category = 'all';
	}

	$_tax_query = array();
	if ( $post_category != 'all' ) {
		$_tax_query = [[
			'taxonomy' => 'category',
			'field' => ( is_string( $post_category[0] ) ) ? 'slug' : 'term_id',
			'terms' => $post_category
		]];
	}

	$posts_data = get_posts( [
		'posts_per_page' => intval( $posts_in_block ),
		'offset' => 0,
		'post_type' => 'post',
		'tax_query' => $_tax_query,
		'post_status' => 'publish',
		'suppress_filters' => false
	] );

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

	$card_title_typo = OhioExtraParser::VC_typo_to_CSS( $heading_typo );
	OhioExtraParser::VC_typo_custom_font( $heading_typo );

	if ( $card_title_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .title{';
		$_block_typo = $card_title_typo;
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
	
	$card_excerpt_typo = OhioExtraParser::VC_typo_to_CSS( $excerpt_typo );
	OhioExtraParser::VC_typo_custom_font( $excerpt_typo );

	if ( $card_excerpt_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .card-details > p{';
		$_block_typo = $card_excerpt_typo;
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
	
	$card_date_typo = OhioExtraParser::VC_typo_to_CSS( $date_typo );
	OhioExtraParser::VC_typo_custom_font( $date_typo );

	if ( $card_date_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .date{';
		$_block_typo = $card_date_typo;
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
	
	$card_estimate_typo = OhioExtraParser::VC_typo_to_CSS( $reading_time_typo );
	OhioExtraParser::VC_typo_custom_font( $reading_time_typo );

	if ( $card_estimate_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .post-meta-estimate{';
		$_block_typo = $card_estimate_typo;
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
	
	$card_category_typo = OhioExtraParser::VC_typo_to_CSS( $category_typo );
	OhioExtraParser::VC_typo_custom_font( $category_typo );

	if ( $card_category_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .category-holder{';
		$_block_typo = $card_category_typo;
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
	
	$card_author_typo = OhioExtraParser::VC_typo_to_CSS( $author_typo );
	OhioExtraParser::VC_typo_custom_font( $author_typo );

	if ( $card_author_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .meta-holder{';
		$_block_typo = $card_author_typo;
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
	
	$card_cta_typo = OhioExtraParser::VC_typo_to_CSS( $read_more_typo );
	OhioExtraParser::VC_typo_custom_font( $read_more_typo );

	if ( $card_cta_typo ) {
		$_selector = '#' . $wrapper_id . ' .blog-item .button{';
		$_block_typo = $card_cta_typo;
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

	$card_background_color = OhioExtraParser::VC_color_to_CSS( $card_background_color, '{{color}}' );
	if ( $card_background_color ) {
		$_style_block .= '#' . $wrapper_id . ' .blog-item.-contained .card-details,';
		$_style_block .= '#' . $wrapper_id . ' .blog-item.-layout4 .image-holder{';
		$_style_block .= 'background-color:' . $card_background_color . ';';
		$_style_block .= '}';
	}

	$overlay_color = OhioExtraParser::VC_color_to_CSS( $overlay_color, '{{color}}' );
	if ( $overlay_color ) {
		$_style_block .= '#' . $wrapper_id . ' .blog-item.-img-overlay .image-holder::after,';
		$_style_block .= '#' . $wrapper_id . ' .blog-item.-img-overlay .overlay{';
		$_style_block .= 'background:' . $overlay_color . ';';
		$_style_block .= '}';
	}

	if ( $card_layout != 'blog_grid_6' || $card_boxed == true ) {
		if ( $card_gap ) {
			$_style_block .= '#' . $wrapper_id . ' .grid-item{';
			$_style_block .= 'padding:' . $card_gap;
			$_style_block .= '}';

			$_style_block .= '#' . $wrapper_id . '.blog-posts{';
			$_style_block .= 'margin-top:-' . $card_gap . ';';
			$_style_block .= 'margin-bottom:-' . $card_gap . ';';
			$_style_block .= '}';
		}
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .blog-item:not(.-contained) .image-holder,';
		$_style_block .= '#' . $wrapper_id . ' .blog-item.-contained{';
		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .-with-shadow:not(.-contained) .image-holder,';
		$_style_block .= '#' . $wrapper_id . ' .-with-shadow.-contained{';
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

	if ( $content_styles_css ) {
	    $_style_block .= '#' . $wrapper_id . $content_styles_css;
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'recent_posts__view.php' );
	return ob_get_clean();
}