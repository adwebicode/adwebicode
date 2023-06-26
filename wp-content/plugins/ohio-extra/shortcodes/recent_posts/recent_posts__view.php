<?php

/**
* WPBakery Page Builder Ohio Blog Posts shortcode view
*/

global $post;
?>

<?php 
	$asymmetric_atts = "";

	if ($asymmetric_parallax) {
		
		$_columns_in_row = (int) substr( $columns_in_row, 0, 1);
		$asymmetric_atts = ' data-asymmetric-parallax-grid=true data-grid-number='. $column_asymmetric_grid .' data-asymmetric-parallax-speed='. $asymmetric_parallax_speed . '';
	}
?>

<div class="ohio-widget blog-posts vc_row<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?> data-lazy-container="posts">
	
	<?php
		$pagination_page = OhioExtraParser::get_current_pagenum();
		$items_per_page = intval( $pagination_items_per_page );

		// Calculate pagination
		$_post_start = 0;
		$_post_end = count( $posts_data );

		if ( $use_pagination ) {
			// TODO: Looks weird, need rework
			$_post_start = $pagination_page * $items_per_page - $items_per_page;

			if ( $_post_end > $_post_start + $items_per_page ) {
				$_post_end = $_post_start + $items_per_page;
			}
		}

		for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) {
			$_post_object = $posts_data[ $_post_i ];

			setup_postdata($_post_object);
			$post = $_post_object;
			$post->image_size = $blog_images_size;
			$ohio_post = OhioObjectParser::parse_to_post_object( $_post_object, 'recent_posts', $_post_i + 1 );
			$ohio_post['boxed'] = $card_boxed;
			$ohio_post['hover_effect'] = $card_effect;
			$ohio_post['tilt_effect'] = $tilt_effect;
			$ohio_post['drop_shadow'] = $drop_shadow;
			$ohio_post['equal_height'] = $metro_style;
			$ohio_post['meta_visibility'] =  array(
				'author_visibility' => true,
				'category_visibility' =>  true,
				'short_description_visibility' => $short_description,
				'read_more_visibility' => $show_read_more,
				'reading_time_visibility' => true,
				'date_visibility' => true
			);

			OhioHelper::set_storage_item_data( $ohio_post );

			if ( $card_layout == 'blog_grid_6' ) {
				$col_class = '';
				$col_class .= 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12';

				if ( $card_boxed == false ) {
					$col_class .= ' -nospace';
				}

			} else {
				$col_class = $column_class;
			}
			//$col_class = $column_class;
			if ( $ohio_post['grid_style'] == '2col' ) {
				$col_class = $column_double_class;
			}
			// Animation calculating
			echo '<div class="' . $col_class . ' masonry-block' . (( $ohio_post['grid_style'] != '2col' ) ? ' grid-item' : '') . '" data-lazy-item="" data-lazy-scope="posts">';

			$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_in_row, 0, 1), $_post_i );
			if ( $_anim_attrs ) echo '<div ' . implode( ' ', $_anim_attrs ) . '>';

			switch ( $card_layout ) {
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

			if ( $_anim_attrs ) echo '</div>';

			echo '</div>';
		}
		wp_reset_postdata();
	?>
</div>

<?php 
	if ( $use_pagination ) {
		$pages_count = ceil( count( $posts_data ) / $items_per_page );

		echo '<div class="holder" id="' . esc_attr( $wrapper_id ) . '">';

			if ( $pagination_type == 'simple' || $pagination_type == 'standard'  ) {

				OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $pagination_position, $pagination_style, $pagination_size );

			} elseif ( $pagination_type == 'lazy_scroll' ) {

				echo '<div class="lazy-load loading ' . implode( ' ', $additional_classes ) . '" data-lazy-load="scroll" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="posts">';
					echo '<button class="button -pagination">';
						echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
					echo '</button>';
				echo '</div>';

			}  elseif ( $pagination_type == 'lazy_button' ) {

				echo '<div class="lazy-load load-more ' . implode( ' ', $additional_classes ) . '" data-lazy-load="click" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="posts">';
					echo '<button class="button -pagination">';
						echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
						echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
					echo '</button>';
				echo '</div>';
			}

		echo '</div>';
	}
?>
