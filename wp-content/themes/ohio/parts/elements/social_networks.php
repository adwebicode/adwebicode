<?php
    $social_network_icon_mapping = [
        'artstation' => 'fa-artstation',
        'behance' => 'fa-behance',
        'deviantart' => 'fa-deviantart',
        'digg' => 'fa-digg',
        'discord' => 'fa-discord',
        'dribbble' => 'fa-dribbble',
        'facebook' => 'fa-facebook-f',
        'flickr' => 'fa-flickr',
        'github' => 'fa-github-a',
        'houzz' => 'fa-houzz',
        'instagram' => 'fa-instagram',
        'kaggle' => 'fa-kaggle',
        'linkedin' => 'fa-linkedin',
        'medium' => 'fa-medium-m',
        'mixer' => 'fa-mixer',
        'pinterest' => 'fa-pinterest',
        'producthunt' => 'fa-product-hunt',
        'quora' => 'fa-quora',
        'reddit' => 'fa-reddit-a',
        'snapchat' => 'fa-snapchat',
        'soundcloud' => 'fa-soundcloud',
        'spotify' => 'fa-spotify',
        'teamspeak' => 'fa-teamspeak',
        'telegram' => 'fa-telegram-p',
        'tiktok' => 'fa-tiktok',
        'tripadvisor' => 'fa-tripadvisor',
        'tumblr' => 'fa-tumblr',
        'twitch' => 'fa-twitch',
        'twitter' => 'fa-twitter',
        'vimeo' => 'fa-vimeo',
        'vine' => 'fa-vine',
        'whatsapp' => 'fa-whatsapp',
        'xing' => 'fa-xing',
        'youtube' => 'fa-youtube',
        '500px' => 'fa-500px'
    ];

    while ( have_rows( 'global_header_menu_social_links', 'option' ) ) :
        the_row();

        $_network_field = get_sub_field( 'social_network' );
        $network_icon = $social_network_icon_mapping[$_network_field];
        printf( '<a href="%s" target="%s" rel="nofollow" class="network -unlink %s">', esc_url( get_sub_field( 'url' ) ), '_blank', esc_attr( $_network_field ) );
            ?>
                <i class="fab <?php echo $network_icon; ?>"></i>
            <?php
        echo '</a>';
    endwhile;
?>