/**
 * Slick init
 */
if ( jQuery('.gallery__slick').length ) {
    jQuery('.gallery__slick').slick({
        slidesToShow: 1,
        infinite: true,
        speed: 600,
        prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous Image" role="button" style="display: inline-block;"><div class="arrow"><span></span><span></span></div></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next Image" role="button" style="display: inline-block;"><div class="arrow"><span></span><span></span></div></button>',
        dots: false,
        fade: true,
        rows: 0
    });
}

/**
 * Go to slide
 */
jQuery('button[data-slide]').click( function(e) {
    e.preventDefault();
    let slideNo = jQuery(this).data('slide');
    jQuery('.gallery__slick').slick('slickGoTo', slideNo - 1);
});

/**
 * Functions to enable focus on buttons for modal galleries
 * and refresh for proper display
 */

function galleryModalOpen() {
    // Refresh carousel when modal opened to display properly
    jQuery('.gallery__slick').slick('refresh');

    jQuery('.gallery__slick').slick('slickGoTo', 0);
}

/**
 * Add event listeners to gallery modals if they exist on the page
 */

const galleryModals = document.querySelectorAll('.gallery__dialog');

if ( document.querySelector( '.gallery__dialog' ) ) {
    galleryModals.forEach(modal => {
        modal.addEventListener( 'shown.bs.modal', galleryModalOpen );
    });
}