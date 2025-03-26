<?php 
	/**
	 * 
	 * 
	 */
	class Create extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('create_m');
		}

		function index(){
			$data["title"] = 'Create';
			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("create_v");
			$this->load->view("common/footer");
		}

		function insertData_c(){
			$data["success"] = false;

			$this->load->library('form_validation');

			$values = array(
				'title' => $this->input->post("txtnmTitle"),
				'slug' => $this->input->post("txtnmSlug"),
				'text' => $this->input->post("txtnmText")
			);

			$response = $this->create_m->insertData_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>