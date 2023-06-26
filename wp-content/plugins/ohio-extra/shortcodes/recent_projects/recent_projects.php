<?php

/**
* WPBakery Page Builder Ohio Recent Portfolio Projects shortcode
*/

add_shortcode( 'ohio_recent_projects', 'ohio_recent_projects_func' );

function ohio_recent_projects_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	// Required scripts
	OhioHelper::add_required_script( 'isotope' );

	// Shortcode for faster pagination
	$sc64 = OhioExtraParser::shortcodeInBase64( 'ohio_recent_projects' , $atts );

	// Default values, parsing and filtering
	$card_layout = isset( $card_layout ) ? OhioExtraFilter::string( $card_layout, 'string', 'grid_1' ) : 'grid_1';
	$projects_solid = isset( $projects_solid ) ? OhioExtraFilter::boolean( $projects_solid ) : false;
	$projects_category = isset( $projects_category ) ? OhioExtraFilter::string( $projects_category, 'attr', 'all' ) : 'all';
	$show_projects_filter = isset( $show_projects_filter ) ? OhioExtraFilter::boolean( $show_projects_filter ) : true;
	$filter_align = isset( $filter_align ) ? OhioExtraFilter::string( $filter_align, 'attr', 'center' ) : 'center';
	$show_empty_categories = isset( $show_empty_categories ) ? OhioExtraFilter::boolean( $show_empty_categories ) : true;
	$columns_in_row = isset( $columns_in_row ) ? OhioExtraFilter::string( $columns_in_row, 'attr', '2-2-1' ) : '2-2-1';
	$portfolio_images_size = isset( $portfolio_images_size ) ? OhioExtraFilter::string( $portfolio_images_size, 'string', 'medium_large' ) : 'inherit';
	$metro_style = isset( $metro_style ) ? OhioExtraFilter::boolean( $metro_style ) : false;
	$card_boxed_layout = isset( $card_boxed_layout ) ? OhioExtraFilter::boolean( $card_boxed_layout ) : false;
	$card_reversed_layout = isset( $card_reversed_layout ) ? OhioExtraFilter::boolean( $card_reversed_layout ) : true;
	$grid_items_gap = isset( $grid_items_gap ) ? OhioExtraFilter::string( $grid_items_gap, 'string', '20px' ) : '20px';
	$tilt_effect = isset( $tilt_effect ) ? OhioExtraFilter::boolean( $tilt_effect ) : false;
	$drop_shadow = isset( $drop_shadow ) ? OhioExtraFilter::boolean( $drop_shadow ) : false;
	$drop_shadow_intensity = isset( $drop_shadow_intensity ) ? OhioExtraFilter::string( $drop_shadow_intensity, 'string', '') : '';
	$projects_in_block = isset( $projects_in_block ) ? OhioExtraFilter::string( $projects_in_block, 'attr', '5' ) : '5';
	$animation_type = isset( $animation_type ) ? OhioExtraFilter::string( $animation_type, 'string', 'default' ) : 'default';
	$animation_effect = isset( $animation_effect ) ? OhioExtraFilter::string( $animation_effect, 'string', 'fade-up' ) : 'fade-up';
	$card_effect = isset( $card_effect ) ? OhioExtraFilter::string( $card_effect, 'string', 'none' ) : 'none';
	$border_radius = isset( $border_radius ) ? OhioExtraFilter::string( $border_radius, 'string', '') : '';
	$overlay_color = isset( $overlay_color ) ? OhioExtraFilter::string( $overlay_color ) : false;
	$category_bg_color = isset( $category_bg_color ) ? OhioExtraFilter::string( $category_bg_color ) : false;
	$background_color = isset( $background_color ) ? OhioExtraFilter::string( $background_color ) : false;
	$nav_btn_color = isset( $nav_btn_color ) ? OhioExtraFilter::string( $nav_btn_color ) : false;
	$lightbox_button_color = isset( $lightbox_button_color ) ? OhioExtraFilter::string( $lightbox_button_color ) : false;
	$pagination_btn_color = isset( $pagination_btn_color ) ? OhioExtraFilter::string( $pagination_btn_color ) : false;
	$slider_direction = isset( $slider_direction ) ? OhioExtraFilter::string( $slider_direction, 'string', 'horizontal' ) : 'horizontal';
	$slider_direction_mobile = isset( $slider_direction_mobile ) ? OhioExtraFilter::string( $slider_direction_mobile, 'string', 'horizontal' ) : 'horizontal';
	$fullscreen_mode = isset( $fullscreen_mode ) ? OhioExtraFilter::boolean( $fullscreen_mode, true ) : true;
	$navigation_visibility = isset( $navigation_visibility ) ? OhioExtraFilter::boolean( $navigation_visibility, true ) : true;
	$bullets_visibility = isset( $bullets_visibility ) ? OhioExtraFilter::boolean( $bullets_visibility, true ) : true;
	$loop_mode = isset( $loop_mode ) ? OhioExtraFilter::boolean( $loop_mode, true ) : true;
	$mousewheel_mode = isset( $mousewheel_scroll) ? OhioExtraFilter::boolean( $mousewheel_scroll, true ) : true;
	$autoplay_mode = isset( $autoplay_mode ) ? OhioExtraFilter::boolean( $autoplay_mode ) : false;
	$autoplay_interval = isset( $autoplay_interval ) ? OhioExtraFilter::string( $autoplay_interval, 'string', '3000' ) : '3000';
	$lightbox_visibility = isset( $lightbox_visibility ) ? OhioExtraFilter::boolean( $lightbox_visibility ) : true;
	$title_typo = isset( $title_typo ) ? OhioExtraFilter::string( $title_typo, 'string', false ) : false;
	$category_typo = isset( $category_typo ) ? OhioExtraFilter::string( $category_typo, 'string', false ) : false;
	$link_typo = isset( $link_typo ) ? OhioExtraFilter::string( $link_typo, 'string', false ) : false;
	$date_typo = isset( $date_typo ) ? OhioExtraFilter::string( $date_typo, 'string', false ) : false;
	$short_description_typo = isset( $short_description_typo ) ? OhioExtraFilter::string( $short_description_typo, 'string', false ) : false;
	$filter_typo = isset( $filter_typo ) ? OhioExtraFilter::string( $filter_typo, 'string', false ) : false;
	$filter_active_color = isset( $filter_active_color ) ? OhioExtraFilter::string( $filter_active_color ) : false;
	$show_video_button = isset( $show_video_button ) ? OhioExtraFilter::string( $show_video_button, 'string', true ) : true;
	$video_button_style = isset( $video_button_style ) ? OhioExtraFilter::string( $video_button_style, 'string', 'default' ) : 'default';
	$video_button_size = isset( $video_button_size ) ? OhioExtraFilter::string( $video_button_size, 'string', 'default' ) : 'default';
	$video_btn_color = isset( $video_btn_color ) ? OhioExtraFilter::string( $video_btn_color ) : false;
	$item_desktop = isset( $item_desktop ) ? OhioExtraFilter::string( $item_desktop, 'attr', '5' ) : '5';
	$item_tablet = isset( $item_tablet ) ? OhioExtraFilter::string( $item_tablet, 'attr', '3' ) : '3';
	$item_mobile = isset( $item_mobile ) ? OhioExtraFilter::string( $item_mobile, 'attr', '1' ) : '1';

	if (!$portfolio_images_size || $portfolio_images_size == 'inherit') {
        $portfolio_images_size = OhioOptions::get_global( 'portfolio_images_size' );
    }

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

	// Slider data
	if ( $card_layout == 'grid_8' ) {
		$animation_attrs .= ' data-interactive-links-grid=true';
	}

	$is_slider = false;
	switch ( $card_layout ) {
		case 'grid_3':
		case 'grid_4':
		case 'grid_5':
		case 'grid_6':
		case 'grid_7':
		case 'grid_9':
		case 'grid_10':
			$is_slider = true;
			break;
	}

	$slider_attrs = '';

	if ( $is_slider ) {

		$slider_attrs .= ' data-portfolio-grid-slider=true';

		if ( $loop_mode ) {
			$slider_attrs .= ' data-slider-loop=' . esc_attr( $loop_mode ) . '';
		}
		if ( $mousewheel_mode ) {
			$slider_attrs .= ' data-slider-mousescroll=' . esc_attr( $mousewheel_mode ) . '';
		}
		if ( $bullets_visibility ) {
			$slider_attrs .= ' data-slider-pagination=' . esc_attr( $bullets_visibility ) . '';
		}
		if ( $navigation_visibility ) {
			$slider_attrs .= ' data-slider-navigation=' . esc_attr( $navigation_visibility ) . '';
		}
		if ( $autoplay_mode ) {
			$slider_attrs .= ' data-slider-autoplay=' . esc_attr( $autoplay_mode ) . '';

			if ( $autoplay_interval ) {
				$slider_attrs .= ' data-slider-autoplay-time=' . esc_attr( $autoplay_interval ) . '';
			}
		}
		if ( $card_layout == 'grid_6' ) {
			$slider_attrs .= ' data-slider-columns=' . esc_attr( $columns_in_row ) . '';
		}
		if ( $slider_direction == 'vertical' ) {
			$slider_attrs .= ' data-slider-vertical-orientation=true';
		}

		if ( $slider_direction_mobile == 'vertical' ) {
			$slider_attrs .= ' data-slider-vertical-orientation-mobile=true';
		}
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

	if ( $card_layout == 'grid_13' ) {
		if ( $card_reversed_layout ) {
			$wrapper_classes .= ' -reversed';
		}
	}

	if ( $show_projects_filter ) {
		$wrapper_classes .= ' -with-sorting';
	}

	if ( $use_pagination ) {
		$wrapper_classes .= ' -with-pagination';
	}

	if ( $card_layout == 'grid_8' || $card_layout == 'grid_12' ) {
		$wrapper_classes .= ' portfolio-links ' . esc_attr( $card_layout ) . '';
	}
	else {
		$wrapper_classes .= ' ' . esc_attr( $card_layout ) . '';
	}

	if ( $card_layout != 'grid_1' && $card_layout != 'grid_2' && $card_layout != 'grid_11' && $card_layout != 'grid_13' ) {
		if ( $fullscreen_mode ) {
			$wrapper_classes .= ' -full-vh';
		}
	}

	$filter_classes = '';
	switch ( $filter_align ) {
		case 'right':
			$filter_classes .= ' -right';
			break;
		case 'center':
			$filter_classes .= ' -center';
			break;
		default:
			$filter_classes .= '';
			break;
	}

	// Categories
	if ( $projects_category != 'all' ) {
		$_projects_category = $projects_category;
		$projects_category = array();
		foreach ( explode( ',', $_projects_category) as $category) {
			$category = trim( $category );
			if ( is_numeric( $category ) ) {
				$category = intval( $category );
			}
			$projects_category[] = $category;
		}

		if ( empty( $projects_category ) ) $projects_category = 'all';
	}

	// Project data

	$_tax_query = [];

	if ( $projects_category != 'all' ) {
		$_tax_query = [[
			'taxonomy' => 'ohio_portfolio_category',
			'field' => ( is_string( $projects_category[0] ) ) ? 'slug' : 'term_id',
			'terms' => $projects_category
		]];
	}

	$projects_data = get_posts( apply_filters( 'ohio_projects_args_filter', [
        'posts_per_page' => intval( $projects_in_block ),
        'offset' => 0,
        'post_type' => 'ohio_portfolio',
        'tax_query' => $_tax_query,
        'post_status' => 'publish',
        'suppress_filters' => false
    ] ) );

	$all_projects_count = ( new WP_Query( apply_filters( 'ohio_projects_args_filter', [
		'post_type' => 'ohio_portfolio',
		'tax_query' => $_tax_query,
		'post_status' => 'publish'
	] ) ) )->found_posts;

	$pagination_page = OhioExtraParser::get_current_pagenum();

	$per_page = intval( $pagination_items_per_page );
	$pages_count = ceil( count( $projects_data ) / $per_page );
	$filter_is_paged = ( $pages_count > 1 ) && in_array( $pagination_type, ['simple', 'standard'] );
	$category_id_allowlist = [];

	if (!$show_empty_categories) {
		$_post_start = $pagination_page * $per_page - $per_page;
		$current_page_projects_ids = wp_list_pluck( array_slice( $projects_data, $_post_start, $per_page), 'ID' );
		$category_id_allowlist = wp_list_pluck( wp_get_object_terms( $current_page_projects_ids, 'ohio_portfolio_category' ), 'term_id');
	}

	$column_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row );
	$column_double_class = OhioExtraParser::VC_columns_to_CSS( $columns_in_row, true );
	$column_asymmetric_grid = $columns_in_row;

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

	$card_title_typo = OhioExtraParser::VC_typo_to_CSS( $title_typo );
	OhioExtraParser::VC_typo_custom_font( $title_typo );

	if ( $card_title_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .portfolio-item .headline,';
		$_selector .= '#' . $wrapper_id . ' .grid-item .title{';
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

	$card_category_typo = OhioExtraParser::VC_typo_to_CSS( $category_typo );
	OhioExtraParser::VC_typo_custom_font( $category_typo );

	if ( $card_category_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .portfolio-item .project-content .category-holder,';
		$_selector .= '#' . $wrapper_id . ' .grid-item .category-holder{';
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

	$card_date_typo = OhioExtraParser::VC_typo_to_CSS( $date_typo );
	OhioExtraParser::VC_typo_custom_font( $date_typo );

	if ( $card_date_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .portfolio-item .headline-meta .date,';
		$_selector .= '#' . $wrapper_id . ' .portfolio-item .project-content .date{';
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

	$card_excerpt_typo = OhioExtraParser::VC_typo_to_CSS( $short_description_typo );
	OhioExtraParser::VC_typo_custom_font( $short_description_typo );

	if ( $card_excerpt_typo ) {
		$_selector = '#' . $wrapper_id . ' .portfolio-item .project-details{';
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

	$card_filter_typo = OhioExtraParser::VC_typo_to_CSS( $filter_typo );
	OhioExtraParser::VC_typo_custom_font( $filter_typo );

	if ( $card_filter_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .portfolio-filter,';
		$_selector .= '#' . $wrapper_id . ' .portfolio-filter a{';
		$_block_typo = $card_filter_typo;
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

	$card_link_typo = OhioExtraParser::VC_typo_to_CSS( $link_typo );
	OhioExtraParser::VC_typo_custom_font( $link_typo );

	if ( $card_link_typo ) {
		$_selector = '';
		$_selector .= '#' . $wrapper_id . ' .portfolio-item .project-content .button,';
		$_selector .= '#' . $wrapper_id . ' .grid-item .show-project-link{';
		$_block_typo = $card_link_typo;
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

	$filter_active_color = OhioExtraParser::VC_color_to_CSS( $filter_active_color, '{{color}}' );
	if ( $filter_active_color ) {
		$_style_block .= '#' . $wrapper_id . ' .portfolio-filter a.active{';
		$_style_block .= 'color:' . $filter_active_color . ';';
		$_style_block .= '}';
	}

	$video_btn_color = OhioExtraParser::VC_color_to_CSS( $video_btn_color, '{{color}}' );
	if ( $video_btn_color ) {
		$_style_block .= '#' . $wrapper_id . ' .video-button .icon-button{';

		if ( $video_button_style == 'default' ) {
			$_style_block .= 'background-color:' . $video_btn_color . ';';
		}
		else {
			$_style_block .= 'color:' . $video_btn_color . ';';
		}
		$_style_block .= '}';
	}

	$background_color = OhioExtraParser::VC_color_to_CSS( $background_color, '{{color}}' );
	if ( $background_color ) {
		$_style_block .= '#' . $wrapper_id . ' .portfolio-onepage-slider,';
		$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-layout10 .overlay-image::before,';
		$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-contained .card-details{';
		$_style_block .= 'background-color:' . $background_color . ';';
		$_style_block .= '}';
	}

	$overlay_color = OhioExtraParser::VC_color_to_CSS( $overlay_color, '{{color}}' );
	if ( $overlay_color ) {

		if ( $card_layout == 'grid_7' || $card_boxed_layout == true ) {
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item-image::before{';
			$_style_block .= 'background:linear-gradient(90deg, rgba(0, 0, 0, 0) 0%, ' . $overlay_color . ');';
		}
		elseif ( $card_layout == 'grid_10' || $card_boxed_layout == true ) {
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item-image::before{';
			$_style_block .= 'background:linear-gradient(270deg, rgba(0, 0, 0, 0) 0%, ' . $overlay_color . ');';
		}
		else {
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-layout3 .overlay::after,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-layout4 .overlay::after,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-layout5 .overlay::after,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-layout6 .overlay::after,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-img-overlay .image-holder::after,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-img-overlay .overlay{';
			$_style_block .= 'background:' . $overlay_color . ';';
		}
		$_style_block .= '}';
	}

	$nav_btn_color = OhioExtraParser::VC_color_to_CSS( $nav_btn_color, '{{color}}' );
	if ( $nav_btn_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-nav-btn{';
		$_style_block .= 'color:' . $nav_btn_color . ';';
		$_style_block .= '}';
	}

	$lightbox_button_color = OhioExtraParser::VC_color_to_CSS( $lightbox_button_color, '{{color}}' );
	if ( $lightbox_button_color ) {
		$_style_block .= '#' . $wrapper_id . ' .btn-lightbox .icon{';
		$_style_block .= 'color:' . $lightbox_button_color . ';';
		$_style_block .= '}';
	}

	$pagination_btn_color = OhioExtraParser::VC_color_to_CSS( $pagination_btn_color, '{{color}}' );
	if ( $pagination_btn_color ) {
		$_style_block .= '#' . $wrapper_id . ' .clb-slider-pagination{';
		$_style_block .= 'color:' . $pagination_btn_color . ';';
		$_style_block .= '}';
	}

	if ( $card_layout == 'grid_1' || $card_layout == 'grid_2' || $card_layout == 'grid_11' || $card_layout == 'grid_13' ) {

		if ( $grid_items_gap ) {
			$_style_block .= '#' . $wrapper_id . ' .grid-item{';
			$_style_block .= 'padding:' . $grid_items_gap;
			$_style_block .= '}';

			$_style_block .= '#' . $wrapper_id . ' .portfolio-grid{';
			$_style_block .= 'margin-top:-' . $grid_items_gap . ';';
			$_style_block .= 'margin-bottom:-' . $grid_items_gap . ';';
			$_style_block .= '}';
		}
	}

	if ( isset( $border_radius ) && $border_radius != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .portfolio-item:not(.-contained) .image-holder,';

		if ( $card_layout != 'grid_13' ) {
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-contained{';
		} else {
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-contained.-layout13 .image-holder,';
			$_style_block .= '#' . $wrapper_id . ' .portfolio-item.-contained.-layout13 .card-details{';
		}

		$_style_block .= 'border-radius:' . $border_radius . 'px;';
		$_style_block .= '}';
	}

	if ( isset( $drop_shadow_intensity ) && $drop_shadow_intensity != '' ) {
		$_style_block .= '#' . $wrapper_id . ' .-with-shadow:not(.-contained) .image-holder,';
		
		if ( $card_layout != 'grid_13' ) {
			$_style_block .= '#' . $wrapper_id . ' .-with-shadow.-contained{';
		} else {
			$_style_block .= '#' . $wrapper_id . ' .-with-shadow.-contained.-layout13 .image-holder,';
			$_style_block .= '#' . $wrapper_id . ' .-with-shadow.-contained.-layout13 .card-details{';
		}

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
	include( plugin_dir_path( __FILE__ ) . 'recent_projects__view.php' );
	return ob_get_clean();
}