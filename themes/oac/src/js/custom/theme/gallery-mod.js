/**
 * Slick init
 */
if ( jQuery('.gallery__slick').length ) {
    jQuery('.gallery__slick').slick({
        slidesToShow: 1,
        infinite: true,
        speed: 600,
        prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous Image" role="button" style="display: inline-block;" tabindex="-1"><div class="arrow"><span></span><span></span></div></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next Image" role="button" style="display: inline-block;" tabindex="-1"><div class="arrow"><span></span><span></span></div></button>',
        dots: false,
        fade: true,
        rows: 0
    });
}

/**
 * Gallery elements
 */
const expandBtns = document.querySelectorAll('.gallery__btn');
const closeBtn = document.querySelector('.gallery__close');
const arrowBtns = document.querySelectorAll('.slick-arrow');

/**
 * Function to toggle collapse section
 */
function galleryCollapse() {
    const collapsible = document.getElementById('gallery-collapse');
    if ( collapsible.style.height !== '0px' || collapsible.style.height !== '' ) {
        collapsible.style.height = '0px';
        closeBtn.setAttribute( 'tabindex', '-1' );
        expandBtns.forEach(button => {
            button.setAttribute( 'aria-expanded', 'false' );
        });
        arrowBtns.forEach(button => {
            button.setAttribute( 'tabindex', '-1' );
        });
    }
}

function galleryExpand() {
    const expandable = document.getElementById('gallery-collapse');
    if ( expandable.style.height === '0px' || expandable.style.height === '' ) {
        expandable.style.height = expandable.scrollHeight + 'px';
        closeBtn.setAttribute( 'tabindex', '0' );
        expandBtns.forEach(button => {
            button.setAttribute( 'aria-expanded', 'true' );
        });
        arrowBtns.forEach(button => {
            button.setAttribute( 'tabindex', '0' );
        });
        scrollToGallery('gallery-collapse');
    }
}

/**
 * Scroll to gallery when button clicked
 */
function scrollToGallery(id) {
    const targetGallery = document.getElementById(id);
    if (targetGallery) {
        targetGallery.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
    }
}

/**
 * Add event listeners to gallery buttons if they exist on the page
 */
if ( document.querySelector( '.gallery' ) ) {
    expandBtns.forEach(button => {
        button.addEventListener( 'click', galleryExpand );
    });

    closeBtn.addEventListener( 'click', galleryCollapse );
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

    jQuery('.gallery__slick').slick('slickSetOption', {
        prevArrow: '<button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous Image" role="button" style="display: inline-block;"><div class="arrow"><span></span><span></span></div></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next Image" role="button" style="display: inline-block;"><div class="arrow"><span></span><span></span></div></button>'
    }, true);
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