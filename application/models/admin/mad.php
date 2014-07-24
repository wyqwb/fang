<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');
class Mad extends CI_Model {
    // private $per_page;
    public $perpage;
    public function __construct()
    {
        parent::__construct();
        $this->perpage = $this->config->item('perpage');
        $this->load->library('formdebris');
        $this->load->library('recursivejson');
        $this->load->database();
    }

    public function get_sort()
    {
        $this->db->select('id,pid,title,order,subtitle,published,type');
        //0表示广告分类
        $this->db->where(array('type'=>0));
        $query = $this->db->get('ad');
        $arr = $query->result_array();
        return $arr;
    }

    private function _option_tree($data,$default_id)
    {
        $str = '';
        foreach($data as $k=>$v)
        {
            if($default_id !== FALSE && $default_id == $v['id'])
            {
                $str .= "<option selected='selected' value='".$v['id']."'>".$v['title']."</option>";
            }
            else
            {
                $str .= "<option  value='".$v['id']."'>".$v['title']."</option>";
            }

            if(isset($v['child']) && !empty($v['child']))
            {
                foreach($v['child'] as $k2=>$v2)
                {
                    if($default_id !== FALSE && $default_id == $v2['id'])
                    {
                        $str .= "<option selected='selected' value='".$v2['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;|--".$v2['title']."</option>";
                    }
                    else
                    {
                        $str .= "<option value='".$v2['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;|--".$v2['title']."</option>";
                    }

                    if(isset($v2['child']) && !empty($v2['child']))
                    {
                        foreach($v['child'] as $k3=>$v3)
                        {
                            if($default_id !== FALSE && $default_id == $v3['id'])
                            {
                                $str .= "<option selected='selected' value='".$v3['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--".$v3['title']."</option>";
                            }
                            else
                            {
                                $str .= "<option value='".$v3['id']."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--".$v3['title']."</option>";
                            }

                        }
                    }
                }
            }
        }
        return $str;
    }
    public function get_sort_tree($default_id=false)
    {
        $arr = $this->get_sort();
        //print_r($arr);
        // exit;
        $this->recursivejson->initialize(array('data'=>$arr,'returntype'=>'array'));
        $outarr = $this->recursivejson->recursiveout();
        //<select style="width:300px;"><option>请选择所属分类</option><option>请选2择</option></select>
        $str = "<select name='pid' id='jsSelect' style='width:300px;'><option value='0'>请选择所属分类，默认作为顶级分类</option>";
        $str2 = $this->_option_tree($outarr,$default_id);
        $str = $str.$str2;
        $str .= "</select>";
        return $str;
    }

    public function get_sort_bypage()
    {
        $this->load->library('pagination');
        $this->db->from('ad');
        $this->db->where('`type` = 0');
        $this->db->order_by('order desc,id desc');
        $total_rows = $this->db->count_all_results();
        $this->pagination->my_initialize(base_url().'admin/ad/ad_sort/',$total_rows);
        $pageno = $this->uri->segment(4)?$this->uri->segment(4):0;
        $perpage = $this->perpage;
        $sql = "SELECT `id`,`pid`,`title` FROM `ad` WHERE `type` = 0 ORDER BY `id` desc LIMIT $pageno,$perpage";
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        $data['result']= $query->result_array();
        $data['page'] = $this->pagination->create_links();
        return $data;
    }
}