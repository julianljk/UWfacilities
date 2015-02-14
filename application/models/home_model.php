<?php

class Home_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }

	
	public function auth($username,$pass){
		$query = $this->db->get_where('admin',array('username' => strtolower($username)));
    	$user = $query->row_array();
    	if (!$user) 
			return false;
    	if ($user['password'] === $pass) 
			return $user;
    	else 
			return false;
	}
	
	public function getData(){
		return $this->db->get('programs')->result_array();	
	}

}
?>