<div class="ohio-widget progress <?php echo $this->getWrapperClasses(); ?>" data-ohio-progress-bar="<?php echo esc_attr( $settings['progress_value']['size'] ); ?>">
    <div class="progress-heading">
        <?php if (!empty($settings['label'])): ?>
            <h6 class="label"><?php echo $settings['label']; ?></h6>
        <?php endif; ?>

        <?php if ( empty($settings['show_percents_tooltip']) ): ?>
            <span class="progress-percent">
                <span class="percent">0</span>%
            </span>
        <?php endif; ?>
    </div>
    <div class="progress-holder <?php echo $settings['inner_classes'] ?> <?php echo $settings['size_classes'] ?>">
        <div class="progress-bar" role="progressbar">
            <?php if ( !empty($settings['show_percents_tooltip']) ) : ?>
                <span class="progress-percent tooltip">
                    <span class="percent">0</span>%
                </span>
            <?php endif; ?>
        </div>
    </div>
</div>