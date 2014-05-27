<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php echo $title_for_layout;?> | <?php echo Configure::read('Site.title');?>
</title>
<?php	
	if(isset($description_for_layout)){
		echo $this->Html->meta('description', $description_for_layout);
	} 
	if(isset($keywords_for_layout)){
		echo $this->Html->meta('keywords', $keywords_for_layout);	
	}
	if(isset($profile_image_layout)){
		echo '<meta property="og:image" content="'.$profile_image_layout.'"/>'; 
	}	 	 
	echo $this->Html->meta('icon'); 
	echo $this->Html->css(array('style','jquery.powertip'));
		
	  ?>
	  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
	<?php	
	  echo $this->Html->script(array(
				'jquery/jquery-1.7.2.min',
				'jquery.powertip',
				'jquery.powertip-1.1.0.min',
				'common_front'
		  ));
	  echo $scripts_for_layout;
	?>
	
	<script type="text/javascript">
		var SiteUrl = "<?php echo Configure::read('App.SiteUrl');?>";
		var SiteName = "<?php echo Configure::read('App.SiteName');?>";		
	</script>
	<script type="text/javascript"> 
  		jQuery(document).ready(function(){
  	 
  			jQuery.get("<?=SITE_URL?>/users/getProjectList",function(data){
  				data = JSON.parse(data); 
  				for (var i in data) {
					jQuery("#project_list").append("<option value='"+i+"' >"+data[i]+"</option> "); 
					jQuery("#project_list").change(function(){
						var id =  jQuery(this).find("option:selected").val(); 
					  
						$.get("<?=SITE_URL?>/users/getGetJobList/"+id,function(data2){
							jQuery("#job_list option").remove(); 
							data2 = JSON.parse(data2);     
							jQuery("#job_list").append("<option value='N/A' >Select Job</option> "); 	    
							for (var i in data2)  
								jQuery("#job_list").append("<option value='"+i+"' >"+data2[i]+"</option> "); 	
							
						}) ;
						
						
						
						
					}); 
  				} 
  			});
  			
  			
  			
  		  jQuery(".invite_job").click(function(){
  					var id  =   jQuery(this).attr("rel") ;   
  					  jQuery("#usertoinvite").val(id); 
  				 	  jQuery("#inviteexpet").fadeIn();
					  jQuery('#inviteexpet .popup').css('top', '-1000px')
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
	<script type="text/javascript">
	$(document).ready(function(){
		$(".slidingDiv").hide();
		$(".show_hide").show();
		
		$('.show_hide').click(function(){
		$(".slidingDiv").slideToggle();
		});

	});
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.jobprogres_step ul li:nth-child(3n)').css("margin", "0px");
		});
	</script>
	<!--[if lte IE 6]><style>
		  img { behavior: url("<?php echo Configure::read('App.SiteUrl');?>/css/iepngfix.htc") }
		</style><![endif]-->
	<style>.popup_fieldset label {margin-top: 9px;}</style>
</head>
<body>
<?php echo $this->element("Front/ele_header"); ?>
<div id="wrapper">
	<div id="container">	 
	
	


    <!-- Popup Starts Here  -->  

							<div class="popup-wrapper show"  id='inviteexpet' > 
									<div class='popup_invite_deffault popup'>  
									
										<h3> Invite to Team-Up  </h3><div class="popup_invite_content">
											
											<!--p><?=INVITE_POPUP_EXPERT?></p-->
											
											<form method='post' action='<?=SITE_URL?>/users/invitejob'  > 
											 	<input type='hidden' name='user_id' id='usertoinvite'  value='' />   
												<div class="popup_fieldset top-mile">
													<label>Select Project:</label>
													<div class="popup_field">
														<span class="slct_rwndInPut ">
														<select class="slct_rwndInPutRi with_sml1"  name='project' id='project_list'>  
															<option> Select Project </option>
														</select>	
														</span>
													</div>
												</div>
											 	<div class="popup_fieldset">
													<label>Select job:</label>
													<div class="popup_field">
														<span class="slct_rwndInPut ">
														<select class="slct_rwndInPutRi with_sml1" name='Job' id='job_list'>  
															<option> Select Job </option>
														</select>
														</span>
													</div>
												</div>
												 <span class="continue_team js-ClosePopup" style="margin-left: 10px; cursor: pointer;"  >Close  </span>
													<button class="continue_team" type="submit">Invite</button>
												</form>
											 	 
							   				  <div class="clear"></div>
										</div>
								   	</div>
								</div>
	   



   <!--  End Popup here  -->
			 
			  
			  
			  
			  		
		<?php echo $this->element("Front/ele_myaccount_left"); ?>	
		<div class="right_sidebar">
			<div class="right_container max_width">
				<script type="text/javascript">
				<?php 
				if ($this->Session->check('Message.flash')==1) {
				?>
					showFlashSuccess('<?php echo $this->Session->flash(); ?>');
				<?php } ?>
				</script>						
				<?php echo $content_for_layout; ?>
			</div>
			<div class="product_dscrpBOX bg_none" style="width:100%;"></div>
			<div class="clear"></div>	
		</div>
	</div>
</div>
<?php echo $this->element("Front/ele_footer"); ?>
<?php //echo $this->element('sql_dump');?>
</body>
 <
</html>