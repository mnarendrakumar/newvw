<?php if(!empty($booking_det)){?>
<form id="checkout_details" name="checkout_details" method="post" action="">
<input type="hidden" name="rcpt_id" id="rcpt_id" value="<?php echo $booking_det[0]->rcpt_id;?>">
<input type="hidden" name="booking_det_id" id="booking_det_id" value="<?php echo $booking_det[0]->booking_det_id;?>">
<input type="hidden" name="app_det_id" id="app_det_id" value="<?php echo $booking_det[0]->app_det_id;?>">
<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" class="tabborder">
	<tr>
		<td align="center" valign="top" ><h1>Room Booking Details</h1></td>
	</tr>
	<tr>
		<td align="center" valign="top" class="barheading">
			<table width="100%" border="0" align="center">
				<tr>
					<td width="19%" align="left" valign="top">Operator Name:</td>
					<td width="58%" align="left" valign="top"><strong><?php echo ucfirst($user_name);?></strong></td>
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
					<td width="16%" align="left" valign="top">Room No.</td>
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
					<td align="right" valign="top" colspan="3">Advance Amount (Rs) </td>
					<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->advance_amount;?></td>
				</tr>
				<tr>
					<td align="right" valign="top" colspan="3">Deposit Amount (Rs) </td>
					<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->deposit_amt;?></td>
				</tr>
				<tr>
					<td align="right" valign="top" colspan="3">Rent Amount (Rs) </td>
					<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->rent_amount;?></td>
				</tr>
				<tr>
					<td align="right" valign="top" colspan="3">Total(Rs) </td>
					<td width="32%" align="right" valign="top"><?php echo $booking_det[0]->total_amount_paid;?></td>
				</tr>
				<?php 
				if($booking_det[0]->booked_status == 1)
				{
				?>
				<tr>
					<td align="right" valign="center" colspan="2">Deposit Refund (Rs) </td>
					<td width="32%" align="left" valign="top" colspan="2">
					<input type="text" name="deposite_amount" id="deposite_amount" class="required valid" value="<?php echo $booking_det[0]->deposit_amt;?>">
                    <input type="hidden" name="hid_deposite_amount" id="hid_deposite_amount" class="" value="<?php echo $booking_det[0]->deposit_amt;?>">
					</td>
				</tr>
				<tr>
					<td align="right" valign="center" colspan="2">Damage Charges (Rs) </td>
					<td width="32%" align="left" valign="top" colspan="2">
					<input type="text" name="damage_amount" id="damage_amount" class="" value="">
					</td>
				</tr>
				
				<tr>
					<td align="center" valign="center" colspan="4">
					<input type="button" name="checkout" id="checkout" value="Check Out" class='jcheckout'>
					<span class="jerror_msg" style="color:#FF0000; font:Arial, Helvetica, sans-serif"></span>
					</td>
				</tr>
				<?php 
				}
				?>
			</table>
		</td>
	</tr>
</table>
</form>
<?php
}
else
{
?>
<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" class="tabborder" valign="top">
	<tr>
		<td align="center" style="color:#FF0000" valign="top"><h1>Room Booking Details are not found with application id : <?php echo $app_id;?></h1></td>
	</tr>
</table>
<?php
}
?>

<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
var site_url='<?php echo site_url()?>';
$(document).ready(function() {
	/////  for Room Checkout
	$("#checkout_details").validate({
	rules: {
            deposite_amount: "required",
        },
        messages: {
            deposite_amount: "Please enter Application id",
        },
		errorPlacement: function(error, element) {
		error.insertAfter(element);
		},
		submitHandler: function()
		{
			var data = $('#checkout_details').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: base_url+"booking/updatecheckout", 
				beforeSend : function(){
				},
				success: function(data)
				{
						if(data=='error')
						{
							var msg = 'This Booking checkout already done';
						}
						else if(data == 'success')
						{
							var msg = 'Checkout has been done Successfully';
						}
						else
						{
							var msg = 'Checkout not done.. please try again';
						}
						$('.jerror_msg').html(msg);
				},
				complete : function()
				{
					//$("#sub_grid_tbl").trigger("reloadGrid");
				}
			});
		}
	});
	$('.jcheckout').live('click',function(){
		$("#checkout_details").submit();
	})
	var timeStart = false;
	
	$('#damage_amount').keyup(function(){
		$this = $(this);
		
			if(parseInt($this.val()) > parseInt($('#hid_deposite_amount').val()))
			{
				$('#deposite_amount').val(parseInt($('#hid_deposite_amount').val()))
				alert('Damage Amount Exceeded Deposit Amount');
				$this.val('');
			}
			else
			{
				if($this.val() == '')
				{
					$('#deposite_amount').val(parseInt($('#hid_deposite_amount').val()));
				}
				else
				{
					$('#deposite_amount').val(parseInt($('#hid_deposite_amount').val())-parseInt($this.val()));
				}
				
			}
		
	});

});
</script>