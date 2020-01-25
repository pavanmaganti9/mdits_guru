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
            $data['title'] = 'Add Technology';
			
			if($this->input->post('langSubmit')){ 
			
			$this->form_validation->set_rules('langname', 'Technology Name', 'required|xss_clean|is_unique[languages.name]');
				$this->form_validation->set_rules('langdesc', 'Technology Description', 'required|xss_clean'); 
				if (empty($_FILES['langimage']['name']))
				{
					$this->form_validation->set_rules('langimage', 'Technology Image', 'required');
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
				$this->form_validation->set_rules('lang', 'Tutorial', 'required|callback_select_validate_tuto');
				$this->form_validation->set_rules('tutoname', 'Tutorial', 'required|callback_select_validate_tuto'); 
				$this->form_validation->set_rules('heading', 'Heading', 'required|xss_clean');
				$this->form_validation->set_rules('topicname', 'Topic Name', 'required|xss_clean|is_unique[topics.name]');
				$this->form_validation->set_rules('topicdesc', 'Topic Description', 'required|xss_clean'); 
				/* if (empty($_FILES['topicdoc']['name']))
				{
					$this->form_validation->set_rules('topicdoc', 'Topic Document', 'required');
				} */
				$this->form_validation->set_rules('lang','Language','required');
				if($this->form_validation->run() == FALSE){
				
				}else{
					if (!empty($_FILES['topicdoc']['name']))
					{
						$image = time().'_'.$_FILES["topicdoc"]['name'];
					}
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
						//$error = $this->upload->display_errors();
						//$this->session->set_flashdata('errmessage', $error);
						//redirect('admin/add_topic');
					}
					else
					{
						
					}
					$table = 'topics';
					$max_pos = $this->Admin_model->get_positions($table,$this->input->post('tutoname'),$this->input->post('heading'));
					if($max_pos > 0){
						$position = $max_pos + 1;
					}else{
						$position = 1;
					}
					$slug = $this->create_url_slug($this->input->post('topicname'));
					$productData = array( 
					'name' => $this->security->xss_clean($this->input->post('topicname')),
					'heading' => $this->security->xss_clean($this->input->post('heading')),					
					'slug' => $this->security->xss_clean($slug),
					'description' => $this->security->xss_clean($this->input->post('topicdesc')),
					'position' => $this->security->xss_clean($position),
					'language' => $this->security->xss_clean($this->input->post('lang')),
					'concept' => $this->security->xss_clean($this->input->post('tutoname')),
					'image' => $this->security->xss_clean($image),
					'created' => date("Y-m-d H:i:s")
					);
					
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
			$this->form_validation->set_rules('conceptname', 'Concept Name', 'required|xss_clean');
            $this->form_validation->set_rules('topicname', 'Topic Name', 'required|xss_clean');
				$this->form_validation->set_rules('topicdesc', 'Topic Description', 'required|xss_clean'); 
				/* if (empty($_FILES['topicdoc']['name']))
				{
					$this->form_validation->set_rules('topicdoc', 'Topic Document', 'required');
				} */
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
						//$error = $this->upload->display_errors();
						//$this->session->set_flashdata('errmessage', $error);
						//redirect('admin/edittopic/'.$id);
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
				'image' => $image,
				'concept' => $this->input->post('conceptname')
            );
           
           
				
                //update post data
                $update = $this->Admin_model->updatebyid($postData, $id, $table);
				
				//$nextrow = $this->Admin_model->get_next_row($id,$this->input->post('conceptname'));
				
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
	
	public function deletetopic($id) {
		$table = 'topics';
		
		$postData = $this->Admin_model->getbyid($id,$table);
		$image = $postData['image'];
		$this->Admin_model->delete_doc($id, $image);
		
        $this->Admin_model->delete_row($id,$table);
		redirect('admin/topics/');
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
			if($this->input->post('userupdate')){
				//$this->form_validation->set_rules('topicname', 'Topic Name', 'required|xss_clean|is_unique[topics.name]');
				//$this->form_validation->set_rules('topicdesc', 'Product Description', 'required|xss_clean'); 
				//$this->form_validation->set_rules('topic', 'Topic', 'required|callback_select_validate');
				$this->form_validation->set_rules('userstat','User status','required|callback_select_validate');
				if($this->form_validation->run() == FALSE){
				
				}else{
					
					$i = 0;
					$selectedOptionCount = count($_POST['topic']);
					$selectedOption = "";
					while ($i < $selectedOptionCount) {
						$selectedOption = $selectedOption . $_POST['topic'][$i];
						if ($i < $selectedOptionCount - 1) {
							$selectedOption = $selectedOption . ",";
						}
						
						$i ++;
					}
					
					$postData = array(
						'topic' => $selectedOption,
						'tstartdate' => $this->input->post('tsdate'),
						'tenddate' => $this->input->post('tedate'),
						'tstatus' => $this->input->post('topicstat'),
						'ustatus' => $this->input->post('userstat')
					);
					$update = $this->Admin_model->updatebyid($postData, $id, $table);
					$this->session->set_flashdata('message', 'User updated successfully!');
					redirect('admin/view_registered_users/'.$id);
				}
			}
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
	
	function select_validate($abcd)
	{
		if($abcd=="none"){
			$this->form_validation->set_message('select_validate', 'The field is required.');
			return false;
		} else{
			return true;
		}
	}
	
	public function add_tutorial(){
		if($this->session->userdata('email')){ 
			$data['title'] = 'Add Tutorial';
			
			if($this->input->post('tutoSubmit')){ 
			$this->form_validation->set_rules('lang', 'Language', 'required|callback_select_validate_tuto'); 
			$this->form_validation->set_rules('tutoname', 'Tutorial Name', 'required|xss_clean|is_unique[tutorial.tutoname]');
				$this->form_validation->set_rules('tutodesc', 'Tutorial Description', 'required|xss_clean'); 
				
				if (empty($_FILES['tutoimage']['name']))
				{
					$this->form_validation->set_rules('tutoimage', 'Tutorial Image', 'required');
				}
				if($this->form_validation->run() == FALSE){
				
				}else{
					$image = time().'_'.$_FILES["tutoimage"]['name'];
				
					//$config = array(
					$config['upload_path'] = './assets/images/tutorials/';
					$config['allowed_types']        = 'gif|jpg|png|jpeg';
					$config['max_size']             = 100000;
					$config['max_width']            = 100000;
					$config['max_height']           = 100000;
					$config['file_name'] = $image;
					//);
					$this->load->library('upload', $config); 
					
					if($this->upload->do_upload('tutoimage'))
					{
						
					}
					else
					{
					}
					
					$config_manip['image_library'] = 'gd2';
					$config_manip['source_image'] = './assets/images/tutorials/'.$image;
					$config_manip['create_thumb'] = TRUE;
					$config_manip['maintain_ratio'] = FALSE;
					$config_manip['width'] = 50;
					$config_manip['height'] = 50;
					$this->load->library('image_lib', $config_manip);
					$this->image_lib->resize();
					$this->image_lib->clear();
					
					$productData = array( 
					'techno' => $this->security->xss_clean($this->input->post('lang')),
					'tutoname' => $this->security->xss_clean($this->input->post('tutoname')), 
					'tutodesc' => $this->security->xss_clean($this->input->post('tutodesc')),
					'tutoimage' => $this->security->xss_clean($image),
					'created' => date("Y-m-d H:i:s")
					);
					$table = 'tutorial';
					$insert = $this->Admin_model->insert($productData,$table);
					if($insert){
						
					$this->session->set_flashdata('message', 'Tutorial added successfully');					
						redirect('admin/add_tutorial'); 
					}else{ 
						$this->session->set_flashdata('message', 'Invalid');
					}
				}		
			}
			$table_lang = 'languages';
            $data['languages'] = $this->Admin_model->retrieve_all($table_lang);
			$this->load->view('admin/add_tutorial',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function tutorials(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Tutorials';
			$table = 'tutorial';
            $data['topics'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/view_tutorials',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function get_tuto(){
		$techno_name = $this->input->post('techno_name');
		$techs = $this->Admin_model->retrieve_tuto($techno_name);
		if(count($techs)>0){
			$tec_sel = '';
			$tec_sel .= '<option  value="none" selected="">Select Tutorial</option>';
			foreach($techs as $tech){
				$tec_sel .= '<option value="'.$tech->tutoname.'">'.$tech->tutoname.'</option>';
			}
			echo json_encode($tec_sel);
		}
	}
	
	function select_validate_tuto($abcd)
	{
		if($abcd=="none"){
			$this->form_validation->set_message('select_validate_tuto', 'The Technology field is required.');
			return false;
		} else{
			return true;
		}
	}
	
	public function positions(){
		if($this->session->userdata('email')){ 
            $data['title'] = 'Topic Positions';
			//$table = 'tutorial';
            //$data['topics'] = $this->Admin_model->retrieve_all($table);
			$this->load->view('admin/positions',$data);
		}else{
			redirect('admin');
		}
	}
	
	public function searchpos()
	{
		$data['title'] = 'Topic Positions';
		$search = $this->input->post('searchpos');
		$data['word'] = $search;
		$data['query'] = $this->Admin_model->get_search($search);
		$data['cnt'] = count($data['query']);
		$this->load->view('admin/positions',$data);
	}
	
	public function changeposd($id)
	{
		$table = 'topics';
        $getData = $this->Admin_model->getbyid($id,$table);
		$nextrow = $this->Admin_model->get_next_row($id,$getData['concept'],$getData['heading']);
		$posto = $prevrow[0]->position;
		$posid = $prevrow[0]->id;
		$orgpos = $getData['position'];
		$orgid = $getData['id'];
		$swapres = $this->swap($posto,$orgpos);
		/* echo "change id ".$posid." to position ".$orgpos;
		echo "<br>";
		echo "change id ".$orgid." to position ".$posto;
		print_r($swapres);die(); */
		$org = array('position' => $swapres[1]);
		$update1 = $this->Admin_model->updatebyid($org, $orgid, $table);
		$pos = array('position' => $swapres[0]);
		$update1 = $this->Admin_model->updatebyid($pos, $posid, $table);
		$data['title'] = 'Topic Positions';
		$search = $this->input->post('searchpos');
		$data['word'] = $search;
		$data['query'] = $this->Admin_model->get_search($search);
		$data['cnt'] = count($data['query']);
		$this->load->view('admin/positions',$data);
	}
	
	public function changeposu($id)
	{
		$table = 'topics';
        $getData = $this->Admin_model->getbyid($id,$table);
		$prevrow = $this->Admin_model->get_prev_row($id,$getData['concept'],$getData['heading']);
		print_r($prevrow);die();
		$posto = $prevrow[0]->position;
		$posid = $prevrow[0]->id;
		$orgpos = $getData['position'];
		$orgid = $getData['id'];
		$swapres = $this->swap($posto,$orgpos);
		echo "change id ".$posid." to position ".$orgpos;
		echo "<br>";
		echo "change id ".$orgid." to position ".$posto;
		print_r($swapres);die();
		$org = array('position' => $swapres[1]);
		$update1 = $this->Admin_model->updatebyid($org, $orgid, $table);
		$pos = array('position' => $swapres[0]);
		$update1 = $this->Admin_model->updatebyid($pos, $posid, $table);
		$data['title'] = 'Topic Positions';
		$search = $getData['heading'];
		$data['word'] = $search;
		$data['query'] = $this->Admin_model->get_search($search);
		$data['cnt'] = count($data['query']);
		$this->load->view('admin/positions',$data);
	}
	
	public function swap($x, $y) {
		$tmp=$x;
		$x=$y;
		$y=$tmp;
		return array($x,$y);
	}

	public function logout(){ 
        $this->session->unset_userdata('userdata'); 
        $this->session->sess_destroy(); 
        redirect('admin'); 
    } 	
}
?>