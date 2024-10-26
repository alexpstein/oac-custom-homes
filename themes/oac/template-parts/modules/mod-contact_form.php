<?php
/**
 * Basic Content
 */
?>

<div class="contact-form module">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php
                if ( ! empty( get_sub_field('heading') ) ) echo '<h2 class="contact-form__heading">' . get_sub_field('heading') . '</h2>';
                if ( ! empty( get_sub_field('body_text') ) ) echo wpautop( get_sub_field('body_text') );
                ?>
                <?php echo do_shortcode( '[gravityform id="' . get_sub_field('form_id') . '" title="false" description="true"]'); ?>
                <script>
                jQuery(document).ready(function() {
                    jQuery('.gfield_required.gfield_required_text').text('*'); 
                });
                </script>
            </div>
        </div>
    </div>
</div>