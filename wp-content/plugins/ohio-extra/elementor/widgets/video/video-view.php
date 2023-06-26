<div class="video-button open-popup <?php echo $this->getWrapperClasses(); ?>" <?php if ( !empty( $settings['link'] ) ) { echo esc_attr( $video_attrs ); } ?>>

    <?php if ( $settings['module_layout'] == 'with_preview' ) : ?>

        <?php if ( !empty( $settings['preview_image']['url'] ) ): ?>
            <img class="preview-image"
                src="<?php echo esc_attr( $settings['preview_image']['url'] ); ?>"
                srcset="<?php echo wp_get_attachment_image_srcset( $settings['preview_image']['id'], 'large' ) ?>"
                sizes="<?php echo wp_get_attachment_image_sizes( $settings['preview_image']['id'], 'large' ) ?>"
                alt="<?php if ( !empty($settings['title']) ) { echo $settings['title']; } ?>"
                <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
        <?php endif; ?>
        <div class="video-button-holder">
            <button class="icon-button <?php echo $settings['size_classes'] ?>">
                <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg><svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg></i>
            </button>
            <?php if ( !empty($settings['title']) ): ?>
                <span class="video-button-caption">
                    <?php echo $settings['title']; ?>
                </span>
            <?php endif; ?>
        </div>

    <?php else: ?>

        <button class="icon-button <?php echo $settings['size_classes'] ?>">
            <i class="icon"><svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg><svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg></i>
        </button>
        <?php if ( !empty($settings['title']) ): ?>
            <span class="video-button-caption">
                <?php echo $settings['title']; ?>
            </span>
        <?php endif; ?>

    <?php endif; ?>

</div>
