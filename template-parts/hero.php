<?php
/**
 * Hero Component Template Part
 */

// Get component data passed from index.php
$hero_image = $args['hero_image'];
$hero_image_mobile = $args['hero_image_mobile'];
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

    <?php if ($hero_image_mobile): ?>
        <div class="hero_image_mobile">
            <img src="<?php echo esc_url($hero_image_mobile['url']); ?>"
                 alt="<?php echo esc_attr($hero_image_mobile['alt']); ?>"
                 width="<?php echo $hero_image_mobile['width']; ?>"
                 height="<?php echo $hero_image_mobile['height']; ?>">
        </div>
    <?php endif; ?>
</section>