<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Price extends AD_Controller
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
    
    public function price_lists()
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
            'uri'=>base_url()."admin/price/price_lists",
            'searchtitle'=>array('产品编号'),
            'searchcondition'=>array('NUMBER'),
        	'searchkey'=>$searchkey,
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
    	$this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'product'));
        $this->load->module('/admin/frames/tools',array('article'=>true));
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'净值管理'),true);
        $tabledata['head'] = '编号_5%,产品编号_10%,产品名_25%,净值_10%,累计净值_10%,日期_10%,操作_10%';
        $tabledata['rules']['order']=array('Id','NUMBER','NAME','price','pricesum','date');
        $tabledata['rules']['operate']=
            array(
	            'look'=>array(
	            	'action'=>'admin/price/price_view/',
            		'class'=>'jsLightControl',
	            	'id'=>'Id'),
	            'modify'=>array(
	            	'action'=>'admin/price/price_modify/',
	            	'class'=>'jsLightControl',
	            	'id'=>'Id'),
				'delete'=>array(
					'url'=>'admin/price/price_delete/',
					'id'=>'Id')
                );
        $sql = "select * from price";
        if($searchkey)
        {
        	$condition = $search['searchcondition'];
        	$temp ="";
        	foreach ($condition as $arr) 
        	if (!empty($arr))
        		$temp .= " OR ".$arr." LIKE '%".$searchkey."%' ";
        	$sql .= " WHERE (".substr($temp,4).")";
        	$sql .= " order by Id desc";
        	log_message("debug","---->".$sql);
        	//print_r($sql);exit();
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/price/price_lists/',4,$sql);
        }
        else
        {
       		$sql .= ' order by Id desc';
        	$data['lists'] = $this->mpublic->get_dates(base_url().'admin/price/price_lists/','4',$sql);
        	//print_r($data);exit();
        }
        $data['lists']['result'] = $this->mpublic->get_product_data( $data['lists']['result']);
        $data['lists']['result'] = $this->mpublic->remove_column($data['lists']['result'],$tabledata['rules']['order']);
        //print_r($data['lists']['result'] );exit();
        $tabledata['data'] = $data['lists']['result'];
        $tabledata['foot']= $data['lists']['page'];
        //print_r($data);exit();
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/price/price_lists.php',$data);
    }


    public function price_modify()
    {
    	$id = intval($this->uri->segment(4));
        $this->load->helper('resource');
    	//$this->load->module('/admin/frames/header');
        //$this->load->module('/admin/frames/left',array('type'=>'product'));
        //$this->load->module('/admin/frames/tools');
        if ($this->input->post('sub')) {
            $aid = $this->input->post('id');
            $data['NUMBER'] = $this->input->post('NUMBER');
            $data['price'] = $this->input->post('price');
            $data['pricesum'] = $this->input->post('pricesum');
            $data['date'] = $this->input->post('date');
            $data['modifytime'] = time();
            //print_r($aid);exit();
            $this->db->where('Id', $aid);
            $res = $this->db->update('price', $data);
	        $temp = array();
            if ($res) $temp['tip'] = '修改成功！';
            else $temp['tip'] = '修改失败！';
	        $temp['onurl'] = base_url()."admin/price/price_modify/".$aid;
            $temp['reurl'] = base_url()."admin/price/price_lists/";
            //print_r($temp);exit();
            //$this->load->module('/admin/frames/returnTip',$temp);
             $this->pub_success();
        } else {
	        $data['actUrl'] = base_url()."index.php/admin/price/price_modify";
	        $data['artcon'] = $this->mpublic->getList('price','',array('Id'=>$id));
	        $data['artcon'] = $this->mpublic->get_product_data($data['artcon']);
	        //print_r($data);exit();
		    $this->load->view('admin/price/price_create.php',$data);
        }
    }
    
    public function price_view(){
        $tip = intval($this->uri->segment(3));
    	$id = intval($this->uri->segment(4));
        $data['artcon'] = $this->mpublic->getList("price","",array('Id'=>$id));
    	//$this->load->module('/admin/frames/header');
        //$this->load->module('/admin/frames/left',array('type'=>'product','segpos'=>3));
        //$this->load->module('/admin/frames/tools');
        $data['title'] = $this->load->module('/admin/frames/content_title',array('title'=>'净值管理'),true);
        $data['artcon'] = $this->mpublic->get_product_data($data['artcon']);
        //print_r($data);exit();
        $this->load->view('admin/price/price_view.php',$data);
    }
    
    public function price_create()
    {
    	$this->load->helper('date');
        $datas['actUrl'] = base_url()."index.php/admin/price/price_create";
        $this->load->helper('resource');
        //$this->load->module('/admin/frames/header');
        //$this->load->module('/admin/frames/left',array('type'=>'product'));
        //$this->load->module('/admin/frames/tools');
        if ($this->input->post('sub')) {
        	$data['NUMBER'] = $this->input->post('NUMBER');
            $tmp = $this->mpublic->getRow("price","",array('NUMBER'=>$data['NUMBER']));
            if (!empty($tmp)) $data['productid'] = $tmp["Id"];
            $data['price'] = $this->input->post('price');
            $data['pricesum'] = $this->input->post('pricesum');
            $data['date'] = $this->input->post('date');
            $data['createtime'] = time();
            $res = $this->db->insert('price', $data);
            $temp = array();
            if ($res) $temp['tip'] = '修改成功！';
            else $temp['tip'] = '修改失败！';
	        $temp['onurl'] = base_url()."admin/price/price_create/";
            $temp['reurl'] = base_url()."admin/price/price_lists/";
            //print_r($temp);exit();
            //$this->load->module('/admin/frames/returnTip',$temp);
            $this->pub_success();
        } else {
            $datas['artcon'][0]['NUMBER'] = "";
            $datas['artcon'][0]['price'] = "";
            $datas['artcon'][0]['pricesum'] = "";
            $datas['artcon'][0]['date'] = mdate('%Y-%m-%d');
            $this->load->view('admin/price/price_create.php',$datas);
        }
    }
    
    public function price_delete(){
        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('price', array('Id' => $id));
        echo "<script>location.href='".base_url()."index.php/admin/price/price_lists';</script>";
    }
    
    
}