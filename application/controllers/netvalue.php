<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Netvalue extends FrontMember_Controller {

	private $user_data;
	protected $prePage;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/mpublic');
		$loginsession = $this->session->userdata('islogin')?$this->session->userdata('islogin'):0;
		if(!$loginsession){
			echo "<script>window.location.href='".base_url()."'</script>";
		}else{
			$this->user_data = $this->session->userdata('userid');
		}
		$this->prePage = 10;
	} 
	
	/**
	 * 默认首页
	 */
	 public function index()
	{
		$this->front_header();
		$this->front_left();
		$db1 = $this->load->database('sqlserver',TRUE);
		$product_id = $this->uri->segment(3);
		$sql = "select * from cv_bas_ProductProject where NUMBER='".$product_id."'";
		$query = $this->mpublic->exc_sqlserver_sql($sql);
		if(count($query)==0)
		{
			$data["table"] = null;
			$data["graph"] = null;
		}
		else
		{
			$data["table"] = $query[0];
			$db2 = $this->load->database('default',TRUE);
			$data["table"]["PRODUCTDEADLINE"] = round($data["table"]["PRODUCTDEADLINE"]/365)."年";
			$rate = array();
			foreach ($query as $value ) 
			{
       			$rate[]  = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")";
 			}
 			$data["table"]["RATE"] = $rate;
			$sql = "select * from price where NUMBER='".$data["table"][0]["NUMBER"]."'";
			$query = $this->mpublic->exc_default_sql($sql);
			$data["graph"] = $query;
			$data["name"] = $data["table"][0]["NAME"];
		} 
		$data["json"] = json_encode($data["graph"]);
		$this->load->view('web/products/netValue_search.php',$data);
		$this->front_footer();
	}
	
	public function product_detail()
	{
		$this->front_header();
		$this->front_left();
		$product_id = $this->uri->segment(3);
		$sql = "select * from cv_bas_ProductProject where NUMBER='".$product_id."'";
		$query = $this->mpublic->exc_sqlserver_sql($sql);
		if(count($query)==0)
		{
			$data["table"] =null;
			$data["graph"] = null;
			$data["status"] = " ";
		}
		else
		{
			$data["table"] = $query[0];
			$data["table"]["PRODUCTDEADLINE"] = round($data["table"]["PRODUCTDEADLINE"]/365)."年";
			//$data["table"]["Rate"] = "5.3%";
			if($data["table"]["SCALE"]>10000)
			{
				$data["table"]["SCALE"] /=10000;
				if($data["table"]["SCALE"]>1000)
				{
					$data["table"]["SCALE"] /=1000;
					$data["table"]["SCALE"] .= "千万";
				}
				else
					$data["table"]["SCALE"] .= "万";
			}
			$rate = array();
			foreach($query as $value)
			{
				$rate[]  = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")"; 
			}
			$data["table"]["RATE"] = $rate;
			if(0==$query[0]["STATE"]||1==$query[0]["STATE"])
				$data["status"] = "募集中";
			else if(2==$query[0]["STATE"])
				$data["status"] = "已成立";
			else if(3==$query[0]["STATE"])
				$data["status"] = "已兑付";
			else
				$data["status"] = " ";
			$data["name"] = $data["table"]["NAME"];
			if(2==$query[0]["STATE"])
			{
				$sql = "select * from price where NUMBER='".$data["table"]["NUMBER"]."'";
				$query = $this->mpublic->exc_default_sql($sql);
				$data["graph"] = $query;
				
			}
			else
			{
				$data["graph"] = null;
			}
		}
		$data["json"] = json_encode($data["graph"]);
		$this->load->view('web/products/product_detail.php',$data);
		$this->front_footer();
	}
	
	public function product_list1()
	{
		$data["name"] = "募集中产品";
		$dataNum = $this->uri->segment(3);
    	$dataNum = empty($dataNum)?0:$dataNum;
		$sql = "select * from product where ishow=1";
		$result = $this->mpublic->exc_default_sql($sql);
		foreach ( $result as $k=>$value ) 
		{
       		$sql = "select * from cv_bas_ProductProject where NUMBER='".$value["NUMBER"]."' and PRODUCTSTATE in (0,1)";
       		$list = $this->mpublic->exc_sqlserver_sql($sql);
       		if(count($list)>0)
       		{
       			$result[$k]['PRODUCTTYPENAME']= $list[0]['PRODUCTTYPENAME'];
	            $result[$k]['PRODUCTDEADLINE']= $list[0]['PRODUCTDEADLINE'];
	            $result[$k]['PROJECTDATE']= $list[0]['PROJECTDATE'];
	            $result[$k]['NAME']= $list[0]['NAME'];
	            if("FOT"==$list[0]['PROJECTDATE'])
	            	$result[$k]['PRODUCTTYPENAME'] = "pro1.png";
	            else
	            	$result[$k]['PRODUCTTYPENAME'] = "pro3.png";
	            $rate = array();
	            foreach ( $list as $value ) 
	            {
       				$rate[] = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")";
				}
	            
	            $result[$k]['RATE']= $rate;
       		}
       		else
       			unset($result[$k]);
		}
		$count = count($result);
        $result_t = array();
        $k = 0;
        foreach ( $result as $value ) 
        {
       		$result_t[$k] = $value;
       		$k++;
		}
        $result_tmp = array();
        for($i=0;$i<$this->prePage;$i++)
        {
        	if(($dataNum+$i)>=$count)
        		break;
        	$result_tmp[$i] = $result_t[$dataNum+$i];
        }
        $data['result'] = $result_tmp;
        $this->load->library('pagination');

		$config['base_url'] = base_url().'products/product_list1';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->prePage;
		$config['cur_tag_open'] = "<a class='on'>";
		$config['cur_tag_close'] = "</a>";
		
		$config['first_link'] = '首页';
		$config['last_link'] ="最后一页";
		$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了
		$data['focus']='raisedin';
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		$sql = "select * from product where ishow=1";
		$test = $this->mpublic->exc_default_sql($sql);
		$this->front_header();
		
		$this->front_left();
		$this->load->view('web/products/product_list.php',$data);
		$this->front_footer();
	}
	
	public function product_list2()
	{
		$data["name"] = "已成立产品";
		$dataNum = $this->uri->segment(3);
    	$dataNum = empty($dataNum)?0:$dataNum;
		$sql = "select * from product where ishow=1";
		$result = $this->mpublic->exc_default_sql($sql);
		foreach ( $result as $k=>$value ) 
		{
       		$sql = "select * from cv_bas_ProductProject where NUMBER='".$value["NUMBER"]."' and PRODUCTSTATE in (2)";
       		$list = $this->mpublic->exc_sqlserver_sql($sql);
       		if(count($list)>0)
       		{
       			$result[$k]['PRODUCTTYPENAME']= $list[0]['PRODUCTTYPENAME'];
	            $result[$k]['PRODUCTDEADLINE']= $list[0]['PRODUCTDEADLINE'];
	            $result[$k]['PROJECTDATE']= $list[0]['PROJECTDATE'];
	            $result[$k]['NAME']= $list[0]['NAME'];
	            if("FOT"==$list[0]['PROJECTDATE'])
	            	$result[$k]['PRODUCTTYPENAME'] = "pro1.png";
	            else
	            	$result[$k]['PRODUCTTYPENAME'] = "pro3.png";
	            $rate = array();
	            foreach ( $list as $value ) 
	            {
       				$rate[] = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")";
				}
	            
	            $result[$k]['RATE']= $rate;
       		}
       		else
       			unset($result[$k]);
		}
		$count = count($result);
        $result_t = array();
        $k = 0;
        foreach ( $result as $value ) 
        {
       		$result_t[$k] = $value;
       		$k++;
		}
        $result_tmp = array();
        for($i=0;$i<$this->prePage;$i++)
        {
        	if(($dataNum+$i)>=$count)
        		break;
        	$result_tmp[$i] = $result_t[$dataNum+$i];
        }
        $data['result'] = $result_tmp;
        $this->load->library('pagination');

		$config['base_url'] = base_url().'products/product_list2';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->prePage;
		$config['cur_tag_open'] = "<a class='on'>";
		$config['cur_tag_close'] = "</a>";
		
		$config['first_link'] = '首页';
		$config['last_link'] ="最后一页";
		$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了
		$data['focus']='established';
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		$sql = "select * from product where ishow=1";
		$test = $this->mpublic->exc_default_sql($sql);
		$this->front_header();
		
		$this->front_left();
		$this->load->view('web/products/product_list.php',$data);
		$this->front_footer();
	}
	
	public function product_list3()
	{
		$data["name"] = "已兑付产品";
		$dataNum = $this->uri->segment(3);
    	$dataNum = empty($dataNum)?0:$dataNum;
		$sql = "select * from product where ishow=1";
		$result = $this->mpublic->exc_default_sql($sql);
		foreach ( $result as $k=>$value ) 
		{
       		$sql = "select * from cv_bas_ProductProject where NUMBER='".$value["NUMBER"]."' and PRODUCTSTATE in (3)";
       		$list = $this->mpublic->exc_sqlserver_sql($sql);
       		if(count($list)>0)
       		{
       			$result[$k]['PRODUCTTYPENAME']= $list[0]['PRODUCTTYPENAME'];
	            $result[$k]['PRODUCTDEADLINE']= $list[0]['PRODUCTDEADLINE'];
	            $result[$k]['PROJECTDATE']= $list[0]['PROJECTDATE'];
	            $result[$k]['NAME']= $list[0]['NAME'];
	            if("FOT"==$list[0]['PROJECTDATE'])
	            	$result[$k]['PRODUCTTYPENAME'] = "pro1.png";
	            else
	            	$result[$k]['PRODUCTTYPENAME'] = "pro3.png";
	            $rate = array();
	            foreach ( $list as $value ) 
	            {
       				$rate[] = (isset($value["RATE"])?$value["RATE"]."%":"0%")."(认购金额".$value["SUBSCRIBESTART"]."-".$value["SUBSCRIBEEND"].")";
				}
	            
	            $result[$k]['RATE']= $rate;
       		}
       		else
       			unset($result[$k]);
		}
		$count = count($result);
        $result_t = array();
        $k = 0;
        foreach ( $result as $value ) 
        {
       		$result_t[$k] = $value;
       		$k++;
		}
        $result_tmp = array();
        for($i=0;$i<$this->prePage;$i++)
        {
        	if(($dataNum+$i)>=$count)
        		break;
        	$result_tmp[$i] = $result_t[$dataNum+$i];
        }
        $data['result'] = $result_tmp;
        $this->load->library('pagination');

		$config['base_url'] = base_url().'products/product_list3';
		$config['total_rows'] = $count;
		$config['per_page'] = $this->prePage;
		$config['cur_tag_open'] = "<a class='on'>";
		$config['cur_tag_close'] = "</a>";
		
		$config['first_link'] = '首页';
		$config['last_link'] ="最后一页";
		$config['uri_segment'] = '3';//设为页面的参数，如果不添加这个参数分页用不了
		$data['focus']='paid';
		$this->pagination->initialize($config);
		
		$data['page'] = $this->pagination->create_links();
		$sql = "select * from product where ishow=1";
		$test = $this->mpublic->exc_default_sql($sql);
		$this->front_header();
		
		$this->front_left();
		$this->load->view('web/products/product_list.php',$data);
		$this->front_footer();
	}
	
    
    
} 
