<?php
$project = OhioHelper::get_storage_item_data();
?>

<div class="portfolio-item -layout12" <?php if ( $project['in_popup'] ) echo 'data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; ?>>
    <div class="portfolio-item-details">
        <div class="portfolio-item-details-headline">
            <a href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) { echo ' target="_blank"'; } ?> class="-unlink<?php if ( $project['in_popup']) { echo ' btn-lightbox'; } ?>">
                <h2 class="title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
            </a>
        </div>
        <?php if ( $project['category_visible'] ) : ?>
            <?php if ( $project['raw_categories']) : ?>
                <div class="category-holder">/
                    <?php foreach ( $project['raw_categories'] as $category ) : ?>
                        <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="portfolio-item-image">
        <div class="card<?php if ( $project['equal_height']) { echo ' -metro'; } ?>">
            <div class="image-holder">
                <img class="" src="<?php echo esc_url( $project['featured_image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
            </div>
        </div>
    </div>
</div>