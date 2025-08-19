<?php
/**
 * Chef Component Template Part
 */

// Get component data passed from index.php
$title = $args['title'];
$content = $args['content'];
$chef_image = $args['chef_image'];
$border_radius = $args['border_radius'];
$padding = $args['padding'];
$background_color = $args['background_color'];
?>

<section class="chef_section" style="
    background-color: <?php echo $background_color ? $background_color : '#ffffff'; ?>;
        padding: <?php echo $padding ? $padding . 'px' : ''; ?> 0 <?php echo $padding ? $padding . 'px' : ''; ?> 0;
">

    <div class="container">

        <div class="chef_section_inner">

            <div class="left">

                <?php if ($chef_image): ?>
                    <div class="chef_image">
                        <img src="<?php echo esc_url($chef_image['url']); ?>"
                             alt="<?php echo esc_attr($chef_image['alt']); ?>"
                             width="<?php echo $chef_image['width']; ?>"
                             height="<?php echo $chef_image['height']; ?>"
                             style="border-radius: <?php echo $border_radius ? $border_radius . 'px' : '0px'; ?>;"
                        >

                    </div>
                <?php endif; ?>

            </div>

            <div class="right">
                <?php if ($title): ?>
                    <h2 class="chef_title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="chef_content">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

</section>