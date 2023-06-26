<?php

# Post settings
$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );
$share = OhioOptions::get( 'post_social_visibility', true );
$page_headline = OhioOptions::get( 'page_header_title', 'featured_image' );

$post_classes = '';
if ( $page_headline['background_type'] != 'inherit' ) {
    $post_classes .= ' -with-featured-image';
}

$sidebar_row_class = '';
if ( $sidebar_position == 'left' ) {
    $sidebar_row_class = ' -with-left-sidebar';
} elseif ( $sidebar_position == 'right' ) {
    $sidebar_row_class = ' -with-right-sidebar';
}

$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );

$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' -' . $sidebar_layout;
}

?>

<div class="-layout2<?php echo esc_attr( $sidebar_row_class . $post_classes ); ?>">
    <div class="vc_row">
        <div class="post-meta -sticky-block">
            <?php get_template_part( 'parts/elements/page_headline' ); ?>

            <div class="post-share" >
                <?php 
                    if ( $share ) {
                        do_shortcode( '[ohio_share_blog]' );
                    }
                ?>
            </div>
        </div>
        <div class="post-content">
            <?php get_template_part( 'parts/elements/breadcrumbs' ); ?>
                
            <?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'left' ) : ?>

                <div class="page-sidebar -left<?php echo esc_attr( $sidebar_class ); ?>">
                    <aside id="secondary" class="widgets">
                        <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                    </aside>
                </div>

            <?php endif; ?>

            <div class="page-content<?php echo esc_attr( $sidebar_row_class ); ?>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main page-offset-bottom">
                        <div class="vc_row">
                            <div class="vc_col-lg-12">
                                <?php get_template_part( 'parts/content', get_post_format() ); ?>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'right' ) : ?>

                <div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
                    <aside id="secondary" class="widgets">
                        <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                    </aside>
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>
