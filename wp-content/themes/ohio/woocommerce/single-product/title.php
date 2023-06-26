<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

// Availability
$availability = $product->get_availability();
$availability_html = '';

$show_stock = OhioOptions::get( 'woocommerce_product_stock_badge', true );
$show_sale = OhioOptions::get( 'woocommerce_product_sale_badge', true );

if ( empty( $availability['availability'] ) ) {
	$availability_html = '<span class="tag ' . esc_attr( $availability['class'] ) . '">' . esc_html__( 'In stock', 'ohio' ) . '</span>';
} else {
	$availability_html = '<span class="tag ' . esc_attr( $availability['class'] ) . '">' . $availability['availability'] . '</span>';
}

if ( $show_stock ) {
    echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
}

if ( $product->is_in_stock() && $show_sale ) {
    woocommerce_show_product_loop_sale_flash();
}

the_title( '<h1 class="woo-product-details-title product_title entry-title">', '</h1>' );

?>


