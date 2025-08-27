<?php
/**
 * Cuisine Component Template Part
 */

// Get component data passed from index.php
$title = $args['title'];
$content = $args['content'];
$image_1 = $args['image_1'];
$image_2 = $args['image_2'];
$border_radius = $args['border_radius'];
$padding = $args['padding'];
$background_color = $args['background_color'];
?>

<section class="cuisine_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?> style="
    background-color: <?php echo $background_color ? $background_color : '#ffffff'; ?>;
    padding: <?php echo $padding ? $padding . 'px' : ''; ?> 0 <?php echo $padding ? $padding . 'px' : ''; ?> 0;
">

    <div class="container">

        <div class="cuisine_section_inner">

            <div class="left">

                <?php if ($image_1): ?>
                    <div class="cuisine_image">
                        <img src="<?php echo esc_url($image_1['url']); ?>"
                             alt="<?php echo esc_attr($image_1['alt']); ?>"
                             width="<?php echo $image_1['width']; ?>"
                             height="<?php echo $image_1['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                        >
                    </div>
                <?php endif; ?>

            </div>

            <div class="right">

                <div class="content_section">

                    <?php if ($title): ?>
                        <h2 class="cuisine_title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if ($content): ?>
                        <div class="cuisine_content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if ($image_2): ?>
                    <div class="cuisine_image">
                        <img src="<?php echo esc_url($image_2['url']); ?>"
                             alt="<?php echo esc_attr($image_2['alt']); ?>"
                             width="<?php echo $image_2['width']; ?>"
                             height="<?php echo $image_2['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                        >
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

</section>