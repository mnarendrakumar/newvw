<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
		//if(isset($_ENV['myvar']))
        //{
            if (!$this->session->userdata('user_details'))
            {
                $data = array();
                if(!empty($_POST))
                {
                    if($this->booking_model->login($_POST))
                    {
                        $this->user_details = unserialize($this->session->userdata('user_details'));
						if($this->user_details->emp_role==4)
						redirect('home');
						else
						redirect('admin');
                    }
                    else
                    {
                        $data['msg'] = 'invalid';
                    }
                }
                $this->load->view('login',$data);
            }
            else
            {
                $this->user_details = unserialize($this->session->userdata('user_details'));
				if($this->user_details->emp_role==4)
				redirect('home');
				else
				redirect('admin');
            }
        /*}
        else
        {
            echo "You don't have access to the system, Please contanct Administrator";die;
        }*/
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}