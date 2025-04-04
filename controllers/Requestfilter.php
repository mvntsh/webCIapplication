<?php 
	/**
	 * 
	 */
	class Requestfilter extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("requestfilter_m");
			$this->load->library('session');
		}

		function index(){
			$data["title"] = 'Request Archive';

			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("common/navigationrequester");
			$this->load->view("requestfilter_v");
			$this->load->view("common/footer");
		}

		function viewRequest_c(){
			$data["success"] = false;

			$data["data"] = $this->requestfilter_m->viewRequest_m();

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function searchData_c(){
			$data["success"] = false;

			$searched = $this->input->post("txtnmSearched");

			$data["data"] = $this->requestfilter_m->searchData_m($searched);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function getData_c(){
			$data["success"] = false;

			$request_id = $this->input->post("txtnmRequestid");

			$data["data"] = $this->requestfilter_m->getData_m($request_id);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function exactAmount_c(){
			$data["success"] = false;

			$request_id = $this->input->post("txtnmRequestid");

			$data["data"] = $this->requestfilter_m->exactAmount_m($request_id);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>
