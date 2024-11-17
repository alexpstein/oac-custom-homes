/**
 * Scripts for buttons with smooth scrolling
 */

document.addEventListener( 'DOMContentLoaded', () => {
    // Skip hero button
    const skipHeroBtn = document.getElementById('hero-skip-btn');

    function scrollToTarget(e) {
        e.preventDefault();
        const targetEl = document.getElementById('article-body');
        if ( targetEl ) {
            const targetPos = targetEl.offsetTop; // Get the top position of the element
            console.log(targetPos);
            window.scrollTo({
                top: targetPos,
                behavior: 'smooth'
            });
        }
    }

    if ( skipHeroBtn ) {
        skipHeroBtn.addEventListener( 'click', scrollToTarget );
    }

    // Back to top button
    const topBtn = document.getElementById('top-of-page');
    
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    function throttle( func, delay ) {
        let lastCall = 0;
        return function (...args) {
            const now = new Date().getTime();
            if ( now - lastCall < delay ) {
                return;
            }
            lastCall = now;
            return func(...args);
        };
    }

    function addBtnClass() {
        if ( window.scrollY >= 400 ) {
            topBtn.classList.add('btn-top--visible');
        } else {
            topBtn.classList.remove('btn-top--visible');
        }
    }

    if ( topBtn ) {
        topBtn.addEventListener( 'click', scrollToTop );
        window.addEventListener( 'scroll', throttle(addBtnClass, 250) );
    } else {
        console.error( 'Button with ID "top-of-page" not found!' );
    }
});