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
$footer_columns = get_field('footer_columns', 'option');
$email_signup = get_field('email_signup', 'option');
$term_pages = get_field('term_pages', 'option');
$footer_copy = get_field('footer_copy', 'option');
$footer_popup = get_field('footer_popup', 'option');
$footer_copy_styles = get_field('styling_settings_footer_copy_styles', 'option')['styling']['colour'];
?>

<div class="booking_popup" id="open_popup">
    <div class="internals">
        <div class="close_btn">x Close</div>
        <?php echo $footer_popup; ?>
    </div>
</div>

<footer style="
        background-color: <?php echo $footer_bg_color ? $footer_bg_color : '#f8f8f8'; ?>;
        color: <?php echo $footer_text_color ? $footer_text_color : '#333333'; ?>;
        border-color: <?php echo $footer_copy_styles ? $footer_copy_styles : '#333333'; ?>;
        " class="footer hover_links">

    <div class="container">

        <div class="inner_footer">

            <div class="footer_columns">

                <?php if ($footer_columns): ?>
                    <?php foreach ($footer_columns as $column): ?>
                        <div class="column">
                            <?php if ($column['column_fields']): ?>
                                <?php foreach ($column['column_fields'] as $field): ?>
                                    
                                    <?php if ($field['field_type'] === 'heading' && $field['heading']): ?>
                                        <h3 class="footer_section_title"><?php echo esc_html($field['heading']); ?></h3>
                                    
                                    <?php elseif ($field['field_type'] === 'text' && $field['text']): ?>
                                        <p class="footer_text"><?php echo esc_html($field['text']); ?></p>
                                    
                                    <?php elseif ($field['field_type'] === 'link' && $field['link']): ?>
                                        <a href="<?php echo esc_url($field['link']['url']); ?>"
                                           class="footer_link"
                                           <?php if ($field['link']['target']): ?>target="<?php echo esc_attr($field['link']['target']); ?>"<?php endif; ?>>
                                            <?php echo esc_html($field['link']['title']); ?>
                                        </a>
                                    <?php endif; ?>
                                    
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="column email_col">
                    <div class="email_holder">
                        <h3 class="footer_section_title">Email Signup</h3>
                        <?php if ($email_signup): ?>
                            <a href="<?php echo esc_url($email_signup['url']); ?>"
                               class="email_signup_link"
                               <?php if ($email_signup['target']): ?>target="<?php echo esc_attr($email_signup['target']); ?>"<?php endif; ?>>
                                <?php echo esc_html($email_signup['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer_bottom" style="border-color: <?php echo $footer_copy_styles ? $footer_copy_styles : '#333333'; ?>;">

                <?php if ($footer_copy): ?>
                    <p class="footer_copy"><?php echo esc_html($footer_copy); ?></p>
                <?php endif; ?>

                <?php if ($term_pages): ?>
                    <div class="term_pages">
                        <?php foreach ($term_pages as $term): ?>
                            <?php $link = $term['link']; ?>
                            <?php if ($link): ?>
                                <a href="<?php echo esc_url($link['url']); ?>" aria-label="<?php echo esc_attr($link['title']); ?>"
                                   class="term_link"
                                   <?php if ($link['target']): ?>target="<?php echo esc_attr($link['target']); ?>"<?php endif; ?>>
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>