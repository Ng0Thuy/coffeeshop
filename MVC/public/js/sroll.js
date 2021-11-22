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
    //   On TOP
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

//  Thanh toán
    $('input[type=radio][name=banking]').change(function() {
        if (this.value == 'payLater') {
            $(".content-banking").addClass( "content-banking-none" );
        }
        else if (this.value == 'banking') {
            $(".content-banking").removeClass( "content-banking-none" );
        }
    });

    // Đăng nhập

    $('#login-tab').click(function(){ 
        $("#login").css("display", "block");   
        $(".app").css("opacity", "0.8");        
    }); 
    $('.close-login').click(function(){ 
        $("#login").css("display", "none");  
        $(".app").css("opacity", "1");        

    }); 

    // Xem mật khẩu
    $('.regsiter-show').click(function(){ 
        $("#login").css("display", "none");  
        $("#regsiter").css("display", "block");  
    });
    $('.login-show').click(function(){ 
        $("#regsiter").css("display", "none");  
        $("#login").css("display", "block");  
    });
    $('.close-regsiter').click(function(){ 
        $("#regsiter").css("display", "none");  
        $(".app").css("opacity", "1");        
    }); 
});