<style>.tble_list table tr td {   padding: 5px 0px 4px 5px;}</style>
<? echo $this->Html->css(array('jquery.jscrollpane')); 
echo $this->Html->script(array(
                                'jquery.mousewheel',
				'jquery.jscrollpane.min'
				
		  ));
?>
<?php if (isset($removed)):?> 
	<!--  Removed   ChatRoom  -->
	  <!-- Script -->  
 <script type="text/javascript"> 
  		jQuery(document).ready(function(){
  		 


  					 	jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
 
  


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
//
//

    <!-- Popup Starts Here  -->  

							<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Leave Chatroom: <span id='rtitle'> <?=$title?> </span> </h3><div class="popup_invite_content">
											<form method="post"  > 
											<input type='hidden' name='mark_removed' id='removeto' value='<?=$room?>' /> 
												<p> <?=REMOVE_CHAT_ROOM_2.$removed?></p>		
												  <button type='submit'>    Leave Chatroom </button> 
												</form>  
 												 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 
 											 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	   



   <!--  End Popup here  -->


		<!-- Add   Memebers  Popups  -->  
		<script type='text/javascript'>  
 					
 				jQuery(document).ready(function(){ 
 					

 					$(".addmember").click(function(){
						jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
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
	<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Select members: </h3><div class="popup_invite_content">
											<form method="post">  
												<ul class="posible_members_list">
												<? foreach($pmembers as $id=>$m):?>
													<li> 
														<input type='checkbox' name='members[]' value='<?=$id?>' />
															<?=$m?>
													 </li>
												<?endforeach;?> 
												</ul>
											<button type='submit'>  Submit  </button> 
												</form>  

										     
							   				 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 

							   				 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	  



		<!-- And Add members List   --->

	<!--  End Removed chatRoom  --> 
<?endif;?> 

<!-- Add   Memebers  Popups  -->  
		<script type='text/javascript'>  
 					
 				jQuery(document).ready(function(){ 
 					

 					$(".addmember").click(function(){
						jQuery("#addmember").fadeIn();
		  					$('#addmember .popup').css('top', '-1000px')
		  									.animate({'top': '0'}, 500);
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
	<div class="popup-wrapper show"  id='addmember' > 
									<div class='popup_invite_deffault popup'> 
										<h3> Select members: </h3><div class="popup_invite_content">
											<form method="post">  
												<ul class="posible_members_list">
												<? foreach($pmembers as $id=>$m):?>
													<li> 
														<input type='checkbox' name='members[]' value='<?=$id?>' />
															<?=$m?>
													 </li>
												<?endforeach;?> 
												</ul>
											<button type='submit'>  Submit  </button> 
												</form>  

										     
							   				 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Cancel  </span> 
							   				 

							   				 <div class="clear"></div>
										</div>
								   	</div>
								</div>
	   

<div class="right_sidebar">

 <h3 class='title_h3'>  Project Workroom </h3>

 		<?php   echo $this->element("Front/ele_workrooms_drop" , array("type"=>"wokroom")); ?>

	<div class="product_dscrpBOX" style="min-height: 281px;margin: 0px 0px 10px;">
		<h3>
			<?=$title ;?>
		</h3>
		<div class="product_dscrpBOX_left">
			<div class="product_dscrpBOX_left_img">
				<?php 
					 
					echo $this->General->show_project_img($projectid, $projectimage,'THUMB', $title );
					
					?>
			</div>
			<div class="product_dscrpBOX_left_discrpsn">
				<ul>

					 
				</ul>
			</div>
			 
		</div>
		<div class="product_dscrpBOX_ryt">


			<ul>
				<li> Attendees:</li>
 			<? foreach($leaders as $id=>$username):  ?>
 			 
 			  
				<li class="skyblue"><a
					href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
					class="col_blue" style="padding-left: 0px;"> <?=$username?>
				</a></li>
				<? endforeach ; ?>
 

  			<? foreach($experts as $id=>$username):  ?>
  			
  					<!--  Check if user  -->
  					
  			
  			<? if ($leader !=  $user   )   
				//if (Workroom::isHidden($id, $room))
				//	continue;

				?>
  			
  			 				 <li class="pink"><a
								href='<?=Router::url(array("controller"=>"Users", "action"=>"user_public_view", $id))?>'
								class="pink" <? if (Workroom::isHidden($id, $room)) echo "style='color:Grey;'";  ?> > <?=$username?>
							 </a>  
							 
							 
						 
							<? if ($leader ==  $user    )  : ?> 
							  	 
							   	<? if (Workroom::isHidden($id, $room)) : ?>
							   					    <a href='javascript:void(0)' class='hideexpert' rel='<?=$id?>' style='display:none;'> 
								   					 <span class="exprt_smbl2"></span> </a>  
								   					 
								 				  <a href='javascript:void(0)' class='showexpert' rel='<?=$id?>' > 
								   					 <span class="exprt_smbl" ></span> </a> 
							   		<?else:?>  
							   		
							   		    <a href='javascript:void(0)' class='hideexpert' rel='<?=$id?>'> 
								   					 <span class="exprt_smbl2"></span> </a>  
								   					 
								 				  <a href='javascript:void(0)' class='showexpert' rel='<?=$id?>' style='display:none;'> 
								   					 <span class="exprt_smbl" ></span> </a> 
							   		
							   	
							   	<?endif;?>
							  	 
							  
								 
								 
								 
								 <?endif;?> 
								 
								 
								 
							 </li> 
		     <? endforeach ; ?> 
		    
		     
 			</ul>
 		</div>
	</div>


	<div class="product_jobfiles" style="height: 290px;">
		<h5>Files:</h5>
		<div class="add_edit_scrl scroll-pane" id="placement-examples" style="height: 190px;margin-bottom: 10px;">
			<ul style="min-height: 210px;">
				<? 
			  foreach($files as $f):  
			if ($f->name !="") : 
			  ?>

				<li>
					<?=$f->name?>
					<div class="edit_deletBX">
						<input type="button" id="north-west" class="download" value=""
							title="" rel='<?=$f->id?>'> <input type="button"
							id="north-east" class="info" value="" title="File Uploaded:<?=$f->date?> " rel='<?=$f->date?>'>
						<?
						    if ($user == $this->leader) :?>
						<input type="button" id="east" class="delete" value="">
						<? endif;?>
					</div>
				</li>
 				<? 
 				endif ;  
 				 endforeach;?>
 </ul>
		</div>
                <div class="clear"></div>
				<div  style="height: 29px; width: 100%;"></div>
	</div>
</div>


<!--  Chat Panel   Goes HERE   -->

<div class="right_sidebar_2">
	<div class="post_cmntDV">


		<form method='POST' enctype='multipart/form-data'>

			<textarea name="chat" cols="" rows="" class="txtaria" required></textarea>
	</div>
	<div class="post_cmnt_row">
        <? echo $this->Element("Front/ele_chatroom_attach")?>
 			<button class="post_msg_btn"></button>
	</div>
	</form>

 <div class="tble_list" id="wrk_cht_id">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody id='chat'>

				<tr class="odd">
					<td width="23%"><span class="who">Who</span></td>
					<td width="61%"><span class="what">What</span></td>
					<td width="16%"><span class="when">When</span></td>
				</tr>

  	<?
  	$num =0  ; 
	
  	 foreach($chat as $c): 
$num++ ; ?> 
 				<!--  Foreach Chat   -->
				<tr class="even"  id='<?=$c->id?>'>
					<td align="left" valign="top"><span class="blue"><?=$c->user?>:</span></td>
					<td align="left" valign="top"><p> <?=$c->text?></a>
							

						<? echo $c->file;?> 

					 
						
						
						
						</td>
					<td align="left" valign="top"><code> <?=$c->ago?></code></td>
				</tr>
				<!--  EndForeach Chat  --> 
		 
		 <? endforeach;?>
		 </tbody>
		</table>
		<span class="Continue4Btn" style="margin: 10px;">
		<a href='javascript:void(0)' class='loadmore Continue4BtnRi'> Load More</a>
		</span>
	</div>
</div>
 
<script type='text/javascript'>
		var room = '<?=$room?>';  // room 
jQuery(document).ready(function() {
	
	
		
			// hide Expert  
			jQuery(".hideexpert").click(function(){
			 	var user =  jQuery(this).attr("rel"); 
			 	jQuery.get("<?=Router::url('/',true)?>workrooms/hideexpert/"+room+"/"+user+'/<?=$projectid?>');
			 	jQuery(this).hide(); 
			 	jQuery(this).parent().find(".showexpert").show();
			 	 
			});
	
	
			jQuery(".showexpert").click(function(){
			 	var user =  jQuery(this).attr("rel"); 
			 	jQuery.get("<?=Router::url('/',true)?>workrooms/showexpert/"+room+"/"+user+'/<?=$projectid?>');
			 	jQuery(this).hide(); 
			 	jQuery(this).parent().find(".hideexpert").show();
			 	 
			});
			
	
	
	$('.scroll-pane').jScrollPane();
	
	
	
	
	
	
	
		
		jQuery(".download").click(function() {
			var host = '<?=Router::url('/workrooms/downloadfile/', true);?>';
			var file_id = jQuery(this).attr("rel");
			var url = host + file_id + "/<?=$projectid?>";
			window.location = url;
		});
		jQuery(".info").click(function() {
			alert("File uploaded: " + jQuery(this).attr("rel"));
		}); 
 	  
	  jQuery(".loadmore").click(function(){
		  var last   = jQuery("#chat tr:last").attr("id"); 
		  jQuery.get("<?=Router::url('/workrooms/loadmore/', true);?>"+last+"/"+room, function(data){
			   // Append Stack  :  
			   jQuery("#chat").append(data);  
		  if (data=="") 
			  jQuery(".loadmore").hide(); 
		  
		 	 });
	  });  
	  
	  
	  
	   jQuery(".removeuser").click(function(){
		   	 var  href =  jQuery(this).attr("href");
		   	 jQuery(this).parent().hide(); 
		   	  jQuery.get(href,function(d){
		   		 window.location.reload(); 
		   	  }); 	 
		    return false;  
	   });
	  
	  
	  
	  
	  
	  
	  
	});
</script>
 

 