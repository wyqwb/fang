<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mfang extends CI_Model {
    // private $per_page;
    // public $perpage;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_record_by_typeid($id)
    {
        $sql = "SELECT * FROM `fang` WHERE pid = $id";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_fang_by_default()
    {
        $sql = "SELECT * FROM `fang`   order by createtime  desc limit 10";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }


    public function get_top_default()
    {
        $sql = "SELECT * FROM `fang`   order by `createtime` limit 10 ";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_recomment_default()
    {
        $sql = "SELECT * FROM `fang` where selected=1  order by `createtime` limit 3 ";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }


    public function get_record_by_id($id)
    { 
        $sql = "SELECT `title`,`subtitle`,`content`,DATE_FORMAT(FROM_UNIXTIME(createtime),'%Y/%m/%d') as createtime FROM `article` WHERE id = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public  function  exc_sql($sql){
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function insert_default_sql($table,$para)
    {
        $this->db = $this->load->database('default',TRUE);
        $this->db->insert($table,$para);
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
        //log_message("debug","---***--->data:".$data."where:".$where);
        return $result;
    }

}