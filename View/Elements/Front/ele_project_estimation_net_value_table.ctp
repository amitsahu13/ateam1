 <table border="0" cellspacing="0" cellpadding="0" class="tbl tablelistSe tbl_c" id="estimation_attache">
	 <tr>
	  <th width="36" align="center" valign="middle">#</th>
	  <th width="157" align="left" valign="middle">Timeline</th>
	  <th width="180" align="left" valign="middle">Estimated Net Value ($)</th>
	  <th width="200" align="left" valign="middle">Description</th>
	  <th width="57" align="left" valign="middle">Remove</th>
	 </tr>
<?php  
	if(!$validation)
	{
		$i=0;
		if(!empty($project_estimation))
		{ 	
				foreach($project_estimation as $estimation)
				{	
		?>	
				  <tr id="<?php echo $estimation['ProjectEstimation']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle">
						<?php echo ($this->Form->input("ProjectEstimation.$i.timeline", array('div'=>false, 'label'=>false,'empty'=>'-- Select Timeline --','options'=>Configure::read('Project.Timeline'),"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?>
						</td>
					<td align="left" valign="middle">
						<input readonly="readonly" type="text" name="data[ProjectEstimation][<?php echo $i;?>][estimate_net_value]" class="txtfld required <?php echo "common_enable".$estimation['ProjectEstimation']['id']?>"  value="<?php echo $estimation['ProjectEstimation']['estimate_net_value']?>"/>
					</td>
					<td align="left" valign="middle">
						<textarea  class="required <?php echo "common_enable".$estimation['ProjectEstimation']['id']?>" readonly="readonly" name="data[ProjectEstimation][<?php echo $i;?>][description]" ><?php echo $estimation['ProjectEstimation']['description']?></textarea>	
					</td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						 				
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$estimation['ProjectEstimation']['id'];?>" pro-id="<?php echo $estimation['ProjectEstimation']['project_id'];?>"/>
						</div>
						<input type="hidden" name="data[ProjectEstimation][<?php echo $i;?>][id]" value="<?php echo $estimation['ProjectEstimation']['id']; ?>"/>
					</td>
				  </tr>
				 
	<?php 		$i++;	
				}
		
			?>
					
		<?php
		}
		else
		{
			
			$i=0;
		?>
				
				<tr>
					<td align="center" valign="middle" colspan="5">No Milestone Records Founds!</td>
				
				</tr>
			<?php
		}?>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_counter"/>
			<input type="hidden"  value="<?php echo $i;?>" id="non_validate_index_row_counter"/>
			
	<?php
	}
	else
	{
		$i=0;
		if(!empty($project_estimation))
		{ 	
			
			foreach($project_estimation as $estimation)
			{
				
	?>		
				 <tr id="<?php echo $estimation['ProjectEstimation']['id'];?>" class="EditTrRemove">
					<td align="center" valign="middle"><?php echo $i+1;?></td>
					<td align="left" valign="middle">
							<?php echo ($this->Form->input("ProjectEstimation.$i.timeline", array('div'=>false, 'label'=>false,'empty'=>'-- Select Timeline --','options'=>Configure::read('Project.Timeline'),"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?>
					</td>
					<td align="left" valign="middle">
						<input readonly="readonly" type="text" name="data[ProjectEstimation][<?php echo $i;?>][estimate_net_value]" class="txtfld required <?php echo "common_enable".$estimation['ProjectEstimation']['id']?>"  value="<?php echo $estimation['ProjectEstimation']['estimate_net_value']?>"/>
					</td>
					<td align="left" valign="middle">
						<textarea  class="required <?php echo "common_enable".$estimation['ProjectEstimation']['id']?>" readonly="readonly" name="data[ProjectEstimation][<?php echo $i;?>][description]" ><?php echo $estimation['ProjectEstimation']['description']?></textarea>	
					</td>
					<td align="left" valign="middle">
						<div class="edit_deletBX" style="float:left;">
						 				
						 <input type="button" value="" class="min_icon custom_del" title="Delete" alt="Delete" id="<?php echo "delete_".$estimation['ProjectEstimation']['id'];?>" pro-id="<?php echo $estimation['ProjectEstimation']['project_id'];?>"/>
						</div>
						<input type="hidden" name="data[ProjectEstimation][<?php echo $i;?>][id]" value="<?php echo $estimation['ProjectEstimation']['id']; ?>"/>
					</td>
				  </tr>
				 
				
	<?php		
				$i++;
			}
		}
		
		$k=$i;
		
		if(!empty($this->request->data['ProjectEstimation']))
		{	
			
			
			foreach($this->request->data['ProjectEstimation'] as $key=>$value)
			{
				
				if(empty($value['id']))
				{
				
	?>
				<tr  class="EditTr" id="<?php echo 'row_'.$key;?>">
					<td align="center" valign="middle"><?php echo $k+1;?></td>
					<td align="left" valign="middle"><?php echo ($this->Form->input("ProjectEstimation.$i.timeline", array('div'=>false, 'label'=>false,'empty'=>'-- Select Timeline --','options'=>Configure::read('Project.Timeline'),"class" => "custom_dropdown","error" => array("wrap" =>EDITWRAP, "class" => "error-message"))));	?></td>
					<td align="left" valign="middle"><?php echo $this->Form->input("ProjectEstimation.$key.estimate_net_value",array("type"=>"text","class"=>"txtfld required","label"=>false,"div"=>false))?></td>
					<td align="left" valign="middle"><?php echo $this->Form->input("ProjectEstimation.$key.description",array("type"=>"textarea","class"=>"required","label"=>false,"div"=>false))?></td>
					<td align="left" valign="middle"><div class="edit_deletBX" style="float:left;">
					
					<input type="button" value="" class="min_icon" title="Delete" alt="Delete" onclick="removeElement('<?php echo $key; ?>');" /></div></td>
				</tr>
	<?php		
				$k++;
				
				}				
				
			}
	
		}
		
	?>
			<input type="hidden"  value="<?php echo $k;?>" id="validation_row_counter"/>
			<input type="hidden"  value="<?php echo $k;?>" id="index_row_counter"/>
			       

	<?php	
	}
	?>	

		
 </table>
<a class="add_new" href="javascript:void(0);">Add new</a>

<script type="text/javascript">
	jQuery(function(){		
		jQuery("#estimation_attache .custom_del").live('click',function(){
			var id_array = jQuery(this).attr('id').split('_');
			var id = id_array[1];					
			jConfirm('Are you sure you want to delete this milestone?', 'Confirmation Dialog', function(r) {
				if(r == true)	{
					jQuery.ajax({
						type:"GET",
						url:"<?php echo Router::url(array('controller'=>'projects', 'action'=>'delete_project_estimation')); ?>/"+ id,
						success : function(data) {
							jQuery('#estimation_attache').find('#'+id).remove();		
						},
						error : function() {
							jAlert('Records could not be deleted. Please try again', 'Alert Dialog');
						},
					})
				}
				
			});
		});
	});
	
	/* function edit_mildestone(obj)
	{
		//alert(obj.id);
		var id_array = obj.id.split('_');
		var ids = id_array[1];
		if(jQuery("#"+ids).hasClass('EditTrRemove'))
		{
			jQuery("#"+ids).removeClass('EditTrRemove');
			jQuery("#"+ids).addClass('EditTr');
			jQuery(".common_enable"+ids).removeAttr('readonly');
			//jQuery(".date_enable"+ids).datepicker("show");
			jQuery(".date_enable"+ids).addClass('datepicker');
			//jQuery("#calender_img_"+ids+" img").css('width','29px');
			//jQuery("#calender_img_"+ids+" img").css('height','28px');
			calender_data();
			//jQuery(".date_enable"+ids).datepicker("show");
		}
		else
		{
			jQuery("#"+ids).addClass('EditTrRemove');
			jQuery("#"+ids).removeClass('EditTr');
			jQuery(".common_enable"+ids).attr('readonly');
			//jQuery(".date_enable"+ids).removeClass('datepicker');
			jQuery(".date_enable"+ids).datepicker("destroy");
			
			//jQuery("#calender_img_"+ids+" img").css('width','0px');
			
		}
		
	} */
	
</script>	