<?php if(!empty($booking_det)) {?>
<form id="replace" name="replace" method="post" action="<?php echo base_url();?>booking/replaceRoom">
    <input type="hidden" name="rcpt_id" id="rcpt_id" value="<?php echo $booking_det[0]->rcpt_id;?>">
    <input type="hidden" name="booking_det_id" id="booking_det_id" value="<?php echo $booking_det[0]->booking_det_id;?>">
    <input type="hidden" name="app_det_id" id="app_det_id" value="<?php echo $booking_det[0]->app_det_id;?>">
    <input type="hidden" name="old_rooms_id" id="old_rooms_id" value="<?php echo $booking_det[0]->room_id;?>">
    <table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" class="tabborder">
        <tr>
            <td align="center" valign="top" ><h1>Room Booking Details</h1></td>
        </tr>
        <tr>
            <td align="center" valign="top" class="barheading">
                <table width="100%" border="0" align="center">
                    <tr>
                        <td width="19%" align="left" valign="top">Operator Name:</td>
                        <td width="58%" align="left" valign="top"><strong><?php echo ucfirst($user_name);?></strong></td>
                        <td width="8%" align="left" valign="top">Date:</td>
                        <td width="15%" align="left" valign="top"><?php echo $booking_det[0]->created_date;?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" valign="top" class="barheading">
                <table width="100%" border="1" cellspacing="1" cellpadding="4" align="center">
                    <tr>
                        <td width="14%" align="left" valign="top">Application Id</td>
                        <td width="38%" align="left" valign="top"><?php echo $booking_det[0]->application_id;?></td>
                        <td width="16%" align="left" valign="top">Customer ID</td>
                        <td width="32%" align="left" valign="top"><?php echo $booking_det[0]->customer_id;?></td>
                    </tr>
                    <tr>
                        <td width="14%" align="left" valign="top">Name</td>
                        <td width="38%" align="left" valign="top"><?php echo ucfirst($booking_det[0]->applicant_name);?></td>
                        <td width="16%" align="left" valign="top">Address</td>
                        <td width="32%" align="left" valign="top"><?php echo $booking_det[0]->applicant_address;?></td>
                    </tr>
                    <tr>
                        <td width="14%" align="left" valign="top">Block</td>
                        <td width="38%" align="left" valign="top"><strong><?php echo $booking_det[0]->block_name;?></strong></td>
                        <td width="16%" align="left" valign="top">Room No.</td>
                        <td width="32%" align="left" valign="top">
                            <?php
                            if($booking_det[0]->booked_status)
                            {
                            ?>
                            <select name="rooms_id" id="rooms_id"><?php echo $rooms_opts['room_options'];?></select>
                            <?php
                            }
                            else
                            {
                            ?>
                            <strong><?php echo $booking_det[0]->room_name;?></strong>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="14%" align="left" valign="top">Booked From</td>
                        <td width="38%" align="left" valign="top"><?php echo $booking_det[0]->from_date;?></td>
                        <td width="16%" align="left" valign="top">Booked To</td>
                        <td width="32%" align="left" valign="top"><?php echo $booking_det[0]->to_date;?></td>
                    </tr>
                    <tr>
                        <td width="14%" align="left" valign="top">Booked Type</td>
                        <td width="38%" align="left" valign="top"><?php echo ($booking_det[0]->booking_type==1?'Current':'Advanced');?></td>
                        <td width="14%" align="left" valign="top">Booking Condition</td>
                        <td width="38%" align="left" valign="top"><strong>
                        <?php echo ($booking_det[0]->booked_status?'In Booking':'Checked Out');?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="4" align="center"><input type="submit" name="submit" value="Replace Room"/></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
<?php
}
else {
    ?>
<table width="98%" border="1" cellspacing="1" cellpadding="1" align="center" class="tabborder" valign="top">
    <tr>
        <td align="center" style="color:#FF0000" valign="top"><h1>Room Booking Details are not found with application id : <?php echo $app_id;?></h1></td>
    </tr>
</table>
<?php
}
?>
