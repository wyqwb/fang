<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mad extends CI_Model {
    // private $per_page;
    // public $perpage;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_ad_by_id($id)
    {
        $sql = "SELECT * FROM `ad` WHERE `id` = $id";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_index_ad()
    {
        $sql = "SELECT * FROM `ad` limit 0 ,5";
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