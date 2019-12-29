<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() { 
        parent::__construct(); 
        $this->load->model('Admin_model');
    }
	
	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('admin/login',$data);
	}
	
	public function login(){
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
		$this->form_validation->set_rules('password', 'password', 'required'); 
		if($this->form_validation->run() == FALSE){
			$data['token'] = $this->auth->token();
			$data['title'] = 'Login';
			$this->load->view('admin/login',$data);
		}else{
			if($this->input->post('admintoken') == $this->session->userdata('token')){
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean(md5($this->input->post('password')));
			$user = $this->Admin_model->login($email,$password);
			
			if(!empty($user)){
				$userdata = array(
					'id' => $user->id,
					'fname' => $user->fname,
					'lname' => $user->lname,
					'email' => $user->email,
					'user_type' => $user->user_type,
					'authenticated' => TRUE
				);
				
				$this->session->set_userdata($userdata);
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('message', 'Invalid email or password');
				redirect('admin');
			}
			}else{
				redirect('admin');
			}
			$data['title'] = 'Login';
			$this->load->view('admin/login',$data);
		}
		
	}

	public function dashboard(){ 
        $data = array(); 
        if($this->session->userdata('email')){ 
            $data['title'] = 'Dashboard';
             
            $this->load->view('admin/dashboard', $data); 
        }else{ 
            redirect('admin'); 
        } 
    }
	
	public function add_language(){
		$data = array(); 
        if($this->session->userdata('email')){ 
            $data['title'] = 'Add Language';
			
			if($this->input->post('langSubmit')){ 
			
			$this->form_validation->set_rules('langname', 'Language Name', 'required|xss_clean|is_unique[languages.name]');
				$this->form_validation->set_rules('langdesc', 'Language Description', 'required|xss_clean'); 
				if (empty($_FILES['langimage']['name']))
				{
					$this->form_validation->set_rules('langimage', 'Language Image', 'required');
				}
				if($this->form_validation->run() == FALSE){
				
				}else{
					$image = time().'_'.$_FILES["langimage"]['name'];
				
					//$config = array(
					$config['upload_path'] = './assets/images/languages/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 100000;
					$config['max_width']            = 100000;
					$config['max_height']           = 100000;
					$config['file_name'] = $image;
					//);
					$this->load->library('upload', $config); 
					
					if($this->upload->do_upload('langimage'))
					{
						//$res['msg']="Image has been uploaded!";
						//$this->load->view('image', $res);
						//$this->resizeImage($uploadedImage['file_name']);
					}
					else
					{
					}
					$slug = $this->create_url_slug($this->input->post('langname'));
					$productData = array( 
					'name' => $this->security->xss_clean($this->input->post('langname')), 
					'slug' => $this->security->xss_clean($slug),
					'description' => $this->security->xss_clean($this->input->post('langdesc')),
					'image' => $this->security->xss_clean($image),
					'created' => date("Y-m-d H:i:s")
					);
					$table = 'languages';
					$insert = $this->Admin_model->insert($productData,$table);
					if($insert){
						
					$this->session->set_flashdata('message', 'Language added successfully');					
						redirect('admin/add_language'); 
					}else{ 
						$this->session->set_flashdata('message', 'Invalid');
					}
				}		
			}
			$this->load->view('admin/add_language',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function languages(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Languages';
			$table = 'languages';
            $data['languages'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/view_languages',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function add_topic(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Add a Topic';
			if($this->input->post('topicSubmit')){
				$this->form_validation->set_rules('topicname', 'Topic Name', 'required|xss_clean|is_unique[topics.name]');
				$this->form_validation->set_rules('topicdesc', 'Product Description', 'required|xss_clean'); 
				if (empty($_FILES['topicdoc']['name']))
				{
					$this->form_validation->set_rules('topicdoc', 'Topic Document', 'required');
				}
				$this->form_validation->set_rules('lang','Language','required');
				if($this->form_validation->run() == FALSE){
				
				}else{
					$image = time().'_'.$_FILES["topicdoc"]['name'];
				
					//$config = array(
					$config['upload_path'] = './assets/images/topic_doc/';
					$config['allowed_types']        = 'pdf|doc|docx';
					$config['max_size']             = 100000;
					$config['max_width']            = 100000;
					$config['max_height']           = 100000;
					$config['file_name'] = $image;
					//);
					$this->load->library('upload', $config); 
					
					if(!$this->upload->do_upload('topicdoc'))
					{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('errmessage', $error);
						redirect('admin/add_topic');
					}
					else
					{
						
					}
					$slug = $this->create_url_slug($this->input->post('topicname'));
					$productData = array( 
					'name' => $this->security->xss_clean($this->input->post('topicname')), 
					'slug' => $this->security->xss_clean($slug),
					'description' => $this->security->xss_clean($this->input->post('topicdesc')),
					'language' => $this->security->xss_clean($this->input->post('lang')),
					'image' => $this->security->xss_clean($image),
					'created' => date("Y-m-d H:i:s")
					);
					$table = 'topics';
					$insert = $this->Admin_model->insert($productData,$table);
					if($insert){
						
					$this->session->set_flashdata('message', 'Topic added successfully');					
						redirect('admin/add_topic'); 
					}else{ 
						$this->session->set_flashdata('message', 'Invalid');
					}
				}
				
			}
			$table = 'languages';
            $data['languages'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/add_topic',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function create_url_slug($string){	
	   $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);		
	   return $slug;
	}
	
	public function topics(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Topics';
			$table = 'topics';
            $data['topics'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/view_topics',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function edittopic($id){
		$table = 'topics';
        $postData = $this->Admin_model->getbyid($id,$table);
        //if update request is submitted
        if($this->input->post('topicupdate')){
            //form field validation rules
            $this->form_validation->set_rules('topicname', 'Topic Name', 'required|xss_clean');
				$this->form_validation->set_rules('topicdesc', 'Product Description', 'required|xss_clean'); 
				if (empty($_FILES['topicdoc']['name']))
				{
					$this->form_validation->set_rules('topicdoc', 'Topic Document', 'required');
				}
			if(isset($_FILES['topicdoc']['name'])){
            $image = time().'_'.$_FILES["topicdoc"]['name'];
				
					//$config = array(
					$config['upload_path'] = './assets/images/topic_doc/';
					$config['allowed_types']        = 'pdf|doc|docx';
					$config['max_size']             = 100000;
					$config['max_width']            = 100000;
					$config['max_height']           = 100000;
					$config['file_name'] = $image;
					//);
					$this->load->library('upload', $config); 
					
					if(!$this->upload->do_upload('topicdoc'))
					{
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('errmessage', $error);
						redirect('admin/edittopic/'.$id);
					}
					else
					{
						
					}
					
			}else{
				$image = $postData['image'];
			}
					$slug = $this->create_url_slug($this->input->post('topicname'));
            $postData = array(
                'name' => $this->input->post('topicname'),
				'slug' => $slug,
                'description' => $this->input->post('topicdesc'),
				'image' => $image
            );
           
           
				
                //update post data
                $update = $this->Admin_model->updatebyid($postData, $id, $table);
				//print_r($update);die();
                if($update){
                    $this->session->set_flashdata('message', 'Topic has been updated successfully.');
					$data['id'] = $id;
                    redirect('admin/edittopic/'.$id);
                }else{
                    $data['errmessage'] = 'Some problems occurred, please try again.';
                }
			
        }
        $data['post'] = $postData;
		$data['id'] = $id;
        $data['title'] = 'Update Topic';
        $data['action'] = 'Edit';
        //load the edit page view
        $this->load->view('admin/edittopic', $data);
	}
	
	public function deleteproduct($id){
        //check whether post id is not empty
        if($id){
			$table = 'products';
			$postData = $this->Admin_model->getproduct($id,$table);
			$image = $postData['image'];
            //delete post
            $delete = $this->Admin_model->deleteproduct($id, $table, $image);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Post has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('admin/products');
    }
	
	public function deletedoc($id){
		$table = 'topics';
        $postData = $this->Admin_model->getbyid($id,$table);
		$image = $postData['image'];
		$this->Admin_model->delete_doc($id, $image);
        redirect('admin/edittopic/'.$id);
	}
	
	public function guru_users(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Registered Users';
			$table = 'guru_users';
            $data['topics'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/guru_users',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function edit_guru_users($id){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Registered Users';
			$table = 'guru_users';
            $data['user'] = $this->Admin_model->getbyid($id,$table);
			$table2 = 'languages';
            $data['lang'] = $this->Admin_model->retrieve_all($table2);
			$this->load->view('admin/edit_reg_user',$data);
		}else{
			redirect('admin');
		}
		
	}

	public function admin_users(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Users';
			$table = 'users';
            $data['topics'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/admin_users',$data);
		}else{
			redirect('admin');
		}
	}

	public function logout(){ 
        $this->session->unset_userdata('userdata'); 
        $this->session->sess_destroy(); 
        redirect('admin'); 
    } 	
}
?>