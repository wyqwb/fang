<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mproduct extends CI_Model {
    // private $per_page;
    public $perpage;
    public $db2;
    public $db1;
    public function __construct()
    {
        parent::__construct();
        $this->perpage = $this->config->item('perpage');
        $this->db1 = $this->load->database('sqlserver',TRUE);
        $this->db2 = $this->load->database('default',TRUE);
    }

    public function count_product_all_results()
    {
    	$db1 = $this->load->database('sqlserver',TRUE);
    	$sql = "select count(*) as no from (select distinct NUMBER from cv_bas_ProductProject) t";
    	$query = $db1->query($sql);
    	$result = $query->row_array();
    	return $result['no'];
    	
    }
    public function get_product_by_number($number)
    {
        $sql = "SELECT * FROM `product` WHERE `NUMBER` = $number";
        $query = $this->db2->query($sql);
        return $query->row_array();

    }
    public function get_sqlserver_bynumber($number)
    {
   		$sql = "SELECT *
           FROM cv_bas_ProductProject
           WHERE NUMBER = $number";
        $query = $this->db1->query($sql);
        $result = $query->row_array();
        return $result;
    }


    public function update_product($arr)
    {

        $number = $arr['NUMBER'];
        $sql = "SELECT COUNT(1) AS no FROM `product` WHERE `NUMBER` = '$number'";
        $query = $this->db2->query($sql);
        $row = $query->row_array();
        //这里表示新数据
        if($row['no'] == 0 )
        {
            $this->db2->insert('product', $arr);
        }
        //这里表示更新就数据
        else
        {
            $this->db2->where('NUMBER', $arr['NUMBER']);
            $this->db2->update('product', $arr);
        }
    }

    public function update_product_photo($number,$photo)
    {
        $data['photo'] = $photo;
        $this->db2->where('NUMBER', $number);
        $this->db2->update('product', $data);
    }
    public function update_product_pdf($number,$pdf)
    {
        $data['pdf'] = $pdf;
        $this->db2->where('NUMBER', $number);
        $this->db2->update('product', $data);
    }
    
    public function get_product_bypage()
    {
    	
        $this->load->library('pagination');
        $db1 = $this->load->database('sqlserver',TRUE);
    	$total_rows = $this->count_product_all_results();
        $this->pagination->my_initialize(base_url().'admin/product/lists/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):1;
        $perpage = $this->perpage;
        $from = ($pageno==1)?$pageno:$pageno+1;
        $start = ($pageno==1)?0:$pageno;
        $to = $from + ($perpage-1);
        if ($db1->dbdriver == 'mysql')
        	$sql = "SELECT DISTINCT NUMBER,PRODUCTTYPENAME,NAME,PRODUCTDEADLINE,PRODUCTSTATE
                FROM cv_bas_ProductProject order by NUMBER LIMIT $start , $perpage";
        else 
        	$sql = "SELECT * FROM  
					(SELECT *,(Row_number() over(order by NUMBER)) as RowNumber FROM
 					(SELECT DISTINCT NUMBER,PRODUCTTYPENAME,NAME,PRODUCTDEADLINE,PRODUCTSTATE
 					FROM cv_bas_ProductProject) a) b WHERE RowNumber between $from and $to";
        $query = $db1->query($sql);
        $result = $query->result_array();
        $query = $this->db2->query("SELECT * FROM product");
        $mysqldata = $query->result_array();
        //print_r($mysqldata);exit();
        foreach($result as $key => $row){
        	foreach($mysqldata as $arr)
        	if ($row["NUMBER"] == $arr["NUMBER"]){
        		$result[$key]['title'] = $arr['title'];
        		if ($arr['state']=='自动分类')
        			$result[$key]['state'] = self::_productstate($result[$key]['PRODUCTSTATE']);
        		else
        			$result[$key]['state'] = $arr['state'].'(手动)';
        		
        		$result[$key]['type'] = $arr['type'];
        		$result[$key]['ishow'] = $arr['ishow'];
        	};
        	if (!isset($result[$key]['title'])) {
        		$result[$key]['title'] = '';
        		$result[$key]['state'] = self::_productstate($result[$key]['PRODUCTSTATE']);
        		$result[$key]['type'] = '0';
        		$result[$key]['ishow'] = '0';
        	};
        	switch ($result[$key]['PRODUCTSTATE']){
        		case '0' : $result[$key]['PRODUCTSTATE'] .= ':立项';break;
        		case '1' : $result[$key]['PRODUCTSTATE'] .= ':在售';break;
        		case '2' : $result[$key]['PRODUCTSTATE'] .= ':存续';break;
        		case '3' : $result[$key]['PRODUCTSTATE'] .= ':已兑付';break;
        	}
        	
        }
        $data['result']= $result;
        $data['page'] = $this->pagination->create_links();
        return $data;
    }
    
    public function _productstate($data){
    	$result = '';
    	if($data < 2) $result = '募集中';
    	if($data == 2) $result = '已成立';
    	if($data == 3) $result = '已兑付';
    	return $result;
    }

    //插入新的数据
    public function insert_product()
    {
        $data['NUMBER'] = $number = $this->input->post('number');
        $data['title'] = $this->input->post('title');
        $data['state'] = $this->input->post('state');
       // $income = $this->input->post('income');
        $sql = "SELECT id FROM product WHERE NUMBER = $number";
        $query = $this->db2->query($sql);
        $row = $query->row_array();
        //这里表示第一次插入
        if(empty($row))
        {
            $data['pid']=0;
            $this->db2->insert('product', $data);
        }
        else
        {
            $this->db->where('id', $row['id']);
            $res = $this->db->update('product', $data);
        }
    }

//    public function get_state_by_number($number)
//    {
//        if ($this->db1->dbdriver == 'mysql')
//        	$sql = "SELECT NUMBER,PRODUCTTYPENAME,NAME,PROJECTDATE,PRODUCTDEADLINE,PRODUCTSTATE
//        		FROM cv_bas_ProductProject WHERE NUMBER = $number";
//        else
//    		$sql = "SELECT
//                    [NUMBER],
//                    [PRODUCTTYPENAME],
//                    [NAME],
//                    [PROJECTDATE],
//                    [PRODUCTDEADLINE],
//                    [PRODUCTSTATE]
//                FROM [cv_bas_ProductProject]
//                WHERE [NUMBER] = $number";
//        $query = $this->db1->query($sql);
//        $result = $query->row_array();
//        return $result;
//    }
//
//    public function get_title_by_number($number)
//    {
//        $sql = "SELECT * FROM product WHERE NUMBER = $number AND pid = 0";
//        $query = $this->db2->query($sql);
//        $row =  $query->row_array();
//        if(!empty($row))
//        {
//            return $row['title'];
//        }
//        else
//        {
//            return '';
//        }
//    }

}