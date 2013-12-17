$(document).ready(function(){ 

    $('input:radio').wRadio({
        theme: 'circle-classic-green',
        selector: 'circle-solid'
    });

    $('input:checkbox').wCheck({
        theme: 'square-radial-yellow',
        selector: 'cross'
    });
						   
	$('.ticket-departure-field, .ticket-return-field, .calendar, .check-ind-field, .check-outd-field').each(function(i,e) {
		var $d = $(this);
		$d.datepicker({
			altField: $d.data('altfield')
		});
    });
	
	$('.main-ticket-return-field').val('');
    $(".slider-flight-duration").slider({
  min: 0,
  max: 18,
  step: 2,
  slide: function(event, ui) {
    $(".slider-flight-duration-value").text(ui.value);
  }
});

    $(".slider-flight-duration").slider({
        min: 240,
        max: 765,
        step: 15,
        slide: function(e, ui) {
            var hours = Math.floor(ui.value / 60);
            var minutes = ui.value - (hours * 60);
            if(hours.length == 1) hours = '0' + hours;
            if(minutes.length == 1) minutes = '0' + minutes;

            $('.slider-flight-duration-value').html('4h - '+hours+' h '+minutes+' m');
        }
    });

    $(".slider-stop-duration").slider({
        min: 0,
        max: 450,
        step: 15,
        slide: function(e, ui) {
            var hours = Math.floor(ui.value / 60);
            var minutes = ui.value - (hours * 60);
            if(hours.length == 1) hours = '0' + hours;
            if(minutes.length == 1) minutes = '0' + minutes;

            $('.slider-stop-duration-value').html('0m - '+hours+' h '+minutes+' m');
        }
    });

    $(".slider-price").slider({
		  min: 280,
		  max: 596,
		  step: 1,
		  slide: function(event, ui) {
  		  $(".slider-price-value span").text(ui.value);
	 	}
	});

	$(".slider-flight-takeoff-away").slider({
		range: true,
        min: 240,
        max: 765,
        step: 15,
        values: [240, 750],
        slide: function(e, ui) {
            var hours_1 = Math.floor(ui.values[0] / 60);
            var minutes_1 = ui.values[0] - (hours_1 * 60);
            if(hours_1.length == 1) hours_1 = '0' + hours_1;
            if(minutes_1.length == 1) minutes_1 = '0' + minutes_1;
            var hours_2 = Math.floor(ui.values[1] / 60);
            var minutes_2 = ui.values[1] - (hours_2 * 60);
            if(hours_2.length == 1) hours_2 = '0' + hours_2;
            if(minutes_2.length == 1) minutes_2 = '0' + minutes_2;

            $('.slider-flight-takeoff-away-value').html(hours_1 + 'h '+minutes_1+'m - '+hours_2+'h '+minutes_2+'m');
        }
    });

    $(".slider-flight-landing-away").slider({
        range: true,
        min: 240,
        max: 765,
        step: 15,
        values: [240, 750],
        slide: function(e, ui) {
            var hours_1 = Math.floor(ui.values[0] / 60);
            var minutes_1 = ui.values[0] - (hours_1 * 60);
            if(hours_1.length == 1) hours_1 = '0' + hours_1;
            if(minutes_1.length == 1) minutes_1 = '0' + minutes_1;
            var hours_2 = Math.floor(ui.values[1] / 60);
            var minutes_2 = ui.values[1] - (hours_2 * 60);
            if(hours_2.length == 1) hours_2 = '0' + hours_2;
            if(minutes_2.length == 1) minutes_2 = '0' + minutes_2;

            $('.slider-flight-landing-away-value').html(hours_1 + 'h '+minutes_1+'m - '+hours_2+'h '+minutes_2+'m');
        }
    });

    $(".slider-flight-takeoff-return").slider({
        range: true,
        min: 240,
        max: 765,
        step: 15,
        values: [240, 750],
        slide: function(e, ui) {
            var hours_1 = Math.floor(ui.values[0] / 60);
            var minutes_1 = ui.values[0] - (hours_1 * 60);
            if(hours_1.length == 1) hours_1 = '0' + hours_1;
            if(minutes_1.length == 1) minutes_1 = '0' + minutes_1;
            var hours_2 = Math.floor(ui.values[1] / 60);
            var minutes_2 = ui.values[1] - (hours_2 * 60);
            if(hours_2.length == 1) hours_2 = '0' + hours_2;
            if(minutes_2.length == 1) minutes_2 = '0' + minutes_2;

            $('.slider-flight-takeoff-return-value').html(hours_1 + 'h '+minutes_1+'m - '+hours_2+'h '+minutes_2+'m');
        }
    });

    $(".slider-flight-landing-return").slider({
        range: true,
        min: 240,
        max: 765,
        step: 15,
        values: [240, 750],
        slide: function(e, ui) {
            var hours_1 = Math.floor(ui.values[0] / 60);
            var minutes_1 = ui.values[0] - (hours_1 * 60);
            if(hours_1.length == 1) hours_1 = '0' + hours_1;
            if(minutes_1.length == 1) minutes_1 = '0' + minutes_1;
            var hours_2 = Math.floor(ui.values[1] / 60);
            var minutes_2 = ui.values[1] - (hours_2 * 60);
            if(hours_2.length == 1) hours_2 = '0' + hours_2;
            if(minutes_2.length == 1) minutes_2 = '0' + minutes_2;

            $('.slider-flight-landing-return-value').html(hours_1 + 'h '+minutes_1+'m - '+hours_2+'h '+minutes_2+'m');
        }
    });

    $('.take-off-checkbox').click( function () {
        if($(this).is(':checked')) {
            $('.flight-takeoff').show();
        } else {
            $('.flight-takeoff').hide();
        }
    })


    $('.landing-checkbox').click( function () {
        if($(this).is(':checked')) {
            $('.flight-landing').show();
        } else {
            $('.flight-landing').hide();
        }
    })


	$('.tab-hoteluri').click(function () {
		$('.hotel').show();
		$('.tab-hoteluri .gradient').removeClass('inactive');
		$('.tab-bilete .gradient').addClass('inactive');
		$('.content').hide();
	})

	$('.tab-bilete').click(function () {
		$('.hotel').hide();
		$('.tab-bilete .gradient').removeClass('inactive');
		$('.tab-hoteluri .gradient').addClass('inactive');
		$('.content').show();
	})

	$(".card-number").click(function(){
		$(this).mask("9999 9999 9999 9999", {placeholder: "#"});
	})
});