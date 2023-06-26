<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
global $product;

$shop_page_id = wc_get_page_id( 'shop' );
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility' );
$product_type = OhioSettings::get_product_type();
$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );

if ( $product_type == NULL ) {
	$product_type = 'type1';
}
if ( post_password_required() ) {
 	echo get_the_password_form();
 	return;
}
if ( is_string( $products_in_row ) ) {
    $products_in_row = json_decode( $products_in_row );
}
if ( $products_in_row == NULL ) {
    $products_in_row = (object) array(
        "large" => "3",
        "medium" => "2",
        "small" => "2"
    );
}

$product_now = 0;

$row_class = '';
if ( is_object( $products_in_row ) ) {
    $row_class = ' columns-lg-' . $products_in_row->large;
    $row_class .= ' columns-md-' . $products_in_row->medium;
    $row_class .= ' columns-sm-' . $products_in_row->small;
}

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	switch ( $product_type ) {
		case 'type1':
			wc_get_template_part( 'single-product/views/type_1' );
			break;
		case 'type2':
			wc_get_template_part( 'single-product/views/type_1_reverse' );
			break;
		case 'type3':
			wc_get_template_part( 'single-product/views/type_2' );
			break;
		case 'type4':
			wc_get_template_part( 'single-product/views/type_2_reverse' );
			break;
		case 'type5':
			wc_get_template_part( 'single-product/views/type_3' );
			break;
		case 'type6':
			wc_get_template_part( 'single-product/views/type_3_reverse' );
			break;
		case 'type7':
			wc_get_template_part( 'single-product/views/type_4' );
			break;
		case 'type8':
			wc_get_template_part( 'single-product/views/type_4_reverse' );
			break;
		default:
			break;
		}
	?>
</div>

<section class="woo-c_recommended page-container">
	<div class="<?php echo esc_attr( $row_class ); ?>">
		<?php do_action( 'woocommerce_after_single_product' ); ?>
	</div>
</section>
