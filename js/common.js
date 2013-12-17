/* switcher language */
$('.language-block').click(function(event) {
    event.stopPropagation();
    if (!$('.language-select').hasClass('active')) {
        $('.language-select').addClass('active').css({"position": "absolute"}).slideDown();
        $(this).find('img').attr("src", "images/chat-title-active.png");
    }
    else if ($('.language-select').hasClass('active')) {
        $('.language-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
        $(this).find('img').attr("src", "images/chat-title.png");
    }
})
$('html').click(function() {
    $('.language-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    $('.language-block').find('img').attr("src", "images/chat-title.png");
})
$('.language-block li').click(function() {
    var selectText = $(this).text();
    $('.language-block .button-text').text(selectText);
})
$('.language-block').mouseenter(function() {
    $('.language-block img').css({"background": "#245d9b"})
})
$('.language-block').mouseleave(function() {
    $('.language-block img').css({"background": "#5282C0"})
})

/* modal form logIn */
$('.user-block, .if-logged-in').click(function() {
    $('.login-popup').show();
    $('.login-fields').show();
    $('.forgot-pass').hide();
    $('.login-popup-in.popup-title').text('Intra in cont');
    $('.button-login.red-button .text').text('Intra in cont');
    $('.button-login').width(140);
    $('body').prepend('<div id="fadeOverlay" style="opacity:0.80;display:none;position:fixed;left:0;top:0;width:100%;height:100%;z-index:999;background:#000;"></div>');
    $('#fadeOverlay').css({'filter': 'alpha(opacity=80)'}).fadeIn();
    $('#fadeOverlay, .close-image').click(function() {
        $('#fadeOverlay').fadeOut("slow", function() { $(this).remove(); });
        $('.login-popup').hide();
        $('.registration-popup').hide();
        $('.forgot-pass-popup').hide();
    });
});

/* rewrite modal form logIn reset password */
$('.footer-pass a').click(function() {
        $('.login-fields').hide();
        $('.forgot-pass').show();
        $('.login-popup-in.popup-title').text('Introduceti e-mail pentru a recupera contul');
        $('.button-login.red-button .text').text('Trimite');
        $('.button-login').width(97);
    });
    
/* click button  */    
$('.register').click(function() { $('.registration-popup').show();$('.login-popup').hide(); })    