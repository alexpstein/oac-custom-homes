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
                }, index * 350); // Add classes on delay to avoid too much movement on screen at once
            }
        });
    };

    // Create an Intersection Observer
    const observer = new IntersectionObserver(handleIntersection, {
        threshold: 0.1, // Trigger when 10% of the element is visible
    });

    // Observe each "animate" element
    const highlightElements = document.querySelectorAll('.animate');
    highlightElements.forEach((element) => {
        observer.observe(element);
    });
});