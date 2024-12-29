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

<div class="cta module<?php if ( get_sub_field('reset_bg_pos') ) echo ' cta--bg-reset'; ?>" style="background-image: url(<?php echo esc_url( $bg_img['url'] ); ?>); background-position: <?php echo $bg_pos_x . '% ' . $bg_pos_y . '%;'; ?>">
    <div class="container-lg animate">
        <div class="cta__content">
            <h2 class="cta__heading"><?php echo get_sub_field('heading'); ?></h2>
            <?php echo wpautop( get_sub_field('text') ); ?>
            <?php
            if ( have_rows('links') ) :
            ?>
                <ul class="cta__links">
                <?php
                while ( have_rows('links') ) : the_row();
                ?>
                    <li class="cta__li">
                        <span class="cta__arrow" aria-hidden="true"><?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-chevron-right.svg' ); ?></span>
                        <a href="<?php echo esc_url( get_sub_field('link_url') ); ?>" class="cta__link"><?php echo get_sub_field('link_text'); ?></a>
                    </li>
                <?php
                endwhile;
                ?>
                </ul>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>