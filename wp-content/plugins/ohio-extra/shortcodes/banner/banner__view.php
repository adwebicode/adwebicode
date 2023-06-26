<?php

/**
* WPBakery Page Builder Ohio Banner shortcode view
*/

?>
<div class="ohio-widget banner card<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php if ( $block_type_layout == 'inner' ) : ?>

		<?php if ( $use_link ) : ?>
			<a data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>
                <img <?php echo $image; ?>>
                <div class="overlay-details">
                    <div class="card-details">
                        <div class="heading">
                            <div class="subtitle"><?php echo $subtitle; ?></div>
                            <h3 class="title"><?php echo $title; ?></h3>
                        </div>
                    </div>
                    <p><?php echo $description; ?></p>
                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

	<?php elseif ( $block_type_layout == 'inner_hover' ) : ?>

		<?php if ( $use_link ) : ?>
			<a class="-unlink" data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>
                <img <?php echo $image; ?>>
                <div class="overlay-details">
                    <div class="card-details -fade-down">
                        <div class="heading">
                            <div class="subtitle"><?php echo $subtitle; ?></div>
                            <h3 class="title"><?php echo $title; ?></h3>
                        </div>
                    </div>
                    <p class="-fade-up"><?php echo $description; ?></p>
                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

	<?php else : ?>

		<?php if ( $use_link ) : ?>
			<a data-cursor-class="cursor-link" href="<?php echo $link_url['url']; ?>"<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
		<?php endif; ?>

            <div class="image-holder" <?php echo esc_attr( $tilt_attrs ); ?>>
               	<img <?php echo $image; ?>>
                <div class="overlay-details -fade-up">
                    <p><?php echo $description; ?></p>
                </div>
            </div>

        <?php if ( $use_link ) : ?>
			</a>
		<?php endif; ?>

        <?php if ( !empty( $title || $subtitle ) ) : ?>
            <div class="card-details">
                <div class="heading">
                    <div class="subtitle"><?php echo $subtitle; ?></div>
                    <h3 class="title"><?php echo $title; ?></h3>
                </div>
            </div>
        <?php endif; ?>

	<?php endif; ?>

</div>