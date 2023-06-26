<?php

/**
* WPBakery Page Builder Ohio Service Table shortcode view
*/

?>
<div class="ohio-widget service-table<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?> <?php echo esc_attr( $tilt_attrs ); ?>>

	<span class="icon-group<?php echo esc_attr( $icon_classes ); ?>">
		<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
			<i class="icon <?php echo $icon_as_icon; ?>"></i>
		<?php elseif ( $icon_as_image ) : ?>
			<img src="<?php echo esc_url( $icon_as_image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
		<?php endif; ?>
	</span>

	<div class="heading">
		<?php if ( $subtitle ) : ?>
        	<div class="subtitle"><?php echo $subtitle; ?></div>
        <?php endif; ?>

        <?php if ( $title ) : ?>
        	<h4 class="title"><?php echo $title; ?></h4>
        <?php endif; ?>
    </div>

    <?php if ( $description ) : ?>
	    <div class="service-table-details">
	        <?php echo $description; ?>
	    </div>
    <?php endif; ?>

    <div class="service-table-features">

		<?php if ( $features_value ) : ?>
			<ul class="-unlist -large">
			
				<?php foreach ( $features_value as $feature_object ) : ?>
					<li class="<?php echo ( ( $feature_object->feature_icon == 'icon_minus' ) ? 'missing' : 'exist' ); ?>">
						<?php if ( $feature_object->feature_icon ) : ?>

							<?php if ( $feature_object->feature_icon == 'icon_plus' ) : ?>
								<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path></svg></i>
							<?php elseif ( $feature_object->feature_icon == 'icon_minus' ) : ?>
								<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path></svg></i>
							<?php endif; ?>

						<?php endif; ?>

						<?php if ( $feature_object->feature_title ) : ?>
							<?php echo $feature_object->feature_title; ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

			</ul>
		<?php endif; ?>

	</div>
</div>