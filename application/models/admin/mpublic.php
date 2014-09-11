<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mpublic extends CI_Model {
   // private $per_page;
    public function __construct()
    {
        parent::__construct();
        $this->per_page = $this->config->item('per_page');
        $this->load->library('formdebris');
        $this->load->database();
    }

 	/**
	 * 查询列表数据
	 * $table 表名
	 * $fields 字段名,多个以,隔开。默认为全部
	 * $where 条件（一维数组的形式 或者 where语句)
	 * */
	public function getList($table,$fields = "",$where = "") {
		if ($fields != "") {
			$this->db->select($fields);
		}
		if ($where != "") {
			$this->db->where($where);
		}
		$query = $this->db->get($table);
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
	public function get_dates($url,$uri_segment,$sql){
		$this->load->library('pagination');
		$config['base_url'] = $url;
		$config['total_rows'] = $this->get_no($sql);
		$config['uri_segment'] = $uri_segment;
		$config['total_switch'] = true;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['per_page'] = $this->per_page;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="curr">';
		$config['cur_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['result'] = $this->get_data_bypage($sql,$this->per_page,$this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0);
		$data['page'] = $this->pagination->create_links();
		return $data;
	}
	/*
	 * 获取总数据
	 * */
	public function get_no($sql){
		$query = $this->db->query("SELECT COUNT(*) as no FROM ($sql) t");
		$row = $query->row_array();
		return $row['no'];
	}
	
	
	public function get_product_data($data){
		//print_r($data);exit();
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
					$data[$key]["PRODUCTDEADLINE"] = $arr["PRODUCTDEADLINE"];
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
	

	public function remove_column($data,$columns){
		$result = array();
		foreach($data as $arr){
			
			$temp = array();
			foreach($columns as $col){
				$temp[$col] = $arr[$col];
			}
			array_push($result, $temp);
		}
		return $result;
	}
	/*
	 * 获取数据信息
	 * */
	public function get_data_bypage($sql,$perpage,$pageno) {
		$sql = "SELECT * FROM ($sql) t LIMIT $pageno,$perpage";
		log_message("debug","---***--->".$sql);
		$query = $this->db->query($sql);
		return $query->result_array();
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
		$result = $this->db->update($tablt,$data,$where);
		log_message("debug","---***--->data:".$data."where:".$where);
		return $result;
	}
}
