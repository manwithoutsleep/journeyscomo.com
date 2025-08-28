async function loadPartial(placeholderId, url) {
    const response = await fetch(url);
    const text = await response.text();
    document.getElementById(placeholderId).innerHTML = text;
}

function initializeHamburgerMenu() {
    const hamburgerButton = document.querySelector('.hamburger-menu');
    const navigation = document.querySelector('.navigation');
    
    if (hamburgerButton && navigation) {
        hamburgerButton.addEventListener('click', () => {
            navigation.classList.toggle('nav-open');
            document.body.classList.toggle('nav-open');
        });

        // Close menu when clicking on a nav item (mobile UX improvement)
        const navItems = document.querySelectorAll('.nav-item a');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                navigation.classList.remove('nav-open');
                document.body.classList.remove('nav-open');
            });
        });

        // Close menu when clicking outside of it
        document.addEventListener('click', (event) => {
            if (!navigation.contains(event.target) && !hamburgerButton.contains(event.target)) {
                navigation.classList.remove('nav-open');
                document.body.classList.remove('nav-open');
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', async () => {
    await loadPartial('header-placeholder', 'partials/_header.html');
    await loadPartial('navigation-placeholder', 'partials/_navigation.html');
    
    // Initialize hamburger menu after navigation is loaded
    initializeHamburgerMenu();
});