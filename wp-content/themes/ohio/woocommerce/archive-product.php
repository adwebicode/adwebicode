<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $post;
$shop_page_id = wc_get_page_id( 'shop' );

if ( $post && is_object( $post ) ) {
    $postID = $post->ID;
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        $post->ID = get_option( 'woocommerce_shop_page_id' ); // woocomerce wrong post id fix
    }
}

$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );

$page_container_class = '';
if ( !$page_wrapped ) {
    $page_container_class .= ' -full-w';
}
if ( $add_content_padding && !$show_breadcrumbs ) {
    $page_container_class .= ' top-offset';
}

$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );

$sidebar_page_class = '';
if ( is_active_sidebar( 'wc_shop' ) ) {
    if ( $sidebar_position == 'left' ) {
        $sidebar_page_class = ' -with-left-sidebar';
    } elseif ( $sidebar_position == 'right' ) {
        $sidebar_page_class = ' -with-right-sidebar';
    }
}

$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );

$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' -' . $sidebar_layout;
}

$products_in_row = OhioOptions::get_global( 'woocommerce_products_in_row' );
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

get_header( 'shop' );
get_template_part( 'parts/elements/page_headline' );
get_template_part( 'parts/elements/breadcrumbs' );

$content_location = OhioOptions::get_global( 'shop_content_position', 'top' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<div class="page-container bottom-offset<?php echo esc_attr( $page_container_class ); ?>">

    <?php if ( $content_location == 'top' ): ?>

        <div class="page_content shop_page_content">
            <?php do_action( 'woocommerce_archive_description' ); ?>
        </div>

    <?php endif; ?>

    <?php if ( is_active_sidebar( 'wc_shop' ) && $sidebar_position == 'left'  ) : ?>

    <div class="page-sidebar -left woo-sidebar<?php echo esc_attr( $sidebar_class ); ?>">
        <ul class="sidebar-widgets">
            <?php dynamic_sidebar( 'wc_shop' ); ?>
        </ul>
    </div>

    <?php endif; ?>

    <div class="page-content<?php echo esc_attr( $sidebar_page_class ); ?><?php echo esc_attr( $row_class ); ?>">

        <?php
        if ( woocommerce_product_loop() ) {

                if ( is_shop() || is_product_category() || is_product_tag() ) {
                    $post->ID = $postID;
                }

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            // do_action( 'woocommerce_before_shop_loop' );

            woocommerce_product_loop_start();

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'product' );
                }
            }

            woocommerce_product_loop_end();

            /**
             * Hook: woocommerce_after_shop_loop.
             *
             * @hooked woocommerce_pagination - 10
             */
            do_action( 'woocommerce_after_shop_loop' );
        } else {
            /**
             * Hook: woocommerce_no_products_found.
             *
             * @hooked wc_no_products_found - 10
             */
            do_action( 'woocommerce_no_products_found' );
        }
        ?>

        <?php if ( $content_location == 'bottom' ): ?>

            <div class="page_content shop_page_content">
                <?php do_action( 'woocommerce_archive_description' ); ?>
            </div>

        <?php endif; ?>

    </div>

    <?php if ( is_active_sidebar( 'wc_shop' ) && $sidebar_position == 'right' ): ?>

    <div class="page-sidebar sidebar-right woo-sidebar<?php echo esc_attr( $sidebar_class ); ?>">
        <ul class="sidebar-widgets">
            <?php dynamic_sidebar( 'wc_shop' ); ?>
        </ul>
    </div>

    <?php endif; ?>
</div>

<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );