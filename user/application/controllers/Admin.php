<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct() {
  parent:: __construct();
  
		$this->load->model('M_admin', 'admin');
	}

	public function index()
	{
		$data['admins'] = $this->admin->getAll();
		$this->load->view('admin/V_admin', $data);
	}

	public function detail($id){
		$data['profiles'] = $this->admin->getProfile($id);
		$data['educations'] = $this->admin->getEducation($id);
		$data['experiences'] = $this->admin->getExperience($id);
		$data['trainings'] = $this->admin->getTraining($id);

		$this->load->view('admin/V_admin_detail', $data);
	}

	public function edit($id){
		$id 		= strip_tags(str_replace("'", "", $id));
		$user 		= $this->session->userdata('id_admin');

		$data = [
			'id' => $id,
			'user' => $user
		];

		$edit = $this->admin->edit($this->security->xss_clean($data));

		if($delete){
			echo $this->session->set_flashdata('flash', 'change');
		}else{
			echo $this->session->set_flashdata('flash', 'change failed');
		}

		redirect('Admin');
	}
}
?>