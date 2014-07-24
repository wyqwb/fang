$(document).ready(function(){
    var mylight = new YY.LightBox();
    $('.jsLightControl').each(function(){
        $(this).click(function(){
            var title = $(this).attr('title'),
                foot  = $(this).attr('foot'),
                action = $(this).attr('action');
            mylight.create({
                'width':'970px',
                'title':title,
                'foot':foot,
                'href':action
            });
        });
    });
});