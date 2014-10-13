<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
*/
class Adminlogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		if (!isset($this->session)) $this->load->library('session');
		date_default_timezone_set('Asia/Shanghai');
	}

	public function index()
	{
		if($this->input->post('sub'))
		{
			$name = $this->input->post('name');
			$pass = md5($this->input->post('password'));
			$sql = "SELECT * FROM `user` WHERE `name` = '".$name."' AND `password` = '".$pass."' and status=0";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			//如果没有匹配的用户名和密码
			if(empty($row))
			{
				$this->load->view('admin/login.html');
			}
			else
			{
				$arr = array('id'=>$row['id'],'name'=>$name,'power'=>$row['power']);
				$this->session->set_userdata($arr);
				//$user_IP = $_SERVER["REMOTE_ADDR"];
				//$sql = "UPDATE `pro_user` SET `user_login_time`='".date('Y-m-d H:i:s')."',`user_login_ip`='".$user_IP."' WHERE `user_id`=".$row['user_id'];
				//$query = $this->db->query($sql);
				header("Location: ".base_url()."index.php/admin/");
			}
		}
		else
		{
			$this->load->view('admin/login.html');
		}
		//$this->load->module('/admin/frames/header');
		//$this->load->module('/admin/frames/left',array('type'=>'article'));
		//$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>true));
		//$this->load->module('/admin/frames/article_center_content');
	}
	//退出
	function outlogin(){
		$this->session->sess_destroy();
		$this->load->view('admin/login.html');
	}
	
	
}