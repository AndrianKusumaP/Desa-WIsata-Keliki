window.addEventListener("scroll", function () {
    const navbar = document.getElementById("navbar");
    const dropdownMenu = document.querySelector(".navbar .dropdown-menu");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
        dropdownMenu.classList.add("scrolled-dropdown");
    } else {
        navbar.classList.remove("scrolled");
        dropdownMenu.classList.remove("scrolled-dropdown");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbar = document.getElementById("navbar");

    navbarToggler.addEventListener("click", function () {
        if (navbar.classList.contains("show")) {
            navbar.classList.remove("show");
        } else {
            navbar.classList.add("show");
        }
    });
});
