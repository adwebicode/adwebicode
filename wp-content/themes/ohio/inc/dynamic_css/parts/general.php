<?php
/*
    General custom styles
    
    Table of contents: (use search)
    # 1. Variables

    # 3. View
*/

# 1. Variables

$selection_color = false;
$links_color = false;
$links_hover_color = false;
$buttons_color = false;
$borders_color = false;
$backgrounds_color = false;
$dark_mode_background = false;
$selection_css = '';
$links_css = '';
$links_hover_css = '';
$buttons_css = '';
$buttons_color_css = '';
$borders_css = '';
$backgrounds_css = '';
$dark_mode_background_css = '';


# 2. Global colors

## 2.1 Brand color

$brand_color = OhioOptions::get_global( 'page_brand_color' );
if ( $brand_color ) {

    // Color
    $_selector = [
        '.brand-color',
        'a:not(.-unlink):not(.-highlighted):hover',
        'a:not(.-unlink):not(.-highlighted):hover .title',
        'a:not(.-unlink):not(.-highlighted):active',
        'a:not(.-unlink):not(.-highlighted):active .title',
        'a:not(.-unlink):not(.-highlighted):focus',
        'a:not(.-unlink):not(.-highlighted):focus .title',
        '.nav .nav-item.active-main-item > a',
        '.nav .nav-item.active > a',
        '.nav .current-menu-ancestor > a',
        '.nav .current-menu-item > a',
        '.hamburger-nav .menu li.current-menu-ancestor > a > span',
        '.hamburger-nav .menu li.current-menu-item > a > span',
        '.widget_rss a',
        '.single-post .entry-content a:not(.wp-block-button__link)',
        '.page-id-124 .entry-content a:not(.wp-block-button__link)',
        'ul:not(.-unlist) > li::before',
        'ol:not(.-unlist) > li::before',
        '.social-networks.-outlined .network:hover',
        '.portfolio-filter a.active',
        '.category-holder:not(.no-divider):after',
        '.video-button.-outlined .icon-button:hover',
        '.comments .comment-body time:after',
        '.button.-outlined:not(.-pagination):hover',
        'a.button.-outlined:not(.-pagination):hover',
        '.button.-outlined:active',
        '.button.-outlined:focus',
        '.pagination .button:hover',
        '.pagination.-outlined a.button:not(.-flat):hover',
        '.pricing-table-features .exist .icon',
        '.service-table-features .exist .icon',
        '.lazy-load.-outlined .button.-pagination:hover',
        '.lazy-load.-flat .button.-pagination:hover',
        '.button.-primary.-outlined',
        'a.button.-primary.-outlined',
        '.button.-primary.-flat',
        'a.button.-primary.-flat',
        '.button.-primary.-text',
        'a.button.-primary.-text'
    ];
    $_css = 'color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Border color
    $_selector = [
        '.custom-cursor .circle-cursor-outer',
        'a.button.-outlined:active',
        'a.button.-outlined:focus',
        'input[type="checkbox"]:checked',
        'input[type="radio"]:checked',
        '.button.-primary.-outlined',
        'a.button.-primary.-outlined'
    ];
    $_css = 'border-color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Background color
    $_selector = [
        '.custom-cursor .circle-cursor-inner',
        '.custom-cursor .circle-cursor-inner.cursor-link-hover',
        '.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):hover',
        '.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):active',
        '.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):focus',
        '.button[type="submit"]:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):hover',
        '.button[type="submit"]:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):active',
        '.button[type="submit"]:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):focus',
        'a.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):hover',
        'a.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):active',
        'a.button:not(.-outlined):not(.-flat):not(.-text):not(.-primary):not(.-pagination):not(.elementor-button[type=submit]):focus',
        '.widget_price_filter .ui-slider-range',
        '.widget_price_filter .ui-slider-handle:after',
        'input[type="checkbox"]:checked',
        'input[type="radio"]:checked',
        '.video-button:not(.-outlined):not(.-blurred) .icon-button:hover',
        '.tag.tag-sale',
        '.social-networks.-contained .network:hover',
        'input[type="submit"]:not(.-outlined):not(.-flat):not(.-text):not(.-primary):hover',
        '.button.-primary:not(.-outlined):not(.-flat):not(.-text)',
        'a.button.-primary:not(.-outlined):not(.-flat):not(.-text)',
        'input[type="submit"].-primary:not(.-outlined):not(.-flat):not(.-text)',
        '.icon-buttons-animation .icon-button::before'
    ];
    $_css = 'background-color:' . $brand_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Highlighted text background color
    $brand_color_highlighted = OhioHelper::hex_to_rgba( $brand_color, .5 );
    $_selector = [
        '.heading .title .highlighted-text'
    ];
    $_css = 'background-image: linear-gradient(' . $brand_color_highlighted . ', ' . $brand_color_highlighted . ');';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Cursor selection color
    $brand_color_selection = OhioHelper::hex_to_rgba( $brand_color, .1 );
    $_selector = [
        '::selection'
    ];
    $_css = 'background-color:' . $brand_color_selection . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2.2 Cursor selection color

$selection_color = OhioOptions::get_global( 'page_selection_color' );
if ( $selection_color ) {
    $selection_css = 'background-color:' . $selection_color . ';';
}

## 2.3 Links color

$links_color = OhioOptions::get_global( 'page_links_color' );
if ( $links_color ) {
    $links_css = 'color:' . $links_color . ';';
}

## 2.4 Links hover color

$links_hover_color = OhioOptions::get_global( 'page_links_hover_color' );
if ( $links_hover_color ) {
    $links_hover_css = 'color:' . $links_hover_color . ';';
}

## 2.5 Buttons color

$buttons_color = OhioOptions::get_global( 'page_buttons_color' );
if ( $buttons_color ) {
    $buttons_css = 'background:' . $buttons_color . ';';
    $buttons_color_css = 'color:' . $buttons_color . ';';
}

## 2.6 Borders color

$borders_color = OhioOptions::get_global( 'page_borders_color' );
if ( $borders_color ) {
    $borders_css = 'border-color:' . $borders_color . ';';
}

## 2.7 Fill background color

$backgrounds_color = OhioOptions::get_global( 'page_backgrounds_color' );
if ( $backgrounds_color ) {
    $backgrounds_css = 'background-color:' . $backgrounds_color . ';';
}

## 2.8 Dark mode background color

$dark_mode_background = OhioOptions::get_global( 'page_dark_mode_background_color' );
if ( $dark_mode_background ) {
    $dark_mode_background_css = 'background-color:' . $dark_mode_background . ';';
}

# 3. View

## 3.2 Cursor selection color

if ( $selection_css ) {
    $_selector = [
        '::selection'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $selection_css );
}

## 3.3 Links color

if ( $links_css ) {
    $_selector = [
        'a:not(.-unlink):not(.-undash):not(.button)',
        '.post .entry-content a:not(.wp-block-button__link)'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $links_css );
}

## 3.4 Links hover color

if ( $links_hover_css ) {
    $_selector = [
        'a:not(.-unlink):not(.-highlighted):hover',
        '.post .entry-content a:not(.wp-block-button__link):hover'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $links_hover_css );
}

## 3.5 Buttons color

if ( $buttons_css ) {
    $_selector = [
        '.button:not(.-outlined):not(.-text):not(.-flat):not(.wc-forward:first-child)',
        'a.button:not(.-outlined):not(.-text):not(.-flat):not(.wc-forward:first-child)',
        'input[type="submit"]'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $buttons_css );
}

## 3.6 Button color

if ( $buttons_color_css ) {
    $_selector = [
        'body:not(.dark-scheme) .button.-outlined',
        'body:not(.dark-scheme) a.button.-outlined', 
        'body:not(.dark-scheme) input[type="submit"].-outlined',
        'body:not(.dark-scheme) .button.-text:not(:hover)',
        'body:not(.dark-scheme) a.button.-text:not(:hover)', 
        'body:not(.dark-scheme) input[type="submit"].-text:not(:hover)'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $buttons_color_css );
}

## 3.7 Borders color

if ( $borders_css ) {
    $_selector = [
        '.header',
        '.site-footer .page-container + .site-info .wrap',
        '.woo-product .woo-product-details-variations',
        '.cart-mini-container .total',
        '.portfolio-project .project-meta li',
        '.cart-mini-container .mini_cart_item'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $borders_css );
}

## 3.8 Fill background color

if ( $backgrounds_css ) {
    $_selector = [
        '.comments-container',
        '.woo-product .single-product-tabs .tab-items-container',
        '.single-post .widget_ohio_widget_about_author',
        '.blog-grid.boxed .blog-grid-content',
        '.portfolio-item-grid.portfolio-grid-type-1.boxed .portfolio-item-details',
        '.site-footer'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $backgrounds_css );
}

## 3.9 Dark mode background color

if ( $dark_mode_background_css ) {
    $_selector = [
        '.dark-scheme',
        '.dark-scheme .site-content',
        '.dark-scheme .site-footer',
        '.dark-scheme .cart-mini',
        '.dark-scheme .logo-details',
        '.dark-scheme .header.-sticky',
        '.dark-scheme .share-bar .social-networks',
        '.dark-scheme .header.-mobile .mobile-overlay .holder',
        '.dark-scheme .horizontal-accordion-item',
        '.dark-scheme .sticky-product',
        '.dark-scheme .sticky-nav-holder',
        '.dark-scheme.with-boxed-container .site',
        '.dark-scheme .header:not(.-mobile).header-5',
        '.dark-scheme .horizontal_accordionItem',
        '.dark-scheme .page-headline:before',
        '.dark-scheme [class*="type"] .woo-product-details',
        '.dark-scheme .header:not(.-mobile) .menu li > ul'
    ];
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $dark_mode_background_css );
}