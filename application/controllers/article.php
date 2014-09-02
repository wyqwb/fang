<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Article extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/marticle');
		$this->load->model('web/mpublic');
		$this->load->model('web/mad');
		$this->load->helper('cookie');
		if (!isset($this->session)) $this->load->library('session');
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		$this->front_header();
		$this->load->view('web/fang/index.php');
		$this->front_footer();
	}


	public function detail()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$data['art'] = $this->mpublic->getRow('article','',array('id'=>$seg));
			if(count($data['art'])>0){
				$this->front_header();
				$this->load->view('web/article/art_detail.php',$data);
				$this->front_footer();
			}else{
				show_404();	
			}
		}else{
			show_404();
		}
	}

	public function list_art()
	{
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		
		$data['shareurl']=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


		$data['toplist']=$this->mfang->get_top_default();
		$data['list2']=$this->marticle->get_fang_by_default();	

		$ads=$this->mad->get_index_ad();
		if(count($ads)!=0){
			$data['ads']=$ads;	
		}else{
			$data['ads']='';
		}
		$this->load->view('web/fang/fang_list.php',$data);
		$this->front_footer_list();
	}

} 
