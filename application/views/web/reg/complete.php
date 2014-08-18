<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>房产平台</title>
        <link rel="stylesheet" type="text/css" href="/css/layout_head1f56cd.css"/>
        <link rel="stylesheet" type="text/css" href="/css/base1fbb65.css"/>
        <link rel="stylesheet" type="text/css" href="/css/lib1ec5f7.css"/>        
        <link rel="stylesheet" href="/css/page_register1ef84c.css">
        <link rel="stylesheet" href="/css/upload1f8f05.css">
<!-- <link rel="stylesheet" type="text/css" href="https://res.wx.qq.com/c/=/mpres/htmledition/style/widget/datepicker1ec663.css,/mpres/htmledition/style/biz_web/widget/dropdown1fb191.css,/mpres/htmledition/style/widget/verifycode1ec5f7.css,/mpres/htmledition/style/widget/processor_bar1ec663.css" /> -->
 
    </head>
    <body class="zh_CN">
        <div class="head" id="header">
            <div class="head_box">
                <div class="inner wrp">
                    <h1 class="logo"><a href="/" ></a></h1>
                    <div class="account">
                        <div class="account_meta account_info">
                            <span class="nickname"><?php echo $username ?></span>
                            <!-- <span class="type_wrp">会员信息完善...</span> -->
                        </div>
                        <div id="accountArea" class="account_meta account_inbox"></div>
                        <div class="account_meta account_logout"><a id="logout" href="/member/outlogin">[退出]</a></div>
                    </div>
                </div>
            </div> 
        </div>

        <div id="body" class="body page_simple ">
            <div class="container_box">                
                        <div class="col_main">
                            <div class="main_bd">
                                <div id="stepItems"></div>
                                <div id="register"><div class="check_box">

            <div class="frm_tab">            
            <div>
                <label for="" class="frm_label" select="option">会员类型</label>
                <div class="section_tab" type="enterprise" style="display: block;">
                    <ul class="tab_navs">
                        <?php if($accoutype!="normal") {?>
                        <li class="tab_nav js_op_subject  selected" default_form="entreg" toggle_tab=".js_organization" data-subject="1">
                            <a href="javascript:void(0);">企业</a>
                        </li>
                        <?php }else {?>    
                        <li class="tab_nav js_op_subject  selected" default_form="personreg" toggle_tab=".js_personal" data-subject="0">
                            <a href="javascript:void(0);">个人</a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="frm_tab_split" style="margin-bottom:20px;">
                    <div class="arrow_stop" style="left: 125px;">
                        <span class="arrow arrow_out"></span>
                        <span class="arrow arrow_extra"></span>
                        <span class="arrow arrow_in"></span>
                    </div>
                </div>
            </div>

<!--             <label for="" class="frm_label" select="option">类型</label>
            
            <div class="js_top_tab js_organization" style="">
                <div class="frm_controls" type="enterprise" style="display: block;">
                    <div class="button_group">
                        <a class="btn btn_default js_style_type selected" data-type="3" form="govreg" href="javascript:;">
                            企业</a>
                    </div>
                </div>

            </div> -->
            
            <div class="js_top_tab js_personal" style="display: none;">
                <div class="frm_controls" type="enterprise" style="display: block;">
                    <div class="button_group">
                        <a class="btn btn_default js_style_type " data-type="0" form="personreg" href="javascript:;">
                            个人                        </a>
                    </div>
                </div>
                <div style="display:none" class="frm_tab_split"></div>
            </div>
        </div>
        <div class="upload_tips_block" id="register_form">

        <form action="/member/" class="form" id="personreg" novalidate="novalidate">
        <fieldset class="frm_fieldset no_legend">
            <input type="hidden" name="action" value="personal_realname_set">
            
            <div class="frm_control_group">
                <label for="" class="frm_label">身份证姓名</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="name" name="name" value="" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">如果名字包含分隔号“·”，请勿省略。</p>
                </div>
            </div>
            
            <div class="frm_control_group">
                              <label for="" class="frm_label">身份证号码</label>
                              <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="identity_card" name="identity_card" value="" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">请输入您的身份证号码</p>
                </div>
            </div>
            <div class="frm_control_group no_cut">
                <label for="" class="frm_label">证件照片</label>
                <div class="frm_controls" id="js_fix_idcard" style="zoom: 1;">
                    <div class="upload_box has_demo">
                        <div id="register_file_preview" class="upload_demo">
                            <img id="" src="/images/pic_id_preview_04.jpg" alt="参考示例">
                            <strong>参考示例</strong>
                        </div>
                        <p class="upload_tips">
                        身份证上的所有信息清晰可见，必须能看清证件号。<br>
                        照片需免冠，建议未化妆，手持证件人的五官清晰可见。<br>
                        照片内容真实有效，不得做任何修改。<br>
                        支持.jpg .jpeg .bmp .gif格式照片，大小不超过2M。                        </p>
                        <span class="upload_area">
                            <a href="javascript:;" id="idcard_copy_id" class="btn btn_upload js_select_file" width="106" height="32">选择文件</a>
                        <ul class="upload_file_box" style="display: none;"></ul><object type="application/x-shockwave-flash" data="/images/uploadify1f0e45.swf" width="100%" height="100%" id="idcard_copy_idUploader" style="zoom: 0;"><param name="quality" value="high"><param name="wmode" value="opaque"><param name="allowScriptAccess" value="always"><param name="flashvars" value="uploadifyID=idcard_copy_id&amp;pagepath=/acct/&amp;script=https%3A%2F%2Fmp.weixin.qq.com%2Fcgi-bin%2Ffiletransfer%3Faction%3Dpreview%26f%3Djson%26ticket_id%3Dgh_73829e0b4a76%26ticket%3Dc0ad60c9d29e75490dcc8e5fdbf3606076125ce0%26token%3D%26lang%3Dzh_CN&amp;folder=uploads&amp;width=106&amp;height=32&amp;wmode=opaque&amp;method=POST&amp;queueSizeLimit=5&amp;simUploadLimit=1&amp;hideButton=true&amp;auto=true&amp;fileDataName=file&amp;queueID=fileQueue"></object></span>
                        <div>
                        <input type="hidden" name="idcard_copy_id" value="" id="idcard_copy_id_hidden">
                        </div>
                        <p id="idcard_copy_id_preview" class="upload_preview">
                            
                        </p>
                    </div>
                </div>
            </div>           
            
            <div class="frm_control_group">
                <label for="" class="frm_label">手机号码</label>
                <div class="frm_controls">
                    <span class="frm_input_box vcode">
                        <input id="mobile" name="mobile" type="text" placeholder="" value="" class="frm_input" disabled="disabled">
                    </span>
                    <a href="javascript:;" id="sendmobile" class="btn btn_disabled btn_vcode btn_default" disabled="disabled">获取验证码</a>
                    <p class="frm_tips">请输入您的手机号码</p>
                </div>
            </div>
            
            <div class="frm_control_group">
                <label for="" class="frm_label">短信验证码</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="verify_code" name="verify_code" type="text" placeholder="" class="frm_input" disabled="disabled">
                    </span>
                    <p class="frm_tips">填写手机短信收到的6位验证码</p>
                </div>
            </div>
            <div class="frm_control_group no_cut">
                <label for="" class="frm_label">城市</label>
                <div class="frm_controls">
                <div id="location"><div id="js_country4038" style="" class="dropdown_menu"><a href="javascript:;" class="btn dropdown_switch jsDropdownBt"><label class="jsBtLabel">国家</label><i class="arrow"></i></a>

                    <ul class="dropdown_data_list jsDropdownList" style="display: none;">          
                        <li class="dropdown_data_item ">  
                            <a onclick="return false;" href="javascript:;" class="jsDropdownItem" data-value="1017" data-index="0" data-name="中国">中国</a>
                        </li>   
                    </ul>
                </div>
                    <div id="js_province2188" style="display:none"></div>
                    <div id="js_city8192" style="display:none"></div>
                </div>
                <div>
                        <input id="country" type="hidden" name="country">
                        <input id="province" type="hidden" name="province">
                        <input id="city" type="hidden" name="city">
                </div>
                <p class="frm_tips">选择您所在地</p>
                </div>

            </div>

            <div class="frm_control_group">
                <label for="" class="frm_label">固定电话</label>
                <div class="frm_controls">
                    <span class="frm_input_box zone"><input id="telephone1" name="telephone1" type="text" placeholder="" class="frm_input"></span>
                    <span class="frm_input_box phone"><input id="telephone2" name="telephone2" type="text" placeholder="" class="frm_input"></span>
                    <p class="frm_tips">请输入您的固定电话号码：区号-电话号码</p>
                </div>
            </div>
            
            <div class="frm_control_group">
                <label for="" class="frm_label">单位名称</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="company" name="company" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">请填写您所在单位的名称</p>
                </div>
            </div>

            <div class="frm_control_group">
                <label for="" class="frm_label">职务</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="job" name="job" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">请填写您当前的职位</p>
                </div>
            </div>

            <div class="frm_control_group">
                <label for="" class="frm_label">个人住址(可选)</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="personal_location" name="personal_location" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">请填写您当前的个人住址，可选填</p>
                </div>
            </div>

            <div class="frm_control_group">
                <label for="" class="frm_label">单位地址(可选)</label>
                <div class="frm_controls">
                    <span class="frm_input_box">
                        <input id="company_location" name="company_location" type="text" placeholder="" class="frm_input">
                    </span>
                    <p class="frm_tips">请填写您所在单位的地址，可选填</p>
                </div>
            </div>
        </fieldset>
        
        <div class="tool_bar tc border with_form">
            <span class="btn btn_primary btn_input">
                <button type="submit">继续</button>
            </span>
        </div>
    </form>

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body> 
</html>
 

