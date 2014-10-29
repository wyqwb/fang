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

		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		if(!$loginsession){
			echo "<script>window.location.href='".base_url()."'</script>";
		}else{
			$this->user_data = $this->session->userdata('userid');
		}
	} 

	
	/**
	 * 默认首页
	 */
	 public function index()
	{
		if($this->session->userdata('islogin')){
			$data["account"]=get_cookie("username");
			
			$this->front_header(get_cookie("username"));

			$accoutype=get_cookie('accountype');
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
	}
	
	
	public function point()
	{
		$this->front_header(get_cookie("username"));

		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}
		
		$user_id = $this->session->userdata('userid');
		$this->user_data = $this->mpublic->getRow('member',"",array('id'=>$user_id));
		$data = array('member'=>$this->user_data);
		$this->load->view('web/member/point.php',$data);
		$this->front_footer();
	}
	
	
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
		$data['user_data'] = $this->user_data;
		$this->front_header(get_cookie("username"));

		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/userpasswd.php',$data);
		$this->front_footer();
	}
	public function chkpasswd()
	{
		$user_id = $this->session->userdata('userid');
		$password = $this->mpublic->getRow('member',"password",array('id'=>$user_id));
		if ((md5($_REQUEST['passwd'])!=$password['password'])&&(isset($_REQUEST['chkpwd'])&&$_REQUEST['chkpwd'])) {
			exit("-1"); //原始密码不对
		}else{exit;}
	}


	public function modifypasswd()
	{
		$user_id = $this->session->userdata('userid');
		$password = $this->mpublic->getRow('member',"password",array('id'=>$user_id));
		if(isset($_POST['newpasswd'])&&($_POST['newpasswd']!="")){
			$this->db->update('member', array('password'=>md5($_POST['newpasswd'])),array('id' =>$user_id));
			echo "<script>window.location.href='/member/'</script>";
		}
	}

	public function userinfo(){
		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));

		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/userinfo.php',$data);
		$this->front_footer();
	}



	public function fangtuan_create(){
		$this->session->set_userdata(array('fangtuancreate'=>1));    
		$user_id = $this->session->userdata('userid');
		//$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}

		$this->load->view('web/member/fangtuan_create.php');
		$this->front_footer();
	}


	public function fang_create(){
		//添加信息设置，用于防止刷新重复提交
		$this->session->set_userdata(array('fangcreate'=>1));
		$user_id = $this->session->userdata('userid');
		$data['fang_tuan_list']=$this->mpublic->getList('fangtuan','id,title',array('mid' => $user_id ));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/fang_create.php',$data);
		$this->front_footer();
	}

	public function fangtuanlist(){
		$user_id = $this->session->userdata('userid');
		$this->front_header(get_cookie("username"));
		//$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));

		//获取创建或修改开关变量值

		$fang_tuan_create=$this->session->userdata('fangtuancreate')?$this->session->userdata('fangtuancreate'):0;
		$fang_tuan_modif=$this->session->userdata('fangtuanmodif')?$this->session->userdata('fangtuanmodif'):0;

		if ($this->input->post('sub')) {
			$params=$_REQUEST;
			$postdata = array(
					'mid'=>$user_id,
					'title'=>$params['title'],
					'attention'=>$params['attention'],
					'Travelinfo'=>$params['Travelinfo'],
					'des'=>$params['content'],
					'godate'=>$params['godate'],
					'gotime'=>$params['gotime'],										
					// 'normalCost'=>$params['normalCost'],
					// 'vipCost'=>$params['vipCost'],
					'displayCost'=>$params['displayCost'],
					'createtime'=>date('Y-m-d G:i:s')
			);
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['max_width']  = '1500';
            $config['max_height']  = '502';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['tuanimg']['name'])){
                if($this->upload->do_upload('tuanimg'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['previewimg'] = $previewimg;
                }
            }


            if($fang_tuan_modif==1){
	        	//设置防止刷新重复提交开关
	        	$this->session->set_userdata(array('fangtuanmodif'=>0));
	        	$fangtuanid=$this->input->post('fangtuanid');
	        	if($fangtuanid!="") { $this->db->update('fangtuan', $postdata,array('id' =>$fangtuanid)); }	
            }
            if($fang_tuan_create==1){
	        	//设置防止刷新重复提交开关
				$this->session->set_userdata(array('fangtuancreate'=>0));
				$this->db->insert('fangtuan', $postdata);
            }	 	
		 }

		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$data['fang_tuan_list']=$this->mpublic->getList('fangtuan','',array('mid' => $user_id ));
		$this->load->view('web/member/fangtuan_list.php',$data);
		$this->front_footer();
	}


	public function fanglist(){

		$user_id = $this->session->userdata('userid');
		$this->front_header(get_cookie("username"));
		//$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));

		//获取创建或修改开关变量值
		$fang_create=$this->session->userdata('fangcreate')?$this->session->userdata('fangcreate'):0;
		$fang_modif=$this->session->userdata('fangmodif')?$this->session->userdata('fangmodif'):0;
    
        //处理提交参数
        if($this->input->post('sub'))
        {     	
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['max_width']  = '1500';
            $config['max_height']  = '502';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['homeimg1']['name'])){
                if($this->upload->do_upload('homeimg1'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['img1'] = $previewimg;
                }
            }
            //第2张图
            if(!empty($_FILES['homeimg2']['name'])){
                if($this->upload->do_upload('homeimg2'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['img2'] = $previewimg;
                }
            }
                        //第3张图
            if(!empty($_FILES['homeimg3']['name'])){
                if($this->upload->do_upload('homeimg3'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['img3'] = $previewimg;
                }
            }

                        //第4张图
            if(!empty($_FILES['homeimg4']['name'])){
                if($this->upload->do_upload('homeimg4'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['img4'] = $previewimg;
                }
            }

                        //第5张图
            if(!empty($_FILES['homeimg5']['name'])){
                if($this->upload->do_upload('homeimg5'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $postdata['img5'] = $previewimg;
                }
            }
    
            $postdata['mid'] = $user_id;
            $postdata['title'] = $this->input->post('title');
            $postdata['tuanid'] = $this->input->post('fangtuan');
            $postdata['builtarea'] = $this->input->post('builtarea');
            $postdata['landarea']= $this->input->post('landarea');
            $postdata['bedrooms'] = $this->input->post('bedrooms');
            $postdata['toilets'] = $this->input->post('toilets');
            $postdata['floor'] = $this->input->post('floor');
            $postdata['pgreen'] = $this->input->post('pgreen');
            $postdata['nearby'] = $this->input->post('nearby');
            $postdata['housetype']= $this->input->post('housetype');
            $postdata['displayprice'] = $this->input->post('displayprice');
            $postdata['lowerprice'] = $this->input->post('lowerprice');
            $postdata['highprice'] = $this->input->post('highprice');
            $postdata['desc'] = $this->input->post('desc');
            $postdata['content'] = $this->input->post('content');
            $postdata['createtime'] = date('Y-m-d G:i:s');



            if($fang_modif==1){
	        	//设置防止刷新重复提交开关
	        	$this->session->set_userdata(array('fangmodif'=>0));
	        	$fangid=$this->input->post('fangid');
	        	if($fangid!="") { $this->db->update('fang', $postdata,array('id' =>$fangid)); }	

            }
            if($fang_create==1){
	        	//设置防止刷新重复提交开关
				$this->session->set_userdata(array('fangcreate'=>0));
				$this->db->insert('fang', $postdata);
            }
        }

        $data['fang_list']=$this->mpublic->getList('fang','',array('mid' => $user_id ));
        $accoutype=get_cookie('accountype');
		if($accoutype=="normal"){$this->front_left_normal();}
		else{$this->front_left();}			
		$this->load->view('web/member/fang_list.php',$data);
		$this->front_footer();
	}


	public function modify()
	{		
		//添加信息设置，用于防止刷新重复提交
		$this->session->set_userdata(array('fangmodif'=>1));  

		$user_id = $this->session->userdata('userid');
		// $data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');

		$seg=$this->uri->segment(3);
		if($seg) { $data['fang'] = $this->mpublic->getRow('fang','',array('id'=>$seg));}
		else { show_404();}

		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}

		$data['fang_tuan_list']=$this->mpublic->getList('fangtuan','id,title',array('mid' => $user_id ));
		$this->load->view('web/member/fang_create.php',$data);
		$this->front_footer();
	}


	public function tuan_modify()
	{		
		//添加信息设置，用于防止刷新重复提交
		$this->session->set_userdata(array('fangtuanmodif'=>1));  

		$user_id = $this->session->userdata('userid');
		// $data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');

		$seg=$this->uri->segment(3);
		if($seg) { $data['fangtuan'] = $this->mpublic->getRow('fangtuan','',array('id'=>$seg));}
		else { show_404();}

		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}

		$data['fang_tuan_list']=$this->mpublic->getList('fangtuan','id,title',array('mid' => $user_id ));
		$this->load->view('web/member/fangtuan_create.php',$data);
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
	

	public function pinlun()
	{
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){$this->front_left_normal();}
		else{$this->front_left();}


		//获取我发布的评论
		$data['comments_list']=$this->mpublic->getList("reviewlist","",array('mid' => $this->user_data));
		

		$this->load->view('web/member/pinlun.php',$data);
		$this->front_footer();		
	}

	//
	function pay(){
		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
	
		$tuan_displayCost = $this->mpublic->getRow('fangtuan','displayCost',array('id'=>$seg));

		//写入流水
		$customercode=self::random_str(5);	
		$dataInfo = array(					
				'mid'=>$user_id,
				'tuanid'=>$seg,
				'cost'=>$tuan_displayCost['displayCost'],	
				'joins'=>1,
				'customercode'=>$customercode,	
				'createtime'=>date('Y-m-d G:i:s')
			);
		$this->mpublic->db->insert('orders',$dataInfo);
		$this->load->view('web/member/pay.php',$data);
	}


	public	function jointuan(){
		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		//获取参加的看房团订单
		$data['orders_list']=$this->mpublic->getList("orders","",array('mid' => $user_id));
		if(count($data['orders_list'])>0){
			foreach ($data['orders_list'] as $key => $value) {
				$tuan_title = $this->mpublic->getRow('fangtuan','title',array('id'=>$value['tuanid']));
				if(count($tuan_title)>0){
					$data['orders_list'][$key]["tuan_title"]=$tuan_title['title'];
				}
			}
		}
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/jointuan.php',$data);
		$this->front_footer();
	}

	public function modorder(){
		//商家订单修改页		
		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));

		//获取订单状态信息
		$data['orders_state']=$this->mpublic->getList("ordertracing","",array('oid'=>$seg));


		//获取订单信息
		$orderinfo=$this->mpublic->getRow('orders','',array('id'=>$seg));
		
		if(count($orderinfo)>0){
			$data['fangtuan']=$this->mpublic->getRow('fangtuan','',array('id'=>$orderinfo['tuanid']));
			$data['fangtuan']['cost']=$orderinfo['cost'];
			$data['fangtuan']['state']=$orderinfo['state'];
			$data['fangtuan']['orderid']=$orderinfo['id'];
		}
		$this->load->view('web/member/modorder.php',$data);	
	}

	public function modorderact(){
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		$params=$_POST;
		$dataInfo = array(
				'content'=>$params['content'],
				'username'=>$data["member"]['account'],
				'oid'=>$params['oid'],
				'createtime'=>date('Y-m-d G:i:s')
		);
		$result = $this->mpublic->db->insert('ordertracing',$dataInfo);
		if($result){exit("1");}

	}


	public function orders(){
		//普通会员的订单详情页		
		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));


		$orderinfo=$this->mpublic->getRow('orders','tuanid,cost',array('id'=>$seg));

		//获取订单状态信息
		$data['orders_state']=$this->mpublic->getList("ordertracing","",array('oid'=>$seg));

		
		if(count($orderinfo)>0){
			$data['fangtuan']=$this->mpublic->getRow('fangtuan','',array('id'=>$orderinfo['tuanid']));
			$data['fangtuan']['cost']=$orderinfo['cost'];
		}
		$this->load->view('web/member/order.php',$data);	
	}


	public function orderlist(){
		//商家的订单列表
		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));


		//获取商家的看房团
		$mytuanids=$this->mpublic->getList("fangtuan","id,title",array('mid' => $user_id));
		//print_r($mytuanids);die;
		//查看订单表里没有该商家的看房团id
		if(count($mytuanids)>0){
			foreach ($mytuanids as $key => $value) {
				$isorders=$this->mpublic->getList("orders","",array('tuanid' => $value['id']));	
				if(count($isorders)>0){
					$userinfo = $this->mpublic->getRow('member','Id,account',array('Id'=>$isorders[0]['mid']));
					if(count($userinfo)>0){
					$data['orderlist'][$key]=$isorders[0];
					$data['orderlist'][$key]['tuan_title']=$value['title'];
					$data['orderlist'][$key]['account']=$userinfo['account'];
					}
				}
			}
		}

		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/orderlist.php',$data);
		$this->front_footer();	
	}



	public function forcost(){
		//普通会员出价列表
		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		//获取参加的出价订单
		$data['forcost_list']=$this->mpublic->getList("forcost","",array('mid' => $user_id));
		if(count($data['forcost_list'])>0){
			foreach ($data['forcost_list'] as $key => $value) {
				$fang_title = $this->mpublic->getRow('fang','title',array('id'=>$value['fid']));
				if(count($fang_title)>0){
					$data['forcost_list'][$key]["fang_title"]=$fang_title['title'];
				}
			}
		}
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/forcost.php',$data);
		$this->front_footer();		
	}


	public function forcostlist(){
		//商户获取名下的房源出价列表

		$seg=$this->uri->segment(3);
		$user_id = $this->session->userdata('userid');
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));

		//获取参加的出价订单
		$data['forcost_list']=$this->mpublic->getList("forcost","",array('mid' => $user_id));
		if(count($data['forcost_list'])>0){
			foreach ($data['forcost_list'] as $key => $value) {
				$fang_title = $this->mpublic->getRow('fang','title',array('id'=>$value['fid']));

				if(count($fang_title)>0)
				{
					$data['forcost_list'][$key]["fang_title"]=$fang_title['title'];
				}
			}
		}

		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal") {$this->front_left_normal();}
		else {$this->front_left();}
		$this->load->view('web/member/forcost.php',$data);
		$this->front_footer();		
	}


	public function qq_list(){

		$user_id = $this->session->userdata('userid');
		$this->front_header(get_cookie("username"));

        $qq_list=$this->mpublic->getList('member','Id,customer_qq1,customer_qq2',array('Id' => $user_id ));
        $data['qq_list']=$qq_list[0];

        $accoutype=get_cookie('accountype');
		if($accoutype=="normal"){$this->front_left_normal();}
		else{$this->front_left();}			
		$this->load->view('web/member/qq_list.php',$data);
		$this->front_footer();

	}


	public function mod_qq(){

		$user_id = $this->session->userdata('userid');
		$this->front_header(get_cookie("username"));

        $qq_list=$this->mpublic->getList('member','Id,customer_qq1,customer_qq2',array('Id' => $user_id ));
        $data['qq_list']=$qq_list[0];

        $accoutype=get_cookie('accountype');
		if($accoutype=="normal"){$this->front_left_normal();}
		else{$this->front_left();}			
		$this->load->view('web/member/qq_list_edit.php',$data);
		$this->front_footer();
	}

	public function mod_qq_act(){
		$user_id = $this->session->userdata('userid');
		$params=$_POST;
		if(isset($params['action'])&&($params['action']=='domod')){
			if(isset($params['customer_qq1'])){
 				$this->db->update('member',array('customer_qq1' =>$params['customer_qq1']),array('Id' =>$user_id)); 
			}
			if(isset($params['customer_qq2'])){
 				$this->db->update('member',array('customer_qq2' =>$params['customer_qq2']),array('Id' =>$user_id)); 
			}
		}
	}

public function consumercode(){
		$user_id = $this->session->userdata('userid');
		$this->front_header(get_cookie("username"));
        $accoutype=get_cookie('accountype');
		if($accoutype=="normal"){$this->front_left_normal();}
		else{$this->front_left();}			
		$this->load->view('web/member/consumercode.php');
		$this->front_footer();

}

public function consumercodeact(){
	$params=$_POST;

	$iscustomercode = $this->mpublic->getRow('orders','id,state',array('customercode'=>$params['customercode']));
	if(count($iscustomercode)>0){
		if($iscustomercode['state']==2){
			$this->mpublic->update('orders',array('state'=>1),array('id' => $iscustomercode['id']));
			exit("1"); //成功消费
		}elseif($iscustomercode['state']==1){
			exit("-1"); //已经消费过
		}
	}else{

		exit("-2"); //消费码不存在
	}
}

	
	//退出
	function outlogin(){
		$this->session->sess_destroy();
		delete_cookie("username");
		delete_cookie("accountype");
		echo "<script>window.location.href='/login/'</script>";
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
