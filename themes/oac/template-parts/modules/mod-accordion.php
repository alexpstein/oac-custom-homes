<?php
/**
 * Accordion
 */

if ( !isset($accordion_num) ) {
    $accordion_num = 1;
    $accordion_i = 0;
}
$accordion_name = 'accordion-'.$accordion_num;
?>

<div class="accordion module">
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <?php if ( have_rows('accordion') ) : ?>
                <div id="accordion-<?php echo $accordion_num; ?>" class="accordion__wrapper">
                    <?php
                    while ( have_rows('accordion') ) : the_row();
                        $accordion_i++;
                        $show = false;
                        if ( $accordion_i == 1 ) $show = true;
                    ?>
                    <div class="accordion__item animate">
                        <h2 class="accordion__heading">
                            <button class="accordion-button accordion__btn <?php if ( !$show ) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $accordion_i; ?>" aria-expanded="<?php echo ( $show ) ? 'true' : 'false'; ?>" aria-controls="collapse-<?php echo $accordion_i; ?>">
                                <span class="accordion__btn-text"><?php echo get_sub_field('heading'); ?></span>
                                <span class="accordion__btn-symbol"></span>
                            </button>
                        </h2>
                        <div id="collapse-<?php echo $accordion_i; ?>" class="accordion-collapse accordion__collapse collapse <?php if ( $show ) echo 'show'; ?>" data-bs-parent="#accordion-<?php echo $accordion_num; ?>">
                            <div class="accordion-body accordion__body">
                                <?php echo wpautop( get_sub_field('body') ); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script>
    const accordion = document.getElementbyId('<?php echo $accordion_name; ?>);
    accordion.addEventListener('hide.bs.collapse', event => {
        console.log(this);
    })
</script>

<?php
// in case of multiple accordions on page
$accordion_num++;