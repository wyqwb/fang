<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Morgframe extends CI_Model {
    private $per_page;
    public function __construct()
    {
        parent::__construct();
        $this->perpage = $this->config->item('perpage');
        $this->load->library('formdebris');
        $this->load->library('recursivejson');
        $this->load->database();
    }

    public function get_tree($data,$type=FALSE)
    {

    }

    private function _option_tree($data)
    {
        $str = '';
        foreach($data as $k=>$v)
        {
            $str .= "<option value='".$v['id']."'>".$v['title']."</option>";
            if(isset($v['child']) && !empty($v['child']))
            {
                foreach($v['child'] as $k2=>$v2)
                {
                    $str .= "<option value='".$v2['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;|--".$v2['title']."</option>";
                    if(isset($v2['child']) && !empty($v2['child']))
                    {
                        foreach($v['child'] as $k3=>$v3)
                        {
                            $str .= "<option value='".$v3['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--".$v3['title']."</option>";
                        }
                    }
                }
            }
        }
        return $str;
    }

	public function get_searchsort_bypage($id,$searchcondition = "",$searchkey='')
    {
    	$this->load->library('pagination');
    	$serch = $this->input->post('searchcondition') == '' ? $searchcondition : $this->input->post('searchcondition');
    	//echo $serch;
    	//exit;
        $searchcondition = explode('_',$serch);
        $searchkey = trim($this->input->post('searchkey')) == '' ? $searchkey : trim($this->input->post('searchkey'));
        $likearr = array();
        foreach($searchcondition as $row)
        {
            if(!empty($row))
            {
                $likearr[$row] = $searchkey;
            }
        }
        $wherearr['pid'] = $id;
        $wherearr['status'] = 1;
        $this->db->select('id,title,subtitle,published,pid,order');
        $this->db->like($likearr);
        $this->db->where($wherearr);
        $this->db->order_by('order desc,id desc');
        //$query = $this->db->get('article');
        $this->db->from('article');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/orgframe/org_lists/'.$id.'/'.$serch.'/'.$searchkey,$total_rows,7);
        $pageno = $this->uri->segment(7)?$this->uri->segment(7):0;
        $perpage = $this->perpage;
        $this->db->like($likearr);
        $this->db->where($wherearr);
        $this->db->order_by('order desc,id desc');
        $this->db->limit($perpage,$pageno);
        $query = $this->db->get('article');
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        $data['serchcon'] = $likearr;
        return $data;

    }
    //$base_url,$total_rows,$uri_segment
    public function get_sort_bypage($id)
    {
        $this->load->library('pagination');
        $this->db->from('article');
        $this->db->where(array('pid'=>$id,'status'=>1));
        $this->db->order_by('order desc,id desc');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/orgframe/org_lists/'.$id,$total_rows,5);
        $pageno = $this->uri->segment(5)?$this->uri->segment(5):0;
        $perpage = $this->perpage;
        $this->db->where(array('pid'=>$id,'status'=>1));
        $this->db->order_by('order desc,id desc');
        $this->db->limit($perpage,$pageno);
        $query = $this->db->get('article');
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        //print_r($data['page']);
        //exit;
        return $data;
    }

    public function get_sort($id)
    {
        $this->db->select('id,pid,title,subtitle,published,type');
        $this->db->where(array('pid'=>$id,'status'=>1));
        $query = $this->db->get('article');
        $arr = $query->result_array();
        return $arr;
    }

    public function get_sort_tree()
    {
        $arr = $this->get_sort();
        $this->recursivejson->initialize(array('data'=>$arr,'returntype'=>'array'));
        $outarr = $this->recursivejson->recursiveout();
        //<select style="width:300px;"><option>请选择所属分类</option><option>请选2择</option></select>
        $str = "<select style='width:300px;'><option value='0'>请选择所属分类，默认作为顶级分类</option>";
        $str2 = $this->_option_tree($outarr);
        $str = $str.$str2;
        $str .= "</select>";
        return $str;
    }

}