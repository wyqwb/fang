<div class="clear cmscon" id='jsCenter'>
    <!--  left nav -->
    <div class="con-left" id='jsTurnLeft'  style='overflow:hidden;'>
        <div class="conleft-top">
            <a  class="borright" title="全屏显示"><i class="navtip4" id='jsFullScreen'></i></a>
            <a  class="borright" title="隐藏头部"><i class="navtip5" id='jsHiddenTop'></i></a>
            <a style='cursor:pointer;' class="zkall jsleftnone" id='jsLeftCloseAll'>关闭所有</a>
            <!--<i href="" class="open rfloat" title="隐藏左导航"></i>-->
        </div>
        <div class='left_overflow' id='jsLeft' style='position:absolute;left:0px;top:30px;right:0px;bottom:0px;'>
            <div class="conleft-con">
                <?php if(isset($left)){echo $left;};?>
            </div>
        </div>
    </div>
    <div class="lraction" id='jsTurnShaft'><span class="lract"></span></div>
	