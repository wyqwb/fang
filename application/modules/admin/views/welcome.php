<div id='jsCustomScroll2' class="lfloat conrig_full">
	<div class="Ind_con">
			<div class="Ind_contop">
				<h2>快捷方式</h2>
				<ul class="Ind_conul">
					<li><a href="./admin/article"><img src="./images/admin/indextip.png" /><span>信息中心</span></a></li>
                    <li><a href="./admin/member"><img src="./images/admin/indextip6.png" /><span>会员中心</span></a></li>
                    <li><a href="./admin/orders"><img src="./images/admin/indextip2.png" /><span>订单中心</span></a></li>
                    <li><a href="./admin/administrator"><img src="./images/admin/indextip6.png" /><span>管理员</span></a></li>
                    <li><a href="./admin/ad"><img src="./images/admin/indextip4.png" /><span>广告中心</span></a></li>
                   <!--  <li><a href="http://tongji.baidu.com/web/welcome/login" target='_blank'><img src="./images/admin/indextip4.png" /><span>统计信息</span></a></li> -->
				</ul>
			</div>
<!-- 		<div class="Ind_conbot" id='jswelcome'>
			<div id="jsdashboard" style="border:1px solid #dcdcdc;height:400px;margin-bottom:10px;"></div>
		</div> -->
	</div>
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript" src="./javascript/thirdparty/highcharts.js"></script>
<script type="text/javascript" src="./javascript/thirdparty/exporting.js"></script>

<script>
    $(document).ready(function(){
        var btns = $('#jswelcome').find('a.item'),
            tables = $('#jswelcome').find('table.item');
        btns.each(function(i){
            $(this).click(function(){
                btns.each(function(j){
                    if(j==i)
                    {
                        $(this).addClass('cur');
                    }
                    else
                    {
                        $(this).removeClass('cur');
                    }
                });
                tables.each(function(k){
                    if(k==i)
                    {
                        $(this).removeClass('pub_hidden');
                    }
                    else
                    {
                        $(this).addClass('pub_hidden');
                    }
                });
                $("#jsCustomScroll2").mCustomScrollbar('update');
            });
        });


        // $('#jsdashboard').highcharts({
        //     title: {
        //         text: '上海致上访问统计',
        //         x: -20 //center
        //     },
        //     exporting :{
        //         //url:'export/index.php',
        //         width:800
        //     },
        //     subtitle: {
        //         text: '来源：本地服务器',
        //         x: -20
        //     },
        //     xAxis: {
        //         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        //     },
        //     yAxis: {
        //         title: {
        //             text: '人/次'
        //         },
        //         plotLines: [{
        //             value: 0,
        //             width: 1,
        //             color: '#808080'
        //         }]
        //     },
        //     tooltip: {
        //         valueSuffix: '次'
        //     },
        //     legend: {
        //         layout: 'vertical',
        //         align: 'right',
        //         verticalAlign: 'middle',
        //         borderWidth: 0
        //     },
        //     series: [{
        //         name: '会员',
        //         data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        //     }, {
        //         name: '非会员',
        //         data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        //     }]
        // });
    });
</script>
