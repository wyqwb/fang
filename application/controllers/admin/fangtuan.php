<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Fangtuan extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
		
        $this->load->model('admin/mpub');
        $this->load->model('admin/mfangtuan');
        $this->perpage = $this->config->item('perpage');
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools');
        $this->welcome();
    }

    public function home()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $this->load->view('admin/article/article_center_content.php');
    }

    //文章中心的组织架构模块
    public function article_org()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $this->load->view('admin/article/article_org.php');
    }
    //创建分类
    public function article_sort_create()
    {
        // $datas['actUrl'] = "./index.php/admin/article/article_sort_create";
        // $this->load->helper('resource');
        // if ($this->input->post('sub')) {
        //     $data['title'] = $this->input->post('title');
        //     $data['pid'] = $this->input->post('pid');
        //     $data['order'] = $this->input->post('order');
        //     $data['type'] = 0;
        //     $data['status'] = 1;
        //     $res = $this->db->insert('article', $data);
        //     if ($res) {
        //         $this->load->module('/admin/frames/header');
        //         $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
        //         $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
        //         $this->load->module('/admin/frames/returnTip',array('tip'=>'创建成功！','onurl'=>base_url()."index.php/admin/article/article_sort_create/",'reurl'=>base_url()."index.php/admin/article/article_sort/"));
        //         //echo "<script>alert('添加成功！');location.href='".base_url()."index.php/admin/article/article_create';</script>";
        //     } else {
        //         $this->load->module('/admin/frames/header');
        //         $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
        //         $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
        //         $this->load->module('/admin/frames/returnTip',array('tip'=>'创建失败！','onurl'=>base_url()."index.php/admin/article/article_sort_create/",'reurl'=>base_url()."index.php/admin/article/article_sort/"));
        //         //echo "<script>alert('添加失败！');location.href='".base_url()."index.php/admin/article/article_create';</script>";
        //     }
        // } else {
        //     //print_r("expression");die;
        //     $datas['article_tree'] = $this->marticle->get_sort_tree();
        //    // print_r("expression");die;
        //     $datas['navList'] = $this->mpub->getList('article','',array('status' => 1));
        //     $this->load->module('/admin/frames/header');
        //     $this->load->module('/admin/frames/left',array('type'=>'article'));
        //     $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
        //     $datas['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
        //     $datas['search'] = $this->load->module('admin/frames/search',array(),true);
        //     $this->load->view('admin/article/article_sort_create.php',$datas);
        // }
    }

    public function article_sort()
    {
        // $this->load->module('/admin/frames/header');
        // $this->load->module('/admin/frames/left',array('type'=>'article'));
        // $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        // $search = array(
        //     'uri'=>'',
        //     'searchtitle'=>array('标题','副标题'),
        //     'searchcondition'=>array('title','subtitle')
        // );
        // $data['search'] = $this->load->module('/admin/frames/search',$search,true);
        // $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
        // $data['article_tree'] = $this->marticle->get_sort_tree();
        // $tabledata['head'] = '编号_15%,父编号_15%,标题_40%,操作_30%';
        // $tabledata['rules']['order']=array('id','pid','title');
		
        // if($this->input->post('searchsub'))
        // {
        //     $result = $this->marticle->get_searchsort_bypage();
        //     $this->load->library('formdebris');
        //     $tabledata['data'] = $result;
        //     $tabledata['rules']['operate']=array('modify'=>array('url'=>'admin/article/modify_articletype/article_sort/','id'=>'id'));
        //     $this->formdebris->initialize($tabledata);
        //     $data['table'] = $this->formdebris->packing_table($tabledata);
        // }
        // else if($this->input->post('normalsub'))
        // {
        //     $datainput['title'] = $this->input->post('title');
        //     $datainput['pid'] = $this->input->post('pid');
        //     $datainput['type'] = $this->input->post('type');
        //     $datainput['status'] = 1;
        //     $this->db->insert('article',$datainput);
        //     $result = $this->marticle->get_sort_bypage();
        //     $tabledata['data'] = $result['result'];
        //     $tabledata['rules']['operate']=array('modify'=>array('url'=>'admin/article/modify_articletype/article_sort/','id'=>'id'));
        //     $tabledata['foot']= $result['page'];
        //     $this->formdebris->initialize($tabledata);
        //     $data['table'] = $this->formdebris->packing_table($tabledata);
        // }
        // else
        // {
        //     $result = $this->marticle->get_sort_bypage();
        //     $tabledata['data'] = $result['result'];
        //     $tabledata['rules']['operate']=array('modify'=>array('url'=>'admin/article/modify_articletype/article_sort/','id'=>'id'));
        //     $tabledata['foot']= $result['page'];
        //     $this->formdebris->initialize($tabledata);
        //     $data['table'] = $this->formdebris->packing_table($tabledata);
        // }
        // $this->load->view('admin/article/article_org.php',$data);
    }


    public function article_create()
    {
   //      $datas['actUrl'] = "./index.php/admin/article/article_create";
   //      $this->load->helper('resource');
   //      if ($this->input->post('sub')) {
   //          $config['upload_path'] = FCPATH.'uploads/';
   //          $config['allowed_types'] = 'gif|jpg|png|jpeg';
   //          $config['max_size'] = '20000';
   //          $config['overwrite'] = FALSE;
   //          $config['encrypt_name'] = TRUE;
   //          $this->load->library('upload',$config);
   //          //第1张图
   //          if(!empty($_FILES['addphoto']['name'])){
   //              $this->upload->do_upload('addphoto');
   //              $str = $this->upload->data();
   //              $previewimg = $str['file_name'];
   //          }else{
   //              $previewimg = "";
   //          }
   //          $data['previewimg'] = $previewimg;
   //          $data['title'] = $this->input->post('title');
   //          $data['subtitle'] = $this->input->post('subtitle');
   //          $data['pid'] = $this->input->post('pid');
   //          $data['published'] = $this->input->post('published');
   //          $data['order'] = $this->input->post('order');
   //          $data['content'] = $this->input->post('content');
			// $data['createtime'] = $_SERVER['REQUEST_TIME'];
			// $data['creater'] = $this->session->userdata('id');
   //          $data['selected'] = intval($this->input->post('selected'));
   //          $data['type'] = 1;
   //          $data['status'] = 1;
   //          $res = $this->db->insert('article', $data);
   //          if ($res) {
   //              $this->load->module('/admin/frames/header');
		 //        $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
		 //        $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
   //          	$this->load->module('/admin/frames/returnTip',array('tip'=>'创建成功！','onurl'=>base_url()."index.php/admin/article/article_create/",'reurl'=>base_url()."index.php/admin/article/article_lists/"));
   //          	//echo "<script>alert('添加成功！');location.href='".base_url()."index.php/admin/article/article_create';</script>";
   //          } else {
   //              $this->load->module('/admin/frames/header');
		 //        $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
		 //        $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
   //          	$this->load->module('/admin/frames/returnTip',array('tip'=>'创建失败！','onurl'=>base_url()."index.php/admin/article/article_create/",'reurl'=>base_url()."index.php/admin/article/article_lists/"));
   //          	//echo "<script>alert('添加失败！');location.href='".base_url()."index.php/admin/article/article_create';</script>";
   //          }
   //      } else {
	  //       $datas['article_tree'] = $this->marticle->get_sort_tree();
	  //       $datas['navList'] = $this->mpub->getList('article','',array('status' => 1));
	  //       $this->load->module('/admin/frames/header');
	  //       $this->load->module('/admin/frames/left',array('type'=>'article'));
	  //       $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
	  //       $datas['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
	  //       $datas['search'] = $this->load->module('admin/frames/search',array(),true);
	  //       $this->load->view('admin/article/article_create.php',$datas);
   //      }
    }
    //文章列表
    public function lists()
    {
        $this->load->helper('resource');
        $search = array(
            'uri'=>'',
            'searchtitle'=>array('标题'),
            'searchcondition'=>array('title')
        );

        //显示搜索框
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
        //print_r($data['search']);die;
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'看房团列表'),true);
		//print_r($data['title']);die;

        $tabledata['head'] = array(
			array('data'=>'排序','class'=>'tt','width'=>'10%'),
			array('data'=>'房团名称','class'=>'tt','width'=>'25%'),
            array('data'=>'发布者','class'=>'tt','width'=>'25%'),
			array('data'=>'发布时间','class'=>'tt','width'=>'15%'),
			array('data'=>'操作','class'=>'operate','width'=>'20%')
		);
		$tabledata['rules']['order']= array(
			'order'=>array('class'=>'xx','dd'=>'bb'),
			'title'=>array('class'=>'xx','dd'=>'bb'),
            'name'=>array('class'=>'xx','dd'=>'bb'),
			'createtime'=>array('class'=>'xx','dd'=>'bb')
		);
        if($this->input->post('searchsub'))
        {
            $result = $this->mfangtuan->get_searchlist_bypage();
            $this->load->library('formdebris');
            $tabledata['data'] = $result;
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/fangtuan/fangtuan_view','id'=>'id'));
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
            //print_r($data['table']);die;
        }
        else
        {
            $data['lists'] = $this->mpub->get_dates(base_url().'index.php/admin/fangtuan/lists/','4','fangtuan','',array('isenable' => 1),$this->perpage);;
            $tabledata['data'] = $data['lists']['result'];
            //$tabledata['rules']['operate']=array('look'=>array('url'=>'admin/article/article_view/article_lists/','id'=>'id'),'modify'=>array('url'=>'admin/article/modify_article/article_lists/','id'=>'id'),'delete'=>array('action'=>'admin/article/article_delete/','id'=>'id'));
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/fangtuan/fangtuan_view','id'=>'id'),'delete'=>array('action'=>'admin/fangtuan/fangtuan_delete/','id'=>'id'));
            $tabledata['foot']= $data['lists']['page'];
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        $this->load->view('admin/article/article_lists.php',$data);
    }



    //文章查看
    public function fangtuan_view(){
           //$tip = intval($this->uri->segment(4));
           $id = intval($this->uri->segment(4));
           //print_r($id);die;
           $table="fangtuan";
           $data['artcon'] = $this->mpub->get_fangtuan_ViewRow($table,$id);
           //print_r($data['artcon']);die;
           $this->load->module('/admin/frames/header');
           $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>4));
           $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
           $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'看房团相信信息'),true);
           $data['search'] = $this->load->module('admin/frames/search',array(),true);
           $this->load->view('admin/fangtuan/fangtuan_view.php',$data);
    }

    //回收站文章删除
    public function fangtuan_delete(){
        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('fangtuan', array('id' => $id));
        if ($res) {
            echo "<script>location.href='".base_url()."index.php/admin/fangtuan/lists';</script>";
        } else {
            echo "<script>location.href='".base_url()."index.php/admin/fangtuan/lists';</script>";
        }
    }


    public function deletereview(){
        // $id = intval($this->uri->segment(4));
        // $res = $this->db->delete('reviewlist', array('id' => $id));
        // if ($res) {
        //     echo "<script>location.href='".base_url()."index.php/admin/article/reviewlist';</script>";
        // } else {
        //     echo "<script>location.href='".base_url()."index.php/admin/article/reviewlist';</script>";
        // }
    }

    //客户评论列表
    public function reviewlist()
    {
        // $tabledata['head'] = '评论标题_15%,评论内容_40%,评论文章_15%,评论人_15%,操作_15%';
        // $tabledata['rules']['order']=array('title','content','atitle','account');
        // $result = $this->marticle->get_review_bypage();
        // $tabledata['data'] = $result['result'];
        // $tabledata['rules']['operate']=array(
        //     'delete'=>array('action'=>'admin/article/deletereview/','id'=>'id','title'=>'删除评论'),
        // );
        // $tabledata['foot']= $result['page'];
        // $this->formdebris->initialize($tabledata);
        // $data['table'] = $this->formdebris->packing_table($tabledata);
        // $this->load->module('/admin/frames/header');
        // $this->load->module('/admin/frames/left',array('type'=>'article'));
        // $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
        // $this->load->view('admin/article/reviewlist.php',$data);
    }

}