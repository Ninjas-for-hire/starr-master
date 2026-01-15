<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://use.typekit.net/hja0acw.css">

    <?php
        // Get ACF fields
        $header_colour = get_field('header_colour', 'option');
        $logo = get_field('logo', 'option');
        $no_bg_logo = get_field('no_bg_logo', 'option');
        $left_menu = get_field('left_menu', 'option');
        $right_menu = get_field('right_menu', 'option');
        $desktop_right_menu = get_field('desktop_right_menu', 'option');
    ?>

    <style type="text/css">
        /* .fake_header .right-menu a {
            background-color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?>;
            border: 1px solid <?php echo $header_colour ? $header_colour : '#ffffff'; ?> !important;
        } */
        
        .real_header .right-menu a {
            background-color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?>;
            border: 1px solid <?php echo $header_colour ? $header_colour : '#ffffff'; ?> !important;
        }
        .real_header .right-menu a:hover {
            color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?> !important;
        }
        .real_header.active {
            background-color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?>;
        }
        .real_header.active .right-menu a {
            border: 1px solid #fff !important;
        }
        .footer .inner_footer .footer_columns .column .email_signup_link:hover {
            color: <?php echo $header_colour ? $header_colour : '#ffffff'; ?> !important;
        }

    </style>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="real_header">

    <div class="container">

        <div class="inner_header hover_links">

            <nav class="left-menu desktop-menu">
                <button class="desktop-menu-toggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </nav>

            <a href="/" class="logo" title="<?php echo esc_attr($no_bg_logo['alt']); ?>">
                <?php if ($logo): ?>

                    <img src="<?php echo esc_url($logo['url']); ?>"
                         alt="<?php echo esc_attr($logo['alt']); ?>"
                         width="<?php echo $logo['width']; ?>"
                         height="<?php echo $logo['height']; ?>">

                <?php else: ?>
                    <h1><?php bloginfo('name'); ?></h1>
                <?php endif; ?>
            </a>

            <?php if ($desktop_right_menu): ?>
                <nav class="right-menu desktop-menu">
                    <?php foreach ($desktop_right_menu as $item):
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
            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

        </div>

    </div>

    <div class="desktop-menu-slider">

        <div class="overlay"></div>
        <div class="underlay"></div>

        <nav class="mobile-nav">

            <button class="desktop-menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <?php if ($left_menu): ?>
                <div class="mobile-menu-section">
                    <a  class="desktop-menu-toggle-menu" tabindex="0" role="button">
                        x Close
                    </a>
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

        </nav>
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

        </nav>
    </div>

</header>

<script>
    function trapFocus(e) {
        var isTab = (e.key === 'Tab' || e.keyCode === 9);
        if (!isTab) {
            return;
        }

        var activeMenu = document.querySelector('.mobile-menu.active, .desktop-menu-slider.active');
        if (!activeMenu) {
            return;
        }

        var focusableElements = activeMenu.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]');
        var focusableCollection = Array.prototype.slice.call(focusableElements);
    
        var firstTabStop = focusableCollection[0];
        var lastTabStop = focusableCollection[focusableCollection.length - 1];

        if (e.shiftKey) { /* shift + tab */
            if (document.activeElement === firstTabStop) {
                e.preventDefault();
                lastTabStop.focus();
            }
        } else { /* tab */
            if (document.activeElement === lastTabStop) {
                e.preventDefault();
                firstTabStop.focus();
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle - works for all instances
        const mobileToggles = document.querySelectorAll('.mobile-menu-toggle');
        const mobileMenus = document.querySelectorAll('.mobile-menu');
        const body = document.body;

        // Initialize aria-hidden
        mobileMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));

        mobileToggles.forEach(function(mobileToggle, index) {
            mobileToggle.addEventListener('click', function() {
                mobileToggles.forEach(toggle => toggle.classList.toggle('active'));
                mobileMenus.forEach(menu => menu.classList.toggle('active'));
                body.classList.toggle('mobile-menu-open');

                if (body.classList.contains('mobile-menu-open')) {
                    mobileMenus.forEach(menu => {
                        menu.setAttribute('aria-hidden', 'false');
                        const firstMenuItem = menu.querySelector('a, button, input');
                        if (firstMenuItem) {
                            firstMenuItem.focus();
                        }
                    });
                    document.addEventListener('keydown', trapFocus);
                } else {
                    mobileMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));
                    document.removeEventListener('keydown', trapFocus);
                }
            });
        });

        // Close mobile menu when clicking on a link - works for all instances
        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                mobileToggles.forEach(toggle => toggle.classList.remove('active'));
                mobileMenus.forEach(menu => menu.classList.remove('active'));
                body.classList.remove('mobile-menu-open');
                
                mobileMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));
                document.removeEventListener('keydown', trapFocus);
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Desktop menu toggle - works for all instances
        const desktopToggles = document.querySelectorAll('.desktop-menu-toggle');
        const desktopMenus = document.querySelectorAll('.desktop-menu-slider');
        const body = document.body;

        // Initialize aria-hidden
        desktopMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));

        desktopToggles.forEach(function(desktopToggle) {
            desktopToggle.addEventListener('click', function() {
                // // //
                desktopToggles.forEach(toggle => toggle.classList.toggle('active'));
                desktopMenus.forEach(menu => menu.classList.toggle('active'));
                body.classList.toggle('mobile-menu-open');

                if (body.classList.contains('mobile-menu-open')) {
                    desktopMenus.forEach(menu => {
                        menu.setAttribute('aria-hidden', 'false');
                        const firstMenuItem = menu.querySelector('a, button, input');
                        if (firstMenuItem) {
                            firstMenuItem.focus();
                        }
                    });
                    document.addEventListener('keydown', trapFocus);
                } else {
                    desktopMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));
                    document.removeEventListener('keydown', trapFocus);
                }
            });
        });

        // Close desktop menu when clicking on a link - works for all instances
        const desktopLinks = document.querySelectorAll('.desktop-menu-slider a');
        desktopLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                desktopToggles.forEach(toggle => toggle.classList.remove('active'));
                desktopMenus.forEach(menu => menu.classList.remove('active'));
                body.classList.remove('mobile-menu-open');
                
                desktopMenus.forEach(menu => menu.setAttribute('aria-hidden', 'true'));
                document.removeEventListener('keydown', trapFocus);
            });
        });
    });

    jQuery(document).ready(function() {

        // Modal Accessibility Fixes
        var $bookingPopup = jQuery('.booking_popup');
        var lastFocusedElement;

        function trapModalFocus(e) {
            if (!$bookingPopup.hasClass('open')) return;

            var isTab = (e.key === 'Tab' || e.keyCode === 9);
            var isEsc = (e.key === 'Escape' || e.keyCode === 27);

            if (isEsc) {
                closeBookingPopup();
                return;
            }

            if (!isTab) return;

            var focusableElements = $bookingPopup[0].querySelectorAll('a[href], button:not([disabled]), area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), iframe, object, embed, [tabindex="0"], [contenteditable]');
            var focusableCollection = Array.prototype.slice.call(focusableElements);
            
            if (focusableCollection.length === 0) return;

            var firstTabStop = focusableCollection[0];
            var lastTabStop = focusableCollection[focusableCollection.length - 1];

            if (e.shiftKey) { /* shift + tab */
                if (document.activeElement === firstTabStop) {
                    e.preventDefault();
                    lastTabStop.focus();
                }
            } else { /* tab */
                if (document.activeElement === lastTabStop) {
                    e.preventDefault();
                    firstTabStop.focus();
                }
            }
        }

        function openBookingPopup() {
            lastFocusedElement = document.activeElement;
            $bookingPopup.addClass('open');
            $bookingPopup.attr('aria-hidden', 'false');
            $bookingPopup.attr('role', 'dialog');
            $bookingPopup.attr('aria-modal', 'true');
            
            // Allow visibility transition before focus
            setTimeout(function() {
                var closeBtn = $bookingPopup.find('.close_btn');
                if (closeBtn.length) {
                    closeBtn.focus();
                }
            }, 50);

            document.addEventListener('keydown', trapModalFocus);
        }

        function closeBookingPopup() {
            $bookingPopup.removeClass('open');
            $bookingPopup.attr('aria-hidden', 'true');
            $bookingPopup.removeAttr('role');
            $bookingPopup.removeAttr('aria-modal');
            
            document.removeEventListener('keydown', trapModalFocus);
            
            if (lastFocusedElement) {
                lastFocusedElement.focus();
            }
        }

        jQuery('a[href="#open_popup"]').on('click', function(e) {
            e.preventDefault();
            openBookingPopup();
        });

        jQuery(document).on('click', '.booking_popup .close_btn', function(e) {
            e.preventDefault();
            closeBookingPopup();
        });

        jQuery('a[href^="#"]').on('click', function(e) {
            e.preventDefault();

            var target = jQuery(this.hash);
            var offset = 40; // Adjust this value based on your header height

            // Check if target exists
            if (target.length) {
                jQuery('html, body').animate({
                    scrollTop: target.offset().top - offset
                }, 800); // Animation duration in milliseconds
            }
        });

        // Scroll functionality for real_header and fake_header
        var realHeaders = jQuery('.real_header');
        var fakeHeaders = jQuery('.fake_header');
        var scrollThreshold = 5; // Pixels scrolled before triggering
        var scrollTimer;

        jQuery(window).on('scroll', function() {
            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > scrollThreshold) {
                // User has scrolled down
                if (!realHeaders.hasClass('active') && !realHeaders.hasClass('hidden')) {
                    realHeaders.addClass('hidden');
                    fakeHeaders.addClass('deactivate');

                    scrollTimer = setTimeout(function() {
                        realHeaders.removeClass('hidden');
                        realHeaders.addClass('active');
                    }, 200);
                }
            } else {
                // User is at the top
                clearTimeout(scrollTimer);
                realHeaders.removeClass('hidden');
                realHeaders.removeClass('active');
                fakeHeaders.removeClass('deactivate');
            }
        });

        setTimeout(function() {
            jQuery('.ot-dtp-picker[role="main"]').attr('role', 'search');
        }, 1000);

    });

</script>