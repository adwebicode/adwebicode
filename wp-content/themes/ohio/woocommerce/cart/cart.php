<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="vc_row" id="sticky-woo-sidebar">
	<div class="vc_col-lg-7 vc_col-md-8 vc_col-sm-12">
		<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" >
			<?php do_action( 'woocommerce_before_cart_table' ); ?>

			<div class="woo-c_cart_messages" role="alert">
				<?php wc_print_notices(); ?>
			</div>

			<div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<div class="product-thumbnail">
								<?php
								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail; // PHPCS: XSS ok.
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
								}
								?>
								<div class="product-remove">
									<?php
										echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											'woocommerce_cart_item_remove_link',
											sprintf(
												'<a href="%s" class="remove icon-button -small -light" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icon"><svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg><svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg></i></a>',
												esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
												esc_html__( 'Remove this item', 'woocommerce' ),
												esc_attr( $product_id ),
												esc_attr( $_product->get_sku() )
											),
											$cart_item_key
										);
									?>
								</div>
							</div>

							<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">

							<?php
							$ohio_product_name = wp_kses_post( $_product->get_name() );
							if ( $product_permalink ) {
								$ohio_product_name = sprintf( '<a class="woo-product-name titles-typo title" href="%s">%s</a>', esc_url( $product_permalink ), $ohio_product_name );
							}

							echo apply_filters( 'woocommerce_cart_item_name', $ohio_product_name, $cart_item, $cart_item_key );

							do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

							// Meta data.
							echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

							// Backorder notification.
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
							}
							?>

							</div>
							<div class="product-quantity-holder">
								<div class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
								<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
								<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '<div class="quantity -limited"><div class="quantity-nav"><input type="text" readonly="readonly" value="1" inputmode="numeric" autocomplete="off"></div></div>', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input(
										array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $_product->get_max_purchase_quantity(),
											'min_value'    => '0',
											'product_name' => $_product->get_name(),
										),
										$_product,
										false
									);
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
								?>
								</div>
								<div class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
									<?php
										echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
									?>
								</div>
							</div>
						</div>
						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>
				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</div>

			<div class="woo-actions actions">
				<?php if ( wc_coupons_enabled() ) { ?>
					<fieldset class="coupon">
						<label for="coupon_code" class="field-label"><?php esc_html_e( 'Coupon code', 'ohio' ); ?></label>
						<input type="text" name="coupon_code" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'ohio' ); ?>" />
						<button type="submit" class="button -flat" name="apply_coupon"><?php esc_attr_e( 'Apply Coupon', 'ohio' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</fieldset>
				<?php } ?>
				<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'ohio' ); ?>" data-button-loading="true"><?php esc_html_e( 'Update cart', 'ohio' ); ?></button>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
			</div>
			<div class="woo-cross-sale">
				<?php woocommerce_cross_sell_display(); ?>
			</div>

			<?php do_action( 'woocommerce_after_cart_table' ); ?>
		</form>
	</div>
	<div class="vc_col-lg-5 vc_col-md-4 vc_col-sm-12 -sticky-block">
		<div class="woo-sidebar -boxed cart-collaterals">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );
			?>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
