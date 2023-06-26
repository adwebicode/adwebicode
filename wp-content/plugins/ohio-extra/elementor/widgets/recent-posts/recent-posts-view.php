<div class="blog-posts ohio-widget vc_row <?php echo $this->getWrapperClasses(); ?>" data-lazy-container="posts">

	<?php 
		// Calculate pagination
		$_post_start = 0;
		$_post_end = count( $posts_data );

		if ( !empty( $settings['use_pagination'] ) ) {
			// TODO: Looks weird, need rework
			$items_per_page = ( !empty( $settings['items_per_page'] ) ) ? $settings['items_per_page']['size'] : 6;
			$_post_start = $pagination_page * $items_per_page - $items_per_page;

			if ( $_post_end > $_post_start + $items_per_page ) {
				$_post_end = $_post_start + $items_per_page;
			}
		}

		for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) {
			$_post_object = $posts_data[ $_post_i ];

			$_post_object->image_size = $settings['blog_images_size'];
			setup_postdata($_post_object);

			$ohio_post = OhioObjectParser::parse_to_post_object( $_post_object, 'recent_posts', $_post_i + 1 );
			$ohio_post['boxed'] = $settings['use_boxed_layout'];
			$ohio_post['equal_height'] = $settings['use_metro_style'];
			$ohio_post['hover_effect'] = $settings['card_effect'];
			$ohio_post['tilt_effect'] = $settings['tilt_effect'];
			$ohio_post['drop_shadow'] = $settings['drop_shadow'];
			$ohio_post['meta_visibility'] = [
				'author_visibility' => true,
				'category_visibility' =>  true,
				'short_description_visibility' => (bool)$settings['show_short_description'],
				'read_more_visibility' => (bool)$settings['show_read_more'],
				'reading_time_visibility' => true,
				'date_visibility' => true
			];
			OhioHelper::set_storage_item_data( $ohio_post );
			
			if ( $settings['block_type_layout'] == 'blog_grid_6' ) {
				$col_class = '';
				$col_class .= 'vc_col-lg-12 vc_col-md-12 vc_col-xs-12';

				if ( $settings['use_boxed_layout'] == false ) {
					$col_class .= ' -nospace';
				}
			} else {
				$col_class = $column_class;
			}
			
			if ( $ohio_post['grid_style'] == '2col' ) {
				$col_class = $column_double_class;
			}
			
			echo '<div class="' . $col_class . ' masonry-block';
				echo (( $ohio_post['grid_style'] != '2col' ) ? ' grid-item' : '') . '" data-lazy-item="" data-lazy-scope="posts">';

				// Animation calculating
				if ( empty( $settings['items_per_row_desktop'] ) ) {
					$settings['items_per_row_desktop'] = 1;
				}
				$anim_attrs = OhioHelper::get_AOS_animation_attrs( $settings['animation_type'], $settings['animation_effect'], $settings['items_per_row_desktop'] , $_post_i );

				if ( $anim_attrs ) echo '<div ' . implode( ' ', $anim_attrs ) . '>';

				switch ( $settings['block_type_layout'] ) {
					case 'blog_grid_1': get_template_part( 'parts/blog_grid/layout_type1' ); break;
					case 'blog_grid_2': get_template_part( 'parts/blog_grid/layout_type2' ); break;
					case 'blog_grid_3': get_template_part( 'parts/blog_grid/layout_type3' ); break;
					case 'blog_grid_4': get_template_part( 'parts/blog_grid/layout_type4' ); break;
					case 'blog_grid_5': get_template_part( 'parts/blog_grid/layout_type5' ); break;
					case 'blog_grid_6': get_template_part( 'parts/blog_grid/layout_type6' ); break;
					default:            get_template_part( 'parts/blog_grid/layout_type1' ); break;
				}

				if ( $anim_attrs ) echo '</div>';

			echo '</div>';
		}

		wp_reset_postdata();
	?>

</div>

<?php 
	if ( !empty( $settings['use_pagination'] ) ) {
		$pages_count = ceil( count( $posts_data ) / $items_per_page );
		$large_number = 10000000;
		$paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );

		echo '<div class="holder">';

			if ( $settings['pagination_type'] == 'simple' || $settings['pagination_type'] == 'standard' ) {

	            OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $settings['pagination_position'], $settings['pagination_style'], $settings['pagination_size'] );

	        } elseif ( $settings['pagination_type'] == 'lazy_load' ) {

	            echo '<div class="lazy-load loading ' . implode( ' ', $additional_classes ) . '" data-lazy-load="scroll" ';
		            echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
		            echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
		            echo 'data-lazy-load-scope="posts">';
		            echo '<button class="button -pagination">';
		            	echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
		            echo '</button>';
	            echo '</div>';

	        } elseif ( $settings['pagination_type'] == 'load_more' ) {

	            echo '<div class="lazy-load load-more ' . implode( ' ', $additional_classes ) . '" data-lazy-load="click" ';
		            echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
		            echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
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