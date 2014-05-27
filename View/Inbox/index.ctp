
<!--  Inbox  Store      -->
<h2 style="position: relative; left: 11px;">
	<a>MY INBOX</a>
</h2>


<div class="right_sidebar_2">


	<div class="tble_list">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="odd">
                                    <td width="23%"><span class="" style="padding-left: 11px;">From</span></td>
					<td width="51%"><span class="">Subject</span></td>
					<td width="16%"><span class="">Date</span></td>
					<td width="20%" style="padding-right: 10px;"><span class="">Attachments</span></td>
				</tr>


				<?  //print_r($inbox);

					foreach($inbox  as $i):
				

					if ($i->raw==0):  
  					if ($i->chat ==1 ):  

						
                	?>

				<tr class="odd">
					<td width="23%"><span class="whoinbox"><!-- <a<?php //if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							href='<? //echo $i->chatroom?>'><?php //echo $i->user_f_name;//$i->user_name?></a>-->
							<span <?php if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							><?php echo $i->user_f_name;//$i->user_name?></span>
					</span></td>
					<td width="61%"><span class="whatinbox"> <a
							href='<?=$i->chatroom?>'> <?=$i->text?>
						</a>
					</span></td>
					<td width="16%"><span class="wheninbox"> <?php echo $i->time; ?></span></td>
					<td width="16%">
					<?php
					if($i->attach>0)
						echo '<span class="inboxattach" style="font-size: 8px;height: 3px;padding: 0px 2px 0px 2px;font-weight: bold;">';
					else	
						echo '<span>';
					?>	
							<?php echo $i->attach?>
					</span></td>
				</tr>


				<?else:?>


				<? if ($i->private_room==1 && $i->project !="" && $i->type==1):?>
				<!--  Private Room   -->

				<tr class="odd">
					<td width="23%"><span class="whoinbox"> <!-- <a <?php //if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							href='<? //echo SITEURL?>/users/user_public_view/<? //$i->user_id?>'> <?php// echo $i->user_f_name;//$i->user_name ;?>-->
                            
                            <span <?php if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							> <?php echo $i->user_f_name;//$i->user_name ;?>
								<?php //$i->total?>
						</span>
					</span></td>
					<td width="61%"><span class="whatinbox"> <a
							href='<?=SITEURL?>/Workrooms/projecto/<?=$i->project?>'> <?=$i->text?>
						</a>
					</span></td>
					<td width="16%"><span class="wheninbox"> <?php //echo $i->time?></span></td>
					<td width="16%">
					<?php
					if($i->attach>0)
						echo '<span class="inboxattach" style="font-size: 8px;height: 3px;padding: 0px 2px 0px 2px;font-weight: bold;">';
					else	
						echo '<span>';
					?>
							<?php echo $i->attach?>
					</span></td>
				</tr>


				<?else:?>



				<tr class="odd">
					<td width="23%"><span class="whoinbox"> <!-- <a <?php //if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							href='<? //SITEURL?>/users/user_public_view/<? //$i->user_id?>'> <?php //echo $i->user_f_name;//$i->user_name ;?>
								<?php //$i->total?>
						</a>-->
                        
                        <span <?php if($i->user_role==4) echo "style='color: #F60D53;'"; if($i->user_role==3) echo "style='color: #02ADC2;'";?>
							> <?php echo $i->user_f_name;//$i->user_name ;?>
								<?php //$i->total?>
						</span>
					</span></td>
					<td width="61%"><span class="whatinbox">


							<? if ($i->type==1):?> <a
							href='<?=SITEURL?>/Workrooms/projecto/<?=$i->project?>'> <?=$i->text?>
						</a> <?else:?> <a href='<?=SITEURL?>/Workrooms/workroom/<?=$i->room?>'> <?=$i->text?>
						</a> <?endif;?>


					</span></td>
					<td width="16%"><span class="wheninbox"> <?=$i->time?></span></td>
					<td width="16%">
					<?php
					if($i->attach>0)
						echo '<span class="inboxattach" style="font-size: 8px;height: 3px;padding: 0px 2px 0px 2px;font-weight: bold;">';
					else	
						echo '<span>';
					?>
							<?php echo $i->attach?>
					</span></td>
				</tr>


				<?endif;?>



				<? endif;?>
				<? else:?>



				<!--  System messages Starts Here :   -->

				<tr class="odd">
					<td width="23%"><span class="whoinbox" > <?=$i->user_name?></span></td>

					<?if ($i->job_id!=""): 
                   	 
                   	?>

					<?php if  (  $i->job_id!= ""  ): ?>

					<?php   if (strstr($i->text, "workroom")) :?>

					<td width="61%"><span class="whatinbox"> <a
							href='<?=Workroom::getJob($i->job_id)?>'> <?=$i->text?>
						</a>
					</span></td>


					<? else:?>
					<td width="61%"><span class="whatinbox">

                        <? if  (!strstr($i->text,"href=")):?>
                        <a href='<?=SITE_URL?>/jobs/job_detail/<?=$i->job_id?>'> <?=$i->text?> </a>
                        <?else:?>
                        <?=$i->text?>


                        <?endif;?>

					</span></td>
					<?endif;?>






					<?elseif(!empty($i->room)):?>

					<td width="61%"><span class="whatinbox"> <a
							href='<?=SITEURL?>/workrooms/workroom/<?=$i->room?>'> <?=$i->text?>
						</a>
					</span></td>



					<? endif;?>







					<? else:?>
					<td width="61%"><span class="whatinbox"> <?=$i->text?>
					</span></td>
					<?endif;?>



					<td width="16%"><span class="wheninbox"> <?=$i->time?></span></td>
					<td width="16%"></td>
				</tr>




				<? endif;?>
				<? endforeach;  ?>


			</tbody>

			<!--  End System Mesasages   -->




		</table>

		<?php  if (count($inbox)==0):  ?>
		<p>Empty Inbox</p>
		<?php endif;?>




	</div>
</div>

<!--  End Inbox   -->