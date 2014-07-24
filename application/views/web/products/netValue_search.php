 <div class="content fr">
 <div class="breadCrumbs mb20">当前位置：金友汇专区&nbsp;&gt;&nbsp;产品专区&nbsp;&gt;&nbsp;<a href="">净值查询</a></div>
            <!-- 列表 -->
            <div class="data-list ui-date ui-dateSty2">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">产品名称</th>
                            <th>预期年化收益率</th>
                            <th>产品期限</th>
                            <th>发行期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($table)):?>
                        <tr>
                            <td width="45" class="icon"><span class="icon-pro"></span></td>
                            <td width="130" class="icon_name"><a href=""><?php echo $table["NAME"];?></a></td>
                            <td class="c_ff0000">
                            <?php if(isset($table['RATE'])):?>
		                    <table>
		                    <?php foreach ( $table['RATE'] as $value ):?>
		                    <tr><td style="border-left:0px;border-top:0px;border-right:0px;border-bottom:0px;text-align:left">
		                    <span class="red" style="text-align:center;"><?php echo $value?></span></td></tr>
		                    <?php endforeach;?>
		                    </table>
		                    <?php endif;?>
                            </td>
                            <td><?php echo $table["PRODUCTDEADLINE"];?></td>
                            <td><?php echo date("Y-m-d",strtotime($table["PROJECTDATE"]));?></td>
                            <td><span class="icon-netValue2"></span></td>
                        </tr>
                     <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div id="myTab1" class="ui-tab myTab1">
                <div class="hd clearfix">
                    <div class="fl">
                        <p>最近30天&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select><option>时间选择</option></select></p>
                    </div>
                    <div class="ui-tab-btn fr clearfix">
                        <a class="fr" href="javascript:;">列表图显示</a>
                        <a class="fr ui-tab-on" href="javascript:;">趋势图显示</a>
                    </div>
                </div>
                <div class="bd clearfix">
                    <div class="ui-tab-con">
                        <!-- 列表 -->
                        <div class="data-list">
                            <table>
                                <thead>
                                    <tr>
                                        <th>名称</th>
                                        <th>净值</th>
                                        <th>累计净值</th>
                                        <th>估计日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($graph)):?>
                                <?php foreach ($graph as $value ):?>
                                	<tr>
                                		<!--<td width="45" class="icon"><span class="icon-pro"></span></td>-->
                                		<td><?php echo $name;?></td>
                                        <td><?php echo $value["price"];?></td>
                                        <td><?php echo $value["pricesum"];?></td>
                                        <td><?php echo $value["date"];?></td>
                                	</tr>
                                
                                <?php endforeach;?>
                                <?php endif;?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="ui-tab-con" style="display: block;">
                        <div class="pt20">
                            <div id="placeholder" style="width: 670px; height:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script charset="utf-8" type="text/javascript" src="<?php echo base_url(); ?>/javascript/jquery.flot.js" ></script>
            <script type="text/javascript">
                (function () {
                    $("#myTab1 .ui-tab-btn a").click(function () {
                        $("#myTab1 .ui-tab-btn a").removeClass("ui-tab-on");
                        $(this).addClass("ui-tab-on");
                        $("#myTab1 .ui-tab-con").hide();
                        $($("#myTab1 .ui-tab-con")[$.inArray(this, $("#myTab1 .ui-tab-btn a"))]).show();
                    });
                    //绘制图表
                    var data_all = '<?php echo $json;?>';
                    data_all = eval('(' + data_all + ')');
                    var data_graph = [];
                    var data_x = [];
                    var j = 0;
                    for(var i in data_all)
                    {
                    	data_graph.push([j,(data_all[i]["price"]-1)*2500]);
                    	data_x.push([j,data_all[i]["date"]]);
                    	j++
                    }
                    $.plot($("#placeholder"), [{
                        data: data_graph
                    }], {
                        series: {
                            lines: { show: true },
                            point: { show: true }
                        },
                        xaxis: {
                            ticks: data_x
                        },
                        yaxis:{
                        	ticks:[[0,1.0000],[5,1.0020],[10,1.0040],[15,1.0060],[20,1.0080],[25,1.0100],[30,1.0120],[35,1.0140],[40,1.0160]]
                        }
                    });
                })();
            </script>
            </div>
            </div>