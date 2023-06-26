<?php
    $project = OhioHelper::get_storage_item_data();
    $show_headline = OhioOptions::get( 'project_show_headline', true );
?>

<?php if ( !empty( $project['raw_categories'] ) || !empty( $project['date'] ) ) : ?>

	<div class="headline-meta">
		<?php if ( isset( $project['raw_categories'] ) ) : ?>
			<span class="category-holder">
				<?php foreach ( $project['raw_categories'] as $category ) : ?>
					<span class="category"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
				<?php endforeach; ?>
			</span>
		<?php endif; ?>

		<?php if ( isset( $project['date'] ) ) : ?>
			<span class="date"><?php echo esc_html( $project['date'] ); ?></span>
		<?php endif; ?>
	</div>

<?php endif; ?>

<?php if ( $show_headline ) : ?>
	<div class="project-title">
		<?php the_title( '<h1 class="headline">', '</h1>' ); ?>
	</div>
<?php endif; ?>