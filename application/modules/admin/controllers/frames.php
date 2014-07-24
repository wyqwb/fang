<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 14-1-21
 * Time: 下午4:46
 * To change this template use File | Settings | File Templates.
 */

class Admin_Frames_module extends AD_Module
{

    //菜单对象
    public $menu = array();
    public $header_arr = array();
    public $left_array = array();
    public $tools = array();
    public $type = '';
    public $seg2;
    public $seg3;
    public $seg4;
    public function __construct()
    {
        parent::__construct();
        $this->load->config('admin_config');
        $this->load->database();
        if (!isset($this->session)) $this->load->library('session');
        $this->menu = $this->config->item('admin_menu');
        $this->menu = $this->menu[$this->lang];
        //self::_setpower();
        $this->header_arr = $this->menu['header'];
        $tools = $this->config->item('tools');
        $this->tools = $tools[$this->lang];
        $this->load->model('mframes');
        $this->load->library('uri');
        $this->load->helper('url');
        $this->seg2 = $this->uri->segment(2);
        $this->seg3 = $this->uri->segment(3);
        $this->seg4 = $this->uri->segment(4);
    }

    private function _setpower(){
    	$powers=$this->session->userdata('power');
        for ($i=0;$i<sizeof($this->menu['header']);$i++){
        	$power = '/'.$this->menu['header'][$i]['title'].'/';
        	if (strpos($powers,$power.',')===FALSE) $this->menu['header'][$i] = null;
        	else {
        		$left = $this->menu['header'][$i]['action'];
        		$list = explode('/', $left);
        		$left = $list[1];
        		if(!isset($this->menu['left'][$left])) continue;
        		$lefts = $this->menu['left'][$left];
        		for ($i1=0;$i1<sizeof($lefts);$i1++){
        			$power1 = $power.$lefts[$i1]['title'].'/';
        			if (strpos($powers,$power1.',')===FALSE) $this->menu['left'][$left][$i1] = null;
        			else {
        				for($i2=0;$i2<sizeof($lefts[$i1]['child']);$i2++){
        					$power2 = $power1.$lefts[$i1]['child'][$i2]['title'].'/';
        					if (strpos($powers,$power2.',')===FALSE) $this->menu['left'][$left][$i1]['child'][$i2] = null;
        				}
        			}
        		}
        	}
        }
    }
    
    //获取 导航路径列表
    private function _get_where_list()
    {
        //<span>主菜单</span> &gt; <span>首页</span> &gt; <span class="blue2">最新咨询</span>
        $type = $this->type;
        $seg2 = $this->seg2 ;
        $seg3 = $this->seg3 ;
        $seg4 = $this->seg4 ;
        $result = '';
        $result .= "<span>主菜单</span>";
        if($seg2 && $seg3 == false)
        {
            $result .=" &gt;<span>".$this->menu['left'][$type][0]['title']."</span>";
        }
        else
        {
            if($seg3)
            {
                $default_action = end(explode('/',isset($this->menu['left'][$type][0]['action'])?$this->menu['left'][$type][0]['action']:''));

                if($seg3 == $default_action)
                {

                    $result .=" &gt; <span class='blue2'>".$this->menu['left'][$type][0]['title']."</span>";
                }
                else
                {

                    if(isset($this->menu['left'][$type][0]['action']))
                    {
                        $result .=" &gt; <span class='blue2'><a class='blue2' href='".base_url().$this->menu['left'][$type][0]['action']."'>".$this->menu['left'][$type][0]['title']."</a></span>";

                    }
                    else
                    {
                        $result .=" &gt; <span class='blue2'><a class='blue2' >".$this->menu['left'][$type][0]['title']."</a></span>";

                    }
                    $child = $this->menu['left'][$type][0]['child'];
                    foreach($child as $k=>$v)
                    {
                        $actions = explode('/',$v['action']);
                        if($seg2 == $actions[1])
                        {
                            if(end($actions) == $seg3)
                            {
                                $result .=" &gt; <span class='blue2'>".$v['title']." </span>";
                            }
                        }

                    }
                }
            }
        }
        return  $result;
    }

    //公用 标题模块
    public function content_title($title='')
    {
        return "<h4>".$title."</h4>";
    }
    private function _get_search_lightbox($searchtitle,$searchcondition)
    {
         $spans = "";
         $i=0;
         foreach($searchtitle as $row)
         {
             if($i >0 )
             {
                 $spans .= "<span class='searchitem' ><input type='button' field='".$searchcondition[$i]."' value='".$searchtitle[$i]."'></span>";
             }
             $i++;
         }
         $searlight = "<div id='jssearchcondition' class='searchcondition'><div class='close'></div>".
                          "<div class='searchleft'></div>".
                            "<div class='searchcontent'>".$spans."</div>".
                          "<div class='searchright'></div>".
                       "</div>";
         return $searlight;
    }
    //公用 搜索模块
    public function search($uri='',$searchtitle=array(),$searchcondition=array())
    {
        $uri = $uri;
        $searchtitle = $searchtitle;
        $searchcondition = $searchcondition;

        $str = "<div class='listsearch'>".
                     "<form action='".$uri."' method='post' id='jssearchform'>".
                          "<div class='serchcon'>查询：";
        if(is_array($searchtitle) && !empty($searchtitle) && count($searchtitle)==1)
        {
            $str .=  "<span id='jssearchtitlecontainer'><span class='starget'><input type='button' condition='".$searchcondition[0]."' value='".$searchtitle[0]."' /></span></span>";
        }
        else
        {
            $searchlight = $this->_get_search_lightbox($searchtitle,$searchcondition);
            $str .=  "<span id='jssearchtitlecontainer'><span class='starget'><input type='button' condition='".$searchcondition[0]."' value='".$searchtitle[0]."' /></span></span><span id='jsopensearch' class='searchmore'>[+]$searchlight</span>";

        }
        if(is_array($searchcondition) && !empty($searchcondition))
        {
            $str .="<input type='hidden' id='jshiddensearchcondition' name='searchcondition' value='".$searchcondition[0]."' />";
        }
        $str .=  "</div>".
                          "<div style='float:left;'><label>关键字：</label><input name='searchkey' id='jssearchkey' type='text' /></div>".
                          "<div style='float:left;'><input type='submit'  name='searchsub' value='查询' /></div>".
                     "</form>".
                "</div><hr style='border-bottom:1px dashed #cccccc; margin-bottom:20px;' />";
        return $str;
    }
    public function table_list()
    {

    }

    //全局公用，顶部导航
    public function header()
    {

    	$data['Uname'] = $this->session->userdata('name');
        $data['header_arr'] = $this->mframes->get_top_nav($this->header_arr);
        $this->load->view('header',$data);
    }
    //全局公用，二级工具栏
    public function tools($arr = array())
    {
		$tools = $this->tools;
		$newtool = array();
		if(!empty($arr))
		{
			foreach($arr as $k => $v)
			{
				$newtool[$v] = $tools[$v];
			}
		}
        $data['tools'] = array(
		    'tools' => $newtool,
            'where'=>$this->_get_where_list()
        );
        $this->load->view('tools',$data);
    }
    //用户中心  左侧按钮
    public function left($type='',$segpos=false)
    {
        if($type == '')
        {
            $type = $this->seg2;
        }
        $this->type = $type;
        $navs = $this->menu['left'][$type];
        $seg2 = $this->seg2;
        $seg3 = $this->seg3;
        $seg4 = $this->seg4;
        $where1 = FALSE;
        $where2 = FALSE;
        if($seg2 && $seg3)
        {
            foreach($navs as $k=>$v)
            {
                $child = $v['child'];
                $where = false;
                foreach($child as $k2=>$v2)
                {
                    $actions = explode('/',$v2['action']);
                	$action = end($actions);
                	if($segpos !== FALSE)
                	{
                		$seg3 = $this->uri->segment($segpos);
                	}
                    if($seg2 == $actions[1])
                    {
                        if($action == $seg3)
                        {
                            $where2 = $k2;
                            $where = true;
                        }
                    }

                }
                if($where === true)
                {
                    $where1 = $k;
                }
            }
        }
        $data['left'] = $this->mframes->get_left_nav($this->menu['left'][$type],$where1,$where2);

        $this->load->view('left',$data);
    }

    public function user_center_content()
    {
        $this->load->view('user_center_content');

    }

    public function welcome()
    {
      //  $data['days'] = $this->mframes->get_truck_byday();
      //  $data['weeks'] = $this->mframes->get_truck_byweek();
      //  $data['months']= $this->mframes->get_truck_bymonth();
      	$query = $this->db->query("select * from member order by createtime desc limit 0,10");
      	$data['memberlist'] = $query->result_array();
      	$query = $this->db->query("select * from article order by modifytime desc limit 0,10");
      	$data['articlelist'] = $query->result_array();
        $this->load->view('welcome',$data);

    }
    
    //操作成功后提示
    public function returnTip($tip,$onurl,$reurl='') {
    	$data['tip'] = $tip;
    	$data['onurl'] = $onurl;
    	$data['reurl'] = $reurl;
    	$this->load->view('backtip',$data);
    }

    public function footer()
    {

    }
}