<?php
/**
 * Add to wishlist button template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.8
 */

if ( ! defined( 'YITH_WCWL' ) ) {
    exit;
} // Exit if accessed directly

global $product;

$link = esc_url( add_query_arg( 'add_to_wishlist', $product_id ) );
$allowed_html = array(
    'img' => array(
        'class' => true,
        'src' => true,
        'alt'=> true
    )
); 
?>

<a class="<?php echo esc_attr( $link_classes ); ?> button -outlined btn-wishlist " href="<?php echo esc_url( $link ); ?>" rel="nofollow" data-button-loading="true" data-product-id="<?php echo esc_attr( $product_id ); ?>" data-product-type="<?php echo esc_attr( $product_type ); ?>" ><span><?php echo  wp_kses( $label,'default' );   ?></span>
</a>