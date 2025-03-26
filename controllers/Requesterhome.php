<?php 
	/**
	 * 
	 */
	class Requesterhome extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("requesterhome_m");
		}

		function index(){
			$data["title"] = 'Home';

			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("common/navigationrequester");
			$this->load->view("requesterhome_v");
			$this->load->view("common/footer");
		}

		function viewRequest_c(){
			$data["success"] = false;

			$division = $this->input->post("txtnmUserdivision");

			$data["data"] = $this->requesterhome_m->viewRequest_m($division);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function searchData_c(){
			$data["success"] = false;

			$division = $this->input->post("txtnmUserdivision");
			$search = $this->input->post("txtnmSearch");

			$data["data"] = $this->requesterhome_m->searchData_m($division,$search);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewSummary_c(){
			$data["success"] = false;

			$division = $this->input->post("txtnmUserdivision");

			$data["data"] = $this->requesterhome_m->viewSummary_m($division);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>