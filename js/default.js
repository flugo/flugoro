$(document).ready(function() {


    $.fn.valid = function() {
        if ($(this).val().length == 0) {
            $(this).after("<div class='tooltip'>Complectati campul</div>");
           /* setTimeout(function() {
                $('.tooltip').remove();
            }, 2000);*/
            return false;
        }
        else
            return true;
    };

    if($('#flights-search').length){
     $('#flights-search').validationEngine();
    }
    
    // click pe cauta
    if ($('.buttons-search-ticket').length) {
        $('.buttons-search-ticket').click(function() {
        	
            if ( $('.ticket-to-field').valid() == true && $('.ticket-from-field').valid() == true) {
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
    	$('#flights-search [name=multicity]').val(2);
    	
        $('.ticket-type-choice').css({'position': 'static'});
        $('.one-direction').hide();
        $('.multi-direction').show();
        $('input:radio[name=ticket-type]').prop('checked', false).change();
        $('.multi-direction-type').prop('checked', true).change();
    });
    
    var min_date = 0;
    var maxNr = 2;
    /* multiple site */
    
    
    $.datepicker.setDefaults($.datepicker.regional['ro']);
    alert(  $('.calendar').data('default')  )
    
    $('.direction-1 input.date-select').datepicker({onClose: function(selectedDate) { min_date = selectedDate;}});
    $('.calendar').datepicker({maxDate: '+12M +10D', minDate:0 , defaultDate: new Date( '2013,11,20'  ),
    	onSelect: function(input, inst){var itemVal = input;
    	var id = this.id.split('_'),type={'from':'to','to':'from'};
    	
    	
        if( id[1]=='from' ){
        	$('#flights-search [name="date_'+(id[1])+(id[2]>1?'_'+id[1]:'') +'"]').val(itemVal);
        	var datefrom=itemVal.split("-"),
        		dateto=$("#datatimeto").val().split("-"),tfrom,tto;
        	
           tfrom=new Date(datefrom[0],datefrom[1] -1,datefrom[2]);
           tto=new Date(dateto[0],dateto[1] -1,dateto[2]);
         $("#datatimeto").datepicker("option","minDate",tfrom); 
         $('#date-from').text(datefrom[2]+' '+$.datepicker._defaults.monthNames[datefrom[1]-1]);
         if(tto.getTime()<tfrom.getTime()){$("#datatimeto").val(itemVal);$('#datetoinput').val(itemVal);}
        }
        if($(this).is("#datatimeto")){$('#datetoinput').val(itemVal);   
            var dateto=itemVal.split("-"),datefrom=$("#datatimefrom").val().split("-"),tfrom,tto;
            tfrom=new Date(datefrom[0],datefrom[1] -1,datefrom[2]);tto=new Date(dateto[0],dateto[1] -1,dateto[2]);
            $('#date-to').text(' - '+dateto[2]+' '+$.datepicker._defaults.monthNames[dateto[1]-1]);
            if(tfrom.getTime()>tto.getTime()){$("#datatoinput").val($("#datafrominput").val());
                $("#datatimeto").val($("#datatimefrom").val());
         }}
        vffsone();
      }	
    }),
    
    $('.buttons-new-direction').on('click', function() {
        if (maxNr <= 3) {
            $('.new-direction').before('<div class="direction-' + (maxNr) + ' directions">\n\
                                        <div class="input-field"><input class="ticket-to-field" type="text" name="code_from_'+(maxNr)+'" placeholder=""></div>\n\
                                        <div class="input-field second"><input class="ticket-from-field" type="text" name="code_to" placeholder=""></div>\n\
                                        <div class="input-field"><input class="date-select" type="text" name="flight-date" placeholder=""></div></div>');

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
    
    
    if($('.ticket-from-field,.ticket-to-field').length){
        $('.ticket-from-field,.ticket-to-field').autocomplete({
                     source: function( request, response ) {
                       $.ajax({url: locale +'/city-helper',
                               dataType: "json",type: 'POST',
                               data: {q: request.term,timestamp:new Date().getTime(),step:1},
                               success: function(data ){
                                   response( $.map( data.cities, function( item ) {
                                   return {label: item.airportCode + ' ' +item.cityName + ' ' + ( item.airportName==''? '' : '(' +item.airportName+ ')'  ),
                                           value: item.cityName + ( item.airportName==''? '' : ' ' + '(' +item.airportName+ ')'  ),
                                           key : item.airportCode,
                                           info : '<b>'+item.cityName+'</b>,&nbsp;'+item.countryName,
                                           city: item.cityCode
                                          }
                                    }));
                                }
                               });
          },
          minLength : 3,delay : 0, autoFocus: true,
          select:function( event, ui ){
             /*var var_name = $(this).attr('name').replace('name','code');
             var var_ciname = $(this).attr('name').replace('name','city');

             $('input[name="'+var_name+'"]').val(ui.item.key);
             $('.route-info-big .'+var_name).html( ui.item.info );
             if( ui.item.city!=""){
                $('input[name="'+var_ciname+'"]').val(ui.item.city);
              }else{
                $('input[name="'+var_ciname+'"]').val(ui.item.key);
              }*/
          }
         }
         )/*.live('blur', function (e) {
              if ($('.ui-autocomplete li:visible').length > 0) {
                 var item = $($(".ui-autocomplete li:visible:first").data()).attr('item.autocomplete');
                 var var_name = $(this).attr('name').replace('name','code');
                 var var_ciname = $(this).attr('name').replace('name','city');
                 $(this).val(item.label);
                 $('input[name="'+var_name+'"]').val(item.key);
                 $('.route-info-big .'+var_name).html(item.info );
                 if( item.city!=""){
                    $('input[name="'+var_ciname+'"]').val(item.city);
                  }else{
                    $('input[name="'+var_ciname+'"]').val(item.key);
                  }
              }
            //  verifydata();
            })*/
          .click(function() {
             var var_city = $(this).attr('name').replace('name','city');
             var var_code = $(this).attr('name').replace('name','code');

             $('[name='+var_city+']').val('');
             $('[name='+var_code+']').val('');
             $(this).val('');
         });
     }


});