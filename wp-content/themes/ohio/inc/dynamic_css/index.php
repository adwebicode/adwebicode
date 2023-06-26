<?php

if ( OhioHelper::is_optimized_flow( 'dynamic_css' ) ) return;

$parts_path = '/inc/dynamic_css/parts/';
get_template_part( $parts_path . 'general' );
get_template_part( $parts_path . 'subheader' );
get_template_part( $parts_path . 'header' );
get_template_part( $parts_path . 'logo' );
get_template_part( $parts_path . 'page-headline' );
get_template_part( $parts_path . 'breadcrumbs' );
get_template_part( $parts_path . 'page' );
get_template_part( $parts_path . 'blog' );
get_template_part( $parts_path . 'portfolio' );
get_template_part( $parts_path . 'project' );
get_template_part( $parts_path . 'widgets' );
get_template_part( $parts_path . 'elements' );
get_template_part( $parts_path . 'footer' );
get_template_part( $parts_path . 'typography' );
get_template_part( $parts_path . 'user-css' );
get_template_part( $parts_path . 'notification' );
get_template_part( $parts_path . 'subscribe' );
get_template_part( $parts_path . 'coming-soon' );
get_template_part( $parts_path . 'woocommerce' );

$dynamic_style = OhioBuffer::get_dynamic_css_buffer();

$retina_buffer = OhioBuffer::get_dynamic_retina_css_buffer();
if ( $retina_buffer ) {
	$dynamic_style .= ' @media(-webkit-min-device-pixel-ratio:2),(min-resolution:192dpi){';
	$dynamic_style .= $retina_buffer;
	$dynamic_style .= '}';
}

wp_add_inline_style( 'ohio-style', $dynamic_style );