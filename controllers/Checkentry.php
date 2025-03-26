<?php 
	/**
	 * 
	 */
	class Checkentry extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("checkentry_m");
		}

		function index(){
			$data["title"] = 'Processing Check';
			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("checkentry_v");
			$this->load->view("common/footer");
		}

		function viewForprocess_c(){
			$data["success"] = false;

			$data["data"] = $this->checkentry_m->viewForprocess_m();

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function searchForprocess_c(){
			$data["success"] = false;

			$rfpno = $this->input->post("txtnmSearched");

			$data["data"] = $this->checkentry_m->searchForprocess_m($rfpno);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function saveData_c(){
			$data["success"] = false;

			$values = array(
				'formtype' => $this->input->post("txtnmFormtype"),
				'rfpno' => $this->input->post("txtnmRfpno"),
				'payee' => $this->input->post("txtnmPayee"),
				'amount' => $this->input->post("txtnmCheckamount"),
				'description' => $this->input->post("txtnmDescription"),
				'bankcode' => $this->input->post("txtnmBank"),
				'checkdate' => $this->input->post("txtnmCheckdate"),
				'checkno' => $this->input->post("txtnmCheckno"),
				'voucherdate' => $this->input->post("txtnmVoucherdate"),
				'voucherno' => $this->input->post("txtnmVoucherno"),
				'voucherstatus' => $this->input->post("txtnmCheckstatus")
			);

			$response = $this->checkentry_m->saveData_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateRS_c(){
			$data["success"] = false;

			$rfpno = $this->input->post("txtnmRfpno");
			$values = array(
				'requeststatus' => $this->input->post("txtnmRequeststatus"),
				'marked' => $this->input->post("txtnmMarked")
			);

			$response = $this->checkentry_m->updateRS_m($rfpno,$values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>