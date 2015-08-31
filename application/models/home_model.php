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
			->join('Academic_Depts as ad1', 'programs.uw_division1 = ad1.id', 'LEFT')
			->join('Academic_Depts as ad2', 'programs.uw_division2 = ad2.id', 'LEFT')
			->join('Academic_Depts as ad3', 'programs.uw_division3 = ad3.id', 'LEFT')
			->join('Student_Orgs as so1', 'programs.stud_orgs1 = so1.org_id', 'LEFT')
			->join('Student_Orgs as so2' , 'programs.stud_orgs2 = so2.org_id', 'LEFT')
			->join('Student_Orgs as so3', 'programs.stud_orgs3 = so3.org_id', 'LEFT');
			//one for research too
		return $this->db->get()->result_array();
	}

	public function getAll($ids){
		return var_dump($ids);
		$this->db->select('*')
			->from('programs')
			->where_in('programs.id', $ids)
			->join('FPMsector', 'programs.FPMsector_id = FPMsector.id', 'INNER')
			->join('Departments', 'programs.dept_id = Departments.id', 'LEFT')
			->join('Academic_Depts', 'programs.academic_dept_id = Academic_Depts.id', 'LEFT')
			->join('Student_Orgs', 'programs.stud_org_id = Student_Orgs.org_id', 'LEFT')
			->join('Document_Types', 'programs.doc_type_id = Document_Types.doc_id', 'LEFT');
			//->join('Document_Types', 'programs.doc_type_id = Document_Types.doc_id', 'LEFT');
		return $this->db->get()->result_array();
	}

	public function selects($FPM,$academic,$student){
		$this->db->select('id, dept_id, uw_division1, uw_division2, uw_division3, stud_orgs1, stud_orgs2, stud_orgs3')
			->from('programs');
			if($FPM != 0){
				$this->db->where('dept_id', $FPM);
			}
			if($academic != 0){
				$this->db->where('uw_division1', $academic);
				$this->db->or_where('uw_division2', $academic);
				$this->db->or_where('uw_division3', $academic);
			}
			if($student != 0){
				$this->db->where('stud_orgs1', $student);
				$this->db->or_where('stud_orgs2', $student);
				$this->db->or_where('stud_orgs3', $student);
			}


		return $this->db->get()->result_array();
		// return "testing, uncomment this in home_model";
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