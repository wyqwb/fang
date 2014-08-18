<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Formdebris {
    private $CI;
    public $head;
    public $data;
    public $default_checkbox;
    public $order;
    public $operate;
    public $foot;
    public function __construct()
    {
        $this->CI =& get_instance();

    }
    
    // $tabledata['head'] = array(
    // array('data'=>'<input type="checkbox" name="admin" value="" />','class'=>'tt','action'=>'dd','width'=>'5%'),
    // array('data'=>'编号','class'=>'tt','width'=>'15%'),
    // array('data'=>'编号2','class'=>'tt','width'=>'15%'),
    // array('data'=>'标题','class'=>'tt','width'=>'35%'),
    // array('data'=>'操作','class'=>'operate','width'=>'30%')
    // );
    // $tabledata['data']= $this->marticle->get_sort();
    // $tabledata['rules']=array(
    // 'default_checkbox'=>array('classname'=>'js_recall','name'=>'admin','id'=>'id'),
    // 'order'=>array('id','title','pid'),
    // 'operate'=>array('look'=>array('url'=>'admin/ad/look_indexad/','id'=>'id'),'modify'=>array('url'=>'admin/ad/modify_indexad/','id'=>'id'),'delete'=>array('url'=>'admin/ad/confirm_to_deleteindexad/','id'=>'id'))
    // );
    // $tabledata['foot']='23232323';
     
    public function initialize($data)
    {
        //print_r($data);die;
                        
        $head = $data['head'];
        $rules = $data['rules'];
        $this->data = $data['data'];
        $headarr = array();
        if(is_string($head))
        {
            $head = explode(',',$head);
            if((isset($rules['default_checkbox']) && $rules['default_checkbox'] !== FALSE) )
            {
                $headarr[]=array('data'=>'<input type="checkbox" name="admin" value="" />','width'=>'5%');
            }
            foreach($head as $row)
            {
                $row = explode('_',$row);
                if(count($row)==2)
                {
                    $headarr[] = array('data'=>$row[0],'width'=>$row[1]);
                }
                else
                {
                    $headarr[] = array('data'=>$row[0]);
                }

            }
            $this->head = $headarr;
        }
        else
        {
            $this->head = $head;
        }
        if(isset($rules['default_checkbox']) && $rules['default_checkbox'] !== FALSE)
        {
            $this->default_checkbox = isset($rules['default_checkbox'])?$rules['default_checkbox']:array('classname'=>'js_recall','name'=>'admin','id'=>'id');
        }
        else if(!isset($rules['default_checkbox']) || $rules['default_checkbox'] ===FALSE)
        {
            $this->default_checkbox = FALSE;
        }
        if(isset($rules['order']))
        {
            $this->order = $rules['order'];
        }
        else
        {
            $this->order = FALSE;
        }
        $this->operate = isset($rules['operate'])?$rules['operate']:false;
        if(isset($data['foot']))
        {
            $this->foot = $data['foot'];
        }
    }

    public function _set_temp()
    {
        $tmpl = array (
            'table_open'          => '<table class="defaultlisttable"  border="0" cellpadding="4" cellspacing="0">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'tfoot_open'          => '<tfoot>',
            'tfoot_close'         => '</tfoot>',

            'footing_row_start'   => '<tr>',
            'footing_row_end'     => '</tr>',
            'footing_cell_start'  => '<th colspan="30">',
            'footing_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr class="even">',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
        );
        $this->CI->load->library('table');
        $this->CI->table->set_template($tmpl);
    }


    
     // $tabledata['head'] = array(
        //     array('title'=>'<input type="checkbox" name="admin" value="" />','class'=>'','width'=>'5%'),
        //     array('title'=>'编号','class'=>'','width'=>'35%'),
        //     array('title'=>'标题','class'=>'','width'=>'35%'),
        //     array('title'=>'操作','class'=>'operate','width'=>'25%')
        // );
    
    public function packing_table()
    {
        //print_r("expression");die;
        $this->_set_temp();
        $result = $this->_initialize_data();
        //print_r($result);die;
        $this->CI->table->set_heading($this->head);
        if($this->foot)
        {
            $foot = "<div class='con_page' style='margin-bottom:8px;overflow:hidden;'><ul class='con_pages'>".$this->foot."</ul></div>";
            if($this->default_checkbox === FALSE)
            {
                $len = count($this->head);
            }
            else
            {
                $len = count($this->head)+1;
            }
            $this->CI->table->set_footing($foot,$len);
        }
        return $this->CI->table->generate($result);
    }
    /**
     * 自动打包成表单输出
     * Enter description here ...
     * @param array $datas 输出数据
     * @param array $rules 规则
     * $tabledata['head'] = array(
    array('data'=>'Item.','class'=>'','width'=>'5%'),
    array('data'=>'中文名称','class'=>'','width'=>'25%'),
    array('data'=>'英文名称','class'=>'','width'=>'25%'),
    array('data'=>'预设价格','class'=>'','width'=>'10%'),
    array('data'=>'开始时间','class'=>'','width'=>'15%'),
    array('data'=>'结束时间','class'=>'','width'=>'15%'),
    array('data'=>'操作','class'=>'operate title blue','width'=>'5%'));
     * $tabledata['data'] = $this->admin_mpub->initialize_data($data['result'],array(
    'autoid'=>true,
    'navname'=>array('cnname','enname','price','stime','etime'),
    'operate'=>array('look'=>array('url'=>'admin/product/look_ele/','id'=>'id'),'modify'=>array('url'=>'admin/product/modify_ele/','id'=>'id'),'delete'=>array('url'=>'admin/product/confirm_to_deleteele/','id'=>'id'))));
    $tabledata['foot'] = $this->pagination->create_links();
     */
    public function _packing_table($datas=array())
    {
        $tmpl = array (
            'table_open'          => '<table class="defaultlisttable"  border="0" cellpadding="4" cellspacing="0">',

            'heading_row_start'   => '<tr>',
            'heading_row_end'     => '</tr>',
            'heading_cell_start'  => '<th>',
            'heading_cell_end'    => '</th>',

            'tfoot_open'          => '<tfoot>',
            'tfoot_close'         => '</tfoot>',

            'footing_row_start'   => '<tr>',
            'footing_row_end'     => '</tr>',
            'footing_cell_start'  => '<th colspan="30">',
            'footing_cell_end'    => '</th>',

            'row_start'           => '<tr>',
            'row_end'             => '</tr>',
            'cell_start'          => '<td>',
            'cell_end'            => '</td>',

            'row_alt_start'       => '<tr class="even">',
            'row_alt_end'         => '</tr>',
            'cell_alt_start'      => '<td>',
            'cell_alt_end'        => '</td>',

            'table_close'         => '</table>'
        );
        $this->CI->load->library('table');
        $this->CI->table->set_template($tmpl);
        $result = $this->_initialize_data($datas);
        $this->CI->table->set_heading($datas['head']);
        if(isset($datas['foot']))
        {
            $this->CI->table->set_footing($datas['foot'],count($datas['head']));
        }
        return $this->CI->table->generate($result);
    }
    /**
     $tabledata['rules']=array(
    'default_checkbox'=>array('classname'=>'js_recall','name'=>'admin','id'=>'id'),
    'order'=>array('pid','title'),
    'operate'=>array('look'=>array('url'=>'admin/ad/look_indexad/','id'=>'id'),'modify'=>array('url'=>'admin/ad/modify_indexad/','id'=>'id'),'delete'=>array('url'=>'admin/ad/confirm_to_deleteindexad/','id'=>'id'))
    );
     */
    private function _initialize_data()
    {
        //$rules = $this->rules;
        $data = $this->data;
        $order = $this->order;
        $default_checkbox = $this->default_checkbox;
        $operate = $this->operate;
        $i=1;
        $returnarr = array();
        foreach($data as $k => $v)
        {
        	if(is_array($v))
            {
                if($default_checkbox !== false)
                {
                    $checkname = $default_checkbox['name'];
                    $checkclass = $default_checkbox['classname'];
                    $id = $default_checkbox['id'];
                    if(!empty($id))
                    {
                        $checkvalue = $v[$id];
                    }
                    else
                    {
                        $checkvalue = '';
                    }
                    $inputhtml = "<input type='checkbox' name='".$checkname."' value='".$checkvalue."' class='".$checkclass."' />";
                    //array_unshift()
                    $returnarr[$k]['default_checkbox'] = $inputhtml;
                }
                //这里判断如果存在 排序规则，则按规则排序
                if($order !== FALSE)
                {
                    foreach($order as $rowkey=>$row)
                    {
						if(is_array($row))
						{
							foreach($v as $k2=>$v2)
							{
								if($k2 == $rowkey)
								{
									$v3arr = array();
									$v3arr['data']=$v2;
									foreach($row as $k3=>$v3)
									{
										$v3arr[$k3]=$v3;	
									}
									$returnarr[$k][$k2]=$v3arr;
								}
								else
								{
									continue;
								}
							}
						}
						else{
							foreach($v as $k2=>$v2)
							{
								if($k2 == $row)
								{
									$returnarr[$k][$k2]=$v2;
								}
								else
								{
									continue;
								}
							}
						}
                        
                    }

                }
                else
                {
                    foreach($v as $k2 => $v2)
                    {
                        $returnarr[$k][$k2] = $v2;
                    }
                }
                if($operate !== false)
                {
                    $html =  "";
                    $a = "";
                    foreach($operate as $k3=>$v3)
                    {
                    	$a = "";
                        $operateid = $v3['id'];
                        $operatettile = isset($v3['title'])?$v3['title']:'';
                        $operateurl = isset($v3['url'])?$v3['url']:false;
                        if($operateurl !== false)
                        {
                            $realid = $v[$operateid];
                            $action = base_url().$operateurl.'/'.$realid;
                            switch($k3)
                            {
                                case 'add':
                                    $defaulttitle = $operatettile?$operatettile:"创建";
                                    $a = "<a title='".$defaulttitle."'  href='".$action."' ><img src='./images/admin/icon/icon_add.gif' /></a>";
                                    break;
                                case 'look':
                                    $defaulttitle = $operatettile?$operatettile:"查看";
                                    $a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/icon_view.gif' /></a>";
                                    break;
                                case 'modify':
                                    $defaulttitle = $operatettile?$operatettile:"修改";
                                    $a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/icon_edit.gif' /></a>";
                                    break;
                                case 'recover':
                                    $defaulttitle = $operatettile?$operatettile:"覆盖";
                                    $a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/icon_trash.gif' /></a>";
                                    break;
                                case 'check':
                                    $defaulttitle = $operatettile?$operatettile:"check";
                                	if ($v[$v3['checkfield']] == $v3['checkdispvalue'])
                                    	$a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/517630.png' /></a>";
                                    break;
                                case 'access':
                                    $defaulttitle = $operatettile?$operatettile:"通过";
                                	if ($v[$v3['checkfield']] == $v3['checkdispvalue'])
                                    	$a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/517630.png' /></a>";
                                    break;
                                case 'reject':
                                    $defaulttitle = $operatettile?$operatettile:"驳回";
                                	if ($v[$v3['checkfield']] == $v3['checkdispvalue'])
                                    	$a = "<a  title='".$defaulttitle."' href='".$action."' ><img src='./images/admin/icon/517631.png' /></a>";
                                    break;
                                case 'delete':
                                    $defaulttitle = $operatettile?$operatettile:"删除";
                                    $a = "<a class='jsdelete' title='".$defaulttitle."' href='".$action."'  ><img src='./images/admin/icon/icon_drop.gif' /></a>";
                                    break;
                            }
                        }
                        else
                        {
                            $operateurl = $v3['action'];
                            $realid = $v[$operateid];
                            $action = $operateurl.'/'.$realid;
                            switch($k3)
                            {
                                case 'add':
                                    $defaulttitle = $operatettile?$operatettile:"创建";
                                    $a = "<a title='".$defaulttitle."' class='jsLightControl'  action='".$action."' ><img src='./images/admin/icon/icon_add.gif' /></a>";
                                    break;
                                case 'look':
                                    $defaulttitle = $operatettile?$operatettile:"查看";
                                    $a = "<a  title='".$defaulttitle."' class='jsLightControl' action='".$action."' ><img src='./images/admin/icon/icon_view.gif' /></a>";
                                    break;
                                case 'modify':
                                    $defaulttitle = $operatettile?$operatettile:"修改";
                                    $a = "<a  title='".$defaulttitle."' class='jsLightControl' action='".$action."' ><img src='./images/admin/icon/icon_edit.gif' /></a>";
                                    break;
                                case 'recover':
                                    $defaulttitle = $operatettile?$operatettile:"覆盖";
                                    $a = "<a  title='".$defaulttitle."' class='jsLightControl' action='".$action."' ><img src='./images/admin/icon/icon_trash.gif' /></a>";
                                    break;
                                case 'access':
                                    $defaulttitle = $operatettile?$operatettile:"通过";
                                    $a = "<a title='".$defaulttitle."' class='jsLightControl' action='".$action."' ><img src='./images/admin/icon/517630.gif' /></a>";
                                	break;
                                case 'reject':
                                    $defaulttitle = $operatettile?$operatettile:"驳回";
                                    $a = "<a  title='".$defaulttitle."' class='jsLightControl' action='".$action."' ><img src='./images/admin/icon/i517631.gif' /></a>";
                                	break;
                                    break;
                                case 'delete':
                                    $defaulttitle = $operatettile?$operatettile:"删除";
                                    $a = "<a class='jsdelete' title='".$defaulttitle."' action='".$action."'  ><img src='./images/admin/icon/icon_drop.gif' /></a>";
                                    break;
                            }
                        }
                        $html .= $a;
                    }
                    $returnarr[$k]['my_operate'] = $html;
                }
            }
            $i++;
        }
        return $returnarr;
    }
    /**
     * 格式化需要输出的数据
     * Enter description here ...
     */
    private function _initialize_data2($data)
    {
        //,$rules=array()
        $rules = $data['rules'];
        $data = $data['data'];
        $default_checkbox = isset($rules['default_checkbox']) ? $rules['default_checkbox'] : false;
        $operate = isset($rules['operate']) ? $rules['operate'] : false ;
        $navname = isset($rules['navname']) && is_array($rules['navname']) ? $rules['navname'] : false;
        $autoid = isset($rules['autoid']) && $rules['autoid'] == true ? true : false;
        $i = 1;
        $returnarr = array();
        foreach($data as $k=>$v)
        {
            if(is_array($v)){
                if($default_checkbox !== false)
                {
                    $checkname = $default_checkbox['name'];
                    $checkclass = $default_checkbox['classname'];
                    $id = $default_checkbox['id'];
                    if(!empty($id))
                    {
                        $checkvalue = $v[$id];
                    }
                    else
                    {
                        $checkvalue = '';
                    }
                    $inputhtml = "<input type='checkbox' name='".$checkname."' value='".$checkvalue."' class='".$checkclass."' />";
                    //array_unshift()
                    $returnarr[$k]['default_checkbox'] = $inputhtml;
                }
                if($autoid == true)
                {
                    $returnarr[$k]['my_autoid'] = $i;
                }
                foreach($v as $k2=>$v2)
                {
                    if($navname !== false)
                    {
                        if(in_array($k2,$navname))
                        {
                            $returnarr[$k][$k2]=$v2;
                        }
                        else
                        {
                            continue;
                        }
                    }
                    else
                    {
                        $returnarr[$k][$k2]=$v2;
                    }
                }
                if($operate !== false)
                {
                    $html =  "<div class='operatearea'><div class='operatecontainer'><div class='operatein'>";
                    $a = "";
                    foreach($operate as $k3=>$v3)
                    {
                        $operateid = $v3['id'];
                        $operateurl = $v3['url'];
                        $realid = $v[$operateid];
                        $action = $operateurl.$realid;
                        switch($k3)
                        {
                            case 'add':
                                $a = "<a class='look jsLightControl' title='添加房间' foot='查看' action='".$action."' ><img src='../images/admin/icon_add.png' /></a>";
                                break;
                            case 'look':
                                $a = "<a class='look jsLightControl' title='查看' foot='查看' action='".$action."' ><img src='../images/admin/icon_look.png' /></a>";
                                break;
                            case 'modify':
                                $a = "<a class='modify jsLightControl' title='修改' foot='修改' action='".$action."' ><img src='../images/admin/icon_modify.png' /></a>";
                                break;
                            case 'delete':
                                //echo 33333;
                                $a = "<a class='delete jsLightControl' title='确认删除' foot='确认删除' action='".$action."' title='' foot='' ><img src='../images/admin/icon_delete.png' /></a>";
                                break;
                        }
                        $html .= $a;
                    }
                    $html .= "</div></div></div>";
                    $returnarr[$k]['my_operate'] = $html;
                }
            }
            $i++;
        }
        return $returnarr;
    }
    /**
     * select 元素装箱
     * $defaults = array('name'=>'cnname','value'=>'交通工具');
     */
    public function packing_select($data=array(),$defaults = array())
    {
        $select = "<select ";
        if(isset($data['options']['id']) && !empty($data['options']['id']))
        {
            $select .= "id = '".$data['options']['id']."'";
        }
        if(isset($data['options']['name']) && !empty($data['options']['name']))
        {
            $select .= "name = '".$data['options']['name']."'";
        }
        if(isset($data['options']['style']) && !empty($data['options']['style']))
        {
            $select .= "style = '".$data['options']['style']."'";
        }
        if(isset($data['options']['class']) && !empty($data['options']['class']))
        {
            $select .= "class = '".$data['options']['class']."'";
        }
        $select .= " >";
        if(isset($data['options']['default']) && !empty($data['options']['default']))
        {
            $select .= $data['options']['default'];
        }
        if(isset($data['data']) && is_array($data['data']))
        {
            foreach($data['data']['value'] as $k => $v)
            {
                if(!empty($defaults))
                {
                    if($v[$defaults['name']] == $defaults['value'])
                    {
                        $select .="<option selected value='".$v[$data['data']['valuename']]."' >".$v[$data['data']['stringname']]."</option>";
                    }
                    else
                    {
                        $select .="<option value='".$v[$data['data']['valuename']]."' >".$v[$data['data']['stringname']]."</option>";

                    }
                }
                else
                {
                    $select .="<option value='".$v[$data['data']['valuename']]."' >".$v[$data['data']['stringname']]."</option>";
                }
            }
        }
        $select .= "</select>";
        return $select;
    }

    public function packing_radio($data,$name,$checked='')
    {
        $str = "";
        foreach($data as $k=>$v)
        {
            if(!empty($checked) && $checked == $k)
            {
                $str .= "$k <input type='radio' name='".$name."' checked='checked' value='".$v."'>";
            }
            else
            {
                $str .= "$k <input type='radio' name='".$name."' value='".$v."'>";
            }
        }
        return $str;
    }

    public function packing_checkbox($data,$name,$checked='')
    {
        $str = "";
        foreach($data as $k=>$v)
        {
            if(!empty($checked) && $checked == $k)
            {
                $str .= "$k <input type='checkbox' name='".$name."' checked='checked' value='".$v."'>";
            }
            else
            {
                $str .= "$k <input type='checkbox' name='".$name."' value='".$v."'>";
            }
        }
        return $str;
    }
}