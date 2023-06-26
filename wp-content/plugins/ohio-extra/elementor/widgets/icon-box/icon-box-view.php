<div class="ohio-widget icon-box <?php echo $this->getWrapperClasses(); ?>" >

    <?php if ( in_array( $settings['icon_box_full_layout'], [ 'full' ] ) ) : ?>
        
        <div class="icon-box-header">
            <span class="icon-group <?php echo $settings['icon_classes'] ?>">
                <?php $this->showIconInView( 'icon' ); ?>
            </span>
            <?php if ( !empty( $settings['title'] ) ) : ?>
                <h5 class="icon-box-heading"><?php echo $settings['title']; ?></h5>
            <?php endif; ?>
        </div>
        <div class="icon-box-content">
            <?php if ( !empty( $settings['description'] ) ) : ?>
                <p><?php echo $settings['description']; ?></p>
            <?php endif; ?>
            <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>
                <a class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>" <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
                    <?php echo $settings['button_title']; ?>
                </a>
            <?php endif; ?>
        </div>

    <?php else : ?>

        <span class="icon-group <?php echo $settings['icon_classes'] ?>">
            <?php $this->showIconInView( 'icon' ); ?>
        </span>
        <div class="icon-box-content">
            <?php if ( !empty( $settings['title'] ) ) : ?>
                <h5 class="icon-box-heading"><?php echo $settings['title']; ?></h5>
            <?php endif; ?>
            <?php if ( !empty( $settings['description'] ) ) : ?>
                <p><?php echo $settings['description']; ?></p>
            <?php endif; ?>
            <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>
                <a class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>" <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
                    <?php echo $settings['button_title']; ?>
                </a>
            <?php endif; ?>
        </div>

    <?php endif; ?>

</div>