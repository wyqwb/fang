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
        <script type="text/javascript" src="/javascript/jquery.js"></script>
        <script type="text/javascript" src="/javascript/jquery.form.min.js"></script>
    </head>
    <body class="zh_CN">
        <div class="head" id="header">
            <div class="head_box">
                <div class="inner wrp">
                    <h1 class="logo"><a href="/" ></a></h1>
                    <div class="account">
                        <div class="account_meta ">
                            <span class="nickname" style="margin-right:10px"><?php echo $username ?></span>
                        </div>
                        <!-- <div id="accountArea" class="account_meta account_inbox"></div> -->
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
                        <div id="register">
                        <div class="check_box">

                        <div class="frm_tab">            
                            <div>
                                <label for="" class="frm_label" select="option">会员类型</label>
                                <div class="section_tab" type="enterprise" style="display: block;">
                                    <ul class="tab_navs">
                                        <li class="tab_nav js_op_subject  selected" default_form="personreg" toggle_tab=".js_personal" data-subject="0">
                                            <a href="javascript:void(0);">个人</a>
                                        </li>
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
                        </div>

                        <div class="upload_tips_block" id="register_form">
                            <fieldset class="frm_fieldset no_legend">          
                                <div class="frm_control_group">
                                    <label for="" class="frm_label">姓名(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="realname"  type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请输入您的真实姓名</p>
                                    </div>
                                </div>
                                
                                <div class="frm_control_group">
                                    <label for="" class="frm_label">邮箱(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="email" name="email" type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请填写您电子邮箱地址，可选填</p>
                                    </div>
                                </div>


                                <div class="frm_control_group">
                                    <label for="" class="frm_label">QQ(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="QQ"  value="" type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请输入您的QQ号码</p>
                                    </div>
                                </div>
                            

                                <div class="frm_control_group">
                                    <label for="" class="frm_label">性别(可选)</label>
                                    <div class="frm_controls">
                                        <label style="margin-right:20px"><input type="radio" type="text" name="gender" value="1" id="gender_1">男</label>
                                        <label><input type="radio" type="text" name="gender" value="0" id="gender_0">女</label>
                                    </div>
                                </div>        
                                
                                <div class="frm_control_group">
                                    <label for="" class="frm_label">微博账号(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="weibo" name="weibo" type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请填写您微博账号，以便于关注您</p>
                                    </div>
                                </div>



                                <div class="frm_control_group">
                                    <label for="" class="frm_label">手机号码</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box vcode">
                                            <input id="mobile" type="text" placeholder="" value="" class="frm_input" disabled="disabled">
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
                                    <label for="" class="frm_label">学历(可选)</label>
                                    <div class="frm_controls">
                                        <span>
                                              <select name="education" id="education" class="dropdown_data_item ">
                                                <option></option>
                                                <option>大专</option>
                                                <option>本科</option>
                                                <option>研究生</option>
                                                <option>博士</option>
                                                <option>博士后</option>
                                              </select>
                                        </span>
                                        <p class="frm_tips">请填写您微博账号，以便于关注您</p>
                                    </div>
                                </div>



                                <div class="frm_control_group no_cut">
                                    <label for="" class="frm_label">城市(可选)</label>
                                    <div class="frm_controls">
                                    <div id="location">
                                         <select id="pro" name="pro" class="dropdown_data_item " >
                                          <option>-请选择-</option>
                                            <option>北京市</option>
                                            <option>上海市</option>
                                            <option>天津市</option>
                                            <option>重庆市</option>
                                            <option>河北省</option>
                                            <option>山西省</option>
                                            <option>内蒙古自治区</option>
                                            <option>辽宁省</option>
                                            <option>吉林省</option>
                                            <option>黑龙江省</option>
                                            <option>江苏省</option>
                                            <option>浙江省</option>
                                            <option>安徽省</option>
                                            <option>福建省</option>
                                            <option>江西省</option>
                                            <option>山东省</option>
                                            <option>河南省</option>
                                            <option>湖北省</option>
                                            <option>湖南省</option>
                                            <option>广东省</option>
                                            <option>广西壮族自治区</option>
                                            <option>海南省</option>
                                            <option>四川省</option>
                                            <option>贵州省</option>
                                            <option>云南省</option>
                                            <option>西藏自治区</option>
                                            <option>陕西省</option>
                                            <option>甘肃省</option>
                                            <option>宁夏回族自治区</option>
                                            <option>青海省</option>
                                            <option>新疆维吾尔族自治区</option>
                                            <option>香港特别行政区</option>
                                            <option>澳门特别行政区</option>
                                            <option>台湾省</option>
                                            <option>其它</option>
                                        </select>
                                        <select id="city" name="city" class="input w130">
                                          <option></option>
                                          <option>请选择城市</option>
                                        </select>
                                    </div>
                                        <p class="frm_tips">选择您所在地</p>
                                    </div>
                                </div>

                                <div class="frm_control_group">
                                    <label for="" class="frm_label">职业(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="job" name="job" type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请填写您当前的职位</p>
                                    </div>
                                </div>

                                <div class="frm_control_group">
                                    <label for="" class="frm_label">联系地址(可选)</label>
                                    <div class="frm_controls">
                                        <span class="frm_input_box">
                                            <input id="personal_location" name="personal_location" type="text" placeholder="" class="frm_input">
                                        </span>
                                        <p class="frm_tips">请填写您个人联系地址，可选填</p>
                                    </div>
                                </div>

                            </fieldset>
                        
                            <div class="tool_bar tc border with_form">
                                <span class="btn btn_primary btn_input">
                                    <button type="submit" onclick="dogoon()">继续</button>
                                </span>
                            </div>

                        </div>
                </div>
                </div>
                </div>
        </div>
    </div>
</div>
<script type="text/javascript">

//----------------------------------
try{  
    var sf=new Array();  
    sf[0]=new Array("北京市","东城|西城|崇文|宣武|朝阳|丰台|石景山|海淀|门头沟|房山|通州|顺义|昌平|大兴|平谷|怀柔|密云|延庆");   
    sf[1]=new Array("上海市","黄浦|卢湾|徐汇|长宁|静安|普陀|闸北|虹口|杨浦|闵行|宝山|嘉定|浦东|金山|松江|青浦|南汇|奉贤|崇明");   
    sf[2] = new Array("天津市","和平|东丽|河东|西青|河西|津南|南开|北辰|河北|武清|红挢|塘沽|汉沽|大港|宁河|静海|宝坻|蓟县");  
    sf[3] = new Array("重庆市","万州|涪陵|渝中|大渡口|江北|沙坪坝|九龙坡|南岸|北碚|万盛|双挢|渝北|巴南|黔江|长寿|綦江|潼南|铜梁 |大足|荣昌|壁山|梁平|城口|丰都|垫江|武隆|忠县|开县|云阳|奉节|巫山|巫溪|石柱|秀山|酉阳|彭水|江津|合川|永川|南川");  
    sf[4] = new Array("河北省","石家庄|邯郸|邢台|保定|张家口|承德|廊坊|唐山|秦皇岛|沧州|衡水");  
    sf[5] = new Array("山西省","太原|大同|阳泉|长治|晋城|朔州|吕梁|忻州|晋中|临汾|运城");  
    sf[6] = new Array("内蒙古自治区","呼和浩特|包头|乌海|赤峰|呼伦贝尔盟|阿拉善盟|哲里木盟|兴安盟|乌兰察布盟|锡林郭勒盟|巴彦淖尔盟|伊克昭盟");  
    sf[7] = new Array("辽宁省","沈阳|大连|鞍山|抚顺|本溪|丹东|锦州|营口|阜新|辽阳|盘锦|铁岭|朝阳|葫芦岛");  
    sf[8] = new Array("吉林省","长春|吉林|四平|辽源|通化|白山|松原|白城|延边");  
    sf[9] = new Array("黑龙江省","哈尔滨|齐齐哈尔|牡丹江|佳木斯|大庆|绥化|鹤岗|鸡西|黑河|双鸭山|伊春|七台河|大兴安岭");  
    sf[10] = new Array("江苏省","南京|镇江|苏州|南通|扬州|盐城|徐州|连云港|常州|无锡|宿迁|泰州|淮安");  
    sf[11] = new Array("浙江省","杭州|宁波|温州|嘉兴|湖州|绍兴|金华|衢州|舟山|台州|丽水");  
    sf[12] = new Array("安徽省","合肥|芜湖|蚌埠|马鞍山|淮北|铜陵|安庆|黄山|滁州|宿州|池州|淮南|巢湖|阜阳|六安|宣城|亳州");  
    sf[13] = new Array("福建省","福州|厦门|莆田|三明|泉州|漳州|南平|龙岩|宁德");  
    sf[14] = new Array("江西省","南昌市|景德镇|九江|鹰潭|萍乡|新馀|赣州|吉安|宜春|抚州|上饶");  
    sf[15] = new Array("山东省","济南|青岛|淄博|枣庄|东营|烟台|潍坊|济宁|泰安|威海|日照|莱芜|临沂|德州|聊城|滨州|菏泽");  
    sf[16] = new Array("河南省","郑州|开封|洛阳|平顶山|安阳|鹤壁|新乡|焦作|濮阳|许昌|漯河|三门峡|南阳|商丘|信阳|周口|驻马店|济源");  
    sf[17] = new Array("湖北省","武汉|宜昌|荆州|襄樊|黄石|荆门|黄冈|十堰|恩施|潜江|天门|仙桃|随州|咸宁|孝感|鄂州");  
    sf[18] = new Array("湖南省","长沙|常德|株洲|湘潭|衡阳|岳阳|邵阳|益阳|娄底|怀化|郴州|永州|湘西|张家界");  
    sf[19] = new Array("广东省","广州|深圳|珠海|汕头|东莞|中山|佛山|韶关|江门|湛江|茂名|肇庆|惠州|梅州|汕尾|河源|阳江|清远|潮州|揭阳|云浮");  
    sf[20] = new Array("广西壮族自治区","南宁|柳州|桂林|梧州|北海|防城港|钦州|贵港|玉林|南宁地区|柳州地区|贺州|百色|河池");  
    sf[21] = new Array("海南省","海口|三亚");  
    sf[22] = new Array("四川省","成都|绵阳|德阳|自贡|攀枝花|广元|内江|乐山|南充|宜宾|广安|达川|雅安|眉山|甘孜|凉山|泸州");  
    sf[23] = new Array("贵州省","贵阳|六盘水|遵义|安顺|铜仁|黔西南|毕节|黔东南|黔南");  
    sf[24] = new Array("云南省","昆明|大理|曲靖|玉溪|昭通|楚雄|红河|文山|思茅|西双版纳|保山|德宏|丽江|怒江|迪庆|临沧");  
    sf[25] = new Array("西藏自治区","拉萨|日喀则|山南|林芝|昌都|阿里|那曲");  
    sf[26] = new Array("陕西省","西安|宝鸡|咸阳|铜川|渭南|延安|榆林|汉中|安康|商洛");  
    sf[27] = new Array("甘肃省","兰州|嘉峪关|金昌|白银|天水|酒泉|张掖|武威|定西|陇南|平凉|庆阳|临夏|甘南");  
    sf[28] = new Array("宁夏回族自治区","银川|石嘴山|吴忠|固原");  
    sf[29] = new Array("青海省","西宁|海东|海南|海北|黄南|玉树|果洛|海西");  
    sf[30] = new Array("新疆维吾尔族自治区","乌鲁木齐|石河子|克拉玛依|伊犁|巴音郭勒|昌吉|克孜勒苏柯尔克孜|博尔塔拉|吐鲁番|哈密|喀什|和田|阿克苏");  
    sf[31] = new Array("香港特别行政区","香港特别行政区");  
    sf[32] = new Array("澳门特别行政区","澳门特别行政区");  
    sf[33] = new Array("台湾省","台北|高雄|台中|台南|屏东|南投|云林|新竹|彰化|苗栗|嘉义|花莲|桃园|宜兰|基隆|台东|金门|马祖|澎湖");  
    sf[34] = new Array("其它","北美洲|南美洲|亚洲|非洲|欧洲|大洋洲");   
}catch(e){  
    alert(e);     
}  

$(document).ready(function(e) {  
    $("#pro").change(function(){  
        try{  
            var pro=$(this).val();  
            var i,j,tmpcity=new Array();  
            for(i=0;i<sf.length;i++){  
                if(pro==sf[i][0].toString()){  
                    tmpcity=sf[i][1].split("|");  
                    $("#city").html("");  
                    for(j=0;j<tmpcity.length;j++){  
                        $("#city").append("<option>"+tmpcity[j]+"</option>");     
                    }  
                }  
            }  
        }catch(e){  
            alert(e);     
        }  
    });  
});  

//---------------------------------------------------------

function dogoon(){
        //选填项
        var otherregstr="";
        if($("#realname").val()!=""){otherregstr+="|realname="+$("#realname").val()}
        if($("#email").val()!=""){otherregstr+="|email="+$("#email").val()}
        if($("#QQ").val()!=""){otherregstr+="|QQ="+$("#QQ").val()}
        if($('input:radio:checked').val()!=null){otherregstr+="|gender="+$('input:radio:checked').val()}
        if($("#weibo").val()!=""){otherregstr+="|weibo="+$("#weibo").val()}
        if($("#mobile").val()!=""){otherregstr+="|mobile="+$("#mobile").val()}
        if($("#education").val()!=""){otherregstr+="|education="+$("#education").val()}
        if($("#city").val()!=""){otherregstr+="|city="+$("#city").val()}
        if($("#job").val()!=""){otherregstr+="|job="+$("#job").val()}
        if($("#mobile").val()!=""){otherregstr+="|mobile="+$("#mobile").val()}                               
        if($("#personal_location").val()!=""){otherregstr+="|personal_location="+$("#personal_location").val()}            
        if(otherregstr!="")otherregstr+="|";

        var resault = $.ajax({
                url: "/reg/docompleteact/",
                data: {'accountype':'normal','otherregstr':otherregstr},
                async: false,
                type: 'post'
        });
        //alert(resault.responseText)  ;  
        if (resault.responseText == "-1") {
                alert("注册失败，请重新完成");
                return false;
            }
            if (resault.responseText == "1") {
                window.location.href = '/member/';
            }
    }
</script>
</body> 
</html>
 

