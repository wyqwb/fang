<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Reservation extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mpublic');
        $this->load->helper('date');
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
    
    public function reservation_lists()
    {
    	if (!$this->input->post('searchcondition') && !$this->uri->segment(4))
    	   $this->session->unset_userdata("Search_Reservation");
    	$searchkey = trim($this->input->post('searchkey'));
    	if (!empty($searchkey)){
    		$data = array('searchkey'=>$searchkey);
    	  	$this->session->set_userdata('Search_Reservation',$data);
    	}
    	$session = $this->session->userdata('Search_Reservation');
    	if (!empty($session))  $searchkey = $session['searchkey'];
        $this->load->helper('resource');
        $search = array(
            'uri'=>base_url()."admin/reservation/reservation_lists",
            'searchtitle'=>array('账号','姓名','产品名'),
            'searchcondition'=>array('account','fullname','mobile'),
        	'searchkey'=>$searchkey,
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'product'));
        $this->load->module('/admin/frames/tools');
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'预约管理'),true);
        $tabledata['head'] = '编号_5%,账号_10%,姓名_10%,产品编号_10%,城市_10%,预约数量_10%,预约日期_10%,状态_10%,操作_10%';
        $tabledata['rules']['order']=array('Id','account','fullname','NUMBER','city','amount','rsv_date','state');
        $tabledata['rules']['operate']=
            array(
	            'access'=>array(
	            'url'=>'admin/reservation/reservation_check/',
            	'checkfield'=>'state',
            	'checkdispvalue'=>'等待处理',
	            'id'=>'Id'),
	            'reject'=>array(
	            'url'=>'admin/reservation/reservation_check1/',
            	'checkfield'=>'state',
            	'checkdispvalue'=>'等待处理',
	            'id'=>'Id'),
            );
        $sql = "select r.Id,b.account,b.fullname,r.NUMBER,r.city,r.amount,r.rsv_date,r.state from reservation r,member b where r.memberid=b.Id";
        if($searchkey)
        {
        	$condition = $search['searchcondition'];
        	$temp ="";
        	foreach ($condition as $arr) 
        	if (!empty($arr))
        		$temp .= " OR ".$arr." LIKE '%".$searchkey."%' ";
        	$sql .= " AND (".substr($temp,4).")";
        	$sql .= " order by Id desc";
        	log_message("debug","---->".$sql);
        	//print_r($sql);exit();
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/reservation/reservation_lists/',4,$sql);
        }
        else
        {
       		$sql .= ' order by r.Id desc';
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/reservation/reservation_lists/','4',$sql);
        	//print_r($data);exit();
        }
        $tabledata['data'] = $data['lists']['result'];
        $tabledata['foot']= $data['lists']['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/reservation/reservation_lists.php',$data);
    }

    
    public function reservation_check(){
    	$sid = $this->uri->segment(4);
    	$this->db->where('Id',$sid);
    	$data = array(
    		'state' => '已接受',
    		'modifytime' => now()
    		);
    	$this->db->update('reservation',$data);
    	$url = base_url()."admin/reservation/reservation_lists";
    	echo $url;exit();
    	redirect($url);
    }
 
    public function reservation_check1(){
    	$sid = $this->uri->segment(4);
    	$this->db->where('Id',$sid);
    	$data = array(
    		'state' => '已拒绝',
    		'modifytime' => now()
    		);
    	$this->db->update('reservation',$data);
    	$url = base_url()."admin/reservation/reservation_lists";
    	redirect($url);
    }
 
}