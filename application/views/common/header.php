

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" align="center" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#BFA06B" class="footer_text"><table width="60%" border="0" align="left" cellpadding="5" cellspacing="0">
                <tr>
                    <td width="10%"><table width="60" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="7" align="left" valign="middle">&nbsp;</td>
                                <td width="76" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>home" style="color:#FFF;" class="white_heading_txt_16px">Home </a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>

                    <td width="10%"><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td width="132" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking" style="color:#FFF;" class="white_heading_txt_16px">Book a Room</a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
                    <td width="10%"><table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td width="125" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>booking/checkOut" style="color:#FFF;" class="white_heading_txt_16px">Check Out  </a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
                    <td width="29%"><table width="90" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td width="101" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/getDayReport"style="color:#FFF;"  class="white_heading_txt_16px">Day Report</a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
                    <td width="10%"><table width="160" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/pendingCheckout" style="color:#FFF;" class="white_heading_txt_16px">Pending Checkout<span id="penco" style="color:#C92020">(0)</span></a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
                    <td width="10%"><table width="140" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/replaceRoom" style="color:#FFF;" class="white_heading_txt_16px">Room Replace</a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
                </tr>
            </table></td>
        <td width="40%" align="center" bgcolor="#BFA06B" class="footer_text">
            <table border="0" align="right" cellpadding="0" cellspacing="0" width="98%">
                <tr>
                    <?php
                    if($this->session->userdata('user_details')) {
                        ?>
                    <td align="right" valign="middle"><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></td>
<?php
                    }
                    else {
                        ?>
                    <td width="4" align="left" valign="middle">&nbsp;</td>
                    <?php
}
                    if($this->session->userdata('user_details')) {
                        ?>
                    <td height="25" align="right" valign="middle"><a href="<?php echo base_url();?>booking/changepwd" style="color:#FFF;" class="white_bold_txt_12px jlo">Change Password</a></td>
                    <td height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login/logout" style="color:#FFF;"  class="white_bold_txt_12px jlo">LogOut</a></td>
                    <?php
}
else {
                        ?>
                    <td width="35" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login" class="white_bold_txt_12px jli">Login</a></td>
                    <?php
                    }
                    ?>
                    <td align="left" valign="middle">&nbsp;</td>
                </tr>
                <tr>
                    <td height="1" colspan="2" ></td>
                </tr>
      </table></td>
    </tr>
</table>
