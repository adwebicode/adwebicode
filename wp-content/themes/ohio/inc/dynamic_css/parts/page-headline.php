<?php
/*
	Page headline custom styles

    Table of contents: (use search)
    # 1. Variables
    # 2. Page headline title typography
    # 3. Page headline subtitle typography
    # 4. Page headline back button typography
    # 5. Page headline height
    # 6. Page headline overlay
    # 7. Page headline background image
*/

# 1. Variables
OhioOptions::get( 'page_typography_settings' ); // trigger select chain
$typography_settings_select_type = OhioOptions::get_last_select_type();

$page_headline_title_typo = json_decode( OhioOptions::get_by_type( 'page_header_title_typo', $typography_settings_select_type ) );
$page_headline_subtitle_typo = json_decode( OhioOptions::get_by_type( 'page_header_subtitle_typo', $typography_settings_select_type ) );
$page_headline_back_button_typo = json_decode( OhioOptions::get_by_type( 'page_header_previous_button_typo', $typography_settings_select_type ) );
$page_headline_overlay = OhioOptions::get( 'page_header_title_overlay_color' );

if ( OhioOptions::get( 'page_header_title_fullscreen', false ) ) {
	$page_headline_height = false;
} else {
	$page_headline_height = OhioOptions::get( 'page_header_title_height', null, false, true );
}

$background_type = OhioOptions::get( 'page_header_title_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_title_background_color', $background_select_type );

# 2. Page headline title typography
if ( $page_headline_title_typo ) {
    $page_headline_title_typo_css = OhioHelper::parse_acf_typo_to_css( $page_headline_title_typo );

    if ( $page_headline_title_typo_css ) {
        $_selector = [
            '.page-headline .title'
        ];
        $_css = $page_headline_title_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 3. Page headline subtitle typography
if ( $page_headline_subtitle_typo ) {
    $page_headline_subtitle_typo_css = OhioHelper::parse_acf_typo_to_css( $page_headline_subtitle_typo );

    if ( $page_headline_subtitle_typo_css ) {
        $_selector = [
			'.page-headline .post-meta-holder',
			'.page-headline .headline-meta'
		];
        $_css = $page_headline_subtitle_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 4. Page headline back button typography
if ( $page_headline_back_button_typo ) {
    $page_headline_back_button_typo_css = OhioHelper::parse_acf_typo_to_css( $page_headline_back_button_typo );

    if ( $page_headline_back_button_typo_css ) {
        $_selector = [
			'.back-link .icon-button',
			'.back-link .caption'
		];
        $_css = $page_headline_back_button_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 5. Page headline height
if ( $page_headline_height ) {
	$_selector = [
        '.page-headline'
    ];
    $_css = 'min-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $page_headline_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

# 6. Page headline overlay
if ( $page_headline_overlay ) {
	if ( substr( trim( $page_headline_overlay ), 0, 4 ) != 'rgba' ) {
		$page_headline_overlay = OhioHelper::hex_to_rgba( $page_headline_overlay, .5 );
	}
    $_selector = [
		'.page-headline::after'
	];
    $_css = 'background-color:' . $page_headline_overlay . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# 7. Page headline background image
$background_image = '';
$background_image_css = '';
$background_color_css = '';

if ( ! $background_type ) {
	$background_type = 'color';
}
if ( $background_color ) {
	$background_color_css = 'background-color:' . $background_color . ';';
}
if ( $background_type == 'image' ) {
	$background_image = OhioOptions::get_by_type( 'page_header_title_background_image', $background_select_type );
}
if ( $background_type == 'featured' ) {
	$background_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );

	if ( ! $background_image ) { // get background image if featured doesn't existed
		$background_image = OhioOptions::get_by_type( 'page_header_title_background_image', $background_select_type );
	}
}
if ( $background_image ) {
	$background_image_css = 'background-image:url(\'' . esc_url( $background_image ) . '\');';
	$background_image_css .= OhioHelper::get_background_image_css_by_type( 'page_header_title', $background_select_type, true );
}
if ( ! $background_image || ! OhioOptions::get( 'page_header_title_use_overlay', true ) ) {
	$overlay_color = 'transparent';
}
if ( $background_color_css || $background_image_css ) {
    $_selector = [
		'.page-headline .bg-image'
	];
	$_css = $background_color_css . $background_image_css;
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
