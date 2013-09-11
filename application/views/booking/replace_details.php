<script>
    $(document).ready(function(){

        $("#bookingform").validate({
            highlight: function(element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
                $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
                $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
            },
            errorPlacement: function(error, element) { }
        });
        advanced_booking = false;

        $('.jdonor').click(function(){
            /*if($(this).val() == 1)
                    {
                        $(".jfree:first").click();
                    }
                    else
                    {
                        $(".jfree:last").click();
                    }*/
            roomRentDetails();
        });

        /*$('.jvip_quota').click(function(){
            if($(this).val() == '1')
            {
                $('.jrefname').slideDown('slow');
            }
            else
            {
                $('.jrefname').slideUp('slow');
            }
            $('#deposit_amt').val('');
            $('#rent_amount').val('');
            blocks_rooms();
        });*/
        //$('.mydp').datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
        /*$('.jfree').click(function(){
                    if($(this).val() == 'yes')
                    {
                        //$('.jpaydetails').slideUp('slow');
                        $('#deposit_amt').val(0);
                        $('#rent_amount').val(0);
                        $('#advance_amount').val(0);
                    }
                    else
                    {
                        $('#deposit_amt').val('');
                        $('#rent_amount').val('');
                        $('#advance_amount').val('');
                        roomRentDetails();
                        //$('.jpaydetails').slideDown('slow');
                    }

                });*/

        $('.jbooktype').click(function(){
            adv_date = '<?php echo $adv_date;?>';
            adv_todate = '<?php echo $adv_todate;?>';
            if($(this).val() == '2')
            {
                advanced_booking = true;
                $('#deposit_amt').val('');
                $('#rent_amount').val('');
                $('#advance_amount').val('');
                $('#blocks_id').val('');
                $('#rooms_id').val('').attr('disabled','disabled');
                $('.dpcontainer').html('<span style="float:right" class="mydp"></span>');
                $('.jfromhtml').html('<label>Check-In Date:</label><input type="text" name="from_date" class="jfrom" id="from" />');
                $('.jtohtml').html('<label>Check-Out Date:</label><input type="text" name="to_date" class="jto" id="to" />');
                if($('.jfrom').length>0){
                    $('.jfrom').datepicker({beforeShow: customRange2_Year,dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
                }

                if($('.jto').length>0){
                    $('.jto').datepicker({beforeShow: customRange_Year,dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
                }
                /*$('.jfrom').val('');
                    $('.jto').val('');*/
                $('.jadvamt').slideDown('slow');
            }
            else
            {
                $('#deposit_amt').val('');
                $('#rent_amount').val('');
                $('#advance_amount').val('');
                $('.jfrom').val('<?php echo $today;?>');
                $('.jto').val('<?php echo $tomorrow;?>');
                $('.jadvamt').slideUp('slow');
                blocks_rooms();
            }
        });
        $('#from').live('change',function(){
            $('#blocks_id').val('');
            $('#rooms_id').val('');
            $('#deposit_amt').val('');
            $('#rent_amount').val('');
            $('#advance_amount').val('');
            blocks_rooms();
        });

        $('#to').live('change',function(){
            $('#blocks_id').val('');
            $('#rooms_id').val('');
            $('#deposit_amt').val('');
            $('#rent_amount').val('');
            $('#advance_amount').val('');
            blocks_rooms();
        });

        $('#blocks_id').change(function(){
            $('.dpcontainer').html('');
            if($(this).val() == '')
            {
                $('#rooms_id').val('').attr('disabled','disabled');
            }
            else
            {
                blocks_rooms();
            }
        });

        natDays = [];
        //natDays   = [[1,1,2012],[1,1,2013],[12,31,2012],[10,22,2012]];
        $('#rooms_id').change(function(){
            $('.dpcontainer').html('<span style="float:right" class="mydp"></span>');
            var donorRef = 0;
            qry_str = 'blocks_id='+$('#blocks_id').val()+'&rooms_id='+$(this).val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>booking/getRoomBookingDates',
                data: qry_str,
                dataType: 'json',
                beforeSend : function(){
                },
                success: function(resdata){
                    natDays = resdata;
                    //natDays   = [[10,31,2012],[10,22,2012]];
                },
                complete: function(){
                    var d = new Date();
                    $(".mydp").datepicker({
                        minDate: new Date(d.getFullYear(), 1 - 1, 1),
                        maxDate: new Date(d.getFullYear()+1, 11, 31),
                        hideIfNoPrevNext: true,
                        beforeShowDay: noWeekendsOrHolidays
                    });
                }
            });
            roomRentDetails();
        });
    });

    function nationalDays(date) {
        var m = date.getMonth();
        var d = date.getDate();
        var y = date.getFullYear();
        for (var i = 0; i < natDays.length-1; i++) {
            var datets = Date.parse(natDays[i]);
            var myDate = new Date(datets);
            if ((m == (myDate.getMonth())) && (d == (myDate.getDate())) && (y == (myDate.getFullYear())))
            {
                //return [false];
                return ([false, 'booked', natDays[i][1]]);
            }
        }
        return [true];
    }

    /*function nationalDays(date) {
            var m = date.getMonth();
            var d = date.getDate();
            var y = date.getFullYear();

            for (i = 0; i < natDays.length; i++) {
                if ((m == natDays[i][0] - 1) && (d == natDays[i][1]) && (y == natDays[i][2]))
                {
                    return [false];
                }
            }
            return [true];
        }*/
    function noWeekendsOrHolidays(date) {
        return nationalDays(date);
        /*var noWeekend = $.datepicker.noWeekends(date);
            if (noWeekend[0]) {
                return nationalDays(date);
            } else {
                return [true];
            }*/
    }

    function blocks_rooms()
    {
        //var vip_quota = $('.jvip_quota:checked').val();
        var qry_str = '';
        var blocks_id = $('#blocks_id').val();
        /*if(vip_quota == "1")
        {
            qry_str += 'vip_quota=1&';
        }*/
        var from_date = $('#from').val();
        if(from_date != '')
        {
            qry_str += 'from_date='+from_date+'&';
        }
        var to_date = $('#to').val();
        if(to_date != '')
        {
            qry_str += 'to_date='+to_date+'&';
        }
        qry_str += 'blocks_id='+blocks_id;
        qry_str += '&booking_type=1';
        if(((from_date != '') && (to_date != '')) || (blocks_id != ''))
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>booking/getAvaliableBlocksRooms',
                data: qry_str,
                beforeSend : function(){
                },
                success: function(data){
                    if(data['block_options'] === false)
                    {
                        $('#rooms_id').html(data['room_options']);
                    }
                    else
                    {
                        $('#blocks_id').html(data['block_options']);
                        $('#rooms_id').html(data['room_options']);
                    }
                },
                complete: function(){
                    $('#rooms_id').removeAttr('disabled');
                    roomRentDetails();
                }
            });
        }
    }

    function roomRentDetails()
    {
        var blocks_id = $('#blocks_id').val();
        var rooms_id = $('#rooms_id').val();
        qry_str = 'blocks_id='+blocks_id+'&rooms_id='+rooms_id;
        var from_date = '<?php echo date('d-m-Y',strtotime(str_replace('/','-',$booking_det[0]->from_date)));?>';//$('#from').val();
        if(from_date != '')
        {
            qry_str += '&from_date='+from_date;
        }
        var to_date = '<?php echo date('d-m-Y',strtotime(str_replace('/','-',$booking_det[0]->to_date)));?>';//$('#to').val();
        if(to_date != '')
        {
            qry_str += '&to_date='+to_date;
        }
        var donorRef = 0;
        qry_str += '&donorRef='+donorRef;
        if((blocks_id != '')&&(rooms_id != ''))
        {
            $.ajax({
                type: "POST",
                url: '<?php echo base_url();?>booking/getRoomRentDetails',
                data: qry_str,
                //dataType: 'json',
                beforeSend : function(){
                },
                success: function(resdata){ 
                    $('#deposit_amt').val(resdata.deposit_amt);
                    $('#rent_amount').val(resdata.act_rent);
                    //$('#advance_amount').val(resdata.rent_amt);
                    $('#no_of_days').val(resdata.days);
                },
                complete: function(){
                }
            });
        }
    }

</script> 
<?php if(!empty($booking_det)) {?>
<form id="replace" name="replace" method="post" action="<?php echo base_url();?>booking/replaceRoom">
    <input type="hidden" name="rcpt_id" id="rcpt_id" value="<?php echo $booking_det[0]->rcpt_id;?>">
    <input type="hidden" name="booking_det_id" id="booking_det_id" value="<?php echo $booking_det[0]->booking_det_id;?>">
    <input type="hidden" name="app_det_id" id="app_det_id" value="<?php echo $booking_det[0]->app_det_id;?>">
    <input type="hidden" name="old_rooms_id" id="old_rooms_id" value="<?php echo $booking_det[0]->room_id;?>">
    <input type="hidden" name="no_of_days" id="no_of_days"/>
    <h1>Room Booking Details</h1>
    <p></p>
    <div class="iptxt">
        <label>Application ID:</label>
        <input type="text" name="application_id" disabled id="application_id" value="<?php echo $booking_det[0]->application_id;?>" class="required"/>
    </div>
    <div class="iptxt jfromhtml">
        <label>Check-In Date:</label>
        <input type="hidden" name="from_date" id="from" value="<?php echo date('d-m-Y',strtotime(str_replace('/','-',$booking_det[0]->from_date)));?>">
        <input type="text" name="from_date_static" class="jfrom required"  value="<?php echo $booking_det[0]->from_date;?>" readonly="readonly"/>
    </div>
    <div class="iptxt jtohtml">
        <label>Check-Out Date:</label>
        <input type="hidden" name="to_date" id="to" value="<?php echo date('d-m-Y',strtotime(str_replace('/','-',$booking_det[0]->to_date)));?>">
        <input type="text" name="to_date_static" class="jto required"  value="<?php echo $booking_det[0]->to_date;?>" readonly="readonly"/>
    </div>
        <?php
        $block_options = '<option value="0">Select Block</option>';
        foreach($master_data as $blockid=>$rooms) {
            if(!empty($rooms)) {
                $room_options = '<option value="">Select Room</option>';
                foreach($rooms as $roomid=>$roomdetails) {
                    $room_options .= '<option value="'.$roomid.'">'.$roomdetails['roomname'].'</option>';
                    $blockname = $roomdetails['blockname'];
                }
                $block_options .= '<option value="'.$blockid.'">'.$blockname.'</option>';
            }
        }
        ?>
    <div class="iptxt">
        <label>Block: </label>
        <select name="blocks_id" id="blocks_id" class="required" style="width:206px">
                <?php echo $block_options;?>
        </select>
    </div>
    <div class="iptxt">
        <label>Room: </label>
        <select name="rooms_id" id="rooms_id" disabled class="required" style="width:206px">
                <?php echo $room_options;?>
        </select>
        <span class="dpcontainer"><span style="float:right" class="mydp"></span></span>
    </div>
    <div class="jpaydetails">
        <div class="iptxt jadvamt" style="display:none">
            <label>Advance Amount:</label>
            <input type="text" name="advance_amount" id="advance_amount" class="required" readonly />
            <span style="color:red; margin-left:5px">(Non-Refundable)</span>
        </div>
        <div class="iptxt">
            <label>Rent Amount:</label>
            <input type="text" name="rent_amount" id="rent_amount" class="required" readonly />
        </div>
        <div class="iptxt">
            <label>Deposit:</label>
            <input type="text" name="deposit_amt" id="deposit_amt" class="required" readonly />
            <span style="color:green; margin-left:5px">(Refundable)</span>
        </div>
    </div>
    <div class="iptxt">
        <label>Name: </label>
        <input type="text" name="applicant_name" id="applicant_name" readonly value="<?php echo ucfirst($booking_det[0]->applicant_name);?>" class="required" />
    </div>
    <div class="iptxt">
        <label>Address: </label>
        <textarea name="applicant_address" id="applicant_address" readonly class="required"><?php echo $booking_det[0]->applicant_address;?></textarea>
        <span style="float:right;display:none" class="showmyfile"></span>
    </div>
        <?php echo formtoken::getField(); ?>
    <p></p>
    <button type="submit">Submit</button>
    <div class="spacer"></div>
</form>
<div style="display:none"><input type="text" name="jcurdate" class="jcurdate" value="<?php echo $cur_date;?>"/></div>
<div style="display:none"><input type="text" name="jadv_fromdate" class="jadv_fromdate" value="<?php echo $adv_date;?>"/></div>
<div style="display:none"><input type="text" name="jadv_todate" class="jadv_todate" value="<?php echo $adv_todate;?>"/></div>
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
