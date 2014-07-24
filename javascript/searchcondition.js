/**
 * Created by Administrator on 14-3-21.
 */
$(document).ready(function(){
    var searchcondition = $('#jssearchcondition'),
        searchclose = searchcondition.find('div.close'),
        itembuttons = searchcondition.find('span.searchitem input'),
        jshiddensearchcondition = $('#jshiddensearchcondition'),
        jssearchtitlecontainer = $('#jssearchtitlecontainer'),
        jssearchform = $('#jssearchform'),
        jssearchkey = $('#jssearchkey');
    jssearchform.submit(function(){
        if(jssearchkey.val() == '')
        {
            return false;
        }
    });
    searchcondition.find('div.close').click(function(e){
        e.stopPropagation();
        searchcondition.css('display','none');
    });
    $('#jsopensearch').click(function(){
        searchcondition.show();
    });
    searchclose.click(function(){
        searchcondition.hide();
    });
    var filterSearchCondition = function()
    {
        var newval = '';
        jssearchtitlecontainer.find('input').each(function(){
            var val = $(this).attr('condition');
            newval += val+'_';
        });
        jshiddensearchcondition.attr('value',newval);
    }
    itembuttons.each(function(){
        $(this).click(function(){
            var field = $(this).attr('field'),
                undefined,
                value = $(this).attr('value'),
                check = $(this).attr('check');
            if(check == undefined || check == 'false')
            {
                var ospan = document.createElement('span');
                $(ospan).append("<input type='button' value='"+value+"'><a><img src='images/admin/selclose.png' /></a>");
                $(ospan).addClass('starget');
                jssearchtitlecontainer.append(ospan);
                $(ospan).find('img').eq(0)[0].target = this;
                $(ospan).find('input').attr('condition',field);
                $(this).attr('check','true');
                filterSearchCondition();
                $(ospan).find('img').click(function(){
                    var target = this.target;
                    $(ospan).remove();
                    $(target).attr('check','false');
                    filterSearchCondition();
                });
            }
        });
    });
});