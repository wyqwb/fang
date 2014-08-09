<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:03
 * To change this template use File | Settings | File Templates.
 */


class AD_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
		$this->load->library('session');
        date_default_timezone_set('Asia/Shanghai');
      $ids=$this->session->userdata('name');
      if(empty($ids)){
       	header("Location: ".base_url()."index.php/admin/adminlogin");
      }
    }
    //默认 return == false  也就是采用load方式，否则直接输出字符串
    final protected function header($arg=array())
    {
        $return = isset($arg['return'])?$arg['return']:false;
        $arr = isset($arg['arr'])?$arg['arr']:array();
        if($return  == true)
        {
            return $this->load->module('/admin/frames/header',$arr,$return);
        }
        else
        {
            $this->load->module('/admin/frames/header',$arr,$return);
        }
    }

    final protected function left($arg = array())
    {
        $return = isset($arg['return'])?$arg['return']:false;
        $arr = isset($arg['arr'])?$arg['arr']:array();
        if($return  == true)
        {
            return $this->load->module('/admin/frames/left',$arr,$return);
        }
        else
        {
            $this->load->module('/admin/frames/left',$arr,$return);
        }
    }

    final protected function tools($arg=array())
    {
        $return = isset($arg['return'])?$arg['return']:false;
        $arr = isset($arg['arr'])?$arg['arr']:array();
		$arr = array('arr'=>$arr);
        if($return  == true)
        {
            return $this->load->module('/admin/frames/tools',$arr,$return);
        }
        else
        {
            $this->load->module('/admin/frames/tools',$arr,$return);
        }

    }

    final protected function welcome($arg = array())
    {
        $return = isset($arg['return'])?$arg['return']:false;
        $arr = isset($arg['arr'])?$arg['arr']:array();
        if($return  == true)
        {
            return $this->load->module('/admin/frames/welcome',$arr,$return);
        }
        else
        {
            $this->load->module('/admin/frames/welcome',$arr,$return);
        }
    }

    final protected  function pub_success($msg='操作成功')
    {
        $data['msg'] = $msg;
        $this->load->view('admin/pub_success.html',$data);
    }

    final protected function confirm($url,$msg='确认')
    {
        $data['url'] = $url;
        $data['msg'] = $msg;
        $this->load->view('admin/public/public_confirm.html',$data);
    }

    final protected function footer($arg=array())
    {

    }

}