<script type='text/javascript' >  
	var user_selected =  null ;  
	

</script>
<? echo $this->Html->css(array('jquery.jscrollpane')); 
echo $this->Html->script(array(
                                'jquery.mousewheel',
				'jquery.jscrollpane.min'
				
		  ));
?>
 
 <script type="text/javascript"> 
 

  		jQuery(document).ready(function(){
                    $('.scroll-pane').jScrollPane();
                     
  	 			$("#up_job_but").click(function()
				{
				 		var id  =  $(this).attr("rel"); 
						var spd=id.split(',');
					 	 var est=spd[5];
						 var ex=spd[6];
				 		 $("#JobBidJobDetailForm").attr("action", "<?=SITE_URL?>/jobs/update_job/"+id);
						 $("input#job_id").val(spd[0]);
						  $("input#user_txt_id").val(spd[7]);
						 $("input#availability").val(spd[1]);
						 $("input#future_value").val(spd[2]);
						$("input#cash_value").val(spd[3]);
						
						
						$("#proposal").val(spd[4]);
				var lenest=document.getElementById("est_id");
				var lenex=document.getElementById("ex_id");
				//document.getElementById("ex_id").disabled=true;
				exn=lenex.options.length;
				n= lenest.options.length; 
				
				for (var i= 0;i<n; i++) {
					
					if(lenest.options[i].value==est)
					{
						lenest.options[i].setAttribute("selected", "selected");
						//lenest.options[i].selected=ture;
						break;
					}
				}
				for (var i= 1;i<exn; i++) {
					//alert(lenex.options[i].value);
					if(lenex.options[i].value==ex)
					{
						lenex.options[i].setAttribute("selected", "selected");
						
						break;
					}
				}
				//alert(i);
  					 		jQuery("#updatejb").fadeIn();
		  					$('#updatejb .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 
   
  			});

  		 


  					 	$("#applyme").click(function()
						{
  					 			 $("textarea").val("");  
								 $("input[type='text']").val("");   
					 
  					 		jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 
   
  					 	});

  					 	$('.popup').animate({'top': '-1000px'}, 10, function(){$('.popup-wrapper').fadeOut();});
			$('.js-ClosePopup').bind('click', function(){
	  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
	  					});
			
			 
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
<div class="popup-wrapper "  id='updatejb' > 
									 
									 <div class='popup_invite_deffault popup'  > 
									     <?=$this->element("update_job")?>
									  	 <div class="clear"></div>
									 </div>
								   	
								   	</div>

							<div class="popup-wrapper "  id='addmember'   > 
									 
									 <div class='popup_invite_deffault popup'  > 
									     <?=$this->element("apply_job")?>
									  	 <div class="clear"></div>
									 </div>
								   	
								   	</div>
							 



<!--   End Job Apply  Page  -->



<h2 style="float:left; width:100%;"><a>JOB PAGE</a></h2>
 
 
 	<div class="right_container float_left">
		<div class="clear"></div>
				<div class="expert_detail" style="text-align: center">
				
					   <?php 
						 echo $this->General->show_project_img($data['Project']['id'],$data['Project']['project_image'],'JOBVIEW',$data['Project']['title']);
					
						?> 
				
						<!--  Description :   -->   
						
						<? 
						 
						// print_r($data['Job']["description"]);
						 
						?>
						  
						   
						   
						<!--  SERVER   End   Description :   -->
						
				</div>
		</div>
 
 
 
 
	<div class="right_container float_left" style="overflow: hidden;">
		<div class="clear"></div>
			<div class="expert_detail">
				<h2 class="col_blue_title"><?php echo ucfirst($data['Job']['title']); ?>@ <?php echo ucfirst($data['Project']['title']); ?></h2>
				<div class="clear"></div>				
				
				<div class="deatil_content">
				<div class="detail_top">
					<div class="nav_bar padding_left" style="width:100%; margin-bottom:5px;margin-left: -10px;">
							<ul> 
							  
							<li class="last"> 
							<? if(isset($teamup)):?>
					 
							  
							 <? endif;?> 
							 </li> 
							
							<li class="ApplyBtnRi">
							<?php 
				 
App::import("model","Workroom") ; 
App::import("model", "Colloberation"); 

 
?></li> 



 
 		<? if (Workroom::isApply($this->Session->read('Auth.User.id'), $data["Job"]["id"]) 
									|| $this->Session->read('Auth.User.id') == $data['Job']['user_id']): ?> 
 
		<? else : 
				echo  "<button  rel='{$data["Job"]["id"]}' id  ='applyme'  class='search_btn_ri applyme'  >  Apply & Chat in Workroom  </button> ";
		
		?> 
		
		<? endif;?> 
		
		
		
		 



						</ul>
					</div>
					
					<?
					$jobs = $data ; 
					
					?>
					
					<div class="detail_bottom"> 
					<div class="fac_row" style="">
										<div class="row_blocks" style="margin-right: 30px;"><span>Description:</span><em><?php echo ucfirst(nl2br($data['Job']["description"])); ?></em></div>
								</div>
								
									<div class="fac_row">
										<div class="row_blocks">
											<span>Project Category:</span>
											<? print_r($jobs['Project']["Category"]["name"]); ?> 
										</div> 
										<div class="row_blocks">
											<span>Job Category:</span>
											<?php echo $jobs['Category']['name']; ?>
										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
										<span>Collaboration Type: </span>
										<?=Colloberation::getColaborationType($data['Job']['id'])?>
								</div>
								</div>
									
									<div class="fac_row">
										<div class="row_blocks">
											<span>Estimated job duration:</span>
											<?php echo $jobs1["Job"]["duration"];?>
										</div> 
										<div class="row_blocks">
											<span>Job posted:</span>
											<?php echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));?>
										</div> 
									</div> 
									<div class="fac_row">
										
										<div class="row_blocks">
											<span>Cash compensation:</span>
											<?=($jobs['Job']["cash_value"]!=""?$jobs['Job']["cash_value"]."$":"N/A")  ?>
										</div> 
										<div class="row_blocks">
											<span>Earnings Sharing:</span>
											<?=($jobs['Job']["future_value"]!=""?$jobs['Job']["future_value"]."%":"N/A")  ?>
										</div> 
									</div>
									<div class="fac_row">
										
										<div class="row_blocks">
											<span>Leader's location:</span>
											<?php if ( isset( $jobs['Project']['User']['UserDetail']['Country']['name']) &&  $jobs['Project']['User']['UserDetail']['Country']['name']!="NA" )
													echo ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']); ?> 
											<div class="flag_icon">
												<?php if(!empty($jobs['Project']['User']['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Project']['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name'])));} ?></div>
										</div> 
										<div class="row_blocks">
											<span>Leader's username:</span>
											
									
									<a href="<?=SITE_URL?>/users/user_public_view/<?=$jobs['Project']['User']['id']?>" style="color:#F60D53">
									<?php echo $jobs['Project']['User']['username']; ?></a>
										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Req. Location:</span>
											<?php echo ucfirst($jobs['Region']['name']);?> 
											<?php if($jobs['Country']['name']!="")echo ",".ucfirst($jobs['Country']['name']);?> 
											<?php if($jobs['State']['name']!="") echo ",".ucfirst($jobs['State']['name']);?>
											<?php if($jobs['Job']['city']!="") echo ",".ucfirst($jobs['Job']['city']);?>
										</div> 
										
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Req/ Availablility:</span>
											<?php echo $jobs1['Job']['avail'];?> 
										</div> 
										
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Requried skills:</span>
											<span class="norm pink">
											<?php 
												$output = array();
												foreach( $jobs['Skill'] as $jobskill_name){
												  $output[] = $jobskill_name['name'];
												}
												echo $skill_data=implode(', ', $output);
												?>
											</span>
										</div> 
										
									</div>
										
									
									<!--<p class="font_fam"> Project Category:  <?php // print_r($jobs['Project']["Category"]["name"]); ?> </p>  
								  	<p class="font_fam"> Project:
									 <span class="norm">
									 
									 <?php //echo ucfirst($jobs['Project']['title']); ?> 
									 for <a href="#">
									 <?php //if (isset($jobs['Project']['Category']['name'])) echo ucfirst($jobs['Project']['Category']['name']); ?>
									 </a> & <a href="#">
									 <?php //if (isset($jobs['Project']['ProjectChildCategory']['name'])) echo ucfirst($jobs['Project']['ProjectChildCategory']['name']); ?></a></span></p>
									 <p class="font_fam">Job posted: <span class="norm">
									 <?php
										//echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));
									 ?>
									</span></p> 
									
									
									
									<p class="font_fam">Proposals:<span class="norm">3</span></p>
									<p class="font_fam">Category:<span class="norm"><?php //echo $jobs['Category']['name']; ?></span></p>
									
									<div class="fac_row">
										<div class="row_blocks">
										<span>Requried skills:</span>
										<span class="norm pink">
												<?php 
												/*$output = array();
												foreach( $jobs['Skill'] as $jobskill_name){
												  $output[] = $jobskill_name['name'];
												}
												echo $skill_data=implode(', ', $output);*/
												?>
												</span>
									
										</div> 
									</div>
									<p class="font_fam">Refernce Budject: <span class="norm"><?php //echo $jobs['Job']['refrence_budget']; ?>$</span></p>
									<p class="font_fam">Type of Agreement:<span class="norm">Contractor</span></p>
									
									<?php //if($jobs['Job']['look_contracter']=='1'){?>
											<p class="font_fam">Contracter Compansation:
											<?php //if($jobs['Job']['delayed_payment']=='1' ){?>
													<span class="norm">Delayed Payment :<?php // echo $jobs['Job']['delayed_payment_money']; ?>$</span>
											<?php //}
												//if($jobs['Job']['contracter_percent']=='1'){?>	
												<span class="norm">& Percent :<?php //echo $jobs['Job']['contracter_percent_value']; ?>%</span>
											<?php //}?>
											</p>
									<?php // }
									//if($jobs['Job']['look_cofounder']=='1' && $jobs['Job']['cofounder_percent']=='1'){?>
											<p class="font_fam">Cofounder Compansation:<span class="norm">Percent :<?php //echo $jobs['Job']['cofounder_percent_value']; ?>%</span></p>
									<?php // }?>
									<p class="font_fam float_left">Leader's location:<span class="norm"><?php //echo ucfirst($jobs['Country']['name']); ?></span></p> <div class="flag_icon"><?php //if(!empty($jobs['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Country']['country_flag'],array('title'=>ucfirst($jobs['Country']['name']),'alt'=>ucfirst($jobs['Country']['name'])));} ?></div>
									<p class="font_fam">Leader's username:
									<span class="col_blue norm">
									
									<a href="<?=SITE_URL?>/users/user_public_view/<?php //$jobs['Project']['User']['id']?>">
									<?php //echo ucfirst($jobs['Project']['User']['first_name']).' '.ucfirst($jobs['Project']['User']['last_name']); ?></a></span></p>
									 
									<div class="clear"></div>
									<p class="font_fam">Req. Location:<span class="norm"><?php //echo ucfirst($jobs['Region']['name']);?> ,<?php //echo ucfirst($jobs['Country']['name']);?> ,<?php //echo ucfirst($jobs['State']['name']);?>, <?php //echo ucfirst($jobs['Job']['city']);?></span></p>
									<p class="font_fam">Req/ Availablility:<span class="norm"><?php //echo $jobs['Job']['compensation_avalibility'];?> Hrs./Week</span></p>
									 
									<p>Description: <?php // ucfirst(nl2br($jobs['Job']['description'])); ?></p>-->
								</div>
								
					 
					<div class="clear"></div>
				</div>

				</div>	

			</div>
			<div class="clear"></div>






<!--  Show Popup  If Team Up   --> 
 					 <?php if(isset($teamup_flag)  ):  ?> 
	 
	<div class="popup-wrapper show"> 
		<div class='popup_invite_deffault popup'> 
			<h3>  Contract  </h3><div class="popup_invite_content">
				<p><?=TEAMUP_TEXT?> </p>  
				<span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;">Cancel  </span> 
   				 				
				<a href="<?=SITE_URL?>/Teamup/milestones/<?=$job_id?>/<?=$to_user?>" class="continue_team" >   Define terms </a>  
   				 				   
				<div class="clear"></div>
			</div>
	   	</div>
	</div>
			 		 <?endif;?> 
 

 
    			
		 
		 
		 
		
		
		
		 
	    <?php  
			App::import("model","Teamup");
				
				?>
			<h2><a href="#">TEAM-UP PROPSALS</a></h2>
    		
    				<? if ($jobs_count):?>
    			<em><b><p> Currently there are
    		    <?= ($jobs_count)?> 
    			   official open applications for this Job </p><b></em>
					<?endif;?> 
			
			
			<hr>  <?php
			
			
		if (isset($data_bid) && count($data_bid)!=0)
		foreach($data_bid as $data_key=>$data_value)
		{	
 		?>
			<div class="expert_detail" id='expert<?=$data_value['User']['id']?>'> 
				
			
				<h2><?php echo  $this->Html->link(ucfirst($data_value['User']['first_name']." ".$data_value['User']['last_name']),array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']))?></h2>
				<div class="clear"></div>
				 
				<div class="deatil_content">
					<div class="detail_top">
						<div class="expert_img">
						<?php 
						 $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],$data_value['UserDetail']['gender'],'SMALL',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));

						?>
						</div> 
						
							<!--   Large Image Goes  Here    -->  
						 <div class='largeimage' style='display:none;position:absolute; margin-left: -403px;border: 15px solid white;border-radius: 3px;' >
						   <?php 
						  $user_img=$this->General->show_user_img($data_value['User']['id'],$data_value['UserDetail']['image'],$data_value['UserDetail']['gender'],'BIG',$data_value['User']['first_name'].' '.$data_value['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$data_value['User']['id']),array('div'=>false,'escape'=>false));
						 
						?> 
						 
						 </div> 
						 
						<!--   End LArge   Iamge    --> 
						
						
						
						
						<!--  Applied Stuff for   That User   -->
						
						
						
						
						<div class="detail">
							<div class="nav_bar">
							<div class="nav_bar">
									<ul>
									 
									 
									 <?php   if (Teamup::isUp($data["Job"]["id"],$data_value["User"]["id"] ) ||   Workroom::isApply($data_value["User"]["id"], $data["Job"]["id"])):?>  
									  <li> <a href="<?=Workroom::getJob( $data["Job"]["id"])?>" class="chat">
										 Chat in Workroom </a></li> 
									 <? else: ?>
										<li><a href="<?=Workroom::getJobChatroom($data_value["User"]["id"], $data["Job"]["id"])?>" class="chat">
										 Chat in chatroom </a></li>
										 
									<? endif;?> 	 
										 
										 
									 	
									 	<?php if ( $data_value["up"]==1):  ?>
									 	
									 	
									 	<li><a href="javascript:void(0)" class="invite_team  golink" rel="<?=$data_value['User']['id']?>">  Invite to team-up</a></li>
									 	<? endif;?> 
									 	
								  	</ul>
							</div>
							</div> 
							<div class="clear"></div> 
							   
							   
					   
							   
							  <!--  Applied DAta  For  that      -->
							  
							<div class="fac_bar" style=" font-weight:normal;">
							<p class='first_line'> 
 								<?php
									$expertise_category_name = '';
									if(isset($data_value['UserDetail']['ExpertiseCategory']['name']) &&!empty($data_value['UserDetail']['ExpertiseCategory']['name']))
												{
												  echo  $data_value['UserDetail']['ExpertiseCategory']['name']."";
												}
										 		if(isset($data_value['UserDetail']['LeaderCategory']['name']) )
												{
												  echo  ", ".$data_value['UserDetail']['LeaderCategory']['name'];
												}  
												if ($data_value1["status"]!="") 
											 	echo  ", ". $data_value1["status"]; 
									?>	
									<?php echo $expertise_category_name; ?>									
							</p>	
							
							<p class='second_line'>  
							
 											Availability:  <?php echo $data_avail[$data_key]["avail"]; ?>,
											<?php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') 
											|| $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>&nbsp;Day job $/hr. :  </span> 
 											<?php  
 											if ($data_value['UserDetail']['min_reference_rate']!="")  
								       		echo  ((int) $data_value['UserDetail']['min_reference_rate']);
								       		else 
								       		echo "N/A" ;  
										       	 if ($data_value['UserDetail']['max_reference_rate']!="")  
								       		echo  "-". ((int) $data_value['UserDetail']['max_reference_rate']);
								       	    ?> 
	 										 <?php
											}
											?>
 										</p> 
							<!-- Second  Line  Start Here   --> 
							<?php if($data_value['User']['role_id']==Configure::read('App.Role.Provider') || $data_value['User']['role_id']==Configure::read('App.Role.Both') ){?>
										
									<?php }?>
									
									
									   <p class="second_line"> 
									   <?php
									$country_name = '';
									if(isset($data_value['UserDetail']['Country']['name']) &&!empty($data_value['UserDetail']['Country']['name']))
									{
										$country_name=$data_value['UserDetail']['Country']['name'];
									}else
										echo "N/A";  
									
									
	 											
									?>	
									  <?php echo ucfirst($country_name);?>
									
									   <span class="flag_icon" style="margin-right: 0;">
										<?php if(!empty($data_value['UserDetail']['Country']['country_flag']))
											{ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$data_value['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name))).",&nbsp;";}?>
										</span>
										Projects:  <?=$noof_projects[$data_key]["projects_num"]?>&nbsp;
									</p>	
								<ul>
									
									
									
									
	 						<li class="last"> 
								 	 <?= $this->Feedback->getSummary($data_value["User"]["id"],"expert"); ?> 
								  </li>  

  
  								   <!--  Show  Detail information   -->
  								   
  								   
						 <div class='popup-wrapper ajax'> </div>
  								

								</ul>
								
  							
  							
  							
							</div>  
								 
							
							
							
							<!--  End applied data for that user    -->
							
							
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="detail_bottom">
					<p><?php echo nl2br(ucfirst($data_value['UserDetail']['about_us']));?></p>

					<div class="skills"> 
					Skills:
					<?php
					$output = array();
						foreach( $data_value['Skill'] as $expertskill_name){
						  $output[] = '<span>'.ucfirst($expertskill_name['name'])."</span>";
						}
						echo $skill_data=implode(',&nbsp;&nbsp;', $output); 
					if (count($data_value['Skill'])==0) 
 							echo "Not Specified"; 

					?>	

					</div>
					
					</div> 
						<div class="second_line" style=" font-weight:normal; margin-left:10px;">
					<? if ($this->Session->read('Auth.User.id') ==  $data_value['User']["id"]     ||  $this->Session->read('Auth.User.id')  == $data['Job']["user_id"]    ): ?>     
							  		<? 
							  		 $bidid   =  JobBid::getJobBidId($data_value['User']["id"],  $data['Job']["id"]); 
							  		 $data_bid_job =  JobBid::getAdditional(  $bidid ); 
							  		?>
								<p style=" color:#F60D53; font-size:15px;"><b>Proposal</b></p>	
							  	<p>   <b><em>   <?=$data_bid_job["proposal"]?> </em></b><?php if($this->Session->read('Auth.User.id')==$data_value['User']["id"]){?><a class="edit" style="margin: -27px 0px 0px 70px;float:left"  id="up_job_but" rel="<?=$this->Session->read('Auth.User.id').",".$data_bid_job["av"].",".$data_bid_job["future"].",".$data_bid_job["cash"].",".$data_bid_job["proposal"].",".$data_bid_job["dur"].",".$data_bid_job["ex"].",".$job_id;?>" ></a><?php }?></p>
							    <p>   <b>  Estimated Duration:  </b>   <?=$data_bid_job["dur"]; ?>  </p>
								<p> <b>  Availability : </b><?=$data_bid_job["av"]?>  Hrs/Week  </p>
								<p>  <b>  Relevant Experience:</b>    <?=$data_bid_job["ex"]?>     </p>
								<p>  <b>  Proposed Cash Compensation:</b>  <?=$data_bid_job["cash"]?>  $   </p>
							    <p> <b>  Proposed Future Earning Sharing:</b>  <?=$data_bid_job["future"]?>   %   </p>
  				
  						 
  
  							<? endif;?> 
					 
					 </div>
					<!--  Files Goes Here   :  -->
					<? if (count($data_value["Files"])):?> 
					
						<div class="product_jobfiles">
		<h5>Application Files:</h5>
		<div class="add_edit_scrl scroll-pane" id="placement-examples" style="height: 190px;margin-bottom: 32px;">
			<ul style="min-height: 210px;">
			<?php 
		 
				foreach($data_value["Files"] as  $file){?>
				<li><?php echo  $file;?>								
					<div class="edit_deletBX">
					<a href='<?=SITE_URL?>/jobs/getfileApply/<?=$data_value['bid_id']?>/<?=$file?>' >
						<span class="exprt_smbl2 job_attche_download"    alt="Download" title="Download"></span> </a> 
						
					</div>
				</li>
			<?php 
				}
		 	?>
			 			
				
			</ul>
		</div>
                <div class="clear"></div>
				<div  style="height: 29px; width: 100%;"></div>
	</div>   
					
					
					
							 
					<? endif;?>  
					 <!--  End Files Here :    -->
					
					
				</div>
			
			</div>
			<div class="clear"></div>
	<?php
		}else{
		echo  "There are no open Team-up proposals" ; 
	}

	?>
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			<div class="clear"></div>
			
		
  

















	</div>
	<div class="product_jobfiles">
		<h5>Job Files:</h5>
		<div class="add_edit_scrl scroll-pane" id="placement-examples" style="height: 190px;margin-bottom: 32px;">
			<ul style="min-height: 210px;">
			<?php 
			if(!empty($job_attachement)){		
				foreach($job_attachement as $key =>$jobattac){?>
				<li><?php echo $jobattac['JobAttachment']['file_name'];?>								
					<div class="edit_deletBX">

						<span class="exprt_smbl2 job_attche_download" jobattche-id="<?php echo $jobattac['JobAttachment']['id'];?>" id="<?php echo $jobattac['JobAttachment']['job_id'];?>" alt="Download" title="Download"></span>
					</div>
				</li>
			<?php 
				}
			}?>
			<?php 
			if(!empty($job_file)){
				foreach($job_file as $key =>$jobFile){?>
				<li><?php echo $jobFile['JobFile']['file_name'];?> 								
					<div class="edit_deletBX">
						<span class="exprt_smbl2 job_file_download" jobfile-id="<?php echo $jobFile['JobFile']['id'];?>" id="<?php echo $jobFile['JobFile']['job_id'];?>" alt="Download" title="Download"></span>
					</div>
				</li>
			<?php 
				}
			}?>				
				
			</ul>
		</div>
                
                <div class="clear"></div>
				<div  style="height: 29px; width: 100%;"></div>
	</div>   
	<div class="product_dscrpBOX bg_none" style="width:100%;">
	</div>  
   <div class="clear"></div>	
<script type="text/javascript">
	jQuery(".job_attche_download").live('click',function(){
 
			var jobAttchemnet_id = 	jQuery(this).closest('span').attr('jobattche-id');
			var job_id 			 = 	jQuery(this).closest('span').attr('id');			
			window.location = "<?=SITE_URL?>/jobs/download_job_attachement_from_job_detail/"+jobAttchemnet_id+"/"+job_id;
	});
	
	jQuery(".job_file_download").live('click',function(){ 
			var jobFile_id = 	jQuery(this).closest('span').attr('jobfile-id');
			var job_id 			 = 	jQuery(this).closest('span').attr('id');			
			window.location = "<?=SITE_URL?>/jobs/download_job_file_from_job_detail/"+jobFile_id+"/"+job_id;
	});	
        
        
</script>	
<?php
if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) 
echo $this->Js->writeBuffer();
?> 


<!--  Create  Popup    on Click Team up -->

 
  <!--   End   Popup  --> 
  
                