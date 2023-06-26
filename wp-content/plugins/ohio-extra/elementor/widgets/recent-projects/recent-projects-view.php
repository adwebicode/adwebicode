<?php if ( $settings['card_layout'] == 'grid_8' || $settings['card_layout'] == 'grid_12' ): ?>
	<div class="ohio-widget portfolio-projects <?php echo $this->getWrapperClasses(); ?>" data-ohio-portfolio-grid="true" <?php if ( $settings['card_layout'] == 'grid_8' ){ ?> data-interactive-links-grid="true"<?php } ?>>

	<?php if ( $settings['card_layout'] == 'grid_8' || $settings['card_layout'] == 'grid_12' ): ?>
		<div class="project-content">
            <div class="portfolio-grid-images"<?php if ( $settings['card_layout'] == 'grid_8'): ?> data-vc-full-width="true" data-vc-stretch-content="true" <?php endif; ?>></div>
        </div>
	<?php endif; ?>
	
<?php else: ?>
	<div class="ohio-widget portfolio-projects <?php echo $this->getWrapperClasses(); ?> <?php if ( $is_slider ) echo 'vc_row'; ?>" data-ohio-portfolio-grid="true">
<?php endif; ?>

	<?php
		require 'views/filter.php';

		if ( in_array( $settings['card_layout'], [ 'grid_1', 'grid_2', 'grid_11', 'grid_8', 'grid_12', 'grid_13' ] ) ) {
			include 'views/cards-projects.php';
		} else {
			include 'views/slider-projects.php';
		}

		require 'views/pagination.php';
	?>
</div>
