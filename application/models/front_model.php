<?php
defined('BASEPATH') OR exit('No direct access allowed');

class Front_model extends CI_MODEL{

	public function insert($data = array(),$table) { 
        if(!empty($data)){ 
           $insert = $this->db->insert($table, $data); 
           return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    }
	
	public function get_language_bylimit() {
        $this->db->select('*');
		$this->db->from('languages');
		$this->db->order_by('created','desc');
		$this->db->limit(3);
		$query=$this->db->get();
        return $query->result();
    }
	
	function getRow($params = array()){
        $this->db->select('*');
        $this->db->from('languages');
        
        if(array_key_exists("url_slug", $params)){
            $this->db->where('slug', $params['url_slug']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }
	
	function getRow_topic($params = array()){
        $this->db->select('*');
        $this->db->from('topics');
        
        if(array_key_exists("url_slug", $params)){
            $this->db->where('slug', $params['url_slug']);
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

	function getlangtopic($params = array()){
        $this->db->select('*');
			$this->db->where('language', $params['prodtyp']);
			$this->db->from('topics');
			$query=$this->db->get();
			return $query->result_array();
    }

	function getmailid($mail,$table){
            $query = $this->db->get_where($table, array('email' => $mail));
            return $query->row_array();
			print_r($query->row_array());die();
    }	
	
	function get_search($params){
			$this->db->select('*');
			$this->db->like('name', $params);
			$this->db->or_like('language', $params);
			$this->db->from('topics');
			$query=$this->db->get();
			return $query->result_array();
    }
	
	public function login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('ustatus', 1);
		$query = $this->db->get('guru_users');
		$data['modified'] = date("Y-m-d H:i:s");
        $update = $this->db->update('guru_users', $data, array('email'=>$email));
		//print_r($query);
		if($query->num_rows() == 1){
			return $query->row();
		}
		return false;
	}

}