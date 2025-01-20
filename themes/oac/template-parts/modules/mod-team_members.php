<?php
/**
 * Team Members
 */
?>

<div class="team module">
    <div class="container-lg">
        <div class="team__text-wrap animate">
            <hr>
            <?php
            if ( ! empty( get_sub_field('title') ) ) echo '<h2 class="team__title highlight-only">' . get_sub_field('title') . '</h2>';
            if ( ! empty( get_sub_field('text') ) ) echo wpautop( get_sub_field('text') );
            $team_members = get_sub_field('team_members');
            if ( $team_members ) :
                $i = 0;
            ?>
            <div class="team__flex">
            <?php
            foreach( $team_members as $team ) :
                setup_postdata( $team );
                $team_id = $team->ID;
                $i++;
            ?>
                <div class="team__card animate">
                    <button class="team__btn" data-bs-toggle="modal" data-bs-target="#team-modal-<?php echo $i; ?>" aria-label="<?php echo sprintf( __( 'Open dialog for more about %s', '_themename' ), get_the_title( $team_id ) ); ?>">
                        <span class="team__img-wrap<?php if ( get_field( 'add_border', $team_id ) ) echo ' team__img-wrap--border'; ?>">
                            <?php echo get_the_post_thumbnail( $team_id ); ?>
                        </span>
                        <p class="team__name"><?php echo get_the_title( $team_id ); ?></p>
                    </button>
                </div>
            <?php
            endforeach;
            wp_reset_postdata();
            ?>
            </div>
        </div>
        <?php
        endif;
        if ( $team_members ) :
            $i = 0;
            foreach( $team_members as $team ) :
                setup_postdata( $team );
                $team_id = $team->ID;
                $phone_no_spaces = str_replace( ' ', '', get_field( 'phone_number', $team_id ) );
                $phone_link = _themename_clean_string( $phone_no_spaces );
                $i++;
        ?>
            <div class="modal fade team__dialog" id="team-modal-<?php echo $i; ?>" aria-labelledby="team-member-<?php echo $i; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php _e( 'Close', '_themename' ); ?>">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="team__img-wrap team__img-wrap--modal<?php if ( get_field( 'add_border', $team_id ) ) echo ' team__img-wrap--border'; ?>">
                                <?php echo get_the_post_thumbnail( $team_id ); ?>
                            </div>
                            <h2 id="team-member-<?php echo $i; ?>" class="team__name team__name--modal"><?php echo get_the_title( $team_id ); ?></h2>
                            <div class="team__text">
                                <?php echo wpautop( get_the_content( $team_id ) ); ?>
                                <?php echo get_field( 'phone', $team_id ); ?>
                            </div>
                            <div class="team__phone">
								<div class="team__phone-i" aria-hidden="true">
									<?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-phone.svg' ); ?>
								</div>
								<div class="team__phone-text">
									<?php echo '<p><a href="tel:' . $phone_link . '">' . get_field( 'phone_number', $team_id ) . '</a></p>'; ?>
								</div>
							</div>
                            <div class="team__email">
								<div class="team__email-i" aria-hidden="true">
									<?php echo file_get_contents( get_template_directory_uri() . '/dist/images/icon-email.svg' ); ?>
								</div>
								<div class="team__email-text">
									<?php echo wpautop( '<a href="' . esc_url( 'mailto:' . antispambot( get_field( 'email', $team_id ) ) ) . '">' . esc_html( antispambot( get_field( 'email', $team_id ) ) ) . '</a>' ); ?>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>