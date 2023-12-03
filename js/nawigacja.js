const logo = document.querySelector('#logo');
const nav = document.querySelector('#main-nav');

let navOpen = false;

logo.addEventListener('click', () => {
    navOpen = !navOpen;
    nav.style.top= navOpen ? '70px' : '100vh';
});