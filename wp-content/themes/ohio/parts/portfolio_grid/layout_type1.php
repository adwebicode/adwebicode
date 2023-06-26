<?php
$project = OhioHelper::get_storage_item_data();

$wrapper_classes = '';

if ( $project['equal_height'] ) {
    $wrapper_classes .= ' -metro';
}
if ( $project['drop_shadow'] ) {
    $wrapper_classes .= ' -with-shadow';
}
if ( $project['boxed'] ) {
    $wrapper_classes .= ' -contained';
}
if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

switch ( $project['hover_effect'] ) {
    case 'scale':
        $wrapper_classes .= ' -img-scale';
        break;
    case 'overlay':
        $wrapper_classes .= ' -img-overlay';
        break;
    case 'greyscale':
        $wrapper_classes .= ' -img-greyscale';
        break;
    case 'transition':
        $wrapper_classes .= ' -img-transition';
        break;
    default:
        $wrapper_classes .= '';
}

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

$alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );
switch ( $alignment ) {
    case 'right':
        $wrapper_classes .= ' -right';
        break;
    case 'center':
        $wrapper_classes .= ' -center';
        break;
    default:
        $wrapper_classes .= '';
}

$parallax_data = '';
$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'portfolio_tilt_effect_perspective', 6000 );

if ( $project['tilt_effect'] ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective  . '';
}

?>

<div class="portfolio-item card -layout1<?php echo esc_attr( $wrapper_classes); ?>" <?php if ( $project['in_popup'] ) { echo ' data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; } ?> <?php if ( $project['boxed'] ) { echo esc_attr( $parallax_data ); } ?>>
    <a class="-unlink" href="<?php echo esc_url( $project['url'] ); ?>" <?php if ( $project['external'] ) { echo 'target="_blank"'; } ?> data-cursor-class="cursor-link">
        <div class="image-holder" <?php if ( !$project['boxed'] ) { echo esc_attr( $parallax_data ); } ?>>

            <?php if ( $project['hover_effect'] == 'transition' ) : ?>
                <?php foreach ( $project['images'] as $key => $img ) : ?>
                    <?php if ( $key < 1 ) : ?>
                        <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                    <?php elseif ( $key == 1 ) : ?>
                        <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                    <?php endif ?>
                <?php endforeach; ?>
            <?php else : ?>
                <img src="<?php echo esc_url( $project['featured_image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
            <?php endif; ?>

            <?php if ( $project['in_popup'] ) : ?>
                <div class="overlay-details -top -fade-down">
                    <button class="icon-button -light btn-lightbox">
                        <i class="icon">
                            <svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2V6H2V2H6V0H2C0.9 0 0 0.9 0 2ZM2 12H0V16C0 17.1 0.9 18 2 18H6V16H2V12ZM16 16H12V18H16C17.1 18 18 17.1 18 16V12H16V16ZM16 0H12V2H16V6H18V2C18 0.9 17.1 0 16 0Z"></path></svg>
                            <svg class="minimal" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.427734 1.20793C0.427734 0.77758 0.776603 0.428711 1.20696 0.428711H5.10306C5.53341 0.428711 5.88228 0.77758 5.88228 1.20793C5.88228 1.63828 5.53341 1.98715 5.10306 1.98715H1.98618V5.10404C1.98618 5.53439 1.63731 5.88326 1.20696 5.88326C0.776603 5.88326 0.427734 5.53439 0.427734 5.10404V1.20793ZM12.116 1.20793C12.116 0.77758 12.4649 0.428711 12.8953 0.428711H16.7914C17.2217 0.428711 17.5706 0.77758 17.5706 1.20793V5.10404C17.5706 5.53439 17.2217 5.88326 16.7914 5.88326C16.361 5.88326 16.0121 5.53439 16.0121 5.10404V1.98715H12.8953C12.4649 1.98715 12.116 1.63828 12.116 1.20793ZM1.20696 12.117C1.63731 12.117 1.98618 12.4659 1.98618 12.8962V16.0131H5.10306C5.53341 16.0131 5.88228 16.362 5.88228 16.7923C5.88228 17.2227 5.53341 17.5716 5.10306 17.5716H1.20696C0.776603 17.5716 0.427734 17.2227 0.427734 16.7923V12.8962C0.427734 12.4659 0.776603 12.117 1.20696 12.117ZM16.7914 12.117C17.2217 12.117 17.5706 12.4659 17.5706 12.8962V16.7923C17.5706 17.2227 17.2217 17.5716 16.7914 17.5716H12.8953C12.4649 17.5716 12.116 17.2227 12.116 16.7923C12.116 16.362 12.4649 16.0131 12.8953 16.0131H16.0121V12.8962C16.0121 12.4659 16.361 12.117 16.7914 12.117Z"></path></svg>
                        </i>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ( $project['show_video_button'] && ( isset( $project['video']['link'] ) && !empty( $project['video']['link'] )) ) : ?>
                <div class="video-button -animation open-popup<?php echo esc_attr( $video_button_style_class ); ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                    <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>">
                        <i class="icon">
                            <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                            <svg class="minimal" width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.766274 0.442678C0.998698 0.312329 1.26165 0.24625 1.52808 0.25124C1.79452 0.256229 2.05481 0.332105 2.28219 0.471065L15.78 8.72C15.9993 8.85399 16.1804 9.04206 16.3061 9.26618C16.4318 9.4903 16.4978 9.74295 16.4978 9.99991C16.4978 10.2569 16.4318 10.5095 16.3061 10.7336C16.1804 10.9578 15.9993 11.1458 15.78 11.2798L2.28219 19.5288C2.05481 19.6677 1.79451 19.7436 1.52808 19.7486C1.26165 19.7536 0.9987 19.6875 0.766274 19.5571C0.533848 19.4268 0.340346 19.2369 0.205669 19.0069C0.0709916 18.777 1.3411e-07 18.5153 0 18.2488V1.75098C1.3411e-07 1.48449 0.0709911 1.22282 0.205669 0.992883C0.340347 0.76294 0.533849 0.573027 0.766274 0.442678ZM14.9978 9.99991L1.5 1.75098L1.5 18.2488L14.9978 9.99991Z"></path></svg>
                        </i>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </a>
    <div class="card-details">
        <div class="heading">
            <h4 class="title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>">
                <?php echo esc_html( $project['title'] ); ?>
            </h4>
            <?php if ( $project['category_visible'] ) : ?>
                <div class="show-project">
                    <?php if ( $project['raw_categories'] ) : ?>
                        <div class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="show-project-link -full-w">
                        <a href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
                            echo ' target="_blank"';
                        } ?>>
                            <?php esc_html_e( 'Show project', 'ohio' ); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>