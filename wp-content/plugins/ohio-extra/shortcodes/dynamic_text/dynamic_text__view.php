<?php

/**
 * WPBakery Page Builder Ohio Dynamic Text shortcode view
 */

?>
<div class="ohio-widget dynamic-text<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-dynamic-text-options='<?php echo $options_json; ?>' <?php echo esc_attr( $animation_attrs ); ?>>
    <?php echo $pre_title; ?> <span class="dynamic"></span> <?php echo $post_title; ?>
</div>