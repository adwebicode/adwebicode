<?php
    $expires = OhioOptions::get_global( 'subscribe_popup_expires' );
    setcookie( 'subscribeCookie', "enabled", ( time() + 60 * 60 * 24 * $expires ), '/' );

    $heading = OhioOptions::get_global( 'text_subcribe_popup' );
    $description = OhioOptions::get_global( 'details_text_subcribe_popup' );
    $form_id = OhioOptions::get_global( 'subscribe_choice_of_forms' );
?>

<div class="popup-subscribe">
    <div class="thumbnail"></div>
    <div class="holder">
        <h4 class="title">
            <?php echo esc_html( $heading ); ?> 
        </h4>
        <p>
            <?php echo esc_html( $description ); ?>
        </p>
        <div class="contact-form">
            <?php if ( $form_id ) : ?>
                <?php echo do_shortcode('[contact-form-7 id="' . esc_attr( $form_id ) . '"]' ); ?>
                <div class="hidden" data-button-contact="true">
                    <button class="button" data-button-loading="true"></button>
                </div>
            <?php endif; ?>
        </div>
        <a href="#" aria-label="close" class="close-link titles-typo">
            <?php esc_html_e( 'Please, don’t ask me again', 'ohio' ); ?>
        </a>
    </div>
</div>