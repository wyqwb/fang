<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Edu extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/mpub');
        $this->load->model('admin/mquestion');
        $this->perpage = $this->config->item('perpage');
    }

    public function test()
    {
        $b = array(
            'a' => '答案1',
            'b' => '答案2',
            'c' => '答案3',
            'd' => '答案4'
        );
        $c = array();
        $i = 0;
        foreach($b as $k => $v)
        {
            $c[$i] = array($k,$v);
            $i++;
        }
        shuffle($c);
        $html = '';
        foreach($c as $row)
        {
            $html .= '<div><input type="radio" name="answer[]" value="'.$row['0'].'">'.$row['1'].'</div>';
        }
        echo $html;
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'edu'));
        $this->load->module('/admin/frames/tools');
        $this->welcome();
    }

    public function courselist()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'edu'));
        $this->load->module('/admin/frames/tools',array('tools'=>array('createcourse')));
        $search = array(
            'uri'=>'',
            'searchtitle'=>array('标题','副标题'),
            'searchcondition'=>array('title','subtitle')
        );
        $tabledata['head'] = '编号_5%,标题_40%,课程类别_20%,创建时间_20%,操作_15%';
        $tabledata['rules']['order']=array('id','title','category','ctime');
        $result = $this->mquestion->get_course_bypage();
        $tabledata['data'] = $result['result'];
        $tabledata['rules']['operate']=array(
            'add'=>array('action'=>'admin/edu/addcourse','id'=>'id','title'=>'创建课程'),
            'look'=>array('action'=>'admin/edu/classhourlist','id'=>'id','title'=>'查看课时'),
            'modify'=>array('url'=>'admin/edu/modifycourse/createcourse','id'=>'id','title'=>'修改课程'),
            'delete'=>array('action'=>'admin/edu/deletecourse','id'=>'id','title'=>'删除课程')
        );
        $tabledata['foot']= $result['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/edu/courselist.php',$data);

    }
    //创建课时
    public function addcourse()
    {
        $this->load->helper('resource');
       // $data['questions'] =  $this->mquestion->get_all_courses();
        if($this->input->post('sub'))
        {
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['addphoto']['name'])){
                $this->upload->do_upload('addphoto');
                $str = $this->upload->data();
                $videoimg = $str['file_name'];
            }else{
                $videoimg = "";
            }
            $data['videoimg'] = $videoimg;
            $data['pid'] = intval($this->input->post('pid'));
            $data['title'] = $this->input->post('title');
            $data['category'] = $this->input->post('category');
            $data['level'] = $this->input->post('level');
            $data['video'] = $this->input->post('video');
            $data['des'] = addslashes($this->input->post('des'));
            $data['ctime'] = date("Y-m-d H:i:s", time());
            $res = $this->db->insert('course', $data);
            $datas['msg']='创建成功';
            if($res)
            {
                $this->load->view('admin/pub_success.html',$datas);
            }
        }
        else
        {
            $data['pid'] = $this->uri->segment(4);
            $this->load->view('admin/edu/chossecourse',$data);
        }
    }

    //课时列表
    public function classhourlist()
    {
        $pid = intval($this->uri->segment(4));
        $tabledata['head'] = '编号_5%,标题_40%,课程类别_20%,创建时间_20%,操作_15%';
        $tabledata['rules']['order']=array('id','title','category','ctime');
        $result = $this->mquestion->get_classhour_bypage($pid);
        $tabledata['data'] = $result['result'];
        $tabledata['rules']['operate']=array(
            'modify'=>array('url'=>'admin/edu/modifyclasshour','id'=>'id','title'=>'修改课时'),
            'delete'=>array('action'=>'admin/edu/deleteclasshour/'.$pid,'id'=>'id','title'=>'删除课时'),
        );
        $tabledata['foot']= $result['page'];
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->view('admin/edu/classhourlist.php',$data);
    }

    public function deleteclasshour()
    {
        $id = intval($this->uri->segment(5));
        $pid = intval($this->uri->segment(4));
        $res = $this->db->delete('course', array('id' => $id));
        if ($res) {
            echo "<script>location.href='".base_url()."admin/edu/classhourlist/".$pid."'</script>";
        } else {
            echo "<script>location.href='".base_url()."admin/edu/classhourlist/".$pid."'</script>";
        }
       // $id = intval($this->uri->segment(4));
       // $this->confirm(base_url().'admin/edu/classhour_delete/'.$id,'确认删除');
    }

    public function modifyclasshour()
    {
        $this->load->helper('resource');
        if($this->input->post('sub'))
        {
            $id = intval($this->input->post('id'));
            $data['pid'] = intval($this->input->post('pid'));
            $config['upload_path'] = FCPATH.'uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '20000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            //第1张图
            if(!empty($_FILES['addphoto']['name'])){
                $this->upload->do_upload('addphoto');
                $str = $this->upload->data();
                $videoimg = $str['file_name'];
            }else{
                $videoimg = "";
            }
            $data['videoimg'] = $videoimg;

            $data['pid'] = intval($this->input->post('pid'));
            $data['title'] = $this->input->post('title');
            $data['category'] = $this->input->post('category');
            $data['level'] = $this->input->post('level');
            $data['video'] = $this->input->post('video');
            $data['des'] = addslashes($this->input->post('des'));
            $this->db->where('id', $id);
            $res = $this->db->update('course', $data);
            $datas['msg']='修改成功';
            if($res)
            {
                $this->load->view('admin/pub_success.html',$datas);
            }
        }
        else
        {
            $id = intval($this->uri->segment(4));
            $data['classhour'] = $this->mquestion->get_course_byid($id);
            $this->load->view('admin/edu/modifychossecourse',$data);
        }


    }

    //创建课程
    public function createcourse()
    {
        $this->load->helper('resource');
        $datas['actUrl'] = "./admin/edu/createcourse";
        if($this->input->post('sub'))
        {
            $data['title'] = $this->input->post('title');
            $data['category'] = $this->input->post('category');
            $data['level'] = $this->input->post('level');
            $data['price'] = $this->input->post('price');
            $data['des'] = $this->input->post('des');
            $data['ctime'] = date("Y-m-d H:i:s", time());
            $data['pid'] = 0 ;
            $res = $this->db->insert('course', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left',array('type'=>'edu'));
                $this->load->module('/admin/frames/tools',array('tools'=>array('createcourse')));
                $this->load->module('/admin/frames/returnTip',array('tip'=>'创建成功！','onurl'=>base_url()."admin/edu/createcourse/",'reurl'=>base_url()."admin/edu/courselist/"));

            }
        }
        else
        {
            $result = $this->mquestion->get_all_courseclass();
            $datas['result'] = $result['result'];
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left',array('type'=>'edu'));
            $this->load->module('/admin/frames/tools',array('tools'=>array('createcourse')));
            $this->load->view('admin/edu/createcourse',$datas);
        }
    }

    public function modifycourse()
    {
        if($this->input->post('sub'))
        {
            $id = intval($this->input->post('id'));
            $data['title'] = $this->input->post('title');
            $data['category'] = $this->input->post('category');
            $data['level'] = $this->input->post('level');
            $data['price'] = $this->input->post('price');
            $data['des'] = $this->input->post('des');
            $data['ctime'] = date("Y-m-d H:i:s", time());
            $this->db->where('id', $id);
            $res = $this->db->update('course', $data);
            if($res)
            {
                $this->load->module('/admin/frames/header');
                $this->load->module('/admin/frames/left',array('type'=>'edu'));
                $this->load->module('/admin/frames/tools',array('tools'=>array('createcourse')));
                $this->load->module('/admin/frames/returnTip',array('tip'=>'修改成功！','onurl'=>base_url()."admin/edu/modifycourse/createcourse/".$id,'reurl'=>base_url()."admin/edu/courselist/"));

            }
        }
        else
        {
            $id = intval($this->uri->segment(5));
            $result = $this->mquestion->get_all_courseclass();
            $data['course'] = $this->mquestion->get_course_byid($id);
            $data['result'] = $result['result'];
            $this->load->module('/admin/frames/header');
            $this->load->module('/admin/frames/left',array('type'=>'edu','segpos'=>4));
            $this->load->module('/admin/frames/tools',array('tools'=>array('createcourse')));
            $this->load->view('admin/edu/modifycourse',$data);
        }
    }

    public function deletecourse()
    {
        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('course', array('id' => $id));
        if ($res) {
            echo "<script>location.href='".base_url()."admin/edu/courselist';</script>";
        } else {
            echo "<script>location.href='".base_url()."admin/edu/courselist';</script>";
        }
    }
    public function modifycourseclass()
    {

    }
    public function deletecourseclass()
    {
        $id = intval($this->uri->segment(4));
        $res = $this->db->delete('courseclass', array('id' => $id));
        if ($res) {
            echo "<script>location.href='".base_url()."admin/edu/courseclass';</script>";
        } else {
            echo "<script>location.href='".base_url()."admin/edu/courseclass';</script>";
        }
    }
    //课程分类表
    public function courseclass()
    {
        if($this->uri->segment(4) == 'modify')
        {
            $id = intval($this->uri->segment(5));
            $data['result'] = $this->mquestion->get_courseclass_byid($id);
        }
        if($this->input->post('sub'))
        {
            $id = intval($this->input->post('id'));
            if($id == 0)
            {
                $datasql['title'] = $this->input->post('title');
                $res = $this->db->insert('courseclass', $datasql);
            }
            else
            {
                $datasql['title'] = $this->input->post('title');

                $this->db->where('id', $id);
                $res = $this->db->update('courseclass', $datasql);
            }
        }
        $tabledata['head'] = '编号_10%,分类名称_60%,操作_30%';
        $tabledata['rules']['order']=array('id','title');
        $result = $this->mquestion->get_all_courseclass();
        $tabledata['data'] = $result['result'];
        $tabledata['rules']['operate']=array(
            'modify'=>array('url'=>'admin/edu/courseclass/modify/','id'=>'id','title'=>'修改课程分类'),
            'delete'=>array('action'=>'admin/edu/deletecourseclass/','id'=>'id','title'=>'删除课程分类'),
        );
        $tabledata['foot']= '';
        $this->formdebris->initialize($tabledata);
        $data['table'] = $this->formdebris->packing_table($tabledata);
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'edu'));
        $this->load->module('/admin/frames/tools');
        $this->load->view('admin/edu/courseclass',$data);
    }

}