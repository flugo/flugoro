$(document).ready(function() {

    $('.passport-data .edit').click(function() {
        $('body').prepend('<div id="fadeOverlay" style="opacity:0.80;position:fixed;left:0;top:0;width:100%;height:100%;z-index:999;background:#000;"></div>');
        $('.popup-edit').show();
        $('#fadeOverlay').click(function() {
            $(this).remove();
            $('.popup-edit').hide();
        })
    });

    var min_date = 0;
    var maxNr = 2;
    /* firs page */
    $('.direction-1 input.date-select').datepicker({
        onClose: function(selectedDate) {
            min_date = selectedDate;
        }
    });

    $('.buttons-new-direction').on('click', function() {
        if (maxNr <= 3) {
            $('.new-direction').before('<div class="direction-' + (maxNr) + ' directions"><div class="input-field"><input class="ticket-to-field" type="text" name="from" placeholder="Din:"></div><div class="input-field second"><input class="ticket-from-field" type="text" name="to" placeholder="Spre:"></div><div class="input-field"><input class="date-select" type="text" name="flight-date" placeholder="Data:"></div></div>');

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
                $(this).datepicker({
                    minDate: min_date,
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

    /* firs page */

    $('.buttons-seat-select').click(function() {
        $('body').prepend('<div id="fadeOverlay" style="opacity:0.80;position:fixed;left:0;top:0;width:100%;height:100%;z-index:999;background:#000;"></div>');
        $('#seat-select-popup').show();
        $('#fadeOverlay').click(function() {
            $(this).remove();
            $('#seat-select-popup').hide();
        })
    })

    var tempString = '';
    var typingTimer;
    var doneTypingInterval = 2000;

    //match string for dropdown keypress

    $.fn.matchString = function(tempString, tempStringLength) {
        $(this).each(function() {
            $(this).parent().find('li');
            if ($(this).text().toLowerCase().substr(0, tempStringLength) == tempString) {
                var substituteString = $(this).text();
                $(this).parent().parent().find('.button-text span').text(substituteString);
                return false;
            }
        })
    }

    //record keypress

    $.fn.recordToString = function() {
        $(this).off('keypress').on('keypress', function(e) {
            e.stopPropagation();
            tempString = tempString + String.fromCharCode(e.which);
            var tempStringLength = tempString.length;
            $(this).parent().find('li').matchString(tempString, tempStringLength);
            $('.input').text(tempString);
            clearTimeout(typingTimer);
            if (tempString) {
                typingTimer = setTimeout(doneTyping, doneTypingInterval);
            }
        })
    }

    //focus on dropdown for keypress

    $.fn.typing = function() {
        $(this).on('focusin', function() {
            $(this).recordToString();
        });
    };

    //reset recorded string

    function doneTyping() {
        tempString = '';
        $(this).recordToString();
    }
    ;

    //placeholder

    $('input, textarea').placeholder();
    $('input.exist_ff').prop('checked', false).change();
    $.fn.dropdown = function() {
        $(this).click(function(event) {
            event.stopPropagation();
            if (!$(this).find('.button-select').hasClass('active')) {
                $(this).find('.button-select').addClass('active').css({"position": "absolute"}).slideDown();
                $(this).find('img').attr("src", "images/extend-info.png");
            }
            else if ($(this).find('.button-select').hasClass('active')) {
                $(this).find('.button-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
                $(this).find('img').attr("src", "images/extend-info-closed.png");
            }
        })

        $('html').click(function() {
            $(this).find('.button-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
            $('.button-dropdown img').attr("src", "images/extend-info-closed.png");
        })

        $(this).find('li').click(function() {
            var selectText = $(this).html();
            $(this).parent().parent().find('span').html(selectText);
        })

        $(this).mouseenter(function() {
            $(this).find('img').css({"background": "#d7d7d7"})
        })

        $(this).mouseleave(function() {
            $(this).find('img').css({"background": "white"})
        })
    };

    $('.button-dropdown').dropdown();

    $('.button-text').typing();



    $('.plusminus span').delay(2000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#5282C0'}, 1000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#5282C0'}, 1000).animate({backgroundColor: 'white'}, 1000).animate({backgroundColor: '#5282C0'}, 1000);

    $('.plusminus span').mouseenter(function() {
        $(this).css("background", "#24529b");
    });
    $('.plusminus span').mouseleave(function() {
        $(this).css("background", "#5282C0");
    });


    var nrPerson = 2;

    //registrare adauga persoane

    $.fn.addForm = function() {
        var temp = $('.person-1').clone();
        var prev = nrPerson - 1;
        temp.find('.buttons-remove-show').removeClass('buttons-remove-show').addClass('buttons-remove').html();
        temp.find('.card-choice').find('.ff-cards').remove('.add-cards').hide();
        temp.find('.person-title').text('Persoana ' + nrPerson);
        temp.removeClass('person-1').addClass('person-' + nrPerson).addClass('add-p').show().insertBefore('.buttons-add-show');
        nrPerson++;
        $('input:checkbox').wCheck({
            theme: 'square-radial-yellow',
            selector: 'cross'
        });
        $('.buttons-remove').click(function() {
            $(this).parent().remove();
        });
    };

    var cardNr = 2;

    $('.add-ff-card input.add_ff').click(function() {
        var tempff = $('.ff-cards-first').clone();
        var location = $(this).parent().parent().parent().find('.add-ff-card');
        tempff.removeClass('ff-card-1').removeClass('ff-cards-first').addClass('add-card-' + cardNr).addClass('add-cards');
        tempff.show();
        tempff.insertBefore(location);
        tempff.find('.button-dropdown').dropdown();
        cardNr++;
        $('.add-ff-card input.add_ff').prop('checked', false).change();
    });

    //exists fidelity card

    $.fn.existFc = function() {
        $(this).find('.ffy').find('.card-nr').find('.wCheck').find('.wCheck').find('input').click(function() {
            $(this).parent().parent().parent().parent().find('.card-in.button-dropdown').show();
            $(this).parent().parent().parent().parent().find('.apply-card, .apply-card .text, .apply-card .fid-card-field, .apply-card .fid-card-button').show();
            $(this).parent().parent().parent().parent().find('.ff-cards').show();
            $(this).parent().parent().parent().hide();
            $(this).parent().parent().parent().parent().find('.add-ff-card').show();
            $(this).parent().parent().parent().parent().find('.add-ff-card input.add_ff').click(function() {
                var tempff = $('.ff-cards-first').clone();
                var location = $(this).parent().parent().parent().parent().find('.add-ff-card');
                tempff.removeClass('ff-card-1').removeClass('ff-cards-first').addClass('add-card-' + cardNr).addClass('add-cards');
                tempff.show();
                tempff.insertBefore(location);
                tempff.find('.button-dropdown').dropdown();
                cardNr++;
                $('.add-ff-card input.add_ff').prop('checked', false).change();
            });
        });
    };

    //tooltip

    var personNr = 1;

    $('.buttons-add-show').click(function() {
        $(this).hide();
        $('.buttons-add').css({"display": "inline-block"});
        $('.add-people:first').css({"display": "inline-block"});
    })

    $('.buttons-remove-show').click(function() {
        $(this).parent().hide();
    })

    $('.buttons-add').click(function() {
        $(this).addForm();
        personNr++;
        $('.person-' + personNr).existFc();
        $('.person-' + personNr + ' .button-dropdown').dropdown();
        $('.person-' + personNr + ' .card-in.button-dropdown, .person-' + personNr + ' .apply-card, .person-' + personNr + ' .apply-card .text, .person-' + personNr + ' .apply-card .fid-card-button, .person-' + personNr + ' .apply-card .fid-card-field').hide();
        $('.person-' + personNr + ' .ffy .card-nr .wCheck').removeClass('wCheck-on').addClass('wCheck-off');
        $('input.surname-a').focusin(function() {
            $(this).after("<div class='tooltip'>Introduceti doar un nume</div>");
        })
        $('input.surname-a').focusout(function() {
            $('.tooltip').remove();
        })
        $('.person-' + personNr + ' .card-nr').show();
        $('.person-' + personNr + ' .ff-cards').hide();
        $('.person-' + personNr + ' .add-ff-card').hide();
    });

    $('.register').click(function() {
        $('.registration-popup').show();
        $('.login-popup').hide();
    })


    $('.register').click(function() {
        $('.registration-popup').show();
        $('.login-popup').hide();
    })

    $('input:radio[name=ticket-type]').prop('checked', false).change();
    $('.radio-one-way').prop('checked', true).change();

    //tickets-page show-hide boxes

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

    $('.multi-direction').hide();


    $('.block-calendar-left .ticket-type-choice-nm .ticket-radio-1 input, .block-calendar-left .ticket-type-choice-nm .ticket-radio-2 input').click(function() {
        $('.one-direction').show();
        $('.multi-direction').hide();
    })

    $('.block-calendar-left .ticket-type-choice-nm .ticket-radio-3 input').click(function() {
        $('.multi-direction').show();
        $('.one-direction').hide();
    })

    $('.multi-direction-type').on('click', function() {
        $('.ticket-type-choice').css({'position': 'static'});
        $('.one-direction').hide();
        $('.multi-direction').show();
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.multi-direction-type').prop('checked', true).change();
    });

    $('.one-way-ticket .calendar .ui-datepicker-calendar tr td').click(function() {
        if ($(this).is(':empty') == false) {
            $('.one-way-ticket td').css({"background": "#EFF3F4", "color": "#5b5b5b"});
            $(this).css({"background": "#e84044!important", "color": "white"});
        }
    })

    $('.return-ticket .calendar .ui-datepicker-calendar tr td').click(function() {
        if ($(this).is(':empty') == false) {
            $('.return-ticket td').css({"background": "#EFF3F4", "color": "#5b5b5b"});
            $(this).css({"background": "#e84044!important", "color": "white"});
        }
    })

    $('.chat-window-title').click(function() {
        if ($('.chat-window').hasClass('chat-active') == false) {
            $('.chat-window').addClass('chat-active').animate({bottom: "0"});
            $('.chat-arrow').attr("src", "images/chat-title-open.png");
        }
        else {
            $('.chat-window').removeClass('chat-active').animate({"bottom": "-252px"});
            $('.chat-arrow').attr("src", "images/chat-title.png");
        }
    });

    //price-table hover

    $('.price-table table tbody tr td').click(function() {
        $('.price-table table tbody tr td').not(this).css({"background": "#EFF3F4", "color": "black"});
        if (!$(this).hasClass('table-first'))
            $(this).css({"background": "#e84044", "color": "white"});
    })

    $('.price-table-1 table tbody tr td').click(function() {
        $('.price-table-1 table tbody tr td').not(this).css({"background": "#EFF3F4", "color": "black"});
        if (!$(this).hasClass('table-first'))
            $(this).css({"background": "#e84044", "color": "white"});
    })

    //login, registrare popup

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
            $('#fadeOverlay').fadeOut("slow", function() {
                $(this).remove();
            });
            $('.login-popup').hide();
            $('.registration-popup').hide();
            $('.forgot-pass-popup').hide();
        });
    })

    //restore account

    $('.footer-pass a').click(function() {
        $('.login-fields').hide();
        $('.forgot-pass').show();
        $('.login-popup-in.popup-title').text('Introduceti e-mail pentru a recupera contul');
        $('.button-login.red-button .text').text('Trimite');
        $('.button-login').width(97);
    })

    $('.show-detailed-info-button').click(function() {
        if ($(this).hasClass('active'))
            $(this).removeClass('active').html('Mai detaliat despre zbor<img class="extend-info-image" src="images/extend-info-closed.png">').parent().find('.show-detailed-info').slideUp();
        else
            $(this).addClass('active').html('Mai putin detaliat despre zbor<img class="extend-info-image" src="images/extend-info.png">').parent().find('.show-detailed-info').slideDown();
    })

    $('.column').mouseenter(function() {
        $(this).find('.promotion-button img').attr("src", "images/active-big-search-arrow-link.png");
    });
    $('.column').mouseleave(function() {
        $(this).find('.promotion-button img').attr("src", "images/big-search-arrow-link.png");
    });

    $('.searches').mouseenter(function() {
        $(this).find('.search-image-link').css({"background": "url('images/search-arrow-link-active.png')"});
    });
    $('.searches').mouseleave(function() {
        $(this).find('.search-image-link').css({"background": "url('images/search-arrow-link.png')"});
    });

    //test button
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

    //
    $('.people-number').click(function(event) {
        event.stopPropagation();
        if (!$('.people-select').hasClass('active')) {
            $('.people-select').addClass('active').css({"position": "absolute"}).slideDown();
            $(this).find('img').attr("src", "images/extend-info.png");
        }
        else if ($('.people-select').hasClass('active')) {
            $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
            $(this).find('img').attr("src", "images/extend-info-closed.png");
        }
    })

    $('.people-select').click(function(event) {
        event.stopPropagation();
    })

    $('html').click(function() {
        $('.people-select').removeClass('active').slideUp().animate({"position": "initial"}, 0);
        $('.people-number img').attr("src", "images/extend-info-closed.png");
    })

    $('.people-number').mouseenter(function() {
        $('.people-number img').css({"background": "#d7d7d7"})
    })

    $('.people-number').mouseleave(function() {
        $('.people-number img').css({"background": "white"})
    })

    //

    $('.offers').mouseenter(function() {
        $(this).find('.offer-image-link').css({"background": "url('images/search-arrow-link-active.png')"});
    });
    $('.offers').mouseleave(function() {
        $(this).find('.offer-image-link').css({"background": "url('images/search-arrow-link.png')"});
    });

    //show the coupon field and apply button
    $('.exist_ff.registration').click(function() {
        $(this).parent().parent().hide();
        $(this).parent().parent().parent().find('.add-ff-card').show();
        $(this).parent().parent().parent().find('.ff-cards').show();
        $(this).parent().parent().parent().find('.add-cards').show();
    })

    //reserve a ticket button
    $('.buttons-reserve-ticket').click(function() {
        $('.course-name .price').css("visibility", "visible");
        if (jQuery.browser.version.substring(0, 2) == "8.") {
            $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().children('.input-data').show();
        }
        ;
        if (jQuery.browser.version.substring(0, 2) == "9.") {
        }
        ;
        $(this).parent().parent().children('.input-data').show();
        $(this).hide();
        if (jQuery.browser.version.substring(0, 2) == "8.") {
            $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().addClass('flight active');
        }
        ;
        $(this).parent().parent().addClass('active');
        $('.footer-price').hide();
        $('.filters').hide();
        $('.block-other-offers').hide();
        $('.promotion-ticket').hide();
        $('.show-detailed-info').slideUp();
        $('.timer').countdown({until: 900, format: 'MS', timeSeparator: ':', compact: true});
        $('.flight').each(function() {
            if ($(this).hasClass('active') == false)
                $(this).hide();
        });
        $('.stick').css({
            "border-radius": "10px",
            "border-bottom": "1px solid #c8c8c8"
        })
        $('.content-main-filters').hide();
        $('html, body').animate({
            scrollTop: $(".block-calendar-left").offset().top
        }, 500);
    })

    //in reserving menu advance to billing
    $('.buttons-reserve-1-ticket').click(function() {
        var tempObject = $(this).parent().parent().parent().find(".flight-short-info");
        if ($.browser.msie) {
            $('.person-info .individual .t2-row img').css({
                'padding-bottom': '7px'
            });
            $('.music-eq-in img, .sport-eq-in img').css({
                'padding-top': '10px',
                'padding-bottom': '6px'
            });
            $('.padding-item .luggage-in img, .padding-item .check-in img, .padding-item .kids-eq-in img, .padding-item .individual-country img, .padding-item .individual-sector img, .padding-item .person-type img, .padding-item .card-in img, .padding-item .person-info img').css({
                'padding-bottom': '6.5px'
            });
            $('.person-info .legal-entity .row-last.clmn .res-individual-country img').css({
                'margin-top': '-29px',
                'padding-top': '10px',
                'padding-bottom': '6.5px'
            });
            $('.card-choice .card-in img').css({
                'margin-top': '-29px',
                'padding-bottom': '6.5px'
            });
        }
        ;
        $(this).parent().parent().parent().children('.input-data').css("margin-bottom", "36px");
        $('.loading-block').show(0).delay(2000).hide(0);
        $('.congratulation-block').delay(2000).show(0);
        $(this).hide();
        if (jQuery.browser.version.substring(0, 2) == "8.") {
            $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().children('.pay-methods').delay(2000).show(0);
        }
        ;
        $(this).parent().parent().parent().children('.pay-methods').delay(2000).show(0);
        if (jQuery.browser.version.substring(0, 2) == "8.") {
            $(this).parent().parent().parent().parent().parent().parent().parent().parent().parent().children('.input-data').insertBefore('.flight-short-info');
        }
        ;
        $(this).parent().parent().parent().children('.input-data').insertBefore('.flight-short-info');
        $('.timer-bar-2, .timer-bar-1').delay(2000).hide(0);
        $('html, body').delay(2000).animate({
            scrollTop: tempObject.offset().top - 150
        }, 500);
    });

    //choose between paying methods
    $('.pay-methods .choice span input').click(function() {
        if ($(this).val() == 'card') {
            $('.pay-methods .card').show();
            $('.pay-methods .office').hide();
            $('.pay-methods .transfer').hide();
            $('.buttons-print-ticket').hide();
            $('.buttons-buy-ticket').show();
        }
        else if ($(this).val() == 'office') {
            $('.pay-methods .card').hide();
            $('.pay-methods .office').show();
            $('.pay-methods .transfer').hide();
            $('.buttons-print-ticket').show();
            $('.buttons-buy-ticket').hide();
        }
        else {
            $('.pay-methods .card').hide();
            $('.pay-methods .office').hide();
            $('.pay-methods .transfer').show();
            $('.buttons-print-ticket').show();
            $('.buttons-buy-ticket').hide();
        }
    })

    $('.res-person-type .person-select li, .person-type .person-select li').click(function() {
        if ($(this).text() == 'Persoana fizica') {
            $(this).parent().parent().parent().parent().find('.individual').show();
            $(this).parent().parent().parent().parent().find('.legal-entity').hide();
        }
        else if ($(this).text() == 'Persoana juridica') {
            $(this).parent().parent().parent().parent().find('.individual').hide();
            $(this).parent().parent().parent().parent().find('.legal-entity').show();
        }
    })

    //show the coupon field and apply button
    $('.exist_ff').on('click', function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().find('.button-dropdown').show();
            $(this).parent().parent().parent().find('.fid-card-field, .fid-card-button, .apply-card').show();
        } else {
            $(this).parent().parent().parent().find('.button-dropdown').hide();
            $(this).parent().parent().parent().find('.fid-card-field, .fid-card-button, .apply-card').hide();
        }
    })

    //show fidelity card field
    $('.exist_fc').click(function() {
        if ($(this).is(':checked')) {
            $(this).parent().parent().parent().find('.fidelity-card').show();
        } else {
            $(this).parent().parent().parent().find('.fidelity-card').hide();
        }
    });

    $('.coupon-checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('.coupon-field, .coupon-button').show();
        } else {
            $('.coupon-field, .coupon-button').hide();
        }
    })

    $('.filter-title').click(function() {
        var temp = $(this).parent().find('.filter-content');
        var img = $(this).find('img');
        if (!$(temp).hasClass('active')) {
            $(temp).addClass('active').slideUp();
            $(img).attr("src", "images/extend-info.png");
        }
        else if ($(temp).hasClass('active')) {
            $(temp).removeClass('active').slideDown();
            $(img).attr("src", "images/extend-info-closed.png");
        }
    })

    $('.people-number ul').click(function() {
        var adults = parseInt($('.adults').val());
        var teenagers = parseInt($('.teenagers').val());
        var kids = parseInt($('.kids').val());
        var toddlers = parseInt($('.toddlers').val());

        var sum = adults + teenagers + kids + toddlers;
        $('.people-number .button-text .text').text('Persoane: ' + sum);
    })

    $('.people-number ul').click(function() {
        var adults = parseInt($('.adults').val());
        var teenagers = parseInt($('.teenagers').val());
        var kids = parseInt($('.kids').val());
        var toddlers = parseInt($('.toddlers').val());

        var sum = adults + teenagers + kids + toddlers;
        $('.people-number .button-text .text').text('Persoane: ' + sum);
    })

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

    //simple validation

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

    $('.buttons-search-ticket').click(function() {
        if ($('.ticket-to-field').valid() == true && $('.ticket-from-field').valid() == true) {
            window.location.replace("tickets_page.html");
        } else {
            $('.ticket-to-field, .ticket-from-field').valid();
            $('html, body').animate({scrollTop: $('.ticket-field').offset().top - 150}, 500);
        }
    });


    //persoana fizica autocomplete
    $(".res-individual-surname").bind('keyup keydown', function() {
        $(".individual-surname").val(this.value);
    })
    $(".res-individual-name").bind('keyup keydown', function() {
        $(".individual-name").val(this.value);
    })
    $(".res-individual-adress").bind('keyup keydown', function() {
        $(".individual-adress").val(this.value);
    })
    $(".res-individual-city").bind('keyup keydown', function() {
        $(".individual-city").val(this.value);
    })
    $(".res-individual-CNP").bind('keyup keydown', function() {
        $(".individual-CNP").val(this.value);
    })
    $(".res-individual-email").bind('keyup keydown', function() {
        $(".individual-email").val(this.value);
    })
    $(".res-individual-phone").bind('keyup keydown', function() {
        $(".individual-phone").val(this.value);
    })
    $('.res-person-type li').click(function() {
        var selectText = $(this).text();
        $('.person-type .text').text(selectText);
        if ($('.res-person-type span').html() == 'Persoana fizica') {
            $('.transfer .individual').show();
            $('.transfer .legal-entity').hide();
        }
        else if ($('.res-person-type span').html() == 'Persoana juridica') {
            $('.transfer .individual').hide();
            $('.transfer .legal-entity').show();
        }
    })

    //persoana juridica autocomplete
    $(".res-legal-company").bind('keyup keydown', function() {
        $(".legal-company").val(this.value);
    })
    $(".res-legal-adress").bind('keyup keydown', function() {
        $(".legal-adress").val(this.value);
    })
    $(".res-legal-registration-no").bind('keyup keydown', function() {
        $(".legal-registration-no").val(this.value);
    })
    $(".res-legal-CUI").bind('keyup keydown', function() {
        $(".legal-CUI").val(this.value);
    })
    $(".res-legal-email").bind('keyup keydown', function() {
        $(".legal-email").val(this.value);
    })
    $(".res-legal-phone").bind('keyup keydown', function() {
        $(".legal-phone").val(this.value);
    })
    $(".res-legal-city").bind('keyup keydown', function() {
        $(".legal-city").val(this.value);
    })

    $('.card-number').focusin(function() {
        $('.card-number').bind('keyup keydown', function() {
            var symbols = $(this).val();
            $('.back-cvv .last-numbers input').val(symbols.substr(15, 4));
        })
    })


    $(".main-inp.individual-adress").bind('keyup keydown', function() {
        $(".payment-inp.individual-adress").val(this.value);
    });
    $(".main-inp.individual-city").bind('keyup keydown', function() {
        $(".payment-inp.individual-city").val(this.value);
    });
    $(".main-inp.individual-CNP").bind('keyup keydown', function() {
        $(".payment-inp.individual-CNP").val(this.value);
    });

    $('.add-payment-data').click(function() {
        $(this).hide();
        $('.payment-data .inner-block').show();
        $('.payment-data').css({
            'overflow': 'visible',
            'height': '213px'
        });
    })


    //adress fields tooltip
    $('input.res-individual-adress, input.individual-adress, input.legal-adress, input.res-legal-adress').focusin(function() {
        $(this).after("<div class='tooltip'>Forma adresei: oras, strada, casa, ap</div>");
    })
    $('input.res-individual-adress, input.individual-adress, input.legal-adress, input.res-legal-adress').focusout(function() {
        $('.tooltip').remove();
    })
    //surname fields tooltip
    $('input.surname-a, input.validate-name.row-text.surname, input.res-individual-surname, input.individual-surname').focusin(function() {
        $(this).after("<div class='tooltip'>Introduceti doar un nume</div>");
    })
    $('input.surname-a, input.validate-name.row-text.surname, input.res-individual-surname, input.individual-surname').focusout(function() {
        $('.tooltip').remove();
    })

    $('.calendar .ui-datepicker-title').addClass('main');

    var regHeight = $('.additional-people.content-main-block-1').height();

    $('input.office-radio').prop('checked', true).change();

    if (location.search == "?reg=1") {
        $('.login-popup').show();
        $('.forgot-pass').hide();
        $('body').prepend('<div id="fadeOverlay" style="opacity: 0.8; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 999; background-color: rgb(0, 0, 0); background-position: initial initial; background-repeat: initial initial;"></div>');
        $('#fadeOverlay').click(function() {
            $(this).remove();
            $('.login-popup').hide();
        })
    }

});
//max-min input field (date)
function check_d(obj) {
    var val = parseInt(obj.value);
    var max = obj.getAttribute('max');
    var min = obj.getAttribute('min');
    if (parseInt(max) < val)
        obj.value = 1;
    if (parseInt(min) > val)
        obj.value = 1;
}

function check_m(obj) {
    var val = parseInt(obj.value);
    var max = obj.getAttribute('max');
    var min = obj.getAttribute('min');
    if (parseInt(max) < val)
        obj.value = 1;
    if (parseInt(min) > val)
        obj.value = 1;
}