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
$show_sharing = OhioOptions::get_global( 'woocommerce_sharing_visibility' );
$image_zoom = OhioOptions::get_global( 'woocommerce_product_zoom', 'top' );
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );
$featured_video = function_exists( 'YITH_Featured_Audio_Video_Init' );

if ( $previous_btn ) {
    get_template_part( 'parts/elements/back_link' );
}

?>

<div class="page-container -full-w">

    <?php wc_get_template_part( "single-product/sticky", "product" ); ?>

    <div class="vc_row">
        <div class="vc_col-md-6 vc_col-sm-12 woo-product-details -sticky-block">
            <div class="summary entry-summary woo-product-details-inner">
                <div class="holder">

                    <?php /**
                     * Hook: woocommerce_before_single_product.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     */
                    do_action( 'woocommerce_before_single_product' );
                    ?>

                    <?php wc_get_template_part( "single-product/views/breadcrumbs" ); ?>

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
        <div class="vc_col-md-6 vc_col-sm-12 woo-product-image<?php if ( $featured_video ) { echo esc_attr(' -with-featured-video'); } ?> <?php echo $image_zoom ? esc_attr('with-zoom') : '' ?>" data-sticky-share-bar="true">
            <div class="woo-product-image-slider" data-gallery="ohio-custom-<?php echo esc_attr( $product->get_id()); ?>">
                
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