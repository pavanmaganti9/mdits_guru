<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Admin_model extends CI_MODEL{
	
	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$type = array('admin', 'superadmin');
		$this->db->where_in('user_type', $type);
		$query = $this->db->get('users');
		//$sql = $this->db->last_query();
		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}
	
	public function insert($data = array(),$table) { 
        if(!empty($data)){ 
           $insert = $this->db->insert($table, $data); 
           return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
	
	function retrieve_all($table){
		$this->db->select('*');
		//$this->db->order_by("created","desc");
		$this->db->from($table);
		$query=$this->db->get();
		return $query->result_array();
    }
	
	function getbyid($id = "",$table){
        if(!empty($id)){
            $query = $this->db->get_where($table, array('id' => $id));
            return $query->row_array();
        }else{
            $query = $this->db->get('posts');
            return $query->result_array();
        }
    }
	
	public function updatebyid($data, $id, $table) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update($table, $data, array('id'=>$id));
			//print_r($this->db->update($table, $data, array('id'=>$id)));die();
            return $update?true:false;
        }else{
            return false;
        }
    }
	
	function retrieve($table){
			$this->db->select('*');
			//$this->db->order_by("created","desc");
			$this->db->from($table);
			$query=$this->db->get();
			return $query->result_array();
    }
	
	function delete_doc($id,$image){
		$path = 'assets/images/topic_doc/'.$image;
		unlink($path);
		$data = array( 
			'image'      => ''
		);
		$this->db->where('id', $id);
		$this->db->update('topics', $data);
    }
	
	public function delete_row($id,$table){ 

		$query = $this->db->get_where($table,array('id' => $id));
		if ($query->num_rows() == 1) {
		$this -> db -> where('id', $id);
		$this -> db -> delete($table);
		return true;
		} else {
			return false;
		}
    }
	
	public function retrieve_tuto($techno_name){
		$query = $this->db->get_where('tutorial', array('techno' => $techno_name));
		return $query->result();
	}
	
	public function get_positions($table,$concept,$heading){
		$this->db->select_max('position');
		$options=array('concept'=>$concept,'heading' => $heading);
		$result = $this->db->get_where($table,$options)->row();		
		return $result->position;
	}
	
	public function get_next_row($id,$concept,$heading){	
		$query = $this->db->query("SELECT * FROM topics WHERE id > ".$id." AND concept = '".$concept."' AND heading = '".$heading."' ORDER BY id ASC LIMIT 1");	
		return $query->result();
	}
	
	public function get_prev_row($id,$concept,$heading){	
		$query = $this->db->query("SELECT * FROM topics WHERE id < ".$id." AND concept = '".$concept."' AND heading = '".$heading."' ORDER BY id DESC LIMIT 1");	
		return $query->result();
	}
	
	function get_search($params){
			$this->db->select('*');
			$this->db->like('heading', $params);
			$this->db->order_by('position', 'ASC');
			$this->db->from('topics');
			$query=$this->db->get();
			return $query->result_array();
    }
	
}