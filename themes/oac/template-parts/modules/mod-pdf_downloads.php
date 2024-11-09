<?php
/**
 * PDF Downloads
 */
?>

<div class="pdf-dl module">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php
                echo wpautop( get_sub_field('body_text') );

                if ( have_rows('pdfs') ) :
                ?>
                <div class="pdf-dl__flex">
                    <?php
                    while ( have_rows('pdfs') ) : the_row();
                        $pdf_img = get_sub_field('pdf_img');
                        $pdf_file = get_sub_field('pdf_file');
                        $pdf_dl_label = sprintf( __( 'Download %s PDF', '_themename' ), get_sub_field('pdf_title') );
                    ?>
                    <div class="pdf-dl__file">
                        <img src="<?php echo $pdf_img['url']; ?>" alt="" class="pdf-dl__img">
                        <h2 class="pdf-dl__title"><?php echo get_sub_field('pdf_title'); ?></h2>
                        <a href="<?php echo $pdf_file['url']; ?>" class="pdf-dl__btn btn btn--arrow" aria-label="<?php echo $pdf_dl_label; ?>" download><?php _e('Download', '_themename'); ?><span class="btn--arrow__arrow" aria-hidden="true"></span></a>
                    </div>
                    <?php
                    endwhile;
                    ?>
                </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>