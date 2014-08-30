<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-8
 * Time: 下午3:30
 * To change this template use File | Settings | File Templates.
 */
class AD_Module extends CI_Module
{
    //客户端语言
    public $lang='';
    public function __construct()
    {
        parent::__construct();

        GLOBAL $CFG;
        $this->lang = $CFG->item('language');
        $this->load->helper('resource');
    }
}