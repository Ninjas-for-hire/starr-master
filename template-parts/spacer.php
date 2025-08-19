<?php
/**
 * Spacer Component Template Part
 */

// Get component data passed from index.php
$desktop = $args['desktop'];
$tablet = $args['tablet'];
$mobile = $args['mobile'];

// Build classes
$classes = array();
if ($desktop) $classes[] = 'ds-' . $desktop;
if ($tablet) $classes[] = 'ts-' . $tablet;
if ($mobile) $classes[] = 'ms-' . $mobile;

$class_string = implode(' ', $classes);
?>

<div class="spacer <?php echo esc_attr($class_string); ?>"></div>