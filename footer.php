<?php
// Get footer data from ACF options
$hours_section = get_field('hours_section', 'option');
$dress_code_section = get_field('dress_code_section', 'option');
$contact_section = get_field('contact_section', 'option');
$location_section = get_field('location_section', 'option');
$social_section = get_field('social_section', 'option');
$company_section = get_field('company_section', 'option');
$mailing_list_section = get_field('mailing_list_section', 'option');
$footer_bg_color = get_field('footer_background_color', 'option');
$footer_text_color = get_field('footer_text_color', 'option');
?>

<footer style="
        background-color: <?php echo $footer_bg_color ? $footer_bg_color : '#f8f8f8'; ?>;
        color: <?php echo $footer_text_color ? $footer_text_color : '#333333'; ?>;
        ">

    <div class="container">

        <div class="inner_footer">

            <div class="footer_grid">

                <!-- Left Column -->
                <div class="footer_left_column">

                    <!-- Hours Section -->
                    <?php if ($hours_section): ?>
                        <div class="footer_section hours_section">
                            <?php if ($hours_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($hours_section['title']); ?></h3>
                            <?php endif; ?>

                            <?php if ($hours_section['subtitle']): ?>
                                <p class="hours_subtitle"><?php echo esc_html($hours_section['subtitle']); ?></p>
                            <?php endif; ?>

                            <?php if ($hours_section['hours_list']): ?>
                                <div class="hours_list">
                                    <?php foreach ($hours_section['hours_list'] as $hours): ?>
                                        <p class="hours_item"><?php echo esc_html($hours['day_time']); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Dress Code Section -->
                    <?php if ($dress_code_section): ?>
                        <div class="footer_section dress_code_section">
                            <?php if ($dress_code_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($dress_code_section['title']); ?></h3>
                            <?php endif; ?>

                            <?php if ($dress_code_section['content']): ?>
                                <p class="dress_code_content"><?php echo esc_html($dress_code_section['content']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Contact Section -->
                    <?php if ($contact_section): ?>
                        <div class="footer_section contact_section">
                            <?php if ($contact_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($contact_section['title']); ?></h3>
                            <?php endif; ?>

                            <?php if ($contact_section['contact_items']): ?>
                                <div class="contact_list">
                                    <?php foreach ($contact_section['contact_items'] as $contact): ?>
                                        <div class="contact_item">
                                            <?php if ($contact['label']): ?>
                                                <span class="contact_label"><?php echo esc_html($contact['label']); ?></span>
                                            <?php endif; ?>

                                            <?php if ($contact['value']): ?>
                                                <?php if ($contact['type'] === 'phone'): ?>
                                                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $contact['value'])); ?>" class="contact_value contact_phone">
                                                        <?php echo esc_html($contact['value']); ?>
                                                    </a>
                                                <?php elseif ($contact['type'] === 'email'): ?>
                                                    <a href="mailto:<?php echo esc_attr($contact['value']); ?>" class="contact_value contact_email">
                                                        <?php echo esc_html($contact['value']); ?>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="contact_value"><?php echo esc_html($contact['value']); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <!-- Right Column -->
                <div class="footer_right_column">

                    <!-- Location Section -->
                    <?php if ($location_section): ?>
                        <div class="footer_section location_section">
                            <?php if ($location_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($location_section['title']); ?></h3>
                            <?php endif; ?>

                            <div class="location_address">
                                <?php if ($location_section['address_line_1']): ?>
                                    <p class="address_line"><?php echo esc_html($location_section['address_line_1']); ?></p>
                                <?php endif; ?>

                                <?php if ($location_section['address_line_2']): ?>
                                    <p class="address_line"><?php echo esc_html($location_section['address_line_2']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Social Media Section -->
                    <?php if ($social_section && $social_section['social_links']): ?>
                        <div class="footer_section social_section">
                            <?php if ($social_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($social_section['title']); ?></h3>
                            <?php endif; ?>

                            <div class="social_links">
                                <?php foreach ($social_section['social_links'] as $social): ?>
                                    <?php if ($social['platform'] && $social['url']): ?>
                                        <a href="<?php echo esc_url($social['url']); ?>"
                                           class="social_link"
                                           target="_blank"
                                           rel="noopener noreferrer">
                                            <?php echo esc_html($social['platform']); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Company Links Section -->
                    <?php if ($company_section): ?>
                        <div class="footer_section company_section">
                            <?php if ($company_section['title']): ?>
                                <h3 class="footer_section_title"><?php echo esc_html($company_section['title']); ?></h3>
                            <?php endif; ?>

                            <!-- First Row of Company Links -->
                            <?php if ($company_section['company_links_row_1']): ?>
                                <div class="company_links company_links_row_1">
                                    <?php foreach ($company_section['company_links_row_1'] as $link_item): ?>
                                        <?php $link = $link_item['link']; ?>
                                        <?php if ($link): ?>
                                            <a href="<?php echo esc_url($link['url']); ?>"
                                               class="company_link"
                                               <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>>
                                                <?php echo esc_html($link['title']); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Second Row of Company Links -->
                            <?php if ($company_section['company_links_row_2']): ?>
                                <div class="company_links company_links_row_2">
                                    <?php foreach ($company_section['company_links_row_2'] as $link_item): ?>
                                        <?php $link = $link_item['link']; ?>
                                        <?php if ($link): ?>
                                            <a href="<?php echo esc_url($link['url']); ?>"
                                               class="company_link"
                                               <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>>
                                                <?php echo esc_html($link['title']); ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Mailing List Section -->
                    <?php if ($mailing_list_section): ?>
                        <div class="footer_section mailing_list_section">
                            <?php if ($mailing_list_section['text'] && $mailing_list_section['url']): ?>
                                <a href="<?php echo esc_url($mailing_list_section['url']); ?>"
                                   class="mailing_list_link"
                                   target="_blank"
                                   rel="noopener noreferrer">
                                    <?php echo esc_html($mailing_list_section['text']); ?>
                                </a>
                            <?php elseif ($mailing_list_section['text']): ?>
                                <p class="mailing_list_text"><?php echo esc_html($mailing_list_section['text']); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>