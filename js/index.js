window.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.menubar'),
        menuItem = document.querySelectorAll('.list-inline-item'),
        hamburger = document.querySelector('.hamburger');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('hamburger_active');
        menu.classList.toggle('menubar_active');
    });

    menuItem.forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.toggle('hamburger_active');
            menu.classList.toggle('menubar_active');
        })
    })
})