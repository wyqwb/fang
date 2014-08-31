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



}