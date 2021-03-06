<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		if (!isset($this->session)) $this->load->library('session');
		$this->load->helper('url');
		$this->load->model('web/marticle');
		$this->load->model('web/mad');
		date_default_timezone_set('Asia/Shanghai');
	}
	

	final protected function front_index_header($where='')
	{
		$data['where'] = $where;
		$this->load->view('web/public/header_index.php',$data);
	}
	
	final protected function front_footer_index()
	{
		$news[1]=$this->marticle->get_title_id_by_default(0,6);
		$news[2]=$this->marticle->get_title_id_by_default(6,6);
		$news[3]=$this->marticle->get_title_id_by_default(12,6);
		$links=$this->mad->get_links();
		$data['links']=$links;
		$data['news']=$news;
		$this->load->view('web/public/footer_index.php',$data);
	}

	final protected function front_footer_list()
	{
		$this->load->view('web/public/footer_list.php');
	}
	
	//公用模块顶部导航
	final protected function front_header()
	{
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		//$data['member']['point'] = round($data['member']['point']);
		// $this->load->view('web/member/header.php',$data);


		$this->load->view('web/public/header.php',$data);
	}


	final protected function normal_front_header()
	{

		$this->load->view('web/public/header.php');
	}

	//公用模块底部导航
	final protected function front_footer()
	{
		$news[1]=$this->marticle->get_title_id_by_default(0,6);
		$news[2]=$this->marticle->get_title_id_by_default(6,6);
		$news[3]=$this->marticle->get_title_id_by_default(12,6);
		$links=$this->mad->get_links();
		$data['links']=$links;
		$data['news']=$news;
		$this->load->view('web/public/footer.php',$data);
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