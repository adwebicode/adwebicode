<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $post;

$stock_quantity = $product->get_stock_quantity();
$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart woo_c-cart-form" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<button type="submit" class="single_add_to_cart_button btn btn-small alt" disabled="true" data-product-added-text="<?php echo esc_attr( 'Product Added' ); ?>">
			<?php esc_html_e( 'This product is currently out of stock and unavailable.', 'ohio' ); ?>
		</button>
	<?php else : ?>
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

			<?php foreach ( $attributes as $attribute_name => $options ) : ?>

			<div id="variation_<?php echo esc_attr($attribute_name) ?>" class="variation">
				<div class="label">
					<label for="pa_color"><?php echo wc_attribute_label( $attribute_name ) ?>:</label>
				</div>
				<?php 
					$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) : $product->get_variation_default_attribute( $attribute_name );

					wc_dropdown_variation_attribute_options(
						array(
							'options' => $options,
							'attribute' => $attribute_name,
							'product' => $product,
							'class'=> '-small',
							'show_option_none' => wc_attribute_label( $attribute_name )
						)
					);
				?>
			</div>
			

			<?php 
				echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<div class="reset variation"><a class="button -flat -small reset_variations" href="#"><i class="icon -left"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></i> ' . esc_html__( 'Reset', 'ohio' ) . '</a></div>' ) : '';
				?>

			<?php endforeach; ?>

		</div>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );
			?>
			<div class="single-variation">
				<?php 
					do_action( 'woocommerce_single_variation' );
				?>
			</div>
			<?php
				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php
do_action( 'woocommerce_after_add_to_cart_form' );