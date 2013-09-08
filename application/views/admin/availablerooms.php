<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="refresh" content="360"/>
<title>Available Rooms</title>
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
background:#666666 url(../checkout/img/button.png) no-repeat;
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
<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>-->
<script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/viewPrint.js" ></script>

<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/public/js/general/jquery-ui-1.7.3.custom.min.js" ></script>-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery-ui-custom.min.js" ></script>
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
					<td align="center" valign="bottom"></td>
  </tr>
				<tr>
					<td height="20"  align="left" valign="bottom" ><?php $this->load->view('common/adminheader');//include("header.php"); ?></td>
				</tr>
    <tr>
		<td align="center" valign="top" bgcolor="#E2D5BC">
			<div id="stylized" class="myform">
			<table width="98%" height="500" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top">
					<table width="50%" border="1" align="center">
						<tr>
							<td align="center" valign="top"><h1>Available Rooms as on <?php echo date('d/m/Y');?></h1></td>
						</tr>
						<tr height="100%">
							<td height="225" align="center" valign="top">
								<marquee  behavior="scroll" direction="up" scrollamount="3" height="500">
								<table width="100%" height="100%" border="1" align="center" >
								
								<?php
								foreach($master_data as $block => $rooms)
								{
								?>
									<tr height="30px">
										<td width="14%" align="left" valign="center"><strong><?php echo $blocks[$block];?>
										<span style="padding-left:20px">Total Available Rooms <?php echo count($rooms);?></span></strong></td>
									</tr>
								<?php
									foreach($rooms as $rk => $rv)
									{
								?>	
									<tr height="30px">
										<td align="left" valign="center" ><?php echo $rv['blockname'];?><span style="padding-left:20px"><?php echo $rv['roomname'];?></span></td>
									</tr>
								<?php
									}	
								}
								?>
								
							  </table>
							  </marquee>
						  </td>
						</tr>
					</table>
					
				</td>
			  </tr>
			</table>
			</div>
		</td>
	</tr>
	<?php $this->load->view('common/footer'); ?>
</table>
</body>
</html>
