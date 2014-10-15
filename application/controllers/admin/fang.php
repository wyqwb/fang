<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Fang extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
		
        $this->load->model('admin/mpub');
        $this->load->model('admin/mfang');
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
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'article'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'房源列表信息'),true);
		//print_r($data['title']);die;

        $tabledata['head'] = array(
			array('data'=>'排序','class'=>'tt','width'=>'10%'),
			array('data'=>'房源名称','class'=>'tt','width'=>'25%'),
            array('data'=>'发布者','class'=>'tt','width'=>'25%'),
			array('data'=>'发布时间','class'=>'tt','width'=>'15%'),
            array('data'=>'是否推广','class'=>'tt','width'=>'15%'),
			array('data'=>'操作','class'=>'operate','width'=>'20%')
		);
		$tabledata['rules']['order']= array(
			'order'=>array('class'=>'xx','dd'=>'bb'),
			'title'=>array('class'=>'xx','dd'=>'bb'),
            'name'=>array('class'=>'xx','dd'=>'bb'),
			'createtime'=>array('class'=>'xx','dd'=>'bb'),
            'selected'=>array('class'=>'xx','dd'=>'bb')
		);
        if($this->input->post('searchsub'))
        {
            $result = $this->mfang->get_searchlist_bypage();
            $this->load->library('formdebris');
            $tabledata['data'] = $result;
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/fangtuan/fangtuan_view','id'=>'id'));
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        else
        {
            $data['lists'] = $this->mpub->get_dates(base_url().'index.php/admin/fang/lists/','4','fang','',array('isenable' => 1),$this->perpage);;
            //print_r($data['lists']);die;
            $tabledata['data'] = $data['lists']['result'];
            //$tabledata['rules']['operate']=array('look'=>array('url'=>'admin/article/article_view/article_lists/','id'=>'id'),'modify'=>array('url'=>'admin/article/modify_article/article_lists/','id'=>'id'),'delete'=>array('action'=>'admin/article/article_delete/','id'=>'id'));
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/fang/fang_view','id'=>'id'),'delete'=>array('action'=>'admin/fang/fang_delete/','id'=>'id'),'modify'=>array('url'=>'admin/fang/fang_modify/lists','id'=>'id'));
            $tabledata['foot']= $data['lists']['page'];
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        $this->load->view('admin/article/article_lists.php',$data);
    }

    
    //文章查看
    public function fang_view(){
           //$tip = intval($this->uri->segment(4));
           $id = intval($this->uri->segment(4));
           //print_r($id);die;
           $table="fang";
           $data['artcon'] = $this->mpub->get_fang_ViewRow($table,$id);
           //print_r($data['artcon']);die;
           $this->load->module('/admin/frames/header');
           $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>4));
           $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
           $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'看房团相信信息'),true);
           $data['search'] = $this->load->module('admin/frames/search',array(),true);
           $this->load->view('admin/fang/fang_view.php',$data);
    }

    public function fang_delete(){
        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('fang', array('id' => $id));
        if ($res) {
            echo "<script>location.href='".base_url()."index.php/admin/fang/lists';</script>";
        } else {
            echo "<script>location.href='".base_url()."index.php/admin/fang/lists';</script>";
        }
    }
    
    public function  fang_modify(){
        $tip = intval($this->uri->segment(4));
        $id = intval($this->uri->segment(5));
        $this->load->helper('resource');
        if ($this->input->post('sub')) {
            $aid = $this->input->post('id');
            // $config['upload_path'] = FCPATH.'uploads/';
            // $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['max_size'] = '20000';
            // $config['overwrite'] = FALSE;
            // $config['encrypt_name'] = TRUE;
            // $this->load->library('upload',$config);
            //第1张图
            // if(!empty($_FILES['addphoto']['name'])){
            //     $this->upload->do_upload('addphoto');
            //     $str = $this->upload->data();
            //     $previewimg = $str['file_name'];
            //     $data['previewimg'] = $previewimg;
            // }

            $data['title'] = $this->input->post('title');
            // $data['subtitle'] = $this->input->post('subtitle');
            $data['order'] = $this->input->post('order');
            // $data['pid'] = $this->input->post('pid');
            $data['content'] = $this->input->post('content');
            $data['modifytime'] = date('Y-m-d G:i:s');
            //$data['modifier'] = $_SESSION['id'];
            // $data['published'] = date('Y-m-d G:i:s');
            $data['selected'] = intval($this->input->post('selected'));
            $this->db->where('id', $aid);
            $res = $this->db->update('fang', $data);
            if ($res) {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
                $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."index.php/admin/fang/fang_modify/lists/".$aid,'reurl'=>base_url()."index.php/admin/fang/lists"));
                //echo "<script>alert('修改成功！');location.href='".base_url()."index.php/admin/article/article_lists';</script>";
            } else {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>3));
                $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改失败！','onurl'=>base_url()."index.php/admin/fang/fang_modify/lists/".$aid,'reurl'=>base_url()."index.php/admin/fang/lists"));
                // echo "<script>alert('修改失败！');location.href='".base_url()."index.php/admin/article/article_lists';</script>";
            }
        } else {
            $data['actUrl'] = "./index.php/admin/fang/fang_modify";
            $data['artcon'] = $this->mpub->getRow('fang','',array( 'id'=>$id));
           // $data['article_tree'] = $this->marticle->get_sort_tree($data['artcon']['pid']);
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left',array('type'=>'article','segpos'=>4));
            $this->load->module('/admin/frames/tools',array('article'=>false,'images'=>false));
            //$data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'房源修改'),true);
            //$data['search'] = $this->load->module('admin/frames/search',array(),true);
            $this->load->view('admin/fang/fang_modify.php',$data);       

        }
    }

    
}