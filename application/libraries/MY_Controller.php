<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends Controller
{
	private   $arrSessionLess=array('login','logout','zip','csp','fileupload','','btc_mailer','survey','cron','redirect','tm','team_alerts','javascript');
	protected $backtoController='inbox';
	protected $baseController='inbox';
	private   $defaultController=array('ticket','inbox','users','reasoncodes','args','tools','tm_report');
        private   $arrExitTicket=array('ticket','logout','args','inbox');
        private   $arrTerritory=array('test');
        private   $arrayExtendTerritory=array('printticket','email','tm_report');
        
	function MY_Controller()
	{
		parent::Controller();
                set_time_limit(0);
                ini_set('memory_limit','900M');
                $this->load->model('permissions_model');

		if($this->db_session->userdata('backController') && ($this->db_session->userdata('backController')!='login') && in_array($this->db_session->userdata('backController'),$this->defaultController)  )
		{
		$this->backtoController=$this->db_session->userdata('backController');
		}
//echo $this->backtoController;

        //Exit Ticket Count
		if(in_array($this->uri->segment(1),$this->arrExitTicket) && $this->db_session->userdata('ticket_exit_id'))
                {
                    //echo "Rajuuu";exit();
                    $this->load->model('exit_ticket_model');
                    $this->exit_ticket_model->ticket_exit();
                   
                }



		$this->db_session->set_userdata('backController',$this->uri->segment(1));


             //    echo $this->uri->segment(1)."Rajuuuu";
		//Session Less Count
		if (!$this->db_session->userdata('userObj') && !in_array($this->uri->segment(1),$this->arrSessionLess) )
		{
			//$this->uri->uri_string()

           	 $this->db_session->set_userdata('redirectFromLogin',$this->uri->segment(1));
		 redirect('login');
		}
		else
		{
                       
			if($this->db_session->userdata('userObj') )
			{
                            //echo $this->uri->segment(1);
                           // exit();
                          
                           if($this->uri->segment(1)=='login' || $this->uri->segment(1)=='tm' )
                           {
			     redirect($this->backtoController);
                           }
                           else if($this->db_session->userdata('userObj')->type=='u' && in_array($this->uri->segment(1),$this->arrTerritory))
                            {
                                     redirect('inbox#pending');
                            }
                            else if($this->db_session->userdata('userObj')->type!='u' && !in_array($this->uri->segment(1),array_merge($this->arrTerritory,$this->arrayExtendTerritory)))
                            {
                                   redirect('tm_report');
                              //  echo "Trueeeeee";
                            }
                            
			}
			//            redirect('ticket');
		}

                $this->not_allowed_urls();

		$this->output->enable_profiler(false);
	}

        function not_allowed_urls()
        {
            $permission_segment=array("users"=>"can_access_users","reasoncodes"=>"can_access_reasoncodes","args"=>"can_modify_ARG",
                            "reports"=>"can_access_reports","tools"=>"can_access_system_tools",
                            "rewards"=>"can_access_custom_settings","trackticket"=>"can_track_ticket","dashboard"=>"can_access_dashboard");
            $segment = ($this->uri->segment(1)!=null)?$this->uri->segment(1):'';
//            print_r($this->uri->segment(2)); die;
            // $this->load->model('permissions_model');
            $user_permissions= (array) $this->userPermissions(); // $this->permissions_model->selectUserPermissions($userObj->id);
            // echo '<pre>';print_r($user_permissions);
            if( array_key_exists($segment,$permission_segment) && $this->uri->segment(2)==null){
                if(array_key_exists($permission_segment[$segment],$user_permissions) && isset($user_permissions[$permission_segment[$segment]]) && $user_permissions[$permission_segment[$segment]]==0){
                    // return true;
                    redirect('/inbox#pending','refresh');
                    // Dont do anything, Continue
                    // echo $user_permissions[$permission_segment[$segment]]." || ".$permission_segment[$segment];
                }else{
                    // redirect('/inbox#pending','refresh'); // echo 'Not Permited'; die;
                }
            }
        }

	protected function redirectFromLogin()
	{
            
	 if($this->db_session->userdata('redirectFromLogin') && in_array($this->db_session->userdata('redirectFromLogin'),$this->defaultController)){
            $return=$this->db_session->userdata('redirectFromLogin');
         }
	 else{
            $return=$this->baseController;
         }
         //$return='ticket';
	 return $return;
	}
	function exitTicketRedirection()
	{
	}

	protected function userPermissions()
	{
		if($this->db_session->userdata('userObj'))
		{
		 $userObj=$this->db_session->userdata('userObj');
                 // echo '<pre>UserObj ::<br/>'; print_r($userObj); echo '</pre>'; die;
		 $permissions=$this->permissions_model->userPermissionRights($userObj->id);
		 (object)$permissionObj='';
		 $permissionObj->can_access_reports=0;
		 $permissionObj->can_access_dashboard=0;
		 $permissionObj->can_access_admin=0;
                 $permissionObj->can_access_system_tools=0;
                 $permissionObj->can_access_custom_settings=0;
                 $permissionObj->admin_link='inbox';
                 $permissionObj->can_access_users=0;
                 $tools=array('access_contact_methods','access_subjects','access_out_emails');
                 $settings=array('access_admin_rewards','access_admin_promotions','access_admin_survey');
		// echo "<pre>"; print_r($permissions);
		 foreach($permissions as $val)
		 {
                        
			if (preg_match("/can_access_pools_/i", $val->code)){
                            $tools[]=$val->code;
                        } 
                       if($userObj->is_admin==2)
			 {
				 if($val->code!='idle_duration' && $val->code!='alert_duration')
				  $permissionObj->{$val->code}=2;
				  
				  		 $permissionObj->can_access_reports=1;
						 $permissionObj->can_access_dashboard=1;
						 $permissionObj->can_access_admin=1;
                                                 $permissionObj->admin_link='args';
                                                 $permissionObj->can_access_system_tools=1;
                                                 $permissionObj->can_access_custom_settings=1;
                                                 $permissionObj->can_access_users=1;

			 }
			 else
			 {
			 	 $permissionObj->{$val->code}=$val->permission;
                                 if($userObj->type!='u' && $val->parent_id=='38')
                                 {
                                     $permissionObj->{$val->code}=1;
                                 }
			  //   echo $permissionObj->access_contact_methods;
                           //  echo "d<br>";
				 if($val->parent_id=='43' && $val->permission==1)
				 $permissionObj->can_access_reports=1;
				 
				 if($val->parent_id=='42' && $val->permission==1)
				 $permissionObj->can_access_dashboard=1;

                                 
                                 if(in_array($val->code,$tools) && $val->permission==1)
                                 {
                                 //echo $val->code."/".$val->permission;echo "<br>";
                                  $permissionObj->can_access_system_tools=1;
                                 }
                                 if(in_array($val->code,$settings) && $val->permission==1)
                                 $permissionObj->can_access_custom_settings=1;

                                 if(substr($val->code, 0, 16)=='can_access_users' && $val->permission==1)
                                 $permissionObj->can_access_users=1;




				 if($val->parent_id=='44' && $val->permission==1)
                                 {
                                     $permissionObj->can_access_admin=1;
                                     if($val->code=='can_modify_ARG')
                                     $permissionObj->admin_link='args';
                                     else if(substr($val->code, 0, 16)=='can_access_users')
                                     $permissionObj->admin_link='users';
                                     else if($val->code=='can_access_reasoncodes')
                                     $permissionObj->admin_link='reasoncodes';
                                     else if($permissionObj->can_access_system_tools=='1') ////    if($val->code=='can_access_system_tools')
                                     $permissionObj->admin_link='tools';
                                     else if($permissionObj->can_access_custom_settings=='1') //// else if($val->code=='can_access_custom_settings')
                                     $permissionObj->admin_link='rewards';
                                 }
			 }
		 }
		//echo "<pre>"; print_r($permissionObj);
		 return $permissionObj;
		}
	}
	protected function userGroupBelongs($id)
	{

			 (object)$rolesObj='';
//			 $userGroup=$this->permissions_model->userGroupBelongsToPool($id);
//		    	 foreach($userGroup as $val)
//			 {
//				if($val->is_pool=='y')
//				{
//					$rolesObj->pool=$val->name;
//				}
//				else
//				{
//					$rolesArray[]=$val->name;
//				}
//
//				foreach($val as $k=>$v)
//				{
//			         $rolesObj->{$k}=$v;
//				}
//				//$rolesObj->
//			 }
//			 $rolesObj->role=$rolesArray;
                         $rolesObj=$this->permissions_model->userWhichGroupBelongs($id);
			 return $rolesObj;

	}
	
	/*  protected  function sendMail($from,$to,$subject,$message){
		$this->email->from($from);
		$this->email->to($to);
		$this->email->subject(stripslashes($subject));
		$this->email->message(stripslashes($message));
		$this->email->mailtype="html";
		$this->email->send();
	   }   */

}

