<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Track extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
        $this->perpage = $this->config->item('perpage');

        $this->load->library('formdebris');
        $this->load->library('recursivejson');
        $this->load->database();
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->header();
        $this->left();
		////$this->load->module('/admin/frames/tools',array('arr'=>array('point','article')));
        $this->tools();
        $this->welcome();
    }

    public function get_trackmsg_bypage()
    {

        $this->db->from('analytics');
        $this->db->where('`pid` = 0');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/track/track_list/',$total_rows);
        $pageno = $this->uri->segment(4,0);
        $perpage = $this->perpage;
        $sql = "SELECT * FROM `analytics` WHERE `pid` = 0 ORDER BY `id` DESC LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        $data['result']= $query->result_array();
        $this->load->library('timeformat');
        $data['result'] = $this->timeformat->format_array($data['result'],array('intime'),'Y-m-d H:i:s');
        $data['page'] = $this->pagination->create_links();
        return $data;
    }

    public function track_list()
    {
        $tabledata['head'] = 'IP地址_25%,访问页面_25%,来访时间_25%,操作_20%';
        $tabledata['rules']['order']=array('ip','uristring','intime');
        $data['lists'] =  $this->get_trackmsg_bypage();
        $tabledata['data'] = $data['lists']['result'];
        $tabledata['rules']['default_checkbox']= false;
        $tabledata['rules']['operate']=array('look'=>array('action'=>'./admin/track/track_item','class'=>'jsLightControl','id'=>'id'));
        $tabledata['foot']= $data['lists']['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->header();
        $this->left();
        $this->tools();
        $this->load->view('admin/track/tracklist',$data);

    }

    public function get_trackmsg_bypid($pid)
    {
        $sql = "SELECT * FROM `analytics` WHERE `pid` = '$pid'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function track_item()
    {
        $pid = $this->uri->segment(4);
        $this->load->helper('resource');
        $result = $this->get_trackmsg_bypid($pid);
        $tabledata['head'] = array(
            array('data'=>'IP地址','width'=>'10%'),
            array('data'=>'访问页面','width'=>'10%'),
            array('data'=>'访问时间','width'=>'10%'),
            array('data'=>'客户信息','width'=>'70%')
        );
        //$tabledata['head'] = '编号_5%,标题_50%,类型_10%,日期_20%,周期(天)_10%,状态_10%';
        $tabledata['rules']['order']=array('ip','uristring','intime','useragent');
        $tabledata['rules']['default_checkbox']= false;
        $tabledata['data'] = $result;
        $tabledata['foot']= '';
        $this->load->library('formdebris');
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/track/track_item',$data);
    }



}