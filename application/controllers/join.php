<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Join extends Front_Controller {
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
        $childid = $this->uri->segment(4,0);

		$id = $this->mpub->getRow('article','',array('title' => '加入友山','pid' => 0));
		//print_r($id);
		//exit;
		$data['navList'] = $this->mpub->getList('article','id,pid,title',array('pid' => $id['id'],'status' => 1));
        $data['navList2'] = $this->mpub->getList('article','id,pid,title',array('pid' => '17','status' => 1));

		$pid = $aid > 0 ? $aid : (isset($data['navList'][0]['id']) ? $data['navList'][0]['id'] : '');
		if($pid != '' && $aid != '17') {
			$data['content'] = $this->mpub->getRow('article','title,content',array('id' => $pid,'status' => 1));
		}
        else if($aid == '17' )
        {
            if($childid == 0)
            {
                $childid = '130';
            }
            $data['content'] = $this->mpub->getRow('article','title,content',array('id' => $childid,'status' => 1));
        }
        if($childid == 0 )
        {
            $data['id'] = $pid;
        }
        else
        {
            $data['id'] = $childid;
        }
		$this->front_header('join');
		$this->load->view('web/join/jrys.html',$data);
		$this->front_footer();
	}
	
	
} 