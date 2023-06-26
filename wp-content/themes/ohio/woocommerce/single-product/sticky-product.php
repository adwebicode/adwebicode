<?php
/**
 * Ohio WordPress Theme
 *
 * Sticky product template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

defined( 'ABSPATH' ) || exit;

global $product;

$available = OhioOptions::get( 'woocommerce_product_sticky', true );
$image_link = wp_get_attachment_image_url( $product->get_image_id(), 'thumbnail' );
$ajax_cart = OhioOptions::get( 'woocommerce_product_ajax_cart', true );

?>

<?php if ( $available ) : ?>
    
    <div class="sticky-product -fade-up">

        <?php if ( has_post_thumbnail() ) : ?>
            <img class="thumbnail" src="<?php echo esc_url( $image_link ); ?>" alt="<?php the_title(); ?>">
        <?php else: ?>
            <img class="thumbnail" src="<?php echo wc_placeholder_img_src(); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>

        <div class="sticky-product-details">
            <h6 class="woo-product-name title"><?php the_title(); ?></h6>
            <div class="woo-category category-holder">
                <?php
                $cats = get_the_terms( $post->ID, 'product_cat' );
                $cat_count = sizeof( $cats );
                if ( $cat_count ) {
                    $i = 0;
                    foreach ( $cats as $cat ) {
                        ?>
                        <a href="<?php echo get_term_link( $cat->term_id ); ?>" class="category"><?php echo esc_html( $cat->name ); ?></a>
                        <?php
                        $i++;
                    }
                }
                ?> 
            </div>
        </div>
        <div class="sticky-product-action">
            <span class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></span>

            <?php if ( $product->is_type( 'variable' ) ) : ?>

                <div class="variation-add-to-cart-wrap">
                    <div class="woocommerce-variation-add-to-cart variations_button woocommerce-add-to-cart">

                        <?php if ( $product->is_in_stock() ) : ?>

                            <a class="single_add_to_cart_button sticky-product-cart button -small alt data_button_ajax<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" data-button-loading="true" data-product-added-text="<?php echo esc_attr( 'Product Added', 'ohio' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></a>

                            <?php if ( ! $ajax_cart ) : ?>
                                <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
                            <?php endif; ?>

                            <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
                            <input type="hidden" name="variation_id" class="variation_id" value="0" />

                        <?php else: ?>

                            <div class="sticky-product-btn">
                                <a class="button -text alt sticky-product-out-of-stock">
                                    <?php esc_html_e( 'Out of stock', 'ohio' ); ?>
                                </a>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>

            <?php else: ?>

                <form class="cart woocommerce-add-to-cart" method="post" enctype='multipart/form-data'>

                    <?php if ( $product->is_in_stock() ) : ?>

                        <?php if ( $ajax_cart ) : ?>

                            <a class="single_add_to_cart_button sticky-product-cart button -small alt data_button_ajax" data-button-loading="true" data-product-added-text="<?php echo esc_attr( 'Product Added', 'ohio' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></a>

                        <?php else : ?>

                            <button type="submit" name="add-to-cart" data-button-loading="true" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button sticky-product-cart button -small alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

                        <?php endif; ?>

                        <input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />
                        <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
                        <input type="hidden" name="variation_id" class="variation_id" value="0" />

                    <?php else: ?>

                        <div class="sticky-product-btn">
                            <a class="button -text alt sticky-product-out-of-stock">
                                <?php esc_html_e( 'Out of stock', 'ohio' ); ?>
                            </a>
                        </div>

                    <?php endif; ?>

                </form>

            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>
