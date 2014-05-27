<style>.expert_detail {width: 482px;}</style>
<? 
	App::import("model","Workroom");  
	App::import("model", "Colloberation"); 
	?>
<? echo $this->Html->css(array('jquery.jscrollpane')); 
echo $this->Html->script(array(
                                'jquery.mousewheel',
				'jquery.jscrollpane.min'
				
		  ));
?>
<!--  Apply Popup  -->
<div class="popup-wrapper " id='addmember'>
	<div class='popup_invite_deffault popup'>
		<?=$this->element("apply_job")?>

		<span class="continue_team js-ClosePopup"
			style="margin-left: 10px; cursor: pointer;">Cancel </span>
		<div class="clear"></div>
	</div>
</div>

<!--  End Apply Popup Here :  -->



<script type='text/javascript'>
	jQuery(document).ready(function() {
                $('.scroll-pane').jScrollPane();
		jQuery(".expert_img ").mouseenter(function() {
			jQuery(this).parent().find(".largeimage").show();
		});
		jQuery(".expert_img ").mouseleave(function() {
			jQuery(this).parent().find(".largeimage").hide();
		});

		// Apply me  
		$(".applyme").click(function() {
			var id = $(this).attr("rel");
			jQuery("#addmember").fadeIn();
			$('#addmember .popup').css('top', '-1000px').animate({
				'top' : '0'
			}, 500);
			$("#JobBidJobDetailForm").attr("action", "<?=SITEURL?>/jobs/apply_job/" + id);
			$("input#job_id").val(id);

		});

		$(".js-ClosePopup").click(function() {

			$('.popup-wrapper').click();
		});

		$('.popup-wrapper').bind('click', function(event) {
			var container = $(this).find('.popup');
			if (container.has(event.target).length === 0) {
				container.animate({
					'top' : '-1000px'
				}, 300, function() {
					$('.popup-wrapper').fadeOut();
				});
			}
		});

	});
</script>
<style>.expert_detail{float:left;}</style>











<!--  Content Area  Begins   HERE    -->
<div class="public_project">


	<div class="container">
		<h2>
			<a href="#">PROJECT PAGE</a>
		</h2>
		<div class="clear"></div>





		<?
	 	   foreach ($data as $project_key => $project_value ):  
	 	  ?>




		<div class="expert_detail">
			<div class="detail_top imgofproj" style="width: 100%;">
				<?php echo $this->General->show_project_img($project_value['Project']['id'],$project_value['Project']['project_image'],'BIG',$project_value['Project']['title']);
					 ?>
			</div>
		</div>


		<!--  Detail info      -->

		<div class="expert_detail">
			<h2 class='col_blue'>
				<?php echo ucfirst($project_value['Project']['title']) ?>
			</h2>

			<?php if ($this->Session->read('Auth.User.id') !=$project_value['Project']['user_id'] ):?>
			<div style=" height:5px;clear: both;">&nbsp;</div>
			<div style="padding:10px; width: 448px;" class="fac_width">
			
			<div class="nav_bar">

				<ul>
					<li>
					<a href="<?=SITE_URL?>/Workrooms/projecto/<?=$project_value['Project']['id']?>"
						class="chat"> Chat in workroom </a>
					</li>
				</ul>
			</div>
			
			<?endif;?>
			<div style="clear:both; height5px;">&nbsp;</div>
			<div class="fac_row">
				<div class='project_category row_blocks'>
					<span>Description:</span>
					<em><?php echo nl2br($project_value['Project']['description']);?></em>
				</div>
			</div>
			<div class='description detail_bottom'>
			
				
			</div>
			<div class="fac_row">
				<div class='project_category row_blocks'>
					<span>Project Category:</span>
					<? print_r($project_value["Category"]["name"]); ?>
				</div>
			</div>
		 <div class="fac_row">
			<div class="col_type row_blocks">
				<span>Collaboration Types : </span>
				<?=Colloberation::getColloborationProject($project_value['Project']["id"])?>

				<?php   
							 					$l = Colloberation::getFreelanceProject($project_value['Project']["id"]) ;   
							 			  
							 					if  ($l!="No") 
							 						 echo " & Freelancing " ;  


							 				?>
			</div>
		 </div>

		 <div class="fac_row">
			<div class="idea row_blocks">
				<span>Idea Maturity:</span>
				<?php echo ucfirst($project_value['IdeaMaturity']['name']);?>
			</div>

            <div class="status row_blocks">
                <span> Project Status:</span>
                <?php echo ucfirst($project_value['ProjectStatus']['name']); ?>
            </div>
		 </div>
		 
		 <div class="fac_row">
			<div class="plan row_blocks">
				<span>Business Plan:</span>
				<?php  if ( Project::hasFile($project_value['Project']["id"]))  
										echo '<a href="'.( Project::hasFile($project_value['Project']["id"])).'">Yes</a>'  ; 
									else echo  "No";
							
							?>
			</div>
			
            <div class="leaderavil row_blocks">
                <span>Leader's availability in project:</span>
                <?php echo ucfirst($project_value['Availability']['name']);?></div>

		 </div>	
		 <div class="fac_row">
			<div class="project_type row_blocks">
				<span>Project Type:</span>
				<?php echo ucfirst($project_value['ProjectType']['name']);?>
			</div>
		 </div>
		 <div class="fac_row">
			<div class='leader'>
				<div class="row_blocks">
					<span>Leader's Location:</span>
					<?php if(!empty($project_value['User']['UserDetail']['Country']['name'])) {echo ucfirst($project_value['User']['UserDetail']['Country']['name']);}?>
					<div class="flag_icon">
						<?php if(!empty($project_value['User']['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($project_value['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($project_value['User']['UserDetail']['Country']['name'])));} ?>
					</div>
					
				</div>
				<div class="row_blocks">
					<span>Leader's Username:</span> <a
						href='<?=SITE_URL?>/users/user_public_view/<?=$project_value['User']['id']?>'>
						<?php echo $project_value['User']['username']  ?>
					</a>
				</div>
			 </div>

			</div>
		 <div class="fac_row">
			<div class="required_location row_blocks">
				<span>Required Location:</span>
				<div class="flag_icon">
                                        <?php if(!empty($project_value['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$project_value['Country']['country_flag'],array('title'=>ucfirst($project_value['Country']['name']),'alt'=>ucfirst($project_value['Country']['name'])));}else{  echo $this->Html->image('req_loc.png');}?>
				</div>
				<?php 	
							if ($project_value['Region']['name']!=""  &&  $project_value['Region']['name']!="NA") 
								echo $project_value['Region']['name']; ?>
				<?php
							 if ($project_value['Country']['name']!=""  &&  $project_value['Country']['name']!="NA")
							 echo ",".$project_value['Country']['name'];
							
							?>
				<?php 
								if ($project_value['State']['name']!=""  &&  $project_value['State']['name']!="NA")
								echo ",". $project_value['State']['name'];
							
							?>
			</div>
		 </div>
		 <div class="fac_row">
			<div class="inverst row_blocks">
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

			<div class="invest row_blocks">
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
				<span>Required Skills:</span>
				<span class="col_blue"><?  echo Project::getProjectSkills($project_value['Project']["id"]) ;     ?></span>
			</div>
		 </div>
		</div>
		</div>
		<? endforeach;  ?>
	</div>


<!--  Project filess Goes Here    -->

	<div class="product_jobfiles" style="float:left;margin-left: 10px;">
		<h5>Project Files:</h5>
		<div class="add_edit_scrl scroll-pane" id="placement-examples" style="height: 190px;margin-bottom: 32px;"> 
			<ul style="min-height: 210px;">
        	<?php
		  if (isset($files )){
				foreach($files as  $file){?>
				<li>
					<?php echo  $file;?>
					<div class="edit_deletBX">
						<a href='<?=SITE_URL?>/img/projects/<?=$project_value['Project']["id"]?>/plan/<?=$file?>'
							> <span class="exprt_smbl2 job_attche_download" alt="Download"
							title="Download"></span>
						</a>

					</div>
				</li>
				<?php 
				} 
				} 
            	?>
            </ul>
		</div>
                 <div class="clear"></div>
				<div  style="height: 29px; width: 100%;"></div>
	</div>

	<!--  LEADER  :     -->
	<div class="container" style=" clear:both;"><h2> <a href="#">LEADER </a></h2></div>
 
	<div class="expert_detail">
	 
	 	
	
		<h2>
			<a href='<?=SITE_URL?>/users/user_public_view/<?=$userPublicView['User']["id"]?>' class="col_blue">   <?php 	 echo   User::getuserName( $userPublicView['User']["id"]) ;  ?> </a>   
		</h2>

        <div class="clear"></div>

        <!-- Detail conten  -->
        <div class="deatil_content_large">
			<div class="detail_top_large">
			
				<div class="expert_img">
					<?php echo  $user_img=$this->General->show_user_img($userPublicView['User']['id'],$userPublicView['UserDetail']['image'],$userPublicView['UserDetail']['gender'],'SMALL',$userPublicView['User']['first_name'].' '.$userPublicView['User']['last_name']);
						?>
				</div>
 
 
  				<!--  Leader   Detail    -->
  				
				<div class="leaderData">
				<div class="nav_bar">
					<ul>
						 	<?php if ($this->Session->read('Auth.User.id') !=$project_value['Project']['user_id'] ){?>
							 <li><a href="<?=SITE_URL?>/workrooms/chatroom/<?=$project_value['Project']['user_id'] ?>"
										class="chat"> Chat in workroom </a></li>
							<?php }?>  
								
						
					</ul>	
				</div>
				<div class="nav_bar" ><br>
				
				<p class="first_line" >
							<?php if (isset($userPublicView["UserDetail"]["ExpertiseCategory"]["name"])){?>
							<?=$userPublicView["UserDetail"]["ExpertiseCategory"]["name"]?> <?php }else{?>
							N/A <?php } 
							if(isset($userPublicView['UserDetail']['LeaderCategory']['name']) )
							{
								 echo  ", ".$userPublicView['UserDetail']['LeaderCategory']['name'];
							}  
								if ($userPublicView["status"]!="") 
											 	echo  ", ". $userPublicView["status"]; 				
							
							?>
						</p>
						<p class="second_line">
				  
                        Availability:  <?=$userPublicView["avail"]?>
                    </p>
					<div class="third_line" >
							<? if (isset($userPublicView["UserDetail"]["Country"]["name"])){
							echo $userPublicView["UserDetail"]["Country"]["name"]." ";
							echo '<div class="flag_icon">'.
								  $this->Html->image("country_flags/".$userPublicView["UserDetail"]["Country"]["country_flag"]).',
							</div>';
							
							}
                            ?>
							
							 Projects:  <?=Project::getProjectsNumber($project_value['Project']['user_id'] )?>

						</div>
				
				<ul>
                  

						


						<!--<li> Project Category : 
							<? //if (isset($userPublicView["UserDetail"]["LeaderCategory"]["name"])):?>
							<? //$userPublicView["UserDetail"]["LeaderCategory"]["name"]?> <? //else:?>
							N/A <? //endif;?>
                        </li>-->

                        <!-- userPublicView -->

						
							
						
						
						
						<!--<li> Working status : 
					        <? //if ($userPublicView["User"]["role_id"]==1) echo "Signed as Expert";   ?>
							<? //if ($userPublicView["User"]["role_id"]==2) echo "Signed as Both";   ?>
							<? //if ($userPublicView["User"]["role_id"]==3) echo "Signed as Leader";   ?>
                        </li>-->
						
						
						<li>   <?= $this->Feedback->getSummary($project_value['Project']['user_id'],"leader"); ?>   </li>

					</ul>
					</div>
				</div>
                <div class="clear"></div>
			</div>

			<!--  Detail_bottom  Stack   -->
			<div class="detail_bottom" >

				<p style="width: 436px;max-height: 94px;">
					<?=nl2br($userPublicView['UserDetail']['about_us'])?>
					<?if (strlen($userPublicView['UserDetail']['about_us'])>200)
                        echo "..."; ?>
				</p>
				<div class="margin_bottom">
					Skills:
					<? foreach($userPublicView["skills"] as $s) 
											echo "<span class='col_blue'> {$s}   </span>";
										?>
						
						<?	 if (count($userPublicView["skills"])==0) 
							echo  "<b>Not Specified</b>"; 
						?>
				</div>
			</div>




		</div>


	</div>

	



 <!-- Team Area starts Here   -->
     <div class="clear"><h2> <a href="#">TEAM </a></h2></div>
	     

	
	<?php if(!empty($leaderData)){ 	foreach($leaderData as $key=>$leader){?>
		  
		  
	  <div class="expert_detail">

			<h2 class="col_blue">  
				<? //print_r($leader);?>
				<?php  echo $this->Html->link( $leader["job1"]["Job"]["title"],array('controller'=>'jobs','action'=>'job_detail',$leader["job1"]["Job"]["id"])) . "<a href='#' style='color:#F60D53'>&nbsp;-&nbsp;</a>".  
						 $this->Html->link(User::getuserName( $leader['User']["id"]),array('controller'=>'users','action'=>'user_public_view', $leader['User']["id"]),array('style'=>'color:#F60D53'))?>
				
			</h2> 
			<div class="clear"></div>
			
		
		 
			
<div class="deatil_content">
				<div class="detail_top">
					<div class="expert_img sets-1">
						<?php 
						 $user_img=$this->General->show_user_img($leader['User']['id'],$leader['UserDetail']['image'],'SMALL',$leader['User']['first_name'].' '.$leader['User']['last_name']);
						echo $this->Html->link($user_img,array('controller'=>'users','action'=>'user_public_view',$leader['User']['id']),array('div'=>false,'escape'=>false));

						?>
					</div>
					<div class="detail">
						<div class="nav_bar">
                            <ul>
                                <li>
                                  <a href="<?=SITE_URL?>/Workrooms/chatroom/<?=$leader['User']['id']?>" class="chat">
                                                           Chat in Chatroom </a> 
                                </li>
                            </ul>
                         </div>
						<div class="clear"></div>
						<div class="fac_bar">
							<p class='first_line'> 
								<?php
								$data_value = $leader  ;
								//print_r($leaderData_team);
								if(isset($leader['UserDetail']['ExpertiseCategory']['name']) &&!empty($leader['UserDetail']['ExpertiseCategory']['name']))
									{
										 echo  $leader['UserDetail']['ExpertiseCategory']['name'];
									}
									$leadership_category_name = '';
									if(isset($leader['UserDetail']['LeaderCategory']['name']) && $leader['UserDetail']['LeaderCategory']['name']!="")
									{
										echo ",".$leader['UserDetail']['LeaderCategory']['name'];
									}
									if ($leaderData_team["status"]!="") 
											 	echo  ", ". $leaderData_team["status"]; 
									
								?>
							</p>
							<p class='second_line'>  
 											Availability: N/A <?php //$leader['User']["avail"]?>
											<?php if($leader['User']['role_id']==Configure::read('App.Role.Provider') 
											|| $leader['User']['role_id']==Configure::read('App.Role.Both') ){ if($leader['UserDetail']['min_reference_rate']!="" || $leader['UserDetail']['max_reference_rate']!="" ){?>,&nbsp;Day job $/hr. : 
                                                                                        <?php } 
 											if ($leader['UserDetail']['min_reference_rate']!="")  
								       		echo  ((int) $leader['UserDetail']['min_reference_rate']);
								       		  
										       	 if ($leader['UserDetail']['max_reference_rate']!="")  
								       		echo  "-". ((int) $leader['UserDetail']['max_reference_rate']);
								       	    ?> 
	 										 <?php
											}
											?>
 										</p> 
								
 								<?php if(true){?>
 								<!--<li><span>Leadership Category</span>:<?php //echo $leadership_category_name;?></li>-->
								<?php }?>
								<div class='therd_line'>  
								<?php
									$country_name = '';
									
									$location = '';
									if(isset($leader['UserDetail']['Region']['name']) &&!empty($leader['UserDetail']['Region']['name']))
									{
										//$location = $leader['UserDetail']['Region']['name'];
									}
									if(isset($leader['UserDetail']['Country']['name']) &&!empty($leader['UserDetail']['Country']['name']))
									{
										$location.= $leader['UserDetail']['Country']['name'];
									}
									
									if(isset($leader['UserDetail']['State']['name']) &&!empty($leader['UserDetail']['State']['name']))
									{
										//$location.= ",".$leader['UserDetail']['State']['name'];
									}
									?>
									<?php echo $location;?>
								<div class="flag_icon">
										<?php if(!empty($leader['UserDetail']['Country']['country_flag'])){ echo $this->Html->image(FLAG_DIR_TEMP_PATH.$leader['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($country_name),'alt'=>ucfirst($country_name))).",";} ?>
										<?php //echo $this->Html->image('/img/Communication.png',array('title'=>'Communication','alt'=>'Communication')).",";?>
									</div>
									


								<!--<li><span>Reference Minimum Hourly Rate</span>:<?php //echo $leader['UserDetail']['min_reference_rate'];?>
									Hrs/Week.</li>
								<li><span>Reference Maximum Hourly Rate</span>:<?php //echo $leader['UserDetail']['max_reference_rate'];?>
									Hrs/Week.</li>-->
								Projects: <?=User::getNumberExpertProject($data_value["User"]["id"])?>
								

							</div>

								<p class="last">
									<?= $this->Feedback->getSummary($leader["User"]["id"],"expert"); ?>

								</p>
							
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="detail_bottom" >
					<p style="max-height: 94px;">
						<?php echo nl2br(ucfirst($leader['UserDetail']['about_us']));?>
					</p>

					<div class="skills">
						Skills:
						<?php
						$output = array();
						foreach( $leader['Skill'] as $leaderskill_name){
						  $output[] = '<span>'.ucfirst($leaderskill_name['name'])."</span>";
						}
						echo $skill_data=implode(',&nbsp;&nbsp;', $output);
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<?php 
		}
	}else{
	echo  "There are no allocated Team Members for this project yet" ; 
	}?>









	
	
	
	
	
	<!--TEAM-->
   <div class="clear"> <h2> <a href="#">TEAM-UP PROPOSALS </a></h2> </div>
   
    
	 <div class="clear"></div>

		<?php if(!empty($job_list)){
				
							$this->ExPaginator->options = array('url' => $this->passedArgs);
							$this->Paginator->options(array('url' => $this->passedArgs));
								
				foreach($job_list as $key=>$jobs){
				
				?>
		<div class="expert_detail">
			<h2 class="">
			<?php echo $this->Html->link($jobs['Job']['title'] ,array('controller'=>'jobs','action'=>'job_detail',$jobs['Job']['id']),array('class'=>'col_blue_title','title'=>$jobs['Job']['title'], 'target'=>'_blank',  'alt'=>$jobs['Job']['title'])); ?>
			</h2>
 		
 			<!--  APPLY   ON THAT    -->
  
  
    <? if (Workroom::isApply($this->Session->read('Auth.User.id'), $jobs["Job"]["id"]) 
									|| $this->Session->read('Auth.User.id') == $jobs['Job']['user_id']): ?> 
 
		<? else : 
				echo  "<button  rel='{$jobs["Job"]["id"]}'  class='search_btn_ri applyme' onclick='return false;' style='margin-top: 12px;margin-left: 19px;'>  Apply & Chat in Workroom  </button> ";
		
		?> 
		
		<? endif;?> 
				 
			<!--  APPLY ON THAT -->

			<div class="clear"></div>
			<div class="deatil_content" style=" padding-top:0px;">
				<div class="detail_top">
					<div class="nav_bar padding_left margin_bottom">
						<ul>


							<?php  if (Workroom::getJob($jobs['Job']["id"])):?>
							<!--<li style="border: none;"><a
								href="<?php //Workroom::getJob($jobs['Job']["id"])?>"
									class="chat"> Chat in workroom </a></li>-->
							<? endif;?>


							<!-- Proposal  button  Goes  Here    -->

							<li>
								<? if (Workroom::isApply($this->Session->read('Auth.User.id'), $jobs["Job"]["id"]) || $this->Session->read('Auth.User.id') == $jobs['Job']['user_id']): ?>

								<? else : 
					//echo  "<button  rel='{$jobs["Job"]["id"]}'  class='search_btn_blu_ri applyme' onclick='return false;'>   Apply   </button> ";
		
		?> <? endif;?>
							</li>
						</ul>
					</div>
					<div class="detail_bottom" style="margin-top: -24px;">
						
							<p style="margin-left: 10px;max-height: 88px;"><span>Description:</span> <?php echo ucfirst(nl2br($jobs['Job']['description'])); ?></p>
									
  
							<div class="fac_bar fac_width" style="">
									<div class="fac_row">
										<div class="row_blocks">
											<span>Project Category:</span>
											<? print_r($jobs['Project']["Category"]["name"]); ?> 
										</div> 
										<div class="row_blocks">
											<span>Job Category:</span>
											<? print_r($jobs['Job']["cat_name"]); ?>
										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Collaboration Type:</span>
											<?=Colloberation::getColaborationType($jobs['Job']['id'])?>
										</div> 
									</div> 
									<div class="fac_row">
										<div class="row_blocks">
											<span>Estimated job duration:</span>
											<?=($jobs["Job"]["duration"])?>
										</div> 
										
									
									
									<div class="row_blocks">
											<span>Job posted:</span>
											<?php echo $this->Time->timeAgoInWords($jobs['Job']['created'], array('format' => 'F jS, Y'));?>
										</div> 
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
												echo ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']);
											?>
											<div class="flag_icon">
												<?php if(!empty($jobs['Project']['User']['UserDetail']['Country']['country_flag'])){
													echo $this->Html->image(FLAG_DIR_TEMP_PATH.$jobs['Project']['User']['UserDetail']['Country']['country_flag'],array('title'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name']),'alt'=>ucfirst($jobs['Project']['User']['UserDetail']['Country']['name'])));} ?>
											</div>
										</div> 
										<div class="row_blocks">
											<span>Leader's username:</span>
                                                                                        <a href='<?=SITE_URL?>/users/user_public_view/<?=$jobs['Project']['User']['id'];?>' style="color:#F60D53">
											<?php echo $jobs['Project']['User']['username']; ?>
											</a>

										</div> 
									</div>
									<div class="fac_row">
										<div class="row_blocks">
											<span>Req. Location:</span>
											<?php echo ucfirst($jobs['Region']['name']);?> 
											<!--  Country City and other  -->
											<?php if (isset($jobs['Country']['name']) &&  $jobs['Country']['name']!="NA"):?>
												,<?php echo ucfirst($jobs['Country']['name']);?> 
											<? endif;?> 
									
											<?php if (isset($jobs['State']['name']) && $jobs['State']['name']!="NA"):?>
												,<?php echo ucfirst($jobs['State']['name']);?>
											<? endif;?>  
									
											<?php if (isset($jobs['Job']['city']) && $jobs['Job']['city']!="NA" && $jobs['Job']['city']!=""   ):?>
												,<?php echo ucfirst($jobs['Job']['city']);?>
											<? endif;?> 
										</div> 
									</div> 
										
										<div class="fac_row" style=" width:100%">
										<div class="row_blocks">
											<span>Req. Availablility:</span>
											<?php echo $jobs['Job']['avail'];?>
										</div> 
									</div>
									
									<div class="fac_row" style=" width:100%">
										<div class="row_blocks">
											<span>Requried skills:</span>
											<span class="norm pink">
												<?php 
													$output = array();
													foreach( $jobs['Skill'] as $jobskill_name){
													    if (!in_array( $jobskill_name['name'], $output ))
														$output[] = $jobskill_name['name'];
													}
													echo $skill_data=implode(', ', $output);
												?>
											</span>
										</div> 
									</div>
  
						


						
						 
					
						<div class="clear"></div>
						
	 
	 

						<?php App::import("model","jobInvite");?>
						<!--  check for Apply  Invitation   -->
						<?php if (jobInvite::isInvited($this->Session->read('Auth.User.id'), $jobs['Job']["id"])):?>
						<a href='<?=SITE_URL?>/users/decline/<?=$jobs['Job']["id"]?>'> Decline
							Invitation </a>
						<?endif;?>

					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<?php 	}
			}
			else{
				echo  "There are no open Team-up proposals";  
			}
			?>
	 
	
	
	
	</div>   
	








	
</div>




