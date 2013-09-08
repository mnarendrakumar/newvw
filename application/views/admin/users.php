<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Users</title>
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
			jQuery("#sub_grid_tbl").jqGrid431({
			
				url:'<?php echo site_url();?>admin/getusers',
				datatype: "json",
				mtype:'POST',
				//height: $('#sidebar').height()-24,
				//width: $('.form_prp').width()-10,
				height: 500,
				width: 900,
				<?php if($this->user_details->emp_role==1)
				{?>
				colNames:['Name','Emp Id','Role','User Name','Status','Edit'],
				colModel:[
					{name:'emp_name',index:'emp_name',width:'400px'},
					{name:'emp_id',index:'emp_id',width:'100px'},
					{name:'role',index:'role',width:'100px'},
					{name:'user_name',index:'user_name',width:'200px'},
					{name:'status',index:'status',width:'100px'},
					{name:'edit',index:'edit',width:'100px'}
				],
				<?php
				}
				else
				{
				?>
				colNames:['Name','Emp Id','Role','User Name','Status'],
				colModel:[
					{name:'emp_name',index:'emp_name',width:'400px'},
					{name:'emp_id',index:'emp_id',width:'100px'},
					{name:'role',index:'role',width:'100px'},
					{name:'user_name',index:'user_name',width:'200px'},
					{name:'status',index:'status',width:'100px'}
				],
				<?php 
				}?>
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'emp_role',
				viewrecords: true,
				sortorder: "asc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows"
				
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
            <tr >
                <td align="center" valign="top" bgcolor="#E2D5BC">
					
								<div id="stylized" class="myform">
								<table align="center" cellpadding="0" cellspacing="0" border="0">
									<tr>
									<td width="106" align="left" style="color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:16px; padding-left:inherit"><h1>Users List</h1></td>
									<td width="56" align="right">
										<?php if($this->user_details->emp_role==1)
										{?>
										 <a class="btn edit_ecur fr jadd_block" href="<?php echo site_url();?>admin/userview">
											<span class="inner-btn">
											<span class="label"><img class="small_plus_icon" height="16" width="16" src="images/spacer.gif">Add Operator</span>
											</span>
										 </a>
									<?php }?>
									</td>
									</tr>
									<tr>
										<td colspan="2">
											<table id="sub_grid_tbl" class="cs_gd" height="100%"></table>
											<div id="sub_grid_pager"></div>
										</td>
									</tr>
								</table>    
								</div>
							
				</td>
            </tr>
<?php $this->load->view('common/footer'); //include("footer.php"); ?>
        </table>
    </body>
<script type="text/javascript">	
$(".japply_filter").live('click',function(){
	var blocks_id = $('#blocks_id').val();
	$("#sub_grid_tbl").setGridParam({
	url: '<?php echo site_url();?>admin/getrooms',
	postData: {"blocks_id":blocks_id}
	}).trigger("reloadGrid");
});
</script>
</html>
