<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ticket</title>
<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
background-color: #E8E8E8;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:970px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 2px #F7F2EA;
background:#E2D5BC;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:180px;
float:left;
padding-top:6px;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized .iptxt input,select,textarea,file{
/*float:left;*/
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 10px 10px;
}
#stylized .ipradio input{
/*float:left;*/
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
margin:8px 0 10px 10px;
}
#stylized button{
clear:both;
margin-left:160px;
width:125px;
height:31px;
background:#666666 url(img/button.png) no-repeat;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
#myfileUploader {
margin-left: 10px;
}
</style>
<link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery-ui-custom.min.js" ></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/common.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/viewPrint.js" ></script>
<script type="text/javascript" language="javascript">
function DisableBackButton() {
window.history.forward()
}
DisableBackButton();
window.onload = DisableBackButton;
window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
window.onunload = function() { void (0) }
</script>
</head>

<body>
<script language=JavaScript>
var message="Right Click not allowed";
function clickIE4()
{
    if (event.button==2)
    {
        alert(message);
        return false;
    }
}
function clickNS4(e)
{
    if (document.layers||document.getElementById&&!document.all)
    {
        if (e.which==2||e.which==3)
        {
            alert(message);
            return false;
        }
    }
}
if (document.layers)
{
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById)
{
    document.onmousedown=clickIE4;
}
document.oncontextmenu=new Function("alert(message);return false")
</script>


<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td colspan="2" align="center" valign="bottom"></td>
	</tr>
	<tr>
		<td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view('common/header');//include("header.php"); ?></td>
	</tr>
	<tr>
		<td align="center" valign="top">
			<div id="stylized" class="myform">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
				<tr>
					<td align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
					<td align="left" valign="top">
						<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" id="the_content" class="tabborder">
							<tr>
								<td align="center" valign="top" ><h1>Room Booking Ticket Details</h1></td>
							</tr>
							<tr>
								<td align="center" valign="top" class="barheading">
									<table width="100%" border="0" align="center">
										<tr>
											<td width="19%" align="left" valign="top">Operator Name:</td>
											<td width="58%" align="left" valign="top"><strong><?php echo $user_name;?></strong></td>
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
											<td width="38%" align="left" valign="top"><?php echo $booking_det[0]->applicant_name;?></td>
											<td width="16%" align="left" valign="top">Address</td>
											<td width="32%" align="left" valign="top"><?php echo $booking_det[0]->applicant_address;?></td>
										</tr>
										<tr>
											<td width="14%" align="left" valign="top">Block</td>
											<td width="38%" align="left" valign="top">
												<table width="70%" border="0" cellpadding="0" cellspacing="0">
												  <tr>
													<td align="left" valign="middle"><strong><?php echo $booking_det[0]->block_name;?></strong></td>
													<td align="left" valign="middle"><img src="<?php echo base_url().$booking_det[0]->telugu_name;?>"/></td>
												  </tr>
												</table>
											</td>
											<td width="16%" align="left" valign="top">Room No</td>
											<td width="32%" align="left" valign="top"><strong><?php echo $booking_det[0]->room_name;?>
											<span style="padding-left:50px">No of Persons (<?php echo $booking_det[0]->no_of_persons;?>)</span>
											</strong></td>
										</tr>
										<tr>
											<td width="14%" align="left" valign="top">Booked From</td>
											<td width="38%" align="left" valign="top"><?php echo $booking_det[0]->from_date;?></td>
											<td width="16%" align="left" valign="top">Booked To</td>
											<td width="32%" align="left" valign="top"><?php echo $booking_det[0]->to_date;?></td>
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
			</div>
		</td>
    </tr>
	<?php $this->load->view('common/footer'); ?>
</table>
</body>
</html>
