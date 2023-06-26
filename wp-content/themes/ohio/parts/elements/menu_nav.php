<?php
    // Settings
    $menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
    $have_woocomerce = function_exists( 'WC' );
    $have_woocomerce_wl = function_exists( 'YITH_WCWL' );
    $have_wpml = function_exists( 'icl_get_languages' );
    $wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
    $mobile_menu_position = OhioOptions::get_global( 'page_mobile_header_menu_position', 'left' );
    $dropdown_carets_visibility = OhioOptions::get_global( 'page_header_counters_visibility', true );
    $social_icons_mobile = OhioOptions::get_global( 'page_mobile_social_networks_visibility', true );
    $mobile_menu = OhioOptions::get_global( 'page_extended_mobile_menu' );
    $mobile_second_click_link = OhioOptions::get_global( 'page_mobile_second_click_link', false );
    $copyright_text_left = OhioOptions::get_global( 'footer_copyright_left' );
    $copyright_text_right = OhioOptions::get_global( 'footer_copyright_right' );
    $mobile_menu_details = OhioOptions::get_global( 'page_mobile_header_menu_details' );

    $site_navigation_class = '';
    if ( $menu_type == 'hamburger' ) {
        $site_navigation_class .= ' hidden';
    }

    if ( $mobile_menu_position == 'right' ) {
        $site_navigation_class .= ' slide-right';
    }

    if ( $dropdown_carets_visibility ) {
        $site_navigation_class .= ' with-counters';
    }

    if ( $mobile_menu ) {
        $site_navigation_class .= ' with-mobile-menu';
    }
?>

<nav id="site-navigation" class="nav<?php echo esc_attr( $site_navigation_class ); ?>" data-mobile-menu-second-click-link="<?php echo esc_attr( $mobile_second_click_link ); ?>">

    <div class="mobile-overlay menu-mobile-overlay">
        <div class="overlay"></div>
        <div class="close-bar">
            <button class="icon-button -overlay-button" aria-label="close">
                <i class="icon">
                    <svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
                    <svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg>
                </i>
            </button>

            <?php get_template_part( 'parts/elements/search' ); ?>

        </div>
        <div class="holder">
            <div id="mega-menu-wrap" class="nav-container">

                <?php
                    $menu = OhioOptions::get_global( 'page_extended_menu' );

                    if ( $menu ) {
                        $menu_exists = false;
                        $available_menus = wp_get_nav_menus();

                        foreach ( $available_menus as $available_menu) {

                            if ( $menu == $available_menu->term_id) {
                                $menu_exists = true;
                                break;
                            }
                        }

                        if ( !$menu_exists ) {
                            $menu = false;
                        }
                    }

                    if ( $menu ) {
                        wp_nav_menu( [ 'menu' => $menu, 'menu_id' => 'menu-primary' ] );
                    } else {
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'menu-primary' ] );
                        } else {
                            echo '<span class="menu-blank" id="menu-primary">' . sprintf( esc_html__( 'Please, %1$s assign a menu %2$s', 'ohio' ), '<a class="highlighted" target="_blank" href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php">', '</a>' ) . '</span>';
                        }
                    }

                    if ( $mobile_menu ) {
                        wp_nav_menu( [ 'menu' => $mobile_menu, 'menu_id' => 'mobile-menu', 'menu_class' => 'mobile-menu menu' ] );
                    }
                ?>
            </div>
            <div class="copyright">

                <?php
                    if ( empty( $mobile_menu_details ) ) {
                        if ( $copyright_text_left ) {
                            echo '<p>' . wp_kses( $copyright_text_left, 'post' ) . '</p>';
                        }

                        if ( $copyright_text_right ) {
                            echo '<p>' . wp_kses( $copyright_text_right, 'post' ) . '</p>';
                        }
                    } else {
                        echo '<p>' . wp_kses( $mobile_menu_details, 'post' ) . '</p>';
                    }
                ?>

            </div>

            <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
        </div>

        <?php if ( $social_icons_mobile ) {
            get_template_part( 'parts/elements/social_bar' );
        } ?>

    </div>
</nav>
