<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Reg extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpublic');
		$this->load->helper('url');
		$this->load->helper('captcha');
		$this->load->helper('cookie');
		$this->load->library('session');
	}
	/**
	 * 默认首页
	 */
	 public function index()
	{

		$vals = array(
		    'img_path' => './captcha/',
		    'img_url' => '/captcha/',
		    'img_width' => '102',
		    'img_height' => 41,
		    'expiration' => 7200,
		    'word' => "fang"
		    );
		$cap = create_captcha($vals);		
		$data = array(
	    	'captcha_time' => $cap['time'],
	    	'ip_address' => $this->input->ip_address(),
	    	'word' => $cap['word']
    	);
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		//$this->front_header('index');
		$this->load->view('web/reg/index.php',$cap);
	}


	public function act()
	{
		//print_r($_REQUEST);die;
		//$captcha=$_REQUEST['captcha'];
		//$captcha=$this->input->post('captcha');
		//print_r($captcha);die;
		$params=$_REQUEST;
		$expiration = time()-7200; // 2小时限制
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 
		// 然后再看是否有验证码存在:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_REQUEST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0)
		{
    		exit("-1"); /*验证码过期或错误*/
		}

		$table = 'member';
		$where ="account = '{$params['username']}'";
		$result = $this->mpublic->getRow($table,$fields = "",$where);
		if(count($result) >1){
			exit("-2");  /*用户名已经存在*/
		}	
			

		$dataInfo = array(
				'accountype'=>$params['accountype'],
				'account'=>$params['username'],
				'password'=>md5($params['password']),
				'createtime'=>date('Y-m-d G:i:s'),
				'point'=>100,
				'isenable'=>1
		);
		$result = $this->mpublic->db->insert('member',$dataInfo);
		$id=$this->mpublic->exc_sql('select Id from member where account="'.$params['username'].'"');
		if($result){
			    set_cookie("username",$params['username'],72000);  
			    set_cookie("accountype",$params['accountype'],72000); 
			    $login_session = array('islogin'=>1,'userid'=>$id[0]['Id']);
				$this->session->set_userdata($login_session);
    			exit("1");	/*注册成功*/		
		}else{
			  exit("-3");  /*注册失败*/
		}
	}

	function docompleteact()
	{	
		if($this->session->userdata('islogin')){
			//$params=$_REQUEST;		
			//print_r($params);die;
			//$table = 'member';
			//$where ="account = '{$params['username']}'";
			//$result = $this->mpublic->getRow($table,$fields = "",$where);
			//if(count($result) >1){
				//print_r($result);die;
					// $dataInfo = array(
					// 'mobile'=>$params['mobile'],
					// 'qq'=>$params['qq'],
					// 'creer'=>$params['creer'],
					// 'xueli'=>$params['xueli'],
					// 'weibo'=>$params['weibo'],
					// 'createtime'=>date('Y-m-d G:i:s'),
					// 'isenable'=>1
					// );
				//$this->mpublic->update();
				//exit("1");
			//}
			exit("1");
		}
		else{
			echo "<script>window.location.href='".base_url()."'</script>";
		}


	}


	function docomplete(){
		$seg = $this->uri->segment(3);
		$data["username"]=get_cookie("username");
		$data["accoutype"]=$seg;
		$this->load->view('web/reg/complete.php',$data);	
	}


} 
