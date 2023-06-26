<div class="ohio-widget circle-progress <?php echo $this->getWrapperClasses(); ?>" data-circle-progress="true" data-percent-value="<?php echo esc_attr( $settings['progress_value']['size'] ); ?>">
    <div class="circle">
        <svg class="progress" width="110" height="110" viewBox="0 0 110 110">
            <defs>
                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#dc2828"></stop>
                    <stop offset="100%" stop-color="#7544dd"></stop>
                </linearGradient>
            </defs>
            <circle class="progress-meter" cx="55" cy="55" r="49" stroke-width="8"></circle>
            <circle class="progress-value" cx="55" cy="55" r="49" stroke="url(#gradient)" stroke-width="8"></circle>
        </svg>

        <?php if ( $settings['use_icon'] == true ): ?>

            <div class="icon-group">
                <?php if ( $settings['icon_type'] == 'icon' ) : ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon_icon'] ); ?>
                <?php elseif ( $settings['icon_type'] == 'image' && !empty( $settings['icon_image']['url'] ) ) : ?>
                    <img
                        class="image-icon"
                        src="<?php echo $settings['icon_image']['url']; ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $settings['icon_image']['id'], 'large' ) ?>"
                        sizes="<?php echo wp_get_attachment_image_sizes( $settings['icon_image']['id'], 'large' ) ?>">
                <?php endif; ?>
            </div>

        <?php else: ?>
            <h4 class="range">
                <span class="range-value">00</span>%
            </h4>
        <?php endif; ?>

    </div>
    <div class="progress-content">

        <?php if ( $settings['use_icon'] == true ): ?>
            <h4 class="range title">
                <span class="range-value">00</span>%
            </h4>
        <?php endif; ?>

        <?php if (!empty($settings['label'])): ?>
            <h6 class="title"><?php echo $settings['label']; ?></h6>
        <?php endif; ?>

    </div>
</div>