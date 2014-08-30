<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-3-25
 * Time: 下午4:40
 * To change this template use File | Settings | File Templates.
 */
/*class Analytics extends CI_Controller
{
    public $db;
    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default',TRUE);
        $this->load->library('user_agent');
    }
    //判断SESSION ID 是否存在
    public function check_sessionid($sessionid)
    {
        $sql = "SELECT id FROM `analytics` WHERE `sessionid` = '$sessionid'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        if(empty($row))
        {
            return 0;
        }
        else
        {
            return $row['id'];
        }
    }

    public function track()
    {
		$seg1 = $this->uri->segment(1);
		if($seg1 != 'admin')
		{
			$sessionid = session_id();
			$arr = $this->uri->rsegment_array();
			$pid = $this->check_sessionid($sessionid);
			$data['sessionid'] = $sessionid;
			$data['pid'] = $pid;
			$data['uri'] = implode('#^#',$arr);
			$data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['uristring'] = $this->uri->uri_string()==''?'index':$this->uri->uri_string();
			$data['useragent'] = $_SERVER['HTTP_USER_AGENT'];
			$data['intime'] = $_SERVER['REQUEST_TIME'];
			$this->db->insert('analytics', $data);
		}
    }

}*/