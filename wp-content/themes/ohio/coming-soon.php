<?php
/**
 * Ohio WordPress Theme
 *
 * Coming soon page template
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

?>

<section class="coming-soon">
    <div class="holder">
        <h1><?php echo OhioOptions::get_global( 'coming_soon_heading', __( 'We\'re under construction', 'ohio' ) ); ?></h1>
        <p>
            <?php echo OhioOptions::get_global( 'coming_soon_details', __( 'Check back for an update soon.', 'ohio' ) ); ?>
        </p>

        <?php if ( OhioOptions::get_global( 'coming_soon_countdown', true ) ) : ?>
            <div class="ohio-widget countdown -contained" data-countdown="true" data-date="<?php echo OhioOptions::get_global( 'coming_soon_expiration', '2025/03/14 18:00:00' ); ?>">
                <div class="countdown-item">
                    <div class="number title titles-typo">0</div>
                    <div class="number-label"><?php esc_html_e( 'Months', 'ohio' ); ?></div>
                </div>
                <div class="countdown-item">
                    <div class="number title titles-typo">0</div>
                    <div class="number-label"><?php esc_html_e( 'Days', 'ohio' ); ?></div>
                </div>
                <div class="countdown-item">
                    <div class="number title titles-typo">0</div>
                    <div class="number-label"><?php esc_html_e( 'Hours', 'ohio' ); ?></div>
                </div>
                <div class="countdown-item">
                    <div class="number title titles-typo">0</div>
                    <div class="number-label"><?php esc_html_e( 'Minutes', 'ohio' ); ?></div>
                </div>
                <div class="countdown-item">
                    <div class="number title titles-typo">0</div>
                    <div class="number-label"><?php esc_html_e( 'Seconds', 'ohio' ); ?></div>
                </div>
            </div>
        <?php endif; ?>

    </div>
    
    <?php if ( OhioOptions::get_global( 'coming_soon_switch_social', true ) ) : ?>
        <div class="social-networks -outlined">
            <?php get_template_part( 'parts/elements/social_networks'); ?>
        </div>
    <?php endif; ?>

</section>

<?php

/**
 * Theme footer
 */
get_footer();
