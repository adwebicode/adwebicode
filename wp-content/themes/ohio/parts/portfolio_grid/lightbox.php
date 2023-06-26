<?php
    $project = OhioHelper::get_storage_item_data();

    if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
        $project['images'] = $project['images_full'];
    }

    $is_feature_as_gallery = isset( $project['images'][0] )
        && $project['featured_image_full'] == $project['images'][0]['url'];

    $show_featured_image = $project['featured_as_gallery_item'];

    if ( $project['is_featured_image'] ) {
        if ( !$show_featured_image ) {
            array_shift( $project['images'] );
        }
    }

    $has_video_in_lightbox = !empty( $project['video']['link'] ) && $project['video']['show_in_lightbox'];
    $is_slider = count( $project['images'] ) > 1
        || ( count( $project['images'] ) === 1 && ! $is_feature_as_gallery )
        || ( count( $project['images'] ) && $has_video_in_lightbox );


    $show_description = OhioOptions::get_global( 'portfolio_gallery_description', true );
    $show_details = OhioOptions::get_global( 'portfolio_gallery_details', true );
    $view_text = OhioOptions::get_global( 'portfolio_lightbox_link_text', 'View Project' );
    
    $navigation_visibility = OhioOptions::get_global( 'lightbox_nav_visibility', true );
    $bullets_visibility = OhioOptions::get_global( 'lightbox_bullets_visibility', true );
    $loop_mode = OhioOptions::get_global( 'lightbox_loop_mode', true );
    $autoplay_mode = OhioOptions::get_global( 'lightbox_autoplay_mode', true );
    $autoplay_interval = OhioOptions::get_global( 'lightbox_autoplay_interval', 5000 );
    $mousewheel_scrolling = OhioOptions::get_global( 'lightbox_mousewheel_mode', true );

    if ( $project ) :

?>
<div class="clb-popup project-lightbox" id="<?php echo esc_attr( $project['popup_id'] ); ?>" data-lazy-to-footer="true">
    <div class="project-lightbox-gallery">
        <div class="slider -slider-lightbox" <?php $is_slider ? esc_attr_e('data-clb-portfolio-lightbox-slider', 'ohio') : '' ?> data-slider-navigation="<?php echo esc_attr( $navigation_visibility); ?>" data-slider-pagination="<?php echo esc_attr( $bullets_visibility); ?>" data-slider-loop="<?php echo esc_attr( $loop_mode); ?>" data-slider-mousescroll="<?php echo esc_attr( $mousewheel_scrolling); ?>" data-slider-autoplay="<?php echo esc_attr( $autoplay_mode); ?>" data-slider-autoplay-time="<?php echo esc_attr( $autoplay_interval); ?>" data-slider-autoplay-pause="">
        
            <?php if ( $has_video_in_lightbox ) : ?>
                <div class="portfolio-lightbox-video" data-lightbox-video-url="<?php echo esc_url( $project['video']['link'] ); ?>">
                    <?php if ( in_array( $project['video']['type'], ['youtube', 'vimeo'])) : ?>
                        <iframe data-lightbox-video-target frameborder="0"/></iframe>
                    <?php else : ?>
                        <video data-lightbox-video-target autoplay muted loop></video>
                    <?php endif; ?>

                    <div class="overlay"></div>
                </div>
            <?php endif; ?>

            <?php if ( $project['images'] ) :  ?>
                <?php foreach ( $project['images'] as $i => $art ) : ?>
                    <div class="portfolio-lightbox-image" <?php echo ' data-ohio-lightbox-image="' . esc_url( $art['url'] ) . '"'; ?>></div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="portfolio-lightbox-image" <?php echo ' data-ohio-lightbox-image="' . $project['featured_image'] . '"'; ?>></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="project-lightbox-details">
        <div class="close-bar -right-flex">
            <button class="icon-button -light" aria-label="close">
                <i class="icon">
                    <svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
                    <svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg>
                </i>
            </button>
        </div>
        <div class="project-content animated-holder">
            <div class="headline-meta">
                <?php if ( OhioOptions::get_global( 'lightbox_category_visibility' ) ) : ?>
                    <?php if ( $project['raw_categories'] ) : ?>
                        <div class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( OhioOptions::get_global( 'lightbox_date_visibility' ) ) : ?>
                    <span class="date"><?php echo esc_html( $project['date'] ); ?></span>
                <?php endif; ?>
            </div>
            <div class="project-title">
                <h2 class="headline title">
                    <?php echo esc_html( $project['title'] ); ?>
                </h2>   
            </div>
            <?php if ( $show_description ) : ?>
                <div class="project-details">
                    <p>
                        <?php $project['short_lightbox_description'] = strip_tags( $project['short_lightbox_description'] ); ?>
                        <?php echo wp_kses( $project['short_lightbox_description'], 'post' ); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ( $show_details ) : ?>
                <ul class="project-meta options-group -unlist">

                    <?php if ( $project['strategy'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Strategy', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['strategy'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['design'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Design', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['design'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['client'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Client', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['client'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['custom_fields'] ) : ?>
                        <?php foreach ( $project['custom_fields'] as $custom_field ) : ?>
                        <li>
                            <h6 class="title"><?php echo esc_html( $custom_field['title'] ); ?></h6>
                            <p><?php echo esc_html( $custom_field['value'] ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ( $project['raw_tags'] ) { ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Tags', 'ohio' ); ?></h6>
                            <p>
                                <?php if ( $project['raw_tags'] ) : ?>
                                    <?php foreach ( $project['raw_tags'] as $i => $tag ) : ?>
                                        <a href="<?php echo esc_url( get_term_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a><?php
                                            if ( $i < count( $project['raw_tags']) - 1 ) echo ', ';
                                        ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </p>
                        </li>
                    <?php } ?>
                </ul>
            <?php endif; ?>

            <?php if ( $project['show_view_link_in_popup'] ) : ?>
                <a class="button -text -unlink" href="<?php echo esc_url( $project['url'] ); ?>"<?php echo esc_attr( $project['external'] ) ? ' target="_blank"' : ''?>>
                    <?php echo esc_html( $view_text, 'ohio' ); ?>
                    <i class="icon -right">
                        <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                        <svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
                    </i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif;