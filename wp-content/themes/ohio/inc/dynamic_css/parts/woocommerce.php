<?php
/*
	Woocommerce custom styles

    Table of contents: (use search)
    # 1. Variables
    # 2. Sale tag background color
    # 3. Out of stock tag background color
    # 4. Product archive card background color
    # 5. Product archive title typography
    # 6. Product archive category typography
    # 7. Product archive price typography
    # 8. Single product title typography
    # 9. Single product price typography
    # 10. Single product meta typography
*/

if ( OhioSettings::page_is( 'ecommerce' ) ) {

    # 1. Variables
    $shop_sale_tag_background_color =  OhioOptions::get_global( 'woocommerce_shop_sale_tag_background_color' );
    $shop_out_stock_tag_background_color =  OhioOptions::get_global( 'woocommerce_shop_out_stock_tag_background_color' );
    $shop_archive_background_color =  OhioOptions::get_global( 'woocommerce_shop_title_wrap_background_color' );
    $shop_archive_title_typo = OhioOptions::get_global( 'woocommerce_shop_product_title_typo' );
    $shop_archive_category_typo = OhioOptions::get_global( 'woocommerce_shop_product_category_typo' );
    $shop_archive_price_typo = OhioOptions::get_global( 'woocommerce_shop_product_price_typo' );
    $shop_product_title_typo = OhioOptions::get( 'page_woocommerce_single_product_title_typo' );
    $shop_product_price_typo = OhioOptions::get( 'page_woocommerce_single_product_price_typo' );
    $shop_product_meta_typo = OhioOptions::get( 'page_woocommerce_single_product_meta_typo' );

    # 2. Sale tag background color
    if ( $shop_sale_tag_background_color ) {
        $_selector = [
            '.woocommerce .tag.tag-sale'
        ];
        $_css = 'background-color:' . $shop_sale_tag_background_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    # 3. Out of stock tag background color
    if ( $shop_out_stock_tag_background_color ) {
        $_selector = [
            '.woocommerce .tag.tag-out-of-stock',
            '.woocommerce .tag.out-of-stock'
        ];
        $_css = 'background-color:' . $shop_out_stock_tag_background_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    # 4. Product archive card background color
    if ( $shop_archive_background_color ) {
        $_selector = [
            '.woocommerce .woo-products .-contained .card-details'
        ];
        $_css = 'background-color:' . $shop_archive_background_color . ';';
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }

    # 5. Product archive title typography
    if ( $shop_archive_title_typo ) {
        $shop_archive_title_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_archive_title_typo );

        if ( $shop_archive_title_typo_css ) {
            $_selector = [
                '.woocommerce .woo-products .woo-product-name'
            ];
            $_css = $shop_archive_title_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }

    # 6. Product archive category typography
    if ( $shop_archive_category_typo ) {
        $shop_archive_category_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_archive_category_typo );

        if ( $shop_archive_category_typo_css ) {
            $_selector = [
                '.woocommerce .woo-products .woo-category'
            ];
            $_css = $shop_archive_category_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }

    # 7. Product archive category typography
    if ( $shop_archive_price_typo ) {
        $shop_archive_price_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_archive_price_typo );

        if ( $shop_archive_price_typo_css ) {
            $_selector = [
                '.woocommerce .woo-products .woo-price'
            ];
            $_css = $shop_archive_price_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }

    # 8. Single product title typography
    if ( $shop_product_title_typo ) {
        $shop_product_title_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_product_title_typo );

        if ( $shop_product_title_typo_css ) {
            $_selector = [
                '.woocommerce .woo-product .product_title'
            ];
            $_css = $shop_product_title_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }

    # 9. Single product price typography
    if ( $shop_product_price_typo ) {
        $shop_product_price_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_product_price_typo );

        if ( $shop_product_price_typo_css ) {
            $_selector = [
                '.woocommerce .woo-product .woo-product-details .price'
            ];
            $_css = $shop_product_price_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }

    # 10. Single product meta typography
    if ( $shop_product_meta_typo ) {
        $shop_product_meta_typo_css = OhioHelper::parse_acf_typo_to_css( $shop_product_meta_typo );

        if ( $shop_product_meta_typo_css ) {
            $_selector = [
                '.woocommerce .woo-product .product_meta'
            ];
            $_css = $shop_product_meta_typo_css;
            OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
        }
    }
}
    