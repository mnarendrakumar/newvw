<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Room Checkout</title>
        <style>
            body{
                font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
                font-size:12px;
                background-color: #E8E8E8;
            }
        </style>
       <!-- <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />-->
        <!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>-->
        <?php /*?><script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>
        <script type="text/javascript" rel="javascript">
            var base_url="<?php echo base_url();  ?>";
            var main_url="<?php echo base_url();  ?>";
            // window.onerror=function(){ return true; }
        </script><?php */?>

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
            var main_url="<?php echo base_url();  ?>";
            // window.onerror=function(){ return true; }
        </script>

<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/public/js/general/jquery-ui-1.7.3.custom.min.js" ></script>-->
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/common.js" ></script>
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
        <script>
            var site_url = '<?php echo site_url();?>'
            $(document).ready(function(){
                $.ajaxSetup({
                    jsonp: null,
                    jsonpCallback: null
                });
                jQuery("#sub_grid_tbl").jqGrid431({

                    url:'<?php echo site_url();?>booking/getPendingCheckout',
                    datatype: "json",
                    mtype:'POST',
                    //height: $('#sidebar').height()-24,
                    //width: $('.form_prp').width()-10,
                    height: 500,
                    width: 900,
                    colNames:['Block','Room No','From Date','To Date','Excess Hours'],
                    colModel:[
                        {name:'blocks_id',index:'blocks_id',width:'120px'},
                        {name:'rooms_id',index:'rooms_id',width:'50px'},
                        {name:'from_date',index:'from_date',width:'100px'},
                        {name:'to_date',index:'to_date',width:'100px'},
                        {name:'excess_hours',index:'excess_hours',width:'50px'}
                    ],
                    rowNum:10,
                    //rowList:[10,20,30],
                    pager: '#sub_grid_pager',
                    sortname: 'to_date',
                    viewrecords: true,
                    sortorder: "desc",
                    multiselect: false,
                    childGrid: true,
                    childGridIndex: "rows"

                });

            });
        </script>
    </head>

    <body>
        <script language=JavaScript>
            /*var message="Right Click not allowed";
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
            document.oncontextmenu=new Function("alert(message);return false")*/
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
                        <table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td align="left" valign="top" class="pannel_border">
                                    <table width="100%" height="500" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="left" valign="top" class="pannel_border">
                                                <h1>Rooms Pending for Checkout</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <table id="sub_grid_tbl" class="cs_gd" height="100%"></table>
                                                <div id="sub_grid_pager"></div>
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

        <script type="text/javascript">
            var base_url = '<?php echo base_url();?>';
            var site_url='<?php echo site_url()?>';
            $(document).ready(function() {
            });
        </script>
    </body>
</html>
