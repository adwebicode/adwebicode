<?php
    $project = OhioHelper::get_storage_item_data();
?>

<?php if ( !empty( $project['task'] ) ) : ?>
    <div class="project-task">
        <h6 class="title"><?php esc_html_e( 'Task', 'ohio' ); ?></h6>
        <p class="-unspace"><?php echo wp_kses( $project['task'], 'default' ); ?></p>
    </div>
<?php endif; ?>