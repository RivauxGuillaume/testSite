document.addEventListener('DOMContentLoaded', function() {
    const menuBurger = document.querySelector('.menu-burger');
    const lienIntraSite = document.querySelector('.lien_intra_site');

    menuBurger.addEventListener('click', function() {
        lienIntraSite.classList.toggle('active');
        document.body.classList.toggle('no-scroll');
        menuBurger.classList.toggle('cross');
    });
});