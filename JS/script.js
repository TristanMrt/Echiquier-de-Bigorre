document.addEventListener('DOMContentLoaded', function () {

    // Menu burger - fond blanc à l'ouverture
    const navbarMenu = document.getElementById('navbarMenu');
    const navbar = document.querySelector('.navbar-custom');

    if (navbarMenu && navbar) {
        navbarMenu.addEventListener('show.bs.collapse', () => {
            navbar.classList.add('menu-ouvert');
        });
        navbarMenu.addEventListener('hide.bs.collapse', () => {
            navbar.classList.remove('menu-ouvert');
        });
    }

    // Bottom nav - lien actif
    document.querySelectorAll('.bottom-nav-item').forEach(link => {
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    });

});