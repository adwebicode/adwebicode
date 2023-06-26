<?php 
global $post, $wp_embed;

# Project settings
$project = OhioObjectParser::parse_to_project_object( $post );
$show_headline = OhioOptions::get( 'project_show_headline', true );

# Header previous button
$previous_btn = OhioOptions::get_global( 'page_header_previous_button', true );

# Page container settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$add_content_padding = OhioOptions::get( 'page_add_top_padding', true );
$show_header_title = OhioOptions::get( 'page_header_title_visibility', true );
$header_blank_spacer = OhioOptions::get( 'page_header_add_cap', true );
$page_container_class = '';
$custom_page_container_class = '';

if ( !$show_breadcrumbs && $add_content_padding ) {
    $page_container_class .= ' top-offset'; 
}
if ( !$page_wrapped ) {
    $page_container_class .= ' -full-w';
}
if ( $add_content_padding ) {
    $page_container_class .= ' bottom-offset';
}
if ( $show_breadcrumbs ) {
    get_template_part( 'parts/elements/breadcrumbs' );
}

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

<div class="project-page project -layout7<?php echo esc_attr( $page_container_class ); ?>">
    <div class="page-container">

        <?php if ( $show_headline || isset( $project['raw_categories'] ) || isset( $project['date'] ) || !empty( $project['description'] ) || isset( $project['task'] ) || isset( $project['strategy'] ) || isset( $project['design'] ) || isset( $project['client'] ) || isset( $project['custom_fields'] ) || !empty( $project['tags'] ) || isset( $project['link'] ) ) : ?>
        <div class="project-content">
            <div class="holder">
                <div class="vc_row">
                    <div class="vc_col-md-5">
                        <?php if ( !$show_header_title ) : ?>
                            <?php 
                                OhioHelper::set_storage_item_data( $project ); 
                                get_template_part( 'parts/portfolio/components/headline' ); 
                            ?>
                        <?php endif; ?>
                        <div class="project-details">
                            <?php echo $wp_embed->run_shortcode( do_shortcode( wp_kses_post( $project['description'] ) ) ); ?>

                            <?php 
                                if ( $project['custom_content_position'] == 'after_description' ) {
                                    the_content();
                                }
                            ?>
                        </div>
                    </div>
                    <div class="vc_col-md-push-1 vc_col-md-6">
                        <?php 
                            OhioHelper::set_storage_item_data( $project ); 
                            get_template_part( 'parts/portfolio/components/task' ); 
                        ?>
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
        </div>
        <?php endif; ?>

        <div class="project-gallery">
            <?php get_template_part( 'parts/portfolio/components/gallery' ); ?>
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

<?php if ( !$show_header_title ) : ?>
    <?php if ( $previous_btn ) : ?>
        <?php get_template_part( 'parts/elements/back_link' ); ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ( $project['show_navigation'] ) {
    get_template_part( 'parts/elements/nav_projects' );
}?>