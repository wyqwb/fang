<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 默认 首页模块
*/
class Fang extends Front_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/marticle');
		$this->load->model('web/mfang');
		$this->load->model('web/mad');
		$this->load->model('web/mpublic');
		$this->load->helper('cookie');
		if (!isset($this->session)) $this->load->library('session');
	} 
	/**
	 * 默认首页
	 */
	public function index()
	{
		$this->front_header();
		$this->load->view('web/fang/index.php');
		$this->front_footer();
	}

	public function tuandetail1()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$data['fangtuan'] = $this->mpublic->getRow('fangtuan','',array('id'=>$seg));
			$this->front_header();
			$this->load->view('web/member/fangtuan_detail.php',$data);
			$this->front_footer();
		}else{
			show_404();
		}
		//print_r($data['fangtuan']);die;

	}

	public function jia()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$data['fang'] = $this->mpublic->getRow('fang','',array('id'=>$seg));
			$this->front_header();
			$this->load->view('web/fang/fang_jia.php',$data);
			$this->front_footer();
		}else{
			show_404();
		}
		//print_r($data['fangtuan']);die;

	}


	public function detail()
	{

		$seg=$this->uri->segment(3);
		if($seg){
			$data['fang'] = $this->mpublic->getRow('fang','',array('id'=>$seg));
			if(count($data['fang'])>0){

				//获取该房的评论
				$data['comments_list']=$this->mpublic->getList("reviewlist","",array('aid' => $seg,'type'=>1));
				//print_r($data['comments_list']);die;

				//获取该房源所属商户的在线QQ 
				$onlineQQ=$this->mpublic->getRow('member','customer_qq1,customer_qq2',array('Id'=>$data['fang']['mid']));
				$data['online_qq']=$onlineQQ;
				//print_r($data['fang']['tuanid']);
				$tuanid=$data['fang']['tuanid'];
				$data['fangtuan_info']=$this->mpublic->getRow('fangtuan','id,previewimg',array('id'=>$tuanid));
				//print_r($data['fang']);die;
				$this->front_header();
				$this->load->view('web/fang/fang_detail.php',$data);
				$this->front_footer();
			}else{
				show_404();	
			}
		}else{
			show_404();
		}
	}

	public function listfang()
	{
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		
		$data['shareurl']=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


		$data['toplist']=$this->mfang->get_top_default();
		$data['list2']=$this->mfang->get_fang_by_default();	

		$ads=$this->mad->get_index_ad();
		if(count($ads)!=0){
			$data['ads']=$ads;	
		}else{
			$data['ads']='';
		}
		$this->load->view('web/fang/fang_list.php',$data);
		$this->front_footer_list();
	}



	public function tuandetail()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$data['fangtuan'] = $this->mpublic->getRow('fangtuan','',array('id'=>$seg));
			if(count($data['fangtuan'])>0){
				//获取该房的评论
				$data['comments_list']=$this->mpublic->getList("reviewlist","",array('aid' => $seg,'type'=>2));
			
				//获取该房源所属商户的在线QQ 
				$onlineQQ=$this->mpublic->getRow('member','customer_qq1,customer_qq2',array('Id'=>$data['fangtuan']['mid']));
				$data['online_qq']=$onlineQQ;


				$this->front_header();
				$this->load->view('web/fang/fangtuan_detail.php',$data);
				$this->front_footer();						
			}else{
				show_404();	
			}
		}else{
			show_404();
		}
	}

	public function dotuancomments()
	{
		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data['islogin']=$loginsession;
		$data['fangtuanid'] = $this->uri->segment(3);
		$this->front_header();
		$this->load->view('web/fang/fangtuan_comments.php',$data);
		$this->front_footer();

	}


	public function docomments()
	{
		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data['islogin']=$loginsession;
		$data['fangid'] = $this->uri->segment(3);
		$this->front_header();
		$this->load->view('web/fang/fang_comments.php',$data);
		$this->front_footer();

	}

	public	function comments()
	{
		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		if($loginsession){
				$userid=$this->session->userdata('userid');
				$params = $_REQUEST;
				$dataInfo = array(					
							'content'=>$params['message'],
							'aid'=>$params['aid'],
							'mid'=>	$userid,
							'type'=>$params['type'],		
							'createtime'=>date('Y-m-d G:i:s')
				);
				$result = $this->mpublic->db->insert('reviewlist',$dataInfo);
				if($result){
					exit("1");
				}
				else { 
					exit("0");
				}
		}
	}



	public function fuang_tuan_over()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$tuanids=$this->mpublic->getList("fang","id",array('tuanid' => $seg));
			if(count($tuanids)>0){
				foreach ($tuanids as $key => $value) {
					$this->mfang->delete("fang",array('id' => $value['id']));
				}
			}
			$this->mfang->delete("fangtuan",array('id' => $seg));
		}
	}
	public function fuang_over()
	{
		$seg=$this->uri->segment(3);
		if($seg){
			$this->mfang->delete("fang",array('id' => $seg));		
		}
	}
		


	public function price()
	{

		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		if(!$loginsession){
			echo "<script>window.location.href='/login/'</script>";
		}else{			


			$user_id = $this->session->userdata('userid');
			$user = $this->mpublic->getRow('member',"",array('id'=>$user_id,'accountype'=>'business'));
			if(count($user)>0)
			{
				echo '<html>'; 
				echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>';
				echo "<script>alert('商户不允许出价');window.history.go(-1);</script>";
				echo '</html>';
				exit();
			}

			$data['tuanid']=$this->uri->segment(3);
			$data['fangid'] = $this->uri->segment(4);
			$data['fang'] = $this->mpublic->getRow('fang','',array('id'=>$data['fangid']));
			$data['other_fang_lists'] = $this->mpublic->getList("fang","",array('tuanid' => $data['tuanid']));
			$this->load->view('web/fang/price.php',$data);
		}


	}
	
	public function jointuan()
	{
		$tuanid=$this->uri->segment(3);
		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		$data["member"] = $this->mpublic->getRow('member','Id,account',array('Id'=>$this->session->userdata('userid')));
		$data['fangtuan'] = $this->mpublic->getRow('fangtuan','',array('id'=>$tuanid));
		$data['tuanid']=$tuanid;
		$this->load->view('web/fang/join_tuan.php',$data);
	}

	public function forcost(){

		$data['islogin'] = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		if($data['islogin']){

			$params = $_POST;
			$user_id = $this->session->userdata('userid');

			//判断是否出过价
			$isforcost = $this->mpublic->getRow('forcost','',array('mid'=>$user_id,'fid'=>$params['fangid']));
			if(count($isforcost)>0){ exit("-1"); }

			//判断价格是在范围之内
			$fanginfo = $this->mpublic->getRow('fang','lowerprice,highprice',array('id'=>$params['fangid']));
		
			if(($params['jia']>=$fanginfo['lowerprice'])&&($params['jia']<=$fanginfo['highprice'])){	
				$forcostinfo = array(					
							'mid'=>$user_id,
							'fid'=>$params['fangid'],
							'cost'=>$params['jia'],
							'createtime'=>date('Y-m-d G:i:s')
				);
				$result = $this->mpublic->db->insert('forcost',$forcostinfo);
				exit("1"); //出价成功
			}elseif($params['jia']<$fanginfo['lowerprice']){
				exit("-2"); //出价低于最低价
			}

		}else{
			exit("0");
		}

	}

} 
