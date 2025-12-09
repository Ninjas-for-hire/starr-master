<?php
/**
 * Basic Header Component Template Part
 */

// Get component data passed from index.php
$image = $args['image'];
$title = $args['title'];
$section_id = $args['section_id'];
$section_class = $args['section_class'];
?>

<section class="basic_header_section <?php echo esc_attr($section_class); ?>" <?php if($section_id): ?> id="<?php echo esc_attr($section_id); ?>" <?php endif; ?>>

    <div class="overlay"></div>

    <div class="basic_header_inner">
        <?php if ($image): ?>
            <div class="basic_header_image">
                <img src="<?php echo esc_url($image['url']); ?>" 
                     alt="<?php echo esc_attr($image['alt']); ?>"
                     width="<?php echo $image['width']; ?>"
                     height="<?php echo $image['height']; ?>">
            </div>
        <?php endif; ?>

        <?php if ($title): ?>

            <div class="basic_header_title">

                <h1><?php echo esc_html($title); ?></h1>

            </div>

        <?php endif; ?>

    </div>

</section>
