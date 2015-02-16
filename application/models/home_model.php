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

	public function get($id){
		$this->db->select('*')
			->from('programs')
			->where('programs.id', $id)
			->join('FPMsector', 'programs.FPMsector_id = FPMsector.id', 'INNER')
			->join('Departments', 'programs.dept_id = Departments.id', 'LEFT')
			->join('Academic_Depts', 'programs.academic_dept = Academic_Depts.id', 'LEFT');
			//the only reason there are actually 2 tables is because codeIgniter is too retarded to 
			//be able to left join on the same table twice
		return $this->db->get()->result_array();
	}

}
?>