<?php get_template_part( 'parts/elements/page_headline' ); ?>

<div class="page-container">
	<div class="empty-state">
		<h3 class="title">
			<?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'ohio' ); ?>
		</h3>
		<p>
			<?php esc_html_e( 'Try using other search criteria', 'ohio' ); ?>
		</p>
		<?php get_search_form( true ); ?>
	</div>
</div>