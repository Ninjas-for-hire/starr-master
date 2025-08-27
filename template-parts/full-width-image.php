<?php
/**
 * Full Width Image Component Template Part
 */

// Get component data passed from index.php
$image = $args['image'];
$border_radius = $args['border_radius'];
$padding = $args['padding'];
$background_color = $args['background_color'];
?>

<section class="full_width_image_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?> style="
    background-color: <?php echo $background_color ? $background_color : '#ffffff'; ?>;
    padding: <?php echo $padding ? $padding . 'px' : ''; ?> 0 <?php echo $padding ? $padding . 'px' : ''; ?> 0;
">

    <div class="container">

        <?php if ($image): ?>

            <div class="full_width_image">
                <img src="<?php echo esc_url($image['url']); ?>"
                     alt="<?php echo esc_attr($image['alt']); ?>"
                     width="<?php echo $image['width']; ?>"
                     height="<?php echo $image['height']; ?>"
                     style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                >
            </div>

        <?php endif; ?>

    </div>

</section>