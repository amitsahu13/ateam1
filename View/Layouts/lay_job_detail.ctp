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
	echo $this->Html->css(array('style','jquery.powertip','message_style'));
		
	  ?>
	  <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	
	<?php	
	echo $this->Html->script(array(
				'jquery/jquery-1.7.2.min',
				'jquery/jquery.alerts',
				'jquery.powertip',
				'jquery.powertip-1.1.0.min',
				'message_front_show',
				'is_number_key'
		  ));
	echo $scripts_for_layout;
	?> 
	
	<script type="text/javascript">
		var SiteUrl = "<?php echo Configure::read('App.SiteUrl');?>";
		var SiteName = "<?php echo Configure::read('App.SiteName');?>";		
	</script>
	<script type="text/javascript">
	   $(".cntntBox_dv ul li:last-child").addClass("last");   
	</script>
	<script type="text/javascript">
	$(function(){ 
		$('.msg_close').click(function(){
			$( ".notification" ).remove();
		});
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
		  img { behavior: url("<?php //echo Configure::read('App.SiteUrl');?>/css/iepngfix.htc") }
		</style><![endif]-->
          
          <script type='text/javascript'> 
  		jQuery(document).ready(function(){
  			
  		 
			
			
		
  			jQuery(".invite_team").click(function(){ 
  			 
					/* $('.popup-wrapper.ajax .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);*/
                                            jQuery('.popup-wrapper.ajax').fadeIn();
                                            
                                            jQuery(".popup-wrapper.ajax").fadeIn();
			$('.popup-wrapper.ajax .popup').css('top', '-1000px')
							.animate({'top': '0'}, 500);
                                                
                                               
				closePopup();
			function closePopup() {
				$('.popup-wrapper').bind('click', function(event){
					var container = $(this).find('.popup');
					if (container.has(event.target).length === 0){
						container.animate({'top': '-1000px'}, 700, function(){$('.popup-wrapper').fadeOut();});
					}
				});
				$('.js-ClosePopup').bind('click', function(){
					$('.popup').animate({'top': '-1000px'}, 300, function(){$('.popup-wrapper').fadeOut();});
				});
			}
						     
                                              
                                                
                                               // alert("helol");
                                                
                                               // $('.ajax').css('display','none');
						
 		 				var rel =   jQuery(this).attr("rel");   
 		 				var th  = jQuery(this)  ;  
 		 				var job    =   '<?=$data['Job']['id'] ?>';
 		 				
 		 				var user_id =  '<?=$this->Session->read('Auth.User.id')?>'; 
 		 				user_selected =  rel ; 
 		 				var url  =  '<?=SITE_URL?>/Invitepopup/getpopup/'+user_id + "/" +  rel + '/' + job  ;
 		 				
 		 				if (user_id){
 		 				  	// Proceed Popup Stack :   
 		 		 		
 		 				  		jQuery.get(url, function(data){
 		 				  			
 		 				  		 
 		 				  			jQuery("#expert"+rel+" .ajax ").html(data);
 		 				  			
 		 				  			jQuery(".continue_team").click(function(){  
 		 				  			  window.location="<?=SITE_URL?>/teamup/gotoroom/<?=$data['Job']['id']?>/"+user_selected; 
 		 				  			});
 		 				  			
 		 				  			
 		 				  		});
 		 				
 		 				  
 		 				  
 		 			  } 
                                         
 		 				return false;  

 		 	});
 		}); 
  </script>
	
</head>
	<body>
	

<?php echo $this->element("Front/ele_header"); ?>


<div id="wrapper">
    <div id="container">
   			 
   				<script type="text/javascript">
				<?php 
				if ($this->Session->check('Message.flash')==1) {
				?>
					showFlashSuccess('<?php echo $this->Session->flash(); ?>');
				<?php } ?>
			</script> 
			

        <div class="right_sidebar">
          <?php
			echo $content_for_layout;
		?>
      </div>
    </div>
</div>

 
<?php echo $this->element("Front/ele_footer"); ?>
<?php //echo $this->element('sql_dump');?>

</body>
</html>