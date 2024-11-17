<?php
/**
 * Floor Plan Preview
 */

$prev_image = get_sub_field('image');
?>

<div class="floor-plan-prev module">
    <div class="container-lg">
        <button type="button" aria-label="<?php _e( 'Click to Enlarge floor plan in dialog', '_themename' ); ?>" class="floor-plan-prev__btn" data-bs-toggle="modal" data-bs-target="#floor-plan-prev-dialog">
            <img src="<?php echo $prev_image['url']; ?>" class="floor-plan-prev__img" alt="">
            <span class="floor-plan-prev__btn-text"><?php _e( 'Click to Enlarge', '_themename' ); ?></span>
        </button>
    </div>
</div>

<div class="floor-plan-prev__modal modal fade" id="floor-plan-prev-dialog" tabindex="-1" aria-label="<?php echo sprintf( __( 'Floor plan for %s', '_themename'), get_the_title() ); ?>" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php _e( 'Close', '_themename' ); ?>">&times;</button>
            </div>
            <div class="modal-body">
                <div class="floor-plan-prev__img-container">
                    <img src="<?php echo $prev_image['url']; ?>" class="floor-plan-prev__img-full" alt="<?php echo sprintf( __( 'Floor plan for %s', '_themename'), get_the_title() ); ?>">
                </div>
            </div>
        </div>
    </div>
</div>