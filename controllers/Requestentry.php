<?php 
	/**
	 * 
	 */
	class Requestentry extends CI_Controller
	{	
		function __construct(){
			parent::__construct();
			$this->load->model("requestentry_m");
			$this->load->library('session');
		}

		function index(){
			$data['title'] = 'Request';

			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("common/navigationrequester");
			$this->load->view("requestentry_v",$data);
			$this->load->view("common/footer");
		}

		function insert_c(){
			$data["success"] = false;

			$values = array(
				'rfpno' => $this->input->post("txtnmRfpno"),
				'payee' => $this->input->post("txtnmPayee"),
				'trxntype' => $this->input->post("txtnmTrxntype"),
				'daterequested' => $this->input->post("txtnmDaterequest"),
				'amountleft' => $this->input->post("txtnmAmount"),
				'amount' => $this->input->post("txtnmAmount"),
				'description' => $this->input->post("txtnmDescription"),
				'sender' => $this->input->post("txtnmUser"),
				'division' => $this->input->post("txtnmUserdivision"),
				'region' => $this->input->post("txtnmUseregion"),
				'recipient' => $this->input->post("txtnmRecipient"),
				'requeststatus' => $this->input->post("txtnmRequeststatus"),
				'marked' => $this->input->post("txtnmMarked")
			);

			$response = $this->requestentry_m->insert_m($values);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function checkRfpno_c(){
			$data["success"] = false;

			$rfpno = $this->input->post("txtnmRfpno");

			$response = $this->requestentry_m->checkRfpno_m($rfpno);

			if($response){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>
