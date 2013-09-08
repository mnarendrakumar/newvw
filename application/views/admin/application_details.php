<?php if(!empty($booking_det)){?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top">
			<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" class="tabborder" id="the_content">
			<tr>
				<td align="center" valign="top" ><h1>Room Booking Details</h1></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="0" align="center">
						<tr>
							<td width="19%" align="left" valign="top">Operator Name:</td>
							<td width="58%" align="left" valign="top"><strong><?php echo ucfirst($booking_det[0]->user_name);?></strong></td>
							<td width="8%" align="left" valign="top">Date:</td>
							<td width="15%" align="left" valign="top"><?php echo $booking_det[0]->created_date;?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="4" align="center">
						<tr>
							<td width="14%" align="left" valign="top">Application Id</td>
							<td width="38%" align="left" valign="top"><?php echo $booking_det[0]->application_id;?></td>
							<td width="16%" align="left" valign="top">Customer ID</td>
							<td width="32%" align="left" valign="top"><?php echo $booking_det[0]->customer_id;?></td>
						</tr>
						<tr>
							<td width="14%" align="left" valign="top">Name</td>
							<td width="38%" align="left" valign="top"><?php echo ucfirst($booking_det[0]->applicant_name);?></td>
							<td width="16%" align="left" valign="top">Address</td>
							<td width="32%" align="left" valign="top"><?php echo $booking_det[0]->applicant_address;?></td>
						</tr>
						<tr>
							<td width="14%" align="left" valign="top">Block</td>
							<td width="38%" align="left" valign="top"><strong><?php echo $booking_det[0]->block_name;?></strong></td>
							<td width="16%" align="left" valign="top">Room No</td>
							<td width="32%" align="left" valign="top"><strong><?php echo $booking_det[0]->room_name;?>
							<span style="padding-left:50px">No of Persons (<?php echo $booking_det[0]->no_of_persons?>)</span></strong></td>
						</tr>
						<tr>
							<td width="14%" align="left" valign="top">Booked From</td>
							<td width="38%" align="left" valign="top"><?php echo $booking_det[0]->from_date;?></td>
							<td width="16%" align="left" valign="top">Booked To</td>
							<td width="32%" align="left" valign="top"><?php echo $booking_det[0]->to_date;?></td>
						</tr>
						<tr>
							<td width="14%" align="left" valign="top">Booked Type</td>
							<td width="38%" align="left" valign="top"><?php echo ($booking_det[0]->booking_type==1?'Current':'Advanced');?></td>
							<td width="14%" align="left" valign="top">Booking Condition</td>
							<td width="38%" align="left" valign="top"><strong>
							<?php echo ($booking_det[0]->booked_status?'In Booking':'Checked Out');?></strong></td>
						</tr>
						<tr>
							<td align="left" valign="top" colspan="4"><strong>Payment Details</strong></td>
						</tr>
						<tr>
							<td colspan="2" rowspan="4" align="left" valign="top">
							<?php 
							if(!empty($booking_det[0]->image_path))
							{
							?> 
								<img src="<?php echo base_url().$booking_det[0]->image_path;?>" width="100" height="100" />
							<?php
							}
							else
							{
								echo '&nbsp;';
							}
							?>
							</td>
							<td align="right" valign="top">Advance Amount (Rs) </td>
							<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->advance_amount;?></td>
						</tr>
						<tr>
							<td align="right" valign="top">Deposit Amount (Rs) </td>
							<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->deposit_amt;?></td>
						</tr>
						<tr>
							<td align="right" valign="top">Rent Amount (Rs) </td>
							<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->rent_amount;?></td>
						</tr>
						<tr>
							<td align="right" valign="top" >Total(Rs) </td>
							<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->total_amount_paid;?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		
		</td>
	</tr>
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" valign="top">
		<input type="button" name="Print" value="Print" class="button" onClick="javascript:Clean4Print('the_content')"/>&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
</table>
<?php
}
else
{
?>
<table width="98%" border="0" cellspacing="0" cellpadding="5" align="center" class="tabborder" valign="top">
	<tr>
		<td align="center" style="color:#FF0000" valign="top"><h1>Room Booking Details are not found with application id : <?php echo $app_id;?></h1></td>
	</tr>
</table>
<?php
}
?>
