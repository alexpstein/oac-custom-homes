/**
 * Menu accessibility
 */

 const menuToggle = jQuery('.menu-toggle');

 /**
  * Close menu functions
  */
 
 // Desktop
 function closeMenu() {
     jQuery('.sub-menu--expand').removeClass('active');
     jQuery('.menu-item-has-children:not(.top-level-menu-item) > .sub-menu--expand').slideUp();
     jQuery('.top-level-menu-item .sub-menu-toggle').attr('aria-expanded', 'false');
     jQuery('#site-navigation').removeClass('toggled');
     jQuery('.sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false');
     jQuery('.sub-menu a').attr('tabindex', '-1');
     jQuery('.sub-menu-toggle:not(.sub-menu-toggle-top)').attr('tabindex', '-1');
     jQuery('.top-level-menu-item').removeClass('active');
     menuToggle.attr('aria-expanded', 'false');
     jQuery('.main-navigation__menu .sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false').html('&#43;');
     jQuery('.main-navigation__menu .sub-menu--expand').slideUp();
 }
 
 // Mobile
 function closeMobileMenu() {
     jQuery('#site-navigation').removeClass('toggled');
     menuToggle.attr('aria-expanded', 'false').focus();
     jQuery('.sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false').html('&#43;');
     jQuery('.top-level-menu-item').removeClass('toggled');
     jQuery('.sub-menu--expand').slideUp();
     jQuery('.sub-menu a').attr('tabindex', '-1');
     jQuery('.sub-menu-toggle:not(.sub-menu-toggle-top)').attr('tabindex', '-1');

 }
 
 /**
  * Screen Resize Events
  */
 
 // Mobile
 function mobileMenu() { 
     // Reset Main Menu
     jQuery('#site-navigation').removeClass('toggled');
     jQuery('.sub-menu--expand').removeAttr('style');
     jQuery('.sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false');
 
     jQuery('.top-level-menu-item > a').off('focusin');
 
     closeMobileMenu();
 
     // Reset top-level sub-menus
     jQuery('.top-level-menu-item > .sub-menu').removeClass('active');
 
     // Top level menu items
     jQuery('.sub-menu-toggle-top').off('click');
 
     jQuery('.sub-menu-toggle-top').on('click', function() {
         jQuery(this).toggleClass('toggled');
         jQuery(this).next('.sub-menu').slideToggle();
         jQuery(this).closest('li').toggleClass('toggled');
 
         if ( jQuery(this).attr('aria-expanded') === 'false' ) {
             jQuery(this).attr('aria-expanded', 'true').html('&ndash;');
             jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '0');
             jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '0');
         } else {
             jQuery(this).attr('aria-expanded', 'false').html('&#43;');
             jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '-1');
             jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '-1');
         }
     });
 
     // Esc key to exit main menu
     jQuery(document).off('keyup');
 
     jQuery(document).on('keyup', function(e) {
         if (e.keyCode === 27 && jQuery('#site-navigation').hasClass('toggled')) {
             closeMobileMenu();
         }
     });

     // Mobile esc buttons
     jQuery('.main-navigation__close').on('click', function(e) {
         closeMobileMenu();
     });
 }
 
 // Desktop
 function desktopMenu() {
     // Primary Menu Reset
     menuToggle.attr('aria-expanded', 'false');
     jQuery('#site-navigation').removeClass('toggled');
     jQuery('.sub-menu--expand').removeAttr('style');
     jQuery('.sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false');
 
     closeMenu();
 
     // Top level menu items
     jQuery('.sub-menu-toggle-top').off('click').removeClass('toggled');
 
     jQuery('.sub-menu-toggle-top').on('click', function(e) {
         jQuery(this).next('.sub-menu').addClass('active');
 
         // Close other open menus if tab navigation is being used to open other sub-menus
         jQuery(this).closest('li').siblings('li.menu-item-has-children').children('.sub-menu').removeClass('active').attr('aria-expanded', 'false');
         jQuery(this).closest('li').siblings('li.menu-item-has-children').children('.sub-menu-toggle').attr('aria-expanded', 'false');
         jQuery(this).closest('li').siblings('li.menu-item-has-children').children('.sub-menu').find('a').attr('tabindex', '-1');
         jQuery(this).closest('li').siblings('li.menu-item-has-children').children('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '-1');
 
         if ( jQuery(this).attr('aria-expanded') === 'false' ) {
             jQuery(this).closest('li').addClass('active').siblings('li').removeClass('active');
             jQuery(this).attr('aria-expanded', 'true');
             jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '0');
             jQuery(this).next('.sub-menu').find('a.close-menu').attr('tabindex', '0');
             jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '0');

             // is in slide out nav
             if ( jQuery(this).closest('ul').hasClass('main-navigation__menu') ) {
                jQuery(this).attr('aria-expanded', 'true').html('&ndash;');
                jQuery(this).next('.sub-menu').slideToggle();

             }
         } else {
            // is not in slide out nav
             if ( jQuery(this).closest('ul').hasClass('main-navigation__feat-menu') ) {
                closeMenu();
             }
             jQuery(this).closest('li').removeClass('active');
             jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '-1');
             jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '-1');
             jQuery(this).next('.sub-menu').find('a.close-menu').attr('tabindex', '-1');

             // is in slide out nav
             if ( jQuery(this).closest('ul').hasClass('main-navigation__menu') ) {
                jQuery(this).attr('aria-expanded', 'false').html('&#43;');
                jQuery(this).next('.sub-menu').slideToggle();
                menuToggle.focus();
             }
         }
     });
 
     jQuery('.main-navigation__feat-menu .top-level-menu-item > a').on('focusin', closeMenu);
 
     // Esc key to exit main menu
     jQuery(document).off('keyup');
 
     jQuery(document).on('keyup', function(e) {
         if (e.keyCode === 27 && jQuery('.top-level-menu-item').hasClass('active') || e.keyCode === 27 && jQuery('.main-navigation').hasClass('toggled')) {
             closeMenu();
             menuToggle.focus();
         }
     });

     // Slideout menu
     jQuery('.main-navigation__close').on('click', function(e) {
        closeMenu();
        menuToggle.focus();
     });
 }
 
 // delay function to use on resize to prevent multiple resize events
 const delay = (function () {
     var timer = 0;
     return function (callback, ms) {
         clearTimeout(timer);
         timer = setTimeout(callback, ms);
     };
 })();
 
 // functions to delay
 const windowResize = function() {
     let windowSize;
 
     if ( window.innerWidth < 992 ) {
         windowSize = 'mobile';
         mobileMenu();
     } else {
         windowSize = 'desktop';
         desktopMenu();
     }
 }
 
 // run once when document ready
 jQuery(document).ready(function() {
     windowResize();
 });
 
 // add event for window resize
 window.onresize = function() {
     delay(windowResize(), 500);
 };
 
 /**
  * Menu Toggles
  */
 
 // Close if click outside of menu
 const siteNav = document.getElementById('site-navigation');
 
 document.addEventListener( 'click', function( event ) {
     const isClickInside = siteNav.contains( event.target );
 
     if ( ! isClickInside && window.innerWidth < 992 ) {
         closeMobileMenu();
     } else if ( ! isClickInside && window.innerWidth > 991 ) {
         closeMenu();
     }
 });
 
 // Sub-menu buttons
 jQuery('.sub-menu-toggle-top').on('focusin', function() {
     jQuery(this).closest('li').addClass('focus');
 }).on('focusout', function() {
     jQuery(this).closest('li').removeClass('focus');
 });
 
 jQuery('.sub-menu-toggle').on('click', function() {
     jQuery(this).toggleClass('toggled');
     jQuery(this).next('.sub-menu').slideToggle();
     
     if ( jQuery(this).attr('aria-expanded') === 'false' ) {
         jQuery(this).attr('aria-expanded', 'true').html('&ndash;');
         jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '0');
         jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '0');
 
         // Close other second-tier menus
         jQuery(this).closest('li').siblings('li').find('.sub-menu--expand').slideUp();
         jQuery(this).closest('li').siblings('li').find('.sub-menu-toggle').removeClass('toggled').attr('aria-expanded', 'false');
     } else {
         jQuery(this).attr('aria-expanded', 'false').html('&#43;');
         jQuery(this).next('.sub-menu').find('li > a').attr('tabindex', '-1');
         jQuery(this).next('.sub-menu').find('.sub-menu-toggle').attr('tabindex', '-1');
     }
 });
 
 jQuery('.main-navigation .top-level-menu-item.menu-item-has-children > a').removeAttr('href').attr('tabindex', -1);