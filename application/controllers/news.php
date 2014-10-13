<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class News extends Front_Controller {
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
        $newid = 21;
        $pid = 21;
        $data['newList2'] = $this->mpub->get_dates(base_url().'index.php/news/index/'.$pid.'/','4','article','id,type,aid,title,subtitle,author,published',array('pid' => $pid,'status' => 1));
        $this->front_header('news');

        $data['pid'] = $pid;
        $this->load->view('web/news/news.html',$data);
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
        $ids = $this->mpub->getRow('article','',array('title' => '公司新闻','pid' => 0));
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
        if($aid == 21)
        {
            $data['content']['title2']= '公司新闻';
        }
        $data['id'] = $aid;
        $this->front_header('enter');
        $this->load->view('web/news/newscontent.html',$data);
        $this->front_footer();
    }

} 