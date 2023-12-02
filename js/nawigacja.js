const logo = document.querySelector('#logo');
const nav = document.querySelector('#main-nav');

let navOpen = false;

logo.addEventListener('click', () => {
    navOpen = !navOpen;
    nav.style.transform = navOpen ? 'translateY(0)' : 'translateY(-100vh)';
});