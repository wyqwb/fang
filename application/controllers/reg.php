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
	}
	/**
	 * 默认首页
	 */
	 public function index()
	{
		$this->load->view('web/reg/index.php');
		//$this->front_footer();
	}


	public function act()
	{
		$params = $_POST;
		if($params['captcha'] == 'aaa'){
			$table = 'member';
			$where ="account = '{$params['textname']}'";
			$result = $this->mpublic->getRow($table,$fields = "",$where);
			if(count($result) >1){
				echo "此帐号已注册!";
				exit;
			}
			
			$cus = $this->mpublic->getsqlRow("cv_bas_CusDocument","",array('IDNUMBER'=>$params['idcard']));
			if(count(cus) <=0){
				echo "请联系我们的工作人员,申请注册!";
				exit;
			}
			$dataInfo = array(
				'account'=>$params['textname'],
				'fullname'=>$params['textname'],
				'mobile'=>$params['mobile'],
				'idcard'=>$params['idcard'],
				'password'=>md5($params['password']),
				'city'=>'上海',
				'rank'=>'至友级',
				'point'=>0,
				'status'=>'未审核',
				'createtime'=>date('Y-m-d G:i:s'),
				'isenable'=>1
			);
			$result = $this->mpublic->db->insert('member',$dataInfo);
			if($result){
				echo "注册成功";	
			}else{
				echo "注册失败,请稍候重试!";
			}

		}else{
			echo "验证码错误,请重试!";
		}
	}
} 
