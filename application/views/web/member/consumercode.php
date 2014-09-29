
        <div class="content fr">            
            <!-- 横栏概览 -->
            <div class="userSum"><h2>客户消费码确认</h2></div>

            <!-- 看房团列表 -->
            <div class="userSum">

                <div class="bd clearfix">
                    <dl class="fl clearfix" style="line-height:30px">
                        <dt class="fl">
                        请输入客户消费码：
                        </dt>
                        <dd class="fl" >
                        <input id='customercode'  style="width:400px;border: 1px solid #ccc;line-height:30px;margin-left:30px">
                        </dd>
                    </dl>
                    <div class="fl about" style="float:right;line-height:30px">
                    <input type="button" value="确认" onclick="dosave()" style="width: 100px;height: 30px;cursor: pointer;background-color: #28a7e1;">
                    </div>
                </div>
               </div>
        </div>
    </div>
<script type="text/javascript"> 
function dosave(){
    var customercode = $("#customercode").val();
    if (customercode == "") {
    alert("消费码不能为空!");
    return false;
    }
    if(customercode.length!=5){
    alert("消费码位数不对!");
    return false;   
    }

    var resault = $.ajax({
                url: "/member/consumercodeact/",
                data: {'customercode':customercode},
                async: false,
                type: 'post'
    });
    //alert(resault.responseText);
    if (resault.responseText == "1") {
        alert("成功消费");
        $("#customercode").val("");
        return;
    }
    if (resault.responseText == "-1") {
        alert("已经消费过");
        return;
    }
    if (resault.responseText == "-2") {
        alert("消费码不存在");
        return;
    }

}

</script>
