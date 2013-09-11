<?php 
$home_cls = '';
$bokrooms_cls = '';
$chk_out_cls = '';
$day_rep_cls = '';
$pnd_chkout_cls = '';
$rom_rplc_cls = '';

if(isset($from_page) && $from_page == 'home')
{
	$home_cls = 'active';
}
if(isset($from_page) && $from_page == 'room_booking')
{
	$bokrooms_cls = 'active';
}
if(isset($from_page) && $from_page == 'check_out')
{
	$chk_out_cls = 'active';
}
if(isset($from_page) && $from_page == 'replaceRoom')
{
	$rom_rplc_cls = 'active';
}
if(isset($from_page) && $from_page == 'day_report')
{
	$day_rep_cls = 'active';
}
if(isset($from_page) && $from_page == 'pending_checkout')
{
	$pnd_chkout_cls = 'active';
}


?>

<link href="<?php echo base_url();  ?>public/css/menu-styles.css" rel="stylesheet" type="text/css" />


<table width="1003" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" align="center" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
    </tr>
    <tr>
        <td align="center" bgcolor="#BFA06B" class="footer_text">
            
            <div id='cssmenu'>
<ul>
   <li class='<?php echo $home_cls;?>'><a href="<?php echo base_url();?>home"><span>Home</span></a></li>
   <li class='has-sub <?php echo $bokrooms_cls;?>'><a href="<?php echo base_url();?>booking"><span>Book a Rooms</span></a></li>
   <li class='has-sub <?php echo $chk_out_cls;?>'><a href="<?php echo base_url();?>booking/checkOut"><span>Check Out</span></a></li>
   <li class='last <?php echo $rom_rplc_cls;?>'><a href="<?php echo base_url();?>booking/replaceRoom"><span>Room Replace</span></a></li>
   <li class='last <?php echo $day_rep_cls;?>'><a href="<?php echo base_url();?>booking/getDayReport"><span>Day Report</span></a></li>
   <li class='last <?php echo $pnd_chkout_cls;?>'><a href="<?php echo base_url();?>booking/pendingCheckout"><span>Pending Checkout</span></a></li>
</ul>
</div>
            
            
            
            </td>
        <td align="center" bgcolor="#BFA06B" class="footer_text">
            
            <div id='cssmenu'>
<ul>
<?php
                    if($this->session->userdata('user_details')) {
                        ?>
   <li class='active'><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></li>
  <?php
                    }
                    else {
                        ?>
                        
                         <?php
}
                    if($this->session->userdata('user_details')) {
                        ?>
                        
   <li class='has-sub'><a href="<?php echo base_url();?>booking/changepwd" style="color:#FFF;" ><span>Change Password</span></a>
      
   </li>
   <li class='has-sub'><a href="<?php echo base_url();?>login/logout" style="color:#FFF;"><span>LogOut</span></a>
     
   </li>
     <?php
}
else {
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
