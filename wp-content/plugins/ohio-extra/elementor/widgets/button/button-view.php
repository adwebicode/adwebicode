
<div class="ohio-widget-holder <?php echo esc_attr( $align_classes ); ?>">
    <a <?php echo $this->getLinkAttributesString( $settings['link'] ); ?> class="ohio-widget button <?php echo $this->getWrapperClasses(); ?>">
        
        <?php if ( $settings['use_icon'] && $settings['icon_position'] == 'left' ): ?>
            <?php $this->showIconInView( 'icon -left' ); ?>
        <?php endif; ?>

        <?php echo $settings['title']; ?>

        <?php if ( $settings['use_icon'] && $settings['icon_position'] == 'right' ): ?>
            <?php $this->showIconInView( 'icon -right' ); ?>
        <?php endif; ?>
    </a>
</div>