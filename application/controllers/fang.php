<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Fang extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpublic');
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

	public function tuandetail()
	{
		$seg=$this->uri->segment(3);
		if($seg){
		$data['fangtuan'] = $this->mpublic->getRow('fangtuan','',array('id'=>$seg));
		}else{
			show_404();
		}
		//print_r($data['fangtuan']);die;
		$this->front_header();
		$this->load->view('web/member/fangtuan_detail.php',$data);
		$this->front_footer();
	}

	public function detail()
	{
		$seg=$this->uri->segment(3);
		if($seg){
		$data['fangtuan'] = $this->mpublic->getRow('fang','',array('id'=>$seg));
		}else{
			show_404();
		}
		//print_r($data['fangtuan']);die;
		$this->front_header();
		$this->load->view('web/member/fangtuan_detail.php',$data);
		$this->front_footer();
	}



	public function fuang_tuan_over()
	{
		$seg=$this->uri->segment(3);
		if($seg){
		$this->mpublic->exc_sql('delete from fangtuan where id='.$seg);		
		}
	}
	public function fuang_over()
	{
		$seg=$this->uri->segment(3);
		if($seg){
		$this->mpublic->exc_sql('delete from fang where id='.$seg);		
		}
	}
		
} 
