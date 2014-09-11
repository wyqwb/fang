<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 * 
 * 格式化时间类
 * 首先初始化时间为 北京时间
 * 
 */

class Timeformat
{
	private $timetype = 'Y-m-d';
	private $notime   = '无';
	//$this->load->library('Timeformat');
	public function __construct()
	{
		date_default_timezone_set('Asia/Shanghai');
	}
	/**
	 * 把字符串类型的日期数据转换成INT10类型
	 */
	public function format_toint($str)
	{
		$strarr = explode(' ',$str);
		// 2012-12-23 3:23:32 这里表示时间有时分秒 2012/12/23
		// mktime(hour,minute,second,month,day,year,is_dst)
		if(count($strarr) > 1 )
		{
			$ymd = count(explode('-',$strarr[0]))<3 ? explode('\/',$strarr[0]) : explode('-',$strarr[0]);
			$hms = count(explode(':',$strarr[1]))<3 ? explode('-',$strarr[1]) : explode(':',$strarr[1]);
			$time = mktime($hms[0],$hms[1],$hms[2],$ymd[1],$ymd[2],$ymd[0]);
		}
		else
		{
			$ymd = count(explode('-',$strarr[0]))<3 ? explode('\/',$strarr[0]) : explode('-',$strarr[0]);
			$time = mktime(0,0,0,$ymd[1],$ymd[2],$ymd[0]);
		}
		return $time;
	}
	/**
	 * 根据给定格式，把数组中的元素格式转换为日期格式
	 * $this->timeformat->format_array($data['result'],array('d_utime'),'Y-m-d H:i:s');
	 * 如果 $changearr是空字符串，则自动循环数组，并直接返回为日期格式
	 */
	public function format_array($arr,$changearr=array(),$timetype)
	{
		$timetype = isset($timetype) ? $timetype : $this->timetype;	
		if(is_array($changearr))
		{
			foreach($arr as $key=>$val)
			{
				foreach($changearr as $key2)
				{
					if(is_array($arr[$key]))
					{
						$oldval = intval($arr[$key][$key2]);
						if($oldval == 0)
						{
							$arr[$key][$key2] = $this->notime;
						}
						else
						{
							$arr[$key][$key2] = date($timetype,$oldval);
						}
					}
					else
					{
						if($key == $key2)
						{
							$oldval = intval($arr[$key]);
							if($oldval == 0)
							{
								$arr[$key] = $this->notime;
							}
							else
							{
								$arr[$key] = date($timetype,$oldval);
							}
						}
						else
						{
							continue;
						}
					}
				}
			}
		}
		else if(is_string($changearr) && empty($changearr))
		{
			foreach($arr as $k3 => $v3)
			{
				$arr[$k3] = date($timetype,$v3);
			}
		}
		
		return $arr;
	}

}