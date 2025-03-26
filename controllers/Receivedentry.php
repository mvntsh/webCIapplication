<?php 
	/**
	 * 
	 */
	class Receivedentry extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("receivedentry_m");
		}

		function index(){
			$data['title'] = 'Receiving Entry';

			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("receivedentry_v");
			$this->load->view("common/footer");
		}

		function viewRequest_c(){
			$data["success"] = false;

			$recipient = $this->input->post("txtnmUserdivision");

			$data["data"] = $this->receivedentry_m->viewRequest_m($recipient);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewRequestdate_c(){
			$data["success"] = false;

			$daterequested = $this->input->post("txtnmSearchdate");
			$recipient = $this->input->post("txtnmUserdivision");

			$data["data"] = $this->receivedentry_m->viewRequestdate_m($daterequested,$recipient);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function searchData_c(){
			$data["success"] = false;

			$searched = $this->input->post("txtnmSearched");
			$recipient = $this->input->post("txtnmUserdivision");

			$data["data"] = $this->receivedentry_m->searchData_m($searched,$recipient);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateMarked_c(){
			$data["success"] = false;

			$request_id = $this->input->post("txtnmRequestid");
			$values = array(
				'marked' => $this->input->post("txtnmMarked")
			);

			$response = $this->receivedentry_m->updateMarked_m($request_id,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function verifyMark_c(){
			$data["success"] = false;

			$response = $this->receivedentry_m->verifyMark_m();

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateStatus_c(){
			$data["success"] = false;

			$values = array(
				'requeststatus' => $this->input->post("txtnmRequeststatus")
			);

			$response = $this->receivedentry_m->updateStatus_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateMarkedbydate_c(){
			$data["success"] = false;

			$daterequested = $this->input->post("txtnmSearchdate");
			$values = array(
				'marked' => $this->input->post("txtnmMarked")
			);

			$response = $this->receivedentry_m->updateMarkedbydate_m($daterequested,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>