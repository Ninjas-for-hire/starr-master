<?php

$section_id = $args['section_id'];
$section_class = $args['section_class'];
$title = $args['title'];
$html_content = $args['html_content'];

?>

<section class="html_code_section" <?php $section_id = $args['section_id']; if($section_id){?> id="<?php echo $section_id; ?>" <?php } ?>>

    <div class="container">

        <div class="html_code_section_inner">

            <?php if ($title): ?>
                <h2><?php echo esc_html($title); ?></h2>
            <?php endif; ?>


            <?php if ($html_content): ?>
                <div><?php echo ($html_content); ?></div>
            <?php endif; ?>

        </div>

    </div>

</section>
