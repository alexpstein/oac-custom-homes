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
                $use_global = get_sub_field('use_global_contact_form_text');
                $contact_heading = get_field('global_contact_form_header', 'option');
                $contact_body = get_field('global_contact_form_text', 'option');

                if ( $use_global == false ) {
                    $contact_heading = get_sub_field('heading');
                    $contact_body = get_sub_field('body_text');
                }
                
                echo '<h2 class="contact-form__heading">' . $contact_heading . '</h2>';
                echo wpautop( $contact_body );
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