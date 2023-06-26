<div class="ohio-widget team-member banner card <?php echo $this->getWrapperClasses(); ?>">
    <div class="image-holder" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['team_member_link']['url'] ) ) : ?>
            <a class="team-member-link" data-cursor-class="cursor-link" <?php echo $this->getLinkAttributesString( $settings['team_member_link'] ); ?>>
        <?php endif; ?>

            <img 
                src="<?php echo esc_url( $settings['team_member_image']['url'] ); ?>" 
                srcset="<?php echo wp_get_attachment_image_srcset( $settings['team_member_image']['id'], 'large' ) ?>"
                sizes="<?php echo wp_get_attachment_image_sizes( $settings['team_member_image']['id'], 'large' ) ?>"
                alt="<?php echo esc_attr( get_post_meta( $settings['team_member_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">

        <?php if ( !empty( $settings['use_link'] ) && !empty( $settings['team_member_link']['url'] ) ) : ?>
            </a>
        <?php endif; ?>

        <?php if ( $settings['block_layout'] != 'inner_details' ) : ?>

            <div class="overlay-details -fade-up dark-scheme">
                <?php if ( !empty( $settings['member_description'] ) ): ?>
                    <p><?php echo $settings['member_description']; ?></p>
                <?php endif; ?>

                <?php if ( !empty( $settings['social_networks'] ) ) : ?>
                    <div class="social-networks -outlined -small">
                        <?php foreach ( $settings['social_networks'] as $item ) : ?>
                            <a href="<?php echo $item['list_link']; ?>" target="_blank" rel="nofollow" class="network -unlink <?php echo esc_attr( $item['list_network'] ); ?>">
                                <?php $this->renderSocialNetworkIcon( $item['list_network'] ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <div class="overlay-details dark-scheme">
                <div class="author">
                    <?php if ( !empty( $settings['member_name'] ) ) : ?>
                        <h5 class="title">
                            <?php echo $settings['member_name']; ?>
                        </h5>
                    <?php endif; ?>

                    <?php if ( !empty( $settings['member_position'] ) ) : ?>
                        <div class="author-details">
                            <?php echo $settings['member_position']; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="extra-details">
                    <?php if ( !empty( $settings['member_description'] ) ): ?>
                        <p><?php echo $settings['member_description']; ?></p>
                    <?php endif; ?>

                    <?php if ( !empty( $settings['social_networks'] ) ) : ?>
                        <div class="social-networks -outlined -small">
                            <?php foreach ( $settings['social_networks'] as $item ) : ?>
                                <a href="<?php echo $item['list_link']; ?>" target="_blank" rel="nofollow" class="network -unlink <?php echo esc_attr( $item['list_network'] ); ?>">
                                    <?php $this->renderSocialNetworkIcon( $item['list_network'] ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endif; ?>

    </div>

    <?php if ( $settings['block_layout'] != 'inner_details' ) : ?>

        <div class="card-details">
            <div class="heading author">
                <?php if ( !empty( $settings['member_name'] ) ) : ?>
                    <h5 class="title">
                        <?php echo $settings['member_name']; ?>
                    </h5>
                <?php endif; ?>

                <?php if ( !empty( $settings['member_position'] ) ) : ?>
                    <div class="author-details">
                        <?php echo $settings['member_position']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php endif; ?>

</div>