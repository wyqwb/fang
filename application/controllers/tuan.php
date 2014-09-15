<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Tuan extends Front_Controller {
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
		$this->front_header();
		$this->load->view('web/tuan/index.php');
		$this->front_footer();
	}
		
} 
