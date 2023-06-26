<?php
/*
	Project custom style
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Project overlay color
	# 3. Project navigation color
	# 4. Project bullets (pagination) color
	# 5. Project video button color
*/

# 1. Variables
$project_slider_overlay = OhioOptions::get( 'project_color_overlay', null, false, true );
$project_layout_type = OhioOptions::get( 'project_layout_type' );
$project_slider_nav_color = OhioOptions::get( 'project_nav_color', null, false, true );
$project_slider_bullets_color = OhioOptions::get( 'project_bullets_color', null, false, true );
$project_video_btn = OhioOptions::get( 'project_grid_video_btn_bg' );

# 2. Project overlay color
if ( $project_slider_overlay && $project_slider_overlay != 1 ) {
	if ( $project_layout_type == 'type_8' ) {
		$_selector = [
		'.project .-with-slider .overlay',
		];
		$_css = 'background: linear-gradient(-90deg, rgba(17, 16, 19, 0), ' . $project_slider_overlay . ');';
	}
	else {
		$_selector = [
			'.project:not(.-layout8) .-with-slider .overlay'
		];
		$_css = 'background-color:' . $project_slider_overlay . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 3. Project navigation color
if ( $project_slider_nav_color && $project_slider_nav_color != 1 ) {
	$_selector = [
		'.project .-with-slider .clb-slider-nav-btn'
	];
	$_css = 'color:' . $project_slider_nav_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 4. Project bullets (pagination) color
if ( $project_slider_bullets_color && $project_slider_bullets_color != 1 ) {
	$_selector = [
		'.project .-with-slider .clb-slider-pagination'
	];
	$_css = 'color:' . $project_slider_bullets_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 5. Project video button color
if ( $project_video_btn && $project_video_btn != 1 ) {
	$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
	
	if ( $video_button_style != 'outlined' ) {
		$_selector = [
			'.project .video-button:not(.-outlined) .icon-button'
		];
		$_css = 'background-color:' . $project_video_btn . ';';
	} else {
		$_selector = [
			'.project .video-button.-outlined .icon-button'
		];
		$_css = 'color:' . $project_video_btn . '; border-color:' . $project_video_btn . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}