<style>.download_icon{}</style>	
<li>
		<label>Portfolio</label>
		<div class="OverviewFrmRi">
		  <input type="button" name="" class="upload_btn confirm_details" value="Add Item">
		</div>
	</li>
	<li>
		<label>&nbsp;</label>
		<div class="OverviewFrm3Ri">
		<div class="CategoryA">
		
	
		 
			<ul class="CategoryALi">
			<?php
			
		
			$c=1;
			 if(!empty($user_data['UserPortfolio'])){
					$i=0;
                                                
                                               
					foreach($user_data['UserPortfolio'] as $key=>$portfolio){
                                             $var='des'.$c;
						$var1='desdnd'.$c;
                                                $var2='link'.$c;
                                               
					if($i%4==0){
						$class='last';
					}else{
						$class='';
					}
						$portfolio = $portfolio["UserPortfolio"] ;
 


	
		 
						
				?>
						  <li class="<?php echo $class;?>" onmouseover="show_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')" onmouseout="hide_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')">
							  <?php 
						   if (empty( $portfolio['title']))  
 									$portfolio['title'] ="Noname" ;
						    echo $this->General->show_user_portfolio_img($portfolio['user_id'],$portfolio['image'],'THUMB',$portfolio['title']);
						 ?>
                                                      <div class="CateInfo" >
								  <p style="color:#FFF; font-size: 10px; word-wrap: break-word;"><?php echo $portfolio['description'];?>
								
									<?php  
									if($portfolio['url']!=""){
										if(strpos($portfolio['url'], 'http://') !== false)
											echo "";//'<a href="'.$portfolio['url'].'" target="_blank">link to more</a> ';
											else
											echo "";//'<a href="http://'.$portfolio['url'].'"target="_blank">link to more</a> ';
									}else{
										echo "";//'<a href="'.$portfolio['url'].'" target="_blank">link to more</a>';	
											
									}
									?>
									
									</p>
                                                                        
                                                                        <p style="bottom: -3px;
margin-bottom: -5px;
position: absolute;
margin-left: -8px;"> 
									 <button class='remove' rel='<?php echo $portfolio['id'];?>' id="des<?=$c?>"  style="position: absolute;display: table;margin-top: -18px; height: 22px;margin-left: 55px;" >  <img src="<?=SITE_URL?>/img/del.png" width="10" height="10"></button>    
                                                                        </p>		 
									  
                                                                       
								</div>
                                                      <div >
									<? echo "<a href='".SITE_URL."/img/users/".$portfolio['user_id']."/images/portfolio/original/".$portfolio['image']."' target='_blank' class='download_icon' style='margin-top: -18px;'>".$this->Html->image('/img/download.png',array('title'=>'download','alt'=>'download','id'=>'desdnd'.$c))."</a>";?>
                                                                       <? echo  "<a href='#' target='_blank' class='link_icon' style='margin-top: -18px;'>".$this->Html->image('/img/link.png',array('title'=>'link','alt'=>'link','id'=>'link'.$c))."</a>";?>
                                                        </div>
                                                                           
							 
						  </li>
				 <?php 
					 
					$i++;	
                                         $c++;
					}
			}?>
			 
			</ul>
		  </div>
		  
		  <!--  
		 <div class="CategoryA">
		 
			<h4>Project Categories:</h4>
			
			<ul class="CategoryALi">
			<?php if(!empty($user_data['UserPortfolio'])){
					$i=0;
					foreach($user_data['UserPortfolio'] as $key=>$portfolio){
if (empty($portfolio['Category']["name"])) 
continue; 

					if($i%4==0){
						$class='last';
					}else{
						$class='';
					}	
				 
				?>
			  <li class="<?php echo $class;?>">
			  
				  <p><?php echo $portfolio['Category']["name"];?> </p>
			 
			  </li>
			   <?php 
						 
				 		
					}
			}?>
			 
			</ul>
		  </div>
		   --> 
		  
		  
		</div>
	</li>
	
	
	<script type='text/javascript'>  
		jQuery(document).ready(function(){
			jQuery(".remove").click(function(){
				 var rel = jQuery(this).attr("rel")  ; 
				 var url = '<?=Router::url("/",true)?>users/deleteport/'+rel;
				 jQuery.get(url);
			 
				jQuery(this).parent().parent().parent().hide();  
				return false; 
			});
		
			
		});
	
	
	</script>
        <script>
            jQuery(document).ready(function(){
               $('.link_icon').css('display','none'); 
               $('.download_icon').css('display','none'); 
            });
 function show_des(id,dnld,plink){
	//alert("hello"+id);
         $('.link_icon').css('display','block'); 
         $('.download_icon').css('display','block'); 
	 document.getElementById(id).style.display="block";
	 document.getElementById(dnld).style.display="block";
         document.getElementById(plink).style.display="block";
 }
  function hide_des(id,dnld,plink){
	//alert("hello"+id);
	 document.getElementById(id).style.display="none";
	 document.getElementById(dnld).style.display="none";
         document.getElementById(plink).style.display="none";
 }
</script>