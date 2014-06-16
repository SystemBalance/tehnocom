$(function() {
    $('.product-detail__pics').find('li:first a').addClass('selected');
    
    $('body').on('click', '.product-detail__pics li a', function(e) {
        e.preventDefault();
        var body = $(this).closest('.product-detail__pics');
        body.find('.selected').removeClass('selected');
        $(this).addClass('selected');              
        body.find('.product-detail__image img').attr('src', $(this).attr('href'));  
    });    
    

    $('.recycle-page input').mask("9?" + "9".repeat(3), { placeholder: ""}).on('focus', function(e) {
        console.log($(this).closest('tr').hasClass('active'));
//        $(this).closest('td').mousedown(function(e){e.stopPropagation();});             
        if ($(this).closest('tr').hasClass('active')) {
            $(this).closest('td').mousedown(function(e){e.stopPropagation();});
            //$(this).closest('tr').addClass('active');               
        }
        else {
            //$(this).closest('td').mousedown(function(e){e.stopPropagation();});
            $(this).closest('tr').addClass('active');    
        }           
//        $(this).closest('tr').addClass('active');     
        
    });
    

    
    
    var calcRecycle = function() {
        var sum = 0;
        $('.recycle-page table input').each(function() {
            var val = parseInt($(this).val()),
                cost = parseInt($(this).data('cost')); 
            sum += val*cost;            
        });
        $('.recycle-page__itogo_sum span').text(sum);
    };
    
    $('body').on('click', '.recycle-page .btn__delete', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        calcRecycle();
    });    
    
    $('body').on('click', '.btn__recycle', function(e) {
        
        e.preventDefault();
        var $this = $(this),
            input = $this.closest('div').find('input'),
            val = parseInt(input.val()),
            cost = input.data('cost');
            console.log($this.closest('td'));
            //$this.closest('td').mousedown(function(e){e.stopPropagation();});            
        if ($this.hasClass('minus')) {            
            if (val > 0) {
                input.closest('tr').find('.recycle-page__sum span').text((val - 1) * cost);
                input.val(val - 1)
            }
        }
        else {            
            input.closest('tr').find('.recycle-page__sum span').text((val + 1) * cost);           
            input.val(val + 1);
        }
        calcRecycle();
    });
    
    $('html .recycle-page table .recycle-page__calc').mousedown(function(e) {        
        if ($(this).closest('tr').hasClass('active')) {
            e.stopPropagation();            
        }
    });
    $('html').mousedown(function() {
        $('.cabinet__edit').remove();  
        $('.recycle-page table .active').removeClass('active');              
    });
    
        
    $('body').on('click', '.btn__edit', function(e) {
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
                
        var html = $('<div class="cabinet__edit"><form><div><input type="submit" value="Сохранить" /></div></form></div>').css({'left': $(this).offset().left, 'top': $(this).offset().top});
                
        $('.out').append(html);
        
        html.mousedown(function(e){e.stopPropagation();}).find('form').prepend(field);
        if (type == 'tel') {
            field.mask("+7 (999) 999-99-99");    
        }
                    
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
});