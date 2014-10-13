<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 默认 首页模块
*/
class Search extends Front_Controller {
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('web/msearch');
    }
    /**
     * 默认首页
     */
    public function index()
    {
        $data['key'] = addslashes($this->input->post('search'));
        $this->front_header('index');
        $this->load->view('web/search/search.html',$data);
        $this->front_footer();
      //  $this->load->view('web/search/search.html',$data);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */