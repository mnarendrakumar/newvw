<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Operator Day Report</title>
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
<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>-->
<script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>
<script type="text/javascript" rel="javascript">
    var base_url="<?php echo base_url();  ?>";
    var main_url="<?php echo base_url();  ?>";
    // window.onerror=function(){ return true; }
</script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/viewPrint.js" ></script>
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
					<td colspan="2" align="center" valign="bottom"></td>
  </tr>
				<tr>
					<td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view('common/adminheader');//include("header.php"); ?></td>
				</tr>
    <tr>
		<td align="center" valign="top" bgcolor="#E2D5BC">
			<div id="stylized" class="myform">
			<table width="98%" height="500" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top" class="pannel_border">
					
					<table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
					  <form id="ope_day_rep" name="ope_day_rep" method="post" action="">
					  <tr>
						<td align="left" valign="top" class="pannel_border">
							<h1>Operator Day Report</h1>
							<p></p>
							<div class="iptxt">
							  <label>Operator:</label>
							  <select name="operator_id" id="operator_id" class="required ">
								<?php 
								foreach($users as $k => $v)
								{
								?>
									<option value="<?php echo $v->id;?>"><?php echo $v->name;?></option>
								<?php 
								} 
								?>
							</select>
							</div>
							<div class="iptxt">
							  <label>Date:</label>
							  <input type="text" name="rep_date" id="rep_date" class="required valid" />
							</div>
							<p></p>
							<button type="button" name="submit" class="jope_rep">Submit</button>
						</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="pannel_border" id="booking_details">
							
						</td>
					</tr>
					</form>
				  </table>
				</td>
			  </tr>
			</table>
			</div>
		</td>
	</tr>
	<?php $this->load->view('common/footer'); ?>
</table>

<script type="text/javascript">
var base_url = '<?php echo base_url();?>';
var site_url='<?php echo site_url()?>';
$(document).ready(function() {
	/////  for getting Room Checkout
	$("#ope_day_rep").validate({
		highlight: function(element, errorClass, validClass) {
		 $(element).addClass(errorClass).removeClass(validClass);
		 $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
	  },
	  unhighlight: function(element, errorClass, validClass) {
		 $(element).removeClass(errorClass).addClass(validClass);
		 $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
	  },
	  errorPlacement: function(error, element) { },
		submitHandler: function()
		{
			var data = $('#ope_day_rep').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: base_url+"admin/getDetailDayReport", 
				beforeSend : function(){
					$('#booking_details').html('');
				},
				success: function(data)
				{
						$('#booking_details').html(data);
				},
				complete : function()
				{
					//$("#sub_grid_tbl").trigger("reloadGrid");
				}
			});
		}
	});
	$('.jope_rep').live('click',function(){
		$("#ope_day_rep").submit();
	});
	
	 $('#rep_date').datepicker({dateFormat:'dd-mm-yy'});
});
</script>
</body>
</html>
