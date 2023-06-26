<?php
/*
    Coming soon custom styles
*/

$background_color_css = '';
$background_image_css = '';
$background_image = '';

$background_type = OhioOptions::get_global( 'coming_soon_background_background_type' );
if ( !$background_type ) {
    $background_type = 'color';
}

$background_color = OhioOptions::get_global( 'coming_soon_background_background_color' );
if ( $background_color ) {
    $background_color_css = 'background:' . $background_color . ';';
}

if ( $background_type == 'image' ) {
    $background_image = OhioOptions::get_global( 'coming_soon_background_background_image' );
}

if ( is_numeric( $background_image ) ) {
    $background_image = wp_get_attachment_image_url( $background_image, 'full' );
}

if ( $background_image ) {
    $background_image_css = 'background-image:url(\'' . esc_url( $background_image ) . '\');';
    $background_image_css .= OhioHelper::get_background_image_css_by_type( 'coming_soon_background', 'global', true );
} else {
    // $background_image_css = 'background-image: none;';
}

if ( $background_color_css || $background_image_css ) {
    $_selector = '.coming-soon';
    $_css = $background_color_css . $background_image_css;
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$social_networks_color = OhioOptions::get_global( 'coming_soon_social_color' );
if ( $social_networks_color ) {
    $_selector = [
        '.coming-soon .social-networks .network'
    ];
    $_css = 'color:' . $social_networks_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

$header_typo = OhioOptions::get_global( 'coming_soon_heading_typo' );
if ( $header_typo ) {
    $header_typo_css = OhioHelper::parse_acf_typo_to_css( $header_typo );

    if ( $header_typo_css ) {
        $_selector = [
            '.coming-soon .holder h1'
        ];
        $_css = $header_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

$details_typo = OhioOptions::get_global( 'coming_soon_details_typo' );
if ( $details_typo ) {
    $details_typo_css = OhioHelper::parse_acf_typo_to_css( $details_typo );

    if ( $details_typo_css ) {
        $_selector = [
            '.coming-soon .holder p'
        ];
        $_css = $details_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

$counter_typo = OhioOptions::get_global( 'coming_soon_countdown_typo' );
if ( $counter_typo ) {
    $counter_typo_css = OhioHelper::parse_acf_typo_to_css( $counter_typo );

    if ( $counter_typo_css ) {
        $_selector = [
            '.coming-soon .countdown-item',
            '.coming-soon .countdown-item .number'
        ];
        $_css = $counter_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}
