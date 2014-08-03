<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class FrontMember_Controller extends CI_Controller
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
	protected function front_header()
	{
		//$data["member"] = $this->mpublic->getRow('member','',array('Id'=>$this->session->userdata('userid')));
		//$data['member']['point'] = round($data['member']['point']);
		//$this->load->view('web/member/header.php',$data);
		$this->load->view('web/member/header.php');
	}
	//公用模块底部导航
	protected function front_footer()
	{
		$this->load->view('web/member/footer.php');
	}
	
	//公用模块底部导航
	protected function front_left()
	{
		$this->load->view('web/member/left.php');
	}

	protected function front_left_normal()
	{
		$this->load->view('web/member/left_normal.php');
	}
	
	//公用成功模块
	protected function front_success($arg=array())
	{
		$data['title'] = isset($arg['title'])?$arg['title']:'';
		$data['content'] = isset($arg['content'])?$arg['content']:'';
		$data['link'] = isset($arg['link'])?$arg['link']:'';
		$data['backtitle'] = isset($arg['backtitle'])?$arg['backtitle']:'';
		$this->load->view('web/member/front_success',$data);
	}
	//公用失败模块
	protected function front_error($arg=array())
	{
		$data['title'] = isset($arg['title'])?$arg['title']:'';
		$data['content'] = isset($arg['content'])?$arg['content']:'';
		$data['link'] = isset($arg['link'])?$arg['link']:'';
		$data['backtitle'] = isset($arg['backtitle'])?$arg['backtitle']:'';
		$this->load->view('web/member/front_error',$data);
	}
}
