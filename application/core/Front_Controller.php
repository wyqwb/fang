<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		if (!isset($this->session)) $this->load->library('session');
		$this->load->helper('url');
		date_default_timezone_set('Asia/Shanghai');
	}
	
	
	//公用模块顶部导航
	final protected function front_header($where='')
	{
		$data['where'] = $where;
		$this->load->view('web/public/header.php',$data);
	}
	//公用模块底部导航
	final protected function front_footer()
	{
		$this->load->view('web/public/footer.php');
	}
	
	//公用成功模块
	final protected function front_success($arg=array())
	{
		$data['title'] = isset($arg['title'])?$arg['title']:'';
		$data['content'] = isset($arg['content'])?$arg['content']:'';
		$data['link'] = isset($arg['link'])?$arg['link']:'';
		$data['backtitle'] = isset($arg['backtitle'])?$arg['backtitle']:'';
		$this->load->view('web/public/front_success',$data);
	}
	//公用失败模块
	final protected function front_error($arg=array())
	{
		$data['title'] = isset($arg['title'])?$arg['title']:'';
		$data['content'] = isset($arg['content'])?$arg['content']:'';
		$data['link'] = isset($arg['link'])?$arg['link']:'';
		$data['backtitle'] = isset($arg['backtitle'])?$arg['backtitle']:'';
		$this->load->view('web/public/front_error',$data);
	}
	
}