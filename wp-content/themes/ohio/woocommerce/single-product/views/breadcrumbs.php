<?php
    if ( ! OhioOptions::get( 'page_breadcrumbs_visibility', true ) ) return;
    
    $delimiter_symbol = OhioOptions::get_global( 'breadcrumbs_separator' );
    if ( ! $delimiter_symbol ) {
        $delimiter_symbol = '<svg class="default" width="5" height="9" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.5697L1.36504 16L9 8L1.36504 0L0 1.4303L6.26992 8L0 14.5697V14.5697Z"></path></svg>';
    }
    
    $category_in_breadcrumb = OhioOptions::get( 'page_show_category_breadcrumbs', true );
?>

<div class="breadcrumb-holder">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb -unlist" itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php $position = 1; ?>

            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
                    <span itemprop="name"><?php echo OhioSettings::breadcrumbs_woocommerce_slug(); ?></span>
                </a>
                <meta itemprop="position" content="<?php echo esc_attr( $position ); ?>" />
            </li>

            <?php
                $ancestors = get_ancestors( get_the_ID(), 'page', 'post_type' );
                for( $i = count( $ancestors ) - 1; $i >= 0; $i-- ):
                    $position += 1;
                    $page = get_page( $ancestors[$i] );
                ?>
                    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <?php echo $delimiter_symbol; ?>
                        <a itemprop="item" href="<?php echo esc_attr( $page->guid ); ?>">
                            <span itemprop="name"><?php echo esc_html( $page->post_title ); ?></span>
                        </a>
                        <meta itemprop="position" content="<?php echo esc_attr( $position ); ?>" />
                    </li>
                <?php
                endfor;

                if ( $category_in_breadcrumb ) {
                    $terms = wp_get_post_terms( $post->ID, 'product_cat', array( 'taxonomy' => 'product_cat' ) );

                    if ( is_array( $terms ) && is_object( $terms[0] ) ):
                        $position += 1;
                    ?>
                        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <?php echo $delimiter_symbol; ?>
                            <a itemprop="item" href="<?php echo esc_attr( get_term_link( $terms[0] ) ); ?>">
                                <span itemprop="name"><?php echo esc_html( $terms[0]->name ); ?></span>
                            </a>
                            <meta itemprop="position" content="<?php echo esc_attr( $position ); ?>" />
                        </li>
                    <?php
                    endif;
                }
            ?>

            <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <?php echo $delimiter_symbol; ?>
                <span itemprop="name" class="active"><?php the_title(); ?></span>
                <meta itemprop="position" content="<?php echo esc_attr( $position + 1 ); ?>" />
            </li>
        </ol>
    </nav>
</div>