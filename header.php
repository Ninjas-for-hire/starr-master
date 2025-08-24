<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description'); ?>">
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

            <!-- Desktop Left Menu -->
            <?php if ($left_menu): ?>
                <nav class="left-menu desktop-menu">
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

            <!-- Desktop Right Menu -->
            <?php if ($right_menu): ?>
                <nav class="right-menu desktop-menu">
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

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <nav class="mobile-nav">
            <?php if ($left_menu): ?>
                <div class="mobile-menu-section">
                    <?php foreach ($left_menu as $item):
                        $link = $item['menu_link'];
                        if ($link): ?>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($right_menu): ?>
                <div class="mobile-menu-section">
                    <?php foreach ($right_menu as $item):
                        $link = $item['menu_link'];
                        if ($link): ?>
                            <a href="<?php echo esc_url($link['url']); ?>"
                               target="<?php echo $link['target'] ? $link['target'] : '_self'; ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </nav>
    </div>

</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileToggle = document.querySelector('.mobile-menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        const body = document.body;

        mobileToggle.addEventListener('click', function() {
            mobileToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            body.classList.toggle('mobile-menu-open');
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                body.classList.remove('mobile-menu-open');
            });
        });
    });
</script>