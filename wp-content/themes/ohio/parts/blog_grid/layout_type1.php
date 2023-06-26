<?php

$ohio_post = OhioHelper::get_storage_item_data();
global $post;
$anim_attrs = '';
if ( in_array( $ohio_post['animation_type'], array( 'sync', 'async') ) ) {
	OhioHelper::add_required_script( 'aos' );

	$anim_attrs .= ' data-aos-once="true"';
	$anim_attrs .= ' data-aos="' . esc_attr( $ohio_post['animation_effect'] ) . '"';
	if ( $ohio_post['animation_type'] == 'async' ) {
		$anim_attrs .= '';
	}
}
if ( isset( $ohio_post['meta_visibility'] ) && is_array( $ohio_post['meta_visibility'] ) ) extract( $ohio_post['meta_visibility'] );

$blog_grid_class = '';
if ( in_array('sticky', get_post_class( '', $ohio_post['post_id'] ) ) ) {
	$blog_grid_class .= ' sticky';
}
if ( $ohio_post['boxed'] ) {
	$blog_grid_class .= ' -contained';
}
if ( $ohio_post['media']['blockquote'] ) {
	$blog_grid_class .= ' type-blockquote';
}
if ( $ohio_post['media']['audio'] ) {
	$blog_grid_class .= ' type-audio';
}
if ( !$ohio_post['preview'] ) {
	$blog_grid_class .= ' no-preview';
}
if ( $ohio_post['equal_height'] ) {
	$blog_grid_class .= ' -metro';
}
if ( $ohio_post['drop_shadow'] ?? null ) {
	$blog_grid_class .= ' -with-shadow';
}
if ( empty( $ohio_post['media']['image'] ) ) {
	$blog_grid_class .= ' -no-media';
}

$hover_effect = $ohio_post['hover_effect'];
switch ( $hover_effect ) {
	case 'scale':
		$hover_effect_class = '-img-scale';
		break;
	case 'overlay':
		$hover_effect_class = '-img-overlay';
		break;
	case 'greyscale':
		$hover_effect_class = '-img-greyscale';
		break;
	default:
		$hover_effect_class = '';
}

$parallax_data = '';
$tilt_effect = OhioOptions::get( 'blog_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'blog_tilt_effect_perspective', 6000 );

if ( $ohio_post['tilt_effect'] ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective  . '';
}

?>

<div class="blog-item card -layout1<?php echo esc_attr( $blog_grid_class ); ?> <?php echo esc_attr( $hover_effect_class ); ?>" <?php echo esc_attr( $anim_attrs ); ?> <?php echo $ohio_post['boxed'] ? esc_attr( $parallax_data ) : ''; ?>>
	<a href="<?php echo esc_url( $ohio_post['url'] ); ?>" data-cursor-class="cursor-link">
		<figure class="image-holder" <?php if ( !$ohio_post['boxed'] ) { echo esc_attr( $parallax_data ); } ?>>

			<?php if ( $ohio_post['media']['video'] ): // Video format ?>
				<?php printf( '%s', $ohio_post['media']['video'] ); ?>

			<?php elseif ( $ohio_post['media']['audio'] ): // Audio format ?>
				<?php printf( '%s', $ohio_post['media']['audio'] ); ?>

			<?php elseif ( $ohio_post['media']['gallery'] ): // Gallery format ?>
				<?php printf( '%s', $ohio_post['media']['gallery'] ); ?>

			<?php /* elseif ( $ohio_post['media']['blockquote'] ): // Blockquote format ?>
				<?php $ohio_post['preview'] = wp_kses( $ohio_post['media']['blockquote'], 'post'); */?>

			<?php elseif ( $ohio_post['media']['image'] ): // Feature image format ?>
				<img <?php echo $ohio_post['media']['image_atts']; ?>>
			<?php endif; ?>

			<div class="overlay-details -fade-up">
				<?php if ( $author_visibility ) : ?>
					<ul class="meta-holder -unlist">
						<li class="meta-item">
							<div class="avatar -small">
								<?php echo get_avatar( $ohio_post['author_id'], '50', 'mystery', $ohio_post['author'], [ 'class' => 'author-avatar' ] ); ?>
							</div>
						</li>
						<li class="meta-item">
							<span class="prefix"><?php esc_html_e( 'Posted by', 'ohio' ); ?></span>
							<span class="author"><?php echo esc_html( $ohio_post['author'] ); ?></span>
						</li>
					</ul>
				<?php endif; ?>
			</div>
		</figure>
	</a>
	<div class="card-details -<?php echo esc_attr( $ohio_post['alignment'] ); ?>">
		<?php if ( $date_visibility || $reading_time_visibility ) : ?>
			<div class="headline-meta -small-t">
				<?php if ( $date_visibility ) : ?>
					<div class="date"><?php echo esc_html( $ohio_post['date'] ); ?></div>
				<?php endif; ?>
				<?php if ( $reading_time_visibility ) : ?>
					<span class="post-meta-estimate"><?php echo esc_html( $ohio_post['reading_estimate'] ) . ' ' . esc_html__( 'min read', 'ohio' ); ?>
					</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="heading title">
			<h4 class="title">
				<?php if ( in_array( 'sticky', get_post_class( '', $ohio_post['post_id'] ) ) ) : ?>
					<svg class="sticky-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-circle" viewBox="0 0 16 16">
					  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.854 10.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/>
					</svg>
				<?php endif; ?>
				<a class="-unlink" href="<?php echo esc_url( $ohio_post['url'] ); ?>">
					<?php echo esc_html( $ohio_post['title'] ); ?>
				</a>
			</h4>
		</div>
		<?php if ( $short_description_visibility ) : ?>
			<p><?php echo $ohio_post['preview']; ?></p>
		<?php endif; ?>
		<?php if ( $category_visibility ) : ?>
			<div class="category-holder -with-tag">
				<?php if ( in_array( 'sticky', get_post_class( '', $ohio_post['post_id'] ) ) ) : ?>
					<span class="tag -unlink"><?php esc_html_e( 'Featured', 'ohio' ); ?></span>
				<?php endif; ?>

				<?php foreach ( $ohio_post['categories'] as $_category ) : ?>
					<a class="tag -unlink" href="<?php echo esc_url( get_category_link( $_category->cat_ID ) ); ?>"><?php echo esc_html( $_category->name ); ?></a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<?php if ( $read_more_visibility ) : ?>
            <a class="button -text" href="<?php echo esc_url( $ohio_post['url'] ); ?>">
			    <?php esc_html_e( 'Read More', 'ohio' ); ?>
		        <i class="icon -right">
		        	<svg class="default" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8 0L6.59 1.41L12.17 7H0V9H12.17L6.59 14.59L8 16L16 8L8 0Z"></path></svg>
		        	<svg class="minimal" width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 7.58579 0.335786 7.25 0.75 7.25H17.25C17.6642 7.25 18 7.58579 18 8C18 8.41421 17.6642 8.75 17.25 8.75H0.75C0.335786 8.75 0 8.41421 0 8Z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.96967 0.71967C10.2626 0.426777 10.7374 0.426777 11.0303 0.71967L17.7803 7.46967C18.0732 7.76256 18.0732 8.23744 17.7803 8.53033L11.0303 15.2803C10.7374 15.5732 10.2626 15.5732 9.96967 15.2803C9.67678 14.9874 9.67678 14.5126 9.96967 14.2197L16.1893 8L9.96967 1.78033C9.67678 1.48744 9.67678 1.01256 9.96967 0.71967Z"></path></svg>
		        </i>
			</a>
        <?php endif; ?>
	</div>
</div>
