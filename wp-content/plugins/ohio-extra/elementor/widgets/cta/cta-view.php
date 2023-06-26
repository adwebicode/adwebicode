<div class="ohio-widget call-to-action <?php echo $this->getWrapperClasses(); ?>" <?php echo $this->getInlineStyleAttr( 'wrapper' ); ?>>
    <div class="heading title">

        <?php if ( $settings['subtitle_type_layout'] == 'top_subtitle' ) : ?>
            <div class="subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>>
                <?php echo $settings['subtitle']; ?>
            </div>
        <?php endif; ?>

        <<?php echo $settings['heading_tag']; ?> <?php echo $this->getInlineStyleAttr( 'heading' ); ?> class="title">
            <?php echo $settings['title']; ?>
        </<?php echo $settings['heading_tag']; ?>>

        <?php if ( $settings['subtitle_type_layout'] == 'bottom_subtitle' ) : ?>
            <div class="subtitle" <?php echo $this->getInlineStyleAttr( 'subtitle' ); ?>>
                <?php echo $settings['subtitle']; ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="holder">
        <a class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>"
            <?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>
            
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
    </div>
</div>