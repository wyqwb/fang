/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-23
 * Time: 下午5:58
 * To change this template use File | Settings | File Templates.
 */
jQuery.File={};
$.extend($.File,{
    imageOpened:false,
    imageHtml:"<div class='FPo_popup' id='jsFragmentsPhotoManagement'>"+
            "<div class='lfloat conrig-top jshander' >"+
                "<div class='lfloat rig-title'><span>附件管理</span>"+
                    "<div class='Fil_wclose'></div>"+
                    "<div class='Fil_wmini'></div>"+
                "</div>"+
            "</div>"+
            "<div class='Fil_conleft lfloat'>"+
                "<div class='Fil_lefttitle'>" +
                    "<a class='lfloat' href=''><span class='modletip2 Fil_crefile'></span>创建文件夹</a>" +
                    "<span class='rfloat'>" +
                        "<a href='#'><img src='/images/admin/file3.png' /></a>" +
                        "<a href='#'><img src='/images/admin/file1.png' /></a>" +
                        "<a href='#'><img src='/images/admin/file2.png' /></a>" +
                    "</span>"+
                "</div>"+
                "<div class='Fil_cata'>"+
                "<ul>"+
                    "<li>"+
                        "<a href=''><span class='nav-list catabg'></span>ddd</a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/destroy.png' /></a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/rename.png' /></a>"+
                    "</li>"+
                    "<li>"+
                        "<a href=''><span class='nav-list catabg'></span>图片</a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/destroy.png' /></a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/rename.png' /></a>"+
                    "</li>"+
                    "<li>"+
                        "<a href=''><span class='Fil_jpg catabg'></span>djfksdfd.jpg</a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/destroy.png' /></a>"+
                        "<a href='' class='rfloat hovershow'><img src='/images/admin/rename.png' /></a>"+
                    "</li>"+
                "</ul>"+
             "</div>"+
        "</div>"+
        "<div class='Fil_conright lfloat'>"+
            "<div class='Fil_rtop'><div class='Fil_upload lfloat' style='position:relative;'><form id='jsFileManagementFileForm'><input style='position:absolute;width:79px;height:26px;left:0px;top:0px;opacity:0;' type='file' name='filemanagementfile' id='jsFileManagementFile' /></form><span class='navtip5 Fil_upbg'></span>上传文件</div><div class='Fil_upload lfloat'><input type='checkbox' /> 调整后上传</div></div>"+
            "<div class='Fil_fileshow'>"+
            "<div class='Fil_ftip'><span class='nav-list'></span></div>"+
            "<div>"+
                "<div class='Fil_imglist'><img src='/images/admin/noimg.png' /></div>"+
                "<div class='Fil_imglist'><img src='/images/admin/noimg.png' /></div>"+
            "</div>"+
        "</div>"+
    "</div>"+
        "<div class='FPo_footer'><div class='lfloat'>ssssss</div><div class='rfloat FPo_big'></div></div>"+
    "</div>",
    //图片管理器初始化事件
    imageEventConstruct:function()
    {
        $('#jsFileManagementFile').change(function(){
            $('#jsFileManagementFileForm').ajaxForm({
                url:'',
                success:function()
                {

                }
            });
        });
    },
    //格式化图片管理器
    imageInit:function()
    {
        if(this.imageOpened == false)
        {
            this.imageOpened = true;
            var html = this.imageHtml,
                body = document.getElementsByTagName('body')[0];
            $(body).append(html);
            $("#jsFragmentsPhotoManagement").draggable({handle:"div.jshander"});
            this.imageEventConstruct();
        }

    }
});
$.extend($.fn,{
    openImageManagement:function()
    {
        this.each(function(){
            $(this).click(function(){
                if($.File.imageOpened == false)
                {
                    $.File.imageInit();
                }
            });
        });
    }
});