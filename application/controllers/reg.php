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
		$params=$_POST;
		//print_r($params);
		$expiration = time()-7200; // 2小时限制
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 
		// 然后再看是否有验证码存在:
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($_REQUEST['captcha'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0) { exit("-1"); /*验证码过期或错误*/ }

		//print_r($params['username']);
		$result=$this->mpublic->getRow("member","",array('account' => $params['username']));
		//print_r($result);
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

				//产生随机码32
				$actcode=self::random_str(32);

				if(isset($params['accountype'])&&($params['accountype']=='business')){
					//商户用户注册
					$dataInfo = array(
					'realname'=>$params['realname'],
					'idcard'=>$params['idcard'],
					'city'=>$params['city'],
					'company'=>$params['company'],
					'job'=>$params['job'],
					'activecode'=>$actcode,
					'createtime'=>date('Y-m-d G:i:s'),
					'isenable'=>1
					);
				}else{
					//普通用户注册
					$dataInfo = array(
					'createtime'=>date('Y-m-d G:i:s'),
					'activecode'=>$actcode,
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
				$result=$this->mpublic->update('member',$dataInfo,array("Id"=>$user_id));
				if($result){
					set_cookie("email",$dataInfo['email'],300);
					set_cookie("activecode",$actcode,300);
		    		exit("1");	/*注册成功*/	
	    		}
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



	// function activemail(){
			
	// 	$this->normal_front_header();

	// 	$this->load->view('web/reg/activemail.php');
			
	// 	$this->load->view('web/member/footer.php');

	// }


public function activemail(){
	
		 $email=get_cookie("email");
		 $activecode=get_cookie("activecode");
		 $this->load->library('email');
		 $this->email->IsSMTP();
		 //$this->email->Host='smtp.126.com';
		 //$this->email->Username='Enstylement@126.com';
		 //$this->email->Password='3320216';
		 //$this->email->SetFrom('Enstylement@126.com', 'Enstylement');

		// $this->email->Host='smtp.global-mail.cn';
		$this->email->Host='smtp.enstylement.com';
		 $this->email->Username='info@enstylement.com';
		 $this->email->Password='q12345';
		 $this->email->SetFrom('info@enstylement.com', 'fang');

		 $this->email->Subject="XXXXXXX邮件激活";

		$msg="感谢您关注XXXXXXX.com<br><p>

			如果上面不是链接形式，请将以下地址手工粘贴到浏览器地址栏再访问。<br>
			http://sdsa.com.id39527.aliasl3.doctoryun.net/reg/chksuccess/?register=".$activecode."<br><p>

			此致<br><p>
			XXXXXXX.com管理团队<br><p>
			http://www.XXXXXXX.com<br><p><br><p>

			----------------------------------------------------------------------<br><p>
			这封信是由fang发送的。您收到这封邮件，是由于在fang.com进行新用户注册时填写了这个邮箱地址。<br><p>
			如果您并没有访问过fang.com，或没有进行上述操作，请忽略这封邮件。<br><p>
			您不需要回复次邮件或进行其他进一步的操作。<br><p>";

		 $this->email->MsgHTML($msg);
		 $this->email->AddAddress($email);
		 //$this->email->AddAddress("anslem.zhao@adsidd.com");
		 $this->email->Send(); 
		 delete_cookie("email");
		 delete_cookie("activecode");
	
		$this->normal_front_header();
		$this->load->view('web/reg/activemail.php');			
		$this->load->view('web/member/footer.php');
	}


	public function chksuccess(){
		if (isset($_REQUEST['register'])) {
			$chkcode=$_REQUEST['register'];
	
			$where ="activecode = '{$chkcode}'";
			$result = $this->mpublic->getRow('member',$fields = "Id",$where);

			if(count($result)>0){
				$login_session = array('islogin'=>1,'userid'=>$result['Id']);
				$this->session->set_userdata($login_session);
				$this->mpublic->update('member',array('activecode' =>""),array('Id' => $result['Id'] ));

				$this->front_header();
				$this->load->view('web/reg/chksuccess.php');
				$this->load->view('web/member/footer.php');
			}else{				
				echo "<script>alert('请输入正确的注册码')</script>";
				echo "<script>window.location.href='/'</script>";
			}
		}else{
			echo "<script>alert('请重新注册')</script>";
			echo "<script>window.location.href='/reg/'</script>";
		}
	}

	private function random_str($length)
	{
	    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
	    $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));	 
	    $str = '';
	    $arr_len = count($arr);
	    for ($i = 0; $i < $length; $i++)
	    {
	        $rand = mt_rand(0, $arr_len-1);
	        $str.=$arr[$rand];
	    }	 
	    return $str;
	}


} 
