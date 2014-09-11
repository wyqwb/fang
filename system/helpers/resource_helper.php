<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-21
 * Time: 下午3:47
 * To change this template use File | Settings | File Templates.
 */

//载入资源的 帮助函数
if(!function_exists('load_resource'))
{
    /**
     * 资源载入辅助函数
     * @
     */
    function load_resource($source,$return=FALSE,$abs=FALSE)
    {
        if(!is_string($source) || $source =='')
        {
            return;
        }
        $type = strtolower(end(explode('.',$source)));
        GLOBAL $CFG;
        $base_url = $CFG->base_url();
        $str = '';
        if($type=='css')
        {
            $str = "<link type='text/css' rel='stylesheet' href='".$base_url."css/".$source."' />";
        }
        else if($type=='js')
        {
            if($abs == FALSE)
            {
                $str = "<script type='text/javascript' src='".$base_url."javascript/".$source."'></script>";
            }
            else
            {
                $str = "<script type='text/javascript' src='".$source."'></script>";
            }
        }
        if($return  == FALSE)
        {
            echo $str;
        }
        else
        {
            return $str;
        }
    }
}