// Add your custom JS here.

document.addEventListener('DOMContentLoaded', function() {

    // HIDE NAV

    const navbar = document.getElementById('navigation');

    let lastScrollPosition = 0;
    const navbarHeight = 0; // Get the height of the navbar
    const smallerScrollThreshold = 200; // Threshold for adding the .smaller class
  
    window.addEventListener('scroll', function() {
        const currentScroll = window.scrollY || document.documentElement.scrollTop;
  
        if (currentScroll > smallerScrollThreshold) {
 
            if (currentScroll > lastScrollPosition) {
                // Down scroll
                navbar.classList.add('hidden');
            } else {
                // Up scroll
                navbar.classList.remove('hidden');
            }
        }
  
        lastScrollPosition = currentScroll <= 0 ? 0 : currentScroll;
    });
    
});
