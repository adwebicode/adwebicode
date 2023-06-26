<ul class="ohio-widget team-group -unlist <?php echo $this->getWrapperClasses(); ?>" data-team-group="true">
    <?php foreach ( $settings['members'] as $member ): ?>

        <?php
            $has_social = false;
            if ( !empty( $member['social_artstation'] ) ) $has_social = true;
            if ( !empty( $member['social_behance'] ) ) $has_social = true;
            if ( !empty( $member['social_deviantart'] ) ) $has_social = true;
            if ( !empty( $member['social_digg'] ) ) $has_social = true;
            if ( !empty( $member['social_discord'] ) ) $has_social = true;
            if ( !empty( $member['social_dribbble'] ) ) $has_social = true;
            if ( !empty( $member['social_facebook'] ) ) $has_social = true;
            if ( !empty( $member['social_flickr'] ) ) $has_social = true;
            if ( !empty( $member['social_github'] ) ) $has_social = true;
            if ( !empty( $member['social_houzz'] ) ) $has_social = true;
            if ( !empty( $member['social_instagram'] ) ) $has_social = true;
            if ( !empty( $member['social_kaggle'] ) ) $has_social = true;
            if ( !empty( $member['social_linkedin'] ) ) $has_social = true;
            if ( !empty( $member['social_medium'] ) ) $has_social = true;
            if ( !empty( $member['social_mixer'] ) ) $has_social = true;
            if ( !empty( $member['social_pinterest'] ) ) $has_social = true;
            if ( !empty( $member['social_producthunt'] ) ) $has_social = true;
            if ( !empty( $member['social_quora'] ) ) $has_social = true;
            if ( !empty( $member['social_reddit'] ) ) $has_social = true;
            if ( !empty( $member['social_snapchat'] ) ) $has_social = true;
            if ( !empty( $member['social_soundcloud'] ) ) $has_social = true;
            if ( !empty( $member['social_spotify'] ) ) $has_social = true;
            if ( !empty( $member['social_teamspeak'] ) ) $has_social = true;
            if ( !empty( $member['social_telegram'] ) ) $has_social = true;
            if ( !empty( $member['social_tiktok'] ) ) $has_social = true;
            if ( !empty( $member['social_tripadvisor'] ) ) $has_social = true;
            if ( !empty( $member['social_tumblr'] ) ) $has_social = true;
            if ( !empty( $member['social_twitch'] ) ) $has_social = true;
            if ( !empty( $member['social_twitter'] ) ) $has_social = true;
            if ( !empty( $member['social_vimeo'] ) ) $has_social = true;
            if ( !empty( $member['social_vine'] ) ) $has_social = true;
            if ( !empty( $member['social_whatsapp'] ) ) $has_social = true;
            if ( !empty( $member['social_xing'] ) ) $has_social = true;
            if ( !empty( $member['social_youtube'] ) ) $has_social = true;
            if ( !empty( $member['social_fivehundred'] ) ) $has_social = true;
        ?>
        <li class="team-group-item" data-item="true">
            <div class="item-holder">
                <div class="-fade-up">
                    <div class="author">
                        <?php if ( !empty( $member['member_name'] ) ) : ?>
                            <h5 class="title">
                                <?php echo $member['member_name']; ?>
                            </h5>
                        <?php endif; ?>

                        <?php if ( !empty( $member['member_position'] ) ) : ?>
                            <div class="author-details">
                                <?php echo $member['member_position']; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( !empty( $member['member_description'] ) ): ?>
                        <p><?php echo $member['member_description']; ?></p>
                    <?php endif; ?>

                    <?php if ( $has_social ) : ?>

                        <div class="social-networks -outlined -small">
                            
                            <?php if ( !empty( $member['social_artstation'] ) ): ?>
                                <a href="<?php echo $member['social_artstation']; ?>" target="_blank" rel="nofollow" class="network -unlink artstation">
                                    <i class="fab fa-artstation"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_behance'] ) ): ?>
                                <a href="<?php echo $member['social_behance']; ?>" target="_blank" rel="nofollow" class="network -unlink behance">
                                    <i class="fab fa-behance"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_deviantart'] ) ): ?>
                                <a href="<?php echo $member['social_deviantart']; ?>" target="_blank" rel="nofollow" class="network -unlink deviantart">
                                    <i class="fab fa-deviantart"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_digg'] ) ): ?>
                                <a href="<?php echo $member['social_digg']; ?>" target="_blank" rel="nofollow" class="network -unlink digg">
                                    <i class="fab fa-digg"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_discord'] ) ): ?>
                                <a href="<?php echo $member['social_discord']; ?>" target="_blank" rel="nofollow" class="network -unlink discord">
                                    <i class="fab fa-discord"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_dribbble'] ) ): ?>
                                <a href="<?php echo $member['social_dribbble']; ?>" target="_blank" rel="nofollow" class="network -unlink dribbble">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_facebook'] ) ): ?>
                                <a href="<?php echo $member['social_facebook']; ?>" target="_blank" rel="nofollow" class="network -unlink facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_flickr'] ) ): ?>
                                <a href="<?php echo $member['social_flickr']; ?>" target="_blank" rel="nofollow" class="network -unlink flickr">
                                    <i class="fab fa-flickr"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_github'] ) ): ?>
                                <a href="<?php echo $member['social_github']; ?>" target="_blank" rel="nofollow" class="network -unlink github">
                                    <i class="fab fa-github"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_instagram'] ) ): ?>
                                <a href="<?php echo $member['social_instagram']; ?>" target="_blank" rel="nofollow" class="network -unlink instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_houzz'] ) ): ?>
                                <a href="<?php echo $member['social_houzz']; ?>" target="_blank" rel="nofollow" class="network -unlink houzz">
                                    <i class="fab fa-houzz"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_kaggle'] ) ): ?>
                                <a href="<?php echo $member['social_kaggle']; ?>" target="_blank" rel="nofollow" class="network -unlink kaggle">
                                    <i class="fab fa-kaggle"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_linkedin'] ) ): ?>
                                <a href="<?php echo $member['social_linkedin']; ?>" target="_blank" rel="nofollow" class="network -unlink linkedin">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_medium'] ) ): ?>
                                <a href="<?php echo $member['social_medium']; ?>" target="_blank" rel="nofollow" class="network -unlink medium">
                                    <i class="fab fa-medium-m"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_mixer'] ) ): ?>
                                <a href="<?php echo $member['social_mixer']; ?>" target="_blank" rel="nofollow" class="network -unlink mixer">
                                    <i class="fab fa-mixer"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_pinterest'] ) ): ?>
                                <a href="<?php echo $member['social_pinterest']; ?>" target="_blank" rel="nofollow" class="network -unlink pinterest">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_producthunt'] ) ): ?>
                                <a href="<?php echo $member['social_producthunt']; ?>" target="_blank" rel="nofollow" class="network -unlink producthunt">
                                    <i class="fab fa-product-hunt"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_quora'] ) ): ?>
                                <a href="<?php echo $member['social_quora']; ?>" target="_blank" rel="nofollow" class="network -unlink quora">
                                    <i class="fab fa-quora"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_reddit'] ) ): ?>
                                <a href="<?php echo $member['social_reddit']; ?>" target="_blank" rel="nofollow" class="network -unlink reddit">
                                    <i class="fab fa-reddit"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_snapchat'] ) ): ?>
                                <a href="<?php echo $member['social_snapchat']; ?>" target="_blank" rel="nofollow" class="network -unlink snapchat">
                                    <i class="fab fa-snapchat"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_soundcloud'] ) ): ?>
                                <a href="<?php echo $member['social_soundcloud']; ?>" target="_blank" rel="nofollow" class="network -unlink soundcloud">
                                    <i class="fab fa-soundcloud"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_spotify'] ) ): ?>
                                <a href="<?php echo $member['social_spotify']; ?>" target="_blank" rel="nofollow" class="network -unlink spotify">
                                    <i class="fab fa-spotify"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_teamspeak'] ) ): ?>
                                <a href="<?php echo $member['social_teamspeak']; ?>" target="_blank" rel="nofollow" class="network -unlink teamspeak">
                                    <i class="fab fa-teamspeak"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_telegram'] ) ): ?>
                                <a href="<?php echo $member['social_telegram']; ?>" target="_blank" rel="nofollow" class="network -unlink telegram">
                                    <i class="fab fa-telegram-plane"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_tiktok'] ) ): ?>
                                <a href="<?php echo $member['social_tiktok']; ?>" target="_blank" rel="nofollow" class="network -unlink tiktok">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_tripadvisor'] ) ): ?>
                                <a href="<?php echo $member['social_tripadvisor']; ?>" target="_blank" rel="nofollow" class="network -unlink tripadvisor">
                                    <i class="fab fa-tripadvisor"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_tumblr'] ) ): ?>
                                <a href="<?php echo $member['social_tumblr']; ?>" target="_blank" rel="nofollow" class="network -unlink tumblr">
                                    <i class="fab fa-tumblr"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_twitch'] ) ): ?>
                                <a href="<?php echo $member['social_twitch']; ?>" target="_blank" rel="nofollow" class="network -unlink twitch">
                                    <i class="fab fa-twitch"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_twitter'] ) ): ?>
                                <a href="<?php echo $member['social_twitter']; ?>" target="_blank" rel="nofollow" class="network -unlink twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_vimeo'] ) ): ?>
                                <a href="<?php echo $member['social_vimeo']; ?>" target="_blank" rel="nofollow" class="network -unlink vimeo">
                                    <i class="fab fa-vimeo"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_vine'] ) ): ?>
                                <a href="<?php echo $member['social_vine']; ?>" target="_blank" rel="nofollow" class="network -unlink vine">
                                    <i class="fab fa-vine"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_whatsapp'] ) ): ?>
                                <a href="<?php echo $member['social_whatsapp']; ?>" target="_blank" rel="nofollow" class="network -unlink whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_xing'] ) ): ?>
                                <a href="<?php echo $member['social_xing']; ?>" target="_blank" rel="nofollow" class="network -unlink xing">
                                    <i class="fab fa-xing"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_youtube'] ) ): ?>
                                <a href="<?php echo $member['social_youtube']; ?>" target="_blank" rel="nofollow" class="network -unlink youtube">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            <?php endif; ?>
                            
                            <?php if ( !empty( $member['social_fivehundred'] ) ): ?>
                                <a href="<?php echo $member['social_fivehundred']; ?>" target="_blank" rel="nofollow" class="network -unlink 500px">
                                    <i class="fab fa-500px"></i>
                                </a>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </li>
        <li class="team-group-item" data-trigger="true">
            <?php if ( !empty( $member['team_member_image']['url'] ) ) : ?>
                <img
                    src="<?php echo esc_url( $member['team_member_image']['url'] ); ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $member['team_member_image']['id'], 'large' ) ?>"
                    sizes="<?php echo wp_get_attachment_image_sizes( $member['team_member_image']['id'], 'large' ) ?>"
                    alt="<?php echo esc_attr( get_post_meta( $member['team_member_image']['id'], '_wp_attachment_image_alt', true ) ); ?>">
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>