<?php get_header(); ?>

<main>
    <?php
    // Get the page builder field
    $page_builder = get_field('page_builder');

    if ($page_builder): ?>
        <div class="page-builder">
            <?php foreach ($page_builder as $component): ?>
                
                <?php if ($component['acf_fc_layout'] == 'hero'): ?>
                    <?php get_template_part('template-parts/hero', null, $component); ?>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>