<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Orgframe extends AD_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mpub');
        $this->load->model('admin/morgframe');
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orgframe'));
        $this->load->module('/admin/frames/tools');
        $this->welcome();
    }
    
    /* 走进友山*/
    public function org_enter(){
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orgframe'));
        $this->load->module('/admin/frames/tools');
        $this->load->view('admin/orgframe/orgframe_center_content.php');
    }
    
    //修改内容
    public function org_conedit() {
    	$id = intval($this->uri->segment(4));
        $this->load->helper('resource');
        if ($this->input->post('sub')) {
            $aid = $this->input->post('id');
            $data['title'] = $this->input->post('title');
            $data['subtitle'] = $this->input->post('subtitle');
            $data['content'] = $this->input->post('content');
            $data['modifytime'] = time();
            $data['modifier'] = $_SESSION['id'];
            $this->db->where('id', $aid);
            $res = $this->db->update('article', $data);
            if ($res) {
            	$this->load->module('/admin/frames/header');
		        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>3));
		        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url().'admin/orgframe/org_conedit/'.$aid,'reurl'=>''));
            	//echo "<script>location.href='".base_url()."index.php/admin/orgframe/org_conedit/".$aid."';</script>";
            } else {
                $this->load->module('/admin/frames/header');
		        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>3));
		        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改失败！','onurl'=>base_url().'admin/orgframe/org_conedit/'.$aid,'reurl'=>''));
            	//echo "<script>location.href='".base_url()."index.php/admin/orgframe/org_conedit/".$aid."';</script>";
            }
        } else {
	        $data['artcon'] = $this->mpub->getRow('article','',array('type' => 1, 'id'=>$id, 'status' => 1));
	        $this->load->module('/admin/frames/header');
	        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>4));
	        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
	        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>$data['artcon']['title']),true);
	        $data['search'] = $this->load->module('admin/frames/search',array(),true);
	        $this->load->view('admin/orgframe/orgframe_create.php',$data);
        }
    }
    
    //资讯中心
    public function org_lists() {
    	$id = intval($this->uri->segment(4));
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>4));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $search = array(
            'uri'=>'',
            'searchtitle'=>array('标题'),
            'searchcondition'=>array('title')
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章列表'),true);
        //$data['article_tree'] = $this->marticle->get_sort_tree();
        $tabledata['head'] = '编号_10%,标题_20%,副标题_25%,排序_10%,发布时间_15%,操作_20%';
        $tabledata['rules']['order']=array('id','title','subtitle','order','published');
        
        $searchcondition = $this->uri->segment(5);
        $searchkey = $this->uri->segment(6);
        /*echo trim($this->input->post('searchcondition'));
        exit;*/
    	if($this->input->post('searchsub') || $searchkey != '')
        {
        	//echo trim($this->input->post('searchcondition'));
        	//exit;
            $result = $this->morgframe->get_searchsort_bypage($id,$searchcondition,$searchkey);
            $this->load->library('formdebris');
            $tabledata['data'] = $result['result'];
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/orgframe/look_information/'.$id.'/','id'=>'id'),'modify'=>array('url'=>'admin/orgframe/modify_infromation/'.$id.'/','id'=>'id'),'delete'=>array('url'=>'admin/orgframe/delete_infromation/'.$id.'/','id'=>'id'));
       		$tabledata['foot']=$result['page'];
       		$tabledata['searchcondition'] = $result['serchcon'];
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        else
        {
            $result = $this->morgframe->get_sort_bypage($id);
            $tabledata['data'] = $result['result'];
            $tabledata['rules']['operate']=array('look'=>array('url'=>'admin/orgframe/look_information/'.$id.'/','id'=>'id'),'modify'=>array('url'=>'admin/orgframe/modify_infromation/'.$id.'/','id'=>'id'),'delete'=>array('url'=>'admin/orgframe/delete_infromation/'.$id.'/','id'=>'id'));
        	$tabledata['foot']= $result['page'];
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        
        $this->load->view('admin/orgframe/orgframe_org.php',$data);
    }
    //文章查看
    public function look_information() {
    	$id = intval($this->uri->segment(5));
        $data['artcon'] = $this->mpub->getViewRow($id);
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>4));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>$data['artcon']['title']),true);
        $data['search'] = $this->load->module('admin/frames/search',array(),true);
        $this->load->view('admin/orgframe/orgframe_view.php',$data);
    }
    //文章修改
    public function modify_infromation() {
    	$id = intval($this->uri->segment(5));
        $this->load->helper('resource');
        if ($this->input->post('sub')) {
            $aid = $this->input->post('id');
            $data['title'] = $this->input->post('title');
            $data['subtitle'] = $this->input->post('subtitle');
            $data['order'] = $this->input->post('order');
            $data['pid'] = $this->input->post('pid');
            $data['content'] = $this->input->post('content');
            $data['type'] = 1;
            $data['status'] = 1;
            $data['modifytime'] = time();
            $data['modifier'] = $_SESSION['id'];
            $this->db->where('id', $aid);
            $res = $this->db->update('article', $data);
            if ($res) {
                $this->load->module('/admin/frames/header');
		        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>3));
		        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url().'admin/orgframe/modify_infromation/'.$data["pid"].'/'.$aid,'reurl'=>base_url().'admin/orgframe/org_lists/'.$data["pid"]));
            	//echo "location.href='".base_url()."index.php/admin/orgframe/modify_infromation/".$data['pid']."/".$id."';</script>";
            } else {
                $this->load->module('/admin/frames/header');
		        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>3));
		        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改失败！','onurl'=>base_url().'admin/orgframe/modify_infromation/'.$data["pid"].'/'.$aid,'reurl'=>base_url().'admin/orgframe/org_lists/'.$data["pid"]));
            	echo "location.href='".base_url()."index.php/admin/orgframe/modify_infromation/".$data['pid']."/".$id."';</script>";
            }
        } else {
	        $data['actUrl'] = "/index.php/admin/orgframe/modify_infromation";
	        $data['navList'] = $this->mpub->getList('article','',array('pid' => 2,'status' => 1));
	        $data['artcon'] = $this->mpub->getRow('article','',array('type' => 1, 'id'=>$id, 'status' => 1));
	        $this->load->module('/admin/frames/header');
	        $this->load->module('/admin/frames/left',array('type'=>'orgframe','segpos'=>4));
	        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
	        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
	        $data['search'] = $this->load->module('admin/frames/search',array(),true);
	        $this->load->view('admin/orgframe/orgframe_infor_create.php',$data);
        }
    }
    //文章回收
    public function delete_infromation() {
        $pid = intval($this->uri->segment(4));
    	$id = intval($this->uri->segment(5));
       /* $data['status'] = 3;
        $this->db->where('id', $id);*/
        $res = $this->db->delete('article', array('id' => $id));
        header("Content-Type:text/html;charset=utf-8");
        if ($res) {
            echo "<script>location.href='".base_url()."index.php/admin/orgframe/org_lists/".$pid."';</script>";
        } else {
            echo "<script>location.href='".base_url()."iindex.php/admin/orgframe/org_lists/".$pid."';</script>";
        }
    }
    
    public function test(){
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orgframe'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $this->load->view('admin/backtip.php');
    }
    
    
    
    
}