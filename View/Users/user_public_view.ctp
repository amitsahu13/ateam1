<script>
    jQuery(".download").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');	
                        alert(id);
			//window.location = SiteUrl+"/jobs/download_job_apply_file/"+ id;
                        window.location = SiteUrl+"/users/download_portfolio/1400595669.jpg";
		});
    </script>
<?
App::import("model", "Colloberation");  
?>

<?php if (isset($feedback)): ?> 
   <!--   FeedBack Popup    -->
		<div class="popup-wrapper show"  id='feedback_popup'   > 
			<div class='popup_invite_deffault popup'> 
				<h3>   FeedBack :  </h3> 
					<form method='post' >   
					 <input type='hidden' name='feedback' value='1' /> 
 					 

 					 <!-- Select job here -->   
 					 <p> Select Job: 
					 	<select name='job_id'>  
					 			<?php foreach($feed_list as $job=>$title):?> 
					 				<option value='<?=$job?>'>  <?=$title?> </option>
					 			<? endforeach ;?> 
 						</select>
					 </p>  
 						 <div class="popup_field"> 
 							<p> Technical Skills :    
								<input type='checkbox'  name='skill[]' value='1'  checked ="checked" /> 
								<input type='checkbox'  name='skill[]' value='2' /> 
								<input type='checkbox'  name='skill[]' value='3' /> 
								<input type='checkbox'  name='skill[]' value='4' /> 
								<input type='checkbox'  name='skill[]' value='5' /> 
						   </p> 
							 </div> 
 	 						 <div class="popup_field"> 
						     <p>  Communication :  
 								<input type='checkbox'  name='coom[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='comm[]' value='2' /> 
								<input type='checkbox'  name='comm[]' value='3' /> 
								<input type='checkbox'  name='comm[]' value='4' /> 
								<input type='checkbox'  name='comm[]' value='5' />  
 							 </p>  
 							 </div> 

	 					 	<div class="popup_field"> 
 							 <p>  Creativity  :  
 								<input type='checkbox'  name='crea[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='crea[]' value='2' /> 
								<input type='checkbox'  name='crea[]' value='3' /> 
								<input type='checkbox'  name='crea[]' value='4' /> 
								<input type='checkbox'  name='crea[]' value='5' />  
 							 </p>   
 							 	</div> 

							<div class="popup_field"> 
 							 <p>  Timeline  :  
 								<input type='checkbox'  name='time[]' value='1' checked ="checked"   /> 
								<input type='checkbox'  name='time[]' value='2' /> 
								<input type='checkbox'  name='time[]' value='3' /> 
								<input type='checkbox'  name='time[]' value='4' /> 
								<input type='checkbox'  name='time[]' value='5' />  
 							 </p>   
 							 	</div> 

 							 	<div class="popup_field">  
 							 		<p> In Words </p>  
 							 		<textarea name='comment'></textarea> 


 							 	</div> 

 								<button type='submit'> Submit</button>  
							   
 					</form> 
 		   </div>  
 		</div>  
 
 <!-- End FeedBack  Popup  -->  
 <script type="text/javascript"> 

 jQuery(document).ready(function(){

 			   jQuery('#feedback_popup').fadeIn();
 					 
						 jQuery('#feedback_popup .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);  

							closePopup();
							 
		
						function closePopup() {
							$('.popup-wrapper').bind('click', function(event){
								var container = $(this).find('.popup');
								if (container.has(event.target).length === 0){
									container.animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
								}
							});
						}
						 

 });

  </script>
 
<?php endif ;?>  



<h3 class="title_h3"> User Profile  Details   </h3> 
<div class="clear"></div>
<div class="expert_detail max_width">
	<h2 class="col_blue"><?php echo  User::getuserName( $userPublicView['User']["id"]);   ?></h2>
	<div class="clear"></div>
	<div class="deatil_content_large">
		<div class="detail_top_large">
			<div class="expert_img sets-1" style=" margin-right:10px;">
					<?php 
								echo  $user_img=$this->General->show_user_img($userPublicView['User']['id'],$userPublicView['UserDetail']['image'],$userPublicView['UserDetail']['gender'],'SMALL',$userPublicView['User']['first_name'].' '.$userPublicView['User']['last_name']);
						?></div> 
						
						<div class="detail" style="float:left">
                        <div class="nav_bar">
								<ul>
								  <li style="border:none;">
								  
								  <a href="<?=SITE_URL?>/Workrooms/chatroom/<?=$userPublicView['User']['id']?>" class="chat">
								   Chat in Chatroom </a></li>
								 
								 <? if (isset($expert)):?> 
								 	<li style="padding-top: 1px;">  
								 		<a href='javascript:void(0)' class='invite_team invite_job' rel='<?=$userPublicView["User"]["id"]?>' >  Invite to team-up</a>
								 	</li>  
								 <?php endif?> 	
								 	
								 	 
								</ul>
							</div>
						
						<? if ($userPublicView['User']['id'] != $this->Session->read('Auth.User.id')): ?> 
						
						
						
						
						
						 <!--  Expert   -->
								 	
						<!--  end Expert   -->		
						
						
						 <? endif;?>   
						 
								 
								 
							<div style="clear: both;"></div>
						 	<div class="fac_bar">
                            <p class='first_line'> 
                            <?php
									  	  		if(isset($userPublicView['UserDetail']['ExpertiseCategory']['name']) &&!empty($userPublicView['UserDetail']['ExpertiseCategory']['name']))
												{
												  echo  $userPublicView['UserDetail']['ExpertiseCategory']['name']."";
												}
										 		if(isset($userPublicView['UserDetail']['LeaderCategory']['name']) )
												{
												  echo  ", ".$userPublicView['UserDetail']['LeaderCategory']['name'];
												}  
												if ($userPublicView["status"]!="") 
											 	echo  ", ". $userPublicView["status"];
	 											
										?>
										
                            
                            </p>
							<p class='second_line'>  
 											Availability:  <?=$userPublicView["avail"]?>
											<?php if($userPublicView['User']['role_id']==Configure::read('App.Role.Provider') 
											|| $userPublicView['User']['role_id']==Configure::read('App.Role.Both') ){?>&nbsp;Day job $/hr. :  </span> 
 											<?php  
 											if ($userPublicView['UserDetail']['min_reference_rate']!="")  
								       		echo  ((int) $userPublicView['UserDetail']['min_reference_rate']);
								       		else 
								       		echo "N/A" ;  
										       	 if ($userPublicView['UserDetail']['max_reference_rate']!="" && isset($userPublicView['UserDetail']['max_reference_rate']))  
								       		echo  "-". ((int) $userPublicView['UserDetail']['max_reference_rate']);
								       	    ?> 
	 										 <?php
											}
											?>
											
 										</p> 
										<div class='therd_line'>  
                                    <?php
									  $country_name = '';
									  if(isset($userPublicView['UserDetail']['Country']['name']) 
									  &&!empty($userPublicView['UserDetail']['Country']['name']))
									  $country_name=$userPublicView['UserDetail']['Country']['name'];
									  ?> 

									 

									 <?php echo ucfirst($country_name);?>
									 <div class="flag_icon" style="margin-right: 0;"> 
										 <?php if(!empty($userPublicView['UserDetail']['Country']['country_flag'])) 
									 	{ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$userPublicView['UserDetail']['Country']['country_flag'],
									 		array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name))).",&nbsp;";}?>
									 </div>  
								 
									  <?php
									 	if($userPublicView["User"]["role_id"]==3)
											echo "Signed as Leader";
										if($userPublicView["User"]["role_id"]==4)
											echo "Signed as Expert";	
										if($userPublicView["User"]["role_id"]==5)
											echo "Signed as Leader & Expert";
									 ?>
									  
  
 									 </div> 
								
								 </div>
							</div>
						 
						 <?  
					 
						 ?>
						 
						 
		  	<div class="clear"></div>
		</div>
		  
	 	 <!--  Detail_bottom  Stack   -->
		<div class="detail_bottom">
		 	 
		 		
		 
		 
		 
		 <p style="padding: 4px 0"> <?=nl2br($userPublicView['UserDetail']['about_us'])?>   </p>
		 <p>Skills: <? 
		 $a   = array();   
		 foreach($userPublicView["skills"] as $s) {
					if (!in_array($s, $a))
											echo "<span class='col_blue'> {$s}   </span>"; 
					$a[]  =  $s;  }
				
				
				
						if (count($userPublicView["skills"] )==0) 
							echo  "Not Specified";
?>							
				</p> 
		 	
										
		</div> 
		
		
		
		
	</div>
</div>
 <div class="clear"></div> 
 
 
 <h2><a href="#"> PERSONA </a></h2>
  <!--  Some   Others info   For   user profile   stack   -->
 <div class="expert_detail max_width">
	
	<div class="clear"></div>
		<div class="compensation_frmDV">
		<div class="user_fieldset">
			<label>C.V</label>
			<div class="user_field">
				<textarea disabled style="height:200px; border: 1px solid rgb(236, 236, 236);"><?=$userPublicView['UserDetail']["resume_text"]?></textarea>
			</div>
		 </div>
		 <?php if($userPublicView['UserDetail']["resume_doc"]!=""){?>
		 <div class="user_fieldset">
		 	<label>C.V. File:</label> 
			
			<div class="user_field">
			<div style="color:gray; font-weight:bold;">
				<sapn><?=$userPublicView['UserDetail']["resume_doc"]?></span>  
						<a href='<?=SITE_URL?>/users/downloadresumeother/<?=$userPublicView['User']["id"]?>'> 
						<span class="exprt_smbl2 job_attche_download" alt="Download" title="Download"></span>
						</a>

					</div>
				
			</div>
		</div>
		<?php } ?>
		
		
		
		<!--  Social Links   Starts Here    -->
		<? if ( ($userPublicView['UserDetail']["linkdin_url"]!="") || ($userPublicView['UserDetail']["github_url"]!="") || ($userPublicView['UserDetail']["behance_url"]!="") || ($userPublicView['UserDetail']["carbonmade_url"]!="")):?>
		<div class="user_fieldset">
			<label>Public Portfolios:</label>
			
			<div class="user_field social_icon">
			<? if ($userPublicView['UserDetail']["linkdin_url"]!=""):?>
			<?php  if(strpos($userPublicView["UserDetail"]["linkdin_url"], 'http://') !== false)
							echo '<a href="'.$userPublicView['UserDetail']["linkdin_url"].'" target="_blank"> ';
					else
					echo '<a href="http://'.$userPublicView['UserDetail']["linkdin_url"].'" target="_blank"> ';
						
				?>
				
				
				<?php echo $this->Html->image('/img/linkedin.png',array('title'=>'LinkedIn','alt'=>'LinkedIn'));?>
				</a>
				<? endif;?> 
				<? if ($userPublicView['UserDetail']["github_url"]!=""):?>
					<?php  if(strpos($userPublicView["UserDetail"]["github_url"], 'http://') !== false)
							echo '<a href="'.$userPublicView['UserDetail']["github_url"].'" target="_blank"> ';
					else
					echo '<a href="http://'.$userPublicView['UserDetail']["github_url"].'" target="_blank"> ';
						
				?>
					
						<?php echo $this->Html->image('/img/github.png',array('title'=>'Github','alt'=>'Github'));?> </a>
				<? endif;?> 
				<? if ($userPublicView['UserDetail']["behance_url"]!=""):?>
				<?php  if(strpos($userPublicView["UserDetail"]["behance_url"], 'http://') !== false)
							echo '<a href="'.$userPublicView['UserDetail']["behance_url"].'" target="_blank"> ';
					else
					echo '<a href="http://'.$userPublicView['UserDetail']["behance_url"].'" target="_blank"> ';
						
				?>
					
						<?php echo $this->Html->image('/img/behance-icon.png',array('title'=>'Behance','alt'=>'Behance'));?>
					</a>
				<? endif;?> 
				<? if ($userPublicView['UserDetail']["carbonmade_url"]!=""):?>
				<?php  if(strpos($userPublicView["UserDetail"]["carbonmade_url"], 'http://') !== false)
							echo '<a href="'.$userPublicView['UserDetail']["carbonmade_url"].'" target="_blank"> ';
					else
					echo '<a href="http://'.$userPublicView['UserDetail']["carbonmade_url"].'" target="_blank"> ';
						
				?>
					
						<?php echo $this->Html->image('/img/Carbonmade-Icon.png',array('title'=>'Behance','alt'=>'Behance'));?>
					</a>
				<? endif;?> 
				
			</div>  
			 
		</div>	
		<? endif;?> 
		
		
		
		
		<!--  End Social Links    -->
		
		
		
		
		
		
		
		
		<!--  Portfolio  items Starts  Here    -->
		
		<div class="user_fieldset">
			<label>Portfolio:</label>
			<div class="user_field portfolio">
			
			
		 	 	<?  
		 	 	$i=0;
		 	 	//print_r($userPublicView["UserPortfolio"]);<a href='".$item["url"]."'>  Link  </a>
		 	 	 foreach ($userPublicView["UserPortfolio"] as $item ){
					$i+=1;
						$var='des'.$i;
						$var1='desdnd'.$i;
                                                $var2='link'.$i;
						if (!empty($item["url"])){ 
                                                    
                                                    if(strpos($item['url'], 'http://') !== false){
                                                        
                                                       $url= $item['url'];
                                                    }else{
                                                        $url= 'http://'.$item['url'];
                                                    }
							?>
						 
								 <div class="port_item" onmouseover="show_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')" onmouseout="hide_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')"> 
							<?php	
								echo	$this->General->show_user_portfolio_img($item['user_id'],$item['image'],'THUMB',$item['title'])."							
									<div class='des_port' id='des".$i."'> ".$item['description']."     </div>  
                                                                           
									<a href='".SITE_URL."/img/users/".$item['user_id']."/images/portfolio/original/".$item['image']."' target='_blank' class='download_icon'>".$this->Html->image('/img/download.png',array('title'=>'download','alt'=>'download','id'=>'desdnd'.$i))."</a>
                                                                        <a href='".$url."' target='_blank' class='link_icon'>".$this->Html->image('/img/link.png',array('title'=>'link','alt'=>'link','id'=>'link'.$i))."</a>
									<span>  ".str_replace("Category:","",$item["cat"])."      </span> <br>   

 										
								</div>  "; 
							} else{
							?>
						 <div class="port_item" onmouseover="show_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')" onmouseout="hide_des('<?php echo $var;?>','<?php echo $var1;?>','<?php echo $var2;?>')"> 
							<?php	
								echo	$this->General->show_user_portfolio_img($item['user_id'],$item['image'],'THUMB',$item['title'])."							
									<div class='des_port' id='des".$i."'> ".$item['description']."     </div>  
                                                                        <a href='#' target='_blank' class='link_icon'>".$this->Html->image('/img/link.png',array('title'=>'link','alt'=>'link','id'=>'link'.$i))."</a>
									<a href='".SITE_URL."/img/users/".$item['user_id']."/images/portfolio/original/".$item['image']."' target='_blank' class='download_icon'>".$this->Html->image('/img/download.png',array('title'=>'download','alt'=>'download','id'=>'desdnd'.$i))."</a>
									<span>  ".str_replace("Category:","",$item["cat"])."      </span> <br>   
 								 </div>  
							"; 
								}


				


					 } 



 		 		?>
				<div class="download_icon">
					<a href="#"><?php //echo $this->Html->image('/img/download.png',array('title'=>'download','alt'=>'download'));?></a>
				</div>
			</div>
		</div>   
		
		
		
		<!--  End Portfolios     -->
		
		
		</div>
</div>
<div class="clear"></div>






 <!--  Projects  Starts   Here    -->  
 
 
 
 <h2><a href="#">PROJECTS </a></h2>
 <div class="max_width">
	
	<div class="clear"></div>
	 	 <? 
	 	   foreach ($data as $project_key => $project_value ):  
	 	  ?>
	  	<div class="expert_detail" style="float:left;">
			<h2 <?php echo $userPublicView["User"]["role_id"];if ($userPublicView["User"]["role_id"]==3 || $userPublicView["User"]["id"]  ==  $project_value['Project']["user_id"] ) echo "class='col_blue' "  ; else  echo "class='pink' " ?>   >
			<a href="/projects/public_view/<?=$project_value['Project']["id"]?>" style="color:#02ADC2; ">
			<?php echo ucfirst($project_value['Project']['title']) ?>
			</a>
			
			 </h2>
			 
			
			<div class="deatil_content">
				<div class="detail_top">
					<div class="expert_img">
					<?php echo $this->General->show_project_img($project_value['Project']['id'],$project_value['Project']['project_image'],'SMALL',$project_value['Project']['title']);
					 ?></div>
						<div class="detail">
							<div class="nav_bar">
								<ul>
								<? if ($userPublicView['User']['id'] != $this->Session->read('Auth.User.id')): ?> 
								<li style="border:none;"> <a href="<?=SITE_URL?>/Workrooms/chatroom/<?=$userPublicView['User']['id']?>" class="chat">  Chat in Chatroom </a></li>
								 <? endif;?> 
									
								 </ul>
							</div>
						<p class="dec" style="max-height: 72px;overflow: hidden;"><span>Description:</span> <?php echo nl2br(ucfirst($project_value['Project']['description']));
						?></p>
						</div>
					<div class="clear"></div>
					<div class="fac_bar fac_width">
					<div class="fac_row">
							<div class="row_blocks">
								<span>Project Category:</span>
								<? print_r($project_value["Category"]["name"]); ?>
							</div> 
						</div> 
						<div class="fac_row">
						<div class="row_blocks"> 
							<span> Collaboration Types: </span>
												 <?=Colloberation::getColloborationProject($project_value['Project']["id"])?>
							 	  				 <?php   
								 					$l = Colloberation::getFreelanceProject($project_value['Project']["id"]) ;  
								 					if  ($l!="No") 
								 						 echo " & Freelancing " ;  
 												 ?> 
							</div> 
						</div>	
						<div class="fac_row">
						
						<div class="row_blocks"><span>Idea Maturity:</span><?php echo ucfirst($project_value['IdeaMaturity']['name']);?></div> 
						<div class="row_blocks"><span>Project Status:</span><?php echo ucfirst($project_value['ProjectStatus']['name']); ?></div>
						</div> 
 						<div class="fac_row">
 						
							<div class="row_blocks">
							
							<span>Business Plan:</span> 
							<?php 
							


									if ( Project::hasFile($project_value['Project']["id"]))  
										echo '<a href="'.( Project::hasFile($project_value['Project']["id"])).'">Yes</a>'  ; 
									else echo  "No";
							
							?>
							
							
							</div> 
							
						

						  <!-- Collaboration Types :   -->   
 							

					 		<div class="row_blocks"><span>Availabilty in project:</span><?php echo ucfirst($project_value['Availability']['name']);?></div>
							</div>
						    <div class="fac_row">
							<div class="row_blocks"><span>Project Type:</span><?php echo ucfirst($project_value['ProjectType']['name']);?></div>
						</div>
						 

						 <div class="fac_row">
						<div class="row_blocks"><span>Leader's Location:</span>
						<?php 
						 // set Project 
						 if (isset($project_value['User']['UserDetail']['Country']['name']))
						 echo ucfirst($project_value['User']['UserDetail']['Country']['name']);

						 ?>
						<div class="flag_icon">

						<?php if(!empty($project_value['User']['UserDetail']['Country']['country_flag']))
						{

						 echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($project_value['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($project_value['User']['UserDetail']['Country']['name'])));} ?></div>


						 </div>												
						<div class="row_blocks"><span>Leader's Username:</span>
						<sapn style="color:#02ADC2"><?php
							echo $username = $project_value['User']['first_name']." ".$project_value['User']['last_name'];
							//echo $this->General->wrap_long_txt($username,0,7)
							?>
							</sapn>
							</div>
						
						</div>
						 
						<div class="fac_row">
							<div class="row_blocks"><span>Required Location:</span><div class="flag_icon"><?php echo $this->Html->image('req_loc.png');?></div><?php echo $project_value['Region']['name'];?> ,<?php echo $project_value['Country']['name'];?> ,<?php echo $project_value['State']['name'];?></div>
 						</div>

						<div class="fac_row">
							 <div class="row_blocks">
							<span>Self Investment:</span>
							<?php
							if(!empty($project_value['Project']['self_investment_option']))
							{
								echo "$".$project_value['Project']['self_invest_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>
							<div class="row_blocks">
							<span>External Investment:</span>
							<?php
							if(!empty($project_value['Project']['external_fund_option']))
							{
								echo "$".$project_value['Project']['external_fund_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>
						</div>
						<div class="fac_row">
						<div class="row_blocks">
							<span>Required Skills: </span>
							<span class="col_blue"><?php echo Project::getProjectSkills($project_value['Project']['id']); ?></span>
							</div>
						</div>
							
					
						<?php
						/* <div class="fac_row">
							<div class="row_blocks">
							<span>External Investment</span>
							<?php
							if(!empty($project_value['Project']['external_fund_option']))
							{
								echo "$".$project_value['Project']['external_fund_money'];
							}
							else
							{
								echo "None";
							}
							?>
							</div>

						</div> */
						?>

				</div> 
				</div>
	 		</div>	  	</div> 
	 
	 	<? endforeach;  ?>  
	  
	
		 
</div>
 
 	<div class="clear"></div> 
	 <h2><a href="#">VERIFICATIONS,FEEDBACKS & ENDORSEMENTS</a></h2>
  <div class="expert_detail max_width">
	
	<div class="clear"></div> 
	<div class="user_fieldset">
		<label>Registered Since:</label>
		<div class="user_field">
			<?=$userPublicView['User']["created"]?>,  Last signed in on  <?=$userPublicView['User']["modified"]?>
		</div>
	</div>
	<div class="user_fieldset">
		<label>Verifications:</label>
		<div class="user_field icons">
			<?=$this->Verify->getVerifyHTML($userPublicView['User']["id"])?>
		</div>
	</div>

	
	<div class="user_fieldset">
	<? if ($userPublicView["User"]["role_id"]==3 || $userPublicView["User"]["role_id"]==5){ ?>
		<label>Leader Experience:</label>
		<div class="user_field icons">
			<?php echo $userPublicView['no_of_pro'][0][0]['count']; ?> Projects
		</div>
		<? } ?>
		
		<div class="user_field icons">
										<? if ($userPublicView["User"]["role_id"]==3) 
											echo "<p>   " .$this->Feedback->getSummary($userPublicView['User']["id"]).  "</p>";  
									  ?>
									  
									  		<? if ($userPublicView["User"]["role_id"]==4) 
											echo "<p>  " .$this->Feedback->getSummary($userPublicView['User']["id"],"expert").  "</p>";  
										  ?> 
									  
									    	<? if ($userPublicView["User"]["role_id"]==2) {
											echo "<p>    " .$this->Feedback->getSummary($userPublicView['User']["id"]).  "</p>";   
											echo "<p>   " .$this->Feedback->getSummary($userPublicView['User']["id"],"expert").  "</p>";

					  }
									  ?> 
									   
			 
			
		</div>
	</div> 
	<? if ($userPublicView["User"]["role_id"]==4 || $userPublicView["User"]["role_id"]==5) {?>
	<div class="user_fieldset">
	<label>Expert Experience:  </label>
		<div class="user_field icons">
			<?php echo count($data); ?> Projects
	</div>	</div>
	<? } ?>

</div> 
 
<script>
 function show_des(id,dnld,plink){
	//alert("hello"+id);
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








