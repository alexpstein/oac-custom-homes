<?php
/**
 * CTA
 */

$bg_img = get_sub_field('background_image');
$bg_pos_x = '50';
$bg_pos_y = '50';
if ( !empty( get_sub_field('x_pos')) ) $bg_pos_x = get_sub_field('x_pos');
if ( !empty( get_sub_field('y_pos')) ) $bg_pos_y = get_sub_field('y_pos');
?>

<div class="cta module" style="background-image: url(<?php echo esc_url( $bg_img['url'] ); ?>); background-position: <?php echo $bg_pos_x . '% ' . $bg_pos_y . '%;'; ?>">
    <div class="container-lg">
        
    </div>
</div>