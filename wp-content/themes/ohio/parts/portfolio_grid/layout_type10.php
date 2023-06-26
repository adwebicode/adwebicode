<?php
$project = OhioHelper::get_storage_item_data();

$video_button_style = $project['video_button_style'];
switch ( $video_button_style ) {
    case 'outlined':
        $video_button_style_class = ' -outlined';
        break;
    case 'blurred':
        $video_button_style_class = ' -blurred';
        break;
    default:
        $video_button_style_class = '';
}

$video_button_size = $project['video_button_size'];
switch ( $video_button_size ) {
    case 'small':
        $video_button_size_class = ' -small';
        break;
    case 'large':
        $video_button_size_class = ' -large';
        break;
    default:
        $video_button_size_class = '';
}

$fullscreen_mode = $project['fullscreen_mode'];
$fullscreen_class = '';

if ( $fullscreen_mode ) {
    $fullscreen_class .= ' -full-vh';
}

$parallax_data = '';
$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'portfolio_tilt_effect_perspective', 6000 );

if ( $project['tilt_effect'] ) {
    $parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective  . '';
}

?>

<div class="portfolio-item -with-slider -with-gradient -layout10<?php echo esc_attr( $fullscreen_class ); ?>" <?php if ( $project['in_popup'] ) { echo ' data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; } ?>>
    <div class="overlay-image -full-h -full-w" <?php echo ' data-ohio-bg-image="' . esc_url( $project['featured_image'] ) . '"'; ?>>
        <div class="headline-decor">
            <span class="title -decor"><?php echo esc_html( $project['title'] ); ?></span>
        </div>
        <div class="page-container -full-h">
            <div class="vc_col-md-10 vc_col-md-push-1 preview" <?php echo esc_attr( $parallax_data ); ?>>
                <div class="portfolio-item-image -full-h" <?php echo ' data-ohio-bg-image="' . esc_url( $project['featured_image'] ) . '"'; ?>></div>
            </div>
            <div class="project-content animated-holder vc_col-md-6">
                <?php if ( $project['show_video_button'] && ( isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) ) : ?>
                    <div class="video-button -animation open-popup<?php echo esc_attr( $video_button_style_class ); ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                        <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>">
                            <i class="icon">
                                <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                                <svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg>
                            </i>
                        </button>
                    </div>
                <?php endif; ?>
                
                <?php if ( $project['category_visible'] || $project['date_visible'] ) : ?>
                    <div class="headline-meta">
                        <?php if ( $project['category_visible'] ) : ?>
                        <span class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </span>
                        <?php endif; ?>
                        <?php if ( $project['date_visible'] ) : ?>
                            <span class="date <?php if ( isset( $date_class ) ) echo esc_attr( $date_class ); ?>"><?php echo esc_html( $project['date'] ); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <a class="project-title -unlink" href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
                    echo ' target="_blank"';
                } ?>>
                    <h2 class="headline <?php if ( isset( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
                </a>

                <?php if ( OhioOptions::get_global( 'portfolio_descr_visibility' ) ) : ?>
                    <div class="project-details">
                        <p class="<?php if ( isset( $short_description_class ) ) echo esc_attr( $short_description_class ); ?>"><?php echo esc_html( $project['short_description'] ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( $project['more_visible'] !== false ) : ?>
                    <a class="button -text -unlink <?php if ( $project['in_popup'] ) echo 'btn-lightbox '; if ( isset( $more_class ) ) echo esc_attr( $more_class ); ?>" href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
                            echo ' target="_blank"';
                        } ?>>
                        <?php esc_html_e( 'Show Project', 'ohio' ); ?>
                        <i class="icon -right">
                            <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                            <svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
                        </i>
                    </a>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
