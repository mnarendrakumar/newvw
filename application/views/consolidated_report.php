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
									<td width="249" rowspan="2" align="center" valign="top"><strong>Block Name</strong> </td>
									<?php foreach($users as $k_u=>$v_u)
									{
									?>
									<td colspan="4" align="center" valign="top"><?php echo $v_u;?> </td>
									<?php
									}?>
								</tr>
								<tr>
								  <?php foreach($users as $k_u=>$v_u)
								  {
									$g_total_collected_amt = 'g_total_collected_amt';
									$g_refund_amount = 'g_refund_amount';
									$g_damage_amount = 'g_damage_amount';
									$g_total_amt = 'g_total_amt';
									
									'$'.$g_total_collected_amt.'_'.$k_u = 0;
									'$'.$g_refund_amount.'_'.$k_u = 0;
									'$'.$g_damage_amount.'_'.$k_u = 0;
									'$'.$g_total_amt.'_'.$k_u = 0;
								  ?>
								  <td align="center" valign="top"><strong>Total Collected(Rs.) </strong></td>
					              <td align="center" valign="top"><strong>Refund Amount(Rs.) </strong></td>
					              <td width="104" align="center" valign="top"><strong>Damage Collected Amt(Rs.) </strong></td>
					              <td width="115" align="center" valign="top"><strong>Total(Rs.)</strong></td>
								  <?php
								   }
								   ?>
								</tr>
						<?php	
							//echo '<pre>';
							
							$g_total = array();
							foreach($booking_data as $blocks=>$values)
							{								
								
								?>
								<tr>
									<td align="left" valign="middle"><?php echo $values['block_name']?></td>
									<?php foreach($users as $k_u=>$v_u)
									  {
										$g_total[$k_u]['total_collected_amount'][]=$values['total_collected_amount'.$k_u];
										$g_total[$k_u]['refund_amount'][]=$values['refund_amount'.$k_u];
										$g_total[$k_u]['damage_amount'][]=$values['damage_amount'.$k_u];
										$g_total[$k_u]['total_amt'][]=$values['total_amt'.$k_u];
									?>
									<td align="right" valign="top"><?php echo number_format($values['total_collected_amount'.$k_u],2);?></td>
									<td align="right" valign="top"><?php echo number_format($values['refund_amount'.$k_u],2);?></td>
									<td align="right" valign="top"><?php echo number_format($values['damage_amount'.$k_u],2);?></td>
									<td align="right" valign="top"><?php echo number_format($values['total_amt'.$k_u],2);?></td>
									<?php
									}
									?>
								</tr>
							<?php
							}
							//echo '<pre>';
							//print_r($g_total);
							?>
							<tr>
								<td align="left" valign="middle"><strong>Grand Total</strong></td>
								<?php foreach($users as $k_u=>$v_u)
								  {
									$g_total_collected_amt = array_sum($g_total[$k_u]['total_collected_amount']);
									$g_refund_amount = array_sum($g_total[$k_u]['refund_amount']);
									$g_damage_amount = array_sum($g_total[$k_u]['damage_amount']);
									$g_total_amt = array_sum($g_total[$k_u]['total_amt']);
								  ?>
								<td align="right" valign="top"><strong><?php echo number_format($g_total_collected_amt,2);?></strong></td>
								<td align="right" valign="top"><strong><?php echo number_format($g_refund_amount,2);?></strong></td>
								<td align="right" valign="top"><strong><?php echo number_format($g_damage_amount,2);?></strong></td>
								<td align="right" valign="top"><strong><?php echo number_format($g_total_amt,2);?></strong></td>
								<?php
								}
								?>
							</tr>
							
						<?php	
						}
						else
						{ ?>
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