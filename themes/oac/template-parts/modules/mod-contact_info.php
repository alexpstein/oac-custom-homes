<?php
/**
 * Contact Info
 */

$use_global_address = get_sub_field('use_global_address');
$use_global_phone = get_sub_field('use_global_phone');
$use_global_email = get_sub_field('use_global_email');

// Set contact info vars to match footer unless overridden
if ( have_rows( 'contact_information', 'option' ) ) :
    while ( have_rows( 'contact_information', 'option' ) ): the_row();
        $address = get_sub_field('contact_address');
        $phone = get_sub_field('contact_phone_numbers');
        $email = get_sub_field('contact_email');
    endwhile;
endif;

if ( $use_global_address == false && !empty( get_sub_field('address') ) ) $address = get_sub_field('address');
if ( $use_global_phone == false && !empty( get_sub_field('phone') ) ) $phone = get_sub_field('phone');
if ( $use_global_email == false && !empty( get_sub_field('email') ) ) $email = get_sub_field('email');
?>

<div class="contact-info module">
    <div class="container-lg">
        <div class="row">
            <div class="col-12 col-md-7">
                <div class="animate">
                    <h2 class="contact-info__heading"><?php _e( 'Address', '_themename' ); ?></h2>
                    <?php echo wpautop( $address ); ?>
                </div>
                <div class="animate">
                    <h2 class="contact-info__heading"><?php _e( 'Phone', '_themename' ); ?></h2>
                    <?php echo wpautop( $phone ); ?>
                </div>
                <div class="animate">
                    <h2 class="contact-info__heading"><?php _e( 'Email', '_themename' ); ?></h2>
                    <?php echo wpautop( '<a href="' . esc_url( 'mailto:' . antispambot( $email ) ) . '">' . esc_html( antispambot( $email ) ) . '</a>' ); ?>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="animate">
                    <h2 class="contact-info__heading"><?php _e( 'Social Media', '_themename' ); ?></h2>
                    <?php
                    while ( have_rows( 'sm_links', 'option' ) ) : the_row();
                        $sm_label = sprintf( __( '%s on %s', '_themename' ), get_bloginfo( 'name' ), get_sub_field( 'sm_name' ) );
                        $sm_icon = get_sub_field ( 'sm_icon' );
                        $sm_icon_url = $sm_icon['url'];
                        $sm_url = esc_attr( get_sub_field('sm_link') );
                    ?>
                        <div class="contact-info__social">
                            <div class="contact-info__social-i" aria-hidden="true">
                                <?php echo file_get_contents( _themename_full_path( $sm_icon_url ) ); ?>
                            </div>
                            <a href="<?php echo $sm_url; ?>" class="contact-info__social-link" aria-label="<?php echo $sm_url . ', ' . $sm_label; ?>" target="_blank"><?php echo _themename_remove_http( $sm_url ); ?></a>
                        </div>	
                    <?php
                    endwhile; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>