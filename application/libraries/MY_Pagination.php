<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-2-12
 * Time: 下午7:05
 * To change this template use File | Settings | File Templates.
 */
class MY_Pagination extends CI_Pagination
{
    public $perpage;
    public $my_segment = 4;
    public function __construct()
    {
        parent::__construct();
        GLOBAL $CFG;
        $this->perpage = $CFG->item('perpage');
    }

    public function my_initialize($base_url,$total_rows,$uri_segment=FALSE)
    {
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = $uri_segment?$uri_segment:$this->my_segment;
        $config['total_switch'] = true;
        $config['per_page'] = $this->perpage;
        $config['first_link'] = '首页';
        $config['last_link'] = '尾页';
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="curr">';
        $config['cur_tag_close'] = '</li>';
        $this->initialize($config);
    }
}