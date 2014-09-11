<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Login extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpub');
		$this->load->library('session');
		$this->load->helper('cookie');
	} 

	/**
	 * 默认首页
	*/
	 public function index()
	{
		// $this->front_header('index');
		$this->load->view('web/login/login.php');
	}

	public function act(){
		if(isset($_REQUEST['password']) && !empty($_REQUEST['password']) && isset($_REQUEST['username']) && !empty($_REQUEST['username'])){
			$password = md5($_REQUEST['password']);
		 	$table = 'member';
			$where ="account = '{$_REQUEST['username']}' and password='{$password}'";
			$result = $this->mpub->getRow($table,$fields = "",$where);
			if(count($result) >1){
				$login_session = array('islogin'=>1,
		 			'userid'=>$result['Id']
		 		);
		 		set_cookie("username",$result['account'],72000);  
			   	set_cookie("accountype",$result['accountype'],72000); 
				$this->session->set_userdata($login_session);
				exit("1");
			}else{
				exit("-1");
			}
		}	
	}

	public static function  clear_dir($dir){
		if(is_dir($dir)){
		    $fp=opendir($dir);
		    while (($fstr=readdir($fp)) !== false){
			if ($fstr != "." && $fstr != "..") {
			    $fname=$dir.'/'.$fstr;
			    if(is_dir($fname)){   
				    self::clear_dir($fname);                        
			    }else{
				if(is_file($fname)){
				    unlink($fname);
				}                    
			    }
			}
		    }
		    return true;
		}else{
		    return false;
		}
    } 
} 
