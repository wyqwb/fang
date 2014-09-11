<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Product extends AD_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mproduct');
    }

    public function index()
    {
        $this->header();
        $this->left();
        $this->tools();
        $this->welcome();
    }

    //产品列表
    public function lists()
    {
    	$this->header();
        $this->left();
        $this->tools();
        $this->load->model('admin/mproduct');
        $result = $this->mproduct->get_product_bypage();
        $tabledata['head'] = array(
            array('data'=>'产品编码','width'=>'15%'),
            array('data'=>'产品名称','width'=>'25%'),
            array('data'=>'产品名称(非会员)','class'=>'jsinput','width'=>'25%'),
            array('data'=>'产品类型','width'=>'15%'),
            array('data'=>'周期(天)','class'=>'tt','width'=>'10%'),
            array('data'=>'产品状态','width'=>'10%'),
            array('data'=>'专区类别','width'=>'10%'),
            array('data'=>'发布','width'=>'10%'),
            array('data'=>'首页 ','width'=>'10%'),
            array('data'=>'操作','class'=>'operate','width'=>'10%')
        );
        $tabledata['rules']['order']=array('NUMBER','NAME','title','PRODUCTTYPENAME','PRODUCTDEADLINE','PRODUCTSTATE','state','ishow','type');
        //$tabledata['rules']['default_checkbox']= array('classname'=>'js_recall','name'=>'type','id'=>'type');
        $tabledata['rules']['operate']=array(
        	'modify'=>array(
        		'action'=>'./admin/product/update',
        		'class'=>'jsLightControl',
        		'id'=>'NUMBER'
       		)
       	);
        $tabledata['data'] = $result['result'];
        $tabledata['foot']= $result['page'];
        //print_r($tabledata);exit();
        $this->load->library('formdebris');
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/product/product_list',$data);

    }

    public function update()
    {
        if($this->input->post('sub'))
        {
            $arr['NUMBER'] = $this->input->post('NUMBER');
            $arr['title'] = $this->input->post('title');
            $arr['state'] = $this->input->post('state');
            $arr['type'] = $this->input->post('type');
            $arr['ishow'] = $this->input->post('ishow');
            $arr['order'] = $this->input->post('order');
            $arr['video'] = $this->input->post('video');
            $arr['ctime'] = date('Y-m-d G:i:s');
            if (!$arr['ishow']) $arr['ishow'] = 0;
            if (!$arr['order']) $arr['order'] = 0;
            $this->mproduct->update_product($arr);
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'png|jpg|jpeg|pdf';
            $config['max_size'] = '2000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            if($_FILES['addfile']['name'] != ''){
	            if($this->upload->do_upload('addfile'))
	            {
	                $str = $this->upload->data();
	                $photo = $str['file_name'];
	                $this->mproduct->update_product_photo($arr['NUMBER'],$photo);
	
	            }
	            else {
	            	echo "上传首页图片文件错误! ";exit();
	            }
	        }
            if($_FILES['pdffile']['name'] != ''){
	            if($this->upload->do_upload('pdffile'))
	            {
	                $str = $this->upload->data();
	                $pdf = $str['file_name'];
	                $this->mproduct->update_product_pdf($arr['NUMBER'],$pdf);
	
	            }
	            else {
	            	echo "上传产品说明文件错误! ";exit();
	            }
	        }
	        $this->pub_success();
        }
        else
        {
            $data['number'] = $this->uri->segment(4);
            $data['newdata'] = $this->mproduct->get_product_by_number($data['number']);
            $data['olddata'] = $this->mproduct->get_sqlserver_bynumber($data['number']);
            if (sizeof($data['newdata']) == 0){
            	$data['newdata']['order'] = 0;
            	$data['newdata']['state'] = '自动分类'; 
            	$data['newdata']['NUMBER'] = $data['olddata']['NUMBER']; 
            	$data['newdata']['title'] = '';
            	$data['newdata']['pdf'] = '未定义';
            	$data['newdata']['photo'] = '';
            	$data['newdata']['video'] = '';
            	$data['newdata']['ishow'] = '0';
            	$data['newdata']['type'] = '0';
            }
            if ($data['olddata']['PRODUCTSTATE'] == $data['newdata']['state']) $data['newdata']['state'] ='自动分类';
            $data['olddata']['PRODUCTSTATE1'] = $data['olddata']['PRODUCTSTATE'].':'.$this->mproduct->_productstate($data['olddata']['PRODUCTSTATE']);
            $data['olddata']['PRODUCTTYPENAME'] = $data['olddata']['PRODUCTTYPENUMBER'].':'.$data['olddata']['PRODUCTTYPENAME'];
            $data['olddata']['PRODUCTSORTNAME'] = $data['olddata']['PRODUCTSORTNUMBER'].':'.$data['olddata']['PRODUCTSORTNAME'];
            $data['olddata']['SCALE'] = $data['olddata']['SCALE'].'('.$data['olddata']['CURRENCY'].')';
            $str = '01,02,03,04,05,06,07,11';
            if (strpos($str, $data['olddata']['PRODUCTTYPENUMBER']) === FALSE) $data['olddata']['PRODUCTTYPENUMBER'] = 'default';  
            $this->load->helper('resource');
            $this->load->view('admin/product/update',$data);
        }
    }


}