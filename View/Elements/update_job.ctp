<Style>.popup_field .input-text {width: 38%;}</style>
<script type="text/javascript">

	jQuery(function(){		
		jQuery(".delete").live('click',function(){

			var id 		= 	jQuery(this).closest('li').attr('id');			
			jConfirm('Are you sure you want to delete this file?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'jobs', 'action'=>'delete_job_apply_file')); ?>/"+ id,
						success : function(data) {
							jQuery('#fileattache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('File could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
			});
		});
	
		jQuery(".download").live('click',function(){
			var id 		= 	jQuery(this).closest('li').attr('id');						
			window.location = SiteUrl+"/jobs/download_job_apply_file/"+ id;
		});
			
	});
</script>
<style>
.dropdown1-select {
    font: 13px/19px open_sansregular;
    position: relative;
    width: 100%;
    margin: 0px;
    padding: 6px 8px 6px 10px;
    height: 30px;
    line-height: 14px;

    color: #323232;
    text-shadow: 0px 1px #FFF;
    background: none repeat scroll 0% 0% transparent !important;
    border: 0px none;
    border-radius: 0px;

}
.dropdown1:after {
    margin-top: 7px;
    border-top-style: solid;
    border-bottom: medium none;
}
.dropdown1:before {
    border-bottom-style: solid;
    border-top: medium none;
}
.dropdown1:before, .dropdown1:after {
    background: url('<?=SITE_URL?>/app/webroot/img/dropdown_arrows.png') no-repeat scroll left top transparent;
    position: absolute;
    z-index: 2;
    top: 9px;
    right: 10px;
    width: 0px;
    height: 0px;
    border-width: 4px;
    border-style: dashed;
    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    border-color: #888 transparent;
    pointer-events: none;
}
.dropdown1 {
    position: relative;
    overflow: hidden;
    vertical-align: top;
    width: 220px;
	
    background: linear-gradient(#F5F5F5, #F3F3F3, #EFEFEF, #E8E8E8, #E6E6E6) repeat scroll 0% 0% transparent;

    -moz-border-top-colors: none;
    -moz-border-right-colors: none;
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    border-image: none;
    border-color: #FFF #F7F7F7 #F5F5F5;
    border-radius: 3px;
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.08);
}
</style>
<!--div class="cmpnsn_prgrsDV">
	<div class="cmpnsn_prgrsnav" style="padding:0 0 3px 0;">
		<h2><a href="#">I Have A Dream</a></h2>
	</div>
</div-->
<h3>Job Application Form</h3>
<form action="<?=SITE_URL?>/jobs/update_job/" id="JobBidUpdareForm" method="post">
	<div class="popup_fieldset top-mile">
		<?php if(isset($this->params->pass[0]) && !empty($this->params->pass[0])){ 
			 $pass =    $this->params->pass[0]; 
			}else{
				$pass= 0 ; 
			}
			echo $this->Form->input('user_txt_id',array('div'=>false,'type'=>'hidden','value'=>$pass, 'label'=>false, "class" => "TXTaria_rwndInPutRi"));
			echo $this->Form->input('job_id',array('div'=>false,'type'=>'hidden','value'=>$pass, 'label'=>false, "class" => "TXTaria_rwndInPutRi"));
		?>
		<label>Proposal*</label>
		<div class="popup_field">
			<?php  echo $this->Form->input('proposal', array('div'=>false,'type'=>'textarea', 'label'=>false, "class" => "textarea",    "style" => "min-height: 60px; height: 60px;", "required"=>"required", "name"=>"proposal"));?>
			<!-- <textarea class="TXTaria_rwndInPutRi" name="" cols="" rows="" style="width:338px;"></textarea> -->
		</div>
	</div>
<!--	<div class="popup_fieldset">
		<?php	echo $this->element("Front/ele_job_file_attachement"); ?>
	</div>-->
	<div class="popup_fieldset">
		<label>Availability*</label>
		<div class="popup_field">
			<?php  echo $this->Form->input('availability', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text" , "required"=>"required","onkeypress"=>"return isNumberKey(event)"));?>
			<!-- <input name="" type="text" class="TXT_rwndInPutRi" /> -->
			<font style="font-size: 11px; color: grey;">Hrs/Weeks</font>
		</div>
	</div>
	<div class="popup_fieldset">
		<label>Estimated duration*</label>
		<div class="popup_field sets-1">
		<div class="dropdown1">
		<select class="dropdown1-select" name='data[duration]' id="est_id">  
				<option value=''>Select Duration</option> 
				<option value='1 Day'>  1 Day </option> 
				<option value='Not Sure'> Not Sure  </option> 
				<option value='2 Days'> 2 Days  </option> 
				<option value='3 Days'> 3 Days</option> 
				<option value='4 Days'> 4 Days</option> 
				<option value='5 Days'>5 Days</option> 
				<option value='1 Week'>1 Week</option> 
				<option value='1-2 Weeks'>1-2 Weeks</option> 
				<option value='3-4 Weeks'>3-4 Weeks</option> 
				<option value='1-3 Months'>1-3 Months</option> 
				<option value='4-6 Months'>4-6 Months</option> 
				<option value='7-9 Months'>7-9 Months</option> 
				<option value='More than 9 Months'>More than 9 Months</option> 
				<option value='Immediate One Time Delivery'>Immediate One Time Delivery</option> 
			</select>
</div>
			<?php //echo $this->Form->input('duration', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text", "required"=>"required","onkeypress"=>"return isNumberKey(event)"));?>
			<!-- <input name="" type="text" class="TXT_rwndInPutRi" />  -->
		</div>
	</div>							
	<div class="popup_fieldset">
		<label>Relevant Experience*</label>
		<div class="popup_field sets-1">
		<style>
			.popup_field.sets-1 .sbHolder {margin-left: 0;}
		</style>
		<div class="dropdown1" >
			<select  name='data[JobBid][experience]' id="ex_id" class="dropdown1-select" onchange="getComboA(this)">  
				<option value=''>Select Experience</option> 
				<option value='student'>  Student  </option> 
				<option value='1 year'> 1 Year  </option> 
				<option value='2-3 years' > 2-3 Years  </option> 
				<option value='4-5 years'> 4-5 Years  </option> 
				<option value=' More than 5 Years'> More than 5 Years   </option> 
				<option value='More than 10 Year'>More than 10 Years</option> 
			</select>
			</div>
		</div>
	</div>
							
	<!--  Future Sharing Stuff Here   -->
	<div class="popup_fieldset">
		<label>Future Earning Sharing  </label>
		<div class="popup_field">
			<?php  echo $this->Form->input('future_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text","onkeypress"=>"return isNumberKey(event)", "style" => "width: 39%;" ,"pattern"=>"\d*"));?>
			<font>%</font>
		</div>
	</div>
	<div class="popup_fieldset">
		<label>Cash Compensation  </label>
		<div class="popup_field">
			<?php  echo $this->Form->input('cash_value', array('div'=>false,'type'=>'text', 'label'=>false, "class" => "input-text","onkeypress"=>"return isNumberKey(event)", "style" => "width: 39%;" , "pattern"=>"\d*"));?>
			<font>$</font>
		</div>
	</div> 
							
	<!--  End Future Sharing :  -->
	<div class="popup_fieldset top-mile"> 
		<!--<p> Per the <?php //echo $this->Html->link('Terms of Service',array('controller'=>'pages','action'=>'view','static'=>'terms-of-service'),array('div'=>false,'lable'=>false,'escape'=>false)); ?>, I'll only receive compensations with ATeam 4 A Dream knowledge</p>-->
	</div>
	<div class="">
		<span class="Continue4Btn" style="float:right;" >
			<?php  echo $this->Form->submit('Submit', array('class' => 'Continue4BtnRi','value'=>'Submit'));?>
 		</span>
		<span class="continue_team js-ClosePopup Continue4Btn" style="cursor: pointer; float:right;">
			<span class="Continue4BtnRi">Cancel</span>
		</span>
		<div class="clear"></div>
	</div>
</form> 



<style>
input.info {display:none;}
</style>




 <!-- A validation  Are   -->

        <script type="text/javascript">
            jQuery(document).ready(function(){

                jQuery("#JobBidJobDetailForm").submit(function(){
                    var  field1  = jQuery("#proposal").val();
                    var  field2  = jQuery("#availability").val();
                    var  field3  = jQuery("#duration").val();
                    if (field1 !=""  &&  field2 !="" && field3!="")
                     return true;


                    jQuery("#proposal").css("border","1px solid red");
                    jQuery("#availability").css("border","1px solid red");
                    jQuery("#duration").css("border","1px solid red");

                    alert("Fill Required fields");


                    return false;
                });



            });
        </script>

 <!--  Validation Goes Here  -->   

<script language=Javascript>  
 <!--  
 function isNumberKey(evt)  { 
 var charCode = (evt.which) ? evt.which : event.keyCode  
 if ( charCode > 31 
 && (charCode < 48 || charCode > 57))  
 return false;  

 return true;  
 }  
 //-->  
</script>
