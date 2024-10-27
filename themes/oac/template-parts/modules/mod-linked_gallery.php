<?php
/**
 * Linked Gallery
 */
?>

<div class="gallery-linked module">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php
                if ( ! empty( get_sub_field('heading') ) ) echo '<h2 class="gallery-linked__heading">' . get_sub_field('heading') . '</h2>';
                if ( ! empty( get_sub_field('body_text') ) ) echo wpautop( get_sub_field('body_text') );
                if ( have_rows( 'images') ) :
                ?>
                    <ul class="gallery-linked__images">
                    <?php
                    while ( have_rows( 'images') ) : the_row();
                        $image = get_sub_field( 'image' );
                        $image_1x = $image['sizes']['thumbnail'];
                        $image_2x = $image['url'];
                    ?>
                        <li class="gallery-linked__li">
                            <a href="<?php echo esc_url( get_sub_field('url') ); ?>" class="gallery-linked__link">
                                <img src="<?php echo $image_1x; ?>" srcset="<?php echo $image_1x; ?> 1x, <?php echo $image_2x; ?> 2x" alt="<?php echo $image['alt']; ?>" class="gallery-linked__image">
                            </a>
                        </li>
                    <?php
                    endwhile;
                    ?>
                    </ul>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>