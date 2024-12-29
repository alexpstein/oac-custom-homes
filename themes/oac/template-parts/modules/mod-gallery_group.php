<?php
/**
 * Gallery Group
 */
?>

<div class="gallery-group module">
    <div class="container-lg">
        <div class="animate">
            <?php
            if ( ! empty( get_sub_field('heading') ) ) echo '<h2 class="gallery-group__heading highlight-only">' . get_sub_field('heading') . '</h2>';
            if ( ! empty( get_sub_field('body_text') ) ) echo wpautop( get_sub_field('body_text') );
            ?>
        </div>
        <?php
        if ( have_rows('galleries') ) :
            $i = 0;
        ?>
            <ul class="gallery-group__flex">
            <?php
            while ( have_rows('galleries') ) : the_row();
                $gallery_name = get_sub_field('gallery_title');
                $images = get_sub_field('gallery');
                $i++;
            ?>
                <li class="gallery-group__li animate">
                    <button type="button" class="gallery-group__btn" data-bs-toggle="modal" data-bs-target="#gallery-modal-<?php echo $i; ?>"  aria-label="<?php echo sprintf( __( 'View gallery for %s', '_themename' ), $gallery_name ); ?>">
                        <div class="gallery-group__btn-label">
                            <span class="gallery-group__btn-label-text"><?php echo get_sub_field('gallery_title'); ?></span>
                        </div>
                        <img src="<?php echo esc_url( $images[0]['sizes']['thumbnail'] ); ?>" class="gallery__thumb" alt="">
                    </button>
                </li>
            <?php
            endwhile;
            ?>
            </ul>
        <?php
        endif;
        if ( have_rows('galleries') ) :
            reset_rows();
            $i = 0;
            while ( have_rows('galleries') ) : the_row();
                $images = get_sub_field('gallery');
                $i++;
            ?>
            <div class="modal fade gallery__dialog" id="gallery-modal-<?php echo $i; ?>" aria-label="<?php echo sprintf( __('%s gallery', '_themename'), get_sub_field('gallery_title') ); ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-full-width modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php _e( 'Close', '_themename' ); ?>">&times;</button>
                        </div>
                        <div class="modal-body gallery__modal">
                            <div class="gallery__slick">
                                <?php
                                foreach( $images as $img ):
                                ?>
                                <div>
                                    <div class="gallery__el">
                                        <img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo $img['alt']; ?>" class="gallery__img">
                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                            </div>
                            <div class="gallery__modal-btns">
                                <?php
                                $slide = 0;
                                foreach( $images as $img ):
                                    $slide++;
                                ?>
                                <button class="gallery__modal-btn" data-slide="<?php echo $slide; ?>" aria-label="<?php echo sprintf( __( 'Go to slide %s', '_themename' ), $slide ); ?>">
                                    <img src="<?php echo esc_url( $img['sizes']['thumbnail'] ); ?>" alt="" class="gallery__btn-img">
                                </button>
                                <?php
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>