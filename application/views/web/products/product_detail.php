<div class="content fr">
            <div class="breadCrumbs mb20">当前位置：金友汇专区&nbsp;&gt;&nbsp;产品专区&nbsp;&gt;&nbsp;<a href=""><?php echo $status;?></a></div>
            <div class="myProDetail">
                <div class="hd clearfix">
                    <h3 class="fl"><span class="icon-pro"></span><?php echo $name;?></h3>
                    <a class="btn-downAbout fr" href=""></a>
                </div>
                <div class="bd clearfix">
                    <div class="fl">
                        <div class="data-list">
                            <table>
                                <tbody>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品名称：</td>
                                        <td class="con"><a href=""><?php echo $name;?></a></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">简称：</td>
                                        <td class="con"><?php echo $table["SIMPLENAME"];?></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">预期年化收益：</td>
                                        <td class="con">
                                        <?php if(isset($table['RATE'])):?>
					                    <table>
					                    <?php foreach ( $table['RATE'] as $value ):?>
					                    <tr><td style="border-left:0px;border-top:0px;border-right:0px;text-align:left">
					                    <span class="red" style="text-align:center;"><?php echo $value?></span></td></tr>
					                    <?php endforeach;?>
					                    </table>
					                    <?php endif;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品期限：</td>
                                        <td class="con"><?php echo $table["PRODUCTDEADLINE"];?></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品状态：</td>
                                        <td class="con c_ff0000"><?php echo $status;?></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品规模：</td>
                                        <td class="con"><?php echo $table["SCALE"];?></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品发行日期：</td>
                                        <td class="con"><?php if(isset($table["PROJECTDATE"])) echo date("Y-m-d",strtotime($table["PROJECTDATE"]));?></td>
                                    </tr>
                                    <tr>
                                        <td width="112" class="tit tar" valign="top">产品成立日期：</td>
                                        <td class="con"><?php if(isset($table["FUNDINGDATE"])) echo date("Y-m-d",strtotime($table["FUNDINGDATE"]));?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="fr pt10">
                        <img src="uploads/ad3.jpg" alt="" />
                    </div>
                </div>
            </div>
            <?php if(isset($graph)):?>
            <div id="myTab2" class="ui-tab myTab1 myTab2">
                <div class="hd2"><h3 class="tal">净值走势图</h3></div>
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
            <?php endif;?>
        </div>
    </div>