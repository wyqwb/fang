<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Member extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mpublic');
        $this->perpage = $this->config->item('per_page');
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->module('/admin/frames/tools');
        $this->load->module('/admin/frames/welcome');
        $this->load->module('/admin/frames/footer');
    }
    
    public function home()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->view('admin/member/member_center_content.php');
        $this->load->module('/admin/frames/footer');
    }

    
    //文章列表
    public function member_lists()
    {
    	if (!$this->input->post('searchcondition') && !$this->uri->segment(4))
    	   $this->session->unset_userdata("Search_Member");
    	$searchkey = trim($this->input->post('searchkey'));
    	if (!empty($searchkey)){
    		$data = array('searchkey'=>$searchkey);
    	  	$this->session->set_userdata('Search_Member',$data);
    	}
    	$session = $this->session->userdata('Search_Member');
    	if (!empty($session))  $searchkey = $session['searchkey'];
        $this->load->helper('resource');
        $search = array(
            'uri'=>base_url()."admin/member/member_lists",
            'searchtitle'=>array('账号','姓名','手机'),
            'searchcondition'=>array('account','fullname','mobile'),
        	'searchkey'=>$searchkey,
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->module('/admin/frames/tools');
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'会员管理'),true);
        $tabledata['head'] = '编号_5%,账号_10%,姓名_10%,手机_10%,城市_10%,积分_10%,状态_10%,操作_10%';
        $tabledata['rules']['order']=array('Id','account','fullname','mobile','city','point','status');
        $tabledata['rules']['operate']=
            array(
	            'look'=>array(
	            'url'=>'admin/member/member_view/member_lists/',
	            'id'=>'Id' ),
	            'modify'=>array(
	            'url'=>'admin/member/modify_member/member_lists/',
	            'id'=>'Id'),
	            'check'=>array(
	            'url'=>'admin/member/member_check/',
            	'checkfield'=>'status',
            	'checkdispvalue'=>'未审核',
	            'id'=>'Id'),
            );
        if($searchkey)
        {
        	$condition = $search['searchcondition'];
        	$sql = "select * from member ";
        	$temp ="";
        	foreach ($condition as $arr) 
        	if (!empty($arr))
        		$temp .= " OR ".$arr." LIKE '%".$searchkey."%' ";
        	$sql .= " WHERE (".substr($temp,4).")";
        	$sql .= " order by Id desc";
        	log_message("debug","---->".$sql);
        	//print_r($sql);exit();
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/member/member_lists/',4,$sql);
        }
        else
       {
            $data['lists'] = $this->mpublic->get_dates(base_url().'admin/member/member_lists/','4','select * from member order by Id desc');;
        }
        $tabledata['data'] = $data['lists']['result'];
        $tabledata['foot']= $data['lists']['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/member/member_lists.php',$data);
    }

    
    public function member_check(){
    	$sid = $this->uri->segment(4);
    	$this->db->where('Id',$sid);
    	$data = array(
    		'status' => '审核',
    		'modifytime' => $_server['server_time']
    		);
    	$this->db->update('member',$data);
    	$url = base_url()."admin/member/member_lists";
    	redirect($url);
    }

    //文件修改
    public function modify_member()
    {
        $tip = intval($this->uri->segment(4));
    	$id = intval($this->uri->segment(5));
        $this->load->helper('resource');
        if ($this->input->post('sub')) {
            $aid = $this->input->post('id');
            $data['account'] = $this->input->post('account');
            $data['fullname'] = $this->input->post('fullname');
            $data['gender'] = $this->input->post('gender');
            $data['mobile'] = $this->input->post('mobile');
            $data['idcard'] = $this->input->post('idcard');
            $data['city'] = $this->input->post('city');
            $data['point'] = $this->input->post('point');
            $data['modifytime'] = time();
            $this->db->where('id', $aid);
            $res = $this->db->update('member', $data);
            $this->load->module('/admin/frames/header');
	        $this->load->module('/admin/frames/left',array('type'=>'member','segpos'=>3));
	        $this->load->module('/admin/frames/tools',array('member'=>false,'images'=>false));
            if ($res) {
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."index.php/admin/member/modify_member/member_lists/".$aid,'reurl'=>base_url()."index.php/admin/member/member_lists"));
            } else {
            	$this->load->module('/admin/frames/returnTip',array('tip'=>'修改失败！','onurl'=>base_url()."index.php/admin/member/modify_member/member_lists/".$aid,'reurl'=>base_url()."index.php/admin/member/member_lists"));
            }
        } else {
	        $data['actUrl'] = base_url()."index.php/admin/member/modify_member";
	        $data['artcon'] = $this->mpublic->getRow('member','',array('Id'=>$id));
	        $data["city"] = $this->mpublic->getList('dictdata','',array('type'=>'城市'));
	        //print_r($data["city"]);exit();
	        $this->load->module('/admin/frames/header');
	        $this->load->module('/admin/frames/left',array('type'=>'member','segpos'=>4));
	        $this->load->module('/admin/frames/tools');
	        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
	        $this->load->view('admin/member/member_create.php',$data);
        }
    }
    //文章查看
    public function member_view(){
        $tip = intval($this->uri->segment(4));
    	$id = intval($this->uri->segment(5));
        $data['artcon'] = $this->mpublic->getRow("member","",array('Id'=>$id));
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'member','segpos'=>4));
        $this->load->module('/admin/frames/tools');
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'文章分类'),true);
        $this->load->view('admin/member/member_view.php',$data);
    }
    
       //积分查看
    public function point_lists()
    {
    	if (!$this->input->post('searchcondition') && !$this->uri->segment(4))
    	   $this->session->unset_userdata("Search_Point");
    	$searchkey = trim($this->input->post('searchkey'));
    	if (!empty($searchkey)){
    		$data = array('searchkey'=>$searchkey);
    	  	$this->session->set_userdata('Search_Point',$data);
    	}
    	$session = $this->session->userdata('Search_Point');
    	if (!empty($session))  $searchkey = $session['searchkey'];
        $this->load->helper('resource');
        $search = array(
            'uri'=>base_url()."admin/member/point_lists",
            'searchtitle'=>array('账号','姓名','类型'),
            'searchcondition'=>array('m.account','m.fullname','p.type'),
        	'searchkey'=>$searchkey,
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->module('/admin/frames/tools');
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'积分管理'),true);
        $tabledata['head'] = '编号_5%,账号_20%,姓名_20%,类型_10%,积分_10%,时间_20%,操作_5%';
        $tabledata['rules']['order']=array('Id','account','fullname','type','point','creattime');
        $tabledata['rules']['operate']=array();
        if($searchkey)
        {
        	$condition = $search['searchcondition'];
        	$sql = "select p.*,m.account,m.fullname from point p,member m WHERE p.memberid=m.Id";
        	$temp ="";
        	foreach ($condition as $arr) 
        	if (!empty($arr))
        		$temp .= " OR ".$arr." LIKE '%".$searchkey."%' ";
        	$sql .= " AND (".substr($temp,4).")";
        	$sql .= " order by Id desc";
        	log_message("debug","---->".$sql);
        	//print_r($sql);exit();
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/member/member_lists/',4,$sql);
        }
        else
       {
            $data['lists'] = $this->mpublic->get_dates(base_url().'admin/member/member_lists/','4','select p.*,m.account,m.fullname from point p,member m where p.memberid=m.Id order by Id desc');;
        }
        $tabledata['data'] = $data['lists']['result'];
        $tabledata['foot']= $data['lists']['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/member/point_lists.php',$data);
    }
    


}