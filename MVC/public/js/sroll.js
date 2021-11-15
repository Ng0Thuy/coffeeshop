window.addEventListener("scroll", function () {
    let headerMenu = document.querySelector('#menu-area');
    if (window.pageYOffset > 0) {
        headerMenu.classList.add("cus-nav");
    } else {
        headerMenu.classList.remove("cus-nav");
    }
})