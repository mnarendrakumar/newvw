<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    private $arrSessionLess=array('grid','login','');

    function __construct()
    {
        parent::__construct();
        //$data = unserialize();
        if (!$this->db_session->userdata('userObj') and !in_array($this->uri->segment(1),$this->arrSessionLess))
		$_ENV['myvar'] = '1234';
		putenv('myvar=1234');
		if(isset($_ENV['myvar']) && ($_ENV['myvar'] == getenv('myvar')))
        {
            if (!$this->session->userdata('user_details'))
            {
                redirect('login');
            }
        }
        else
        {
            echo "You don't have access to the system, Please contanct Administrator";die;
        }
    }
    function do_upload()
    {
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '10000';
        //$config['max_width']  = '1024';
        //$config['max_height']  = '768';


        $this->load->library('upload', $config);
        $ext = $this->upload->get_extension($_FILES['userfile']['name']);
        $temp_name = time().$ext;
        $org_name = $_FILES['userfile']['name'];
        $_FILES['userfile']['name'] = $temp_name;

        if ( ! $this->upload->do_upload('userfile'))
        {
            $data = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('upload_data' => $this->upload->data(),'original_name'=>$org_name);
        }
        /*echo '<pre>';
        print_r($data);die;*/
        return $data;
    }
	
	public function changepwd() {
        $this->load->view('admin/changepwd');
    }
	public function changePassword()
    {
        $_POST['users_id'] = $this->user_details->id;
		echo $this->admin_model->changePassword($_POST);
    }


}

