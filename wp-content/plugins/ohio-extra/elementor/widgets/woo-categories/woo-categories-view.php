<div class="ohio-widget woocommerce wc-category-sc vc_row <?php echo $this->getWrapperClasses(); ?>">

    <?php foreach ( $categories_data as $category ) : ?>

        <div class="wc-category grid-item vc_col-md-<?php echo esc_attr( $settings['layout_columns'] . $layout_classes ); ?>" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
            <div class="card<?php echo esc_attr( $drop_shadow_classes ); ?>">
                <div class="image-holder">

                    <?php if ( !empty( $category->image ) ) : ?>
                        <img src="<?php echo esc_url( $category->image ); ?>" alt="<?php echo esc_attr( $category->title ); ?>">
                    <?php endif; ?>

                </div>
                <div class="wc-category-content">
                    <div class="heading">

                        <?php if ( $settings['subtitle_position'] == 'top' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <h3 class="title">
                            <?php echo $category->title; ?>
                        </h3>

                        <?php if ( $settings['subtitle_position'] == 'bottom' ) : ?>
                            <div class="subtitle"><?php echo $category->description; ?></div>
                        <?php endif; ?>

                        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>

                            <a href="<?php echo esc_url( $category->url ); ?>" class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>">
                                <?php if ( $settings['icon_position'] == 'left' ): ?>
                                    <?php $this->showIconInView( 'icon -left' ); ?>
                                <?php endif; ?>
                                
                                <?php if ( !empty( $settings['button_title'] ) ): ?>
                                    <span class="text"><?php echo $settings['button_title']; ?></span>
                                <?php endif; ?>

                                <?php if ( $settings['icon_position'] == 'right' ): ?>
                                    <?php $this->showIconInView( 'icon -right' ); ?>
                                <?php endif; ?>
                            </a>

                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

</div>