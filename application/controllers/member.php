<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Member extends FrontMember_Controller {

	private $user_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpublic');
		$this->load->helper('cookie');
		$this->load->library('session');

		// $loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		// if(!$loginsession){
		// 	echo "<script>window.location.href='".base_url()."'</script>";
		// }else{
		// 	$this->user_data = $this->session->userdata('userid');
		// }
	} 

	
	/**
	 * 默认首页
	 */
	 public function index()
	{
		//print_r($this->session->userdata("account"));
		if($this->session->userdata('islogin')){
			$data["account"]=$this->session->userdata("account");
			$this->front_header($this->session->userdata("account"));
			$accoutype=$this->session->userdata('accountype');
			
			if($accoutype=="normal"){
				$this->front_left_normal();
			}else{
				$this->front_left();
			}
			$this->load->view('web/member/index.php',$data);
			$this->front_footer();
		}else{
			echo "<script>window.location.href='".base_url()."'</script>";
		}

		//print_r($data);die;
		// $prePage = 5;
		// $rowNum = $this->uri->segment(3);
		// $rowNum = empty($rowNum)?0:$rowNum;

		// $count = $this->mpublic->get_no_sqlserver('cv_bas_ProductProject','PRODUCTSTATE IN(1,0)');

		// $user_id = $this->session->userdata('userid');
		// $data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		// $data['member']['point'] = round($data['member']['point']);
		// //$product = $this->mpublic->getList('product','',array('state'=>'募集中'));
		// $data['product'] = $this->mpublic->getList_sqlserver('cv_bas_ProductProject','','PRODUCTSTATE IN(1,0)',$prePage,$rowNum);

		// foreach ($data['product'] as $key=>$arr){

		// 	if(!empty($data['product'][$key]['NAME'])){
		// 		$data['product'][$key]['NAME'] = mb_strcut($data['product'][$key]['NAME'],0,50,'UTF-8');
		// 	}
		// 	if(!empty($data['product'][$key]['YEARINCOMERATE'])){
		// 		$data['product'][$key]['YEARINCOMERATE'] = $data['product'][$key]['YEARINCOMERATE']/100;
		// 	}
		// 	if(!empty($data['product'][$key]['SCALE1'])){
		// 		$data['product'][$key]['SCALE1'] = $data['product'][$key]['SCALE1']/10000;
		// 	}
		// 	if(!empty($data['product'][$key]['SUBSCRIBEPRODUCTDOWN'])){
		// 		$data['product'][$key]['SUBSCRIBEPRODUCTDOWN'] = $data['product'][$key]['SUBSCRIBEPRODUCTDOWN']/10000;
		// 	}
		// 	if(!empty($data['product'][$key]['PRODUCTDEADLINE'])){
		// 		$data['product'][$key]['PRODUCTDEADLINE'] = round($data['product'][$key]['PRODUCTDEADLINE']/30);
		// 	}
		// 	if(!empty($data['product'][$key]['PROJECTDATE'])){
		// 		$data['product'][$key]['PROJECTDATE'] = substr($data['product'][$key]['PROJECTDATE'],0,10);
		// 	}
		// }

		// $this->load->library('pagination');

		// $config['base_url'] = base_url().'member/index';
		// $config['total_rows'] = $count;
		// $config['per_page'] = $prePage;
		// $config['cur_tag_open'] = "<a class='on'>";
		// $config['cur_tag_close'] = "</a>";
		
		// $config['first_link'] = '首页';
		// $config['last_link'] ="最后一页";
		// $config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了
		
		// $this->pagination->initialize($config);
		
		// $data['page'] = $this->pagination->create_links();


	}
	
	
	public function point()
	{
		$this->front_header();
		$this->front_left();
		$data['point'] = $this->mpublic->getList('point','',array('memberid'=>$this->user_data));
		$data['point'] = $this->mpublic->get_product_data($data['point']);
		$this->load->view('web/member/point.php',$data);
		$this->front_footer();
	}
	
	public function activity()
	{
		$this->front_header();
		$this->front_left();
		$prePage = 5;
		$rowNum = $this->uri->segment(3);
		$rowNum = empty($rowNum)?0:$rowNum;
		$count = $this->mpublic->exc_sql("SELECT COUNT(*) total FROM article WHERE type = 1 AND pid =134");
		$data['article'] = $this->mpublic->getList(
		'article','',array('type'=>1,
		'pid'=>134
		),$rowNum,$prePage);
		
			$this->load->library('pagination');

			$config['base_url'] = base_url().'member/activity';
			$config['total_rows'] = $count[0]['total'];
			$config['per_page'] = $prePage;
			$config['cur_tag_open'] = "<a class='on'>";
			$config['cur_tag_close'] = "</a>";
			
			$config['first_link'] = '首页';
			$config['last_link'] ="最后一页";
			$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了
			
			$this->pagination->initialize($config);
			
			$data['page'] = $this->pagination->create_links();
			$this->load->view('web/member/activity.php',$data);
		$this->front_footer();
		
	}
	
	
	public function activitydetail(){
		$this->front_header();
		$this->front_left();
		$data['detail'] = $this->mpublic->getRow('article','',array('Id' =>$this->uri->segment(3) ));
			$this->load->view('web/member/activitydetail.php',$data);
		$this->front_footer();
	}
	
	//意见反馈 start
	public  function feedback(){
		$this->front_header();
		$this->front_left();
		$where = array('type'=>'工单');
		
		
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
		$data["captcha"] = create_captcha($vals);
		$this->session->set_userdata("captcha",$data['captcha']['word']);
		
		$data['gongdan'] = $this->mpublic->getList('dictdata','',$where);
		$sql = "SELECT * FROM question WHERE memberid={$this->user_data}";
		$type = $this->uri->segment(3);
			if($type){
				$filter = array('state'=>'');
				switch ($type){
					case "wait":
						$filter['state'] = "等待处理";
						break;
					case "being":
						$filter['state'] = "test";
						break;
					case "finish":
						$filter['state'] = "答复";
						break;
					case "close":
						$filter['state'] = "test";
						break;
				}
				$sql .=" and state = '{$filter['state']}'";
			}
		$data['qa'] = $this->mpublic->exc_sql($sql);
			$this->load->view('web/member/feedback.php',$data);
		$this->front_footer();
		
	}
	
	
	public  function feedbackdetail(){
		$this->front_header();
		$this->front_left();
		$data['prent'] = $this->mpublic->getRow('question','',array('Id' =>$this->uri->segment(3) ));
		$sql ="SELECT * FROM questiondetail WHERE questionid='{$this->uri->segment(3)}' ORDER BY iorder,postdate";
		$detail = $this->mpublic->exc_sql($sql);
		$dataInfo = array();
		foreach($detail as $key=>$arr){
			$dataInfo[$arr['iorder']][] = $arr;
		}
		$data['detail'] = $dataInfo;
		$this->load->view('web/member/feedbackdetail.php',$data);
		$this->front_footer();
		
	}
	
	public function feedbackact(){
			$params = $_POST;
			$captcha = $this->session->userdata('captcha')?$this->session->userdata('captcha'):null;
			if($captcha != $params['captcha']){
				echo "验证码错误";
				exit;
			}
			$dataInfo = array(
				"type"=>$params['type'],
				"title"=>$params['title'],
				"content"=>$params['content'],
				"postdate"=>date("Y-m-d G:i:s"),
				"createtime"=>date("Y-m-d G:i:s"),
				"state"=>"等待处理",
				"memberid"=>$this->user_data
			);
			$result = $this->mpublic->db->insert('question',$dataInfo);
			if($result){
				echo "提交成功";
			}else{
				echo "提交失败,请稍候重试!";
			}
	}
	
	//意见反馈 end
	/**
	 * userpasswd用户密码修改 
	 * 
	 * @access public
	 * @return void
	 */
	public function userpasswd()
	{
		$user_id = $this->session->userdata('userid');
		$this->user_data = $this->mpublic->getRow('member',"",array('id'=>$user_id));
		$this->user_data['point'] = round($this->user_data['point']);
		/*$this->load->helper('captcha');
		$captcha = $this->session->userdata('captcha_p')?$this->session->userdata('captcha_p'):null;
		$vals = array(
		    //'word' => 'Random word',
		    'img_path' => './captcha/',
		    'img_url' => base_url().'/captcha/',
		    'font_path' => './path/to/fonts/texb.ttf',
		    'img_width' => '100',
		    'img_height' => 36,
		    'expiration' => 7200
		    );
		$data = create_captcha($vals);
		$image = create_captcha($vals);
		$this->session->set_userdata("captcha_p",$data['word']);*/


		$data = array(
			'user_data'=>$this->user_data
			//,'captcha'=>$data
			);
		$this->front_header();
		$this->front_left();
		$this->load->view('web/member/userpasswd.php',$data);
		$this->front_footer();
	}



	public function modifypasswd()
	{
		$user_id = $this->session->userdata('userid');
		$this->user_data = $this->mpublic->getRow('member',"",array('id'=>$user_id));
		if(!empty($_POST['captcha'])){//TODO 替换为正式手机验证码的判断
			$uservif = $this->mpublic->getRow('member',"",array('account'=>$this->user_data['account'],'password'=>md5($_POST['passwd'])));
			$uservif = array_filter($uservif);
			if(!empty($uservif)){
				$this->mpublic->update('member',array('password'=>md5($_POST['newpasswd'])),array('id'=>$user_id));
				echo '修改成功！';
				exit;
			}else{
				echo "验证失败！";
			}

		}else{
			echo "手机验证码错误，请重新认证";
		}
	
	}

	public function userinfo(){
		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$data['member']['point'] = round($data['member']['point']);

		//$data['city'] = $this->mpublic->getList('dictdata','',array('type'=>'城市'));

		$this->front_header();
		$this->front_left();
		$this->load->view('web/member/userinfo.php',$data);
		$this->front_footer();
	}

	public function moduserinfo(){
		$user_id = $this->session->userdata('userid');
		$result = $this->mpublic->update('member',array(
			//'idcard'=>$_POST['idcard'],
			'city'=>$_POST['city'],
			'mail'=>$_POST['mail']
		),array('Id'=>$user_id));
		if($result){
			echo "修改成功！";
		}else{
			echo "修改失败！请稍后再试！";
		}
	}
	
	public function productList()
	{
		//echo "1111";exit;
		$this->front_header();
		$this->front_left();
		$user_id = $this->session->userdata('userid');
		$id = intval($this->uri->segment(3));
		$products = $this->mpublic->getRow('member',"NUMBER",array('id'=>$user_id));
		$number = $products["NUMBER"];
		$data["table"]["num"] = 1;
		$start = 0;
		if(0==$id)
			$data["table"]["num"] = 3;
		if(1==$id||0==$id)//已预约产品列表
		{
			$data["table"][$start]["type"] = 1;
			$data["table"][$start]["name"] = "已预约产品";
			$data["table"][$start]["index"] = array("NAME","Rate","PRODUCTDEADLINE","PROJECTDATE","StateTo","STATE");
			$data["table"][$start]["title"] = array("NAME"=>"产品名称","Rate"=>"预期年化收益率",
			"PRODUCTDEADLINE"=>"产品期限","PROJECTDATE"=>"发行日期","StateTo"=>"产品状态","STATE"=>"产品预约");
			$data["table"][$start]["data"] = $this->mpublic->getProductList($data["table"][$start]["type"],$user_id);
			$start++;
		}
		if(2==$id||0==$id)//已认购产品
		{
			$data["table"][$start]["type"] = 2;
			$data["table"][$start]["name"] = "已认购产品";
			$data["table"][$start]["index"] = array("NAME","Rate","FUNDINGDATE","DUEDATE","SUBSCRIBESHARE","SEARCH");
			$data["table"][$start]["title"] = array("NAME"=>"产品名称","Rate"=>"年化收益率","SUBSCRIBESHARE"=>"认购数量","DUEDATE"=>"兑付日期","FUNDINGDATE"=>"成立日期","SEARCH"=>"净值查询");
			$data["table"][$start]["data"] = $this->mpublic->getProductList($data["table"][$start]["type"],$user_id);
			$start++;
		}
		if(3==$id||0==$id)//已兑付产品
		{
			$data["table"][$start]["type"] = 3;
			$data["table"][$start]["name"] = "已兑付产品";
			$data["table"][$start]["index"] = array("NAME","Rate","FUNDINGDATE","DUEDATE","SUBSCRIBESHARE","SEARCH");
			$data["table"][$start]["title"] = array("NAME"=>"产品名称","Rate"=>"年化收益率","SUBSCRIBESHARE"=>"认购数量","DUEDATE"=>"兑付日期","FUNDINGDATE"=>"成立日期","SEARCH"=>"净值查询");
			$data["table"][$start]["data"] = $this->mpublic->getProductList($data["table"][$start]["type"],$user_id);
			$start++;
		}
		
		$this->load->view('web/member/productList.php',$data);
		$this->front_footer();
	}
	public function productAppointment()
	{
		$this->front_header();
		$this->front_left();
		$product_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$list= $this->mpublic->getProductAppointment($product_id);
		$data["table"]  = $list[0];
		$data["table"]["PRODUCTDEADLINE"] = round($data["table"]["PRODUCTDEADLINE"]/365)."年";
		$rate = array();
		foreach ( $list as $k=> $value ) 
		{
       		$rate[] = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")";
		}
		$data["table"]["RATE"] = $rate;
		$member = $this->mpublic->exc_default_sql('select fullname,mobile from member where Id='.$user_id);
		if(count($member)==1)
			$data["member"] = $member[0]; 
		$data["table"]["Rate"] = "5.3%";
		$data["city"] = $this->mpublic->getCityList();
		$this->load->view('web/member/productAppointment.php',$data);
		$this->front_footer();
	}
	public function appointment()
	{
		$product_id = $this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$money = $_REQUEST["money"];
		$city = $_REQUEST["city"];
		$remark = $_REQUEST["remark"];
//		$check = $this->mpublic->exc_default_sql("select * from reservation where memberid=".$user_id." and NUMBER='".$product_id."'");
//		if($check>0)
//		{
//			echo "<script type='text/javascript'>alert('您已经预约过该产品！不能重复预约')</script>"; 
//		}
		//$sql = 'insert into reservation(memberid,rsv_date,NUMBER,city,amount,state,createtime) ' .
		//		'values('.$user_id.',"'.date("Y-m-d").'","'.$product_id.'","'.$city.'",'.$money.',"等待处理","'.date("Y-m-d H:i:s").'")';
		$sql = array("memberid"=>$user_id,
					 "rsv_date"=>date("Y-m-d"),
					 "NUMBER"=>$product_id,
					 "city"=>$city,
					 "amount"=>$money,
					 "state"=>"等待处理",
					 "createtime"=>date("Y-m-d H:i:s"));
		$this->mpublic->insert_default_sql("reservation",$sql);
		echo "<script type='text/javascript'>alert('成功添加预约状态')</script>";
		$this->productAppointment();
	}
	
	//退出
	function outlogin(){
		$this->session->sess_destroy();
		echo "<script>window.location.href='/login/'</script>";
	}

	
	public static function  clear_dir($dir){
		if(is_dir($dir)){
		    $fp=opendir($dir);
		    while (($fstr=readdir($fp)) !== false){
			if ($fstr != "." && $fstr != "..") {
			    $fname=$dir.'/'.$fstr;
			    if(is_dir($fname)){   
				clear_dir($fname);                        
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
