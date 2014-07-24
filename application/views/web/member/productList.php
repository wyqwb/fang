 <div class="content fr">
 <div class="breadCrumbs mb20">当前位置：金友汇专区&nbsp;&gt;&nbsp;我购买的产品&nbsp;&gt;&nbsp;<a href=""><?php echo $table[0]["name"]?></a></div>
            <div class="data-list ui-date">
            <?php for($k=0;$k<$table["num"];$k++):?>
            <?php if(3==$table["num"]) echo $table[$k]["name"]?>
                <table>
                    <thead>
                        <tr>
                            <?php if(isset($table[$k]["index"])):?>
                            	<?php for($i=0;$i<count($table[$k]["index"]);$i++):?>
                            		<th 
                            		<?php 
                            			if($table[$k]["index"][$i]=="NAME")
                            				echo 'colspan="2"';
                            		?>
                            		><?php echo $table[$k]["title"][$table[$k]["index"][$i]]; ?></th>
                            	<?php endfor;?>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                       <?php if(isset($table[$k]["data"])&&count($table[$k]["data"])>0):?>
                      
                        	<?php foreach ( $table[$k]["data"] as $value ):?>
                        		<tr>
                        		<?php for($i=0;$i<count($table[$k]["index"]);$i++):?>
                        		<?php
                        			 if($table[$k]["index"][$i]=="NAME"):?>
                        			 <td width="45" class="icon"><span class="icon-pro"></span></td>
                        		<?php
                        			endif;
                        			 if((2==$table[$k]["type"]||3==$table[$k]["type"])&&"SEARCH"==$table[$k]["index"][$i]):?>
                        			 <td><a class="icon-queryNet" href="<?php echo base_url();?>netvalue/index/<?php echo $value["NUMBER"];?>"></a></td>	
                        		<?php endif;?>
                        			<td <?php 
                        				if($table[$k]["index"][$i]=="STATE"&&$value[$table[$k]["index"][$i]]=="等待处理")
                        					echo "style='color:blue'";
                        				if($table[$k]["index"][$i]=="StateTo"||$table[$k]["index"][$i]=="Rate"||($table[$k]["index"][$i]=="STATE"&&$value[$table[$k]["index"][$i]]=="已拒绝"))
                        					echo "style='color:red'";
                        				if($table[$k]["index"][$i]=="STATE"&&$value[$table[$k]["index"][$i]]=="已处理")
                        					echo "style='color:green'";
                    					if($table[$k]["index"][$i]=="NAME")
                    						echo "width=130 class='icon_name'";	
                        			?>>
                        			<?php if($table[$k]["index"][$i]=="NAME"):?>
                        			<a href="<?php echo base_url();?>member/productAppointment/<?php echo $value["NUMBER"];?>">
                        			<?php endif;?>
                        			<?php if(isset($value[$table[$k]["index"][$i]])) echo $value[$table[$k]["index"][$i]];?></td>
                        		<?php endfor;?>
                        		</tr>
                        	<?php endforeach;?>
                        <?php endif;?>
                        
                    </tbody>
                </table>
                <br />
                <?php endfor;?>
            </div>
            <br />
            
        </div>
           </div>