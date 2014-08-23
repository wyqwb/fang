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
		$data = array('user_data'=>$this->user_data);
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}
		$this->load->view('web/member/userpasswd.php',$data);
		$this->front_footer();
	}



	public function modifypasswd()
	{
		$user_id = $this->session->userdata('userid');
		print_r($user_id);die;
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
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}
		$this->load->view('web/member/userinfo.php',$data);
		$this->front_footer();
	}



	public function fangtuan_create(){
		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}

		$this->load->view('web/member/fangtuan_create.php',$data);
		$this->front_footer();
	}

	public function fangtuanlist(){
		 if ($this->input->post('sub')) {
			$params=$_REQUEST;
			$user_id = $this->session->userdata('userid');
			$dataInfo = array(
					'mid'=>$user_id,
					'title'=>$params['title'],
					'attention'=>$params['attention'],
					'Travelinfo'=>$params['Travelinfo'],
					'godate'=>$params['godate'],
					'gotime'=>$params['gotime'],										
					'normalCost'=>$params['normalCost'],
					'vipCost'=>$params['vipCost'],
					'displayCost'=>$params['displayCost'],
					'createtime'=>date('Y-m-d G:i:s')
			);
			$result = $this->mpublic->db->insert('fangtuan',$dataInfo);

			$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
			$this->front_header(get_cookie("username"));
			$accoutype=get_cookie('accountype');
			if($accoutype=="normal"){
				$this->front_left_normal();
			}else{
				$this->front_left();
			}


			$fang_tuan_list=$this->mpublic->getList('fangtuan','',array('mid' => $user_id ));
			$data['fang_tuan_list']=$fang_tuan_list;
			
			$this->load->view('web/member/fangtuan_list.php',$data);
			$this->front_footer();

		 	
		 }else{
			$user_id = $this->session->userdata('userid');
			$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
			$this->front_header(get_cookie("username"));
			$accoutype=get_cookie('accountype');
			if($accoutype=="normal"){
				$this->front_left_normal();
			}else{
				$this->front_left();
			}
			$fang_tuan_list=$this->mpublic->getList('fangtuan','',array('mid' => $user_id ));
			$data['fang_tuan_list']=$fang_tuan_list;
			$this->load->view('web/member/fangtuan_list.php',$data);
			$this->front_footer();
		}
	}


	public function fanglist(){

		$reupload=$this->session->userdata('reupload')?$this->session->userdata('reupload'):0;

        if($this->input->post('sub')&&($reupload==0))
        {
        	//print_r($_REQUEST);die;
			$this->session->set_userdata(array('reupload'=>1));        	

        	$user_id = $this->session->userdata('userid');
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
                    $data['img1'] = $previewimg;
                }
            }
            //第2张图
            if(!empty($_FILES['homeimg2']['name'])){
                if($this->upload->do_upload('homeimg2'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $data['img2'] = $previewimg;
                }
            }

            if(!empty($_REQUEST['housetype'])){
	            $data['housetype']= $this->input->post('housetype');
            }
            $data['mid'] = $user_id;
            $data['title'] = $this->input->post('title');
            $data['tuanid'] = $this->input->post('fangtuan');
            $data['builtarea'] = $this->input->post('builtarea');
            $data['landarea']= $this->input->post('landarea');
            $data['bedrooms'] = $this->input->post('bedrooms');
            $data['toilets'] = $this->input->post('toilets');
            $data['displayprice'] = $this->input->post('displayprice');
            $data['desc'] = $this->input->post('desc');

            $res = $this->db->insert('fang', $data);
            if($res)
            {
				$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
				$this->front_header(get_cookie("username"));
				$accoutype=get_cookie('accountype');
				if($accoutype=="normal"){
					$this->front_left_normal();
				}else{
					$this->front_left();
				}            	
				$fang_list=$this->mpublic->getList('fang','',array('mid' => $user_id ));
				$data['fang_list']=$fang_list;
				$this->load->view('web/member/fang_list.php',$data);
				$this->front_footer();
            }
        }else{

			$user_id = $this->session->userdata('userid');
			$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
			$this->front_header(get_cookie("username"));
			$accoutype=get_cookie('accountype');
			if($accoutype=="normal"){
				$this->front_left_normal();
			}else{
				$this->front_left();
			}
			
			$fang_list=$this->mpublic->getList('fang','',array('mid' => $user_id ));
			$data['fang_list']=$fang_list;

			$this->load->view('web/member/fang_list.php',$data);
			$this->front_footer();
		}
	}

	public function fang_create(){
		$this->session->set_userdata(array('reupload'=>0));    

		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}

		$fang_tuan_list=$this->mpublic->getList('fangtuan','id,title',array('mid' => $user_id ));
		$data['fang_tuan_list']=$fang_tuan_list;

		$this->load->view('web/member/fang_create.php',$data);
		$this->front_footer();
	}


	public function modify()
	{		
		$this->session->set_userdata(array('reupload'=>0));   

		$seg=$this->uri->segment(3);
		if($seg){
		$data['fang'] = $this->mpublic->getRow('fang','',array('id'=>$seg));

		}else{
			show_404();
		}

		$user_id = $this->session->userdata('userid');
		$data['member'] = $this->mpublic->getRow('member','',array('Id'=>$user_id));
		$this->front_header(get_cookie("username"));
		$accoutype=get_cookie('accountype');
		if($accoutype=="normal"){
			$this->front_left_normal();
		}else{
			$this->front_left();
		}

		$fang_tuan_list=$this->mpublic->getList('fangtuan','id,title',array('mid' => $user_id ));
		$data['fang_tuan_list']=$fang_tuan_list;

		$this->load->view('web/member/fang_create.php',$data);
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
	



	
	//退出
	function outlogin(){
		$this->session->sess_destroy();
		delete_cookie("username");
		delete_cookie("accountype");
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
