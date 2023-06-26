<?php
/**
 * Ohio WordPress Theme
 *
 * Single product layout template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post;
global $product;

// Get theme options
$shop_page_id = wc_get_page_id( 'shop' );
$show_lightbox = OhioOptions::get_global( 'woocommerce_product_lightbox_preview' );
$show_sharing = OhioOptions::get_global( 'woocommerce_sharing_visibility' );
$image_zoom = OhioOptions::get_global( 'woocommerce_product_zoom', 'top' );
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );
$featured_video = function_exists( 'YITH_Featured_Audio_Video_Init' );

if ( $previous_btn ) {
    get_template_part( 'parts/elements/back_link' );
}

?>

<div class="page-container sticky-gallery classic-gallery">

    <?php wc_get_template_part( "single-product/sticky", "product" ); ?>
    <?php wc_get_template_part( "single-product/views/breadcrumbs" ); ?>

    <div class="vc_row">
        <div class="vc_col-lg-5 vc_col-md-6 vc_col-sm-12 woo-product-details -sticky-block">
            <div class="summary entry-summary woo-product-details-inner">
                <div class="holder">

                    <?php /**
                     * Hook: woocommerce_before_single_product.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     */
                    do_action( 'woocommerce_before_single_product' );
                    ?>

                    <?php
                    /**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
                    ?>
                </div>
            </div>
        </div>
        <div class="vc_col-lg-7 vc_col-md-6 vc_col-sm-12 woo-product-image<?php if ( $featured_video ) { echo esc_attr(' -with-featured-video'); } ?> <?php echo $image_zoom ? esc_attr('with-zoom') : '' ?>">
            <div class="woo-product-image-slider clb-gallery" data-gallery="ohio-custom-<?php echo esc_attr( $product->get_id()); ?>">
                
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>

                <?php if ( $show_sharing ) {
                    do_shortcode( '[ohio_share_woo]' );
                    } 
                ?>
                
                <?php if( $show_lightbox ) : ?>
                    <button class="icon-button btn-lightbox" data-gallery-item="0">
                        <i class="icon">
                            <svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2V6H2V2H6V0H2C0.9 0 0 0.9 0 2ZM2 12H0V16C0 17.1 0.9 18 2 18H6V16H2V12ZM16 16H12V18H16C17.1 18 18 17.1 18 16V12H16V16ZM16 0H12V2H16V6H18V2C18 0.9 17.1 0 16 0Z"></path></svg>
                            <svg class="minimal" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.427734 1.20793C0.427734 0.77758 0.776603 0.428711 1.20696 0.428711H5.10306C5.53341 0.428711 5.88228 0.77758 5.88228 1.20793C5.88228 1.63828 5.53341 1.98715 5.10306 1.98715H1.98618V5.10404C1.98618 5.53439 1.63731 5.88326 1.20696 5.88326C0.776603 5.88326 0.427734 5.53439 0.427734 5.10404V1.20793ZM12.116 1.20793C12.116 0.77758 12.4649 0.428711 12.8953 0.428711H16.7914C17.2217 0.428711 17.5706 0.77758 17.5706 1.20793V5.10404C17.5706 5.53439 17.2217 5.88326 16.7914 5.88326C16.361 5.88326 16.0121 5.53439 16.0121 5.10404V1.98715H12.8953C12.4649 1.98715 12.116 1.63828 12.116 1.20793ZM1.20696 12.117C1.63731 12.117 1.98618 12.4659 1.98618 12.8962V16.0131H5.10306C5.53341 16.0131 5.88228 16.362 5.88228 16.7923C5.88228 17.2227 5.53341 17.5716 5.10306 17.5716H1.20696C0.776603 17.5716 0.427734 17.2227 0.427734 16.7923V12.8962C0.427734 12.4659 0.776603 12.117 1.20696 12.117ZM16.7914 12.117C17.2217 12.117 17.5706 12.4659 17.5706 12.8962V16.7923C17.5706 17.2227 17.2217 17.5716 16.7914 17.5716H12.8953C12.4649 17.5716 12.116 17.2227 12.116 16.7923C12.116 16.362 12.4649 16.0131 12.8953 16.0131H16.0121V12.8962C16.0121 12.4659 16.361 12.117 16.7914 12.117Z"></path></svg>
                        </i>
                    </button>
                <?php endif; ?>
            </div>
            <div class="clb-popup ohio-gallery-opened-sc clb-gallery-lightbox" id="ohio-custom-<?php echo esc_attr( $product->get_id()); ?>">
                <div class="close-bar">
                    <button class="icon-button -light" aria-label="close">
                        <i class="icon">
                            <svg class="default" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
                            <svg class="minimal" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg>
                        </i>
                    </button>
                </div>
                <div class="clb-popup-holder"></div>
            </div>
        </div>
    </div>
</div>
<?php
wc_get_template_part( 'single-product/tabs/tabs' );
woocommerce_upsell_display();
woocommerce_related_products( $product->get_id(), 4 );