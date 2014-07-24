<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mquestion extends CI_Model {
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

    public function get_question_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('questionbank');
        $this->db->order_by('timecreated desc,id desc');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/questionbank/questionlist/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        $sql = "SELECT * FROM `questionbank` ORDER BY `id` desc  LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_classhour_bypage($pid)
    {
        $this->load->library('pagination');
        $this->db->from('course');
        $this->db->where('pid',$pid);
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/questionbank/questionlist/',$total_rows);
        $pageno = $this->uri->segment(5)?$this->uri->segment(5):0;
        $perpage = $this->perpage;
        $sql = "SELECT * FROM `course` WHERE `pid` = '$pid' ORDER BY `id` desc  LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        return $data;

    }

    public function get_papers_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('papersbank');
        $this->db->where('pid','0');
        $this->db->order_by('ctime desc,id desc');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/questionbank/paperlist/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        $sql = "SELECT * FROM `papersbank` WHERE `pid` = 0 ORDER BY `id` desc LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function get_course_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('course');
        $this->db->where('pid','0');
        $this->db->order_by('ctime desc,id desc');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/edu/courselist/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        $sql = "SELECT * FROM `course` WHERE `pid` = 0 ORDER BY `id` desc LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        return $data;

    }

    public function get_question_byid($id)
    {
        $sql = "SELECT * FROM `questionbank` WHERE `id` = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_courseclass_byid($id)
    {
        $sql = "SELECT * FROM `courseclass` WHERE `id` = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function get_course_byid($id)
    {
        $sql = "SELECT * FROM `course` WHERE `id` = '$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }


    public function get_all_questions()
    {
        $sql = "SELECT * FROM `questionbank` WHERE 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_course()
    {
        $sql = "SELECT * FROM `course` WHERE 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_all_courseclass()
    {
        $sql = "SELECT * FROM `courseclass` WHERE 1";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        return $data;
    }

}