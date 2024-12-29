/**
 * Scripts for adding animation classes
 */

document.addEventListener('DOMContentLoaded', () => {
    // Function to handle when elements come into view
    const handleIntersection = (entries, observer) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                    setTimeout(() => {
                        // Add the "animated" class when the element is in the viewport
                        entry.target.classList.add('animated');
                        // Unobserve the element after adding the class
                        observer.unobserve(entry.target);
                    }, index * 350 + 500); // Add classes on delay to avoid too much movement on screen at once
            }
        });
    };

    // Create an Intersection Observer
    const observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.2, // Trigger when 20% of the element is visible
    });

    // Observe each "animate" element
    const animateElements = document.querySelectorAll('.animate');
    animateElements.forEach((element) => {
        observer.observe(element);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    // Function to handle when elements come into view
    const handleIntersection = (entries, observer) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                    setTimeout(() => {
                        // Add the "animated" class when the element is in the viewport
                        entry.target.classList.add('animated');
                        // Unobserve the element after adding the class
                        observer.unobserve(entry.target);
                    }, index * 350 + 500); // Add classes on delay to avoid too much movement on screen at once
            }
        });
    };

    // Create an Intersection Observer
    const observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.2, // Trigger when 20% of the element is visible
    });

    // Observe each "highlight" element
    const highlightElements = document.querySelectorAll('.highlight-only');
    highlightElements.forEach((element) => {
        observer.observe(element);
    });
});