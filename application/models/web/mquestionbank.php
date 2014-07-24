<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mquestionbank extends CI_Model {
    // private $per_page;
    // public $perpage;
    public function __construct()
    {
        parent::__construct();
        // s$this->perpage = $this->config->item('perpage');
        // $this->load->library('formdebris');
        //$this->load->library('recursivejson');
        $this->load->database();
    }

    public function get_all_questions_by_type($type)
    {
        $sql = "SELECT `id`,`title`,`pic`,`a`,`b`,`c`,`d` FROM `questionbank` WHERE type = $type";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_questions()
    {
        $sql = "SELECT `id`,`title` FROM `questionbank` WHERE 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_temp_score($userid)
    {
        $sql = "SELECT `score` FROM `examresault` WHERE userid=".$userid." and examstatus=1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_final_score($userid)
    {
        $sql = "SELECT `score` FROM `examresault` WHERE userid=".$userid." order by timeModify desc limit 1";
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