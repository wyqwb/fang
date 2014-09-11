        <script charset="utf-8" type="text/javascript" src="javascript/jquery-1.8.3.min.js" ></script>
        <script charset="utf-8" type="text/javascript" src="javascript/global.js" ></script>
<div class="jstip">&nbsp;</div>


        <div class="content fr">
        </div>
           </div>
<div class="Com_mask jsheight" id="jsheight"></div>
<div class="Com_tip jscomtip" id="jscomtip">
    <div class="Com_tipleft"><img src="images/being.jpg" /></div>
    <div class="Com_tipright">
        <div><img src="images/jyhlogo.jpg" /></div>
        <h1>金友汇专区 即将开放<br />
            敬请期待</h1>
    </div>
    <span class="Com_close jsclose"><img src="images/close.png" /></span>
</div>
<div class="Com_tip jscomtip Con_low" id="jslows" style='top:20px;height:550px;' >
           </div>
<style type="text/css">

/*----------------------------提示弹出层-------------------------*/
.Com_tip{display:none;  width:810px; height:370px; position: fixed; top:100px; left:50%; margin-left:-405px; z-index:5; border:3px solid #0b2039; background-color:#fff;}
.Com_tipleft{ float:left;}
.Com_tipright{ float:right; padding:70px 140px 0 0;}
.Com_tipright h1{ font-weight:normal; font-size:30px; text-align:center; line-height:50px;}
.Com_close{ position:absolute; top:-10px; right:-10px;}
.Com_mask{  position:absolute; width:100%; left:0; top:0; background-color:#000;filter:alpha(opacity=50); -moz-opacity:0.5; opacity:0.5;}

.Con_low{ line-height:30px; font-size:14px; padding:20px;}
.Con_low h3{ font-size:28px; font-weight:normal; color:#019A98; padding-bottom:10px; margin-bottom:10px; border-bottom:1px solid #CECECE;}
.Con_low h3 .Con_tipspan{ font-size:22px; color:#EB6039; padding-left:15px;}
*/
</style>
<script type="text/javascript">
    $(document).ready(function(){
		var resizeMark = function()
		{
			var page = $.getPageSize();
			var heights = page.pageHeight;
			$('.jsheight').css('height',heights);
		}
        $('.jsclose').click(function(){
			
            $('.jscomtip').css('display','none');
            $('#jslows2').css('display','none');
            $('.jsheight').css('display','none');
	    location.href = "<?php echo base_url(); ?>";
        });
        $('.jstip').click(function() {
			resizeMark();
            $('#jscomtip').css('display','block');
            $('#jsheight').css('display','block');
        });
        $('.jslaw').click(function() {
			resizeMark();
            $('#jslows').css('display','block');
            $('#jsheight').css('display','block');
        });
        $('.jslaw2').click(function() {
			resizeMark();
            $('#jslows2').css('display','block');
            $('#jsheight').css('display','block');
        });

	$('.jstip').click();
    });

</script>

