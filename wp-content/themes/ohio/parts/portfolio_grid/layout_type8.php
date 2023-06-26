<?php
$project = OhioHelper::get_storage_item_data();
?>

<div class="portfolio-item -layout8" data-featured-image="<?php echo esc_url( $project['featured_image'] ); ?>" <?php if ( $project['in_popup'] ) echo 'data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; ?>>
    <a class="project-title -unlink<?php if ( $project['in_popup']) { echo ' btn-lightbox'; } ?>" href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
        echo ' target="_blank"';
    } ?>>
        <h2 class="headline <?php if ( isset( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
    </a>
    <?php if ( $project['category_visible'] ) : ?>
        <?php if ( $project['raw_categories'] ) : ?>
            <div class="category-holder -small-t">/
                <?php foreach ( $project['raw_categories'] as $category ) : ?>
                    <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>