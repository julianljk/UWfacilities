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
			->join('Academic_Depts', 'programs.academic_dept_id = Academic_Depts.id', 'LEFT')
			->join('Student_Orgs', 'programs.stud_org_id = Student_Orgs.org_id', 'LEFT')
			->join('Document_Types', 'programs.doc_type_id = Document_Types.doc_id', 'LEFT');
			//one for research too
		return $this->db->get()->result_array();
	}

	public function selects($FPM,$academic,$student){
		$this->db->select('id, dept_id, academic_dept_id, stud_org_id')
			->from('programs');
			if($FPM != 0)
				$this->db->where('dept_id', $FPM);
			if($academic != 0)
				$this->db->where('academic_dept_id', $academic);
			if($student != 0)
				$this->db->where('stud_org_id', $student);

		return $this->db->get()->result_array();
	}

	public function getFPM(){
		return $this->db->select('*')->from('Departments')->order_by('dept_name','asc')->get()->result_array();
	}

	public function getAcademics(){
		return $this->db->select('*')->from('Academic_Depts')->order_by('academic_name','asc')->get()->result_array();
	}

	public function getStudOrgs(){
		return $this->db->select('*')->from('Student_Orgs')->order_by('org_name','asc')->get()->result_array();
	}
}
?>