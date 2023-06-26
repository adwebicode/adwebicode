<?php
$have_wpml = function_exists( 'icl_get_languages' );
$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
$fullscreen_have_social = OhioOptions::get_global( 'page_hamburger_social_networks_visibility', true );
$fullscreen_have_lang = OhioOptions::get_global( 'page_hamburger_lang_switcher_visibility', true );
$header_overlay_footer_has_left = have_rows( 'global_page_overlay_menu_footer_items_left', 'option' );
$menu_position = OhioOptions::get_global( 'page_header_menu_position', 'left', true );
$in_new_tab = OhioOptions::get_global( 'social_network_target_blank', true );
$links_target = ( $in_new_tab ) ? '_blank' : '_self';
$social_link_type = OhioOptions::get_global( 'page_hamburger_menu_social_networks_type', 'default', true );
$social_link_type_class = '';

if ( $social_link_type != 'default' ) {
	$social_link_type_class = '-'.$social_link_type;
}
?>

<div class="clb-popup hamburger-nav">
    <div class="close-bar -<?php echo esc_attr( $menu_position ); ?>-flex">
        <button class="icon-button -light" aria-label="close">
		    <i class="icon">
		    	<svg class="default" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
		    	<svg class="minimal" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 0.244806C16.0816 0.571215 16.0816 1.10043 15.7552 1.42684L1.42684 15.7552C1.10043 16.0816 0.571215 16.0816 0.244806 15.7552C-0.0816021 15.4288 -0.0816021 14.8996 0.244806 14.5732L14.5732 0.244806C14.8996 -0.0816019 15.4288 -0.0816019 15.7552 0.244806Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M15.7552 15.7552C15.4288 16.0816 14.8996 16.0816 14.5732 15.7552L0.244807 1.42684C-0.0816013 1.10043 -0.0816013 0.571215 0.244807 0.244806C0.571215 -0.0816021 1.10043 -0.0816021 1.42684 0.244806L15.7552 14.5732C16.0816 14.8996 16.0816 15.4288 15.7552 15.7552Z"></path></svg>
		    </i>
		</button>
    </div>
    <div class="hamburger-nav-holder">
        <?php
            $menu = OhioOptions::get_global( 'page_hamburger_menu' );

            if ( is_nav_menu( $menu ) ) {
                wp_nav_menu( [ 'menu' => $menu, 'menu_id' => 'secondary-menu' ] );
            } else {
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'secondary-menu' ] );
                } else {
                    echo '<span class="menu-blank">' . sprintf( esc_html__( 'Please, %1$sassign a menu%2$s', 'ohio' ), '<a class="highlighted" target="_blank" href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php">', '</a>' ) . '</span>';
                }
            }
        ?>
    </div>
    <div class="hamburger-nav-details">
		<?php if ( $have_wpml && $wpml_show_in_header && $fullscreen_have_lang ) : ?>
			<div class="details-column">
				<?php get_template_part( 'parts/elements/lang_dropdown' ); ?>  
			</div>
		<?php endif; ?>

		<?php while ( have_rows( 'global_page_overlay_menu_footer_items_left', 'option' ) ): the_row(); ?>
			<div class="details-column">
				<?php echo wp_kses( get_sub_field( 'items' ), 'post' ); ?>
			</div>
		<?php endwhile; ?>

		<?php if ( $fullscreen_have_social ) : ?>
			<div class="details-column social-networks <?php echo esc_attr( $social_link_type_class ); ?>">
				<?php get_template_part( 'parts/elements/social_networks' ); ?>
			</div>
		<?php endif; ?>
    </div>
</div>