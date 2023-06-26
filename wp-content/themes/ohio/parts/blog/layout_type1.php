<?php

# Post settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$show_headline = OhioOptions::get( 'page_header_title_visibility', true );
$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );
$share = OhioOptions::get( 'post_social_visibility', true );

$sidebar_row_class = '';

if ( $sidebar_position == 'right' ) {
    $sidebar_row_class = ' -with-right-sidebar';
} elseif ( $sidebar_position == 'left' ) {
    $sidebar_row_class = ' -with-left-sidebar';
}
$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );

$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' -' . $sidebar_layout;
}

$page_container_class = '';
    if ( !$show_breadcrumbs && $show_headline ) {
        $page_container_class .= ' top-offset';
    }
    if ( !$page_wrapped ) {
        $page_container_class .= ' -full-w';
    }
?>

<div class="-layout1">

    <?php get_template_part( 'parts/elements/page_headline' ); ?>

    <div class="page-container post-page-container<?php echo esc_attr( $page_container_class ); ?>" id='scroll-content'>

        <div class="post-share -sticky-block" >
            <?php 
                if ( $share ) {
                    do_shortcode( '[ohio_share_blog]' );
                }
            ?>
        </div>

        

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