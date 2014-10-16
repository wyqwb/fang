<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Morder extends CI_Model {
    // private $per_page;
    public $perpage;
    public function __construct()
    {
        parent::__construct();
        $this->perpage = $this->config->item('perpage');
        $this->load->library('formdebris');
        $this->load->library('recursivejson');
        $this->load->database();
    }

    public function get_order_byid($id)
    {
        $sql = "SELECT a.*,b.account AS account FROM `orders` a LEFT JOIN `member` b ON a.mid = b.id WHERE a.id = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }

    public function get_searchorder()
    {
        $searchcondition = explode('%',$this->input->post('searchcondition'));
        $searchkey = trim($this->input->post('searchkey'));
        $likearr = array();
        foreach($searchcondition as $row)
        {
            if(!empty($row))
            {
                $likearr[$row] = $searchkey;
            }
        }
        $this->db->select('orders.*,member.account AS account,fangtuan.title AS title ');
		
        $this->db->join('member', 'orders.mid = member.Id');
		$this->db->join('fangtuan', 'orders.tuanid = fangtuan.id');

       // print_r($likearr);die;
        $this->db->or_like($likearr);
        $query = $this->db->get('orders');

        //echo $this->db->last_query();
        $result =  $query->result_array();
        foreach($result as $k => $v)
        {
            if($v['state']==0){
                $result[$k]['typestr'] = "完成";
            }
            else if($v['state']== '1')
            {
                $result[$k]['typestr'] = "进行中";
            }
            else if($v['state']== '2')
            {
                $result[$k]['typestr'] = "待确认";
            }
        }
        return $result;

    }
    public function get_orders_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('orders');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/orders/orderlist/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        //$sql = "SELECT a.*,b.account AS account FROM `orders` a LEFT JOIN `member` b ON a.mid = b.Id ORDER BY a.id DESC LIMIT $pageno,$perpage";
        $sql = "SELECT a.*,b.account AS account, c.title  FROM `orders` a, `member` b , `fangtuan`  c  where a.mid = b.Id and a.tuanid=c.id  ORDER BY a.id DESC  LIMIT $pageno,$perpage";

        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        foreach($data['result'] as $k => $v)
        {
            if($v['state']==0){
                $data['result'][$k]['typestr'] = "完成";
            }
            else if($v['state']== '1')
            {
                $data['result'][$k]['typestr'] = "进行中";
            }
            else if($v['state']== '2')
            {
                $data['result'][$k]['typestr'] = "待确认";
            }
  
        }
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

}