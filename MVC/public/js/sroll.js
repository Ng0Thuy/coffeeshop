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

  $(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 500) { 
            $('#toTop').fadeIn(); 
        } else { 
            $('#toTop').fadeOut(); 
        } 
    }); 
    $('#toTop').click(function(){ 
        console.log("ok");
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
 });

