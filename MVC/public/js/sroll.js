window.addEventListener("scroll", function () {
    let headerMenu = document.querySelector('#menu-area');
    if (window.pageYOffset > 0) {
        headerMenu.classList.add("cus-nav");
    } else {
        headerMenu.classList.remove("cus-nav");
    }
})
function loginOnclick() {
    var x = document.querySelector('.login-children__list');
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function loginOnblur() {
    var x = document.querySelector('.login-children__list');
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}