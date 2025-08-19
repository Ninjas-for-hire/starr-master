<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
// Get ACF fields
    $header_colour = get_field('header_colour', 'option');
    $logo = get_field('logo', 'option');
    $left_menu = get_field('left_menu', 'option');
    $right_menu = get_field('right_menu', 'option');
?>

<header style="background-color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?>;">

    <div class="container">

        <div class="inner_header">

            <?php if ($left_menu): ?>
                <nav class="left-menu">
                    <?php foreach ($left_menu as $item):
                        $link = $item['menu_link'];
                        if ($link): ?>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

            <div class="logo">
                <?php if ($logo): ?>
                    <img src="<?php echo esc_url($logo['url']); ?>"
                         alt="<?php echo esc_attr($logo['alt']); ?>"
                         width="<?php echo $logo['width']; ?>"
                         height="<?php echo $logo['height']; ?>">
                <?php else: ?>
                    <h1><?php bloginfo('name'); ?></h1>
                <?php endif; ?>
            </div>

            <?php if ($right_menu): ?>
                <nav class="right-menu">
                    <?php foreach ($right_menu as $item):
                        $link = $item['menu_link'];
                        if ($link): ?>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

        </div>

    </div>

</header>