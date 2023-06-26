<?php
/**
 * Ohio WordPress Theme
 *
 * Social bar template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$show_social = OhioOptions::get( 'page_social_links_visibility', true );
$show_social_tablet = OhioOptions::get( 'header_menu_social_links_visibility_tablet', false );
$social_icons = OhioOptions::get_global( 'social_network_type', false );
$external_link = OhioOptions::get_global( 'social_network_target_blank', true );
$link_target = ( $external_link ) ? '_blank' : '_self';

if ( !$show_social ) {
    $show_social = OhioSettings::is_coming_soon_page();
}

$social_classes = '';

if ( $social_icons == 'icons') {
    $social_classes .= ' icons';
}
if ( !$show_social_tablet ) {
    $social_classes .= ' vc_hidden-md';
}

$social_networks_mapping = [
    'artstation' => array( 'icon' => 'fa-artstation', 'text' => esc_html__( 'Art.', 'ohio' ) ),
    'behance' => array( 'icon' => 'fa-behance', 'text' => esc_html__( 'Be.', 'ohio' ) ),
    'deviantart' => array( 'icon' => 'fa-deviantart', 'text' => esc_html__( 'Dev.', 'ohio' ) ),
    'digg' => array( 'icon' => 'fa-digg', 'text' => esc_html__( 'Dg.', 'ohio' ) ),
    'discord' => array( 'icon' => 'fa-discord', 'text' => esc_html__( 'Ds.', 'ohio' ) ),
    'dribbble' => array( 'icon' => 'fa-dribbble', 'text' => esc_html__( 'Dr.', 'ohio' ) ),
    'facebook' => array( 'icon' => 'fa-facebook-f', 'text' => esc_html__( 'Fb.', 'ohio' ) ),
    'flickr' => array( 'icon' => 'fa-flickr', 'text' => esc_html__( 'Fl.', 'ohio' ) ),
    'github' => array( 'icon' => 'fa-github', 'text' => esc_html__( 'Gh.', 'ohio') ),
    'houzz' => array( 'icon' => 'fa-houzz', 'text' => esc_html__( 'Hzz.', 'ohio' ) ),
    'instagram' => array( 'icon' => 'fa-instagram', 'text' => esc_html__( 'Ig.', 'ohio' ) ),
    'kaggle' => array( 'icon' => 'fa-kaggle', 'text' => esc_html__( 'Ka.', 'ohio' ) ),
    'linkedin' => array( 'icon' => 'fa-linkedin', 'text' => esc_html__( 'Lk.', 'ohio' ) ),
    'medium' => array( 'icon' => 'fa-medium-m', 'text' => esc_html__( 'Md.', 'ohio' ) ),
    'mixer' => array( 'icon' => 'fa-mixer', 'text' => esc_html__( 'Mx.', 'ohio' ) ),
    'pinterest' => array( 'icon' => 'fa-pinterest', 'text' => esc_html__( 'Pt.', 'ohio' ) ),
    'producthunt' => array( 'icon' => 'fa-product-hunt', 'text' => esc_html__( 'Ph.', 'ohio' ) ),
    'quora' => array( 'icon' => 'fa-quora', 'text' => esc_html__( 'Qu.', 'ohio' ) ),
    'reddit' => array( 'icon' => 'fa-reddit', 'text' => esc_html__( 'Re.', 'ohio' ) ),
    'snapchat' => array( 'icon' => 'fa-snapchat', 'text' => esc_html__( 'Sn.', 'ohio' ) ),
    'soundcloud' => array( 'icon' => 'fa-soundcloud', 'text' => esc_html__( 'Sc.', 'ohio' ) ),
    'spotify' => array( 'icon' => 'fa-spotify', 'text' => esc_html__( 'Sp.', 'ohio' ) ),
    'teamspeak' => array( 'icon' => 'fa-teamspeak', 'text' => esc_html__( 'Tm.', 'ohio' ) ),
    'telegram' => array( 'icon' => 'fa-telegram-plane', 'text' => esc_html__( 'Tl.', 'ohio' ) ),
    'tiktok' => array( 'icon' => 'fa-tiktok', 'text' => esc_html__( 'Tk.', 'ohio' ) ),
    'tripadvisor' => array( 'icon' => 'fa-tripadvisor', 'text' => esc_html__( 'Ta.', 'ohio' ) ),
    'tumblr' => array( 'icon' => 'fa-tumblr', 'text' => esc_html__( 'Tm.', 'ohio' ) ),
    'twitch' => array( 'icon' => 'fa-twitch', 'text' => esc_html__( 'Tw.', 'ohio' ) ),
    'twitter' => array( 'icon' => 'fa-twitter', 'text' => esc_html__( 'Tw.', 'ohio' ) ),
    'vimeo' => array( 'icon' => 'fa-vimeo', 'text' => esc_html__( 'Vm.', 'ohio' ) ),
    'vine' => array( 'icon' => 'fa-vine', 'text' => esc_html__( 'Vn.', 'ohio' ) ),
    'whatsapp' => array( 'icon' => 'fa-whatsapp', 'text' => esc_html__( 'Wh.', 'ohio' ) ),
    'xing' => array( 'icon' => 'fa-xing', 'text' => esc_html__( 'Xi.', 'ohio' ) ),
    'youtube' => array( 'icon' => 'fa-youtube', 'text' => esc_html__( 'Yt.', 'ohio' ) ),
    '500px' => array( 'icon' => 'fa-500px', 'text' => esc_html__( '500px.', 'ohio' ) ),
];
?>

<?php if ( $show_social ) : ?>
    <div class="social-bar dynamic-typo">
        <ul class="social-bar-holder titles-typo -small-t -unlist<?php echo esc_attr( $social_classes ); ?>"> 
            <li><?php esc_html_e( 'Follow Us', 'ohio' ); ?></li>
            <li>—</li>
            <?php while ( have_rows( 'global_header_menu_social_links', 'option' ) ): the_row(); ?>
                <?php
                    $social_network = get_sub_field( 'social_network' );
                    $social_network_url = get_sub_field( 'url' );
                    $social_network_fields = $social_networks_mapping[$social_network];

                    extract( $social_network_fields );
                ?>
                    <li>
                        <a
                            class="-undash <?php echo $social_network; ?>"
                            href="<?php echo esc_url( $social_network_url ); ?>"
                            target="<?php echo $link_target; ?>"
                            rel="nofollow"
                        >
                            <?php echo $social_icons == 'icons' ? '<i class="fab ' . $icon . '"></i>' : $text; ?>
                        </a>
                    </li>
            <?php endwhile; ?>
        </ul>
    </div>
<?php endif; ?>
