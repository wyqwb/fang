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
        $search = array(
            'uri'=>'',
            'title'=>array('看房团名称'),
            'searchcondition'=>array('title')
        );
        $data['search'] = $this->load->module('/admin/frames/search',$search,true);
        $this->load->model('admin/morder');
        $tabledata['head'] = '订单编号_5%,下单人_10%,看房团_10%,订单跟踪_10%,参加人数_10%,消费值_5%,交易状态_10%,下单时间_10%,操作_10%';//,创建时间_20%,下单人_20%,订单状态_10%,操作_15%
        $tabledata['rules']['order']=array('id','account','title','ordertracking','joins','cost','typestr','createtime');

        $tabledata['rules']['operate']=array(
            // 'look'=>array('action'=>'admin/orders/order_view','id'=>'id','title'=>'查看详细')
        );


        $this->load->module('/admin/frames/header');
        $this->load->module('/admin/frames/left',array('type'=>'orders'));
        $this->load->module('/admin/frames/tools',array());

        if($this->input->post('searchsub'))
        {
            $result = $this->morder->get_searchorder();
            $tabledata['data'] = $result;
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        else{
            $result = $this->morder->get_orders_bypage();
            $tabledata['data'] = $result['result'];
            $tabledata['foot']= $result['page'];
            $this->formdebris->initialize($tabledata);
            $data['table'] = $this->formdebris->packing_table($tabledata);
        }
        $this->load->view('admin/orders/orderlist.php',$data);

    }


}