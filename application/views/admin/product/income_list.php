<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href='<?php echo base_url();?>' />
    <title>CMS-index</title>
    <link type="text/css" rel="stylesheet" href="./css/adminstyle.css">
    <style>
        .lighttable th{text-align:right;padding-right:20px;}
        .lighttable td{text-align:left;padding-left:20px;}
    </style>
</head>
<body>
<div class="ADD_coninp">
    <?php if(isset($table)){echo $table;}?>
</div>
</body>
</html>