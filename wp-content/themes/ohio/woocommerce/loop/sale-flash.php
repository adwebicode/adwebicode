<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$product_tag =  OhioOptions::get_global( 'woocommerce_tag', true );

?>
<?php if ( $product_tag ) : ?>
	<?php if ( $product->is_on_sale() ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="tag tag-sale">' . esc_html__( 'Sale', 'ohio' ) . '</span>', $post, $product ); ?>

	<?php endif; ?>
	<?php if ( !$product->is_in_stock() ) : ?>

		<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="tag tag-out-of-stock">' . esc_html__( 'Out of stock', 'ohio' ) . '</span>', $post, $product ); ?>

	<?php endif; ?>
<?php endif;
/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
