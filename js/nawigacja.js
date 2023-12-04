const logo = document.querySelector('#logo');
const nav = document.querySelector('#main-nav');

let navOpen = false;

logo.addEventListener('click', () => {
    navOpen = !navOpen;

    const width = window.innerWidth;

    if (width < 720) {
        nav.style.top= navOpen ? '100px' : '100vh';
    }

});