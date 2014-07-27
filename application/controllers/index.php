<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Index extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/marticle');
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		$data=$this->marticle->get_top_default();
		$data2=$this->marticle->get_fang_by_default();
		$fang['toplist']=$data;
		$fang['list2']=$data2;
		$this->load->view('web/index/index.php',$fang);
	}
	
	
} 
