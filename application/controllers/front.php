<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct() { 
        parent::__construct();
        $this->load->library('form_validation'); 
        $this->load->model('Front_model');
		$this->load->library('googleplus');
        $this->load->model('Users');
    } 
	
	public function index()
	{
		$data['title'] = 'MDITS | Home';
		$data['languages'] = $this->Front_model->get_language_bylimit();
		$this->load->view('home',$data);
	}
	
	public function course_detail($slug){
		$data['language'] = $this->Front_model->getRow(array('url_slug'=>$slug));
		$types = $data['language']['name'];
		$data['topics'] = $this->Front_model->getlangtopic(array('prodtyp'=>$types));
		$data['title'] = $data['language']['name'];
		$this->load->view('lang',$data);
	}
	
	public function topic_detail($slug){
		if(isset($_SESSION['userProfile']['email'])){
		$data['topic'] = $this->Front_model->getRow_topic(array('url_slug'=>$slug));
		//print_r($data['topic']);die();
		$types = $data['topic']['language'];
		$data['topics'] = $this->Front_model->getlangtopic(array('prodtyp'=>$types));
		$data['title'] = $data['topic']['name'];
		$sess_is = $_SESSION['userProfile']['id'];
		$tbl = 'guru_users';
		$data['usersess'] = $this->Front_model->getbyid($sess_is,$tbl);
		$this->load->view('topic',$data);
		}else{
			redirect('login');
		}
	}
	
	public function register()
	{
		$data['title'] = 'MDITS | Register';
		$table = 'guru_users';
		$start_date = date('Y/m/d H:i');
		$end_date = date('Y/m/d H:i',strtotime('+30 days',strtotime(date('Y/m/d H:i'))));
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
				$userData['phone']          = '';
				$userData['password']       = '';
				$userData['tstatus']		= 0;
				$userData['tstartdate']     = $start_date;
				$userData['tenddate']       = $end_date;
				$userData['ustatus']		= 1;
				$userData['topic']			= '';
				
				$mail_id = $gpInfo['email'];
				
				$get_mail = $this->Front_model->getmailid($mail_id,$table);
				
				if(($get_mail['email'] == $mail_id) && ($get_mail['oauth_provider'] == $userData['oauth_provider']) && ($get_mail['oauth_uid'] == $userData['oauth_uid'])){
					$userID = $this->Users->checkUser($userData);
					$this->session->set_userdata('login',true);
					$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
					redirect('/');
				}elseif($get_mail['email'] == $mail_id){
					$this->session->set_flashdata('errmessage', 'Email already registered! Please login');					
					redirect('register');
				}else{
					$userID = $this->Users->checkUser($userData);
					$this->session->set_userdata('login',true);
					$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
					redirect('/');
				}
		}
		
		if($this->input->post('regsiterSubmit')){ 
			
            $this->form_validation->set_rules('fname', 'First Name', 'required'); 
            $this->form_validation->set_rules('lname', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|is_unique[guru_users.email]'); 
            $this->form_validation->set_rules('password', 'Password', 'required'); 
			$this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]'); 
            $this->form_validation->set_rules('rpassword', 'Confirm password', 'required|matches[password]'); 
			$this->form_validation->set_rules('gender', 'Gender', 'required|callback_select_validate'); 
			if($this->form_validation->run() == False){
				//$data['token'] = $this->auth->token();
				//$this->load->view('register',$data);
			}else{
				$datatoken = $this->session->userdata('token');
				if($this->input->post('registertoken') == $datatoken){
					$registerData = array( 
					'first_name' => $this->security->xss_clean($this->input->post('fname')),
					'last_name' => $this->security->xss_clean($this->input->post('lname')),	
					'email' => $this->security->xss_clean($this->input->post('email')),
					'password' => $this->security->xss_clean(md5($this->input->post('password'))),					
					'phone' => $this->security->xss_clean($this->input->post('phone')),
					'gender' => $this->security->xss_clean($this->input->post('gender')),
					'created' => date("Y-m-d H:i:s"),
					'modified' => date("Y-m-d H:i:s"),
					'oauth_provider' => "",
					'oauth_uid' => "",
					'locale' => "",
					'picture' => "",
					'link' => "",
					'tstatus' => 0,
					'tstartdate' => $start_date,
					'tenddate' => $end_date,
					'ustatus' => 1,
					'topic' => ''
					);
					$insert = $this->Front_model->insert($registerData,$table);
					if($insert){	
					$this->session->set_flashdata('message', 'Registration done successfully. Please login');					
					redirect('register'); 
					}else{ 
						$this->session->set_flashdata('message', 'Invalid');
					}
				}
			}
			
		}
		$data['token'] = $this->auth->token();
		$data['loginURL'] = $this->googleplus->loginURL();
		
		$this->load->view('register',$data);
	}
	
	function select_validate($abcd)
	{
		if($abcd=="none"){
			$this->form_validation->set_message('select_validate', 'The Gender field is required.');
			return false;
		} else{
			return true;
		}
	}

	public function login()
	{
		$data['title'] = 'MDITS | Login';
		
		if(isset($_REQUEST['code']))
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
				$userData['phone']          = '';
				$userData['password']       = '';
				
					$userID = $this->Users->checkUser($userData);
					$this->session->set_userdata('login',true);
					$this->session->set_userdata('userProfile',$this->googleplus->getUserInfo());
					redirect('/');
		}else{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run() == FALSE){
			
			$data['loginURL'] = $this->googleplus->loginURL();
			//$this->load->view('login',$data);
			}else{
				$datatoken = $this->session->userdata('token');
				$email = $this->security->xss_clean($this->input->post('email'));
				$password = $this->security->xss_clean(md5($this->input->post('password')));
				//echo $this->input->post('logintoken'); echo "<br>"; echo $this->session->userdata('token'); die();
				if($this->input->post('logintoken') == $datatoken){
					$user = $this->Front_model->login($email,$password);
					//print_r($user);die();
					if($user){
						$userdata = array(
							'id' => $user->id,
							'email' => $user->email,
							'authenticated' => TRUE
						);
						
						$this->session->set_userdata('userProfile',$userdata);
						redirect('/');
					}else{
						$this->session->set_flashdata('validtmessage', 'Invalid email or password');
						
					}
				}
			}
			
		}
		
		$data['token'] = $this->auth->token();
		$data['loginURL'] = $this->googleplus->loginURL();
		
		$this->load->view('login',$data);
	}
	
	public function search()
	{
		$data['title'] = 'MDITS | Search';
		$search = $this->input->post('search');
		$data['word'] = $search;
		$data['query'] = $this->Front_model->get_search($search);
		$data['cnt'] = count($data['query']);
		$segment = $this->uri->segment_array();
		//print_r($segment); die();
		$this->load->view('search',$data);
		//$this->session->set_flashdata('lolwut',$data);
		//redirect('search');
	}
	
	public function download($file){
        if(!empty($file)){
            //load download helper
            $this->load->helper('download');
            $file = base_url('assets/images/topic_doc/'.$file);
            $data = file_get_contents($file); // Read the file's contents
			$name = $file->file_name;
            //download file from directory
            force_download($name, $data);
        }
    }
	
	public function userlogin(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
        $this->form_validation->set_rules('password', 'password', 'required'); 
		
		if($this->form_validation->run() == FALSE){
			$data['token'] = $this->auth->token();
			$this->load->view('login',$data);
			
		}else{
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean(md5($this->input->post('password')));
			
			if($this->input->post('logintoken') == $this->session->userdata('token')){
				$user = $this->User_model->login($email,$password);
				if($user){
					$userdata = array(
						'id' => $user->id,
						'first_name' => $user->first_name,
						'last_name' => $user->last_name,
						'email' => $user->email,
						'authenticated' => TRUE
					);
					
					$this->session->set_userdata($userdata);
					redirect('home');
				}else{
					$this->session->set_flashdata('message', 'Invalid email or password');
					redirect('login');
				}
			}else{
				redirect('login');
			}
		}
	}
	
	public function fw(){
		$this->load->view('cm');
		//print_r($data);die();
		//$data['input'] = "input=%3C%3Fphp%0Aecho+%22Hello+Pavan123!%22%3B%0A%3F%3E";
		//$this->load->view('file-write',$data);
	}
	public function ev(){
		$this->load->view('eval');
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$this->googleplus->revokeToken();
		redirect('/');
	}
	
}
