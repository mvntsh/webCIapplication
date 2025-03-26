<?php 
	/**
	 * 
	 */
	class Checkprint extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model("checkprint_m");
		}

		function index(){
			$data["title"] = 'Check Printing';

			$this->load->view("common/header",$data);
			$this->load->view("common/userinfo");
			$this->load->view("checkprint_v");
			$this->load->view("common/footer");
		}

		function viewProcessed_c(){
			$data["success"] = false;

			$data["data"] = $this->checkprint_m->viewProcessed_m();

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function spellVoucherdate_c(){
			$data["success"] = false;

			$voucherdate = $this->input->post("txtnmVoucherdate");
			$checkdate = $this->input->post("txtnmCheckdate");
			$data["data"] = $this->checkprint_m->spellVoucherdate_m($voucherdate,$checkdate);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function wholeNumber_c(){
			$data["success"] = false;

			$voucherid = $this->input->post("txtnmVoucherid");

			$data["data"] = $this->checkprint_m->wholeNumber_m($voucherid);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function viewSearched_c(){
			$data["success"] = false;

			$searched = $this->input->post("txtnmSearched");

			$data["data"] = $this->checkprint_m->viewSearched_m($searched);

			if(count($data["data"])>0){
				$data["success"] = true;
			}
			echo json_encode($data);
		}

		function updateRS_c(){
			$data["success"] = false;

			$rfpno = $this->input->post("txtnmRfpno");
			$set = array(
				'requeststatus' => $this->input->post("txtnmRequeststatus"),
				'marked' => $this->input->post("txtnmMarked")
			);

			$process = $this->checkprint_m->updateRS_m($rfpno,$set);

			if($process){
				$data["success"] = true;
			}
			echo json_encode($data);
		}
	}
?>