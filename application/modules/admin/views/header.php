<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="renderer" content="webkit">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<base href='<?php echo base_url();?>' />
    <title>CMS-index</title>
    <?php load_resource('bootstrap.min.css');?>
    <?php load_resource('adminstyle.css');?>
    <?php load_resource('jquery.mCustomScrollbar.css');?>
    <?php load_resource('jquery.ui.css');?>
    <?php load_resource('jquery-1.8.3.min.js');?>
    <?php load_resource('global.js');?>
	<?php load_resource('jquery.mousewheel.js');?>
    <?php load_resource('bootstrap.js');?>
    <?php load_resource('jquery.form.min.js');?>
    <?php load_resource('jquery-ui-1.10.4.custom.min.js');?>
    <?php load_resource('jquery.filemanagement.js');?>
    <?php load_resource('jquery.lightbox.js');?>
    <?php load_resource('jquery.mCustomScrollbar.js');?>
    <?php load_resource('jquery.turnshaft.js');?>
    <?php load_resource('lightbox.js');?>
    <?php load_resource('default_lightcontrol.js');?>
    <?php load_resource('adminunfold.js');?>
    <?php load_resource('searchcondition.js');?>
</head>

<body>

<!-- header -->
<div class="header" id='jsHeader'>
    <div class="head-deploy">
		<ul>
			<li><a href="#"><img src="./images/admin/topuser.png" class="mar" /> 用户：<?php if(isset($Uname)) {echo $Uname;}?></a></li>
			<li class="jsshowset"><!--<a href="#"><img src="/images/admin/topset.png" class="mar" /> 设置 <img src="/images/admin/toparrow.png" class="mar2" /></a>
				
				--><ul class="toptnav">
					<div class="turntop"><img src="./images/admin/toptwonav.png" /></div>
					<li><a href="#">用户设置</a></li>
					<li><a href="#">系统设置</a></li>
					<li class="borbot"><a href="#">文件设置</a></li>
					<li><a href="#">帮助</a></li>
				</ul>
			</li>
			<li><a href="./index.php/admin/adminlogin/outlogin">退出</a></li>
		</ul>
	</div>
	<div class="lfloat head-logo"><a class="logo lfloat" href='./admin'></a></div>
	<div class="lfloat head-nav">
		<ul><?php if(isset($header_arr)){echo $header_arr;}?></ul>
	</div>

</div>