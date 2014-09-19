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

				$tuanid=$data['fang']['tuanid'];
				$data['fangtuan_info']=$this->mpublic->getRow('fangtuan','id,previewimg',array('id'=>$tuanid));
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
		$this->mpublic->exc_sql('delete from fangtuan where id='.$seg);		
		}
	}
	public function fuang_over()
	{
		$seg=$this->uri->segment(3);
		if($seg){
		$this->mpublic->exc_sql('delete from fang where id='.$seg);		
		}
	}
		


	public function price()
	{

		$tuanid=$this->uri->segment(3);
		$data['tuanid']=$tuanid;
		$this->load->view('web/fang/price.php',$data);
	}
	
	public function jointuan()
	{

		$tuanid=$this->uri->segment(3);
		$data['tuanid']=$tuanid;
		$this->load->view('web/fang/join_tuan.php',$data);
	}


} 
