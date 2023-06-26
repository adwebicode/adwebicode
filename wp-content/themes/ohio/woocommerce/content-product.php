<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

global $product, $post;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$masonry_layout = OhioOptions::get_global( 'woocommerce_masonry_layout', true );
$double_width = OhioOptions::get_local( 'product_style_in_grid', false );
$hover_effect = OhioOptions::get_global( 'shop_item_hover_type', 'none' );
$text_align = OhioOptions::get_global( 'woocommerce_text_alignment', 'left' );
$use_boxed_layout = OhioOptions::get_global( 'product_items_boxed_style', false );
$show_layout = OhioOptions::get_global( 'shop_layout_type', 'type1' );

$li_class = '';
if ( $masonry_layout ) {
	$li_class .= ' grid-item masonry-block';
}

if ( $double_width == '2col' ) {
    $li_class .= ' double_width';
}

$wrapper_classes = '';

if ( $show_layout ) {
	$wrapper_classes .= ' -' . esc_attr( $show_layout ) . '';
}

switch ( $hover_effect ) {
    case 'scale':
        $wrapper_classes .= ' -img-scale';
        break;
    case 'overlay':
        $wrapper_classes .= ' -img-overlay';
        break;
    case 'greyscale':
        $wrapper_classes .= ' -img-greyscale';
        break;
    case 'transition':
        $wrapper_classes .= ' -img-transition';
        break;
    default:
        $wrapper_classes .= '';
}

if ( $use_boxed_layout ) {
	$wrapper_classes .= ' -contained';
}

$equal_height = OhioOptions::get_global( 'product_items_equal_height', false );
if ( $equal_height ) {
    $wrapper_classes .= ' -metro';
}

$wrapper_classes .= ' -' . $text_align;

$parallax_data = '';
$tilt_effect = OhioOptions::get_global( 'shop_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'shop_tilt_effect_perspective', 6000 );

if ( $tilt_effect ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective . '';
}
?>

<li <?php wc_product_class( '', $product ); ?> <?php post_class( $li_class ); ?> data-product-item="true" data-lazy-item="" data-lazy-scope="products">
	<div class="product-item product-item-grid card<?php echo esc_attr( $wrapper_classes ); ?>" <?php if ( $use_boxed_layout ) { echo esc_attr( $parallax_data ); } ?>>
		<?php
			switch ( $show_layout ) {
				case 'type1':
					wc_get_template_part( 'archive-views/type_1' );
					break;
				case 'type2':
					wc_get_template_part( 'archive-views/type_2' );
					break;
				default:
					break;
			}
		?>
	</div>
</li>