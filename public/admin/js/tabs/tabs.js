function openTab(tab) {
    $(".tabcard").css("display", "none");
    $(".nav-link").removeClass("active");
    $(`#${tab}`).fadeIn(200);
    $(`#id_${tab}`).addClass("active");
    $('html, body').animate({scrollTop: '0px'}, 0);
}
