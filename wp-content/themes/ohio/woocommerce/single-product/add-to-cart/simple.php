<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

global $product;

$stock_quantity = $product->get_stock_quantity();
$ajax_cart = OhioOptions::get( 'woocommerce_product_ajax_cart', true );

if ( ! $product->is_purchasable() ) {
	return;
}

// echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart woo-product-details-variations" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="variations">
			<div class="variation <?php if ( $product->is_sold_individually() || $stock_quantity == 1 ) { echo esc_html( '-limited' ); } ?>">
				<div class="label">
					<label for="quantity"><?php esc_html_e( 'Quantity', 'ohio' ); ?>:</label>
				</div>

				<?php
				do_action( 'woocommerce_before_add_to_cart_quantity' );

				woocommerce_quantity_input(
					array(
						'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
					)
				);

				do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

			</div>
		</div>
		<div class="variations_button">
			<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="0" />

			<?php if ( $ajax_cart ) : ?>

				<a class="single_add_to_cart_button button alt data_button_ajax" data-button-loading="true" data-product-added-text="<?php echo esc_attr( 'Product Added', 'ohio' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></a>

			<?php else : ?>

		 		<button type="submit" name="add-to-cart" data-button-loading="true" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		 	<?php endif; ?>

            <?php
	            if ( function_exists( 'YITH_WCWL' ) ) {
	                echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	            }
            ?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php else : ?>

	<div class="single_add_to_cart_button out_of_stock">
		<div class="alert"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'ohio' ); ?></div>
	</div>

<?php endif; ?>
