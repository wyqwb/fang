<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Index extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/marticle');
		$this->load->model('web/mad');
		$this->load->model('web/mpublic');
		if (!isset($this->session)) $this->load->library('session');
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		$data['toplist']=$this->marticle->get_top_default();
		//print_r($data['toplist']);die;
		$data['list2']=$this->marticle->get_fang_by_default();
		$ads=$this->mad->get_index_ad();
		if(count($ads)!=0){
			$data['ads']=$ads;	
		}else{
			$data['ads']='';
		}
		$this->load->view('web/index/index.php',$data);
		$this->front_footer_index();
	}
	
	
} 
