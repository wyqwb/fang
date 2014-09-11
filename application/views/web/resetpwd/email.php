<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url();?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name='keywords' content='' />
        <meta name='description' content='' />
        <link href="css/base.css" rel="stylesheet" type="text/css" />
        <title>上海致上信息科技有限公司</title>
    </head>

    <body>
      <div class="body_wrap">
          <div class="resetpwd">
                  <div class="resetpwdtop" >您的电子邮件地址</div>
                  <div class="resetpwdmid1" >
                  <form action="/resetpwd/sended/">
                  请输入您的用户名或电子邮件地址来重新激活密码。<br>
                  <input type="text" ><br>
                  <div class="smallbutton">
                  <input type="submit" style="width:80px" value="提交"></div>
                  <div class="smallbutton">
                  <input type="button" style="width:80px" value="返回" onclick="javascript:history.go(-1)"></div>
                  </form>
                  </div>
          </div>
      </div>
    </body>
</html>