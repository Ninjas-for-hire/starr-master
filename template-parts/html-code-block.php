<?php

$section_id = $args['section_id'];
$section_class = $args['section_class'];
$title = $args['title'];
$content = $args['content'];
$html_content = $args['html_content'];
$image = $args['image'];

//var_dump($image);

?>

<section class="html_code_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?>>

    <div class="container">

        <div class="html_code_section_inner <?php if($image) { echo 'has_image'; } ?>">

            <div class="image_part">
                <img src="<?php echo $image['url']; ?>" />
            </div>

            <div class="content_part">

                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="content"><?php echo $content; ?></div>
                <?php endif; ?>

            </div>

        </div>

        <?php if ($html_content): ?>

            <button type="button" class="event-enquiry-btn">

                Event enquiry

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                </svg>

            </button>

            <div class="html-content-wrapper" style="display: none;">
                <?php echo ($html_content); ?>
            </div>
        <?php endif; ?>

    </div>

</section>

<script>
    jQuery(document).ready(function() {
        jQuery('.event-enquiry-btn').on('click', function() {
            jQuery(this).next('.html-content-wrapper').slideToggle();
            jQuery('.event-enquiry-btn').toggleClass('open');
        });
    });
</script>