<?php

/**
* WPBakery Page Builder Ohio Tabs shortcode view
*/

?>
<div class="ohio-widget tabs<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-ohio-tabs="true" <?php echo esc_attr( $animation_attrs ); ?>>
    <ul class="tabs-nav -unlist titles-typo title" role="tablist">
        <li class="tabs-nav-line"></li>
    </ul>
    <div class="tabs-content" role="tabpanel">
        <?php echo do_shortcode( $content ); ?>
    </div>
</div>