<?php
/**
 * Hero section for interior pages
 */
?>

<?php
$hero_bg = get_sub_field('hero_bg_image');
?>

<div class="hero module<?php if ( get_sub_field('override_offset') ) echo ' hero--center-bg'; ?>" style="background-image: url(<?php echo esc_url($hero_bg['url']); ?>); background-position: <?php echo get_sub_field('hero_image_offset_x') . '% ' . get_sub_field('hero_image_offset_y') . '%'; ?>">
    <div class="hero__bg-gradient" style="opacity: <?php echo ( !empty( get_sub_field('bg_gradient_opacity') ) ) ? get_sub_field('bg_gradient_opacity') : '0'; ?>;"></div>
    <div class="container-lg">
        <div class="hero__text">
            <h1 class="hero__heading"><?php echo get_sub_field('hero_heading') ?></h1>
            <?php if ( ! empty( get_sub_field('hero_cta_button_text') ) ) echo '<a href="' . get_sub_field('hero_cta_button_link') . '" class="btn btn--white hero__cta-btn">' . get_sub_field('hero_cta_button_text') . '</a>'; ?>
            <?php if ( get_sub_field('display_down_arrow') ) echo '<a href="#article-body" class="hero__skip-link" aria-label="' . __( 'Scroll to body content', '_themename' ) . '"></a>'; ?>
        </div>
    </div>
</div>
<?php if ( get_sub_field('display_down_arrow') ) echo '<a id="article-body"></a>';