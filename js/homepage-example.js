$(document).ready(function() {

    $('.guest-data').click(function() {
        var sum = 0;
        var sumAdults = 0;
        var sumChildren = 0;
        $('.rooms-quantity .room').each(function() {
            var adults = parseInt($(this).find('.adults select').val());
            var children = parseInt($(this).find('.children select').val());

            sumAdults = sumAdults + adults;
            sumChildren = sumChildren + children;
        })
        $('.adults-main').val(sumAdults);
        $('.children-main').val(sumChildren);
    })

    $('.chat-window-title').delay(2000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#e84044'}, 1000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#e84044'}, 1000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#e84044'}, 1000);

    $('.rooms').change(function() {

        var total = $(this).val();

        //remove all
        $('.room').each(function(index) {
            if (index != 0)
                $(this).remove();
        });
        //create new ones
        for (var i = 2; i <= total; i++)
        {
            $('.room:first').clone().removeClass('room-1').addClass('room-' + i).appendTo('.rooms-quantity');
        }
    })

    $('.register').click(function() {
        $('.registration-popup').show();
        $('.login-popup').hide();
    })

    $('.tab-hoteluri').click(function() {
        $('.hotel').show();
        $(this).css({"background": "#EFF3F4"});
        $('.tab-bilete').css({"background-image": "linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-o-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-moz-linear-gradient(top, rgb(245,245,245) 10%, rgb(225,225,225) 55%)",
                    "background-image": "-webkit-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-ms-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-webkit-gradient(linear, right top, right bottom, color-stop(0.17, rgb(245,245,245)), color-stop(0.49, rgb(245,245,245)), color-stop(0.8, rgb(225,225,225)))"});
        $(this).removeClass('inactive');
        $('.tab-bilete').addClass('inactive');
        $('.content').hide();
    })

    $('.tab-bilete').click(function() {
        $('.hotel').hide();
        $(this).css({"background": "#eff3f4"});
        $('.tab-hoteluri').css({"background-image": "linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
            "background-image": "-o-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-moz-linear-gradient(top, rgb(245,245,245) 10%, rgb(225,225,225) 55%)",
                    "background-image": "-webkit-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-ms-linear-gradient(top, rgb(245,245,245) 17%, rgb(245,245,245) 49%, rgb(225,225,225) 80%)",
                    "background-image": "-webkit-gradient(linear, right top, right bottom, color-stop(0.17, rgb(245,245,245)), color-stop(0.49, rgb(245,245,245)), color-stop(0.8, rgb(225,225,225)))"});
        $('.content').show();
        $(this).removeClass('inactive');
        $('.tab-hoteluri').addClass('inactive');
    })

    $('.searches').mouseenter(function() {
        $(this).find('.search-image-link').css({"background": "url('/images/search-arrow-link-active.png')"});
    });
    $('.searches').mouseleave(function() {
        $(this).find('.search-image-link').css({"background": "url('/images/search-arrow-link.png')"});
    });


    $('input:radio[name=ticket-type]').prop('checked', false).change();
    $('.radio-one-way').prop('checked', true).change();
    $('.one-way-ticket .ticket-radio input').click(function() {
        $('.return-ticket .ticket-return-field, .return-ticket .calendar-select-bar').css({"background": "#d5d5d5", "pointer-events": "none"});
        $('.return-ticket .calendar-dates > td').css({"background": "#EFF3F4", "color": "#5b5b5b"});
        $('.disable-box').show();
        $('.one-way-ticket .ticket-departure-field, .one-way-ticket .calendar-select-bar').css({"background": "white", "pointer-events": "all"});
        $('.one-way-ticket .calendar').css({"opacity": "1"});
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.radio-one-way').prop('checked', true).change();
        $('.return-ticket').removeClass('active-return');
        $('.main-ticket-return-field').val('');
    });

    $('.return-ticket, .disable-box').click(function() {
        $('.return-ticket').addClass('active-return');
        $('.return-ticket .ticket-return-field, .return-ticket .calendar-select-bar').css({"background": "white", "pointer-events": "all"});
        $('.disable-box').hide();
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.radio-one-way').prop('checked', false).change();
        $('.radio-return').prop('checked', true).change();
    });

    $('.price-table table tbody tr td').click(function() {
        $('.price-table table tbody tr td').not(this).css({"background": "#EFF3F4", "color": "black"});
        $(this).css({"background": "#e84044", "color": "white"});
    })

    $('.price-table-1 table tbody tr td').click(function() {
        $('.price-table-1 table tbody tr td').not(this).css({"background": "#EFF3F4", "color": "black"});
        $(this).css({"background": "#e84044", "color": "white"});
    })

    $('.user-block').click(function() {
        $('.login-popup').show();
        $('body').append('<div id="fadeOverlay" style="opacity:0.80;display:none;position:fixed;left:0;top:0;width:100%;height:100%;z-index:999;background:#000;"></div>');
        $('#fadeOverlay').css({'filter': 'alpha(opacity=80)'}).fadeIn();
        $('#fadeOverlay').click(function() {
            $(this).fadeOut("slow", function() {
                $(this).remove();
            });
            $('.login-popup').hide();
            $('.registration-popup').hide();
        });
    })

    $('.show-detailed-info-button').click(function() {
        if ($(this).hasClass('active'))
            $(this).removeClass('active').html('Mai detaliat despre zbor<img class="extend-info-image" src="images/extend-info-closed.png">').parent().find('.show-detailed-info').slideUp();
        else
            $(this).addClass('active').html('Mai putin detaliat despre zbor<img class="extend-info-image" src="images/extend-info.png">').parent().find('.show-detailed-info').slideDown();
    })

    $('.promotion-button img').mouseenter(function() {
        $(this).attr("src", "images/active-big-search-arrow-link.png");
    });
    $('.promotion-button img').mouseleave(function() {
        $(this).attr("src", "images/big-search-arrow-link.png");
    });

    //top-bar show main-page
    $('.new-search-button').click(function() {
        $('.top-bar').hide();
        $('#content-main .content, .content-main-tabs, #content-sidebar-left, #content-sidebar-right').show();
        $('.ticket-list').hide();
    })

    $(this).parent().parent().children('.input-data').show();
})

//return to offer list from reserving list
$('.show-offers-button').click(function() {
    $(this).hide();
    $('.ticket-list, .flight').show();
    $('.buttons-reserve-ticket').show();
    $('.footer-price').show();
    $('.new-search-button').show();
    $('.buttons-reserve-1-ticket').show();
    $('.pay-methods').hide();
    $('.input-data').hide();
    $('.flight').removeClass('active');
})

//fix to top the block
$(window).scroll(function() {
    if ($(window).scrollTop() > 50) {
        $('.top-bar').css({'position': 'fixed', 'top': '10px'});
    }
    else {
        $('.top-bar').css({'position': 'relative', 'top': 'auto'});
    }
})

//test button
$('.language-block').click(function(event) {
    event.stopPropagation();
    if (!$('.language-select').hasClass('active')) {
        $('.language-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.language-select').hasClass('active')) {
        $('.language-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('html').click(function() {
    $('.language-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
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

//
$('.people-number').click(function() {
    event.stopPropagation();
    if (!$('.people-select').hasClass('active')) {
        $('.people-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.people-select').hasClass('active')) {
        $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.people-select').click(function() {
    event.stopPropagation();
})

$('html').click(function() {
    $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.people-number').mouseenter(function() {
    $('.people-number img').css({"background": "#d7d7d7"})
})

$('.people-number').mouseleave(function() {
    $('.people-number img').css({"background": "white"})
})

//
$('.ticket-class').click(function(event) {
    event.stopPropagation();
    if (!$('.class-select').hasClass('active')) {
        $('.class-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.class-select').hasClass('active')) {
        $('.class-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.ticket-select').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.class-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.ticket-class li').click(function() {
    var selectText = $(this).html();
    $('.ticket-class .button-text .text').html(selectText);
})

$('.ticket-class').mouseenter(function() {
    $('.ticket-class img').css({"background": "#d7d7d7"})
})

$('.ticket-class').mouseleave(function() {
    $('.ticket-class img').css({"background": "white"})
})

//
$('.currency').click(function(event) {
    event.stopPropagation();
    if (!$('.currency-select').hasClass('active')) {
        $('.currency-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.currency-select').hasClass('active')) {
        $('.currency-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.currency-select').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.currency-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.currency li').click(function() {
    var selectText = $(this).html();
    $('.currency .button-text').html('<span>' + selectText + '</span>');
})

//
$('.check-in').click(function(event) {
    event.stopPropagation();
    if (!$('.checkin-select').hasClass('active')) {
        $('.checkin-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.checkin-select').hasClass('active')) {
        $('.checkin-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.checkin').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.checkin-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.check-in li').click(function() {
    var selectText = $(this).html();
    $('.check-in .button-text').html('<span>' + selectText + '</span>');
})

$('.check-in').mouseenter(function() {
    $('.check-in img').css({"background": "#d7d7d7"})
})

$('.check-in').mouseleave(function() {
    $('.check-in img').css({"background": "white"})
})

//
$('.luggage-in').click(function(event) {
    event.stopPropagation();
    if (!$('.luggage-select').hasClass('active')) {
        $('.luggage-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.luggage-select').hasClass('active')) {
        $('.luggage-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.luggage-in').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.luggage-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.luggage-in li').click(function() {
    var selectText = $(this).html();
    $('.luggage-in .button-text').html('<span>' + selectText + '</span>');
})

$('.luggage-in').mouseenter(function() {
    $('.luggage-in img').css({"background": "#d7d7d7"})
})

$('.luggage-in').mouseleave(function() {
    $('.luggage-in img').css({"background": "white"})
})

//
$('.kids-eq-in').click(function(event) {
    event.stopPropagation();
    if (!$('.kids-eq-select').hasClass('active')) {
        $('.kids-eq-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.kids-eq-select').hasClass('active')) {
        $('.kids-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.kids-eq-in').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.kids-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.kids-eq-select li').click(function() {
    var selectText = $(this).html();
    $('.kids-eq-select .button-text').html('<span>' + selectText + '</span>');
})

$('.kids-eq-in').mouseenter(function() {
    $('.kids-eq-in img').css({"background": "#d7d7d7"})
})

$('.kids-eq-in').mouseleave(function() {
    $('.kids-eq-in img').css({"background": "white"})
})

//
$('.sport-eq-in').click(function(event) {
    event.stopPropagation();
    if (!$('.sport-eq-select').hasClass('active')) {
        $('.sport-eq-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.sport-eq-select').hasClass('active')) {
        $('.sport-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.sport-eq-in').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.sport-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.sport-eq-in li').click(function() {
    var selectText = $(this).html();
    $('.sport-eq-select .button-text').html('<span>' + selectText + '</span>');
})

$('.sport-eq-in').mouseenter(function() {
    $('.sport-eq-in img').css({"background": "#d7d7d7"})
})

$('.sport-eq-in').mouseleave(function() {
    $('.sport-eq-in img').css({"background": "white"})
})

//
$('.music-eq-in').click(function(event) {
    event.stopPropagation();
    if (!$('.music-eq-select').hasClass('active')) {
        $('.music-eq-select').addClass('active').css({"position": "absolute"}).slideDown();
    }
    else if ($('.music-eq-select').hasClass('active')) {
        $('.music-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    }
})

$('.music-eq-in').click(function(event) {
    event.stopPropagation();
})

$('html').click(function() {
    $('.music-eq-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
})

$('.music-eq-in li').click(function() {
    var selectText = $(this).html();
    $('.music-eq-select .button-text').html('<span>' + selectText + '</span>');
})

$('.music-eq-in').mouseenter(function() {
    $('.music-eq-in img').css({"background": "#d7d7d7"})
})

$('.music-eq-in').mouseleave(function() {
    $('.music-eq-in img').css({"background": "white"})
})

$('.people-number ul').click(function() {
    var adults = parseInt($('.adults').val());
    var teenagers = parseInt($('.teenagers').val());
    var kids = parseInt($('.kids').val());
    var toddlers = parseInt($('.toddlers').val());

    var sum = adults + teenagers + kids + toddlers;
    $('.people-number .button-text .text').text('Persoane: ' + sum);
})