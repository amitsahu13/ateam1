 <!--   <?php  
  	App::import("model", "Workroom");  
  	 // type ,   user_id  ;   
  	$user_id  =    $this->Session->read('Auth.User.id');  
    $model  = new Workroom();  
 
 
        
?> --> 
  
<?php  	$drop_data  =  $model->getLatestDrop($user_id , $type);  ?>
  
<div class="dropdown latest_wokrooms"> 
	<h2>
		<a href="#" class="show_hide">   
			 <?if ($type=="wokroom"):?>Available Workrooms <? else:?>  Available Chatrooms  <?endif;?>  <span class="arwblk"></span> 
		</a>  
		  
		   
		   
		   
		<div class="slidingDiv">
                    <? //print_r($drop_data["chat"]);?>
                    <ul>
			
			
			<? if (count($drop_data["chat"])):?> 
			
				<li> 
					<h6>Latest Communications:</h6> 
				</li>		
                                        <?php $project_name='';$project_name_after='';?>
 					<?php foreach ($drop_data["chat"] as $obj) :
                                            $project_name=$obj->project_title;	 
                                            ?> 
                                <li>  <h6 style="font-size: 13px;margin: 0px 0px 1px 10px; padding: 0px;"><? if($project_name!=$project_name_after) {echo $project_name; $project_name_after=$obj->project_title;}?></h6>
                                    <a  style="padding: 0px;" href='<?=$obj->link?>'>  <? $title_name=explode('@',$obj->title);echo $title_name[0];  //echo str_replace("@"," & ",$obj->title);?>   
 								
 								<?php if ($obj->new>0): ?>
 									<span class='counter' style="padding:0px; color:#FFF;padding: 1px 4px;font-size: 12px;font-family: arial;"> <?=$obj->new?>     </span>
 								<?php endif;?> 
 								 
 							 	
 							 </a> 
 							 
 							 
 							 <!--  If TYpe is Chat Room  Stack  -->
 							  <? if ($obj->type  == 0):?> 
 							         <div class="edit_deletBX" style="margin-top: -26px;" >
										 <input type="button" style="margin-top: -29px;margin-left: 30px;" rel="<?=$obj->id?>" title="<?=$obj->title?>" value="" class="delete removechatroom" id="north-east">
									 </div>
							  <? endif;?>    
							 <!--  End Chat room   -->  
							 
							 
							 
							 
 						</li> 
 					<?php endforeach;?>  
 
 						<!--  Foreach   Work rooms   -->
 					<? endif;?>  
 					
 					
 					<? if ($type!="chatroom"):?>  
 					
 					<li> 
					<h6> All Workrooms:</h6> 
				</li>		
   
 					
 					
 					<? 
 					$added =  array();  
 					
 					foreach( $drop_data["all"] as  $project_title =>$records):?> 
 						<li> 
 						<h6 style=' margin-left: -8px;'> <a href='<?=SITE_URL?>/workrooms/projecto/<?=$records[0]->project_id?>'  >  <?=$project_title?> </a>  </h6>
 						 <ul>  
 						<? foreach($records as $obj):
 						  if (in_array($obj->link, $added)) 
								continue ;   
							$added [ ] =   $obj->link ; 
 
 						?> 
 						
 						<li> 
 							<a href='<?=$obj->link?>'> <?=str_replace("@"," @ ",$obj->title)?></a>
 						      <?  if (isset($obj->private_job) &&  count($obj->private_job)>0):?>  
 						       <ul class='subprivate'>  
 						       		<?foreach($obj->private_job  as $w):  
 						       				 
 						       		?> 
 						       				<li>   	<a href='<?=$w->link?>' style='color:red !important;'> <?=$w->title?></a>   </li>   
 						       		<?endforeach;?> 
 						       </ul>
 						       <?endif;?> 
 						</li>
 					 
 						<?php endforeach;?>  
 						</ul></li>
 				<?php endforeach;?> 
 
  		<? endif; ?> 
  		
 
 
			</ul>
		</div>                
	</h2> 
</div> 
  

  <!-- Script -->  
 <script type="text/javascript"> 
  		jQuery(document).ready(function(){


  			
			//  Remove  chatroom  :   
			// 
			jQuery(".removechatroom").click(function(){
  					var rel  =  jQuery(this).attr("rel");  
  					jQuery("#rtitle").text(jQuery(this).attr("title"));  
  					jQuery("#removeto").val(rel); 
  					 	jQuery("#removechatroom").fadeIn();
		  					$('#removechatroom .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500); 
		  					
		  					return  false ; 
 
  			}); 









			$('.js-ClosePopup').bind('click', function(){
	  					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
	  					});
						$('.popup').css('top', '-1000px')
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


    <!-- Popup Starts Here  -->  

							<div class="popup-wrapper show"  id='removechatroom' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Remove Chatroom: <span id='rtitle'> <?=$title?> </span> </h3><div class="popup_invite_content">
											<form method="post"  > 
											<input type='hidden' name='mark_removed' id='removeto' value='' /> 
												<p> <?=REMOVE_CHAT_ROOM_1?></p>		
												 
													<button type='submit'>   Delete   </button> 
												</form>  
 												 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 
 											 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	   



   <!--  End Popup here  -->

  