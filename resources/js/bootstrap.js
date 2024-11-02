import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

document.addEventListener('DOMContentLoaded', function () {
    const openMenuButton = document.getElementById('open-menu');
    const closeMenuButton = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    // Open menu function
    openMenuButton.addEventListener('click', function () {
        mobileMenu.classList.remove('hidden'); // Show the menu
    });

    // Close menu function
    closeMenuButton.addEventListener('click', function () {
        mobileMenu.classList.add('hidden'); // Hide the menu
    });
});
