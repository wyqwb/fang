<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-8
 * Time: 下午2:27
 * To change this template use File | Settings | File Templates.
 */
GLOBAL $URI;
$segment1 = $URI->segment(1);
//判断需要载入的 基类
if($segment1 == 'admin')
{
    if(file_exists(APPPATH.'core/AD_Module.php'))
    {
        require(APPPATH.'core/AD_Module.php');
    }
    else
    {
        log_message('warning', 'Can not require the self controller.php in '.APPPATH.'core/MY_Module.php');
    }
}