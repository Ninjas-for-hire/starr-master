<?php
/**
 * Menu Component Template Part
 */

// Get component data passed from index.php
$menu_tabs = $args['menu_tabs'];

?>

<section class="menu_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?> style="background-color:#ffffff;">

    <?php if($args['menu_heading']) { ?>
        <div class="container">
            <div class="chef_section">
                <div class="chef_section_inner" style="margin-bottom: 2.6rem">
                    <div class="right" style="min-width: 100%; text-align: center; padding-top: 0;">
                        <h2 class="chef_title" ><?php echo $args['menu_heading']; ?></h2>
                        <div class="menu_description"><?php echo $args['menu_description']; ?></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="menu_section_inner">

        <?php if ($menu_tabs): ?>

            <!-- Menu Tabs Navigation -->
            <div class="menu_tabs_nav">
                <?php foreach ($menu_tabs as $index => $tab): ?>
                    <button class="menu_tab_button <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-tab="tab-<?php echo $index; ?>">
                        <?php echo esc_html($tab['tab_name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Menu Tabs Content -->
            <div class="menu_tabs_content">
                <?php foreach ($menu_tabs as $index => $tab): ?>

                    <?php
                    // Determine which columns are in use
                    $columns_in_use = array();
                    if ($tab['column_sections']):
                        foreach ($tab['column_sections'] as $section):
                            if (isset($section['column']) && !in_array($section['column'], $columns_in_use)):
                                $columns_in_use[] = $section['column'];
                            endif;
                        endforeach;
                    endif;

                    // Sort columns numerically
                    sort($columns_in_use, SORT_NUMERIC);

                    // Get column count
                    $column_count = count($columns_in_use);
                    ?>

                    <div class="menu_tab_content <?php echo $index === 0 ? 'active' : ''; ?>"
                         id="tab-<?php echo $index; ?>">

                        <?php if ($tab['tab_description']): ?>
                            <div class="tab_description"><?php echo $tab['tab_description']; ?></div>
                        <?php endif; ?>

                        <div class="menu_columns column_count-<?php echo $column_count; ?>">

                            <?php if ($column_count > 0): ?>
                                <?php foreach ($columns_in_use as $column_num): ?>

                                    <div class="menu_column column_<?php echo $column_num; ?>">

                                        <?php if ($tab['column_sections']): ?>
                                            <?php foreach ($tab['column_sections'] as $section): ?>

                                                <?php if ($section['column'] == $column_num): ?>

                                                    <div class="menu_section_block">

                                                        <?php if ($section['section_title']): ?>
                                                            <h3 class="menu_section_title"><?php echo esc_html($section['section_title']); ?></h3>
                                                        <?php endif; ?>

                                                        <?php if ($section['section_description']): ?>
                                                            <div class="menu_item_ingredients section_description"><?php echo $section['section_description']; ?></div>
                                                        <?php endif; ?>

                                                        <?php if ($section['menu_items']): ?>
                                                            <div class="menu_items_list">
                                                                <?php foreach ($section['menu_items'] as $item): ?>

                                                                    <div class="menu_item">

                                                                        <div class="menu_item_header">
                                                                            <?php if ($item['title']): ?>
                                                                                <h4 class="menu_item_title">
                                                                                    <?php echo esc_html($item['title']); ?>
                                                                                    <?php if ($item['price']): ?>
                                                                                        <span class="menu_item_price"><?php echo esc_html($item['price']); ?></span>
                                                                                    <?php endif; ?>
                                                                                </h4>
                                                                            <?php endif; ?>
                                                                        </div>

                                                                        <?php if ($item['ingredients']): ?>
                                                                            <p class="menu_item_ingredients"><?php echo esc_html($item['ingredients']); ?>
                                                                            </p>
                                                                        <?php endif; ?>

                                                                        <?php if ($item['extras']): ?>
                                                                            <div class="menu_item_extras">
                                                                                <?php foreach ($item['extras'] as $extra): ?>
                                                                                    <div class="menu_extra">
                                                                                        <?php if ($extra['ingredient']): ?>
                                                                                            <span class="extra_ingredient">| + <?php echo esc_html($extra['ingredient']); ?></span>
                                                                                        <?php endif; ?>
                                                                                        <?php if ($extra['price']): ?>
                                                                                            <span class="extra_price"><?php echo esc_html($extra['price']); ?></span>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <?php if ($item['description']): ?>
                                                                            <div class="description"><?php echo $item['description']; ?></div>
                                                                        <?php endif; ?>

                                                                    </div>

                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                    </div>

                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>

                    </div>

                <?php endforeach; ?>
            </div>

        <?php endif; ?>

    </div>

    <!-- JavaScript for tab functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find all menu sections on the page
            const menuSections = document.querySelectorAll('.menu_section');

            // Initialize tabs for each menu section independently
            menuSections.forEach(function(menuSection) {
                const tabButtons = menuSection.querySelectorAll('.menu_tab_button');
                const tabContents = menuSection.querySelectorAll('.menu_tab_content');

                tabButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetTab = this.getAttribute('data-tab');

                        // Remove active class from buttons and contents ONLY within this menu section
                        tabButtons.forEach(btn => btn.classList.remove('active'));
                        tabContents.forEach(content => content.classList.remove('active'));

                        // Add active class to clicked button and corresponding content
                        this.classList.add('active');
                        const targetContent = menuSection.querySelector('#' + targetTab);
                        if (targetContent) {
                            targetContent.classList.add('active');
                        }
                    });
                });
            });
        });
    </script>

</section>