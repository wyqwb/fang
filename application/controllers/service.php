<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Service extends Front_Controller {
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
		$id = $this->mpub->getRow('article','',array('title' => '客服中心','pid' => 0));
		//print_r($id);
		//exit;
		$data['navList'] = $this->mpub->getList('article','id,pid,title',array('pid' => $id['id'],'status' => 1));
		$pid = $aid > 0 ? $aid : (isset($data['navList'][0]['id']) ? $data['navList'][0]['id'] : '');
		if($pid != '') {
			if ($pid == 122 || $pid == 152) {
				$data['newList2'] = $this->mpub->get_dates(base_url().'index.php/service/index/'.$pid.'/','4','article','id,type,aid,title,subtitle,author,published',
                    array('pid' => $pid,'status' => 1));
				switch($pid)
				{
					case 122 : $data['title'] = '产品成立公告';
						break;
					case 152 : $data['title'] = '产品季报';
						break;
				}
			} else {
				$data['content'] = $this->mpub->getRow('article','title,content',array('id' => $pid,'status' => 1));
			}
		}
		$data['id'] = $pid;
		//print_r($data);
		$this->front_header('service');
		if ($pid == 122 || $pid == 152) {
			$this->load->view('web/service/lists.html',$data);
		} else {
			$this->load->view('web/service/kfzx.html',$data);
		}
		
		$this->front_footer();
	}
	
	public function content() {
		//二级分类的id
		$aid = intval($this->uri->segment(3));
		//文章的id
		$id = intval($this->uri->segment(4));
		//一级分类的id
		$ids = $this->mpub->getRow('article','',array('title' => '客服中心','pid' => 0));
		//print_r($id);
		//exit;
		$data['navList'] = $this->mpub->getList('article','id,pid,title',array('pid' => $ids['id'],'status' => 1));
		if($id > 0) {
			$data['content'] = $this->mpub->getRow('article','id,title,author,published,content',array('id' => $id,'status' => 1));
			$att = $this->mpub->getList('article','aid',array('pid' => $data['content']['id'],'status' => 1));
			$cur = count($att);
			$data['files'] = array();
			for ($i=0; $i<$cur; $i++) {
				 $file = $this->mpub->getRow('attachment','',array('id' => $att[$i]['aid']));
				 if ($file['type']>0) {
				 	$data['files'][$i]['file'] = $file['realname'];
				 } else {
				 	$data['files'][$i]['file'] = "<img src='/uploads/images/".$file['uniquename']."' /> <br />";
				 }
			}
		}
        if($aid == 122 )
        {
            $data['content']['title2']= '产品成立公告';
        }
		else if($aid == 152)
		{
			$data['content']['title2']= '产品季报';
		}
		$data['id'] = $aid;
		$this->front_header('service');
		$this->load->view('web/service/kfzx.html',$data);
		$this->front_footer();
	}
	
} 