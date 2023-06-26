<div class="ohio-widget heading <?php echo $this->getWrapperClasses(); ?>">

    <?php if ( $settings['divider_position'] == 'before_title' ) : ?>
        <div class="divider" <?php echo $this->getInlineStyleAttr( 'divider' ); ?>></div>
    <?php endif; ?>

    <?php if ( $settings['subtitle_type_layout'] == 'top_subtitle' ) : ?>
        <div class="subtitle">
            <?php echo $settings['subtitle']; ?>
        </div>

        <?php if ( $settings['divider_position'] == 'middle' ) : ?>
            <div class="divider" <?php echo $this->getInlineStyleAttr( 'divider' ); ?>></div>
        <?php endif; ?>

    <?php endif; ?>

    <<?php echo $settings['heading_tag']; ?> class="title">
        <?php if ( ! empty( $settings['title_before'] ) ) : ?>
            <span class="text-before"><?php echo $settings['title_before']; ?></span>
        <?php endif; ?>
        <?php echo $settings['title']; ?>
        <?php if ( ! empty( $settings['title_highlighted'] ) ) : ?>
            <span class="highlighted-text-holder"><span class="highlighted-text" <?php echo esc_attr( $appear_attrs ); ?>><?php echo $settings['title_highlighted']; ?></span></span>
        <?php endif; ?>
        <?php if ( ! empty( $settings['title_after'] ) ) : ?>
            <span class="highlighted-text-after"><?php echo $settings['title_after']; ?></span>
        <?php endif; ?>
    </<?php echo $settings['heading_tag']; ?>>

    <?php if ( $settings['subtitle_type_layout'] == 'bottom_subtitle' ) : ?>

        <?php if ( $settings['divider_position'] == 'middle' ) : ?>
            <div class="divider" <?php echo $this->getInlineStyleAttr( 'divider' ); ?>></div>
        <?php endif; ?>

        <div class="subtitle">
            <?php echo $settings['subtitle']; ?>
        </div>
    <?php endif; ?>

    <?php if ( $settings['divider_position'] == 'after_title' ) : ?>
        <div class="divider"></div>
    <?php endif; ?>

</div>