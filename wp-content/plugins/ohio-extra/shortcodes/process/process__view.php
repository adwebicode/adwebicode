<?php

/**
* WPBakery Page Builder Ohio Process shortcode view
*/

?>
<div class="ohio-widget process<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>
    <div class="heading">
        <div class="process-number subtitle"><?php echo $number; ?></div>
        <h3 class="process-headline title"><?php echo $title; ?></h3>
    </div>
    <p class="process-description"><?php echo $description; ?></p>
</div>