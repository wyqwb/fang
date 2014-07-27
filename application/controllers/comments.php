<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Comments extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('web/mcomments');
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		//$data=$this->marticle->get_top_default();
		//$fang['toplist']=$data;
		//print_r($fang);die;
		$this->load->view('web/comments/index.php');
	}
	
	
} 
