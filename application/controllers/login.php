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
		$this->load->helper('captcha');
	} 

	/**
	 * 默认首页
	*/
	 public function index()
	{
		$this->load->view('web/login/login.php');
	}


	/**
	 * 默认首页
	*/
	 public function index_bk()
	{
		$this->load->helper('captcha');
		$captchaDir = dirname(dirname(dirname(__FILE__))).'/captcha';
		self::clear_dir($captchaDir);
		$vals = array(
		    'word' => rand(1000,10000),
		    'img_path' => './captcha/',
		    'img_url' => base_url().'/captcha/',
		    'font_path' => './path/to/fonts/texb.ttf',
		    'img_width' => '100',
		    'img_height' => 36,
		    'expiration' => 7200
		    );
		$data = create_captcha($vals);
		$this->session->set_userdata("captcha",$data['word']);

		$this->load->view('web/login/login.html',$data);
		// $this->front_footer();
	}

	/**
	 *验证码 
	 */
	public function captcha(){
		$this->load->helper('captcha');
		$vals = array(
		    //'word' => 'Random word',
		    'img_path' => './captcha/',
		    'img_url' => base_url().'/captcha/',
		    'font_path' => './path/to/fonts/texb.ttf',
		    'img_width' => '100',
		    'img_height' => 36,
		    'expiration' => 7200
		    );
		$cap = create_captcha($vals);
		echo $cap['image'];
	} 

	public function act(){
		$captcha = $this->session->userdata('captcha')?$this->session->userdata('captcha'):null;
		if(isset($_POST['login']) && !empty($_POST['login']['username']) && !empty($_POST['login']['password']) && strtolower($captcha) == strtolower($_POST['login']['captcha'] )){
			$password = md5($_POST['login']['password']);
			$table = 'member';
			$where ="account = '{$_POST['login']['username']}' and password='{$password}'";
			$result = $this->mpub->getRow($table,$fields = "",$where);
			if(count($result) >1){
				$login_session = array('islogin'=>1,
					'userid'=>$result['Id']
				);
				$this->session->set_userdata($login_session);
				$this->session->unset_userdata('captcha');
				echo "<script>window.location.href='".base_url()."member'</script>";
			}else{
				echo "帐号密码错误！";
			}
		}else{
			echo "验证码错误！";
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
