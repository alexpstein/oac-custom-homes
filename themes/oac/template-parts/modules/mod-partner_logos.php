<?php
/**
 * Partner Logos
 */
?>

<div class="partner-logos module">
    <div class="container-lg">
        <?php if ( ! empty( get_sub_field('logos_heading') ) ) echo '<h2 class="partner-logos__heading">' . get_sub_field('logos_heading') . '</h2>'; ?>
        <?php
        if ( have_rows('logos') ) :
        ?>
            <div class="partner-logos__flex">
            <?php
            while ( have_rows('logos') ) : the_row();
                $logo_url = get_sub_field('logo')['url'];
                $logo_url_2x = get_sub_field('logo_2x');
                $logo_alt = get_sub_field('logo')['alt'];
            ?>
                <div class="partner-logos__logo">
                    <img src="<?php echo $logo_url_2x; ?>" srcset="<?php echo $logo_url; ?> 1x, <?php echo $logo_url_2x; ?> 2x" alt="<?php echo $logo_alt; ?>">
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