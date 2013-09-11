<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top">
		
		<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" id="the_content" class="tabborder">
			<tr>
				<td align="center" valign="top" ><h1><?php echo $heading;?></h1></td>
			</tr>
			<tr>
				<td align="left" valign="top" ><h4>Booking Details</h4></td>
			</tr>
			
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="1" align="center">
						<?php
						if(!empty($booking_data))
						{?>
								<tr>
									<td width="9%" align="center" valign="top"><strong>Room Name</strong></td>
									<td width="6%" align="center" valign="top"><strong>No Of Bookings</strong></td>
									<td width="13%" align="center" valign="top"><strong>Advance Amount(Rs)<br>(A) </strong></td>
									<td width="13%" align="center" valign="top"><strong>Deposite Amount(Rs)<br>(B)</strong></td>
									<td width="13%" align="center" valign="top"><strong>Rent Amount(Rs)<br>(C)</strong></td>
									<td width="13%" align="center" valign="top"><strong>Damage Collected Amount(Rs)<br>(D)</strong></td>
									<td width="13%" align="center" valign="top"><strong>Refund Amount(Rs)<br>(E)</strong></td>
									<td width="20%" align="center" valign="top"><strong>Total Amount(Rs)<br>(A+B+C-E)</strong></td>
								</tr>
						<?php	
							$gt_advance_amount = 0;
							$gt_deposit_amt = 0;
							$gt_rent_amount = 0;
							$gt_refund_amount = 0;
							$gt_damage_amount = 0;
							$gt_total_amount_paid = 0;
							foreach($booking_data as $blocks=>$rep_values)
							{?>
								<tr>
									<td align="left" colspan="8"><strong><?php echo $blocks;?></strong></td>
								</tr>
								<?php
								$advance_amount = 0;
								$deposit_amt = 0;
								$rent_amount = 0;
								$refund_amount = 0;
								$damage_amount = 0;
								$total_amount_paid = 0;
								foreach($rep_values as $key=>$values)
								{
									//For block Total
									$advance_amount += $values['advance_amount'];
									$deposit_amt += $values['deposit_amt'];
									$rent_amount += $values['rent_amount'];
									$refund_amount += $values['refund_amount'];
									$damage_amount += $values['damage_amount'];
									
									$tot_amt = ($values['advance_amount']+$values['rent_amount']+$values['deposit_amt'])-$values['refund_amount'];
									$total_amount_paid += $tot_amt;
									
									//For Grand Total
									$gt_advance_amount += $values['advance_amount'];
									$gt_deposit_amt += $values['deposit_amt'];
									$gt_rent_amount += $values['rent_amount'];
									$gt_refund_amount += $values['refund_amount'];
									$gt_damage_amount += $values['damage_amount'];
									
									$tot_amt = ($values['advance_amount']+$values['rent_amount']+$values['deposit_amt'])-$values['refund_amount'];
									$gt_total_amount_paid += $tot_amt;
								
								?>
								<tr>
									<td width="5%" align="left" valign="top"><strong><?php echo $values['room_name'];?><strong></td>
									<td width="6%" align="left" valign="top"><?php echo $values['no_of_bookings'];?></td>
									<td width="11%" align="right" valign="top"><?php echo $values['advance_amount'];?></td>
									<td width="11%" align="right" valign="top"><?php echo $values['deposit_amt'];?></td>
									<td width="11%" align="right" valign="top"><?php echo $values['rent_amount'];?></td>
									<td width="14%" align="right" valign="top"><?php echo $values['damage_amount'];?></td>
									<td width="16%" align="right" valign="top"><?php echo $values['refund_amount'];?></td>
									<td width="26%" align="right" valign="top"><?php echo number_format($tot_amt,2);?></td>
								</tr>
							<?php	
								}
								?>
								<tr>
									<td align="right" valign="top" colspan="2"><strong>Total</strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($advance_amount,2);?></strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($deposit_amt,2);?></strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($rent_amount,2);?></strong></td>
									<td width="14%" align="right" valign="top"><strong><?php echo number_format($damage_amount,2);?></strong></td>
									<td width="16%" align="right" valign="top"><strong><?php echo number_format($refund_amount,2);?></strong></td>
									<td width="26%" align="right" valign="top"><strong><?php echo number_format($total_amount_paid,2);?></strong></td>
								</tr>
							<?php
							}
							?>
								<tr>
									<td align="right" valign="top" colspan="8">&nbsp;</td>
								</tr>
								<tr>
									<td align="right" valign="top" colspan="2"><strong>Grand Total</strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($gt_advance_amount,2);?></strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($gt_deposit_amt,2);?></strong></td>
									<td width="11%" align="right" valign="top"><strong><?php echo number_format($gt_rent_amount,2);?></strong></td>
									<td width="14%" align="right" valign="top"><strong><?php echo number_format($gt_damage_amount,2);?></strong></td>
									<td width="16%" align="right" valign="top"><strong><?php echo number_format($gt_refund_amount,2);?></strong></td>
									<td width="26%" align="right" valign="top"><strong><?php echo number_format($gt_total_amount_paid,2);?></strong></td>
								</tr>
						<?php	
						}
						else
						{ ?>
								<tr>
									<td align="center" colspan="8">No Bookings Done</td>
								</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<p></p>
			<tr>
				<td align="right" valign="top" class="barheading">
					<table width="31%" align="right">
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">Authorized Signature</td>
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