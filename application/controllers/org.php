<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Org extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpub');
	} 
	/**
	 * 默认首页
	 */
	 public function index()
	{
		$aid = intval($this->uri->segment(3));
		$id = $this->mpub->getRow('article','',array('title' => '分支机构','pid' => 0));
		//print_r($id);
		//exit;
		$data['navList'] = $this->mpub->getList('article','id,pid,title',array('pid' => $id['id'],'status' => 1));
        $pid = $aid > 0 ? $aid : (isset($data['navList'][0]['id']) ? $data['navList'][0]['id'] : '');
		if($pid != '') {
			$data['content'] = $this->mpub->getRow('article','title,content',array('id' => $pid,'status' => 1));
		}
		$data['id'] = $pid;
		//print_r($data);
		$this->front_header('org');
		$this->load->view('web/org/fzjg.html',$data);
		$this->front_footer();
	}
	
	
} 