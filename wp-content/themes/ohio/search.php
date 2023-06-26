<?php
/**
 * Ohio WordPress Theme
 *
 * Search page template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme header
 */
get_header();

// Get theme options
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'left' );

$sidebar_page_class = '';
if ( $sidebar_position == 'left' ) {
    $sidebar_page_class = ' -with-left-sidebar';
} elseif ( $sidebar_position == 'right' ) {
    $sidebar_page_class = ' -with-right-sidebar';
}

$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );
$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' -' . $sidebar_layout;
}

$equal_height = OhioOptions::get( 'blog_equal_height' );
$tilt_effect = OhioOptions::get( 'blog_tilt_effect' );

// Portfolio theme options

$show_video_button = OhioOptions::get( 'portfolio_video_visibility', true );
$video_button_style = OhioOptions::get( 'portfolio_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'portfolio_video_button_size', 'default' );
$portfolio_tilt_effect = OhioOptions::get( 'portfolio_tilt_effect' );

$boxed = OhioOptions::get( 'blog_items_boxed_style' );
if ( !is_bool( $boxed ) ) {
    if ( $boxed == 'default' ) $boxed = false;
    else $boxed = true;
}

$alignment = OhioOptions::get( 'posts_text_alignment' );
$hover_effect = OhioOptions::get( 'blog_item_hover_type', 'type1' );
$meta_visibility = array(
    'author_visibility' => OhioOptions::get( 'posts_author_visibility', true ),
    'category_visibility' =>  OhioOptions::get( 'posts_category_visibility', true ),
    'short_description_visibility' => OhioOptions::get( 'posts_short_description_visibility', true ),
    'read_more_visibility' => OhioOptions::get( 'posts_read_more_visibility', true ),
    'reading_time_visibility' => OhioOptions::get( 'posts_reading_time_visibility', true ),
    'date_visibility' => OhioOptions::get( 'posts_date_visibility', true )
);

$posts_grid = OhioOptions::get_global( 'blog_page_layout', 'masonry' );
if ( $posts_grid == 'masonry' ) {
    OhioHelper::add_required_script( 'masonry' );
}
$grid_style_class = ( $posts_grid == 'masonry' ) ? 'ohio-masonry' : 'blog-posts-classic';

$posts_layout_item = OhioOptions::get_global( 'blog_item_layout_type', 'blog_grid_1' );

if ( $posts_layout_item == 'blog_grid_6' ) {
    $grid_style_class .= ' no-margins';
}

$animation_type = OhioOptions::get( 'page_animation_type', 'default' );
$animation_effect = OhioOptions::get( 'page_animation_effect', 'fade-up' );
$animation_once = OhioOptions::get( 'page_animation_once' );

$projects_layout_item = OhioOptions::get_global( 'project_item_layout_type', 'grid_1' );
if ( $projects_layout_item != 'grid_2') {
    $projects_layout_item = 'grid_1';
}

$project_animation_type = OhioOptions::get_global( 'portfolio_page_animation_type' );
$project_animation_effect = OhioOptions::get_global( 'portfolio_page_animation_effect' );
$open_in_popup = OhioOptions::get_global( 'portfolio_projects_in_popup' );
$portfolio_equal_height = OhioOptions::get_global( 'portfolio_equal_height', false );
$columns_num = OhioOptions::get_global( 'blog_columns_in_row', '2-2-1' );
$columns_class = OhioHelper::parse_columns_to_css( $columns_num, false );
$columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true );
$posts_without_paddings = OhioOptions::get( 'grid_items_without_padding', false );

$grid_offset_class = '';
if ( $posts_without_paddings ) {
    $grid_offset_class .= ' -nospace';
}

$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );
$published_posts = $GLOBALS['wp_query']->found_posts;
$pagination_page = OhioHelper::get_current_pagenum();
$posts_per_page = OhioSettings::posts_per_page();
$posts_offset = ( $pagination_page - 1 ) * $posts_per_page;
$paginator_all = ceil( $published_posts / (int) $posts_per_page );
$pagination_type = OhioOptions::get( 'pagination_type', 'standard' );
$pagination_style = OhioOptions::get( 'pagination_style', 'default' );
$pagination_position = OhioOptions::get( 'pagination_position', 'left' );
$pagination_size = OhioOptions::get( 'pagination_size', 'medium' );

if ( $published_posts > 0 ) :

?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>

<?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

<div class="page-container bottom-offset<?php if ( !$show_breadcrumbs ) { echo ' top-offset'; } if ( !$page_wrapped ) { echo ' -full-w'; } ?>">
    <div id="primary" class="content-area">

        <?php if ( $sidebar_position == 'left' ) : ?>

            <div class="page-sidebar -left<?php echo esc_attr($sidebar_class ); ?>">
                <aside id="secondary" class="widgets">
                    <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                </aside>
            </div>

        <?php endif; ?>

        <div class="page-content<?php echo esc_attr( $sidebar_page_class ); ?>">
            <main id="main" class="site-main">
                <div class="vc_row archive-holder search-page <?php echo esc_attr( $grid_style_class . $grid_offset_class ); ?>" data-lazy-container="posts">

                <?php
                global $wp_query;
                    $_post_i = 0;

                    // Portfolio Grid
                    while ( have_posts() ) : the_post();

                        switch ( $post->post_type ) {

                            case 'ohio_portfolio': // projects
                                $parsed_post = OhioObjectParser::parse_to_project_object( $post, NULL, $_post_i + 1 );
                                $parsed_post['in_popup'] = $open_in_popup;
                                $parsed_post['show_video_button'] = $show_video_button;
                                $parsed_post['video_button_style'] = $video_button_style;
                                $parsed_post['video_button_size'] = $video_button_size;
                                $parsed_post['tilt_effect'] = $portfolio_tilt_effect;
                                $parsed_post['equal_height'] = $portfolio_equal_height;
                                OhioHelper::set_storage_item_data( $parsed_post );

                                $col_class = $columns_class;
                                $grid_class = ' grid-item';

                                if ( $parsed_post['grid_style'] == '2col' ) {
                                    $col_class = $columns_double_class;
                                }

                                // Animation calculating
                                $_anim_attrs = '';

                                echo '<div class="' . esc_attr( $col_class . $grid_class . $grid_offset_class ) . ' masonry-block" ' . esc_attr( $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';
                                switch ( $projects_layout_item ) {
                                    case 'grid_1':
                                        get_template_part( 'parts/portfolio_grid/layout_type1' );
                                        break;
                                    case 'grid_2':
                                        get_template_part( 'parts/portfolio_grid/layout_type2' );
                                        break;
                                    case 'grid_3':
                                        get_template_part( 'parts/portfolio_grid/layout_type3' );
                                        break;
                                    case 'grid_4':
                                        get_template_part( 'parts/portfolio_grid/layout_type4' );
                                        break;
                                    case 'grid_5':
                                        get_template_part( 'parts/portfolio_grid/layout_type5' );
                                        break;
                                    case 'grid_6':
                                        get_template_part( 'parts/portfolio_grid/layout_type6' );
                                        break;
                                    case 'grid_7':
                                        get_template_part( 'parts/portfolio_grid/layout_type7' );
                                        break;
                                    case 'grid_8':
                                        get_template_part( 'parts/portfolio_grid/layout_type8' );
                                        break;
                                    default:
                                        get_template_part( 'parts/portfolio_grid/layout_type1' );
                                        break;
                                }

                                if ( $open_in_popup ) {
                                    OhioHelper::set_storage_item_data( $parsed_post );
                                    ob_start();
                                    get_template_part( 'parts/portfolio_grid/lightbox' );
                                    OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
                                }

                                echo '</div>';
                                break;

                            default: // default post or undefined custom

                                $post->metro = $equal_height;
                                $parsed_post = OhioObjectParser::parse_to_post_object( $post, NULL, $_post_i + 1 );
                                $parsed_post['equal_height'] = $equal_height;
                                $parsed_post['boxed'] = $boxed;
                                $parsed_post['tilt_effect'] = $tilt_effect;
                                $parsed_post['alignment'] = $alignment;
                                $parsed_post['hover_effect'] = $hover_effect;
                                $parsed_post['meta_visibility'] = $meta_visibility;
                                OhioHelper::set_storage_item_data( $parsed_post );

                                if ( $posts_layout_item == 'blog_grid_6' ) {
                                    $col_class = 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12';
                                } else {
                                    $col_class = $columns_class;
                                }

                                $grid_class = ' grid-item';

                                if ( $posts_layout_item == 'blog_grid_6' ) {
                                    $grid_class .= ' -nospace';
                                }

                                if ( $parsed_post['grid_style'] == '2col' ) {
                                    $col_class = $columns_double_class;
                                }

                                // Animation calculating
                                $_anim_attrs = '';
                                if ( in_array( $animation_type, array( 'sync', 'async' ) ) ) {
                                    OhioHelper::add_required_script( 'aos' );

                                    if ( !$animation_once ) {
                                        $_anim_attrs .= ' data-aos-once="true"';
                                    }
                                    $_anim_attrs .= ' data-aos="' . $animation_effect . '"';
                                    if ( $animation_type == 'async' ) {
                                        $columns_num = (int) substr( $columns_num, 0, 1 );
                                        if ( $columns_num <= 0 ) { $columns_num = 1; }
                                        $_delay = ( 400 / $columns_num ) * ( $_post_i % $columns_num );
                                        $_delay = (int) $_delay - ( $_delay % 50 );
                                        $_anim_attrs .= ' data-aos-delay="' . $_delay . '"';
                                    }
                                }
                                
                                echo '<div class="' . esc_attr( $col_class . $grid_class . ( ( $posts_grid == 'masonry' ) ? ' masonry-block' : '' ) ) . '" ' . $_anim_attrs . ' data-lazy-item="" data-lazy-scope="posts">';

                                switch ( $posts_layout_item ) {
                                    case 'blog_grid_1':
                                        get_template_part( 'parts/blog_grid/layout_type1' );
                                        break;
                                    case 'blog_grid_2':
                                        get_template_part( 'parts/blog_grid/layout_type2' );
                                        break;
                                    case 'blog_grid_3':
                                        get_template_part( 'parts/blog_grid/layout_type3' );
                                        break;
                                    case 'blog_grid_4':
                                        get_template_part( 'parts/blog_grid/layout_type4' );
                                        break;
                                    case 'blog_grid_5':
                                        get_template_part( 'parts/blog_grid/layout_type5' );
                                        break;
                                    case 'blog_grid_6':
                                        get_template_part( 'parts/blog_grid/layout_type6' );
                                        break;
                                    default:
                                        get_template_part( 'parts/blog_grid/layout_type1' );
                                        break;
                                }
                                echo '</div>';

                            break;
                        }

                        $_post_i++;

                    endwhile;

                    wp_reset_query();
                ?>
                </div>

                <?php
                    OhioHelper::show_pagination( $pagination_type, $paginator_all, $pagination_page, $pagination_position, $pagination_style, $pagination_size );
                ?>
                
            </main>
        </div>

        <?php if ( $sidebar_position == 'right' ) : ?>

            <div class="page-sidebar sidebar-right<?php echo esc_attr($sidebar_class ); ?>">
                <aside id="secondary" class="widgets">
                    <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                </aside>
            </div>

        <?php endif; ?>

    </div>
</div>

<?php else : ?>

    <?php get_template_part( 'parts/content', 'none' ); ?>

<?php endif; ?>

<?php

/**
 * Theme footer
 */
get_footer();
