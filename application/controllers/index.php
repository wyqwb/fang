<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Index extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		//$this->front_header('index');
		$this->load->view('web/index/index.php');
		//$this->front_footer();
	}
	
	
} 
