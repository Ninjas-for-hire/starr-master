<?php
/**
 * The Concept Component Template Part
 */

// Get component data passed from index.php
    $title = $args['title'];
    $content = $args['content'];
    $image_1 = $args['image_1'];
    $image_2 = $args['image_2'];
    $image_3 = $args['image_3'];
    $border_radius = $args['border_radius'];
    $padding = $args['padding'];
    $background_color = $args['background_color'];

?>

<section class="concept_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?> style="
    background-color: <?php echo $background_color ? $background_color : '#ffffff'; ?>;
    padding: <?php echo $padding ? $padding . 'px' : ''; ?> 0 <?php echo $padding ? $padding . 'px' : ''; ?> 0;
">

    <div class="container">

        <div class="concept_section_inner">

            <div class="top">

                <div class="content">

                    <?php if ($title): ?>
                        <h1 class="concept_title"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($content): ?>
                        <div class="concept_content">
                            <?php echo wp_kses_post($content); ?>
                        </div>
                    <?php endif; ?>

                </div>

                <?php if ($image_1): ?>
                    <div class="concept_image_1 conc_image">
                        <img src="<?php echo esc_url($image_1['url']); ?>"
                             alt="<?php echo esc_attr($image_1['alt']); ?>"
                             width="<?php echo $image_1['width']; ?>"
                             height="<?php echo $image_1['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                        >

                    </div>
                <?php endif; ?>

            </div>

            <div class="bottom">

                <?php if ($image_2): ?>
                    <div class="concept_image_2 conc_image">
                        <img src="<?php echo esc_url($image_2['url']); ?>"
                             alt="<?php echo esc_attr($image_2['alt']); ?>"
                             width="<?php echo $image_2['width']; ?>"
                             height="<?php echo $image_2['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>; top:-<?php echo $image_2['height']/2; ?>px;"
                        >
                    </div>
                <?php endif; ?>

                <?php if ($image_3): ?>
                    <div class="concept_image_3 conc_image">
                        <img src="<?php echo esc_url($image_3['url']); ?>"
                             alt="<?php echo esc_attr($image_3['alt']); ?>"
                             width="<?php echo $image_3['width']; ?>"
                             height="<?php echo $image_3['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                        >
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>



</section>