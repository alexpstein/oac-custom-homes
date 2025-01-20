<?php
/**
 * Floor Plans
 */
?>

<?php
if ( have_rows('floor_plans') ) : 
    $i = 0;
?>
<div class="floor-plans module">
    <div class="container-lg">
        <div class="floor-plans__flex">
            <?php
            while ( have_rows('floor_plans') ) : the_row();
                $floor_plan = get_sub_field('floor_plan');
                $floor_plan_name = $floor_plan->post_title;
                $floor_plan_id = $floor_plan->ID;
                $fp_img = get_sub_field('plan_image');
                $fp_img_2x = get_sub_field('plan_image_2x');
                $i++;
            ?>
            <div class="floor-plans__card">
                <?php if ( $i > 1 ) echo '<hr class="hr-alt">'; ?>
                <h2 class="floor-plans__name"><?php echo esc_html( $floor_plan_name ); ?></h2>
                <p class="floor-plans__location"><?php echo get_field('location', $floor_plan_id ); ?></p>
                <div class="floor-plans__img-wrap">
                    <img src="<?php echo $fp_img['url']; ?>" srcset="<?php echo $fp_img['url'] . ' 1x,' . $fp_img_2x . ' 2x'; ?>" class="floor-plans__img" alt="">
                </div>
                <a href="<?php echo esc_url( get_permalink( $floor_plan_id ) ); ?>" class="floor-plans__link btn btn--arrow" aria-label="<?php echo sprintf( __( 'Learn more about %s', '_themename' ), $floor_plan_name ); ?>">
                    <?php _e( 'Learn More', '_themename' ); ?>
                    <span class="btn--arrow__arrow" aria-hidden="true"></span>
                </a>
            </div>
            <?php          
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php endif; ?>