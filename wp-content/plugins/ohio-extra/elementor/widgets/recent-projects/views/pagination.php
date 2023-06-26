<?php 
    if ( !empty( $settings['use_pagination'] ) ) {
        $large_number = 10000000;
        $paginator_pattern = str_replace( $large_number, '{{page}}', get_pagenum_link( $large_number ) );

        echo '<div class="holder">';

            if ( $settings['pagination_type'] == 'simple' || $settings['pagination_type'] == 'standard' ) {

                OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $settings['pagination_position'], $settings['pagination_style'], $settings['pagination_size'] );

            } elseif ( $settings['pagination_type'] == 'lazy_load' ) {

                echo '<div class="lazy-load loading ' . implode( ' ', $additional_classes ) . '" data-lazy-load="scroll" ';
                    echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
                    echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
                    echo 'data-lazy-load-scope="projects">';
                    echo '<button class="button -pagination">';
                        echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
                    echo '</button>';
                echo '</div>';

            } elseif ( $settings['pagination_type'] == 'load_more' ) {

                echo '<div class="lazy-load load-more ' . implode( ' ', $additional_classes ) . '" data-lazy-load="click" ';
                    echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
                    echo 'data-lazy-load-url-pattern="' . esc_attr( $paginator_pattern ) . '" ';
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