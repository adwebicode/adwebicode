<?php
/**
* WPBakery Page Builder Ohio WooCommerce categories shortcode view
*/
?>
<div class="ohio-widget woocommerce wc-category-sc vc_row<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

    <?php foreach ( $woo_categories as $category ) : ?>

        <div class="wc-category grid-item vc_col-md-<?php echo esc_attr( $layout_columns_class . $layout_classes ); ?>" <?php echo esc_attr($tilt_attrs); ?>>
            <div class="card<?php echo esc_attr( $drop_shadow_classes ); ?>">
                <div class="image-holder">

                    <?php if ( !empty( $category->image ) ): ?>
                        <img src="<?php echo esc_url( $category->image ); ?>" alt="<?php echo esc_attr( $category->title ); ?>">
                    <?php endif; ?>

                </div>
                <div class="wc-category-content">
                    <div class="heading">
                        <?php if ( $subtitle_position == 'top' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <h3 class="title">
                            <?php echo $category->title; ?>
                        </h3>

                        <?php if ( $subtitle_position == 'bottom' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <?php if ( $add_link ) : ?>

                            <a class="button<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $category->url ); ?>"<?php if ( $button_link['blank'] ) echo ' target="_blank"'; ?>>
                                <?php if ( $icon_use && $icon_as_icon && $icon_position == 'left' ): ?>
                                    <i class="icon -left <?php echo $icon_as_icon; ?>"></i>
                                <?php endif; ?>

                                <?php echo $button_link['caption']; ?>

                                <?php if ( $icon_use && $icon_as_icon && $icon_position == 'right' ): ?>
                                    <i class="icon -right <?php echo $icon_as_icon; ?>"></i>
                                <?php endif; ?>
                            </a>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>