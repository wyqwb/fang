<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mpublic extends CI_Model {
	private $per_page;
	public function __construct()
	{
		parent::__construct();
		$this->per_page = $this->config->item('perpage');
		//$this->load->library('formdebris');
	}
	
	/**
	 * 查询列表数据
	 * $table 表名
	 * $fields 字段名,多个以,隔开。默认为全部
	 * $where 条件（一维数组的形式 或者 where语句)
	 * */
	public function getList($table,$fields = "",$where = "",$num=null,$offset=null) {
		if ($fields != "") {
			$this->db->select($fields);
		}
		if ($where != "") {
			$this->db->where($where);
		}
		if(!empty($num) && !empty($offset)){
			 $query = $this->db->get($table,$num,$offset);
		}else{
			 $query = $this->db->get($table);
		} 
		$result = $query->result_array();
		//echo $this->db->last_query();
		return $result;
	}


	/**
	 * 查询列表数据
	 * $table 表名sql SEARVER
	 * $fields 字段名,多个以,隔开。默认为全部
	 * $where 条件（一维数组的形式 或者 where语句)
	 * */
	public function getList_sqlserver($table,$fields = "",$where = "",$offset=null,$num=null) {
		$this->db1 = $this->load->database('sqlserver',TRUE);
		if ($fields != "") {
			$this->db1->select($fields);
		}
		if ($where != "") {
			$this->db1->where($where);
		}
		$query = $this->db1->get($table,$offset,$num);
		$result = $query->result_array();
		//echo $this->db->last_query();
		return $result;
	}

	/**
	 * 获取单条数据
	 * $table 表名
	 * $fields 字段名,多个以,隔开。默认为全部
	 * $where 条件（一维数组的形式 或者 where语句)
	 * */
	public function getRow($table,$fields = "",$where = ""){
		if ($fields != "") {
			$this->db->select($fields);
		}
		if ($where != "") {
			$this->db->where($where);
		}
		$query = $this->db->get($table);
		$result = $query->row_array();
		return $result;
	}
	
	/**
	 * 获取单条数据
	 * $table 表名
	 * $fields 字段名,多个以,隔开。默认为全部
	 * $where 条件（一维数组的形式 或者 where语句)
	 * */
	public function getsqlRow($table,$fields = "",$where = ""){
		$this->db1 = $this->load->database('sqlserver',TRUE);
		if ($fields != "") {
			$this->db1->select($fields);
		}
		if ($where != "") {
			$this->db1->where($where);
		}
		$query = $this->db1->get($table);
		$result = $query->row_array();
		return $result;
	}
	
	/** 查询数据
	 * $url 路径
	 * $uri_segment 分页数是url的第几个
	 * $table 表名称
	 * $fields 字符串 ——字段名称，多个以,分隔
	 * $where 条件（一维数组的形式 或者 where语句)
	 * $limit 条件
	 * $order 条件
	 * @param String $url
	 * @return BOOLEAN
	 */
	public function get_dates($url,$uri_segment,$table,$fields="",$where="",$limit="",$order="",$bulkoperations=false){
		if(!is_array($bulkoperations))
		{
			$this->load->library('pagination');
			$config['base_url'] = $url;
			$config['total_rows'] = $this->mpub->get_no($table,$where);
			$config['uri_segment'] = $uri_segment;
			$config['total_switch'] = true;
			$config['per_page'] = $limit != "" ? $limit : $this->per_page;
			$config['first_link'] = '';
			$config['last_link'] = '';
			$config['next_link'] = ' ';
			$config['prev_link'] = ' ';
			$config['prev_tag_open'] = '<span class="one">';
			$config['prev_tag_close'] = '</span>';
			$config['next_tag_open'] = '<span class="end">';
			$config['next_tag_close'] = '</span>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="cur">';
			$config['cur_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$data['result'] = $this->mpub->get_article_bypage($table,$fields,$where,$order,$config['per_page'],$this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0);
			$data['page'] = $this->pagination->create_links();
		}
		else
		{
			$data['result'] = $bulkoperations;
		}
		return $data;
	}
	/*
	 * 获取总数据
	 * */
	public function get_no($table,$where=""){
		$this->db->select('count(*) as no');
		if ($where != "") {
			$this->db->where($where);
		}
		$query = $this->db->get($table);
		$row = $query->row_array();
		return $row['no'];
	}

	/*
	 * 获取总数据
	 * */
	public function get_no_sqlserver($table,$where=""){
		$this->db1 = $this->load->database('sqlserver',TRUE);
		$this->db1->select('count(*) as no');
		if ($where != "") {
			$this->db1->where($where);
		}
		$query = $this->db1->get($table);
		$row = $query->row_array();
		return $row['no'];
	}
	
	/*
	 * 根据Product,获得SQL值
	 * */
	
	public function get_product_data($data){
		if (sizeof($data) == 0 ) return $data;
		$this->db1 = $this->load->database('sqlserver',TRUE);
		$ids = "";
		foreach ($data as $arr){
			$ids .=",'".$arr['NUMBER']."'";
		}
		$ids = substr($ids,1);
		$query = $this->db1->query("SELECT * FROM cv_bas_ProductProject WHERE NUMBER IN (".$ids.")");
		$product = $query->result_array();
		foreach ($product as $arr){
			foreach($data as $key => $value)
				if ($value['NUMBER'] == $arr['NUMBER']){
					$data[$key]["NAME"] = $arr["NAME"];
					$data[$key]["PROJECTDATE"] = $arr["PROJECTDATE"];
					$data[$key]["PRODUCTTYPENUMBER"] = $arr["PRODUCTTYPENUMBER"];
					$data[$key]["PRODUCTTYPENAME"] = $arr["PRODUCTTYPENAME"];
					$data[$key]["PRODUCTSORTNUMBER"] = $arr["PRODUCTSORTNUMBER"];
					$data[$key]["PRODUCTSORTNAME"] = $arr["PRODUCTSORTNAME"];
					$data[$key]["PRODUCTDEADLINE"] = round($arr["PRODUCTDEADLINE"]/365)."年";
					$data[$key]["SCALE1"] = $arr["SCALE"];
					$data[$key]["CURRENCY"] = $arr["CURRENCY"];
					$data[$key]["YEARINCOMERATE"] = $arr["YEARINCOMERATE"];
					$data[$key]["SUBSCRIBEPRODUCTDOWN"] = $arr["SUBSCRIBEPRODUCTDOWN"];
					$data[$key]["FUNDINGDATE"] = $arr["FUNDINGDATE"];
					$data[$key]["PRODUCTSTATE"] = $arr["PRODUCTSTATE"];
				} 
		}
		//print_r($product);exit();
		return $data;
	}
	
	public  function  exc_sql($sql){
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	

	/**
	 * update更新记录 
	 * 
	 * @param mixed $table 
	 * @param mixed $data 
	 * @param mixed $where 
	 * @access public
	 * @return void
	 */
	public function update($table,$data,$where){
		$result = $this->db->update($table,$data,$where);
		// log_message("debug","---***--->data:".$data."where:".$where);
		return $result;
	}
	
	public function getProductList($id,$userid)
	{
		$user = $userid;
		$this->db1 = $this->load->database('sqlserver',TRUE);
    	$this->db2 = $this->load->database('default',TRUE);
    	$sql = "select NUMBER from member where Id=$userid";
    	$member = $this->db2->query($sql);
    	$member = $member->result_array();
    	$userid = $member[0]["NUMBER"];
    	$data = array();
		if(1==$id)
		{
        	$sql = "select * from reservation where memberid='$user'";
        	$products = $this->db2->query($sql);
        	$products = $products->result_array();
        	foreach ( $products as $value)
        	{
        		$list = array();
        		$sql = "select * from cv_bas_ProductProject where NUMBER='".$value["NUMBER"]."'";
				$product =   $this->db1->query($sql); 
				$product = $product->result_array(); 
				if(count($product)==1) 
				{
					$list = $product[0];
					
					$list["Rate"] = "5.3%";
					if(0==$list["STATE"]||1==$list["STATE"])
						$list["StateTo"] = "募集中";
					else if(2==$list["STATE"])
						$list["StateTo"] = "已成立";
					else if(3==$list["STATE"])
						$list["StateTo"] = "已兑付";
					else
						$list["StateTo"] = "";
					$list["STATE"] = $value["state"];
					$list["PROJECTDATE"] = date("Y-m-d",strtotime($list["PROJECTDATE"]));
					$list["CITY"] = $value["city"];
					$list["AMMONT"] = $value["amount"];
					$list["PRODUCTDEADLINE"] =round($list["PRODUCTDEADLINE"]/365)."年";
					$data[] = $list;
				}
        	}
		}
		else
		{
			$sql = "select * from cv_bas_SubscribeRegister SR,cv_bas_ProductProject PP" .
					" where SR.CUSTOMERNUMBER='$userid' and SR.PRODUCTNUMBER=PP.NUMBER";
			if(3==$id)
			{
				$sql .= " AND PP.PRODUCTSTATE=4";
			}
	    	$products = $this->db1->query($sql);
	    	$products = $products->result_array();
	    	
	    	foreach ( $products as $value )
	    	{
				//积分
				$score = "select * from member where Id=$user";
				$score = $this->db2->query($score);
        		$score = $score->result_array();
        		$score = $score[0];
        		$rate = 0;
        		if("至友级"==$score["rank"])
        			$rate = 1.0;
        		else if("享友级"==$score["rank"])
        			$rate = 1.1;
    			else if("尊友级"==$score["rank"])
        			$rate = 1.2;
    			else if("荣友级"==$score["rank"])
        			$rate = 1.5;
				
				$list["Rate"] = "5.3%";
				$list["POINT"] = (($value["SUBSCRIBEMONEY"])/10000)*$rate;
				$list["POINT"] = round($list["POINT"]);
				
				$list["NAME"]=$value["NAME"];
				$list["PRODUCTTYPENAME"]=$value["PRODUCTTYPENAME"];
				$list["SUBSCRIBESHARE"]=$value["SUBSCRIBESHARE"];
				$list["PRODUCTDEADLINE"]=round($value["PRODUCTDEADLINE"]/365)."年";
				if(""!=$value["RETURNDATE"])
					$list["RETURNDATE"]=date("Y-m-d",strtotime($value["RETURNDATE"]));
				else
					$list["RETURNDATE"] = $value["RETURNDATE"];
				if(""!=$value["FUNDINGDATE"])
					$list["FUNDINGDATE"]=date("Y-m-d",strtotime($value["FUNDINGDATE"]));
				else
					$list["FUNDINGDATE"] = $value["FUNDINGDATE"];
				//$list["NAME"]=$value["PP.NAME"];
				
				
				if(2==$id)
					$list["SERACH"] = "净值查询";
				else if(3==$id)
					$list["SERACH"] = "净值查询";
				$list["NUMBER"] = $value["PRODUCTNUMBER"];
				$data[] = $list;  
			}
		}
		return $data;
	}
	public function getProductAppointment($product_id)
	{
		$this->db1 = $this->load->database('sqlserver',TRUE);
		$sql = "select * from cv_bas_ProductProject where NUMBER='".$product_id."'";
		$product = $this->db1->query($sql);
    	$product = $product->result_array();
    	if(count($product)==0)
    		$product = null;
    	return $product;
	}
	public function getCityList() {
		$this->db2 = $this->load->database('default',TRUE);
	    $query = $this->db2->query("select name from dictdata where type='城市'");
		$result = $query->result_array();
		//echo $this->db->last_query();
		return $result;
	}
	public  function  exc_default_sql($sql){
		$this->db = $this->load->database('default',TRUE);
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public  function  exc_sqlserver_sql($sql){
		$this->db = $this->load->database('sqlserver',TRUE);
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function insert_default_sql($table,$para)
	{
		$this->db = $this->load->database('default',TRUE);
		$this->db->insert($table,$para);
	}
	
}
