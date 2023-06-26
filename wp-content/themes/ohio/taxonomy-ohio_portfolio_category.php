<?php
/**
 * Ohio WordPress Theme
 *
 * Category taxonomy template
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
$published_posts = $GLOBALS['wp_query']->found_posts;
$pagination_page = OhioHelper::get_current_pagenum();
$posts_per_page = OhioSettings::posts_per_page();
$posts_offset = ( $pagination_page - 1 ) * $posts_per_page;
$paginator_all = ceil( $published_posts / (int) $posts_per_page );
$pagination_type = OhioOptions::get( 'pagination_type', 'standard' );
$pagination_style = OhioOptions::get( 'pagination_style', 'default' );
$pagination_position = OhioOptions::get( 'pagination_position', 'left' );
$pagination_size = OhioOptions::get( 'pagination_size', 'medium' );

$posts_show_from = $posts_offset + 1;
$posts_show_to = $posts_offset + $posts_per_page;
if ( $posts_show_to > $published_posts ) {
	$posts_show_to = $published_posts;
}

// Sidebar
$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );

$sidebar_page_classes = ['page-content', 'content-area'];

if ( is_active_sidebar( 'ohio-sidebar-blog' ) ) {
	if ( $sidebar_position == 'left' ) {
		$sidebar_page_classes[] = '-with-left-sidebar';
	}
	if ( $sidebar_position == 'right' ) {
		$sidebar_page_classes[] = '-with-right-sidebar';
	}
}

$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );
$sidebar_class = '';
if ( $sidebar_layout ) {
	$sidebar_class .= ' -' . $sidebar_layout;
}

$page_wrapped = OhioOptions::get( 'page_add_wrapper', true );

// Grid style
OhioHelper::add_required_script( 'masonry' );
$grid_style_class = 'ohio-masonry';

$projects_layout_item = OhioOptions::get_global( 'portfolio_item_layout_type', 'grid_1' );
$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );
$show_video_button = OhioOptions::get( 'portfolio_video_visibility', true );
$video_button_style = OhioOptions::get( 'portfolio_video_button_style', 'default' );
$video_button_size = OhioOptions::get( 'portfolio_video_button_size', 'default' );

// Columns
$columns_num = OhioOptions::get_global( 'portfolio_columns_in_row', '2-2-1' );
$columns_class = OhioHelper::parse_columns_to_css( $columns_num, false );
$columns_double_class = OhioHelper::parse_columns_to_css( $columns_num, true );

$grid_offset_class = '';
$posts_without_paddings = OhioOptions::get_global( 'portfolio_grid_items_without_padding', false );
if ( $posts_without_paddings ) {
	$grid_offset_class .= ' -nospace';
}

$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );

$page_container_class = '';
if ( !$show_breadcrumbs ) {
	$page_container_class .= ' top-offset';
}
if ( !$page_wrapped ) {
	$page_container_class .= ' -full-w';
}

$equal_height = OhioOptions::get( 'portfolio_equal_height' );
$boxed = OhioOptions::get( 'portfolio_items_boxed_style', true );
if ( !is_bool( $boxed ) ) {
	if ( $boxed == 'default' ) $boxed = false;
	else $boxed = true;
}
$show_view_link_in_popup = OhioOptions::get_global( 'portfolio_lightbox_link', true );
$open_in_popup = OhioOptions::get_global( 'portfolio_projects_in_popup', true );
$alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );
$hover_effect = OhioOptions::get_global( 'portfolio_grid_hover', 'global' );
$animation_type = OhioOptions::get( 'page_animation_type', 'sync' );
$animation_effect = OhioOptions::get( 'page_animation_effect' );
$animation_once = OhioOptions::get( 'page_animation_once' );
$meta_visibility = array(
    'author_visibility' => OhioOptions::get( 'posts_author_visibility', true ),
    'category_visibility' =>  OhioOptions::get( 'posts_category_visibility', true ),
    'short_description_visibility' => OhioOptions::get( 'posts_short_description_visibility', true ),
    'read_more_visibility' => OhioOptions::get( 'posts_read_more_visibility', true ),
    'reading_time_visibility' => OhioOptions::get( 'posts_reading_time_visibility', true ),
    'date_visibility' => OhioOptions::get( 'posts_date_visibility', true )
);

if ( have_posts() ) :

?>

<?php get_template_part( 'parts/elements/page_headline' ); ?>
<?php get_template_part( 'parts/elements/breadcrumbs' ); ?>

<div class="page-container bottom-offset<?php echo esc_attr( $page_container_class ); ?>">
	<?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'left' ) : ?>
		<div class="page-sidebar -left<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widgets">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
	<?php endif; ?>

	<div id="primary" class="<?php echo implode( ' ', $sidebar_page_classes ); ?>">
		<main id="main" class="site-main">
			<div class="vc_row portfolio-grid <?php echo esc_attr( $grid_style_class . $grid_offset_class ); ?>" data-lazy-container="posts">
				<?php
				$_post_i = 0;
				while ( have_posts() ) : the_post();

					$parsed_post = OhioObjectParser::parse_to_project_object( $post, NULL, $_post_i + 1 );
					$parsed_post['in_popup'] = $open_in_popup;
					$parsed_post['boxed'] = ($boxed) ? 'boxed' : '';
					$parsed_post['hover_effect'] = $hover_effect;
					$parsed_post['equal_height'] = $equal_height;
					$parsed_post['tilt_effect'] = $tilt_effect;
					$parsed_post['show_video_button'] = $show_video_button;
					$parsed_post['video_button_style'] = $video_button_style;
					$parsed_post['video_button_size'] = $video_button_size;

					OhioHelper::set_storage_item_data( $parsed_post );

					$col_class = $columns_class;
					$grid_class = ' grid-item';

					// if ( $parsed_post['grid_style'] == '2col' ) {
					//     $col_class = $columns_double_class;
					// }

					// Animation calculating
					$_anim_attrs = '';
					if ( in_array( $animation_type, array( 'sync', 'async' ) ) ) {
						OhioHelper::add_required_script( 'aos' );

						$_anim_attrs .= ' data-aos-once="true"';
						$_anim_attrs .= ' data-aos="' . $parsed_post['animation_effect'] . '"';
						if ( $animation_type == 'async' ) {
							$columns_num = (int) substr( $columns_num, 0, 1);
							$_delay = ( 400 / $columns_num ) * ( $_post_i % $columns_num );
							$_delay = (int) $_delay - ( $_delay % 50 );
							$_anim_attrs .= ' data-aos-delay="' . $_delay . '"';
						}
					}

					echo '<div class="' . esc_attr( $col_class ) . ' masonry-block' . esc_attr( $grid_class . $grid_offset_class ) . '" ' . esc_attr( $_anim_attrs ) . ' data-lazy-item="" data-lazy-scope="posts">';
					switch ( $projects_layout_item ) {
						case 'grid_1':
							get_template_part( 'parts/portfolio_grid/layout_type1' );
							break;
						case 'grid_2':
							get_template_part( 'parts/portfolio_grid/layout_type2' );
							break;
						case 'grid_11':
							get_template_part( 'parts/portfolio_grid/layout_type11' );
							break;
						case 'grid_13':
							get_template_part( 'parts/portfolio_grid/layout_type13' );
							break;
						default:
							get_template_part( 'parts/portfolio_grid/layout_type1' );
							break;
					}

					if ( $open_in_popup ) {
						$parsed_post['show_view_link_in_popup'] = $show_view_link_in_popup;

						OhioHelper::set_storage_item_data( $parsed_post );
						ob_start();
						get_template_part( 'parts/portfolio_grid/lightbox' );
						OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
					}

					echo '</div>';

					$_post_i++;
				endwhile;
				?>
			</div>

			<?php
				OhioHelper::show_pagination( $pagination_type, $paginator_all, $pagination_page, $pagination_position, $pagination_style, $pagination_size );
			?>
		</main>
	</div>

	<?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'right' ) : ?>
		<div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
			<aside id="secondary" class="widgets">
				<?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
			</aside>
		</div>
	<?php endif; ?>

</div>

<?php else : ?>

	<?php get_template_part( 'parts/content', 'none' ); ?>

<?php endif; ?>

<?php

/**
 * Theme footer
 */
get_footer();
