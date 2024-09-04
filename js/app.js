$(document).ready(function () {
    $('#navToggle').on('click', function () {
        $('.offcanvas-collapse').toggleClass('open');
        $('body').toggleClass('no-scroll');
    });

    $('.navbar-nav a').on('click', function () {
        $('.offcanvas-collapse').removeClass('open');
        $('body').removeClass('no-scroll');
    });

    // Fechar offcanvas ao clicar fora dele
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.navbar, .offcanvas-collapse').length) {
            $('.offcanvas-collapse').removeClass('open');
            $('body').removeClass('no-scroll');
        }
    });
});

var backToTopBtn = document.getElementById("backToTopBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backToTopBtn.style.display = "block";
        setTimeout(function() {
            backToTopBtn.style.opacity = "1";
        }, 10);
    } else {
        backToTopBtn.style.opacity = "0";
        setTimeout(function() {
            backToTopBtn.style.display = "none";
        }, 400);
    }
}

backToTopBtn.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}