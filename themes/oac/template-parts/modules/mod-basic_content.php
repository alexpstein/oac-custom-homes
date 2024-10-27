<?php
/**
 * Basic Content
 */
?>

<div class="basic-content module <?php if ( get_sub_field('reduce_bottom_margin') ) echo 'basic-content--bmargin'; ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php echo get_sub_field('content'); ?>
            </div>
        </div>
    </div>
</div>