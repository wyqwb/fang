<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * administrator-center
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-10
 * Time: 20:20
*/
class Administrator extends AD_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('resource');
		$this->config->load('admin_config');
		$this->menu = $this->config->item('admin_menu');
	}

	public function index()
	{
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$this->welcome();
	}
	
	public function home()
	{
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$this->load->view('admin/administrator/administrator_center_content');
	}
	
	public function lists()
	{
		$query = $this->db->get('user');
		$data['list'] = $query->result_array();
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$this->load->view('admin/administrator/administrator_org',$data);
	}
	
	public function administrator_add()
	{
		$datas['actUrl'] = base_url()."admin/administrator/administrator_add";
		
		if ($this->input->post('sub')) {
			$data['name'] = $this->input->post('name');
			$data['password'] = md5(trim($this->input->post('password')));
			$rpwd = md5(trim($this->input->post('rpassword')));
			if ($data['password'] != $rpwd) {
				echo "<script>alert('密码与确认密码不一致，请重新填写！');location.href='".base_url()."index.php/admin/administrator/administrator_add';</script>";
			}
			$res = $this->db->insert('user', $data);
			if ($res) {
				echo "<script>alert('添加成功！');location.href='".base_url()."index.php/admin/administrator/administrator_add';</script>";
			} else {
				echo "<script>alert('添加失败！');location.href='".base_url()."index.php/admin/administrator/administrator_add';</script>";
			}
		}
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$datas['power'] = array();
		$this->load->view('admin/administrator/administrator_add',$datas);
	}
	
	public function administrator_power(){
		$urlid = intval($this->uri->segment(4));
		$datas['actUrl'] = base_url()."admin/administrator/administrator_power";
		//print_r($datas['power']);exit();
		if ($this->input->post('sub')) {
			$power = "";
			foreach ($_REQUEST as $key => $arr){
				if (substr($key,0,5) == 'power')$power .= $arr;
			}
			$id = $this->input->post('id');
			$data['power'] = $power;
			$this->db->where('id', $id);
			$res = $this->db->update('user', $data);
			if ($res) {
				echo "<script>alert('修改成功！');location.href='".base_url()."index.php/admin/administrator/lists';</script>";
			} else {
				echo "<script>alert('修改失败！');location.href='".base_url()."index.php/admin/administrator/lists';</script>";
			}
		}
		$this->db->where('id', $urlid);
		$query = $this->db->get('user');
		$datas['user'] = $query->row_array();
		$menu = $this->menu;
		$datas['power'] = array();
		foreach($menu['cn']['header'] as $arr) {
			$key = $arr['action'];
			$keyarr = explode('/',$key);
			$key = $keyarr[1];
			if (isset($menu['cn']['left'][$key])){
				$subarr = $menu['cn']['left'][$key];
				foreach($subarr as $arr1){
					$subarr1 = $arr1['child'];
					foreach($subarr1 as $arr2){
						$temp = array();
						$temp['Name1'] = $arr['title'];
						$temp['rowspan1'] = sizeof($subarr)*sizeof($subarr1);
						$temp['Name2'] = $arr1['title'];
						$temp['rowspan2'] = sizeof($subarr1);
						$temp['Name3'] = $arr2['title'];
						$temp['rowspan3'] = 1;
						array_push($datas['power'],$temp);
					}
				}
			}
			else {
				$temp['Name1'] = $arr['title'];
				$temp['rowspan1'] = 1;
				$temp['Name2'] = '';
				$temp['rowspan2'] = 0;
				$temp['Name3'] = '';
				$temp['rowspan3'] = 0;
				array_push($datas['power'],$temp);
			}
		};
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$this->load->view('admin/administrator/administrator_power',$datas);
	}
	
	
	public function administrator_edit()
	{
		$urlid = intval($this->uri->segment(4));
		$datas['actUrl'] = base_url()."admin/administrator/administrator_edit";
		if ($this->input->post('sub')) {
			$id = $this->input->post('id');
			$data['name'] = $this->input->post('name');
			$data['password'] = md5(trim($this->input->post('password')));
			$rpwd = md5(trim($this->input->post('rpassword')));
			if ($data['password'] != $rpwd) {
				echo "<script>alert('密码与确认密码不一致，请重新填写！');location.href='".base_url()."index.php/admin/administrator/administrator_add';</script>";
			}
			$this->db->where('id', $id);
			$res = $this->db->update('user', $data);
			if ($res) {
				echo "<script>alert('修改成功！');location.href='".base_url()."index.php/admin/administrator/administrator_edit';</script>";
			} else {
				echo "<script>alert('修改失败！');location.href='".base_url()."index.php/admin/administrator/administrator_edit';</script>";
			}
		}
		$this->db->where('id', $urlid);
		$query = $this->db->get('user');
		$datas['user'] = $query->row_array();
		$this->load->module('/admin/frames/header');
		$this->load->module('/admin/frames/left',array('type'=>'administrator'));
		$this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
		$this->load->view('admin/administrator/administrator_add',$datas);
	}
	public function administrator_delete(){
		$id = intval($this->uri->segment(4));
		$res = $this->db->delete('user', array('id' => $id));
		header("Content-Type:text/html;charset=utf-8");
		if ($res) {
			echo "<script>alert('删除成功！');location.href='".base_url()."index.php/admin/administrator/lists';</script>";
		} else {
			echo "<script>alert('删除失败！');location.href='".base_url()."index.php/admin/administrator/lists';</script>";
		}
	}
	
	
	
	
}