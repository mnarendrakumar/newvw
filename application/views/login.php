<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Login</title>
        <link href="<?php echo base_url(); ?>uploadify/uploadify.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />
        <style>
            #stylized .iptxt input,select,textarea,file{
                /*float:left;*/
                font-size:12px;
                padding:4px 2px;
                border:solid 1px #aacfe4;
                width:200px;
                margin:2px 0 10px 10px;
                }
            #stylized .btn input{
                /*float:left;*/
                font-size:12px;
                padding:4px 2px;
                border:solid 1px #aacfe4;
                width:50px;
                margin:2px 0 10px 10px;
                }
        </style>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>
        <script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>

        <script type="text/javascript" rel="javascript">
            var base_url="<?php echo base_url();  ?>";
            var main_url="<?php echo base_url();  ?>";
        </script>

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
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="top" class="pannel_border" bgcolor="#E2D5BC">
                                <div id="stylized" class="myform" style="height:400px">
                                    <form name="login" method="post" action="<?php echo base_url();?>login">
                                        <div style="margin:150px 0 0 200px; background-color:#E2D5BC">
                                            <?php
                                            if(isset($msg))
                                            {?>
                                                <span style="margin-left:110px;color:red;font-weight:bold">
                                                    Invalid Login Credentials, Please contact Administrator
                                                </span>
                                            <?php
                                            }
                                            ?>
                                            <div class="iptxt">
                                                <label>Username: </label>
                                                <input type="text" name="username" id="username" />
                                            </div>
                                            <div class="iptxt">
                                                <label>Password: </label>
                                                <input type="password" name="password" id="password" />
                                            </div>
                                            <div class="btn">
                                                <label>&nbsp; </label>
                                                <input type="submit" name="submit" value="Login"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <?php $this->load->view('common/footer'); //include("footer.php"); ?>
        </table>
    </body>
</html>
