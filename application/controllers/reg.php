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
			$params=$_REQUEST;		
			$user_id = $this->session->userdata('userid');
			$userinfo=$this->mpublic->getRow("member","",array('Id' => $user_id));
			if(count($userinfo) >1){
				if(isset($params['accountype'])&&($params['accountype']=='business')){
					$dataInfo = array(
					'realname'=>$params['realname'],
					'idcard'=>$params['idcard'],
					'city'=>$params['city'],
					'company'=>$params['company'],
					'job'=>$params['job'],
					'createtime'=>date('Y-m-d G:i:s'),
					'isenable'=>1
					);
				}else{
					$dataInfo = array(
					'createtime'=>date('Y-m-d G:i:s'),
					'isenable'=>1
					);
				}	
				//处理选填项目内容
				if(isset($params['otherregstr'])&&$params['otherregstr']!=""){
					$otherregstr=$params['otherregstr'];
					$otherregstr=trim($otherregstr,"|");
					$strarr = explode("|",$otherregstr);
			    	foreach($strarr as $newstr){
				        $data = explode("=",$newstr);        
				        $dataInfo[$data[0]]=$data[1];
			    	}
		    	}
				$this->mpublic->update('member',$dataInfo,array("Id"=>$user_id));
				exit("1");
			}
			exit("-1");  /*注册失败*/
		}
		else{
			echo "<script>window.location.href='".base_url()."'</script>";
		}


	}


	function docomplete(){
		$seg = $this->uri->segment(3);
		$data["username"]=get_cookie("username");
		if($seg=="business"){
			$data["accoutype"]=$seg;
			$this->load->view('web/reg/complete.php',$data);	
		}else{
			$this->load->view('web/reg/normal_complete.php',$data);		
		}
	}


} 
