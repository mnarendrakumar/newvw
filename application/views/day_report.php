<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top">
		
		<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" id="the_content" class="tabborder">
			<tr>
				<td align="center" valign="top" ><h1>Day Stats  Report</h1></td>
			</tr>
			<tr>
				<td align="left" valign="top" ><h4>Booking Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="0" align="center">
						<tr>
							<td width="13%" align="left" valign="top">Operator Name:</td>
							<td width="64%" align="left" valign="top"><strong><?php echo $user_name;?></strong></td>
							<td width="8%" align="left" valign="top">Date:</td>
							<td width="15%" align="left" valign="top"><?php echo date('d/m/Y',strtotime($date));?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="1" align="center">
						<?php
						if(!empty($booked_report_arr))
						{?>
								<tr>
									<td width="21%" align="left" valign="top"><strong>Room Name</strong></td>
									<td width="14%" align="left" valign="top"><strong>Advance Amount (Rs)</strong></td>
									<td width="16%" align="left" valign="top"><strong>Deposite Amount (Rs)</strong></td>
									<td width="16%" align="left" valign="top"><strong>Rent Amount (Rs)</strong></td>
									<td width="13%" align="left" valign="top"><strong>Total Amount (Rs)</strong></td>
									<td width="20%" align="left" valign="top"><strong>Amount Deposited in Bank (Rs)</strong></td>
								</tr>
						<?php	
							$amt_deposit_bank = 0;
							foreach($booked_report_arr as $blocks=>$rep_values)
							{?>
								<tr>
									<td align="left" colspan="6"><?php echo $blocks;?></td>
								</tr>
								<?php
								foreach($rep_values as $key=>$values)
								{
								?>
								<tr>
									<td width="21%" align="left" valign="top"><strong><?php echo $values['room_name'];?><strong></td>
									<td width="14%" align="right" valign="top"><?php echo $values['advance_amount'];?></td>
									<td width="16%" align="right" valign="top"><?php echo $values['deposit_amt'];?></td>
									<td width="16%" align="right" valign="top"><?php echo $values['rent_amount'];?></td>
									<td width="13%" align="right" valign="top"><?php echo $values['total_amount_paid'];?></td>
									<td width="20%" align="right" valign="top"><?php echo number_format($values['amt_deposit_bank'],2);
									$amt_deposit_bank += $values['amt_deposit_bank'];
									?></td>
								</tr>
							<?php	
								}
							}
							?>
								<tr>
									<td align="right" valign="top" colspan="4"><strong>Total</strong></td>
									<td width="13%" align="right" valign="top"><?php echo number_format($con_total_amount,2);?></td>
									<td width="20%" align="right" valign="top"><?php echo number_format($amt_deposit_bank,2);?></td>
								</tr>
						<?php	
						}
						else
						{ ?>
								<tr>
									<td align="center" colspan="5">No Bookings Done</td>
								</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<p></p>
			<tr>
				<td align="left" valign="top" ><h4>Refund Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="1" align="center">
						<?php
						if(!empty($refund_report_arr))
						{?>
								<tr>
									<td width="33%" align="left" valign="top"><strong>Room Name</strong></td>
									<td width="17%" align="left" valign="top"><strong>Refund Amount (Rs)</strong></td>
									<td width="17%" align="left" valign="top"><strong>Collected Damage Amount (Rs)</strong></td>
								</tr>
						<?php	
							foreach($refund_report_arr as $blocks=>$rep_values)
							{?>
								<tr>
									<td align="left" colspan="3"><?php echo $blocks;?></td>
								</tr>
								<?php
								foreach($rep_values as $key=>$values)
								{
								?>
								<tr>
									<td width="33%" align="left" valign="top"><?php echo $values['room_name'];?></td>
									<td width="17%" align="right" valign="top"><?php echo $values['deposit_refund_amount'];?></td>
									<td width="17%" align="right" valign="top"><?php echo $values['damage_amount'];?></td>
								</tr>
							<?php	
								}
							}
							?>
								<tr>
									<td align="right" valign="top"><strong>Total</strong></td>
									<td width="15%" align="right" valign="top"><?php echo number_format($con_ref_total_amount,2);?></td>
									<td width="15%" align="right" valign="top"><?php echo number_format($con_damage_total_amount,2);?></td>
								</tr>
						<?php	
						}
						else
						{ ?>
								<tr>
									<td align="center" colspan="5">No Refunds Done</td>
								</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" ><h4>Total Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="31%" border="1" cellspacing="1" cellpadding="1" align="center">
						<tr>
							<td align="left" valign="top" ><strong>Type</strong></td>
							<td align="left" valign="top" ><strong>Total Amount(Rs)</strong></td>
						</tr>
						<tr>
							<td align="left" valign="top" >Booking Amount(Rs)</td>
							<td align="right" valign="top" ><?php echo number_format($con_total_amount,2);//echo $con_total_amount;?></td>
						</tr>
						<tr>
							<td align="left" valign="top" >Collected Damage Amount(Rs)</td>
							<td align="right" valign="top" ><?php echo number_format($con_damage_total_amount,2);//echo $con_total_amount;?></td>
						</tr>
						<tr>
							<td align="left" valign="top" >Refund Amount(Rs)</td>
							<td align="right" valign="top" ><?php echo number_format($con_ref_total_amount,2); //echo $con_ref_total_amount;?></td>
						</tr>
						<tr>
							<td align="left" valign="top" ><strong>Total Amount(Rs)</strong></td>
							<td align="right" valign="top" >
							<?php $diff_amt = ($con_total_amount+$con_damage_total_amount)-$con_ref_total_amount; echo number_format($diff_amt,2);?>							</td>
						</tr>
				  </table>
				</td>
			</tr>
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