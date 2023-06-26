<?php 
global $post, $wp_embed;

$project = OhioObjectParser::parse_to_project_object( $post );
$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'project_video_button_size', 'default' );
$video_cover = OhioOptions::get( 'project_video_cover', false );
$video_cover_fit = OhioOptions::get( 'project_video_cover_fit', true );
$video_type = OhioOptions::get( 'project_video_type' );

$video_params = '';
if ( $video_type == 'custom' ) {

    $video_params .= 'data-video-type=custom';
    $video_autoplay = OhioOptions::get( 'project_video_autoplay' );
    $video_muted = OhioOptions::get( 'project_video_muted' );
    $video_controls = OhioOptions::get( 'project_video_controls' );

    if ( $video_autoplay ) {
        $video_params .= ' autoplay=autoplay';
    }
    if ( $video_muted ) {
        $video_params .= ' muted=muted';
    }
    if ( $video_controls ) {
        $video_params .= ' controls=controls';
    }
}

if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

$is_featured_image = OhioOptions::get( 'project_add_featured_on_page', true );

if ( !$is_featured_image ) {
    if ( $project['featured_image'] ) {
        array_shift( $project['images'] );
    }
}

wp_reset_query();
?>

<?php if ( is_array( $project['images'] ) ) : ?>

	<?php foreach ( $project['images'] as $key => $art ) : ?>

        <?php if ( $key == 0 ) : ?>

            <?php if ( $video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>

                <div class="video-holder -visible<?php if ( $video_cover_fit ) { echo esc_attr( ' -cover' ); } if ( $video_type == 'custom' ) { echo esc_attr( ' -custom' ); } ?>">
                    
                    <?php if ( $video_type == 'custom' ) : ?>
                        <video <?php echo esc_attr( $video_params ); ?>>
                            <source src="<?php echo esc_url( $project['video']['link'] ); ?>">
                        </video>
                    <?php else : ?>
                        <iframe src="<?php echo esc_url( $project['video']['link'] ); ?>" frameborder="0"/></iframe>
                    <?php endif; ?>
                    <div class="overlay"></div>
                </div>
             
            <?php endif; ?>

            <div class="first-image">
                <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">
                <?php if ( !$video_cover && isset( $project['video']['link'] ) && !empty( $project['video']['link'] ) ) : ?>
                    <div class="video-button -animation open-popup<?php if ( $video_button_style != 'default' ) { echo ' -' . $video_button_style . ''; } ?>" <?php echo esc_attr( $video_params ); ?> data-video="<?php echo esc_url( $project['video']['link'] ); ?>">

                        <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>">
                            <i class="icon">
                                <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                                <svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg>
                            </i>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

        <?php else : ?>

            <img src="<?php echo esc_url( $art['url'] ); ?>" alt="<?php echo esc_attr( $art['alt'] ); ?>">

        <?php endif ?>

    <?php endforeach; ?>

<?php endif; ?>

<?php if ( $project['show_sharing'] && $project['sharing_links'] && count( $project['sharing_links'] ) > 0 ) : ?>

    <div class="share-bar -vertical">
        <div class="social-networks -small">
            <?php printf( '%s', $project['sharing_links_html'] ); ?>
        </div>  
    </div>
    
<?php endif; ?>