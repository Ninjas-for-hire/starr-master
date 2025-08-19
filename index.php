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
                <?php elseif ($component['acf_fc_layout'] == 'concept'): ?>
                    <?php get_template_part('template-parts/concept', null, $component); ?>
                <?php elseif ($component['acf_fc_layout'] == 'spacer'): ?>
                    <?php get_template_part('template-parts/spacer', null, $component); ?>
                <?php elseif ($component['acf_fc_layout'] == 'cuisine'): ?>
                    <?php get_template_part('template-parts/cuisine', null, $component); ?>
                <?php elseif ($component['acf_fc_layout'] == 'chef'): ?>
                    <?php get_template_part('template-parts/chef', null, $component); ?>
                <?php elseif ($component['acf_fc_layout'] == 'full_width_image'): ?>
                    <?php get_template_part('template-parts/full-width-image', null, $component); ?>
                <?php elseif ($component['acf_fc_layout'] == 'menu'): ?>
                    <?php get_template_part('template-parts/menu', null, $component); ?>
                <?php endif; ?>
                
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>