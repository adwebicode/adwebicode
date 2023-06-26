
<div class="ohio-widget process <?php echo $this->getWrapperClasses(); ?>">
    <div class="heading">
        <?php if ( !empty( $settings['number'] ) ) : ?>
            <div class="process-number subtitle"><?php echo $settings['number']; ?></div>
        <?php endif; ?>
        
        <?php if ( !empty( $settings['headline'] ) ) : ?>
            <h3 class="process-headline title"><?php echo $settings['headline']; ?></h3>
        <?php endif; ?>
    </div>
    <?php if ( !empty( $settings['description'] ) ) : ?>
        <p class="process-description"><?php echo $settings['description']; ?></p>
    <?php endif; ?>
</div>