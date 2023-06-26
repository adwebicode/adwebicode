<?php
/*
	Page custom style
	
	Table of contents: (use search)
	# 1. Variables
	# 2. Styles
	# 3. View
*/

# 1. Variables
$content_wrapper_width = OhioOptions::get( 'page_content_wrapper_width', null, false, true );
$content_header_wrapper_width = OhioOptions::get( 'page_header_content_wrapper_width', null, false, true );
$content_footer_wrapper_width = OhioOptions::get( 'page_footer_content_wrapper_width', null, false, true );
$full_width_margins = OhioOptions::get( 'page_full_width_margins_size', null, false, true );
$full_width_header_margins = OhioOptions::get( 'page_header_full_width_margins_size', null, false, true );
$full_width_footer_margins = OhioOptions::get( 'page_footer_full_width_margins_size', null, false, true );
$content_top_padding = OhioOptions::get( 'page_top_padding_spacing', null, false, true );
$content_bottom_padding = OhioOptions::get( 'page_bottom_padding_spacing', null, false, true );
$boxed_page_margins = OhioOptions::get( 'page_boxed_wrapper_margins_size', null, false, true );
$is_page_boxed = OhioOptions::get( 'page_use_boxed_wrapper', false );

$background_color_css = '';
$background_image_css = '';

# 2. Content wrapper width
if ( $content_wrapper_width ) {
	$_selector = [
		'.page-container:not(.-full-w)',
		'.page-container:not(.-full-w) .elementor-section.elementor-section-boxed > .elementor-container',
		'.elementor .elementor-section.elementor-section-boxed > .elementor-container',
	];
    $_css = 'max-width:' . $content_wrapper_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 3. Header wrapper width
if ( $content_header_wrapper_width ) {
	$_selector = [
		'.header-wrap.page-container'
	];
    $_css = 'max-width:' . $content_header_wrapper_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 4. Footer wrapper width
if ( $content_footer_wrapper_width ) {
	$_selector = [
		'.site-footer .page-container'
	];
    $_css = 'max-width:' . $content_footer_wrapper_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 5. Full-width margins
if ( $full_width_margins ) {
	$_selector = [
		'.page-container.-full-w',
		'.page-container.-full-w .elementor-section-stretched:not(.elementor-section-full_width) > .elementor-container'
	];
    $_css = '';
    $_css .= 'padding-left:' . $full_width_margins . ';';
    $_css .= 'padding-right:' . $full_width_margins . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

# 6. Full-width header margins
if ( $full_width_header_margins ) {
	$_selector = [
        '.header .header-wrap:not(.page-container)',
    ];
    $_css = '';
    $_css .= 'padding-left:' . $full_width_header_margins . ';';
    $_css .= 'padding-right:' . $full_width_header_margins . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

# 7. Full-width footer margins
if ( $full_width_footer_margins ) {
	$_selector = [
        '.site-footer .page-container.-full-w',
    ];
    $_css = '';
    $_css .= 'padding-left:' . $full_width_footer_margins . ';';
    $_css .= 'padding-right:' . $full_width_footer_margins . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

# 8. Content top margins
if ( $content_top_padding ) {
	$_selector = [
        '.page-container.top-offset',
    ];
    $_css = 'padding-top:' . $content_top_padding . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 9. Content bottom margins
if ( $content_bottom_padding ) {
	$_selector = [
        '.page-container.bottom-offset',
    ];
    $_css = 'padding-bottom:' . $content_bottom_padding . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 10. Boxed content margins

if ( $is_page_boxed ) {
	if ( $boxed_page_margins ) {
		$_selector = [
	        '.boxed-container',
	    ];
	    $_css = '';
	    $_css .= 'margin-left:' . $boxed_page_margins . ';';
	    $_css .= 'margin-right:' . $boxed_page_margins . ';';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
	}
}

$background_type = OhioOptions::get( 'page_background_type' );
$background_select_type = OhioOptions::get_last_select_type();

if ( !$background_type ) {
	$background_type = 'color';
}

$background_color = OhioOptions::get_by_type( 'page_background_color', $background_select_type );

if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}

if ( $background_type == 'image' ) {
	$background_image_css = OhioHelper::get_background_image_css_by_type( 'page', $background_select_type );
}

if ( $background_color_css || $background_image_css ) {
	$_selector = [
		'.site-content',
		'.page-headline:before'
	];
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
