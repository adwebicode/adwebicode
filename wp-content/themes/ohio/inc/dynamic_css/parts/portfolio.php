<?php
/*
	Portfolio custom styles
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Styles
	# 3. View
*/

if ( ! OhioSettings::page_is( 'projects_page' ) ) {
	return false;
}


# 1. Variables

$overlay_color     = false;
$slider_nav_color     = false;
$slider_bullets_color     = false;
$background_color  = false;
$lightbox_trigger_color  = false;
$video_btn_color = false;

$overlay_color_css     = '';
$slider_nav_color_css     = '';
$slider_bullets_color_css     = '';
$background_color_css  = '';
$lightbox_trigger_color_css  = '';
$video_btn_color_css = '';

// Get layout
$projects_layout_item = OhioOptions::get( 'portfolio_item_layout_type', 'type_1' );


# 2. Styles

$overlay_color = OhioOptions::get( 'portfolio_grid_overlay_color' );
$overlay_gradient_color_css = '';
if ( $overlay_color ) {
	$overlay_color_css = 'background:' . $overlay_color . ';';

	if ( $projects_layout_item == 'grid_7' ) {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to right, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else if ( $projects_layout_item == 'grid_10' ) {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to left, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else if ( $projects_layout_item == 'grid_9' ) {
		$overlay_gradient_color_css = 'background-image: linear-gradient(to left, rgba(255, 255, 255, 0), '. $overlay_color .');';
	} else {
		$overlay_gradient_color_css = '';
	}
}

$video_btn_color = OhioOptions::get( 'portfolio_grid_video_btn_bg' );

if ( $video_btn_color ) {
	$video_button_style = OhioOptions::get( 'portfolio_video_button_style', 'default' );
	$video_btn_color_css = '';
	if ( $video_button_style != 'outlined' ) {
		$video_btn_color_css .= 'background-color:' . $video_btn_color . ';';
	}
	$video_btn_color_css .= 'color:' . $video_btn_color . ';';
	$_selector = [
		'.portfolio-item .video-button .icon-button'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $video_btn_color_css );
}

$slider_nav_color_css = OhioOptions::get( 'portfolio_nav_color' );
if ( $slider_nav_color_css ) {
	$slider_nav_color_css = 'color:' . $slider_nav_color_css . ';';
	$_selector = [
		'.clb-slider-nav-btn .btn-round-light .ion'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $slider_nav_color_css );
}

$slider_bullets_color_css = OhioOptions::get( 'portfolio_bullets_color' );
if ( $slider_bullets_color_css && $slider_bullets_color_css != 1) {
	$slider_bullets_color_css = 'color:' . $slider_bullets_color_css . ';';
	$_selector = [
		'.clb-slider-pagination .clb-slider-page'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $slider_bullets_color_css );
}

$background_color = OhioOptions::get( 'portfolio_grid_background_color' );
if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

$lightbox_trigger_color = OhioOptions::get( 'lightbox_trigger_color' );
if ( $lightbox_trigger_color ) {
	$lightbox_trigger_color_css = 'color:' . $lightbox_trigger_color . ';';
}

$description_overlay_color = OhioOptions::get( 'portfolio_grid_description_overlay_color' );
$description_overlay_color_css = '';
if ( $description_overlay_color ) {
	$description_overlay_color_css = 'background-color:' . $description_overlay_color . ';';
}

# 3. View

if ( $overlay_color_css ) {
	$_selector = [
		'.portfolio-item.-img-overlay .image-holder:after',
		'.portfolio-item.-with-slider .overlay:after',
		'.portfolio-item.-with-slider .overlay-image:before',
		'.portfolio-links.grid_8 .portfolio-grid-images .thumbnail:after'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $overlay_color_css );
}

if ( $overlay_gradient_color_css ) {
	$_selector = [
		'.portfolio-item-fullscreen.portfolio-grid-type-9 .portfolio-item-image:before', 
		'.portfolio-item-fullscreen.portfolio-grid-type-10 .portfolio-item-image:before',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $overlay_gradient_color_css );
}

if ( $background_color_css ) {
	$_selector = [
		'.portfolio-item.-contained .card-details',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $background_color_css );
}

if ( $lightbox_trigger_color_css ) {
	$_selector = [
		'.portfolio-grid .btn-round-outline .ion',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_trigger_color_css );
}

if ( $description_overlay_color_css ) {
	$_selector = [
		'.portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .title',
		'.portfolio-grid .portfolio-item-grid.portfolio-grid-type-11 .portfolio-item-details .category-holder'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $description_overlay_color_css );
}


# 7. Project Archive Typography

## 7.1 Headline

$title_typo = OhioOptions::get_global( 'portfolio_title_typo' );
$title_typo_css = OhioHelper::parse_acf_typo_to_css( $title_typo );
if ( $title_typo_css ) {
	$_selector = [
		'.portfolio-item .title',
		'.portfolio-item.-layout11 .title',
		'.portfolio-item.-layout8 .headline',
		'.portfolio-item.-with-slider .headline'

	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $title_typo_css );
}

## 7.2 Categories

$category_typo = OhioOptions::get_global( 'portfolio_category_typo' );
$category_typo_css = OhioHelper::parse_acf_typo_to_css( $category_typo );
if ( $category_typo_css ) {
	$_selector = [
		'.portfolio-item .category-holder',
		'.portfolio-item .category'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $category_typo_css );
}

## 7.3 Description

if ( $projects_layout_item != 'grid_1' && $projects_layout_item != 'grid_2' ) {
	$project_short_desc_typo = OhioOptions::get_global( 'portfolio_descr_typo' );
	$project_short_desc_typo_css = OhioHelper::parse_acf_typo_to_css( $project_short_desc_typo );
	$_selector = '.portfolio-item .project-details';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_short_desc_typo_css );

	$portfolio_date_typo = OhioOptions::get_global( 'portfolio_date_typo' );
	$portfolio_date_typo_css = OhioHelper::parse_acf_typo_to_css( $portfolio_date_typo );
	$_selector = '.portfolio-item .date';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_date_typo_css );
}

## 7.4 CTA Button

$project_link_typo = OhioOptions::get_global( 'portfolio_show_more_button_typo' );
$project_link_typo_css = OhioHelper::parse_acf_typo_to_css( $project_link_typo );
$_selector = [
		'.portfolio-item .button'
	];
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $project_link_typo_css );


# 9. Project Lightbox Typography

## 9.1 Categories

$lightbox_title_typo = OhioOptions::get_global( 'lightbox_category_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.project-lightbox .category';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

## 9.2 Date

$lightbox_date_typo = OhioOptions::get_global( 'lightbox_date_typo' );
$lightbox_date_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_date_typo );
$_selector = '.project-lightbox .date';
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_date_typo_css );

## 9.3 Headline

$lightbox_title_typo = OhioOptions::get_global( 'lightbox_title_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.project-lightbox .headline';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

## 9.4 Description

$lightbox_title_typo = OhioOptions::get_global( 'lightbox_description_typo' );
$lightbox_title_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
if ( $lightbox_title_typo_css ) {
	$_selector = '.project-lightbox .project-details';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_title_typo_css );
}

## 9.5 Meta

$lightbox_details_typo = OhioOptions::get_global( 'lightbox_details_typo' );
$lightbox_details_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_details_typo );
if ( $lightbox_details_typo_css ) {
	$_selector = [
		'.project-lightbox .project-meta .title',
		'.project-lightbox .project-meta p'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_details_typo_css );
}

## 9.6 CTA Button

$lightbox_link_typo = OhioOptions::get_global( 'lightbox_link_typo' );
$lightbox_link_typo_css = OhioHelper::parse_acf_typo_to_css( $lightbox_link_typo );
$_selector = '.project-lightbox .button';
OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $lightbox_link_typo_css );