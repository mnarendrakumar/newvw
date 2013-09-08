<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller { 
    var $user_details;
    function __construct() {
        parent::__construct();
	    $this->user_details = unserialize($this->session->userdata('user_details'));
		$this->users= $this->common_model->getTableDetails('id,concat(emp_fname," ",emp_lname) as name','users','status=1 and emp_role=4','order by name asc');
		if($this->user_details->emp_role==4)
		{
			redirect('home');
		}
		//print_r($this->user_details);
		//die;
    }

    public function index() {
        $this->load->view('admin/blocks');
    }
	public function blocks() {
	
        $this->load->view('admin/blocks');
    }
	public function getblocks()
    {
        echo $this->admin_model->getblocks();
    }
	
	public function blockView($b_id=0)
	{
	   if($this->user_details->emp_role!=1)
	   {
	   		redirect('admin/blocks');
	   }
	   $data=new stdclass();
	   if(isset($b_id) && $b_id!=0)
	   {
			$blocks_info=$this->admin_model->blockView($b_id);
            if($blocks_info) {
                $data=$blocks_info[0];
				$data->label = 'Edit';
            }
	   }
	   else
	   { 
	   		$data = $this->admin_model->gettabledetails(array('blocks'));
			$data->id = 0;
			$data->label = 'Add';
	   } 
		echo $this->load->view('admin/block_view',$data,true);
    }
	
	public function addBlock()
	{
			if($_POST['id'] == 0)
			{
				$_POST['created_by'] = $this->user_details->id;
				$_POST['created_date'] =  date("Y-m-d H:i:s");
            }
			$_POST['modified_by'] = $this->user_details->id;
            $_POST['modified_date'] = date("Y-m-d H:i:s");
            $_POST['ipaddress'] = ipaddress();
			$result = $this->admin_model->addBlock($_POST);
			echo $result;
	}
	
	public function rooms() {
	
        $data['blocks'] = $this->common_model->getTableDetails('id,name','blocks','status=1');
		//echo '<pre>'; print_r($data['blocks']); die;
		$this->load->view('admin/rooms',$data);
    }
	public function getrooms()
    {
        echo $this->admin_model->getrooms();
    }
	
	public function roomview($r_id=0)
	{
	   if($this->user_details->emp_role!=1)
	   {
	   		redirect('admin/rooms');
	   }
		$data=new stdclass();
	   if(isset($r_id) && $r_id!=0)
	   {
			$rooms_info=$this->admin_model->roomview($r_id);
            if($rooms_info) {
                $data=$rooms_info[0];
				$data->label = 'Edit';
            }
	   }
	   else
	   { 
	   		$data = $this->admin_model->gettabledetails(array('rooms'));
			$data->id = 0;
			$data->label = 'Add';
	   }
	    $data->blocks = $this->common_model->getTableDetails('id,name','blocks','status=1'); 
		echo $this->load->view('admin/roomview',$data,true);
    }
	public function addRoom()
	{
			if($_POST['id'] == 0)
			{
				$_POST['created_by'] = $this->user_details->id;
				$_POST['created_date'] =  date("Y-m-d H:i:s");
			}
            $_POST['modified_by'] = $this->user_details->id;
            $_POST['modified_date'] = date("Y-m-d H:i:s");
            $_POST['ipaddress'] = ipaddress();
			$result = $this->admin_model->addRoom($_POST);
			echo $result;
	}
	
	public function users() {
	
        $this->load->view('admin/users');
    }
	public function getusers()
    {
        echo $this->admin_model->getusers();
    }
	
	public function userView($u_id=0)
	{
	   if($this->user_details->emp_role!=1)
	   {
	   		redirect('admin/users');
	   }
		$data=new stdclass();
	   if(isset($u_id) && $u_id!=0)
	   {
			$user_info=$this->admin_model->userView($u_id);
            if($user_info) {
                $data=$user_info[0];
				$data->label = 'Edit';
            }
	   }
	   else
	   { 
	   		$data = $this->admin_model->gettabledetails(array('users'));
			$data->id = 0;
			$data->label = 'Add';
	   } 
		echo $this->load->view('admin/userview',$data,true);
    }
	
	public function addoperator()
	{
			if($_POST['id'] == 0)
			{
				$_POST['created_by'] = $this->user_details->id;
				$_POST['created_date'] =  date("Y-m-d H:i:s");
				$_POST['emp_role'] =  4;
            }
			$_POST['modified_by'] = $this->user_details->id;
            $_POST['modified_date'] = date("Y-m-d H:i:s");
            $_POST['ipaddress'] = ipaddress();
			$result = $this->admin_model->addoperator($_POST);
			echo $result;
	}
	 public function getDayReport() {
	 
	 $data['users'] = $this->users;
	 
	//echo '<pre>'; print_r($data); die;
	 $this->load->view('admin/getDayReport',$data);
    }
	 public function getDetailDayReport() {
		$date = date('Y-m-d',strtotime($_POST['rep_date']));
		$ip_array = array('date'=>$date, 
						  'user_id'=>$_POST['operator_id']);
        
        $data = $this->booking_model->getDayReport($ip_array);
		foreach($this->users as $k=>$v)
		{
			if($v->id == $_POST['operator_id'])
			{
				 $data['user_name'] = ucfirst($v->name);
			}
		}
        //$data['user_name'] = '';
        $data['date'] = $date;
        //echo '<pre>'; print_r($data); die;
        $this->load->view('day_report',$data);
    }
	
    public function get_app_details() {
        $this->load->view('admin/get_app_details');
    }
    public function getApplicationDetails() {
        $where_cond = ' ad.application_id="'.trim($_POST['application_id']).'"';
        $data['booking_det'] = $this->booking_model->getBookingDetails($where_cond);
        //echo '<pre>';		print_r($data);die;
        //$data['user_name'] = $this->user_details->emp_fname.' '.$this->user_details->emp_lname;;
        $data['app_id'] = $_POST['application_id'];
        echo $this->load->view('admin/application_details',$data,true);
    }
	
	public function getBookingNVacancyRooms()
	{
		$date = date('Y-m-d');
		$data['result']=$this->admin_model->getBookingNVacancyRooms($date);
		$blocks = $this->common_model->getTableDetails('id,name','blocks','status=1');
		foreach($blocks as $k => $v)
		{
			$blocks_array[$v->id] =  $v->name;
		}
		$data['blocks'] = $blocks_array;
		$this->load->view('admin/roomsstatus',$data);
		
	}
	public function todayAvailableRooms() {
        $data['today'] = $data['from_date'] = date('d-m-Y');
        $data['tomorrow'] = $data['to_date'] = date('d-m-Y', time()+86400);
        $data['php'] = true;
        $data['booking_type'] = 1; // by default current booking
		
        $result['master_data'] = $this->booking_model->getAvaliableBlocksRooms($data);
		
		$blocks = $this->common_model->getTableDetails('id,name','blocks','status=1');
		foreach($blocks as $k => $v)
		{
			$blocks_array[$v->id] =  $v->name;
		}
		$result['blocks'] = $blocks_array;
		
		//echo '<pre>';echo count($master_data[1]);print_r($master_data);die;
		$this->load->view('admin/availablerooms',$result);
		
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */