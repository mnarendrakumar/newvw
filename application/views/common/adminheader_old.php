<?php //print_r($this->user_details); die;?>

<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" align="center" bgcolor="#BFA06B" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
	</tr>
	<tr>
	  <td width="70%" align="center" bgcolor="#BFA06B" class="footer_text"><table width="98%" border="0" align="left" cellpadding="5" cellspacing="0">
        <tr>
          <td width="9%"><table width="51" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td width="47" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/blocks" style="color:#FFF;"class="white_heading_txt_16px">Blocks</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="9%"><table width="49" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td width="45" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>admin/rooms" style="color:#FFF;"class="white_heading_txt_16px">Rooms</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="7%"><table width="17%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="5" align="left" valign="middle">&nbsp;</td>
                <td width="71" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/users"style="color:#FFF;" class="white_heading_txt_16px">Users</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="22%"><table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/getDayReport" style="color:#FFF;"class="white_heading_txt_16px">Operator Day Report</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="19%"><table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td width="138" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/get_app_details" style="color:#FFF;"class="white_heading_txt_16px">Application  Details</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="16%"><table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td width="108" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/getBookingNVacancyRooms" style="color:#FFF;"class="white_heading_txt_16px">Rooms Status</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
          <td width="18%"><table width="112" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td width="4" align="left" valign="middle">&nbsp;</td>
                <td width="108" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/todayAvailableRooms" style="color:#FFF;"class="white_heading_txt_16px">Available Rooms</a></td>
              </tr>
              <tr>
                <td height="1" colspan="2" ></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
	  <td width="30%" align="center" bgcolor="#BFA06B" class="footer_text">
      <table  border="0" align="right" cellpadding="0" cellspacing="0" width="98%">
	    <tr>
	      <td width="70" align="right" valign="middle"><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></td>
		 
              <?php
                if ($this->session->userdata('user_details'))
                {
              ?>
              <td width="114" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>admin/changepwd" style="color:#FFF;" class="white_bold_txt_12px jlo">Change Password</a></td>
			  <td width="58" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login/logout" style="color:#FFF;"class="white_bold_txt_12px jlo">LogOut</a></td>
              <?php
                }
                else
                {
              ?>
	      <td width="43" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login" class="white_bold_txt_12px jli">Login</a></td>
              <?php
                }
              ?>
           <td width="10" align="left" valign="middle">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="1" colspan="2" ></td>
        </tr>
      </table></td>
  </tr>
</table>
