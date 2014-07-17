<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mpub extends CI_Model {
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
	public function getList($table,$fields = "",$where = "") {
		if ($fields != "") {
			$this->db->select($fields);
		}
		if ($where != "") {
			$this->db->where($where);
		}
        $this->db->order_by('order desc, published desc');
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
		/* $tabledata['head'] = array(
				array('data'=>'标题','class'=>'','width'=>'25%'),
				array('data'=>'图片','class'=>'','width'=>'35%'),
				array('data'=>'修改时间','class'=>'','width'=>'30%'),
				array('data'=>'操作','class'=>'operate title blue','width'=>'10%'));
		$this->load->helper('packing');
		$tabledata['data'] = packing_photo($data['result'],array('photo'),array('style'=>'height:30px;','class'=>''));
		$tabledata['rules'] = array(
				'navname'=>array('news_title','photo','news_edit_time'),
				'operate'=>array('look'=>array('url'=>'admin/news/newslook/','id'=>'news_id'),
						'modify'=>array('url'=>'admin/news/newsmodify/','id'=>'news_id'),
						'delete'=>array('url'=>'admin/news/newsdelete/','id'=>'news_id')));
	
		$data['tableresult'] = $this->formdebris->packing_table($tabledata); */
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
	 * 获取数据信息
	 * */
	public function get_article_bypage($table,$fields="",$where="",$order="",$perpage,$pageno) {
		if ($fields != "") { 
			$this->db->select($fields);
		}
		if ($where != "") { 
			$this->db->where($where);
		}
		$order != "" ? $this->db->order_by($order) : $this->db->order_by('order desc, published desc');
		$this->db->limit($perpage,$pageno);
		$query = $this->db->get($table);
		//获取执行的sql;
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	
	
}
