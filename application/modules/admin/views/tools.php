<div class="con-right" id='jsTurnRight'>
    <div class="lfloat conrig-top">
        <div class="lfloat rig-title"><?php if(isset($tools) && isset($tools['where'])){echo $tools['where'];}?></div>
        <div class="rfloat rig-modle">
            <?php if(isset($tools) && isset($tools['tools']) && !empty($tools['tools'])){
				foreach($tools['tools'] as $k=>$v){echo $v;}
			}?>
        </div>
    </div>