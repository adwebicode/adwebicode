<div class="ohio-widget pricing-table <?php echo $this->getWrapperClasses(); ?>" <?php if ( $settings['tilt_effect'] ) { echo esc_attr( $tilt_attrs ); } ?>>

	<div class="pricing-table-headline">
        <?php if ( !empty( $settings['headline']) ) : ?>
			<h5 class="title"><?php echo $settings['headline']; ?></h5>
		<?php endif; ?>

		<?php if ( !empty( $settings['subtitle']) ) : ?>
			<p class="subtitle -unspace"><?php echo $settings['subtitle']; ?></p>
		<?php endif; ?>
    </div>

    <div class="pricing-table-price">

        <span class="price-number titles-typo title">
        	<?php if ( !empty( $settings['currency'] )  ) : ?>
				<?php echo $settings['currency'] . $settings['price']; ?>
			<?php else: ?>
				<?php echo $settings['price']; ?>
			<?php endif; ?>
        </span>

        <?php if ( !empty( $settings['caption'] ) ) : ?>
        	<span class="tag"><?php echo $settings['caption']; ?></span>
        <?php endif; ?>
    </div>

    <?php if ( !empty( $settings['description'] ) ) : ?>
    	<div class="pricing-table-details"><?php echo $settings['description']; ?></div>
	<?php endif; ?>

	<div class="pricing-table-features">

		<?php if ( !empty( $settings['features_list'] ) ) : ?>
			<ul class="-unlist -large">

				<?php foreach ( $settings['features_list'] as $item ) : ?>
					<li class="<?php echo ( $item['list_type'] == 'disabled' ) ? 'missing' : 'exist'; ?>">
						<?php if ( $item['list_type'] == 'enabled' ) : ?>
							<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path></svg></i>
						<?php elseif ( $item['list_type'] == 'disabled' ) : ?>
							<i class="icon"><svg class="default" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path></svg></i>
						<?php endif; ?>

						<?php if ( !empty( $item['list_title'] ) ) : ?>
							<span class="title"><?php echo $item['list_title']; ?></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>

			</ul>
		<?php endif; ?>

	</div>

	<?php if ( !empty( $settings['use_link'] ) && !empty( $settings['button_link']['url'] ) ) : ?>
		<a class="button <?php echo esc_attr( $this->getButtonClasses() ); ?>" 
			<?php echo $this->getLinkAttributesString( $settings['button_link'] ); ?>>

			<?php echo $settings['button_title']; ?>

			<?php if ( $settings['button_style_type'] == 'link' ): ?>
				<i class="ion-right ion"><svg class="arrow-icon" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 7H16M16 7L11 1M16 7L11 13" stroke-width="2"/></svg></i>
			<?php endif; ?>
		</a>
	<?php endif; ?>

</div>