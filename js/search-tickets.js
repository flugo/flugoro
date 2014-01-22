(function($) {


    /* nr and type pax */
    $('.people-number').click(function(event) {
        event.stopPropagation();
        if (!$('.people-select').hasClass('active')) {
            $('.people-select').addClass('active').slideDown();
            $(this).find('img').attr("src", "/images/extend-info.png");
        }else if ($('.people-select').hasClass('active')) {
            $('.people-select').slideUp(function(){ $('.people-select').removeClass('active') } )
            $(this).find('img').attr("src", "/images/extend-info-closed.png");
        }
    })
    $('.people-select').click(function(event) { event.stopPropagation();});

    $('html').click(function(e){
        var $clicked=$(e.target);

        if($('.people-select').length && $('.people-select').hasClass('active')){
            $('.people-select').slideUp(function(){ $('.people-select').removeClass('active') } );
            $('.people-number img').attr("src", "/images/extend-info-closed.png");
        }
        if( $('.class-select').length && $('.class-select').hasClass('active')){
            $('.class-select').slideUp( function(){ $('.class-select').removeClass('active')} );
        }
    })

    $('.ticket-class').click(function(event) {
        event.stopPropagation();
        if(!$('.class-select').hasClass('active')) {
          $('.class-select').addClass('active').slideDown();
        } else if ($('.class-select').hasClass('active')) {
          $('.class-select').slideUp( function(){ $('.class-select').removeClass('active')});
        }
    });

    /* all autocomplete flghts */
    $(document).on("keydown.autocomplete",".ticket-from-field,.ticket-to-field",function(e){
        var cache ={};
        $(this).autocomplete({minLength:3,delay:0,autoFocus:true,source:function(request,response){
            $.ajax({url:locale+'/city-helper',dataType:"json",type:'POST',data:{q:request.term,timestamp:new Date().getTime()},
                success:function(data){cache=data.cities;
                    response($.map(data.cities,function(item){return{
                        label:item.airportCode+' '+item.cityName+' '+(item.airportName==''?'':'('+item.airportName+')'),
                        value:item.cityName+(item.airportName==''?'':' '+'('+item.airportName+')'),
                        obj:item}}));
                }
            });
        },
            select:function(event,ui){cache[0]=ui.item.obj;},
            close: function(){
                if(cache.length==0||cache[0]===undefined){ return false; }
                var nprop=$(this).prop('name');
                var item=nprop.split('_'), keys={'from':'to','to':'from'},itemname='',itemval='',i='_2';
                itemname += keys[item[1]];
                itemval += item[1];
                if(item.length>2){itemname+= '_'+(parseInt(item[2])),itemval+='_'+(parseInt(item[2])),i='_'+( parseInt(item[2])+1)}

                if( $('#flights-search [name=city_'+(itemname)+']').val()==cache[0].cityCode ){
                    $('#flights-search [name=name_'+(itemval)+']').validationEngine('showPrompt','Atentie! orasul de plecare si cel de sosire nu pot fi identice!'),
                        setTimeout(function(){$('#flights-search [name=name_'+(itemval)+']').select()},1000);
                    setTimeout(function(){$('#flights-search [name=name_'+(itemval)+']').validationEngine('hide')},5000)
                    if(item[1]=='to'){return false;}
                }
                $('#flights-search [name=city_'+itemval+']').val(cache[0].cityCode),
                    $('#flights-search [name=code_'+itemval+']').val(cache[0].airportCode),
                    $('#flights-search [name=name_'+itemval+']').val(cache[0].cityName+(cache[0].airportName==''?'':' '+'('+cache[0].airportName+')'))

                if( item[1]=='to' && $('#flights-search [name=city_from'+i+']').length){
                    $('#flights-search [name=city_from'+i+']').val(cache[0].cityCode)
                    $('#flights-search [name=code_from'+i+']').val(cache[0].airportCode)
                }
            }
        })
    }).on("click",".ticket-from-field,.ticket-to-field",function(e){ $(this).select();  });

    var simplecalendar = function(){
    $('.calendar').datepicker({maxDate: '+12M -1d', minDate:0 ,  defaultDate: null ,
        onSelect: function(input, inst){var itemVal = input;
            var id = this.id.split('_'),type={'from':'to','to':'from'};

            if( id[1]=='from' ){
                $('#flights-search [name="date_from'+(id[2]>1?'_'+id[1]:'') +'"]').val(itemVal);
                var datefrom=itemVal.split("-"),dateto=$("#flights-search [name=date_to]").val().split("-"),tfrom,tto;
                tfrom=new Date(datefrom[2],datefrom[1]-1,datefrom[0]);
                tto=new Date(dateto[2],dateto[1]-1,dateto[0]);
                $("#date_to_"+(id[2])).datepicker("option","minDate",tfrom);
                if(tto.getTime()<tfrom.getTime()){ $('#flights-search [name="date_to'+(id[2]>1?'_'+id[1]:'')+'"]').val(itemVal);}
                if( this.id =='date_from_1' ){
                    $('#date-from-default').datepicker( "option", "defaultDate", tfrom );
                }
            }
            if( id[1]=='to' ){ $('#flights-search [name="date_to'+(id[2]>1?'_'+id[1]:'')+'"]').val(itemVal);
                var dateto=itemVal.split("-"),
                    datefrom=$('#flights-search [name="date_from'+(id[2]>1?'_'+id[1]:'') +'"]').val().split("-"),
                    tfrom,tto;
                tfrom=new Date(datefrom[2],datefrom[1]-1,datefrom[0]);tto=new Date(dateto[2],dateto[1]-1,dateto[0]);

                if(tfrom.getTime()>tto.getTime()){
                    $('#flights-search [name="date_to'+(id[2]>1?'_'+id[1]:'')+'"]').val($('#flights-search [name="date_from'+(id[2]>1?'_'+id[1]:'')+'"]').val());
                    $("#date_to_"+(id[2])).datepicker("option","minDate",tfrom);
                }
            }
        }
    })
  }

    $.widget( "custom.modefly", {
        // default options
        options: {
            ftype: 'oneway',
            maxmultiple: 2,
        // callbacks
            change: null,
            random: null
        },

        _getTypeFly: function(){
            var element = this.element,
            ft = ( element.hasClass('oneway') ? 'oneway' :  element.hasClass('multiple') ? 'multiple' : element.hasClass('roundtrip') ? 'roundtrip' : 'oneway' );
            this.options.ftype = ft;

            return ft;
        },
        setButtonType: function(type){
           var formelement = this.element, typeflyelements = formelement.find('[name=ticket-type]');
            $.each( typeflyelements , function(k , i){
               if(i.value == type){
                 $( i ).prop("checked", true);
               }
            });
           return  typeflyelements;
        },
        getBtnNewDirection:function(){ return $('.new-direction'); },
        getBtnDelDirection:function(){ return $('.remove-direction'); },
        getBtnSearchDirection:function(){ return $('.buttons-search-ticket'); },
        _create: function() {
          var formelement = this.element , typefly = this._getTypeFly(), buttonstypefly = this.setButtonType(typefly), newdirection = this.getBtnNewDirection(),deldirection = this.getBtnDelDirection(),
            search = this.getBtnSearchDirection();
            simplecalendar();
            this._on( buttonstypefly, {     click: "ctypefly" });
            this._on( newdirection, {     click: "newdirection" });
            this._on( deldirection, {     click: "removedirection" });
          this._on( search, {     click: "tsearch" });
            this._refresh();
        },
        numbersuplimetdirections:function(){ return $('.directions').length; },
        newdirection: function(event){
          var $directions = this.numbersuplimetdirections() , $direction;

            if(this.options.maxmultiple == $directions)
             return false;

            $inputfrom = $('<input>',{ 'name' : 'name_from_'+($directions + 1) , 'class':'ticket-to-field','type':'text'})
                .attr('placeholder', $('#flights-search [name=name_from]').attr('placeholder'))
            $inputto = $('<input>',{ 'name' : 'name_to_'+($directions + 1) , 'class':'ticket-from-field','type':'text'})
                .attr('placeholder',$('#flights-search [name=name_to]').attr('placeholder'))
            $calendar = $('<input>',{ 'name' : 'date_from_'+($directions + 1) , 'class':'ticket-departure-field calendar','type':'text'})
                .attr('placeholder',$('#flights-search [name=date_from]').prop('placeholder'))

            $direction = $( "<div>", {"class": "direction-"+ ($directions + 1) +' directions'})
                .append($inputfrom)
                .append($inputto)
                .append($calendar)

            $('.new-direction').before($direction);

            $inputfrom.autocomplete();
            simplecalendar();
        },
        removedirection:function(){
            var $directions = this.numbersuplimetdirections();
            $('.direction-'+ $directions).remove()
        },
        ctypefly: function( event ) {
          var $value =  event.target.value ;
          this.element.removeClass( this.options.ftype).addClass($value)
          this.options.ftype =  $value
          this._refresh();
        },
        simplesearch:function(){

        },
        tsearch: function(event){ var span = $('.buttons-search-ticket span');
          if($('.block-calendar-left').hasClass('search')){
            span.text( span.data('now') )
            $('.block-calendar-left').removeClass('search'); return false;
          }
          this.simplesearch();
        },
        _destroy: function() { },
        _refresh:function(){

          $('.block-calendar-left .multi-direction').removeClass('show'),$('.block-calendar-left .return').removeClass('hide')
          if(this.options.ftype == 'multiple'){
           $('.block-calendar-left .multi-direction').addClass('show')
           $('.block-calendar-left .return').addClass('hide')
          }
          $(".one-direction .ticket-return-field").datepicker('enable');
          if(this.options.ftype=='oneway'){
           $(".one-direction .ticket-return-field").datepicker('disable');
          }


        }

    });

    $('.block-calendar-left').modefly();

    $('input:radio').wRadio({theme: 'circle-classic-green',selector: 'circle-solid'});
    $('input:checkbox').wCheck({ theme: 'square-radial-yellow',selector: 'cross'});

}(jQuery));
