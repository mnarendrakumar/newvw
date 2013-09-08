<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Change Password</title>
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

            #stylized .error {
                font-size: 12px;
                padding: 3px 2px;
                border: solid 1px red;
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
<?php 
$cont_link = site_url().'admin/changePassword';
$header  = 'common/adminheader';
if($this->user_details->emp_role==4) {$cont_link = site_url().'booking/changePassword'; $header  = 'common/header';}?>	
        <table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

            <tr>
                <td colspan="2" align="center" valign="bottom"></td>
            </tr>
            <tr>
                <td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view($header);//include("header.php"); ?></td>
            </tr>
            <tr>
                <td align="center" valign="top" bgcolor="#E2D5BC"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="top" class="pannel_border"><div id="stylized" class="myform">
                                   <form name="chpwd_form" id="chpwd_form">
									 <h1>Change Password</h1>
                                        <p></p>
										
                                        <div class="d_fds">
											<div class="left_fld">
												<label for="old_pwd">Old Password:</label>
											</div>
											<div class="right_fld">
												  <input type='password' name='old_pwd' id='old_pwd' value='' class="required ip"/>
											</div>
											<div class="cb"></div>
										</div>
		<br />					
										<div class="d_fds">
											<div class="left_fld">
												<label for="new_pwd">Password:</label>
											</div>

											<div class="right_fld">
												<input style="display:block" type='password' name='new_pwd' id='new_pwd' value='' class="required ip"/>
											</div>

											<div class="cb"></div>
										</div>
							<br />

										<div class="d_fds">
											<div class="left_fld">
												<label for="cnf_pwd"> Confirm Password:</label>
											</div>
											<div class="right_fld">
												<input style="display:block" type='password' name='cnf_pwd' id='cnf_pwd' value='' class="required ip"/>
											</div>
											<div class="cb"></div>
										</div>
										
                                        <br />

                                        <input type='button' name='save' value='Save' class="jsave_chpwd" />
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
	$("#chpwd_form").validate({
		highlight: function(element, errorClass, validClass) {
			 $(element).addClass(errorClass).removeClass(validClass);
			 $(element.form).closest('.d_fds').find("label[for=" + element.id + "]").addClass(errorClass);
		  },
		  unhighlight: function(element, errorClass, validClass) {
			 $(element).removeClass(errorClass).addClass(validClass);
			 $(element.form).closest('.d_fds').find("label[for=" + element.id + "]").removeClass(errorClass);
		  },
		  errorPlacement: function(error, element) { },
        submitHandler: function()
        {
           var chpwd_data = $('#chpwd_form').serialize();
            $.ajax({
                type: "POST",
                url: '<?php echo $cont_link;?>',
                data: chpwd_data,
                beforeSend : function(){
                },
                success: function(res){
                    if(res == 'success')
                    {
                        $('.jerror_msg').html('Password Changed Successfully');
						//$('.jmsg').html('Password Changed Successfully');
                    }
                    else if(res == 'invalid')
                    {
                        $('.jerror_msg').html('Incorrect old password');
						//$('.jmsg').html('Incorrect old password').show();
                        $('#old_pwd').focus();
                        
                    }
                },
                complete: function(){
                }
           });
        }
    });
    $('.jsave_chpwd').live('click',function(){
        $("#chpwd_form").submit();
    });
	
});
</script>		
    </body>
</html>
