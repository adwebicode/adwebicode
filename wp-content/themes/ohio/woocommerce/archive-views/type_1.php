<?php
/**
 * Ohio WordPress Theme
 *
 * Archive layout template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

defined( 'ABSPATH' ) || exit;

global $product, $post;

// Get theme options
$quickview_btn = OhioOptions::get_global( 'woocommerce_quickview_button', true );
$show_price = OhioOptions::get_global( 'woocommerce_shop_price_visibility', true );
$show_category = OhioOptions::get_global( 'woocommerce_shop_category_visibility', true );
$show_rating = OhioOptions::get_global( 'woocommerce_shop_rating_visibility', false );
$use_boxed_layout = OhioOptions::get_global( 'product_items_boxed_style', false );
$photos_count = OhioOptions::get_global( 'woocommerce_product_images_count', 2 );
$hover_effect = OhioOptions::get_global( 'shop_item_hover_type', 'none' );

$parallax_data = '';
$tilt_effect = OhioOptions::get_global( 'shop_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'shop_tilt_effect_perspective', 6000 );

if ( $tilt_effect ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective . '';
}

?>

<div class="product-item-thumbnail">

	<?php if ( $quickview_btn || is_null( $quickview_btn ) ) : ?>

		<button class="icon-button button-quickview -fade-down -top -reset-color" data-product-id="<?php echo esc_attr( $product->get_id()) ?>">
		    <i class="icon">
		    	<svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2V6H2V2H6V0H2C0.9 0 0 0.9 0 2ZM2 12H0V16C0 17.1 0.9 18 2 18H6V16H2V12ZM16 16H12V18H16C17.1 18 18 17.1 18 16V12H16V16ZM16 0H12V2H16V6H18V2C18 0.9 17.1 0 16 0Z"></path></svg>
		    	<!-- <svg class="minimal" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.427734 1.20793C0.427734 0.77758 0.776603 0.428711 1.20696 0.428711H5.10306C5.53341 0.428711 5.88228 0.77758 5.88228 1.20793C5.88228 1.63828 5.53341 1.98715 5.10306 1.98715H1.98618V5.10404C1.98618 5.53439 1.63731 5.88326 1.20696 5.88326C0.776603 5.88326 0.427734 5.53439 0.427734 5.10404V1.20793ZM12.116 1.20793C12.116 0.77758 12.4649 0.428711 12.8953 0.428711H16.7914C17.2217 0.428711 17.5706 0.77758 17.5706 1.20793V5.10404C17.5706 5.53439 17.2217 5.88326 16.7914 5.88326C16.361 5.88326 16.0121 5.53439 16.0121 5.10404V1.98715H12.8953C12.4649 1.98715 12.116 1.63828 12.116 1.20793ZM1.20696 12.117C1.63731 12.117 1.98618 12.4659 1.98618 12.8962V16.0131H5.10306C5.53341 16.0131 5.88228 16.362 5.88228 16.7923C5.88228 17.2227 5.53341 17.5716 5.10306 17.5716H1.20696C0.776603 17.5716 0.427734 17.2227 0.427734 16.7923V12.8962C0.427734 12.4659 0.776603 12.117 1.20696 12.117ZM16.7914 12.117C17.2217 12.117 17.5706 12.4659 17.5706 12.8962V16.7923C17.5706 17.2227 17.2217 17.5716 16.7914 17.5716H12.8953C12.4649 17.5716 12.116 17.2227 12.116 16.7923C12.116 16.362 12.4649 16.0131 12.8953 16.0131H16.0121V12.8962C16.0121 12.4659 16.361 12.117 16.7914 12.117Z"></path>
		    	</svg> -->
		    </i>
		</button>

	<?php endif; ?>

	<div class="product-item-buttons -fade-up" aria-label="add-to-cart">
		<div class="button-group">

			<?php
				$classes = '';
				if ( !$product->managing_stock() && !$product->is_in_stock() )
				$classes = 'out-of-stock';
				echo apply_filters( 'woocommerce_loop_add_to_cart_link',
				sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="%s product_type_%s single_add_to_cart_button data_button_ajax button %s" data-button-loading="true">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( $product->get_id() ),
				esc_attr( $product->get_sku() ),
				$product->is_purchasable() ? 'add_to_cart_button' : '',
				esc_attr( $product->get_type() ),
				$classes,
				esc_html( $product->add_to_cart_text() )
			),
			$product );
			?>

			<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="0" />
		</div>

		<?php if ( function_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '<div class="button-group">[yith_wcwl_add_to_wishlist]</div>' );
		}?>

	</div>

	<?php woocommerce_show_product_loop_sale_flash(); ?>

	<div data-cursor-class="cursor-link" <?php if ( ! $use_boxed_layout ) { echo esc_attr( $parallax_data ); } ?>>
		<div class="image-holder">

		<?php if ( $hover_effect != 'transition' ) : ?>
			<div class="slider -woo-slider">
		<?php endif; ?>

			<?php echo woocommerce_get_product_thumbnail(); ?>
			<?php
				$attachment_ids = $product->get_gallery_image_ids();
	            $i = 1;
	            foreach ( $attachment_ids as $attachment_id ) {
	                $i++;
	                if ( $i > $photos_count ) {
	                    break;
                	} ?>
					<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_thumbnail' ); ?>
					<?php
				}
			?>

		<?php if ( $hover_effect != 'transition' ) : ?>
			</div>
		<?php endif; ?>

		<a href="<?php echo esc_url( get_post_permalink() ); ?>"></a>

		</div>
	</div>
</div>

<?php
/**
* woocommerce_after_shop_loop_item hook.
*
* @hooked woocommerce_template_loop_product_link_close - 5
* @hooked woocommerce_template_loop_add_to_cart - 10
*/
?>
<div class="card-details">

	<h5 class="woo-product-name title">
		<a href="<?php echo esc_url( get_post_permalink() ); ?>" class="color-dark -undash">
			<?php echo esc_attr( get_post( $product->get_id() )->post_title ); ?>
		</a>
	</h5>

	<?php if ( $show_category ) : ?>

		<div class="woo-category category-holder">

		<?php
			$categories = explode(', ', wc_get_product_category_list( $product->get_id() ) );
			$categories = array_filter( $categories );
			$i = 0;
			if ( !empty( $categories ) ) :
				foreach ( $categories as $category ):
		?>
		<?php echo preg_replace('/(<a)(.+\/a>)/i', '${1} class="category" ${2}', $category ); ?>
		<?php
				endforeach;
			endif;
		?>
		</div>

	<?php endif; ?>

	<?php if ( $show_price ) : ?>

		<div class="woo-price<?php if ( $show_rating ) { echo esc_attr( ' -with-rating' ); } ?>">

			<?php  
				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action( 'woocommerce_after_shop_loop_item_title' );

			?>

		</div>

	<?php endif; ?>

</div>