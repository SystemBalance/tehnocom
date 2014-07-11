$(function() {
    //$('.product-detail__pics').find('li:first a').addClass('selected');
    
    //$('body').on('click', '.product-detail__pics li a', function(e) {
//        e.preventDefault();
//        var body = $(this).closest('.product-detail__pics');
//        body.find('.selected').removeClass('selected');
//        $(this).addClass('selected');              
//        body.find('.product-detail__image img').attr('src', $(this).attr('href'));  
//    });    
    
    
    //$('.product-detail__image').on('click', function(e){
        //e.preventDefault();
        //$.fancybox.open($('.fancybox'), {helpers: {overlay: {locked: false}}, index: $('.product-detail__pics .selected').closest('li').index()});
    //});
    $(".fancybox").fancybox();

    $('.recycle-page input').mask("9?" + "999", { placeholder: ""})
    
    $('body').on('focus', '.recycle-page input', function(e) {                     
        if (!$(this).closest('tr').hasClass('active')) {
            $(this).data('oldcount', $(this).val());
            if ($('.recycle-page .active').length) {
                $('.recycle-page table .active').each(function() {                    
                    var oldcount = $(this).find('input').data('oldcount');                
                    if (oldcount) {
                        $(this).find('input').val(oldcount);            
                        calcRecycle();                         
                    }                        
                }).removeClass('active');                  
            }        
            $(this).closest('tr').addClass('active');    
        }                
        
    }).keyup(function() {        
        calcRecycle();
    });
    
    $('body').on('click', '.recycle-page__buttons a', function(e) {
        e.preventDefault();
        if ($(this).hasClass('btn_cancel')) {
            var oldcount = parseInt($(this).closest('tr').find('input').data('oldcount'));
            $(this).closest('tr').find('input').val(oldcount);            
            calcRecycle();    
        }
        else {
            $(this).closest('tr').find('input').data('oldcount', '');
        }       
        $(this).closest('tr').removeClass('active');
                                
    });

    
    
    var calcRecycle = function() {
        var sum = 0;
        $('.recycle-page table input').each(function() {
            var val = parseInt($(this).val() ? $(this).val() : 0),
                cost = parseInt($(this).data('cost')); 
                $(this).closest('tr').find('.recycle-page__sum span').text(val * cost);                
            sum += val*cost;            
        });
        $('.recycle-page__itogo_sum span').text(sum);
    };
    
    var calcCount = function() {
        if ($('.table__recycle tr').length) {
            $('.count__recycle').text($('.table__recycle tr').length - 2);
        } 
        if ($('.table__hold tr').length) {
            $('.count__hold').text($('.table__hold tr').length - 1);
        }                       
    };
    
    $('body').on('click', '.recycle-page .btn__delete', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        calcCount();
        calcRecycle();
    });    
    
    $('body').on('click', '.recycle-page .btn__hold', function(e) {
        
        e.preventDefault();
        
        //var clone = $(this).closest('tr').clone();
        //$(this).closest('tr').remove();
        var hold = $(this).closest('tr').removeClass('active').appendTo($('.table__hold')),
            cost = hold.find('input[data-cost]').data('cost'),
            buttons = '<a class="link__green btn__addrecycle" href="#">Добавить в корзину для оформления заказа</a><br><a href="#" class="btn__delete">Удалить</a>';
        
        hold.find('td:eq(2)').remove().end().find('.recycle-page__sum').attr('data-cost', cost).find('> span').text(cost).end().end().find('.recycle-page__actions').addClass('recycle-page__actions_hold').removeClass('.recycle-page__actions').html(buttons);
        
        calcCount();
        calcRecycle();
    });
    
    
    $('body').on('click', '.recycle-page .btn__addrecycle', function(e) {
        e.preventDefault();
        var hold = $(this).closest('tr'),
            cost = hold.find('[data-cost]').data('cost'),
            input = '<div class="recycle-page__calc"><div class="recycle-page__title">Изменить количество</div><div class="recycle-page__count"><a href="#" class="btn__recycle minus">-</a><input data-cost="' + cost + '" type="text" value="1"><a href="#" class="btn__recycle plus">+</a></div><div class="recycle-page__buttons"><a class="btn btn_mini btn_green" href="#">сохранить</a> <a class="btn btn_mini btn_silver btn_cancel" href="#">отмена</a></div></div>',
            buttons = '<a class="btn__hold" href="#">Отложить</a><br><a href="#" class="btn__delete">Удалить</a>';
        $('.table__recycle tr:last').before(hold);
        
        hold.find('td:eq(1)').remove().end().find('td:eq(0)').after('<td><div class="recycle-page__cost">' + cost + ' руб. x</div></td><td>' + input + '</td>').end().find('td:last').removeClass('recycle-page__actions_hold').addClass('recycle-page__actions').html(buttons);
                
        calcCount();
        calcRecycle();
    });
    
    
    
    $('body').on('click', '.btn__recycle', function(e) {
        
        e.preventDefault();
        var $this = $(this),
            input = $this.closest('div').find('input'),
            val = parseInt(input.val()),
            cost = input.data('cost');                                    
        if ($this.hasClass('minus')) {            
            if (val > 0) {input.val(val - 1)}
        }
        else {                                   
            input.val(val + 1);
        }
        calcRecycle();
    });
    

    $('html').mousedown(function() {
        $('.cabinet__edit').remove();
    });

    
        $(document).keypress(function (e) {
                        
            if ((e.which == 0) || (e.keyCode == 27)) {
                $('.cabinet__edit').remove();
                if ($('.recycle-page .active').length) {                    
                    $('.recycle-page').find('.active .btn_cancel').trigger('click');
                }
            }
            else if ((e.which == 13) || (e.keyCode == 13)) {
                $('.cabinet__edit').find('input[type="submit"]').trigger('click');
                if ($('.recycle-page .active').length) {                                        
                    var active = $('.recycle-page').find('.active');                                        
                    active.find('.recycle-page__buttons a:eq(0)').trigger('click');
                    active.find('input').blur();                                        
                }                
            }

        });    
    
        
    $('body').on('click', '.btn__edit', function(e) {
        //$('.cabinet__edit').remove();
        e.preventDefault();
        var type = $(this).data('type'),
            data = $(this).closest('div').find('.cabinet__data'),            
            field;
            
            
        if (type == 'city') {
            field = $('<select class="cabinet__edit_field"><option>г. Москва</option><option>г. Зеленоград</option><option>г. Урюпинск</option></select>')
            field.find(':contains(' + data.text() + ')').prop('selected', 'selected');
        }
        else if (type == 'file') {
            field = $('<input type="file" />');
        }
        else {
            field = $('<input class="cabinet__edit_field" type="text" value="' + data.text() + '" />');
        }
                
        var html = $('<div class="cabinet__edit"><form><div class="clear"><input type="submit" value="Сохранить" /><button class="fr cabinet__edit_close">Отмена</button></div></form></div>');//.css({'left': $(this).offset().left, 'top': $(this).offset().top})
                
        //$('.out').append(html);
        
        $(this).closest('.cabiten__dialog').append(html);
        
        html.on('click', '.cabinet__edit_close', function() {
            $(this).closest('.cabinet__edit').remove();
        });
        
        html.mousedown(function(e){e.stopPropagation();}).find('form').prepend(field);
        
        
        if (type == 'tel') {
            field.mask("+7 (999) 999-99-99");    
        }
                
        html.find('input[type="submit"]').focus();
            
        html.find('form').off('submit').on('submit', function(e) {
            e.preventDefault();
            var val = $(this).find('.cabinet__edit_field').val()
            if (type == 'email') {
                if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(val)) {
                    //
                }
                else {
                    $(this).find('input').addClass('error');
                    return false;
                }
            }  
            data.text(val);
            
            $(this).closest('.cabinet__edit').remove();      
        }); 
    });
    
    $('body').on('click', '.x_tabs__links a', function(e) {
        e.preventDefault();
        $(this).closest('.x_tabs').find('.selected').removeClass('selected');
        $(this).addClass('selected').closest('.x_tabs').find('.x_tabs__item:eq(' + $(this).index() + ')').addClass('selected');       
    });
});


(function($) {
        var interval = 0;
        
        var slide = function($this, direction) {            
            $this.sliderConteiner.stop(true, true);            
            if (direction === 'next') {
                $this.sliderConteiner.animate({left: '-=' + $this.slideWidth + 'px'}, 500, function() {
                    $this.sliderConteiner.find('.slider__item:first').appendTo($this.sliderConteiner);                    
                    $this.sliderConteiner.css({'left': '0'});
                });
            }
            else {
                $this.sliderConteiner.find('.slider__item:last').prependTo($this.sliderConteiner);                    
                $this.sliderConteiner.css({'left': '-' + $this.slideWidth + 'px'});
                    
                $this.sliderConteiner.animate({left: '0px'}, 500);
            }                                    
        };                
        
        
        var methods = {
            init : function( options ) {
                this.unbind('xipslider');    
                return this.each(function(){
                    var $this = $(this);
                    
                    $this.sliderConteiner = $this.find('.slider__list');
                    $this.slideItems = $this.find('.slider__item');
                    $this.slideWidth = $this.find('.slider__item:first').width();
                    $this.find('.x_slider').height($this.find('.x_slider').height());
                    
                    if ($this.slideItems.length > 4) {                        
                        $this.sliderConteiner.css({position: 'absolute'});
                        
                        $this
                            .on('click', '.slider__prev', function(e) {
                                e.preventDefault();
                                slide($this, 'prev');    
                            })
                            .on('click', '.slider__next', function(e) {
                                e.preventDefault();
                                slide($this, 'next');    
                            });
                        
                        
                        var interval = setInterval(function() {slide($this, 'next');}, 4000);
                        
                        $this
                            .on('mouseenter', function() {
                                console.log('stop');
                                clearInterval(interval);                            
                            })
                            .on('mouseleave', function() {
                                console.log('play');
                                clearInterval(interval);
                                interval = setInterval(function() {slide($this, 'next');}, 4000);
                            });                                           
                    }                                                                                                                                
                });
            }
        };
    
    
    $.fn.xipslider = function( method ) {
        if (methods[method]) {
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof method === 'object' || ! method ) {
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Метод ' +  method + ' не существует в jQuery.xipslider' );
        }
    };    
})(jQuery);

