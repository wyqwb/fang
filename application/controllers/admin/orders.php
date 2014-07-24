<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-20
 * Time: 下午3:20
 * To change this template use File | Settings | File Templates.
 */
class Orders extends AD_Controller
{
    public $perpage;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/mpub');
        $this->load->model('admin/marticle');
        $this->perpage = $this->config->item('perpage');
    }

    public function index()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orders'));
        $this->load->module('/admin/frames/tools');
        $this->welcome();
    }

    public function orderlist()
    {
        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orders'));
        $this->load->module('/admin/frames/tools',array('article'=>true,'images'=>false));
        $this->load->view('admin/orders/order_center_content.php');
    }


}