<?php
class LoginWithGooglePlus extends CI_Controller{
	
	function __construct(){
        parent::__construct();
        
        // Load google oauth library
        $this->load->library('googleplus');
        
        // Load user model
        $this->load->model('Users');
    }
	
	public function index(){
		
		if(isset($_GET['code']))
		{
			$this->googleplus->getAuthenticate();
			
			$gpInfo = $this->googleplus->getUserInfo();
			// Preparing data for database insertion
                $userData['oauth_provider'] = 'google';
                $userData['oauth_uid']      = $gpInfo['id'];
                $userData['first_name']     = $gpInfo['given_name'];
                $userData['last_name']      = $gpInfo['family_name'];
                $userData['email']          = $gpInfo['email'];
                $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:'';
                $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:'';
                $userData['link']           = !empty($gpInfo['link'])?$gpInfo['link']:'';
                $userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
				
			$userID = $this->Users->checkUser($userData);
			$this->session->set_userdata('login',true);
			$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
			redirect('LoginWithGooglePlus/profile');
		}
		
		$data['loginURL'] = $this->googleplus->loginURL();
		$this->load->view('social/login',$data);
	}
	
	public function profile(){
		if($this->session->userdata('login') == true)
		{
			$data['profileData'] = $this->session->userdata('userProfile');
			$this->load->view('social/profile',$data);
		}
		else
		{
			redirect('');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('LoginWithGooglePlus');
	}
}//class ends here
