<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Information extends Front_Controller {
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
		$id = $this->mpub->getRow('article','id',array('title' => '资讯中心','pid' => 0));
		$data['navList'] = $this->mpub->getList('article','',array('pid' => $id['id'],'status' => 1));
		$pid = $aid > 0 ? $aid : (isset($data['navList'][0]['id']) ? $data['navList'][0]['id'] : '');
		if($pid != '') {
			$data['newList2'] = $this->mpub->get_dates(base_url().'index.php/information/index/'.$pid.'/','4','article','id,type,aid,title,subtitle,author,published',array('pid' => $pid,'status' => 1));
		}
		$data['id'] = $pid;
		$data['title'] = isset($data['navList'][0]['title']) ? $data['navList'][0]['title'] : '';
		$this->front_header('information');
        if($aid == 10)
        {
            $data['title']='理财研究';

        }
        else if($aid == 25)
        {
            $data['title']='市场动态';
        }
        else if($aid == 26)
        {
            $data['title']='基金知识';
        }
        else if($aid == 27)
        {
            $data['title']='法律法规';
        }
		$this->load->view('web/information/zxzx.html',$data);
		$this->front_footer();
	}
	
	/*
	 * 内容页
	 * */
	public function content() {
		//二级分类的id
		$aid = intval($this->uri->segment(3));
		//文章的id
		$id = intval($this->uri->segment(4));
		//一级分类的id
		$ids = $this->mpub->getRow('article','',array('title' => '资讯中心','pid' => 0));
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
		$data['id'] = $aid;
        if($aid == 10)
        {
            $data['content']['title2']='理财研究';

        }
        else if($aid == 25)
        {
            $data['content']['title2']='市场动态';
        }
        else if($aid == 26)
        {
            $data['content']['title2']='基金知识';
        }
        else if($aid == 27)
        {
            $data['content']['title2']='法律法规';
        }
		$this->front_header('information');
		$this->load->view('web/information/content.html',$data);
		$this->front_footer();
	}
	
	
} 