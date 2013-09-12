<?php 
$blocks_cls = '';
$rooms_cls = '';
$users_cls = '';
$reports_cls = '';
$app_det_cls = '';
$rooms_sts_cls = '';
$avail_rms_cls = '';

if($from_page == 'blocks')
{
	$blocks_cls = 'active';
}
if($from_page == 'rooms')
{
	$rooms_cls = 'active';
}
if($from_page == 'users')
{
	$users_cls = 'active';
}
if($from_page == 'reports')
{
	$reports_cls = 'active';
}
if($from_page == 'app_details')
{
	$app_det_cls = 'active';
}
if($from_page == 'rooms_sts')
{
	$rooms_sts_cls = 'active';
}
if($from_page == 'avail_rooms')
{
	$avail_rms_cls = 'active';
}

?>
<link href="<?php echo base_url();  ?>public/css/menu-styles.css" rel="stylesheet" type="text/css" />


<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0 "background="../../../public/images/menu-bg.png" >
	<tr>
		<td colspan="2" align="center" bgcolor="#BFA06B" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
	</tr>
	<tr>
	  <td width="70%" align="left" background="../../../public/images/menu-bg.png" bgcolor="#ee6d4f" >
      
      
      
      <div id='cssmenu'>
<ul>
   <li class='<?php echo $blocks_cls;?>'><a href="<?php echo base_url();?>admin/blocks"><span>Blocks</span></a></li>
   <li class='has-sub <?php echo $rooms_cls;?>'><a href="<?php echo base_url();?>admin/rooms"><span>Rooms</span></a>   </li>
   <li class='has-sub <?php echo $users_cls;?>'><a href="<?php echo base_url();?>admin/users"><span>Users</span></a>   </li>
   <li class='last <?php echo $reports_cls;?>'><a href=""><span>Reports</span></a>
     <ul>
         <li><a href='<?php echo base_url();?>admin/getDayReport'><span>Operators Day Report</span></a></li>
         <li><a href='<?php echo base_url();?>admin/monthly_report'><span>Monthly Report</span></a></li>
         <li class='last'><a href='<?php echo base_url();?>admin/conDayReport'><span> Consolidated Day Report</span></a></li>
      </ul></li>
   <li class='last <?php echo $app_det_cls;?>'><a href="<?php echo base_url();?>admin/get_app_details"><span>Application  Details</span></a></li>
   <li class='last <?php echo $rooms_sts_cls;?>'><a href="<?php echo base_url();?>admin/getBookingNVacancyRooms"><span>Rooms Status</span></a></li>
      <li class='last <?php echo $avail_rms_cls;?>'><a href="<?php echo base_url();?>admin/todayAvailableRooms"><span>Available Rooms</span></a></li>

</ul>
</div>
      
      
      
      
      </td>
	  <td width="30%" align="right" background="../../../public/images/menu-bg.png" bgcolor="#ee6d4f" >
      
      
      <div id='cssmenu' style="float:right;">
<ul>
   <li class='has-sub'  style="margin:8px 0px 0px 1px;"><span><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></span></li>
   <?php
                if ($this->session->userdata('user_details'))
                {
              ?>
   <li class='has-sub'><a href="<?php echo base_url();?>admin/changepwd" style="color:#FFF;" ><span>Change Password</span></a>   </li>
   <li class='has-sub'><a href="<?php echo base_url();?>login/logout" style="color:#FFF;"><span>LogOut</span></a>
     
   </li>
   <?php
                }
                else
                {
              ?>
  
   <li class='last'><a href="<?php echo base_url();?>login" ><span>Login</span></a></li>
  
  <?php
                }
              ?>
</ul>
</div>
      
      
      
      
      
      
      
      
      
      
      
      
      </td>
  </tr>
</table>
