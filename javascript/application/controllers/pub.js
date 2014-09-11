/**
 * Created by apple on 14-6-25.
 */
$.createController('Pub');
$.extend(Pub,{
    'C_defaultWinOpen':function(){
        $('.jsopen').each(function(){
            $(this).click(function(){
                var type = $(this).attr('type');
                if(type == 'iframe')
                {
                    window.top.window.Desk.openIframe(this);
                }
            });
        });
    }
});
$.doController('Pub',true);