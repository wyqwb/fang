<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:03
 * To change this template use File | Settings | File Templates.
 */
GLOBAL $URI;
$segment1 = $URI->segment(1);
//判断需要载入的 基类
if($segment1 == 'admin')
{
    if(file_exists(APPPATH.'core/AD_Controller.php'))
    {
        require(APPPATH.'core/AD_Controller.php');
    }
    else
    {
        log_message('warning', 'Can not require the self controller.php in '.APPPATH.'core/MY_Controller.php');
    }
}
else
{
	if(file_exists(APPPATH.'core/Front_Controller.php'))
    {
        require(APPPATH.'core/Front_Controller.php');
    }
    else
    {
        log_message('warning', 'Can not require the self controller.php in '.APPPATH.'core/MY_Controller.php');
    }
	if(file_exists(APPPATH.'core/FrontMember_Controller.php'))
    {
        require(APPPATH.'core/FrontMember_Controller.php');
    }
    else
    {
        log_message('warning', 'Can not require the self controller.php in '.APPPATH.'core/MY_Controller.php');
    }
}

