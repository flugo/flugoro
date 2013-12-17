$(document).ready(function() {


    $.fn.valid = function() {
        if ($(this).val().length == 0) {
            $(this).after("<div class='tooltip'>Complectati campul</div>");
            setTimeout(function() {
                $('.tooltip').remove();
            }, 2000);
            return false;
        }
        else
            return true;
    };

    // click pe cauta
    if ($('.buttons-search-ticket').length) {
        $('.buttons-search-ticket').click(function() {
            if ($('.ticket-to-field').valid() == true && $('.ticket-from-field').valid() == true) {
                window.location.replace("tickets_page.html");
            } else {
                $('.ticket-to-field, .ticket-from-field').valid();
                $('html, body').animate({scrollTop: $('.ticket-field').offset().top - 150}, 500);
            }
        });
    }

    /* nr and type pax */
    $('.people-number').click(function(event) {
        event.stopPropagation();
        if (!$('.people-select').hasClass('active')) {
            $('.people-select').addClass('active').css({"position": "absolute"}).slideDown();
            $(this).find('img').attr("src", "images/extend-info.png");
        } else if ($('.people-select').hasClass('active')) {
            $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
            $(this).find('img').attr("src", "images/extend-info-closed.png");
        }
    });
    $('.people-select').click(function(event) {
        event.stopPropagation();
    });
    $('html').click(function() {
        console.log('p/u people')
        $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
        $('.people-number img').attr("src", "images/extend-info-closed.png");
    })
    $('.people-number').mouseenter(function() {
        $('.people-number img').css({"background": "#d7d7d7"})
    });
    $('.people-number').mouseleave(function() {
        $('.people-number img').css({"background": "white"})
    });

    /* mouse event last search first page */
    $('.searches').mouseenter(function() {
        $(this).find('.search-image-link').css({"background": "url('images/search-arrow-link-active.png')"});
    });
    $('.searches').mouseleave(function() {
        $(this).find('.search-image-link').css({"background": "url('images/search-arrow-link.png')"});
    });

    /* type flight B F C */
    $('.ticket-class').click(function(event) {
        event.stopPropagation();
        if (!$('.class-select').hasClass('active')) {
            $('.class-select').addClass('active').css({"position": "absolute"}).slideDown();
        } else if ($('.class-select').hasClass('active')) {
            $('.class-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
        }
    });
    $('.ticket-select').click(function(event) {
        event.stopPropagation();
    })
    $('html').click(function() {
        $('.class-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
    });
    $('.ticket-class li').click(function() {
        var selectText = $(this).html();
        $('.ticket-class .button-text .text').html(selectText);
    });
    $('.ticket-class').mouseenter(function() {
        $('.ticket-class img').css({"background": "#d7d7d7"})
    })
    $('.ticket-class').mouseleave(function() {
        $('.ticket-class img').css({"background": "white"})
    })

    /* radio changer type fly*/
    $('.multi-direction-type').on('click', function() {
        $('.ticket-type-choice').css({'position': 'static'});
        $('.one-direction').hide();
        $('.multi-direction').show();
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.multi-direction-type').prop('checked', true).change();
    });
    $('.one-way-ticket .ticket-radio input, .radio-one-way').click(function() {
        $('.ticket-type-choice').css({'position': 'absolute'});
        $('.one-direction').show();
        $('.multi-direction').hide();
        $('.return-ticket .ticket-return-field, .ticket-return-field, .return-ticket .calendar-select-bar').css({"background": "#d5d5d5", "pointer-events": "none"});
        $('.return-ticket .calendar-dates > td').css({"background": "#EFF3F4", "color": "#5b5b5b"});
        $('.disable-box').show();
        $('.return-ticket.ticket-type').removeClass('active-calendar');
        $('.one-way-ticket .ticket-departure-field, .one-way-ticket .calendar-select-bar').css({"background": "white", "pointer-events": "all"});
        $('.one-way-ticket .calendar').css({"opacity": "1"});
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.radio-one-way').prop('checked', true).change();
        $('.return-ticket').removeClass('active-ticket');
    });
    $('.return-t, .disable-box, .radio-return, .ticket-return-field').click(function() {
        $('.ticket-type-choice').css({'position': 'absolute'});
        $('.one-direction').show();
        $('.multi-direction').hide();
        $('.return-ticket').addClass('active-ticket');
        $('.return-ticket .ticket-return-field, .ticket-return-field, .return-ticket .calendar-select-bar').css({"background": "white", "pointer-events": "all"});
        $('.disable-box').hide();
        $('.return-ticket.ticket-type').addClass('active-calendar');
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.radio-return').prop('checked', true).change();
    });

    /* count number pax */
    $('.people-number ul').click(function() {
        var adults = parseInt($('.adults').val());
        var teenagers = parseInt($('.teenagers').val());
        var kids = parseInt($('.kids').val());
        var toddlers = parseInt($('.toddlers').val());

        var sum = adults + teenagers + kids + toddlers;
        $('.people-number .button-text .text').text('Persoane: ' + sum);
    })




    var min_date = 0;
    var maxNr = 2;
    /* firs page */
    $('.direction-1 input.date-select').datepicker({onClose: function(selectedDate) {
            min_date = selectedDate;
        }});
    $('.buttons-new-direction').on('click', function() {
        if (maxNr <= 3) {
            $('.new-direction').before('<div class="direction-' + (maxNr) + ' directions">\n\
                                        <div class="input-field"><input class="ticket-to-field" type="text" name="from" placeholder="Din:"></div>\n\
                                        <div class="input-field second"><input class="ticket-from-field" type="text" name="to" placeholder="Spre:"></div>\n\
                                        <div class="input-field"><input class="date-select" type="text" name="flight-date" placeholder="Data:"></div></div>');

            var temp_1 = $('.direction-' + (maxNr - 1) + '  input.ticket-from-field').val();
            $('.directions input').placeholder();
            $('.direction-' + (maxNr) + ' input.ticket-to-field').val(temp_1);
            $('.direction-' + (maxNr) + ' input.date-select').placeholder().datepicker({
                minDate: min_date,
                onClose: function(selectedDate) {
                    min_date = selectedDate;
                }
            })

            $('.direction-' + (maxNr) + ' input.date-select').click(function() {
                $(this).datepicker('hide').datepicker('destroy');
                min_date = $(this).parent().parent().prev().find('input.date-select').val();
                $(this).datepicker({minDate: min_date,
                    onClose: function(selectedDate) {
                        min_date = selectedDate;
                    }
                }).datepicker('show');
            });

            maxNr++;
        }
    });

    $('.buttons-remove-direction').on('click', function() {
        if ($('.directions').length > 1) {
            $('.directions').last().remove();
            maxNr--;
        }
    });

    /* hotels */
    $('.rooms').change(function() {
        var nr = $(this).val();
        var i = 1;
        $('.secondary').remove();
        for (i = 1; i < nr; i++) {
            var ind = i + 1;
            var temp = $('.room:nth-child(1)').clone();
            temp.removeClass('room-1').addClass('room-' + ind).addClass('secondary').insertAfter('.room:last');
        }
    })

    $('body').on("click", ".adults-s, .children-s, .rooms", function() {

        var suma = 0;
        var sumc = 0;

        $('.adults-s').each(function() {
            var temp_suma = parseInt($(this).val());
            suma = suma + temp_suma;
            $('.adults-main').val(suma);
        })

        $('.children-s').each(function() {
            var temp_sumc = parseInt($(this).val());
            sumc = sumc + temp_sumc;
            $('.children-main').val(sumc);
        })

    });

});