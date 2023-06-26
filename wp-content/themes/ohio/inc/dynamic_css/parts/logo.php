<?php
/*
	Logo custom styles

	Table of contents: (use search)
	# 1. Variables
	# 2. Regular logo height
	# 3. Sticky logo height
	# 4. Footer logo height
	# 5. Logo typography
*/

# 1. Variables
$logo_height = OhioOptions::get_global( 'page_header_logo_height' );
$sticky_logo_height = OhioOptions::get_global( 'page_sticky_header_logo_height' );
$footer_logo_height = OhioOptions::get_global( 'page_footer_logo_height' );
$logo_style = OhioOptions::get( 'page_header_logo_style' );
$logo_typo_global = OhioOptions::get_global( 'page_header_sitename_typo' );
$logo_typo_local = OhioOptions::get( 'page_header_sitename_typo' );

if ( $logo_typo_local != '{}' ) {
	$logo_typo = $logo_typo_local;
} else {
	$logo_typo = $logo_typo_global;
}

# 2. Regular logo height
if ( $logo_height ) {
	$_selector = [
        '.header .branding .logo img',
        '.header .branding .logo-mobile img',
        '.header .branding .logo-sticky-mobile img',
        '.header .branding .logo-dynamic img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $logo_height, $_css );
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

# 3. Sticky logo height
if ( $sticky_logo_height ) {
	$_selector = [
        '.header.-sticky .branding .logo img',
        '.header.-sticky .branding .logo-mobile img',
        '.header.-sticky .branding .logo-sticky img',
        '.header.-sticky .branding .logo-sticky-mobile img',
        '.header.-sticky .branding .logo-dynamic img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $sticky_logo_height, $_css );
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

# 4. Footer logo height
if ( $footer_logo_height ) {
	$_selector = [
        '.site-footer .branding .logo img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $footer_logo_height, $_css );
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

# 5. Logo typography
if ( $logo_style == 'sitename' ) {
	if ( $logo_typo ) {
		$logo_typo_css = OhioHelper::parse_acf_typo_to_css( $logo_typo );

	    if ( $logo_typo_css ) {
	        $_selector = [
	            '.header .branding .branding-title'
	        ];
	        $_css = $logo_typo_css;
	        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
	    }
	}
}
