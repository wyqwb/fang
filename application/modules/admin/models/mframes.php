<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Admin_Mframes extends CI_Module
{
    public $base_url = '';
    public function __construct()
    {
        GLOBAL $CFG;
        $this->base_url = $CFG->item('base_url');
        parent::__construct();
    }
    //根据数据，获取左侧导航的字符串
    /**
     *
     */
    public function get_left_nav($data=array(),$where1,$where2)
    {
        if(!empty($data))
        {
            $i = 0;
            $len = count($data);
            $str = '';
            foreach($data as $k => $v)
            {
                //这里表示第一次循环
                if($i == 0)
                {
                    if($where1 === 0)
                    {

                        $str .= "<ul id='jsLeftNav'><li toggle='true' class='onfocus'>";
                    }
                    else
                    {
                        $str .= "<ul id='jsLeftNav'><li>";
                    }
                    $str .= "<div class='borderbottom conleftnav-top'>";
                    $str .= "<span class='lfloat twidth jsopens'>";
                    $str .= "<i class='nav-list'></i>";
                    if($v['type']=='default' && isset($v['action']))
                    {
                        $str .= "<a href='".$this->base_url.$v['action']."'>".$v['title']."</a>";
                    }
                    else
                    {
                        $str .= "<a  style='cursor:pointer;'>".$v['title']."</a>";
                    }
                    $str .="</span>";
                    $str .= "<span class='openlast'><a  class='modletip5 jsopen'></a></span></div>";
                    if(isset($v['child']))
                    {
                        if($where1===0)
                        {
                            $str .= $this->_get_left_nav_child($v['child'],$where2);
                        }
                        else
                        {
                            $str .= $this->_get_left_nav_child($v['child']);
                        }

                    }
                    $str .= "</li>";
                }
                //最后一次循环
                else if($i == $len-1)
                {
                    if($where1 == $i)
                    {

                        $str .= "<li toggle='true' class='onfocus'>";
                    }
                    else
                    {
                        $str .= "<li>";
                    }
                    $str .= "<div class='borderbottom conleftnav-top'>";
                    $str .= "<span class='lfloat twidth jsopens'>";
                    $str .= "<i class='nav-list'></i>";
                    if($v['type']=='default' && isset($v['action']))
                    {
                        $str .= "<a href='".$this->base_url.$v['action']."'>".$v['title']."</a>";
                    }
                    else
                    {
                        $str .= "<a style='cursor:pointer;'>".$v['title']."</a>";
                    }
                    $str .="</span>";
                    $str .= "<span class='openlast'><a  class='modletip5 jsopen'></a></span></div>";
                    if(isset($v['child']))
                    {
                        if($where1==$i)
                        {
                            $str .= $this->_get_left_nav_child($v['child'],$where2);
                        }
                        else
                        {
                            $str .= $this->_get_left_nav_child($v['child']);
                        }

                    }
                    $str .= "</li></ul>";
                }
                //其他循环
                else
                {
                    if($where1 == $i)
                    {

                        $str .= "<li toggle='true' class='onfocus'>";
                    }
                    else
                    {
                        $str .= "<li>";
                    }
                    $str .= "<div class='borderbottom conleftnav-top'>";
                    $str .= "<span class='lfloat twidth jsopens'>";
                    $str .= "<i class='nav-list'></i>";
                    if($v['type']=='default' && isset($v['action']))
                    {
                        $str .= "<a href='".$this->base_url.$v['action']."'>".$v['title']."</a>";
                    }
                    else
                    {
                        $str .= "<a style='cursor:pointer;'>".$v['title']."</a>";
                    }
                    $str .="</span>";
                    $str .= "<span class='openlast'><a  class='modletip5 jsopen'></a></span></div>";
                    if(isset($v['child']) && is_array($v['child']))
                    {
                        if($where1==$i)
                        {
                            $str .= $this->_get_left_nav_child($v['child'],$where2);
                        }
                        else
                        {
                            $str .= $this->_get_left_nav_child($v['child']);
                        }
                    }
                    $str .= "</li>";
                }
                $i++;
            }
            return $str;
        }
        else
        {
            return '';
        }
    }
    //获取第二级分类的元素
    
    //<ul class="clear twonav jstwonav"> 
    //    <li>
    //    <a href="" class="lfloat">最新动态</a>
    //    </li>
    //</ul>
    
    public function _get_left_nav_child($data=array(),$where2=-1)
    {
        if(!empty($data))
        {
            $i = 0;
            $len = count($data);
            $str = '';
            foreach($data as $k => $v)
            {
                if($i == 0)
                {
                    $str .= "<ul class='clear twonav jstwonav'>";

                    if($where2 == $i)
                    {
                        $str .= "<li class='focus'>";
                    }
                    else
                    {
                        $str .= "<li>";
                    }

                    if($v['type'] == 'default')
                    {
                        $str .= "<a href='".$this->base_url.$v['action']."' class='lfloat'>";
                        if(isset($v['icon']))
                        {
                            $str .= "<img src='./images/admin/icon/".$v['icon']."' />";
                        }
                        $str .= $v['title']."</a></li>";
                    }

                }
                else if($i == $len -1)
                {
                    if($v['type'] == 'default')
                    {
                        if($where2 == $i)
                        {
                            $str .= "<li class='focus'>";
                        }
                        else
                        {
                            $str .= "<li>";
                        }
                        $str .= "<a href='".$this->base_url.$v['action']."' class='lfloat'>";
                        if(isset($v['icon']))
                        {
                            $str .= "<img src='./images/admin/icon/".$v['icon']."' />";
                        }
                        $str .= $v['title']."</a></li></ul>";
                    }
                }
                else
                {
                    if($v['type'] == 'default')
                    {
                        if($where2 == $i)
                        {
                            $str .= "<li class='focus'>";
                        }
                        else
                        {
                            $str .= "<li>";
                        }
                        $str .= "<a href='".$this->base_url.$v['action']."' class='lfloat'>";
                        if(isset($v['icon']))
                        {
                            $str .= "<img src='./images/admin/icon/".$v['icon']."' />";
                        }
                        $str .= $v['title']."</a></li>";
                    }
                }
                $i++;
            }
            return $str;
        }
    }

    //获取顶部导航
    public function get_top_nav($data=array())
    {

        if(!empty($data))
        {
            $str = '';
            foreach($data as $k=>$v)
            {
                if($v['type'] == 'default')
                {
                    $str .= "<li><a href='".$this->base_url.$v['action']."'><i><img src='./images/admin/".$v['icon']."' /></i>".$v['title']."</a></li>";
                }
				else if($v['type'] == '_blank')
				{
					$str .= "<li><a href='".$v['action']."' target='_blank'><i><img src='./images/admin/".$v['icon']."' /></i>".$v['title']."</a></li>";
				}
            }
            return $str;
        }
    }
    //
    public function get_truck_byday()
    {
        $this->load->database();
        $start = strtotime(date('Y-m-d',time()));
        $end = $start+24*60*60;
        $sql = "SELECT *,COUNT(*) AS no FROM analytics WHERE `intime` > '$start' AND `intime` < '$end' GROUP BY uristring ORDER BY no DESC  LIMIT 0,10";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    //
    public function get_truck_byweek()
    {
        $this->load->database();
        $morning = strtotime(date('Y-m-d',time()));
        $start = $morning - 24*60*60*7;
        $end = $morning+24*60*60;
        $sql = "SELECT *,COUNT(*) AS no FROM analytics WHERE `intime` > '$start' AND `intime` < '$end' GROUP BY uristring ORDER BY no DESC  LIMIT 0,10";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    //
    public function get_truck_bymonth()
    {
        $this->load->database();
        $morning = strtotime(date('Y-m-d',time()));
        $start = $morning - 24*60*60*29;
        $end = $morning+24*60*60;
        $sql = "SELECT *,COUNT(*) AS no FROM analytics WHERE `intime` > '$start' AND `intime` < '$end' GROUP BY uristring ORDER BY no DESC  LIMIT 0,10";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;

    }
}