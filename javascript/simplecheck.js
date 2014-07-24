$(document).ready(function(){
    /*  $('#js_notnull').focus(function(){
     $(this).popover('show');
     });*/
    $('.js_notnull').each(function(){
        $(this).focus(function(){
            $(this).popover('show');
        });
    });
    $('#jsSelect').click(function(){
        $(this).removeClass('error');
    });
    $('.js_notnull').click(function(){
        $(this).removeClass('error');
    });
    $('.js_needcheck').submit(function(){
        var result = true;
        var selectval = $('#jsSelect').val();
        if(selectval == 0)
        {
            result = false;
            $('#jsSelect').addClass('error');
        }
        else
        {
            result = true;
            $('#jsSelect').removeClass('error');
        }
        $(this).find('.js_notnull').each(function(){
            var val = $(this).attr('value');
            if(val == '')
            {
                result = false;
                $(this).addClass('error');
            }
            else
            {
                $(this).removeClass('error');
            }
        });
        if(result == false)
        {
            return false;
        }
        else{return true;}
    });
});
