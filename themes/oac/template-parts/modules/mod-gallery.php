<?php
/**
 * Gallery
 */
// only supports one gallery per page currently
?>

<div class="gallery module">
    <div class="container-lg animate">
        <hr>
        <h2 class="gallery__title"><?php echo get_sub_field('gallery_title'); ?></h2>
        <?php
        if ( ! empty( get_sub_field('gallery_subtitle') ) ) echo '<p class="gallery__subtitle">' . get_sub_field('gallery_subtitle') . '</p>';
        $images = get_sub_field('gallery');
        ?>
    </div>
</div>
<div class="gallery__container animate">
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
    <div class="gallery module<?php if ( get_sub_field('add_bottom_padding') ) echo ' gallery--bpad'; ?>">
        <ul class="gallery__flex">
            <?php  
            $i = 0;
            foreach( $images as $image ):
                $i++;
            ?>
            <li class="gallery__li">
                <button type="button" data-slide="<?php echo $i; ?>" class="gallery__btn" aria-label="<?php echo sprintf( __( 'View %s at full size', '_themename' ), $image['alt']); ?>" aria-expanded="false">
                    <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" class="gallery__thumb" alt="">
                </button>
            </li>
            <?php
            endforeach;
            ?>
        </ul>
    </div>
</div>
        