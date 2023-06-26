<?php

/**
 * Posts count ( with woocommerce compatibility )
 */
function ohio_post_queries( $query )
{
    if ( !is_admin() && $query->is_main_query() ) {

        if ( isset( $query->query_vars['wc_query'] ) && $query->query_vars['wc_query'] == 'product_query' ) {
            
            $posts_count = OhioOptions::get_global( 'woocommerce_products_on_page', false );

            if ( $posts_count ) {
                $query->set( 'posts_per_page', $posts_count );
            }
        }
    }
}

add_action( 'pre_get_posts', 'ohio_post_queries' );

/**
 * Post gallery
 */
function ohio_post_gallery_override( $output, $atts, $instance )
{
    $return = $output; // fallback

    $my_result = OhioHelper::parse_gallery_layout( $atts );
    if ( !empty( $my_result ) ) {
        $return = $my_result;
    }

    return $return;
}

add_filter( 'post_gallery', 'ohio_post_gallery_override', 10, 3 );

/**
 * Contact form 7 custom loading image
 */
add_filter( 'wpcf7_ajax_loader', 'ohio_wpcf7_ajax_loader' );

function ohio_wpcf7_ajax_loader()
{
    return get_template_directory_uri() . '/images/form_load.png';
}

/**
 * Fix wpautop shortcodes
 */
function ohio_fix_wpautop_shortcodes( $content )
{
    $array = array(
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
    $content = strtr( $content, $array);
    return $content;
}

add_filter( 'the_content', 'ohio_fix_wpautop_shortcodes' );

/**
 * Hook for search widget
 */
function ohio_override_search_form( $text )
{
    $text = str_replace( 'type="search"', 'type="text"', $text );
    return $text;
}

add_filter( 'get_search_form', 'ohio_override_search_form' );

/**
 * Custom arguments for cloud widget
 */
function ohio_override_tag_cloud_widget( $args )
{
    $args['smallest'] = 11;
    $args['largest'] = 11;
    $args['unit'] = 'px';

    return $args;
}

add_filter( 'widget_tag_cloud_args', 'ohio_override_tag_cloud_widget' );

/**
 * Add content, except and feature image fields to portfolio posts
 */
function ohio_override_save_portfolio_post( $post_id, $post, $update )
{
    $post_type = get_post_type( $post_id );

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $post_type != "ohio_portfolio" || $update == false ) return;

    if ( isset( $_POST['acf'] ) && isset( $_POST['acf']['field_5819a27ed1cb0'] ) && is_array( $_POST['acf']['field_5819a27ed1cb0'] ) ) {
        set_post_thumbnail( $post, sanitize_text_field( $_POST['acf']['field_5819a27ed1cb0'][0] ) );
    }

    if ( isset( $_POST['acf'] ) && isset( $_POST['acf']['field_5818b9e99d327'] ) ) {
        $post_update = array( 'ID' => $post_id);
        $post_update['post_excerpt'] = substr(sanitize_text_field( $_POST['acf']['field_5818b9e99d327'] ), 0, 120 ) . '&hellip;';

        remove_action( 'save_post', 'ohio_override_save_portfolio_post' );
        wp_update_post( $post_update );
        add_action( 'save_post', 'ohio_override_save_portfolio_post' );
    }
}

add_action( 'save_post', 'ohio_override_save_portfolio_post', 10, 3 );

/**
 * Body CSS classes
 */
function ohio_body_classes( $classes ) {

    $version = str_replace( '.', '-', OHIO_VERSION );
    $classes[] = 'ohio-theme-' . $version;

    if ( OhioOptions::page_is( 'projects_page' ) ) {
        if ( OhioOptions::get( 'portfolio_item_layout_type' ) == 'grid_6' ) {
            $classes[] = 'portfolio-type-6';
        }
        if ( OhioOptions::get( 'portfolio_item_layout_type' ) == 'grid_7' ) {
            $classes[] = 'portfolio-type-7';
        }
        if ( OhioOptions::get( 'portfolio_item_layout_type' ) == 'grid_9' ) {
            $classes[] = 'portfolio-type-9';
        }
    }
    if ( OhioOptions::get( 'page_use_boxed_wrapper', true ) ) {
        $classes[] = 'with-boxed-container';
    }
    if ( OhioOptions::get( 'page_dark_mode_switcher', true ) ) {
        $classes[] = 'with-switcher';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style1' ) {
        $classes[] = 'with-header-1';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style2' ) {
        $classes[] = 'with-header-2';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style3' ) {
        $classes[] = 'with-header-3';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style4' ) {
        $classes[] = 'with-header-4';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style5' ) {
        $classes[] = 'with-header-5';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style6' ) {
        $classes[] = 'with-header-6';
    }
    if ( OhioOptions::get( 'page_header_menu_style' ) == 'style7' ) {
        $classes[] = 'with-header-7';
    }
    if ( OhioOptions::get( 'page_header_search_position' ) == 'fixed' ) {
        $classes[] = 'with-fixed-search';
    }
    if ( OhioOptions::get( 'page_subheader_visibility', true ) ) {
        $classes[] = 'with-subheader';
    }
    if ( OhioOptions::get( 'page_header_title_visibility', true ) ) {
        $classes[] = 'with-headline';
    }
    if ( OhioOptions::get( 'page_header_add_cap', true ) ) {
        $classes[] = 'with-spacer';
    }
    if ( OhioOptions::get( 'page_header_sticky', true ) ) {
        $classes[] = 'with-sticky-header';
    }
    if ( OhioOptions::get( 'page_footer_is_sticky', true ) ) {
        $classes[] = 'with-sticky-footer';
    }
    if ( OhioOptions::get( 'page_dark_mode_switcher_mobile', true ) ) {
        $classes[] = 'with-mobile-switcher';
    }
    if ( OhioOptions::get( 'page_links_underline', true ) ) {
        $classes[] = 'links-underline';
    }
    if ( OhioOptions::get( 'page_button_animation', true ) ) {
        $classes[] = 'icon-buttons-animation';
    }
    if ( OhioSettings::is_dark_mode() ) {
        $classes[] = 'dark-scheme';
    }
    if ( OhioOptions::get( 'page_custom_cursor', false ) ) {
        $classes[] = 'custom-cursor';
    }
    if ( class_exists( 'WooCommerce' ) ) {
        if ( OhioOptions::get( 'woocommerce_product_ajax_cart', true ) ) {
            $classes[] = 'with-ajax-button';
        }
    }
    if ( OhioOptions::page_is( 'single' ) ) {
        if ( OhioOptions::get( 'page_sidebar_position' ) != 'without' ) {
            $classes[] = 'single-post-sidebar';
        }
    }
    if ( OhioOptions::page_is( 'projects_page' ) ) {
        $layout = OhioOptions::get( 'portfolio_item_layout_type', 'grid_1' );
        if ( in_array( $layout, ['grid_3', 'grid_4', 'grid_5', 'grid_6', 'grid_7', 'grid_9', 'grid_10'] ) ) {
            if ( OhioOptions::get( 'portfolio_bullets_visibility', true ) ) {
                $classes[] = 'slider-with-bullets';
            }
        }
    }
    if ( OhioOptions::page_is( 'project' ) ) {
        $layout = OhioOptions::get( 'project_layout_type', 'type_1' );
        if ( in_array( $layout, ['type_6'] ) ) {
            if ( OhioOptions::get( 'project_bullets_visibility', true ) ) {
                $classes[] = 'slider-with-bullets';
            }
        }
        if ( in_array( $layout, ['type_5'] ) ) {
            if ( OhioOptions::get( 'project_bullets_visibility', true ) ) {
                $classes[] = 'slider-with-bullets slider-with-bullets-type5';
            }
        }
        if ( in_array( $layout, ['type_8'] ) ) {
            if ( OhioOptions::get( 'project_bullets_visibility', true ) ) {
                $classes[] = 'slider-with-bullets slider-with-bullets-type8';
            }
        }
    }
    if ( OhioOptions::get_global( 'header_onepage_mode' ) ) {
        $classes[] = 'ohio-anchor-onepage';
    }
    if ( OhioOptions::get_global( 'page_fade_in_animation', false) && OhioOptions::get_global( 'page_preloader_visibility', false) ) {
        $classes[] = 'global-page-animation';
    }

    return $classes;
}

add_filter( 'body_class', 'ohio_body_classes' );

/**
 * WooCommerce: custom cart
 */
add_filter( 'woocommerce_cart_item_name', 'ohio_remove_variation_cart_product_title', 10, 3 );
function ohio_remove_variation_cart_product_title( $title, $cart_item, $cart_item_key )
{
    $_product = $cart_item['data'];
    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

    if ( $_product->is_type( 'variation' ) ) {
        if ( ! $product_permalink) {
            return $_product->get_title();
        } else {
            return sprintf( '<a href="%s" class="woo-product-name titles-typo title">%s</a>', esc_url( $product_permalink), $_product->get_title() );
        }
    }

    return $title;
}

add_filter( 'woocommerce_cart_item_name', 'ohio_add_cart_product_category', 99, 3 );

function ohio_add_cart_product_category( $name, $cart_item, $cart_item_key )
{
    $product_item = $cart_item['data'];
    if ( $product_item->is_type( 'variation' ) ) {
        $variation = new WC_Product_Variation( $product_item->get_id() );
        $name .= '<div class="woo-category category-holder">' . wc_get_formatted_variation( $variation, true ) . '</div>';
    } else {
        $name .= wc_get_product_category_list( $product_item->get_id(), ' ', '<div class="woo-category category-holder">', '</div>' );
    }

    return $name;
}

/**
 * WooCommerce: move cross-sale to the cart
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );

/**
 * WooCommerce: checkout Form
 */
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form' );
add_action( 'woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form' );
add_action( 'wp_ajax_ohio_product_modal', 'ohio_product_modal_callback' );
add_action( 'wp_ajax_nopriv_ohio_product_modal', 'ohio_product_modal_callback' );
function ohio_product_modal_callback()
{
    if ( !isset( $_POST['product_id'] ) ) {
        die();
    }

    $args = [
        'p' => intval( $_REQUEST['product_id'] ),
        'post_type' => 'product'
    ];

    // Change args for variations
    $product = wc_get_product( $args['p'] );
    if ( $product->get_type() == 'variation' ) {
        $args['p'] = $product->get_parent_id();
        $args = array_merge( $args, $product->get_variation_attributes( true ) );
    }

    if ( $product->has_child() || $product->get_type() == 'variation' ) {
        wc_get_template( 'single-product/add-to-cart/variation.php' );
    }

    query_posts( $args);
    wc_get_template( 'product-popup.php' );
    die();
}

add_action( 'wp_ajax_ohio_subscribe_modal', 'ohio_subscribe_modal' );
add_action( 'wp_ajax_nopriv_ohio_subscribe_modal', 'ohio_subscribe_modal' );
function ohio_subscribe_modal()
{
    ob_start();
    get_template_part( 'parts/elements/subscribe' );
    echo ob_get_clean();
    die();
}

/**
 * Blog excerpt length
 */
add_filter( 'excerpt_length', function(){
    if ( $length = OhioSettings::get( 'posts_content_length', 'global' ) ) {
        return $length;
    }
    return 12;
});

add_filter( 'excerpt_more', function( $more ) {
    return '...';
});

function ohio_filter_the_content_more_link( $a_href, $more_link_text ) {
    return '<br><a class="more-link" href="' . get_permalink() . '">' . __( 'Continue Reading', 'ohio' ) . '</a>';
};

add_filter( 'the_content_more_link', 'ohio_filter_the_content_more_link', 10, 2 );

/**
 * Search
 */
function ohio_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' AS ohio_pm ON '. $wpdb->posts . '.ID = ohio_pm.post_id ';
    }

    return $join;
}

add_filter( 'posts_join', 'ohio_search_join' );

function ohio_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\' )\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (ohio_pm.meta_value LIKE $1)", $where );
    }

    return $where;
}

add_filter( 'posts_where', 'ohio_search_where' );

function ohio_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}

add_filter( 'posts_distinct', 'ohio_search_distinct' );

/**
 * Global Theme Settings cache
 */
function ohio_save_global_options_cache_before_shutdown() {
    OhioOptionsCache::save();
}

add_action( 'shutdown', 'ohio_save_global_options_cache_before_shutdown' );

function ohio_remove_option_from_cache_after_acf_update( $value, $post_id, $field ) {
    OhioOptionsCache::remove( $field['name'] );

    if ( $field['name'] == 'global_options_cache' && !boolval( $value) ) {
        OhioOptionsCache::flush();
    }

    return $value;
}

add_filter( 'acf/update_value', 'ohio_remove_option_from_cache_after_acf_update', 10, 3 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

function ohio_kses_allowed_html( $tags, $context ) {
    switch ( $context) {
        case 'basic_html':
            $tags = [
                'address'    => [],
                'a'          => [
                    'href'     => true,
                    'rel'      => true,
                    'name'     => true,
                    'target'   => true
                ],
                'abbr'       => [],
                'b'          => [],
                'blockquote' => [ 'cite' => true ],
                'br'         => [],
                'button'     => [ 'name' => true, 'type' => true, 'value' => true ],
                'caption'    => [ 'align' => true ],
                'cite'       => [ 'dir'  => true ],
                'code'       => [],
                'div'        => [ 'class' => true ],
                'em'         => [],
                'footer'     => [ 'align' => true ],
                'h1'         => [],
                'h2'         => [],
                'h3'         => [],
                'h4'         => [],
                'h5'         => [],
                'h6'         => [],
                'header'     => [ 'align' => true ],
                'hr'         => [],
                'i'          => [],
                'img'        => [ 'alt' => true, 'height' => true, 'src' => true, 'width' => true,],
                'label'      => [ 'for' => true ],
                'li'         => [],
                'p'          => [ 'align' => true ],
                'span'       => [],
                'strong'     => [],
                'table'      => [ 'align' => true, 'width' => true ],
                'tbody'      => [ 'align' => true, 'valign' => true ],
                'td'         => [
                    'align'   => true,
                    'colspan' => true,
                    'height'  => true,
                    'valign'  => true,
                    'width'   => true,
                ],
                'textarea'   => [ 'cols' => true, 'rows' => true, 'name' => true ],
                'th'         => [
                    'align'   => true,
                    'colspan' => true,
                    'height'  => true,
                    'valign'  => true,
                    'width'   => true,
                ],
                'thead'      => [ 'align' => true, 'valign' => true ],
                'tr'         => [ 'align' => true, 'valign' => true ],
                'ul'         => [],
            ];
            return $tags;
        default:
            return $tags;
    }
}
add_filter( 'wp_kses_allowed_html', 'ohio_kses_allowed_html', 10, 2 );

function ohio_wpkses_post_tags( $tags, $context ) {
    if ( 'post' === $context ) {
        $tags['iframe'] = array(
            'src' => true,
            'height' => true,
            'width' => true,
            'frameborder' => true,
            'allowfullscreen' => true,
        );
    }

    return $tags;
}
add_filter( 'wp_kses_allowed_html', 'ohio_wpkses_post_tags', 10, 2 );

function ohio_woocommerce_variation_is_active( $active, $variation ) {
    if ( ! $variation->is_in_stock() ) {
        return false;
    }

    return $active;
}
add_filter( 'woocommerce_variation_is_active', 'ohio_woocommerce_variation_is_active', 10, 2 );
