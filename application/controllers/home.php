<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct() {
        parent::__construct();
		$this->user_details = unserialize($this->session->userdata('user_details'));
    }

    public function index()
    {
        $data['from_page']='home';
		$this->load->view('home/index',$data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */