<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends MY_Controller { 
    var $user_details;
    function __construct() {
        parent::__construct();
        $this->user_details = unserialize($this->session->userdata('user_details'));
		if(!isset($this->user_details->id))
		{
			redirect('login');
		}
		
		if(isset($this->user_details->emp_role) && $this->user_details->emp_role!=4)
		{
			redirect('admin');
		}
        ini_set('date.timezone', 'Asia/Calcutta');
    //print_r($this->user_details);

    //echo $this->user_details->id;die;
    }

    public function index() {
        $data['today'] = $data['from_date'] = date('d-m-Y');
        $data['tomorrow'] = $data['to_date'] = date('d-m-Y', time()+86400);
        $data['php'] = true;
        $data['booking_type'] = 1; // by default current booking
        $data['master_data'] = $this->booking_model->getAvaliableBlocksRooms($data);
        /*echo '<pre>';
        print_r($data);die;*/
        $data['cur_date'] = date('d-m-Y', time());
        $data['adv_date'] = date('d-m-Y', time()+(8*86400));
        $data['adv_todate'] = date('d-m-Y', time()+(10*86400));
        $data['session_id'] = MD5($this->session->userdata('session_id'));
        //$data['penco'] = $this->getPendingRoomsCnt(false);
        $this->load->view('booking/index',$data);
    }

    public function roomBooking() {
        if (formtoken::validateToken($_POST)) {
            if($_POST['booking_type'] == 2)
            {
                $_POST['from_date'] = date('d-m-Y',strtotime($_POST['from_date'])-86400); // reduce one day as room will be blocked before one day
            }
            else
            {
                $_POST['from_date'] = date('d-m-Y',strtotime($_POST['from_date']));
                $_POST['advance_amount'] = 0; // if current booking, advance amount is 0
            }
            $date_fields_array = array('from_date','to_date');
            $time = date('H:i:s',time());
            foreach($date_fields_array as $val) {
                if(isset($_POST[$val])) {
                    $_POST[$val] = date('Y-m-d '.$time,strtotime($_POST[$val]));
                }
            }
            $_POST['checkout_date'] = $_POST['to_date'];
            $_POST['created_by'] = $this->user_details->id;
            $_POST['created_date'] =  date("Y-m-d H:i:s");
            $_POST['modified_by'] = $this->user_details->id;
            $_POST['modified_date'] = date("Y-m-d H:i:s");
            $_POST['ipaddress'] = ipaddress();
            $_POST['received_by'] = $this->user_details->id;
            $_POST['received_date'] =  date("Y-m-d H:i:s");
            $_POST['total_amount_paid'] =  $_POST['deposit_amt']+$_POST['rent_amount']+$_POST['advance_amount'];
            $app_id = $this->booking_model->save_booking($_POST);
            redirect("booking/ticket/$app_id");
        //$this->ticket($app_id);
        }
        else {
            die('The form is not valid or has expired.');
        }
    }

    public function getAvaliableBlocksRooms() {
        $data = $this->booking_model->getAvaliableBlocksRooms($_POST);
        header('content-type:application/json');
        echo json_encode($data);
    }

    public function getRoomBookingDates() {
        $data = $this->booking_model->getRoomBookingDates($_POST);
        header('content-type:application/json');
        echo json_encode($data);
    }
    
    public function getRoomRentDetails() {
        $data = $this->booking_model->getRoomRentDetails($_POST);
        header('content-type:application/json');
        echo json_encode($data);
    }

    public function pendingCheckout(){
        $this->load->view('pendingcheckout/index');
        //echo 'Rooms need to checkout';
    }

    public function getPendingRoomsCnt($ajaxReq = true){
        $this->after4Hours();
        $data = $this->booking_model->getPendingRoomsCnt();
        if($ajaxReq)
        {
            echo $data;
        }
        else
        {
            return $data;
        }
        //echo 'Rooms need to checkout';
    }

    public function getPendingCheckout()
    {
        $data = $this->booking_model->getPendingRooms();
        echo $data;
    }

    public function after4Hours()
    {
        $data = $this->booking_model->after4Hours();
    }

    public function libhelp() {
    //$tbl_array = array('users','users_address','users_contacts','users_ecurrencies','users_settings');
        $tbl_array = array('users');
        $data = $this->booking_model->gettabledetails($tbl_array);
        /*echo '<pre>';
        print_r($data);*/
        foreach($data as $key=>$val) {
            echo 'private $'.$key.';<br>';
        }
    }

    public function updateTriggerHelp() {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggers($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }

    public function insertTriggerHelp() {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersInsert($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }

    public function deleteTriggerHelp() {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersDelete($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }

    public function getDates() {
        $sql="SELECT dates FROM holidaydates";
        $result = $this->db->query($sql);
        //$chkdate = $_POST['chkdate'];
        $str='';
        while($row = mysql_fetch_array($result)) {
            $str .=$row[0].'';
        }
        echo $str;
    }

    public function getDayReport() {
		$date = date('Y-m-d');
		$ip_array = array('date'=>$date,
						  'user_id'=>$this->user_details->id);
        
        $data = $this->booking_model->getDayReport($ip_array);
        $data['user_name'] = $this->user_details->emp_fname.' '.$this->user_details->emp_lname;
        $data['date'] = $date;
        //echo '<pre>'; print_r($data); die;
        $this->load->view('reports/index',$data);
    }
    public function ticket($app_id = 0) {
        $where_cond = ' ad.id='.$app_id;
        $data['booking_det'] = $this->booking_model->getBookingDetails($where_cond);
        //echo '<pre>';		print_r($data);die;
        $data['user_name'] = $this->user_details->emp_fname.' '.$this->user_details->emp_lname;
        $this->load->view('booking/ticket',$data);
    }

    public function checkOut() {
        $this->load->view('checkout/index');
    }
    public function getBookingDetails() {
        $where_cond = ' ad.application_id="'.trim($_POST['application_id']).'"';
        $data['booking_det'] = $this->booking_model->getBookingDetails($where_cond);
        //echo '<pre>';		print_r($data);die;
        $data['user_name'] = $this->user_details->emp_fname.' '.$this->user_details->emp_lname;;
        $data['app_id'] = $_POST['application_id'];
        echo $this->load->view('checkout/checkout_details',$data,true);
    }

    public function updatecheckout() {
        $booked_status = $this->booking_model->getBookingStatus($_POST['booking_det_id']);

        //echo '<pre>'; print_r($booked_status); die;
        if($booked_status[0]->booked_status == '1') {
            $booking_details['id'] = $_POST['booking_det_id'];
            $booking_details['to_date'] = date("Y-m-d H:i:s");
            $booking_details['booked_status'] = '0';
            $booking_details['modified_by'] = $this->user_details->id;
            $booking_details['modified_date'] = date("Y-m-d H:i:s");

            $receipt_details['receipt_id'] = $_POST['rcpt_id'];
            $receipt_details['deposit_refund_amount'] = $_POST['deposite_amount'];
			$receipt_details['damage_amount'] = $_POST['damage_amount'];
            $receipt_details['deposit_refund_by'] = $this->user_details->id;
            $receipt_details['deposit_refund_date'] = date("Y-m-d H:i:s");
            $receipt_details['modified_by'] = $this->user_details->id;
            $receipt_details['modified_date'] = date("Y-m-d H:i:s");
            $receipt_details['ipaddress'] = ipaddress();

            $ip_array = array('booking_details'=>$booking_details,'payments'=>$receipt_details);
            //echo '<pre>'; print_r($ip_array); die;
            $update_booked_status = $this->booking_model->updateBookingDetails($ip_array);
            echo $update_booked_status;
        }
        else {
        //$response_array = array('response'=>'error','message'=>'This Booking checkout already done');
        //echo json_encode($response_array);
            echo 'error';
        }
    }

    function sendEmail() {
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'm.rajashekarreddy@gmail.com';
        $config['smtp_pass']    = '123';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not

        $this->email->initialize($config);

        $this->email->from('admin@vemulawadatemple.com', 'Vemulawada');
        $this->email->to('m.rajashekarreddy@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo $this->email->print_debugger();

    //$this->load->view('email_view');
    }

    public function replaceRoom()
    {
        if(isset($_POST['rooms_id']) && $_POST['rooms_id'] != '')
        {
            /*echo '<pre>';
            print_r($_POST);*/
            if($_POST['old_rooms_id'] != $_POST['rooms_id'])
            {
                $app_det_id = $this->booking_model->replaceRoom($_POST);
                if($this->booking_model->replaceRoom($_POST))
                {
                    //echo 'success';
                    redirect("booking/ticket/$app_det_id");
                }
                else
                {
                    //echo 'fail';
                }
            }
        }
        $this->load->view('booking/replace_room');
    }

    public function getBookingReplaceDetails() {
        $where_cond = ' ad.application_id="'.$_POST['application_id'].'"';
        $data['booking_det'] = $this->booking_model->getBookingDetails($where_cond);
        //echo '<pre>';print_r($data);die;
        $data['user_name'] = $this->user_details->emp_fname.' '.$this->user_details->emp_lname;
        $data['app_id'] = $_POST['application_id'];
        if(!empty($data['booking_det']))
        {
            $post = array('from_date'=>str_replace('/','-',$data['booking_det'][0]->from_date),//date('Y-m-d',strtotime($data['booking_det'][0]->from_date)),
                            'to_date'=>str_replace('/','-',$data['booking_det'][0]->to_date),//date('Y-m-d',strtotime($data['booking_det'][0]->to_date)),
                            'blocks_id'=>$data['booking_det'][0]->block_id,
                            'rooms_id'=>$data['booking_det'][0]->room_id,
                            'booking_type'=>1);
            $data['rooms_opts'] = $this->booking_model->getAvaliableBlocksRooms($post);
        }
        echo $this->load->view('booking/replace_details',$data,true);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */