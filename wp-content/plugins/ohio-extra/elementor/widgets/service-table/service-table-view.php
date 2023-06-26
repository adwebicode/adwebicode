<div class="ohio-widget service-table <?php echo $this->getWrapperClasses(); ?>" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>

	<span class="icon-group <?php echo $settings['icon_classes'] ?>">
		<?php $this->showIconInView( 'icon' ); ?>
	</span>

	<div class="heading">
		<?php if ( !empty( $settings['subtitle'] ) ) : ?>
			<div class="subtitle"><?php echo $settings['subtitle']; ?></div>
		<?php endif; ?>

        <?php if ( !empty( $settings['headline'] ) ) : ?>
			<h4 class="title"><?php echo $settings['headline']; ?></h4>
		<?php endif; ?>
    </div>

    <?php if ( !empty( $settings['description'] ) ) : ?>
	    <div class="service-table-details">
	        <?php echo $settings['description']; ?>
	    </div>
    <?php endif; ?>

    <div class="service-table-features">
    	
    	<?php if ( $settings['features_list'] ) : ?>

			<ul class="-unlist -large">

				<?php foreach ( $settings['features_list'] as $item ) : ?>
					<li class="<?php echo ( $item['list_type'] == 'disabled' ) ? 'missing' : 'exist'; ?>">

						<?php if ( $item['list_type'] == 'enabled' ) : ?>
							<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path></svg></i>
						<?php elseif ( $item['list_type'] == 'disabled' ) : ?>
							<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path></svg></i>
						<?php endif; ?>

						<?php if ( !empty( $item['list_title'] ) ) : ?>
							<?php echo $item['list_title']; ?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

			</ul>
		<?php endif; ?>

    </div>
</div>