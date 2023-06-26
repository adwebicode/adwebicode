<?php
/*
	Elements custom styles
*/

$preloader_color = false;
$preloader_background = false;
$portfolio_page_text = false;
$portfolio_page_accent = false;
$fullscreen_background_color = false;
$fullscreen_links_color = false;
$fullscreen_links_typo = false;
$custom_cursor_color = false;

$preloader_color_css = '';
$preloader_percentage_color_css = '';
$preloader_background_css = '';
$portfolio_page_text_css = '';
$portfolio_page_accent_css = '';
$fullscreen_background_color_css = '';
$fullscreen_links_typo_css = '';
$fullscreen_menu_details_typo = '';
$fullscreen_links_icon_color_css = '';
$fullscreen_menu_social_networks_typo_css = '';
$fullscreen_menu_details_typo_css = '';


# 2. Scroll top typography

$scroll_top_typo = OhioOptions::get( 'page_arrow_typo' );
if ( $scroll_top_typo ) {
    $scroll_top_typo_css = OhioHelper::parse_acf_typo_to_css( $scroll_top_typo );

    if ( $scroll_top_typo_css ) {
        $_selector = [
			'.scroll-top:not(.light-typo):not(.dark-typo)',
			'.scroll-top:hover',
			'.scroll-top:not(.light-typo):not(.dark-typo) .titles-typo',
		];
        $_css = $scroll_top_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# 3. Preloader shape color

$preloader_color = OhioOptions::get_global( 'page_preloader_shapes_color' );

if ( $preloader_color ) {
	$preloader_color_css = 'stroke:' . $preloader_color . ';' . 'background-color:' . $preloader_color . ';';
}

if ( $preloader_color ) {
	$preloader_percentage_color_css = 'color:' . $preloader_color . ';';
}


# 3.1. Preloader background color

$preloader_background = OhioOptions::get_global( 'page_preloader_background' );

if ( $preloader_background ) {
	$preloader_background_css = 'background-color:' . $preloader_background . ';';
}


# 4. Portfolio filter text color

$portfolio_page_typo = OhioOptions::get( 'project_filter_text_typo' );

if ( $portfolio_page_typo ) {
	$portfolio_page_text_css = OhioHelper::parse_acf_typo_to_css( $portfolio_page_typo );
}


# 4.1. Accent color

$portfolio_page_accent = OhioOptions::get( 'project_filter_accent_typo' );

if ( $portfolio_page_accent ) {
	$portfolio_page_accent_css = OhioHelper::parse_acf_typo_to_css( $portfolio_page_accent );
}


# 5.1. Text typo

$fullscreen_links_typo = OhioOptions::get_global( 'page_fullscreen_menu_text_typo' );

if ( $fullscreen_links_typo ) {
	$fullscreen_links_typo = json_decode( $fullscreen_links_typo );
	$fullscreen_links_typo_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo );
	$fullscreen_links_color = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo, array( 'rule' => 'only_color' ) );
	if ( $fullscreen_links_color ) {
		$fullscreen_links_icon_color_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_links_typo, array( 'rule' => 'include', 'fields' => array( 'color' ) ) );
	}
}

$fullscreen_menu_details_typo = OhioOptions::get_global( 'page_fullscreen_menu_details_text_typo' );

if ( $fullscreen_menu_details_typo ) {
	$fullscreen_menu_details_typo_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_menu_details_typo );
}

$fullscreen_menu_social_networks_typo = OhioOptions::get_global( 'page_fullscreen_menu_social_networks_typo' );

if ( $fullscreen_menu_social_networks_typo ) {
	$fullscreen_menu_social_networks_typo_css = OhioHelper::parse_acf_typo_to_css( $fullscreen_menu_social_networks_typo );
}

# 8. Custom cursor color
if (OhioOptions::get_global('page_custom_cursor')) {
	$custom_cursor_color = OhioOptions::get_global( 'page_custom_cursor_color', false );
}

# 9. View

if ( $preloader_color_css ) {
	$_selector = [
		'.spinner .path',
		'.sk-preloader .sk-circle:before',
		'.sk-folding-cube .sk-cube:before',
		'.sk-preloader .sk-child:before',
		'.sk-double-bounce .sk-child'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_color_css );
}

if ( $preloader_percentage_color_css ) {
	$_selector = [
		'.sk-percentage .sk-percentage-percent',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_percentage_color_css );
}

if ( $preloader_background_css ) {
	$_selector = '.page-preloader:not(.percentage-preloader),';
	$_selector .= '.page-preloader.percentage-preloader .sk-percentage';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $preloader_background_css );
}

if ( $portfolio_page_text_css ) {
	$_selector = [
		'.portfolio-filter li',
		'.portfolio-filter li a'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_page_text_css );
}

if ( $portfolio_page_accent_css ) {
	$_selector = '.portfolio-filter a.active';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $portfolio_page_accent_css );
}

if ( $fullscreen_background_color_css ) {
	$_selector = [
		'.hamburger-nav',
		'.hamburger-nav.split div.sub-sub-nav:before',
		'.hamburger-nav.split div.sub-nav:before',
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_background_color_css );
}

if ( $fullscreen_links_typo_css ) {
	$_selector = [
		'.hamburger-nav .menu .nav-item a span',
		'.hamburger-nav .menu li.current-menu-item > a > span',
		'.hamburger-nav .copyright a',
		'.hamburger-nav .copyright'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_links_typo_css );
}

if ( $fullscreen_menu_details_typo_css ) {
	$_selector = [
		'.hamburger-nav .details-column:not(.social-networks)',
		'.hamburger-nav .details-column:not(.social-networks) b'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_menu_details_typo_css );
}

if ( $fullscreen_menu_social_networks_typo_css ) {
	$_selector = [
		'.hamburger-nav .social-networks .network'
	];
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $fullscreen_menu_social_networks_typo_css );
}

if ( $custom_cursor_color ) {
	$_selector = [
		'body.custom-cursor .circle-cursor-inner',
		'body.custom-cursor .circle-cursor-inner.cursor-link-hover'
	];
	$_css = 'background-color:' . $custom_cursor_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

	$_selector = [
		'body.custom-cursor .circle-cursor-outer',
		'body.custom-cursor .circle-cursor-outer.cursor-link-hover'
	];
	$_css = 'border-color:' . $custom_cursor_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}