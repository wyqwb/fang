<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mpub extends CI_Model {
   // private $per_page;
    public function __construct()
    {
        parent::__construct();
        $this->per_page = $this->config->item('per_page');
        $this->load->library('formdebris');
        $this->load->database();
    }

    public function get_tree($data,$type=FALSE)
    {
        $this->load->library('Recursivejson');
    }

    //获取所有分类
    public function get_articlesort()
    {

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

	public function getViewRow($table,$id){
		$sql = "select * from  ".$table."  where id=".$id;
		//$sql =  "select ft.*,m.account name from member m,  fangtuan ft  where ft.isenable=1 and ft.mid=m.Id ";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->row_array();
	}


	public function get_fangtuan_ViewRow($table,$id){
		//$sql = "select * from  ".$table."  where id=".$id;
		$sql =  "select ft.*,m.account name from member m, fangtuan ft  where ft.isenable=1 and ft.mid=m.Id and ft.id=".$id;
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->row_array();
	}

	public function get_fang_ViewRow($table,$id){
		//$sql = "select * from  ".$table."  where id=".$id;
		$sql =  "select f.*,m.account name from member m, fang f  where f.isenable=1 and f.mid=m.Id and f.id=".$id;
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->row_array();
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
			$config['per_page'] = $limit != "" ? $limit : 10;
			$config['first_link'] = '首页';
			$config['last_link'] = '尾页';

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
			if($table=="fangtuan"){
				$data['result'] = $this->mpub->get_fangtuan_bypage($table,$fields,$where,$order,$config['per_page'],$this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0);
			}elseif($table=="article"){
				$data['result'] = $this->mpub->get_article_bypage($table,$fields,$where,$order,$config['per_page'],$this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0);
			}else{
				$data['result'] = $this->mpub->get_fang_bypage($table,$fields,$where,$order,$config['per_page'],$this->uri->segment($uri_segment) ? $this->uri->segment($uri_segment) : 0);
			}
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
	 * 获取数据信息
	 * */
	public function get_fangtuan_bypage($table,$fields="*",$where="",$order="",$perpage,$pageno) {
		$sql = "select ft.*,m.account name from member m,  fangtuan ft  where ft.isenable=1 and ft.mid=m.Id  order by createtime desc  limit ".$pageno.",".$perpage."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/*
	 * 获取数据信息
	 * */
	public function get_fang_bypage($table,$fields="*",$where="",$order="",$perpage,$pageno) {
		$sql = "select f.*,m.account name from fang f,member m  where f.isenable=1 and f.mid=m.Id  order by createtime desc  limit ".$pageno.",".$perpage."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}	

	public function get_article_bypage($table,$fields="*",$where="",$order="",$perpage,$pageno) {
		$sql = "select *  from article  where type=1 and pid=2  order by createtime desc  limit ".$pageno.",".$perpage."";
		//print_r($sql);die;
		$query = $this->db->query($sql);
		return $query->result_array();
	}	
}