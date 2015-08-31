<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('home_model');
	}
	
	//default function
	public function index()
	{
		$view['data'] = $this->home_model->getData();
		$view['FPM'] = $this->home_model->getFPM();
		$view['divisions'] = $this->home_model->getAcademics();
		$view['stud_orgs'] = $this->home_model->getStudOrgs();
		$this->load->view('home', $view);
	}
	//called from routes.php
	public function get($id){
		 echo json_encode($this->home_model->get($id));
	}

	public function getAll(){
		echo var_dump($_POST,$this->input->post('ids'),$_SERVER['REQUEST_METHOD']);exit;
		echo json_encode($this->home_model->getAll($this->input->post()));
	}
	
	public function selects($FPM,$academic,$student){
		echo json_encode($this->home_model->selects($FPM,$academic,$student));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */