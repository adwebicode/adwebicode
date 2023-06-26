<?php

/**
* WPBakery Page Builder Ohio Portfolio Projects shortcode view
*/

?>

<div class="ohio-widget portfolio-projects<?php echo esc_attr( $wrapper_classes ); ?> <?php if ( $is_slider ) echo 'vc_row'; ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs); ?> data-ohio-portfolio-grid="true">

	<?php if ( $card_layout == 'grid_8' || $card_layout == 'grid_12' ): ?>
		<div class="project-content">
            <div class="portfolio-grid-images"<?php if ( $card_layout == 'grid_8'): ?> data-vc-full-width="true" data-vc-stretch-content="true" <?php endif; ?>></div>
        </div>
	<?php endif; ?>

	<?php if ( $show_projects_filter && !$is_slider ) : ?>

		<?php
			if ( is_array( $projects_category ) ) {
				if ( is_string( $projects_category[0] ) ) {
					$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category', 'slug' => $projects_category ) );
				} else {
					$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category', 'include' => $projects_category ) );
				}
			} else {
				$cat_ids = get_terms( array( 'taxonomy' => 'ohio_portfolio_category' ) );
			}
			if ( is_array( $cat_ids ) && $cat_ids ) :
		?>

		<div class="portfolio-filter<?php echo esc_attr( $filter_classes ); ?>"
		data-filter="portfolio"
		<?php if ( $filter_is_paged ) { echo 'data-filter-paged="true"'; } ?>
		>
			<ul class="-unlist">
				<li><?php esc_html_e( 'Filter by', 'ohio-extra' ) ?></li>
				<li>
                    <a class="active" href="#all" data-isotope-filter="*" data-category-count="<?php echo str_pad( (string)$all_projects_count, 2, '0', STR_PAD_LEFT ); ?>">
                        <span class="name"><?php esc_html_e( 'All', 'ohio-extra' ); ?></span>
                        <span class="num"><?php echo str_pad( (string)$all_projects_count, 2, '0', STR_PAD_LEFT ); ?></span>
                    </a>
                </li>
				<?php foreach ( $cat_ids as $cat_obj ) : ?>
					<?php
						if ( $filter_is_paged
							&& !$show_empty_categories
							&& !in_array( $cat_obj->term_id, $category_id_allowlist )
						) continue;
					?>
					<li> /
						<a href="#<?php echo esc_attr( $cat_obj->slug ); ?>" data-isotope-filter=".ohio-filter-project-<?php echo hash( 'md4', $cat_obj->slug, false ); ?>" data-category-count="<?php echo esc_attr( $cat_obj->count);?>">
							<span class="name"><?php echo esc_html( $cat_obj->name ); ?></span>
							<span class="num"><?php echo str_pad( (string)esc_html( $cat_obj->count ), 2, '0', STR_PAD_LEFT ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

	<?php endif; ?>

	<?php endif; ?>

	<?php if ( !$is_slider ) : ?>

		<?php if ( $card_layout == 'grid_12' ): ?>
			<div class="portfolio-grid-holder">
		<?php endif; ?>

		<div class="vc_row portfolio-grid" data-isotope-grid="true" data-lazy-container="projects" data-projects-per-page="<?php echo esc_attr( $projects_in_block); ?>">

			<?php

				// Calculate pagination
				$_post_start = 0;
				$_post_end = count( $projects_data );

				if ( $use_pagination ) {
					// TODO: Looks weird, need rework
					$_post_start = $pagination_page * $per_page - $per_page;

					if ( $_post_end > $_post_start + $per_page ) {
						$_post_end = $_post_start + $per_page;
					}
				}
				$_prev_item_featured_image = '';
			?>

			<?php for ( $_post_i = $_post_start; $_post_i < $_post_end; $_post_i++ ) : ?>
			<?php
				$_project_object = $projects_data[$_post_i];
				$_project_object->image_size = $portfolio_images_size;
				$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
				$ohio_project['equal_height'] = $metro_style;
				$ohio_project['in_popup'] = $lightbox_visibility;
				$ohio_project['show_video_button'] = $show_video_button;
				$ohio_project['video_button_style'] = $video_button_style;
				$ohio_project['video_button_size'] = $video_button_size;

				if ( $_post_i == 0) {
					$_last_project = OhioObjectParser::parse_to_project_object( $projects_data[$_post_end - 1] );
					$ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
				} else {
					$ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
				}

				$_prev_item_featured_image = $ohio_project['featured_image'];
				if ( $card_layout == 'grid_1' || $card_layout == 'grid_2' || $card_layout == 'grid_11' || $card_layout == 'grid_13' ) {
					
					$ohio_project['boxed'] = $card_boxed_layout;
					$ohio_project['equal_height'] = $metro_style;
					$ohio_project['tilt_effect'] = $tilt_effect;
					$ohio_project['drop_shadow'] = $drop_shadow;
					$ohio_project['hover_effect'] = $card_effect;
				}

				OhioHelper::set_storage_item_data( $ohio_project );
				$col_class = '';
				if ( $card_layout != 'grid_8' && $card_layout != 'grid_12' ) {
					$col_class = $column_class;
					if ( $ohio_project['grid_style'] == '2col') {
						$col_class = $column_double_class;
						$col_class .= ' double-width';
					}
				}

				// Animation calculating
				echo '<div class="portfolio-item-wrap masonry-block' . ' grid-item ' . $col_class . ( ( $projects_solid ) ? ' post-offset' : ' ' ) . $ohio_project['categories_group'] . '" data-lazy-item="" data-lazy-scope="projects">';

				$_anim_attrs = OhioHelper::get_AOS_animation_attrs( $animation_type, $animation_effect, (int) substr( $columns_in_row, 0, 1), $_post_i );
				if ( $_anim_attrs ) echo '<div ' .implode( ' ', $_anim_attrs ) . '>';

				switch ( $card_layout ) {
					case 'grid_1':
						get_template_part( 'parts/portfolio_grid/layout_type1' );
						break;
					case 'grid_2':
						get_template_part( 'parts/portfolio_grid/layout_type2' );
						break;
					case 'grid_8':
						get_template_part( 'parts/portfolio_grid/layout_type8' );
						break;
					case 'grid_11':
						get_template_part( 'parts/portfolio_grid/layout_type11' );
						break;
					case 'grid_12':
						get_template_part( 'parts/portfolio_grid/layout_type12' );
						break;
					case 'grid_13':
						get_template_part( 'parts/portfolio_grid/layout_type13' );
						break;
					default:
						get_template_part( 'parts/portfolio_grid/layout_type1' );
						break;
				}

				if ( $_anim_attrs ) echo '</div>';

				if ( $lightbox_visibility ) {
					$ohio_project['show_view_link_in_popup'] = true;
					ob_start();
					OhioHelper::set_storage_item_data( $ohio_project );
					get_template_part( 'parts/portfolio_grid/lightbox' );
					OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
				}
			?>
			</div>
		<?php endfor; ?>
		</div>

		<?php if ( $card_layout == 'grid_12' ): ?>
			<div class="portfolio-grid-holder-underline"></div>
		</div>
		<?php endif; ?>

	<?php else : ?>
		<div class="portfolio-onepage-slider -slider-fs clb-slider-scroll-bar <?php echo esc_attr( $card_layout ); ?>" <?php echo esc_attr( $slider_attrs); ?>>

			<?php
				$_prev_item_featured_image = "";
				foreach ( $projects_data as $_project_index => $_project_object ) {
					$ohio_project = OhioObjectParser::parse_to_project_object( $_project_object );
					$ohio_project['in_popup'] = $lightbox_visibility;
					$ohio_project['show_video_button'] = $show_video_button;
					$ohio_project['video_button_style'] = $video_button_style;
					$ohio_project['video_button_size'] = $video_button_size;
					$ohio_project['tilt_effect'] = $tilt_effect;
					$ohio_project['fullscreen_mode'] = $fullscreen_mode;
					
					if ( $card_layout == 'grid_9' ) {
						if ( $_project_index == 0 ) {
							$_last_project = OhioObjectParser::parse_to_project_object( $projects_data[count( $projects_data ) - 1] );
							$ohio_project['prev_item_featured_image'] = $_last_project['featured_image'];
						} else {
							$ohio_project['prev_item_featured_image'] = $_prev_item_featured_image;
						}

						$_prev_item_featured_image = $ohio_project['featured_image'];
					}

					OhioHelper::set_storage_item_data( $ohio_project );

					switch ( $card_layout ) {
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
						case 'grid_9':
							get_template_part( 'parts/portfolio_grid/layout_type9' );
							break;
						case 'grid_10':
							get_template_part( 'parts/portfolio_grid/layout_type10' );
							break;
						default:
							get_template_part( 'parts/portfolio_grid/layout_type3' );
							break;
					}

					if ( $lightbox_visibility ) {
						$ohio_project['show_view_link_in_popup'] = true;
						ob_start();
						OhioHelper::set_storage_item_data( $ohio_project );
						get_template_part( 'parts/portfolio_grid/lightbox' );
						OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
					}
				}
			?>

		</div>

	<?php endif; ?>

	<?php 
		if ( $use_pagination ) {
			
			echo '<div class="holder" id="' . esc_attr( $wrapper_id ) . '">';

				if ( $pagination_type == 'simple' || $pagination_type == 'standard'  ) {

					OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $pagination_position, $pagination_style, $pagination_size );

				} elseif ( $pagination_type == 'lazy_scroll' ) {

					echo '<div class="lazy-load loading ' . implode( ' ', $additional_classes ) . '" data-lazy-load="scroll" ';
						echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
						echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
						echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
						echo 'data-lazy-load-scope="projects">';
						echo '<button class="button -pagination">';
							echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
						echo '</button>';
					echo '</div>';

				}  elseif ( $pagination_type == 'lazy_button' ) {

					echo '<div class="lazy-load load-more ' . implode( ' ', $additional_classes ) . '" data-lazy-load="click" ';
						echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
						echo 'data-lazy-load-shortcode="' . esc_attr( $sc64 ) . '" ';
						echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
						echo 'data-lazy-load-scope="projects">';
						echo '<button class="button -pagination">';
							echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
							echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
						echo '</button>';
					echo '</div>';
				}

			echo '</div>';
		}
	?>

</div>

<?php if ( $is_slider && $fullscreen_mode ) : ?>
	<div class="scroll-bar-container <?php echo esc_attr( $card_layout )?>">
	    <div class="page-container">
	        <div <?php if ( $card_layout == 'grid_9' ) { echo 'class="vc_col-md-5 vc_col-md-push-7"'; } ?>>
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
<?php endif; ?>