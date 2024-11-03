<?php
/**
 * Contact Form
 */

$use_global = get_sub_field('use_global_contact_form_text');
$contact_heading = get_field('global_contact_form_header', 'option');
$contact_body = get_field('global_contact_form_text', 'option');
$use_divider = get_sub_field('use_divider');
$alt_divider = get_sub_field('use_alt_divider_style');
$divider_class = 'hr-default';
$reduce_top_padding = get_sub_field('reduce_top_padding');

if ( $use_global == false ) {
    $contact_heading = get_sub_field('heading');
    $contact_body = get_sub_field('body_text');
}

if ( $alt_divider ) $divider_class = 'hr-alt';
?>

<div class="contact-form module <?php if ( $reduce_top_padding ) echo 'contact-form--pt0'; ?>">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php
                if ( $use_divider ) echo '<hr class="' . $divider_class . '">';
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