<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>User Details</title>
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

            #stylized .iptxt .error {
                font-size: 12px;
                padding: 4px 2px;
                border: solid 1px red;
                width: 200px;
                margin: 2px 0 10px 10px;
            }

            .ui-state-disabled .ui-state-default {
                background:red;
            }

            .odd { background-color: red; }
            /*#stylized input.error {
                border: 2px solid red;
                background-color: #FFFFD5;
                margin: 0px;
                color: red;
            }*/

        </style>
		
        
		<link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url();?>public/css/layout.css" type="text/css" media="screen" />
        <script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
		<script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
		<link href="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
		<script src="<?php echo base_url();?>public/js/hideshow.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.equalHeight.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>
        <script type="text/javascript" rel="javascript">
            var base_url="<?php echo base_url();  ?>";
            // window.onerror=function(){ return true; }
        </script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery-ui-custom.min.js" ></script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/common.js" ></script>
        <script type="text/javascript" language="javascript">
            function DisableBackButton() {
                window.history.forward()
            }
            DisableBackButton();
            window.onload = DisableBackButton;
            window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
            window.onunload = function() { void (0) }
        </script>
		 <script>
	var site_url = '<?php echo site_url();?>'
		$(document).ready(function(){
			$.ajaxSetup({
				 jsonp: null,
				 jsonpCallback: null
			  });

			$('.j_u_m').live('click',function(){
				$.unblockUI();
			});
			
		});
	</script>
    </head>

    <body>
        <table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

            <tr>
                <td colspan="2" align="center" valign="bottom"></td>
            </tr>
            <tr>
                <td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view('common/adminheader');//include("header.php"); ?></td>
            </tr>
            <tr>
                <td align="center" valign="top" bgcolor="#E2D5BC"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="top" class="pannel_border"><div id="stylized" class="myform">
                                    <form id="userview" name="userview" method="post" action="">
									 <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>
                                        <h1><?php echo $label;?> User Details</h1>
                                        <p></p>
										
                                        <div class="iptxt">
                                            <label>First Name:</label>
                                            <input type="text" name="emp_fname" id="emp_fname" class="required" value="<?php echo $emp_fname;?>"/>
                                        </div>
										<div class="iptxt">
                                            <label>Last Name:</label>
                                            <input type="text" name="emp_lname" id="emp_lname" class="required" value="<?php echo $emp_lname;?>"/>
                                        </div>
										<div class="iptxt">
                                            <label>Emp Id:</label>
                                            <input type="text" name="emp_id" id="emp_id" class="required" value="<?php echo $emp_id;?>"/>
                                        </div>
										<?php $readonly = ''; if($id!=0) $readonly = 'readonly="1"'?>
										<div class="iptxt">
                                            <label>User Name:</label>
                                            <input type="text" name="user_name" id="user_name" class="required" value="<?php echo $user_name;?>" <?php echo $readonly; ?>/>
                                        </div>
										<div class="iptxt">
                                            <label>Password:</label>
                                            <input type="text" name="password" id="password" class="required" maxlength="10" value="<?php echo $password;?>"/>
                                        </div>
										
                                        <div class="iptxt jrefname" >
                                            <label>Status: </label>
											<select name="status" id="status" style="" class="required ">
												<option value="">Select status</option>
												<option value="1" <?php echo $sts = ($status!='' && $status==1?'selected':'');?>>Active</option>
												<option value="0" <?php echo $sts = ($status!='' && $status==0?'selected':'');?>>Inactive</option>    
											</select>
                                        </div>
                                        <p></p>
                                        <input type='button' name='save' value='Save' class="jsave_user" />
										<span class="jerror_msg" style="color:#FF0000; font-family:Arial, Helvetica, sans-serif"></span>
                                        <div class="spacer"></div>
                                    </form>
                                </div></td>
                        </tr>
                    </table></td>
            </tr>
<?php $this->load->view('common/footer'); //include("footer.php"); ?>
        </table>
		
<script type="text/javascript">
var site_url = '<?php echo site_url();?>';
$(document).ready(function() {
	$("#userview").validate({
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
			var data = $('#userview').serialize();
			$.ajax({
				type: "POST",	
				data: data,
				url: site_url+"admin/addoperator", 
				beforeSend : function(){
				},
				success: function(data)
				{
					console.log(data);
					if(data > 0)
					{
						var error_msg = 'User Details Updated Successfully';
						if(data > 1) error_msg = 'User Details Added Successfully';
						$('.jerror_msg').html(error_msg);
						setTimeout(function() {
							  window.location = site_url+'admin/users';
						}, 5000);
					}
					else
					{
						var error_msg = 'Unable to process.. please check the data';
						$('.jerror_msg').html(error_msg);
					}
				},
				complete : function()
				{
					//$("#sub_grid_tbl").trigger("reloadGrid");
				}
			});
		}
	});
	$('.jsave_user').live('click',function(){
		$("#userview").submit();
	})
});
</script>		
    </body>
</html>
