<?php
/**
 * Standard Inclusions Info
 */

$use_global = get_sub_field('use_global_standard_inclusions_message');
$std_inc_heading = get_field('global_standard_inclusions_header', 'option');
$std_inc_body = get_field('global_standard_inclusions_text', 'option');
$bg_img = get_field('standard_inclusions_background_image', 'option');

if ( $use_global == false ) {
    $std_inc_heading = get_sub_field('standard_inclusions_header');
    $std_inc_body = get_sub_field('standard_inclusions_text');
}
?>

<div class="std-inc module" style="background-image: url(<?php echo esc_url($bg_img['url']); ?>); background-position: <?php echo get_field('standard_inclusions_bg_img_offset_x', 'option') . '% ' . get_field('standard_inclusions_bg_img_offset_y', 'option') . '%;'; ?>">
    <div class="container-lg">
        <div class="std-inc__wrap">
            <?php
            echo '<h2 class="std-inc__heading">' . $std_inc_heading . '</h2>';
            echo wpautop( $std_inc_body );
            ?>
        </div>                
    </div>
</div>