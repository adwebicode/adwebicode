<div class="portfolio-onepage-slider -slider-fs clb-slider-scroll-bar <?php echo esc_attr( $settings['card_layout'] ); ?>" 
    data-lazy-container="projects"
    data-portfolio-grid-slider="true"
    data-slider-navigation="<?php if ( $settings['navigation_visibility'] ) { echo 'true'; } ?>"
    data-slider-pagination="<?php if ( $settings['bullets_visibility'] ) { echo 'true'; } ?>"
    data-slider-loop="<?php if ( $settings['loop_mode'] ) { echo 'true'; } ?>"
    data-slider-mousescroll="<?php if ( $settings['mousewheel_scroll'] ) { echo 'true'; } ?>" 
    data-slider-autoplay="<?php if ( $settings['autoplay_mode'] ) { echo 'true'; } ?>"
    data-slider-autoplay-time="<?php if ( $settings['autoplay_mode'] ) { echo $settings['autoplay_timeout']; } ?>"
    data-slider-vertical-orientation="<?php if ( $settings['slider_direction'] == 'vertical' ) { echo 'true'; } ?>"
    data-slider-vertical-orientation-mobile="<?php if ( $settings['slider_direction_mobile'] == 'vertical' ) { echo 'true'; } ?>"
    <?php if ( $settings['card_layout'] == 'grid_6' ) echo 'data-slider-columns="' . $columns_in_row . '"'; ?>
    data-tilt-effect="<?php if ( $settings['tilt_effect'] ) { echo 'true'; } ?>">

    <?php
        foreach ( $projects_data as $_project_index => $_project_object ) {
            $ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
            $ohio_project['in_popup'] = $settings['lightbox_visibility'];
            $ohio_project['show_video_button'] = $settings['show_video_button'];
            $ohio_project['video_button_style'] = $settings['video_button_style'];
            $ohio_project['video_button_size'] = $settings['video_button_size'];
            $ohio_project['tilt_effect'] = $settings['tilt_effect'];
            $ohio_project['fullscreen_mode'] = $settings['fullscreen_mode'];

            if ( $_project_index == 0 ) {
                $_last_project = OhioObjectParser::parse_to_project_object( $projects_data[count( $projects_data ) - 1] );
                $ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
            } else {
                $ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
            }
            $_prev_item_featured_image = $ohio_project['featured_image'];

            OhioHelper::set_storage_item_data( $ohio_project );

            switch ( $settings['card_layout'] ) {
                case 'grid_3': include( locate_template( 'parts/portfolio_grid/layout_type3.php' ) ); break;
                case 'grid_4': include( locate_template( 'parts/portfolio_grid/layout_type4.php' ) ); break;
                case 'grid_5': include( locate_template( 'parts/portfolio_grid/layout_type5.php' ) ); break;
                case 'grid_6': include( locate_template( 'parts/portfolio_grid/layout_type6.php' ) ); break;
                case 'grid_7': include( locate_template( 'parts/portfolio_grid/layout_type7.php' ) ); break;
                case 'grid_9': include( locate_template( 'parts/portfolio_grid/layout_type9.php' ) ); break;
                case 'grid_10': include( locate_template( 'parts/portfolio_grid/layout_type10.php' ) ); break;

                default: include( locate_template( 'parts/portfolio_grid/layout_type3.php' ) ); break;
            }

            if ( $settings['lightbox_visibility'] ) {
                // TODO: Update it?
                $ohio_project['show_view_link_in_popup'] = true;
                ob_start();
                OhioHelper::set_storage_item_data( $ohio_project );
                include( locate_template( 'parts/portfolio_grid/lightbox.php' ) );
                OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
            }
        }
    ?>

</div>
<div class="scroll-bar-container <?php echo esc_attr( $settings['card_layout'] )?>">
    <div class="page-container">
        <div <?php if ( $settings['card_layout'] == 'grid_9' ) { echo 'class="vc_col-md-5 vc_col-md-push-7"'; } ?>>
            <div class="scroll-top clb-slider-scroll-top vc_hidden-md vc_hidden-sm vc_hidden-xs">
                <div class="scroll-top-bar">
                    <div class="scroll-track"></div>
                </div>
                <div class="scroll-top-holder titles-typo">
                    <?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>