<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Index extends AD_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
		
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools',array('orgframe'=>false,'images'=>false));
        $this->load->module('/admin/frames/welcome');
    }
}