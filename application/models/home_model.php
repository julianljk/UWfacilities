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
		//return $this->db->select('programs.title, programs.proj_date, programs.Action, programs.findings, programs.future_opp, programs.authors, programs.FPMpartner_proj, programs.student_org, programs.research_centers, programs.num_students, programs.doc_name, programs.doc_type')
		$this->db->select('*')
			->from('programs')
			->where('programs.id', $id)
			->join('FPMsector', 'programs.FPMsector_id = FPMsector.id', 'INNER');
			->join('Departments', 'programs.dept_id = Departments.id', 'LEFT')
			//->join('Departments', 'programs.academic_dept = Departments.id', 'INNER')
		return $this->db->get()->result_array();
	}

}
?>