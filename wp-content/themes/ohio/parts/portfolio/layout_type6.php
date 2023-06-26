<?php
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object( $post );

if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

$is_featured_image = OhioOptions::get( 'project_add_featured_on_page', true );

if ( !$is_featured_image ) {
	if ( $project['featured_image'] ) {
		array_shift( $project['images'] );
	}
}

$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'project_video_button_size', 'default' );
$video_cover = OhioOptions::get( 'project_video_cover', false );
$video_cover_fit = OhioOptions::get( 'project_video_cover_fit', true );

# Header previous button
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

# Slider options
$navBtn = OhioOptions::get( 'project_nav_visibility' );
$loop = OhioOptions::get( 'project_loop_mode' );
$autoplay = OhioOptions::get( 'project_autoplay_mode' );
$autoplayTimeout = OhioOptions::get( 'project_autoplay_interval', '', NULL, true );
$pagination = OhioOptions::get( 'project_bullets_visibility', true );

$slider_pagination_data = '';
if ( $pagination ) {
    $slider_pagination_type = OhioOptions::get( 'project_bullets_type');
    if ( $slider_pagination_type == 'bullets' ) {
        $slider_pagination_data = 'data-slider-dots="true"';
    } else if ( $slider_pagination_type == 'pagination' ) {
        $slider_pagination_data = 'data-slider-pagination="true"';
    }
}

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$image_scroll_effect = OhioOptions::get( 'project_gallery_scrolling_effect', true );

$page_container_class = '';
$custom_page_container_class = '';
$paralax_bg_attr = '';
if ( !$show_breadcrumbs && $add_content_padding ) {
    $page_container_class .= ' top-offset';
}
if ( !$page_wrapped ) {
    $page_container_class .= ' -full-w';
    $custom_page_container_class .= ' -full-w';
}
if ( $add_content_padding ) {
    $page_container_class .= ' bottom-offset';
}

if ( $show_breadcrumbs ) {
    get_template_part( 'parts/elements/breadcrumbs');
}

if ( $image_scroll_effect == 'scale' ) {
    $page_container_class .= ' scroll-scale-image';
    $paralax_bg_attr = 'class=scale-bg';
} else if ( $image_scroll_effect == 'parallax' ) {
    $paralax_bg_attr = 'class=parallax data-parallax-bg=vertical data-parallax-speed=.5';
}

$is_slider = count( $project['images'] ) > 1 || ( count( $project['images'] ) && $video_cover );

wp_reset_query();
?>

<?php if ( $project['custom_content_position'] == 'top' ) : ?>
    <div class="page-container <?php echo esc_attr( $custom_page_container_class ); ?>">
        <div class="project-custom">
            <?php 
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<div class="project-page project -layout6<?php echo esc_attr( $page_container_class ); ?>">
    <div class="project-gallery -with-slider">
        <div class="project-slider -slider-fs" <?php echo $is_slider ? 'data-portfolio-grid-slider' : '' ?> data-slider-navigation="<?php echo esc_attr( $navBtn ); ?>" data-slider-loop="<?php echo esc_attr( $loop ); ?>" data-slider-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-slider-autoplay-time="<?php echo esc_attr( $autoplayTimeout ); ?>" <?php echo esc_attr( $slider_pagination_data ); ?>>
            
            <?php if ( $video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                <div <?php echo esc_attr( $paralax_bg_attr ); ?>>
                    <div class="video-holder <?php echo esc_attr( $image_scroll_effect == 'parallax' ? 'parallax-bg' : '' ); ?><?php if ( $video_cover_fit ) { echo esc_attr( ' -cover' ); } ?>">
                        <iframe src="<?php echo esc_url( $project['video']['link'] ); ?>" frameborder="0"/></iframe>
                        <div class="overlay"></div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ( is_array( $project['images'] ) ) : ?>
                <?php foreach ( $project['images'] as $art ) : ?>
                    <div <?php echo esc_attr( $paralax_bg_attr ); ?>>
                        <div class="project-image <?php echo esc_attr( $image_scroll_effect == 'parallax' ? 'parallax-bg' : '' ); ?>"
                            style="background-image: url( '<?php echo esc_url( $art['url'] ); ?>' )"
                            alt="<?php echo esc_attr( $art['alt'] ); ?>">
                            <div class="overlay"></div>
                        </div> 
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
    <div class="project-content -with-slider">
        <div class="page-container<?php echo esc_attr( $page_container_class ); ?>">
            <div class="vc_row">
                <div class="vc_col-md-7">
                    <div class="holder animated-holder">
                        <?php if ( !$video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                            <div class="video-button -animation open-popup<?php if ( $video_button_style != 'default' ) { echo ' -' . $video_button_style . ''; } ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                                <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>">
                                    <i class="icon">
                                        <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                                        <svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg>
                                    </i>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php 
                            OhioHelper::set_storage_item_data( $project ); 
                            get_template_part( 'parts/portfolio/components/headline' ); 
                        ?>
                        <div class="project-details">
                            <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>

                            <?php 
                                if ( $project['custom_content_position'] == 'after_description' ) {
                                    the_content();
                                }
                            ?>
                        </div>
                        <?php 
                            OhioHelper::set_storage_item_data( $project ); 
                            get_template_part( 'parts/portfolio/components/options_group' ); 
                        ?>
                        <?php if ( !empty( $project['link'] ) ) : ?>
                            <a class="button -text -unlink" target="_blank" href="<?php echo esc_url( $project['link'] ); ?>">
                                <?php esc_html_e( 'Open Project', 'ohio' ); ?>
                                <i class="icon -right">
                                    <svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
                                    <svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path>
                                    </svg>
                                </i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>
                <div class="share-bar">
                    <div class="social-networks -small">
                        <?php printf( '%s', $project['sharing_links_html'] ); ?>
                    </div>  
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if ( $project['custom_content_position'] == 'bottom' ) : ?>
    <div class="page-container <?php echo esc_attr( $custom_page_container_class ); ?>">
        <div class="project-custom">
            <?php 
                the_content();
            ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( $previous_btn ) : ?>
    <?php get_template_part( 'parts/elements/back_link' ); ?>
<?php endif; ?>

<?php if ( $project['show_navigation'] ) {
    get_template_part( 'parts/elements/nav_projects' );
}?>