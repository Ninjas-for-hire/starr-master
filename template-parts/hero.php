<?php
/**
 * Hero Component Template Part
 */

// Get component data passed from index.php
$hero_image = $args['hero_image'];
?>

<section class="hero_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?> >
    <?php if ($hero_image): ?>
        <div class="hero_image">
            <img src="<?php echo esc_url($hero_image['url']); ?>" 
                 alt="<?php echo esc_attr($hero_image['alt']); ?>"
                 width="<?php echo $hero_image['width']; ?>"
                 height="<?php echo $hero_image['height']; ?>">
        </div>
    <?php endif; ?>
</section>