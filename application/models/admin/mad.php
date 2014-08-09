<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mad extends CI_Model {
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

    public function get_ad_byid($id)
    {
        $sql = "SELECT * FROM `ad` WHERE `id` = '$id'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row;
    }

    public function get_ads_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('ad');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/ad/adlist/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        $sql = "SELECT a.*,b.title AS oname FROM `ad` a LEFT JOIN `org` b ON a.oid = b.id ORDER BY id DESC LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        $data['result']= $query->result_array();
        foreach($data['result'] as $k => $v)
        {
            if($v['previewimg']!= '')
            {
                $data['result'][$k]['previewimg'] = "<img src='".base_url().'uploads/'.$v['previewimg']."' style='width:auto;height:50px;' />";
            }
        }
        $data['page'] = $this->pagination->create_links();
        return $data;
    }
}