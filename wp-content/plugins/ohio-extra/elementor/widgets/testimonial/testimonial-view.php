<div class="ohio-widget testimonial <?php echo $this->getWrapperClasses(); ?>">

    <?php if ( $settings['block_layout'] == 'image_top' && !empty( $settings['author_photo']['url'] ) ) : ?>
        <div class="avatar <?php echo $settings['size_classes'] ?>" style="background-image: url(<?php echo esc_url( $settings['author_photo']['url'] ); ?>);"></div>
    <?php endif; ?>

    <?php if ( !empty($settings['title']) ) : ?>
        <h6 class="testimonial-headline heading-sm">
            <?php echo $settings['title']; ?>
        </h6>
    <?php endif;?>

    <p>
        <?php echo $settings['testimonial_text']; ?>
    </p>

    <?php if ( $settings['block_layout'] == 'image_middle' && !empty( $settings['author_photo']['url'] ) ) : ?>
        <div class="avatar <?php echo $settings['size_classes'] ?>" style="background-image: url(<?php echo esc_url( $settings['author_photo']['url'] ); ?>);"></div>
    <?php endif; ?>

    <?php if ( !empty( $settings['author_name'] ) ) : ?>
        <div class="author">
            <?php if ( !empty( $settings['author_name'] ) ) : ?>
                <h6 class="title">
                    <?php echo $settings['author_name']; ?>
                </h6>
            <?php endif; ?>

            <?php if ( !empty( $settings['author_position'] ) ) : ?>
                <p class="author-details">
                    <?php echo $settings['author_position']; ?>
                </p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</div>