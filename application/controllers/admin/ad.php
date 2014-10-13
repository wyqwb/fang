<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Ad extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/marticle');
        $this->load->model('admin/mad');
        $this->perpage = $this->config->item('perpage');
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'ad'));
        $this->load->module('/admin/frames/tools');
        $this->welcome();
    }

    public function ad_create()
    {
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
            if(!empty($_FILES['addphoto']['name'])){
                if($this->upload->do_upload('addphoto'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $data['previewimg'] = $previewimg;
                }
            }
            $data['title'] = $this->input->post('title');
            $data['url'] = $this->input->post('url');
            $data['type']= $this->input->post('type');
            $data['oid'] = $this->input->post('pid');
            $res = $this->db->insert('ad', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left');
                $this->load->module('/admin/frames/tools');
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."admin/ad/ad_create",'reurl'=>base_url()."admin/ad/adlist"));

            }
        }
        else
        {
            $data['sort'] = $this->marticle->get_sort_tree();
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left');
            $this->load->module('/admin/frames/tools');
            $this->load->view('admin/ad/ad_create',$data);
        }
    }




    public function links_create()
    {
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
            if(!empty($_FILES['addphoto']['name'])){
                if($this->upload->do_upload('addphoto'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $data['previewimg'] = $previewimg;
                }
            }
            $data['title'] = $this->input->post('title');
            $data['type']= $this->input->post('type');
            $data['url'] = $this->input->post('url');
            $res = $this->db->insert('ad', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left');
                $this->load->module('/admin/frames/tools');
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."admin/ad/ad_create",'reurl'=>base_url()."admin/ad/linkslist"));

            }
        }
        else
        {
            $data['sort'] = $this->marticle->get_sort_tree();
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left');
            $this->load->module('/admin/frames/tools');
            $this->load->view('admin/ad/linkscreate',$data);
        }
    }


    public function delete_ad()
    {

        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('ad', array('id' => $id));
        echo "<script>location.href='".base_url()."admin/ad/adlist';</script>";
    }

    public function delete_links()
    {

        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('ad', array('id' => $id));
        echo "<script>location.href='".base_url()."admin/ad/linkslist';</script>";
    }

    public function modify_ad()
    {
        if($this->input->post('sub'))
        {
            $id = $this->input->post('id');
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['addphoto']['name'])){
                if($this->upload->do_upload('addphoto'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $data['previewimg'] = $previewimg;
                }

            }
            $data['title'] = $this->input->post('title');
            $data['url'] = $this->input->post('url');
            $data['oid'] = $this->input->post('pid');
            $this->db->where('id', $id);
            $res = $this->db->update('ad', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left');
                $this->load->module('/admin/frames/tools');
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."admin/ad/ad_create",'reurl'=>base_url()."admin/ad/adlist"));

            }

        }
        else
        {
            $id = $this->uri->segment(4);
            $data['result'] = $this->mad->get_ad_byid($id);
            $data['sort'] = $this->marticle->get_sort_tree($data['result']['oid']);
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left');
            $this->load->module('/admin/frames/tools');
            $this->load->view('admin/ad/ad_modify',$data);
        }

    }


    public function modify_links()
    {
        if($this->input->post('sub'))
        {
            $id = $this->input->post('id');
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['addphoto']['name'])){
                if($this->upload->do_upload('addphoto'))
                {
                    $str = $this->upload->data();
                    $previewimg = $str['file_name'];
                    $data['previewimg'] = $previewimg;
                }

            }
            $data['title'] = $this->input->post('title');
            $data['url'] = $this->input->post('url');
            $data['type'] = $this->input->post('type');
            $this->db->where('id', $id);
            $res = $this->db->update('ad', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left');
                $this->load->module('/admin/frames/tools');
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."admin/ad/ad_create",'reurl'=>base_url()."admin/ad/linkslist"));

            }

        }
        else
        {
            $id = $this->uri->segment(4);
            $data['result'] = $this->mad->get_ad_byid($id);
            $data['sort'] = $this->marticle->get_sort_tree($data['result']['oid']);
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left');
            $this->load->module('/admin/frames/tools');
            $this->load->view('admin/ad/linkmodify',$data);
        }

    }



    public function adlist()
    {
        $tabledata['head'] = '编号_5%,标题_25%,连接地址_25%,预览图_25%,操作_25%';
        $tabledata['rules']['order']=array('id','title','url','previewimg');
        $tabledata['rules']['operate']=array(
            'modify'=>array('url'=>'admin/ad/modify_ad','id'=>'id','title'=>'修改广告'),
            //'modify'=>array('url'=>'admin/diff/createrule/modify','id'=>'id','title'=>'修改规则标题'),
            'delete'=>array('action'=>'admin/ad/delete_ad','id'=>'id','title'=>'删除广告'),
        );
        $result = $this->mad->get_ads_bypage();
        $tabledata['data'] = $result['result'];
        $tabledata['foot']= $result['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->module('/admin/frames/tools');
        $this->load->view('admin/ad/adlist',$data);
    }

        public function linkslist()
    {
        $tabledata['head'] = '编号_5%,标题_15%,外链地址_35%,预览图_25%,操作_25%';
        $tabledata['rules']['order']=array('id','title','url','previewimg');
        $tabledata['rules']['operate']=array(
            'modify'=>array('url'=>'admin/ad/modify_links','id'=>'id','title'=>'修改友情连接'),
            'delete'=>array('action'=>'admin/ad/delete_links','id'=>'id','title'=>'删除友情连接')
        );
        $result = $this->mad->get_links_bypage();
        //print_r($result);die;
        $tabledata['data'] = $result['result'];
        $tabledata['foot']= $result['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        //print_r($data['table']);die;
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left');
        $this->load->module('/admin/frames/tools');
        //print_r($data);die;
        $this->load->view('admin/ad/linkslist',$data);
    }


}