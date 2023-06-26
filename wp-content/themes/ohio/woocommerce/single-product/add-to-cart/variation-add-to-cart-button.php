<?php
/**
 * Single variation cart button
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$ajax_cart = OhioOptions::get( 'woocommerce_product_ajax_cart', true );
?>
<div class="woocommerce-variation-add-to-cart variations_button">
	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

	<?php /* Hide quantity switcher
	do_action( 'woocommerce_before_add_to_cart_quantity' );

	woocommerce_quantity_input(
		array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
		)
	);

	do_action( 'woocommerce_after_add_to_cart_quantity' );
	*/?>

	<?php if ( $ajax_cart ) : ?>

		<a class="single_add_to_cart_button button alt data_button_ajax<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" data-button-loading="true" data-product-added-text="<?php echo esc_attr( 'Product Added', 'ohio' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></a>

	<?php else : ?>

 		<button type="submit" data-button-loading="true" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

 	<?php endif; ?>

	<?php
		if ( function_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode('[yith_wcwl_add_to_wishlist]');
		}
	?>

	<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>

	<?php if ( ! $ajax_cart ) : ?>
		<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
 	<?php endif; ?>

	<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>
