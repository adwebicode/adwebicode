<?php

/**
* WPBakery Page Builder Ohio Banner shortcode view
*/

?>
<div class="ohio-banner-sc ohio-widget banner card <?php echo $this->getWrapperClasses(); ?>">

    <?php if ( in_array( $settings['block_type_layout'], [ 'inner' ] ) ) : ?>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            <a data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
        <?php endif; ?>

            <div class="image-holder" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
                <?php if ( !empty( $settings['background_image']['url'] ) ) : ?>
                    <img src="<?php echo $settings['background_image']['url']; ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                        sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                        alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                <?php endif; ?>
                <div class="overlay-details">
                    <div class="card-details">
                        <div class="heading">

                            <?php if ( !empty( $settings['subtitle'] ) ) : ?>
                                <div class="subtitle"><?php echo $settings['subtitle']; ?></div>
                            <?php endif; ?>

                            <h3 class="title"><?php echo $settings['title']; ?></h3>
                        </div>
                    </div>

                    <?php if ( !empty( $settings['description'] ) ) : ?>
                        <p>
                            <?php echo $settings['description']; ?>
                        </p>
                    <?php endif; ?>

                </div>
            </div>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            </a>
        <?php endif; ?>

    <?php elseif ( in_array( $settings['block_type_layout'], [ 'inner_hover' ] ) ) : ?>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            <a class="-unlink" data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
        <?php endif; ?>

            <div class="image-holder" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
                <?php if ( !empty( $settings['background_image']['url'] ) ) : ?>
                    <img src="<?php echo $settings['background_image']['url']; ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                        sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                        alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                <?php endif; ?>
                <div class="overlay-details">
                    <div class="card-details -fade-down">
                        <div class="heading">
                            
                            <?php if ( !empty( $settings['subtitle'] ) ) : ?>
                                <div class="subtitle"><?php echo $settings['subtitle']; ?></div>
                            <?php endif; ?>

                            <h3 class="title"><?php echo $settings['title']; ?></h3>
                        </div>
                    </div>

                    <?php if ( !empty( $settings['description'] ) ) : ?>
                        <p class="-fade-up">
                            <?php echo $settings['description']; ?>
                        </p>
                    <?php endif; ?>

                </div>
            </div>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            </a>
        <?php endif; ?>

    <?php else : ?>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            <a data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['link'] ); ?>>
        <?php endif; ?>

            <div class="image-holder" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>
                <?php if ( !empty( $settings['background_image']['url'] ) ) : ?>
                    <img src="<?php echo $settings['background_image']['url']; ?>"
                        srcset="<?php echo wp_get_attachment_image_srcset( $settings['background_image']['id'], 'large' ) ?>"
                        sizes="<?php echo wp_get_attachment_image_sizes( $settings['background_image']['id'], 'large' ) ?>"
                        alt="<?php echo esc_attr( get_post_meta( $settings['background_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
                <?php endif; ?>
                <div class="overlay-details -fade-up">

                    <?php if ( !empty( $settings['description'] ) ) : ?>
                        <p>
                            <?php echo $settings['description']; ?>
                        </p>
                    <?php endif; ?>

                </div>
            </div>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['link']['url'] ) ) : ?>
            </a>
        <?php endif; ?>

        <div class="card-details">
            <div class="heading">
                
                <?php if ( !empty( $settings['subtitle'] ) ) : ?>
                    <div class="subtitle"><?php echo $settings['subtitle']; ?></div>
                <?php endif; ?>

                <h3 class="title"><?php echo $settings['title']; ?></h3>
            </div>
        </div>

    <?php endif; ?>

</div>