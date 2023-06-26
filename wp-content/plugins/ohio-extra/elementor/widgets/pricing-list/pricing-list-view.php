<div class="ohio-widget pricing-list <?php echo $this->getWrapperClasses(); ?>">
    <div class="pricing-list-headline">
        <?php if ( !empty( $settings['name'] ) ): ?>
            <div class="pricing-list-title">
                <h6 class="heading title"><?php echo $settings['name']; ?></h6>
            </div>
        <?php endif; ?>
        <div class="pricing-list-price">
            <h6 class="title">
                <?php if ( !empty( $settings['regular_price'] ) ) : ?>
                    <span class="regular-price"><?php echo $settings['regular_price']; ?></span>
                <?php endif; ?>

                <?php if ( !empty( $settings['sale_price'] ) ) : ?>
                    <?php echo $settings['sale_price']; ?>
                <?php endif; ?>
            </h6>
        </div>
    </div>
    <div class="pricing-list-details">
        <p>
            <?php if ( !empty( $settings['ingredients'] ) ): ?>
                <?php echo $settings['ingredients']; ?>
            <?php endif; ?>
        </p>
        <?php if ( !empty( $settings['mark'] ) ): ?>
            <a href="#" class="badge -unlink"><?php esc_html_e( 'New', 'ohio-extra' ); ?></a>
        <?php endif; ?>
    </div>
</div>